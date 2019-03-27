<?php

(defined('BASEPATH')) or exit('No direct script access allowed');

/* load the MX_Router class */
require APPPATH . "third_party/MX/Router.php";

class MY_Router extends MX_Router
{

    public function __construct()
    {
        parent::__construct(); 
        $_SERVER['REQUEST_URI']=str_replace('blu-impex/','',$_SERVER['REQUEST_URI']);
    }

    public function _set_routing()
    {
        // Are query strings enabled in the config file?  Normally CI doesn't utilize query strings
        // since URI segments are more search-engine friendly, but they can optionally be used.
        // If this feature is enabled, we will gather the directory/class/method a little differently

        $segments = array();

        if ($this->config->item('enable_query_strings') === true and isset($_GET[$this->config->item('controller_trigger')])) {
            if (isset($_GET[$this->config->item('directory_trigger')])) {
                $this->set_directory(trim($this->uri->_filter_uri($_GET[$this->config->item('directory_trigger')])));
                $segments[] = $this->fetch_directory();
            }

            if (isset($_GET[$this->config->item('controller_trigger')])) {
                $this->set_class(trim($this->uri->_filter_uri($_GET[$this->config->item('controller_trigger')])));
                $segments[] = $this->fetch_class();
            }

            if (isset($_GET[$this->config->item('function_trigger')])) {
                $this->set_method(trim($this->uri->_filter_uri($_GET[$this->config->item('function_trigger')])));
                $segments[] = $this->fetch_method();
            }
        }

        // Load the routes.php file.
        if (defined('ENVIRONMENT') and is_file(APPPATH . 'config/' . ENVIRONMENT . '/routes.php')) {
            include APPPATH . 'config/' . ENVIRONMENT . '/routes.php';
        } elseif (is_file(APPPATH . 'config/routes.php')) {
            include APPPATH . 'config/routes.php';
        }

        $this->routes = (!isset($route) or !is_array($route)) ? array() : $route;
        unset($route);

        /* warning .... hack here */
        $this->routes = $this->_db_routes($this->routes);

        // Set the default controller so we can display it in the event
        // the URI doesn't correlated to a valid controller.
        $this->default_controller = (!isset($this->routes['default_controller']) or $this->routes['default_controller'] == '') ? false : strtolower($this->routes['default_controller']);

        // Were there any query string segments?  If so, we'll validate them and bail out since we're done.
        if (count($segments) > 0) {
            return $this->_validate_request($segments);
        }

        // Fetch the complete URI string
        $this->uri->_fetch_uri_string();

        // Is there a URI string? If not, the default controller specified in the "routes" file will be shown.
        if ($this->uri->uri_string == '') {
            return $this->_set_default_controller();
        }

        // Do we need to remove the URL suffix?
        $this->uri->_remove_url_suffix();

        // Compile the segments into an array
        $this->uri->_explode_segments();

        // Parse any custom routing that may exist
        $this->_parse_routes();

        // Re-index the segment array so that it starts with 1 rather than 0
        $this->uri->_reindex_segments();
    }

    
    private function _db_routes($routes)
    {
        //Call database
        //echo $this->config->item('db_username'); die ;
        require_once APPPATH . 'config/database' . EXT;
        require_once BASEPATH . "database/DB.php";
        $d_b = &DB($db[ENVIRONMENT], true);
        
        $path = (isset($_SERVER['REQUEST_URI'])) ? $_SERVER['REQUEST_URI'] : @getenv('REQUEST_URI');

        $uri_aligs_string = trim($path, '/');
        $uri_aligs_string = str_replace('blu-impex', '', $path);
        if (strstr($uri_aligs_string, '.html')) {
            $uri_aligs_string = substr($uri_aligs_string, 0, -5);
        }

        //Check if it is subdomain
        $uri_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $uri_segments = explode('/', $uri_path);
        $st = $uri_segments[1];
        if (strstr($st, '.html')) {
            $st = substr($st, 0, -5);
        }
        $stArray = $d_b->query("SELECT page_url FROM wl_meta_tags WHERE is_fixed='L' AND page_url='" . $st . "'")->row_array();
        
        if (!empty($uri_segments[1]) && is_array($stArray) && !empty($stArray)) {
            //echo "in subdomain"; die ;
            $uri_aligs_string = str_replace($st, '', $uri_aligs_string);
            $uri_aligs_string = trim($uri_aligs_string, '/');
            $urlSegment = $uri_aligs_string;

            //$uri_aligs_string = trim($uri_aligs_string, '/');

            //Check in database
            $tmp = $d_b->query("SELECT page_url,entity_type FROM wl_meta_tags WHERE page_url='" . $uri_aligs_string . "'")->result();
            if (is_array($tmp) && !empty($tmp)) {

                foreach ($tmp as $key => $val) {
                    if ($val->page_url != '') {
                        $routes[$st . '/' . $uri_aligs_string] = $val->entity_type;
                    }
                }

            } else {
                $uri_aligs_string = str_replace($st, '', $uri_aligs_string);
                $uri_aligs_string = trim($uri_aligs_string, '/');
                //check in database
                $tmp = $d_b->query("SELECT page_url,entity_type FROM wl_meta_tags WHERE page_url='" . $uri_aligs_string . "'")->result();
                foreach ($tmp as $key => $val) {
                    if ($val->page_url != '') {
                        $routes[$urlSegment] = $val->entity_type;
                    }
                }
            }
            return $routes;
        } else {
            $urlSegment = "";
            $uri_aligs_string = str_replace('urastro', '', $uri_aligs_string);
            $uri_aligs_string = trim($uri_aligs_string, '/');
            //check in database
            $tmp = $d_b->query("SELECT page_url,entity_type FROM wl_meta_tags WHERE page_url='" . $uri_aligs_string . "'")->result();
            foreach ($tmp as $key => $val) {
                if ($val->page_url != '') {
                    $routes[$val->page_url] = $val->entity_type;
                }
            }
            return $routes;
        }
    }

}
