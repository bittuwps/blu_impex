<?php

class Category extends Public_Controller{

    public function __construct(){

        parent::__construct();
        $this->load->helper(array('category/category', 'products/product'));
        $this->load->model(array('category/category_model', 'products/product_model', 'color/color_model', 'size/size_model', 'testimonials/testimonial_model'));
        $this->lang->load('portuguese', 'portuguese');
    }



    public function index(){

        $category_id = (int) $this->meta_info['entity_id'];
        $have_sub_cat = get_db_field_value('wl_categories', 'parent_id', "WHERE parent_id = '$category_id' ");
        if ($category_id > 0) {
            if ($have_sub_cat > 0) {
                //$this->products_listing($category_id);
                $this->category_listing($category_id);
            } else {
                $this->products_listing($category_id); // because in this is project product is stored under category
                //$this->category_listing($category_id);
            }
        } else {
            $this->category_listing($category_id);
            // $this->products_listing($category_id);
        }
    }



    public function category_listing(){

        $data['unq_section'] = isset($parentdata) && is_object($parentdata) ? "Subcategory" : "Category";
        $data['title'] = "Category";
        $data['heading_title'] = 'Our Range';
        
        //For paging
        $record_per_page = (int) $this->input->post('per_page');
        if (array_key_exists('entity_id', $this->meta_info) && $this->meta_info['entity_id'] > 0) {
            $parent_segment = (int) $this->meta_info['entity_id'];
        } else {
            $parent_segment = (int) $this->uri->segment(3);
        }
        $page_segment = find_paging_segment();
        $config['per_page'] = ($record_per_page > 0) ? $record_per_page : $this->config->item('per_page');
        $offset = (int) $this->uri->segment($page_segment, 0);
        $parent_id = ($parent_segment > 0) ? $parent_segment : '0';
        $base_url = ($parent_segment > 0) ? "category/category_listing/$parent_id/pg/" : "category/category_listing/pg/";
        
        //Cat List
        $condtion_array = array('field' => "*,( SELECT COUNT(category_id) FROM wl_categories AS b WHERE b.parent_id=a.category_id ) AS total_subcategories", 'condition' => "AND parent_id = '$parent_id' AND status='1' ", 'limit' => $config['per_page'], 'offset' => $offset, 'debug' => false);
        $res_array = $this->category_model->getcategory($condtion_array);
        $data['total_rows'] = $config['total_rows'] = $this->category_model->total_rec_found;
        //$data['page_links'] = front_pagination("$base_url", $config['total_rows'], $config['per_page'], $page_segment);
        $data['res'] = $res_array;
        
        //Testimonials
        $testimonial = $this->testimonial_model->get_testimonial('5', '0', array("orderby" => "RAND()"));
        $data['testimonial'] = $testimonial;
        
        //Products
        $condtion_array = array('field' => "*,( SELECT COUNT(category_id) FROM wl_categories AS b WHERE b.parent_id=a.category_id ) AS total_subcategories", 'condition' => "AND parent_id = '$parent_id' AND status='1' ", 'limit' => $config['per_page'], 'offset' => $offset, 'debug' => false);
        $proRes = $this->product_model->get_products(5, 0, array("categoryIds" => $parent_id));
        $data['proRes'] = $proRes;
        
        //Parent Data
        $parentdata = $this->category_model->get_category_by_id($parent_id);
        $data['parentres'] = isset($parentdata) && is_array($parentdata) ? $parentdata : "";
        if ($parent_id > 0) {
            $data['catid'] = $parent_id;
            $conArray = array('field' => "*,( SELECT COUNT(category_id) FROM wl_categories AS b WHERE b.parent_id=a.category_id ) AS total_subcategories", 'condition' => "AND parent_id = '$parent_id' AND status='1' ", //'limit'=>10,//'offset'=>$offset,'debug' => FALSE
            );
            $page_title = $parentdata['category_name'];
            $data['category_description '] = $parentdata['category_description'];
            $data['friendly_url '] = $parentdata['friendly_url'];
            $resArray = $this->category_model->getcategory($conArray);
            $data['totalRecord'] = $this->category_model->total_rec_found;
            $data['resleft'] = $resArray;
            $data['maincat'] = $this->db->query("SELECT category_id, category_name, category_description, category_banner,category_image,category_shortdescription, friendly_url FROM wl_categories WHERE status='1' and category_id = '$parent_id' GROUP BY category_id")->result_array();
            $data['category_description'] =  $data['maincat'][0]['category_description'];
            
            //Check if it is subdomain
            $uri_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
            $uri_segments = explode('/', $uri_path);
            $st = $uri_segments[1];
            if (strstr($st, '.html')) {
                $st = substr($st, 0, -5);
            }
            $stArray = $this->db->query("SELECT page_url FROM wl_meta_tags WHERE is_fixed='L' AND page_url='" . $st . "'")->row_array();
            if (is_array($stArray) & !empty($stArray)) {
                $resprosub = $this->db->query("SELECT * FROM wl_subcontent WHERE status = '1' AND FIND_IN_SET($parent_id,category_id)")->row();
                if (is_object($resprosub) && !empty($resprosub)) {
                    
                    //With location and category
                    $locId = get_db_field_value("wl_meta_tags", "meta_id", "WHERE page_url = '" . $st . "'");
                    $resprosubloc = $this->db->query("SELECT * FROM wl_subcontent WHERE status = '1' AND FIND_IN_SET($parent_id,category_id) AND FIND_IN_SET($locId,location_id)")->row();
                    if (is_object($resprosubloc) && !empty($resprosubloc)) { //With location and category
                        $key1 = $resprosubloc->meta_key1;
                        $key2 = $resprosubloc->meta_key2;
                        $key3 = $resprosubloc->meta_key3;
                        $data['category_description'] = str_replace('{catname}', $page_title, str_replace('{location}', ucwords(locationName($st)), str_replace('{key3}', $key3, str_replace('{key2}', $key2, str_replace('{key1}', $key1, $resprosubloc->description)))));
                        if ($resprosubloc->page_heading != '') {
                            $page_title = str_replace('{catname}', $page_title, str_replace('{location}', ucwords(locationName($st)), str_replace('{key3}', $key3, str_replace('{key2}', $key2, str_replace('{key1}', $key1, $resprosubloc->page_heading)))));
                        } else {
                            $page_title .= ' In ' . ucwords(locationName($st));
                        }
                    } else { //With category only
                        $key1 = $resprosub->meta_key1;
                        $key2 = $resprosub->meta_key2;
                        $key3 = $resprosub->meta_key3;
                        $data['category_description'] = str_replace('{catname}', $page_title, str_replace('{location}', ucwords($st), str_replace('{key3}', $key3, str_replace('{key2}', $key2, str_replace('{key1}', $key1, $resprosub->description)))));
                        if ($resprosub->page_heading != '') {
                            $page_title = str_replace('{catname}', $page_title, str_replace('{location}', ucwords(locationName($st)), str_replace('{key3}', $key3, str_replace('{key2}', $key2, str_replace('{key1}', $key1, $resprosub->page_heading)))));
                        } else {
                            $page_title .= ' In ' . ucwords(locationName($st));
                        }
                    }
                }
            } else {
                $data['category_description'] = $data['maincat'][0]['category_description'];
            }
            $data['heading_title'] = $page_title;
            $this->load->view('category/view_category', $data);
        } else {
            $this->load->view('category/view_category', $data);
        }
    }



    public function ajax_load_category_view(){

        $data['title'] = 'Ajax Load Category';
        
        //For Paging
        $config['per_page'] = $this->config->item('per_page');
        $offset = $this->input->get_post('stOffSet');
        if (array_key_exists('entity_id', $this->meta_info) && $this->meta_info['entity_id'] > 0) {
            $parent_segment = (int) $this->meta_info['entity_id'];
        } else {
            $parent_segment = (int) $this->input->get_post('category_id');
        }
        $page_segment = find_paging_segment();
        $parent_id = ($parent_segment > 0) ? $parent_segment : '0';
        
        //cat result
        $condtion_array = array('field' => "*,( SELECT COUNT(category_id) FROM wl_categories AS b WHERE b.parent_id=a.category_id ) AS total_subcategories", 'condition' => "AND parent_id = '$parent_id' AND status='1' ", 'limit' => $config['per_page'], 'offset' => $offset, 'debug' => false);
        $res_array = $this->category_model->getcategory($condtion_array);
        $config['total_rows'] = $this->category_model->total_rec_found;
        $data['res'] = $res_array;
        $this->load->view('category/ajax_load_category', $data);

    }



    public function products_listing($category_id){
        $this->page_section_ct = 'product';
        $condtion = array();
        $cat_res = '';
        $record_per_page = (int) $this->input->post('per_page');
        $category_id = (int) $category_id;
        $page_segment = find_paging_segment();
        $config['per_page'] = ($record_per_page > 0) ? $record_per_page : $this->config->item('per_page');

        $offset = (int) $this->uri->segment($page_segment, 0);
        $base_url = ($category_id != '') ? "category/products_listing/$category_id/pg/" : "category/products_listing/pg/";
        $condtion['status'] = '1';
        //Sorting
        $sort = $this->input->get_post('sort');

        if ($sort > 0) {

            if ($sort == 1) {
                $condtion['orderby'] = 'newarrival_product DESC';
            }

            if ($sort == 2) {
                $condtion['orderby'] = 'popular_product DESC';
            }

            if ($sort == 3) {
                $condtion['orderby'] = 'products_id DESC';
            }

            if ($sort == 4) {
                $condtion['orderby'] = 'product_price ASC';
            }

            if ($sort == 5) {
                $condtion['orderby'] = 'product_price DESC';
            }

        } else {
            $condtion['orderby'] = 'products_id asc';
        }

        $page_title = "Product Lists";

        $price = $this->input->post('price');
        $catIds = $this->input->post('categoryId');

        
        if (!empty($catIds)) {
            $catIds = implode(',', $catIds);
            $condtion['catIds'] = $catIds;
        }

        if (!empty($price)) {
            $condtion['price'] = $price;
        }

        $srtQry = "AND parent_id = '1'";

        if ($category_id > 0) {
            $condtion['category_id'] = $category_id;
            $cat_res = get_db_single_row('wl_categories', '*', " category_id='$category_id'");
            $page_title = $cat_res['category_name'];
            $category_description = $cat_res['category_description'];
            $category_image = $cat_res['category_image'];
            $srtQry = "AND parent_id = '" . $cat_res['parent_id'] . "'";
            $data['catid'] = $category_id;
        }

        $res_array = $this->product_model->get_products($config['per_page'], $offset, $condtion);
     
        $data['total_rows'] = $config['total_rows'] = get_found_rows();
        $data['page_links'] = front_pagination("$base_url", $config['total_rows'], $config['per_page'], $page_segment);
        $data['heading_title'] = $page_title;
        $data['res'] = $res_array;
        $data['cat_res'] = $cat_res;
        /* Global array */
     
        //Testimonials
        $testimonial = $this->testimonial_model->get_testimonial('5', '0', array("orderby" => "RAND()"));
        $data['testimonial'] = $testimonial;
        //Products

        $condPro = array();

        if ($category_id > 0) {
            $condPro = array("categoryIds" => $category_id);
        }

        $proRes = $this->product_model->get_products(20, 0, $condPro);
     
        $data['proRes'] = $proRes;

        //category with products
        $data['catleftRes'] = $this->db->query("SELECT category_id, category_name, friendly_url FROM wl_categories WHERE status='1' $srtQry GROUP BY category_id")->result_array();
        
        //banner
        $data['banner'] = get_db_field_value("wl_banners", "banner_image", "WHERE banner_page='product' AND banner_position='Top Banner' ORDER BY RAND()");
    
        $this->load->view('products/view_product_listing', $data);

    }
}

/* End of file member.php */

/* Location: .application/modules/products/controllers/products.php */