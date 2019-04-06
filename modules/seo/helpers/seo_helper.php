<?php

if (!defined('BASEPATH')) {

    exit('No direct script access allowed');

}

function locationName($loc)

{

    $ci = CI();
    $cnt = $ci->db->select('id')->from('tbl_country')->where("country_temp_name = '" . $loc . "'")->get()->num_rows();
    
    if ($cnt > 0) {
        return get_db_field_value('tbl_country', 'country_name', "WHERE country_temp_name = '" . $loc . "'");
    } else {

        $cnt = $ci->db->select('id')->from('tbl_states')->where("temp_title = '" . $loc . "'")->get()->num_rows();
        if ($cnt > 0) {
            return get_db_field_value('tbl_states', 'title', "WHERE temp_title = '" . $loc . "'");
        } else {

            $cnt = $ci->db->select('id')->from('tbl_city')->where("temp_title = '" . $loc . "'")->get()->num_rows();
            if ($cnt > 0) {
                return get_db_field_value('tbl_city', 'title', "WHERE temp_title = '" . $loc . "'");
            }
        }
    }

}

/* Get meta tags  from  wl_meta_tags */

if (!function_exists('getMeta')) {

    function getMeta()

    {

        $ci = CI();
        $ci->load->config('seo/config');
        //Check if it is subdomain
        $uri_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $uri_segments = explode('/', $uri_path);
        $st = $uri_segments[1];
        if (strstr($st, '.html')) {
            $st = substr($st, 0, -5);
        }
        $stArray = $ci->db->query("SELECT page_url, keyword_1, keyword_2, keyword_3 FROM wl_meta_tags WHERE is_fixed='L' AND page_url='" . $st . "'")->row_array();
        $locName = locationName($st);

        if (is_array($stArray) & !empty($stArray)) {
            $uri_page = $ci->uri->uri_string != '' ? $ci->uri->uri_string : "home";
            $uri_page = str_replace($uri_segments[1], '', $uri_page);
            $uri_page = trim($uri_page, '/');
            $urlSegment = $uri_page;
            $res = $ci->db->query("SELECT * FROM wl_meta_tags WHERE page_url='" . $st . "' ")->row();
            $location = $uri_page;
            $key1 = $stArray['keyword_1'];
            $key2 = $stArray['keyword_2'];
            $key3 = $stArray['keyword_3'];
            if (is_object($res)) {
                $uri_aligs_string_product = str_replace($st, '', $uri_page);
                $uri_aligs_string_product = trim($uri_aligs_string_product, '/');
                //get url Id
                $respro = $ci->db->query("SELECT * FROM wl_meta_tags WHERE page_url='" . $uri_aligs_string_product . "' ")->row();
                if (is_object($respro) && !empty($respro)) {
                    $resprosub = $ci->db->query("SELECT * FROM wl_subcontent WHERE status = '1' AND FIND_IN_SET($respro->entity_id,category_id)")->row();
                    if (is_object($resprosub) && !empty($resprosub)) {
                        //get cat name
                        $catName = "";
                        if ($respro->entity_type == 'category/index') {
                            $catName = get_db_field_value('wl_categories', 'category_name', "WHERE category_id = '" . $respro->entity_id . "'");
                        }
                        //With location and category
                        $locId = get_db_field_value("wl_meta_tags", "meta_id", "WHERE page_url = '" . $st . "'");
                        $resprosubloc = $ci->db->query("SELECT * FROM wl_subcontent WHERE status = '1' AND FIND_IN_SET($respro->entity_id,category_id) AND FIND_IN_SET($locId,location_id)")->row();
                        if (is_object($resprosubloc) && !empty($resprosubloc)) { //With location and category
                            $key1 = $resprosubloc->meta_key1;
                            $key2 = $resprosubloc->meta_key2;
                            $key3 = $resprosubloc->meta_key3;
                            return array(
                                "meta_title" => str_replace('{catname}', $catName, str_replace('{location}', $locName, str_replace('{key3}', $key3, str_replace('{key2}', $key2, str_replace('{key1}', $key1, $resprosubloc->meta_title))))),
                                "meta_keyword" => str_replace('{catname}', $catName, str_replace('{location}', $locName, str_replace('{key3}', $key3, str_replace('{key2}', $key2, str_replace('{key1}', $key1, $resprosubloc->meta_keyword))))),
                                "meta_description" => str_replace('{catname}', $catName, str_replace('{location}', $locName, str_replace('{key3}', $key3, str_replace('{key2}', $key2, str_replace('{key1}', $key1, $resprosubloc->meta_description))))),
                                "entity_type" => $respro->entity_type,
                                "entity_id" => $respro->entity_id,
                                "page_url" => $respro->page_url,
                            );
                        } else { //With category only
                            $key1 = $resprosub->meta_key1;
                            $key2 = $resprosub->meta_key2;
                            $key3 = $resprosub->meta_key3;
                            return array(
                                "meta_title" => str_replace('{catname}', $catName, str_replace('{location}', $locName, str_replace('{key3}', $key3, str_replace('{key2}', $key2, str_replace('{key1}', $key1, $resprosub->meta_title))))),
                                "meta_keyword" => str_replace('{catname}', $catName, str_replace('{location}', $locName, str_replace('{key3}', $key3, str_replace('{key2}', $key2, str_replace('{key1}', $key1, $resprosub->meta_keyword))))),
                                "meta_description" => str_replace('{catname}', $catName, str_replace('{location}', $locName, str_replace('{key3}', $key3, str_replace('{key2}', $key2, str_replace('{key1}', $key1, $resprosub->meta_description))))),
                                "entity_type" => $respro->entity_type,
                                "entity_id" => $respro->entity_id,
                                "page_url" => $respro->page_url,
                            );
                        }
                    } else {
                        $resprosubloc = $ci->db->query("SELECT * FROM wl_subloccontent WHERE status = '1' AND FIND_IN_SET($respro->meta_id,location_id)")->row();
                        if (is_object($resprosubloc) && !empty($resprosubloc)) {
                            $key1 = $resprosubloc->meta_key1;
                            $key2 = $resprosubloc->meta_key2;
                            $key3 = $resprosubloc->meta_key3;
                            return array(
                                "meta_title" => str_replace('{location}', $locName, str_replace('{key3}', $key3, str_replace('{key2}', $key2, str_replace('{key1}', $key1, $resprosubloc->meta_title)))),
                                "meta_keyword" => str_replace('{location}', $locName, str_replace('{key3}', $key3, str_replace('{key2}', $key2, str_replace('{key1}', $key1, $resprosubloc->meta_keyword)))),
                                "meta_description" => str_replace('{location}', $locName, str_replace('{key3}', $key3, str_replace('{key2}', $key2, str_replace('{key1}', $key1, $resprosubloc->meta_description)))),
                                "entity_type" => $respro->entity_type,
                                "entity_id" => $respro->entity_id,
                                "page_url" => $respro->page_url,
                            );
                        } else {
                            $key1 = $respro->keyword_1;
                            $key2 = $respro->keyword_2;
                            $key3 = $respro->keyword_3;
                            $catName = "";
                            if ($respro->entity_type == 'category/index') {
                                $catName = get_db_field_value('wl_categories', 'category_name', "WHERE category_id = '" . $respro->entity_id . "'");
                            }
                            return array(
                                "meta_title" => str_replace('{catname}', $catName, str_replace('{key3}', $key3, str_replace('{key2}', $key2, str_replace('{key1}', $key1, str_replace('{location}', $locName, $respro->meta_title))))),
                                "meta_keyword" => str_replace('{catname}', $catName, str_replace('{key3}', $key3, str_replace('{key2}', $key2, str_replace('{key1}', $key1, str_replace('{location}', $locName, $respro->meta_keyword))))),
                                "meta_description" => str_replace('{catname}', $catName, str_replace('{key3}', $key3, str_replace('{key2}', $key2, str_replace('{key1}', $key1, str_replace('{location}', $locName, $respro->meta_description))))),
                                "entity_type" => $respro->entity_type,
                                "entity_id" => $respro->entity_id,
                                "page_url" => $respro->page_url,
                            );
                        }
                    }
                } else {
                    $resprosubloc = $ci->db->query("SELECT * FROM wl_subloccontent WHERE status = '1' AND FIND_IN_SET($res->meta_id,location_id)")->row();
                    if (is_object($resprosubloc) && !empty($resprosubloc)) {
                        //pr($resprosubloc);
                        $key1 = $resprosubloc->meta_key1;
                        $key2 = $resprosubloc->meta_key2;
                        $key3 = $resprosubloc->meta_key3;
                        return array(
                            "meta_title" => str_replace('{location}', $locName, str_replace('{key3}', $key3, str_replace('{key2}', $key2, str_replace('{key1}', $key1, $resprosubloc->meta_title)))),
                            "meta_keyword" => str_replace('{location}', $locName, str_replace('{key3}', $key3, str_replace('{key2}', $key2, str_replace('{key1}', $key1, $resprosubloc->meta_keyword)))),
                            "meta_description" => str_replace('{location}', $locName, str_replace('{key3}', $key3, str_replace('{key2}', $key2, str_replace('{key1}', $key1, $resprosubloc->meta_description)))),
                            "entity_type" => $res->entity_type,
                            "entity_id" => $res->entity_id,
                            "page_url" => $res->page_url,
                        );
                        //dd($res);
                    } else {
                        $catName = "";
                        if ($res->entity_type == 'category/index') {
                            $catName = get_db_field_value('wl_categories', 'category_name', "WHERE category_id = '" . $res->entity_id . "'");
                        }
                        return array(
                            "meta_title" => str_replace('{catname}', $catName, str_replace('{key3}', $key3, str_replace('{key2}', $key2, str_replace('{key1}', $key1, str_replace('{location}', $locName, $res->meta_title))))),
                            "meta_keyword" => str_replace('{catname}', $catName, str_replace('{key3}', $key3, str_replace('{key2}', $key2, str_replace('{key1}', $key1, str_replace('{location}', $locName, $res->meta_keyword))))),
                            "meta_description" => str_replace('{catname}', $catName, str_replace('{key3}', $key3, str_replace('{key2}', $key2, str_replace('{key1}', $key1, str_replace('{location}', $locName, $res->meta_description))))),
                            "entity_type" => $res->entity_type,
                            "entity_id" => $res->entity_id,
                            "page_url" => $res->page_url,
                        );
                    }
                }
            } else {
                $uri_aligs_string = str_replace($st, '', $uri_page);
                $uri_aligs_string = trim($uri_aligs_string, '/');
                //check in database
                $res = $ci->db->query("SELECT * FROM wl_meta_tags WHERE page_url='" . $uri_aligs_string . "' ")->row();
                if (is_object($res)) {
                    $catName = "";
                    if ($res->entity_type == 'category/index') {
                        $catName = get_db_field_value('wl_categories', 'category_name', "WHERE category_id = '" . $res->entity_id . "'");
                    }
                    $key1 = $res->keyword_1;
                    $key2 = $res->keyword_2;
                    $key3 = $res->keyword_3;
                    return array(
                        "meta_title" => str_replace('{catname}', $catName, str_replace('{key3}', $key3, str_replace('{key2}', $key2, str_replace('{key1}', $key1, str_replace('{location}', $locName, $res->meta_title))))),
                        "meta_keyword" => str_replace('{catname}', $catName, str_replace('{key3}', $key3, str_replace('{key2}', $key2, str_replace('{key1}', $key1, str_replace('{location}', $locName, $res->meta_keyword))))),
                        "meta_description" => str_replace('{catname}', $catName, str_replace('{key3}', $key3, str_replace('{key2}', $key2, str_replace('{key1}', $key1, str_replace('{location}', $locName, $res->meta_description))))),
                        "entity_type" => $res->entity_type,
                        "entity_id" => $res->entity_id,
                        "page_url" => $res->page_url,
                    );
                } else {
                    return $ci->config->item('default_meta');
                }
            }
        } else {
            $uri_page = $ci->uri->uri_string != '' ? $ci->uri->uri_string : "home";
            $res = $ci->db->query("SELECT * FROM wl_meta_tags WHERE page_url='" . $uri_page . "'")->row();
            if (is_object($res)) {
                $subdomain_location = location_name(); //changes by Bittu
                if ($ci->router->fetch_class() == 'category' || $ci->router->fetch_class() == 'products') {
                    if ($ci->router->fetch_class() == 'category') {
                        $nm = get_db_field_value("wl_categories", 'category_name', "WHERE category_id = '" . $res->entity_id . "'");
                        return array(
                            "meta_title" => "$nm Manufacturers in Delhi, $nm Suppliers in Delhi",
                            "meta_keyword" => "$nm Manufacturers in Delhi, Wholesale $nm in Delhi, $nm Exporters India, $nm Suppliers in Delhi",
                            "meta_description" => "$nm Manufacturers in Delhi - blu impex Most Trusted $nm wholesale suppliers, Best Quality $nm exporters India. Leading Industry since 2016. Best Price.",
                            "entity_type" => $res->entity_type,
                            "entity_id" => $res->entity_id,
                            "page_url" => $res->page_url,
                        );
                    } else {
                        $nm = get_db_field_value("wl_products", 'product_name', "WHERE products_id = '" . $res->entity_id . "'");
                        return array(
                            "meta_title" => "$nm Manufacturers in $subdomain_location, $nm Suppliers in $subdomain_location",
                            "meta_keyword" => "$nm Manufacturers in $subdomain_location, Wholesale $nm in $subdomain_location, $nm Exporters India, $nm Suppliers in $subdomain_location",
                            "meta_description" => "$nm Manufacturers in $subdomain_location - blu impex Most Trusted $nm wholesale suppliers, Best Quality $nm exporters India. Leading Industry since 2016. Best Price.",
                            "entity_type" => $res->entity_type,
                            "entity_id" => $res->entity_id,
                            "page_url" => $res->page_url,
                        );
                    }
                } elseif ($ci->router->fetch_class() == 'service') {
                    $nm = get_db_field_value("wl_service_cat", 'service_name', "WHERE service_id = '" . $res->entity_id . "'");
                    //echo_sql();
                    return array(
                        "meta_title" => "$nm Manufacturers in $subdomain_location, $nm Suppliers in $subdomain_location",
                        "meta_keyword" => "$nm Manufacturers in $subdomain_location, Wholesale $nm in $subdomain_location, $nm Exporters India, $nm Suppliers in $subdomain_location",
                        "meta_description" => "$nm Manufacturers in $subdomain_location - blu impex Most Trusted $nm wholesale suppliers, Best Quality $nm exporters India. Leading Industry since 2016. Best Price.",
                        "entity_type" => $res->entity_type,
                        "entity_id" => $res->entity_id,
                        "page_url" => $res->page_url,
                    );
                } else {
                    return array(
                        "meta_title" => $res->meta_title,
                        "meta_keyword" => $res->meta_keyword,
                        "meta_description" => $res->meta_description,
                        "entity_type" => $res->entity_type,
                        "entity_id" => $res->entity_id,
                        "page_url" => $res->page_url,
                    );
                }
            } else {
                return $ci->config->item('default_meta');
            }
        }

    }

}

/* Check  meta url already exits  */

if (!function_exists('check_meta')) {

    function check_meta($page_url)

    {

        $num = 0;
        if ($page_url != '') {
            $ci = CI();
            $ci->db->from('wl_meta_tags');
            $ci->db->where(array('page_url' => $page_url));
            $num = $ci->db->count_all_results();
        }
        return $num;

    }

}

/* Use  to insert all default page meta into  wl_meta_tags  */

if (!function_exists('create_listing_page_meta')) {

    function create_listing_page_meta()
    {
        $ci = CI();
        $ci->load->config('seo/config');
        $page_array = $ci->config->item('controller_name');
        if (is_array($page_array) && !empty($page_array)) {
            foreach ($page_array as $k => $v) {
                $meta_array = array(
                    'is_fixed' => 'Y',
                    'entity_type' => $v,
                    'entity_id' => 0,
                    'page_url' => $k,
                    'meta_title' => $k,
                    'meta_description' => $k,
                    'meta_keyword' => $k,
                );
                create_meta($meta_array);
            }
        }
    }

}

/* Upade meta url */

if (!function_exists('update_meta_page_url')) {

    function update_meta_page_url($type, $entity_id, $page_url)
    {
        $ci = CI();
        if ($entity_id != '' && $type != '' && $page_url != '') {
            $where = "entity_type ='" . $type . "' AND entity_id = $entity_id  ";
            $cnt = count_record('wl_meta_tags', "entity_type ='" . $type . "' AND entity_id = $entity_id  ");
            //echo $cnt; exit;
            if ($cnt > 0) {
                $ci->db->update("wl_meta_tags", array('page_url' => $page_url), $where, false);
            } else {
                $ci->db->query("INSERT INTO wl_meta_tags SET entity_type ='" . $type . "', entity_id = '" . $entity_id . "', page_url = '" . $page_url . "'");
            }
        }
    }

}

/* Create  meta tags  */

if (!function_exists('create_meta')) {

    function create_meta($data = array())
    {
        $ci = CI();
        if (is_array($data) && !empty($data) && array_key_exists('page_url', $data)) {
            $ci->db->insert("wl_meta_tags", $data);
        }
    }

}

if (!function_exists('seo_url_title')) {

    function seo_url_title($str)
    {
        $str = preg_replace("~[^a-zA-Z0-9-_/]~", "-", $str);
        $str = preg_replace("~[/]{2,15}~", "/", $str);
        $str = preg_replace("~[-]{2,15}~", "-", $str);
        $str = strtolower($str);
        $str = trim($str, "-");
        return $str;
    }

}

function seo_add_form_element($params)

{

    $default_params = array(
        'heading_element' => array(
            'field_heading' => "Page Name",
            'field_name' => "page_name",
            'field_placeholder' => "Your Page Name",
            'exparams' => 'size="60"',
        ),
        'url_element' => array(
            'field_heading' => "Page URL",
            'field_name' => "friendly_url",
            'field_placeholder' => "Your Page URL",
            'exparams' => 'size="30"',
            'pre_seo_url' => '',
            'pre_url_tag' => true,
        ),
        'product_url_element' => array(
            'show_component' => false,
            'field_heading' => "Page URL",
            'field_name' => "product_friendly_url",
            'field_placeholder' => "Your Page URL",
            'exparams' => 'size="30"',
            'pre_seo_url' => '',
            'pre_url_tag' => false,
        ),
    );

    if (array_key_exists('heading_element', $params)) {
        $default_params['heading_element'] = array_merge($default_params['heading_element'], $params['heading_element']);
    }

    if (array_key_exists('url_element', $params)) {
        $default_params['url_element'] = array_merge($default_params['url_element'], $params['url_element']);
    }

    if (array_key_exists('product_url_element', $params)) {
        $default_params['product_url_element'] = array_merge($default_params['product_url_element'], $params['product_url_element']);
    }

    $heading_element_field_heading = $default_params['heading_element']['field_heading'];
    $heading_element_field_name = $default_params['heading_element']['field_name'];
    $heading_element_field_placeholder = $default_params['heading_element']['field_placeholder'];
    $heading_element_field_exparams = $default_params['heading_element']['exparams'];
    $url_element_field_heading = $default_params['url_element']['field_heading'];
    $url_element_field_name = $default_params['url_element']['field_name'];
    $url_element_field_placeholder = $default_params['url_element']['field_placeholder'];
    $url_element_field_exparams = $default_params['url_element']['exparams'];
    $pre_seo_url = $default_params['url_element']['pre_seo_url'];
    $pre_url_tag = $default_params['url_element']['pre_url_tag'];
    $url_pelement_field_heading = $default_params['product_url_element']['field_heading'];
    $url_pelement_field_name = $default_params['product_url_element']['field_name'];
    $url_pelement_field_placeholder = $default_params['product_url_element']['field_placeholder'];
    $url_pelement_field_exparams = $default_params['product_url_element']['exparams'];
    $pre_pseo_url = $default_params['product_url_element']['pre_seo_url'];
    $pre_purl_tag = $default_params['product_url_element']['pre_url_tag'];

    ?>

  <div class="form-group">

    <label class="col-md-3 control-label"><span class="required">*</span><?php echo $heading_element_field_heading; ?></label>

    <div class="col-md-6">

      <input type="text" name="<?php echo $heading_element_field_name; ?>" value="<?php echo set_value($heading_element_field_name); ?>"  class="url_creator form-control" placeholder="<?php echo $heading_element_field_placeholder; ?>" <?php echo $heading_element_field_exparams; ?> /> <a href="#" class="url_from_title">Create URL</a>

      <div id="error_url_creator" class="red"><?php echo form_error($heading_element_field_name); ?></div>

    </div>

  </div>

  <div class="form-group">

    <label class="col-md-3 control-label"><span class="required">**</span><?php echo $url_element_field_heading; ?></label>

    <div class="col-md-6 col-xs-12">

      <div class="seo_url">

  <?php

    if ($pre_url_tag === true) {

        ?>

          <input type="hidden" name="pre_seo_url" id="pre_seo_url" value="<?php echo $pre_seo_url; ?>" title="<?php echo $pre_seo_url; ?>" readonly />

    <?php

    }

    ?>

        <input type="text" name="<?php echo $url_element_field_name; ?>" value="<?php echo set_value($url_element_field_name); ?>"  class="seo_friendly_url form-control" placeholder="<?php echo $url_element_field_placeholder; ?>" <?php echo $url_element_field_exparams; ?> readonly/> <a href="#" class="change_url">Change</a>

      </div>

      <div id="error_friendly_url" class="red"><?php echo form_error($url_element_field_name); ?></div>

    </div>

  </div>

        <?php

    if ($default_params['product_url_element']['show_component'] === true) {

        ?>

    <tr class="trOdd">

      <td height="26" align="right"><span class="required">**</span> <?php echo $url_pelement_field_heading; ?> :</td>

      <td>

        <div class="seo_url">

    <?php

        if ($pre_purl_tag === true) {

            ?>

            <input type="text" name="pre_product_seo_url" id="pre_product_seo_url" value="<?php echo $pre_pseo_url; ?>"  size="40" title="<?php echo $pre_pseo_url; ?>" readonly />

      <?php

        }

        ?>

          <input type="text" name="<?php echo $url_pelement_field_name; ?>" value="<?php echo set_value($url_pelement_field_name); ?>"  class="seo_pfriendly_url" id="seo_pfriendly_url" placeholder="<?php echo $url_pelement_field_placeholder; ?>" <?php echo $url_pelement_field_exparams; ?> readonly/> <a href="#" class="change_url">Change</a>

        </div>

        <div id="error_pfriendly_url" class="red"><?php echo form_error($url_pelement_field_name); ?></div>

      </td>

    </tr>

          <?php

    }

}

function seo_edit_form_element($params)

{

    //trace($params);

    $default_params = array(
        'heading_element' => array(
            'field_heading' => "Page Name",
            'field_name' => "page_name",
            'field_value' => "",
            'field_placeholder' => "Your Page Name",
            'exparams' => 'size="60"',
        ),
        'url_element' => array(
            'field_heading' => "Page URL",
            'field_name' => "friendly_url",
            'field_value' => "",
            'field_placeholder' => "Your Page URL",
            'exparams' => 'size="30"',
            'pre_seo_url' => '',
            'pre_url_tag' => false,
        ),
    );

    if (array_key_exists('heading_element', $params)) {
        $default_params['heading_element'] = array_merge($default_params['heading_element'], $params['heading_element']);
    }

    if (array_key_exists('url_element', $params)) {
        $default_params['url_element'] = array_merge($default_params['url_element'], $params['url_element']);
    }

    $heading_element_field_heading = $default_params['heading_element']['field_heading'];
    $heading_element_field_name = $default_params['heading_element']['field_name'];
    $heading_element_field_value = $default_params['heading_element']['field_value'];
    $heading_element_field_placeholder = $default_params['heading_element']['field_placeholder'];
    $heading_element_field_exparams = $default_params['heading_element']['exparams'];

    if (array_key_exists('cat_id', $params['heading_element'])) {
        //echo 'ssss';
        $heading_cat_id = $default_params['heading_element']['cat_id'];
    } else {
        $heading_cat_id = "";
    }

    $url_element_field_heading = $default_params['url_element']['field_heading'];
    $url_element_field_name = $default_params['url_element']['field_name'];
    $url_element_field_value = $default_params['url_element']['field_value'];
    $url_element_field_placeholder = $default_params['url_element']['field_placeholder'];
    $url_element_field_exparams = $default_params['url_element']['exparams'];
    $pre_seo_url = $default_params['url_element']['pre_seo_url'];
    $pre_url_tag = $default_params['url_element']['pre_url_tag'];

    ?>

  <div class="form-group">

    <label class="col-md-3 control-label"><span class="required">*</span> <?php echo $heading_element_field_heading; ?> :</label>

    <div class="col-md-6">

      <input type="text" name="<?php echo $heading_element_field_name; ?>" value="<?php echo set_value($heading_element_field_name, $heading_element_field_value); ?>"  placeholder="<?php echo $heading_element_field_placeholder; ?>" <?php echo $heading_element_field_exparams; ?> /> <br />

      <div id="error_url_creator" class="red"><?php echo form_error($heading_element_field_name); ?></div>

    </div>

  </div>

  <div class="form-group">

    <label class="col-md-3 control-label"><span class="required">**</span> <?php echo $url_element_field_heading; ?> :</label>

    <div class="col-md-6 col-xs-12">

      <div class="seo_url">

  <?php

    if ($pre_url_tag === true) {

        ?>

          <input type="text" name="pre_seo_url" id="pre_seo_url" <?php echo $heading_element_field_exparams; ?> value="<?php echo $pre_seo_url; ?>"  title="<?php echo $pre_seo_url; ?>" <?php echo ($heading_cat_id <= 4 && $heading_cat_id != '') ? 'readonly="readonly"' : ''; ?> />

    <?php

    }

    ?>

        <input type="text" name="<?php echo $url_element_field_name; ?>" value="<?php echo set_value($url_element_field_name, $url_element_field_value); ?>"  class="seo_friendly_url edit_url form-control" placeholder="<?php echo $url_element_field_placeholder; ?>" <?php echo $url_element_field_exparams; ?> <?php echo ($heading_cat_id <= 4 && $heading_cat_id != '') ? 'readonly="readonly"' : ''; ?> />

      </div>

      <div id="error_friendly_url" class="red"><?php echo form_error($url_element_field_name); ?></div>

      <script type="text/javascript">

        prev_url_val = '<?php echo set_value($url_element_field_name, $url_element_field_value); ?>';

      </script>

    </div>

  </div>

  <?php

}

/* * ***************** Making the Meta tags  much better  ************** */

if (!function_exists('clean')) {

    function clean($text)
    {
        $text = html_entity_decode($text, ENT_QUOTES, 'UTF-8');
        $text = strip_tags($text); //erases any html markup
        $text = preg_replace('/\s\s+/', ' ', $text); //erase possible duplicated white spaces
        $text = str_replace(array('\r\n', '\n', '+'), ',', $text); //replace possible returns
        return trim($text);
    }

}

if (!function_exists('cmp')) {

    function cmp($a, $b)
    {
        if ($a == $b) {
            return 0;
        }
        return ($a < $b) ? 1 : -1;
    }

}

if (!function_exists('get_text')) {

    function get_text($text, $length = 220)
    {
        return limit_chars(clean($text), $length, '', true);
    }

}

if (!function_exists('get_keywords')) {

    function get_keywords($text, $max_keys = 20)
    {
        $ci = CI();
        $ci->load->config('seo/config');
        $min_word_length = $ci->config->item('min_word_length');
        $banned_words = $ci->config->item('banned_words');
        //array to keep word->number of repetitions
        $wordcount = array_count_values(str_word_count(clean($text), 1));
        foreach ($wordcount as $key => $value) {
            if ((strlen($key) <= $min_word_length) || in_array($key, $banned_words)) {
                unset($wordcount[$key]);
            }
        }
        //sort keywords from most repetitions to less
        uasort($wordcount, 'cmp');
        //keep only X keywords
        $wordcount = array_slice($wordcount, 0, $max_keys);
        //return keywords on a string
        return implode(', ', array_keys($wordcount));
    }

}

if (!function_exists('limit_chars')) {

    function limit_chars($str, $limit = 100, $end_char = null, $preserve_words = false)
    {
        $end_char = ($end_char === null) ? 'â€¦' : $end_char;
        $limit = (int) $limit;
        if (trim($str) === '' || strlen($str) <= $limit) {
            return $str;
        }
        if ($limit <= 0) {
            return $end_char;
        }
        if ($preserve_words === false) {
            return rtrim(mb_substr($str, 0, $limit)) . $end_char;
        }
        // Don't preserve words. The limit is considered the top limit.
        // No strings with a length longer than $limit should be returned.
        if (!preg_match('/^.{0,' . $limit . '}\s/us', $str, $matches)) {
            return $end_char;
        }
        return rtrim($matches[0]) . ((strlen($matches[0]) === strlen($str)) ? '' : $end_char);
    }
}

function imagealtTitle($pretext, $name, $posttext)

{

    $ci = CI();
    //Check if it is subdomain
    $uri_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    $uri_segments = explode('/', $uri_path);
    $st = $uri_segments[1];
    if (strstr($st, '.html')) {
        $st = substr($st, 0, -5);
    }
    $stArray = $ci->db->query("SELECT meta_id, page_url FROM wl_meta_tags WHERE is_fixed='L' AND page_url='" . $st . "'")->row_array();
    if (is_array($stArray) & !empty($stArray)) {
        echo $pretext . ' ' . $name . ' ' . $posttext . ' in ' . ucwords(locationName($st));
    } else {
        echo $name;
    }

}

