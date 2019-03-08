<?php

class Products extends Admin_Controller
{

    public function __construct()
    {

        parent::__construct();

        $this->load->model(array('products/product_model', 'size/size_model', 'color/color_model'));

        $this->load->helper('category/category');

        $this->config->set_item('menu_highlight', 'product management');

    }

    public function index($page = null)
    {

        $this->load->helper(array('products/product'));

        $condtion = array();

        $pagesize = (int) $this->input->get_post('pagesize');

        $config['limit'] = ($pagesize > 0) ? $pagesize : $this->config->item('pagesize');

        $offset = ($this->input->get_post('per_page') > 0) ? $this->input->get_post('per_page') : 0;

        $base_url = current_url_query_string(array('filter' => 'result'), array('per_page'));

        $category_id = (int) $this->uri->segment(4, 0);

        $status = $this->input->get_post('status', true);

        $cat_name = '';

        if ($category_id > 0) {

            $condtion['category_id'] = $category_id;

            $cat_name = 'in ';

            $cat_name .= get_db_field_value('wl_categories', 'category_name', "WHERE category_id='$category_id'");

        }

        if ($status != '') {

            $condtion['status'] = $status;

        }

        $res_array = $this->product_model->get_products($config['limit'], $offset, $condtion);

        $config['total_rows'] = get_found_rows();

        $data['heading_title'] = 'Product Lists';

        $data['res'] = $res_array;

        $data['page_links'] = admin_pagination($base_url, $config['total_rows'], $config['limit'], $offset);

        if ($this->input->post('status_action') != '') {

            if ($this->input->post('status_action') == 'Delete') {

                $prod_id = $this->input->post('arr_ids');

                foreach ($prod_id as $v) {

                    $where = array('entity_type' => 'products/details', 'entity_id' => $v);

                    $this->product_model->safe_delete('wl_meta_tags', $where, true);

                }

            }

            $this->session->set_flashdata('success', lang('deleted'));

            $this->update_status('wl_products', 'products_id');

        }

        /* Product set as a */

        if ($this->input->post('set_as') != '') {

            $set_as = $this->input->post('set_as', true);

            $this->set_as('wl_products', 'products_id', array($set_as => '1'));

        }

        if ($this->input->post('unset_as') != '') {

            $unset_as = $this->input->post('unset_as', true);

            $this->set_as('wl_products', 'products_id', array($unset_as => '0'));

        }

        /* End product set as a */

        /* upload Excel */

        if ($this->input->post('action') == 'submit_excel') {

            $this->form_validation->set_rules('excel_file', 'Upload Excel File', 'required|callback_check_upload_excel');

            if ($this->form_validation->run() == true) {

                require_once FCPATH . 'apps/third_party/Excel/reader.php';

                $data = new Spreadsheet_Excel_Reader();

                $data->setOutputEncoding('CP1251');

                //$data->setUTFEncoder('');

                chmod($_FILES["excel_file"]["tmp_name"], 0777);

                $data->read($_FILES["excel_file"]["tmp_name"]);

                $worksheet = $data->sheets[0]['cells'];

                $process_add = $this->product_model->add_bulk_upload_product($worksheet);

                //echo "sss";

                if ($process_add === true) {

                    $this->session->set_userdata(array('msg_type' => 'success'));

                    $this->session->set_flashdata('success', 'Excel file inserted successfully!!!');

                    redirect('sitepanel/products', '');

                } else {

                    $this->form_validation->_error_array['image'] = 'Uploading Failed. Please Try Again';

                }

            }

        }

        $data['category_result_found'] = "Total " . $config['total_rows'] . " result(s) found " . strtolower($cat_name) . " ";

        //print_r($data);exit;

        $this->load->view('catalog/view_product_list', $data);

    }

    public function add()
    {

        $data['heading_title'] = 'Add Product';
        $categoryposted = $this->input->post('catid');
        $data['categoryposted'] = $categoryposted;
        $categoryposted = $this->input->post('catid');
        $data['ckeditor'] = set_ck_config(array('textarea_id' => 'description'));
        $data['ckeditor1'] = set_ck_config(array('textarea_id' => 'custom_description'));
        $data['ckeditor2'] = set_ck_config(array('textarea_id' => 'description_p'));
        $data['ckeditor3'] = set_ck_config(array('textarea_id' => 'custom_description_p'));
        $posted_friendly_url = $this->input->post('friendly_url');
        $this->cbk_friendly_url = seo_url_title($posted_friendly_url);
        $img_allow_size = $this->config->item('allow.file.size');
        $img_allow_dim = $this->config->item('allow.imgage.dimension');
        $seo_url_length = $this->config->item('seo_url_length');

		$this->form_validation->set_error_delimiters("<div class='required'>", "</div>");
        $this->form_validation->set_rules('category_id', 'Category Name', "required");
        //$this->form_validation->set_rules('store_id[]', 'Stores', "required");
        $this->form_validation->set_rules('product_name', 'Product Name', "trim|required|max_length[100]");
        //$this->form_validation->set_rules('product_name_p', 'Product Name in Portuguese', "trim|required|max_length[100]");
        $this->form_validation->set_rules('friendly_url', 'Page URL', "trim|required|max_length[$seo_url_length]|xss_clean|unique[wl_meta_tags.page_url ='" . $this->cbk_friendly_url . "'] ");
        $this->form_validation->set_rules('product_code', 'Product Code', "trim|required|max_length[65]|unique[wl_products.product_code='" . $this->db->escape_str($this->input->post('product_code')) . "' AND status!='2']");
        $this->form_validation->set_rules('quantity', 'Base Quantity', "trim|required|is_numeric");
        //$this->form_validation->set_rules('color_id[]', 'Color', "trim|required");
        //$this->form_validation->set_rules('size_id[]', 'Size', "trim|required");
        //$this->form_validation->set_rules('size_chart', 'Size Chart', "file_allowed_type[image]", "trim");
        $this->form_validation->set_rules('product_price', 'Price', "trim|required|is_valid_amount|greater_than[0]|less_than[10000000]");
        $this->form_validation->set_rules('product_discounted_price', 'Discount Price', "trim|is_valid_amount|callback_check_price|less_than[10000000]");
        $this->form_validation->set_rules('product_alt', 'Alt', "trim|max_length[100]");
        $this->form_validation->set_rules('browsed_image', 'Browsed Image', "trim|required");
        $this->form_validation->set_rules('products_description', 'Description', "trim|max_length[8500]");
        //$this->form_validation->set_rules('products_description_p', 'Description in Protuguese', "trim|max_length[8500]");
        $this->form_validation->set_rules('products_custom_description', 'Policy', "trim|max_length[8500]");
        //$this->form_validation->set_rules('products_custom_description_p', 'Policy in Portuguese', "trim|max_length[8500]");

        if ($this->form_validation->run() === true) {
            $postCategory = $this->input->post('category_id');
            $category_links = "";
            $catlink = $ctl = "";
            foreach ($postCategory as $ctv) {
                $catlink = get_parent_categories($ctv, "AND status='1'", "category_id,parent_id");
                $ctl = array_keys($catlink);
                $category_links .= implode(",", $ctl) . ',';
            }

            $category_links = substr($category_links, 0, -1);
            $redirect_url = "products/detail";
            $product_alt = $this->input->post('product_alt');

            if ($product_alt == '') {
                $product_alt = $this->input->post('product_name');
            }

            $discounted_price = $this->input->post('product_discounted_price', true);
            $discounted_price = ($discounted_price == '') ? "0.0000" : $discounted_price;
            
            $store_ids = implode(",", $this->input->post('store_id'));
            $attribute = ($this->input->post('attribute') != '') ? $this->input->post('attribute') : '';
            $posted_data = array(
                'category_id' => implode(',', $this->input->post('category_id')),
                'store_id' => $store_ids,
                'category_links' => $category_links,
                'product_name' => $this->input->post('product_name', true),
                'friendly_url' => $this->cbk_friendly_url,
                'product_code' => $this->input->post('product_code', true),
                'product_qty' => $this->input->post('quantity', true),
                'products_attributes' => json_encode($attribute),
                'product_price' => $this->input->post('product_price', true),
                'product_discounted_price' => $discounted_price,
                'product_alt' => $product_alt,
                'products_description' => $this->input->post('products_description'),
                'products_custom_description' => $this->input->post('products_custom_description'),
                'product_added_date' => $this->config->item('config.date.time'),
            );

            //trace($posted_data); exit;
            $productId = $this->product_model->safe_insert('wl_products', $posted_data, false);
            $this->add_select_product_media($productId);
            if ($productId > 0) {
                $meta_array = array(
                    'entity_type' => $redirect_url,
                    'entity_id' => $productId,
                    'page_url' => $this->cbk_friendly_url,
                    'meta_title' => get_text($this->input->post('product_name'), 80),
                    'meta_description' => get_text($this->input->post('products_description')),
                    'meta_keyword' => get_keywords($this->input->post('products_description')),
                );
                create_meta($meta_array);
            }

            $this->session->set_userdata(array('msg_type' => 'success'));
            $this->session->set_flashdata('success', lang('success'));
            redirect('sitepanel/products/index/' . $this->input->post('category_id'), '');
        }

        /* Global Attributes */

        /* Available Color Records */

        $color_cond_config = array(

            'condition' => " AND status='1' ",

            'order' => 'color_name ',

        );

        $colors = $this->color_model->getcolors($color_cond_config);

        $data['colors'] = $colors;

        /* Available Size Records */

        $size_cond_config = array(

            'condition' => " AND status='1' ",

            'order' => 'size_name ',

        );

        $sizes = $this->size_model->getsizes($size_cond_config);

        $data['sizes'] = $sizes;

        /* Available Size Records */

        $data['store'] = $this->db->query("Select setId, store_name from wl_store WHERE status = '1'")->result_array();

        $data['attributes'] = $this->db->query("SELECT * FROM wl_attributes WHERE status = '1' order by id")->result_array();

        /* Global Attributes Ends */

        $this->load->view('catalog/view_product_add', $data);

    }

    public function edit($productId)
    {

        $data['heading_title'] = 'Edit Product';

        $productId = (int) $this->uri->segment(4);

        $option = array('productid' => $productId);

        $res = $this->product_model->get_products(1, 0, $option);

        $data['ckeditor'] = set_ck_config(array('textarea_id' => 'description'));

        $data['ckeditor1'] = set_ck_config(array('textarea_id' => 'products_custom_description'));

        $data['ckeditor2'] = set_ck_config(array('textarea_id' => 'description_p'));

        $data['ckeditor3'] = set_ck_config(array('textarea_id' => 'custom_description_p'));

        $img_allow_size = $this->config->item('allow.file.size');

        $img_allow_dim = $this->config->item('allow.imgage.dimension');

        $posted_friendly_url = $this->input->post('friendly_url');

        $this->cbk_friendly_url = seo_url_title($posted_friendly_url);

        $seo_url_length = $this->config->item('seo_url_length');

        $this->form_validation->set_error_delimiters("<div class='required'>", "</div>");

        if (is_array($res) && !empty($res)) {

            $res = $res[0];

            $this->form_validation->set_rules('category_id', 'Category Name', "required");

            //$this->form_validation->set_rules('store_id[]', 'Stores', "required");

            $this->form_validation->set_rules('product_name', 'Product Name', "trim|required|max_length[100]");

            // $this->form_validation->set_rules('product_name_p', 'Product Name in Portuguese', "trim|required|max_length[100]");

            $this->form_validation->set_rules('friendly_url', 'Page URL', "trim|required|max_length[$seo_url_length]|xss_clean|unique[wl_meta_tags.page_url ='" . $this->cbk_friendly_url . "' AND entity_id !='" . $res['products_id'] . "'] ");

            $this->form_validation->set_rules('product_code', 'Product Code', "trim|required|max_length[65]|unique[wl_products.product_code='" . $this->db->escape_str($this->input->post('product_code')) . "' AND status!='2' AND products_id != '" . $res['products_id'] . "']");

            $this->form_validation->set_rules('quantity', 'Base Quantity', "trim|required|is_numeric");

            //$this->form_validation->set_rules('color_id[]', 'Color', "trim|required");

            //$this->form_validation->set_rules('size_id[]', 'Size', "trim|required");

            //$this->form_validation->set_rules('size_chart', 'Size Chart', "file_allowed_type[image]", "trim");

            $this->form_validation->set_rules('product_price', 'Price', "trim|required|is_valid_amount|greater_than[0]|less_than[10000000]");

            $this->form_validation->set_rules('product_discounted_price', 'Discount Price', "trim|is_valid_amount|callback_check_price|less_than[10000000]");

            $this->form_validation->set_rules('product_alt', 'Alt', "trim|max_length[100]");

            $this->form_validation->set_rules('browsed_image', 'Browsed Image', "trim");

            $this->form_validation->set_rules('products_description', 'Description', "trim|max_length[8500]");

            //$this->form_validation->set_rules('products_description_p', 'Description in Protuguese', "trim|max_length[8500]");

            $this->form_validation->set_rules('products_custom_description', 'Custom Description', "trim|max_length[8500]");

            //$this->form_validation->set_rules('products_custom_description_p', 'Policy in Portuguese', "trim|max_length[8500]");

            if ($this->form_validation->run() == true) {

                //$category_links = get_parent_categories($this->input->post('category_id'), "AND status='1'", "category_id,parent_id");

                //$category_links = array_keys($category_links);

                //$category_links = implode(",", $category_links);

                $postCategory = $this->input->post('category_id');

                $category_links = "";

                $catlink = $ctl = "";

                foreach ($postCategory as $ctv) {

                    $catlink = get_parent_categories($ctv, "AND status='1'", "category_id,parent_id");

                    $ctl = array_keys($catlink);

                    $category_links .= implode(",", $ctl) . ',';

                }

                $category_links = substr($category_links, 0, -1);

                $author_name = $this->input->post('author_name');

                $product_alt = $this->input->post('product_alt');

                if ($product_alt == '') {

                    $product_alt = $this->input->post('product_name');

                }

                $discounted_price = $this->input->post('product_discounted_price', true);

                $discounted_price = ($discounted_price == '') ? "0.0000" : $discounted_price;

                //size

                //$posted_size_id = $this->input->post('size_id');

                //$posted_size_id = !is_array($posted_size_id) ? array() : $posted_size_id;

                //$size_ids = implode(",", $posted_size_id);

                //color

                //$posted_color_id = $this->input->post('color_id');

                //$posted_color_id = !is_array($posted_color_id) ? array() : $posted_color_id;

                //$color_ids = implode(",", $posted_color_id);

                //size file

                $uploaded_file = $res['products_size_chart'];

                $unlink_image = array('source_dir' => "product_images/document", 'source_file' => $res['products_size_chart']);

                if (!empty($_FILES) && $_FILES['size_chart']['name'] != '') {

                    $this->load->library('upload');

                    $uploaded_data = $this->upload->my_upload('size_chart', 'product_images/document');

                    if (is_array($uploaded_data) && !empty($uploaded_data)) {

                        $uploaded_file = $uploaded_data['upload_data']['file_name'];

                        removeImage($unlink_image);

                    }

                }

                //end

                $store_ids = implode(",", $this->input->post('store_id'));

                $posted_data = array(

                    'category_id' => implode(',', $this->input->post('category_id')),

                    'store_id' => $store_ids,

                    'category_links' => $category_links,

                    'product_name' => $this->input->post('product_name', true),

                    // 'product_name_p' => $this->input->post('product_name_p', TRUE),

                    'friendly_url' => $this->cbk_friendly_url,

                    'product_code' => $this->input->post('product_code', true),

                    'product_qty' => $this->input->post('quantity', true),

                    //'color_ids' => $color_ids,

                    //'size_ids' => $size_ids,

                    //'products_size_chart' => $uploaded_file,

                    'products_attributes' => json_encode($this->input->post('attribute')),

                    'product_price' => $this->input->post('product_price', true),

                    'product_discounted_price' => $discounted_price,

                    'product_alt' => $product_alt,

                    'products_description' => $this->input->post('products_description'),

                    //'products_description_p' => $this->input->post('products_description_p'),

                    'products_custom_description' => $this->input->post('products_custom_description'),

                    //'products_custom_description_p' => $this->input->post('products_custom_description_p'),

                );

                $where = "products_id = '" . $res['products_id'] . "'";

                $this->product_model->safe_update('wl_products', $posted_data, $where, false);

                $this->add_select_product_media($res['products_id']);

                //$this->edit_product_media($res['products_id']);

                update_meta_page_url('products/detail', $res['products_id'], $this->cbk_friendly_url);

                $this->session->set_userdata(array('msg_type' => 'success'));

                $this->session->set_flashdata('success', lang('successupdate'));

                if ($this->input->post('category_id') > 0) {

                    redirect('sitepanel/products/index/' . $this->input->post('category_id'), '');

                } else {

                    redirect('sitepanel/products/' . query_string(), '');

                }

            }

            /* Global Attributes */

            /* Available Color Records */

            $color_cond_config = array(

                'condition' => " AND status='1' ",

                'order' => 'color_name ',

            );

            $colors = $this->color_model->getcolors($color_cond_config);

            $data['colors'] = $colors;

            /* Available Size Records */

            $size_cond_config = array(

                'condition' => " AND status='1' ",

                'order' => 'size_name ',

            );

            $sizes = $this->size_model->getsizes($size_cond_config);

            $data['sizes'] = $sizes;

            /* Available Size Records */

            $data['store'] = $this->db->query("Select setId, store_name from wl_store WHERE status = '1'")->result_array();

            $data['attributes'] = $this->db->query("SELECT * FROM wl_attributes WHERE status = '1' order by id")->result_array();

            /* Global Attributes Ends */

            $data['res'] = $res;

            $media_option = array('productid' => $res['products_id']);

            $res_photo_media = $this->product_model->get_product_media(5, 0, $media_option);

            $data['res_photo_media'] = $res_photo_media;

            $this->load->view('catalog/view_product_edit', $data);

        } else {

            redirect('sitepanel/products', '');

        }

    }

    public function add_select_product_media($productId)
    {

        if (($productId > 0)) {

            $defalut_image = 'Y';

            $browsed_image = $this->input->post('browsed_image');

            if ($browsed_image != '') {

                $browsed_arr = explode(",", $browsed_image);

                foreach ($browsed_arr as $val) {

                    $src_path = UPLOAD_DIR . '/product_images/' . $val;

                    $dest_path = UPLOAD_DIR . '/products/' . $val;

                    if ($val != '' && @copy($src_path, $dest_path)) {

                        $add_data = array(

                            'products_id' => $productId,

                            'media_type' => 'photo',

                            'is_default' => $defalut_image,

                            'media' => $val,

                            'media_date_added' => $this->config->item('config.date.time'),

                        );

                        $this->product_model->safe_insert('wl_products_media', $add_data, false);

                        $defalut_image = "N";

                    }

                }

            }

        }

    }

    public function edit_select_product_media($productId)
    {

        if (($productId > 0)) {

            $res_photo_media = $this->product_model->get_product_media(5, 0, $media_option);

            $res_photo_media = !is_array($res_photo_media) ? array() : $res_photo_media;

            $defalut_image = 'Y';

            $browsed_image = $this->input->post('browsed_image');

            if ($browsed_image != '') {

                $browsed_arr = explode(",", $browsed_image);

                foreach ($browsed_arr as $key => $val) {

                    $src_path = UPLOAD_DIR . '/product_images/' . $val;

                    $dest_path = UPLOAD_DIR . '/products/' . $val;

                    if (array_key_exists($key, $res_photo_media) && $val != $res_photo_media[$key]['media']) {

                        $media_file = $res_photo_media[$key]['media'];

                        $media_id = $res_photo_media[$key]['id'];

                        if ($val != '' && @copy($src_path, $dest_path)) {

                            $add_data = array(

                                'products_id' => $productId,

                                'media_type' => 'photo',

                                'media' => $val,

                                'media_date_added' => $this->config->item('config.date.time'),

                            );

                            $where = "id = '" . $media_id . "'";

                            $this->product_model->safe_update('wl_products_media', $add_data, $where, false);

                            $unlink_image = array('source_dir' => "products", 'source_file' => $media_file);

                            removeImage($unlink_image);

                        }

                    } else {

                        if ($val != '' && @copy($src_path, $dest_path)) {

                            $add_data = array(

                                'products_id' => $productId,

                                'media_type' => 'photo',

                                'is_default' => 'N',

                                'media' => $val,

                                'media_date_added' => $this->config->item('config.date.time'),

                            );

                            $this->product_model->safe_insert('wl_products_media', $add_data, false);

                        }

                    }

                }

            }

        }

    }

    public function add_product_media($productId)
    {

        if (!empty($_FILES) && ($productId > 0)) {

            $default_image = 'Y';

            foreach ($_FILES as $key => $val) {

                $imgfld = $key;

                if (array_key_exists($imgfld, $_FILES)) {

                    $this->load->library('upload');

                    $data_upload_sugg = $this->upload->my_upload($imgfld, "products");

                    if (is_array($data_upload_sugg) && !empty($data_upload_sugg)) {

                        $add_data = array(

                            'products_id' => $productId,

                            'media_type' => 'photo',

                            'is_default' => $default_image,

                            'media' => $data_upload_sugg['upload_data']['file_name'],

                            'media_date_added' => $this->config->item('config.date.time'),

                        );

                        $this->product_model->safe_insert('wl_products_media', $add_data, false);

                    }

                    $default_image = 'N';

                }

            }

        }

    }

    public function edit_product_media($productId)
    {

        //Current Media Files resultset

        $media_option = array('productid' => $productId);

        $res_photo_media = $this->product_model->get_product_media(5, 0, $media_option);

        $res_photo_media = !is_array($res_photo_media) ? array() : $res_photo_media;

        $delete_media_files = $this->input->post('product_img_delete'); //checkbox items given for image deletion

        $arr_delete_items = array(); //holding our deleted ids for later use

        /* Tracking delete media ids coming from checkboxes */

        if (is_array($delete_media_files) && !empty($delete_media_files)) {

            foreach ($res_photo_media as $key => $val) {

                $media_id = $val['id'];

                if (array_key_exists($media_id, $delete_media_files)) {

                    $media_file = $res_photo_media[$key]['media'];

                    $unlink_image = array('source_dir' => "products", 'source_file' => $media_file);

                    removeImage($unlink_image);

                    array_push($arr_delete_items, $media_id);

                }

            }

        }

        /* Tracking Ends */

        /* Iterating Form Files */

        if (!empty($_FILES) && ($productId > 0)) {

            $sx = 0;

            foreach ($_FILES as $key => $val) {

                $imgfld = $key;

                if (array_key_exists($imgfld, $_FILES)) {

                    $this->load->library('upload');

                    $data_upload_sugg = $this->upload->my_upload($imgfld, "products");

                    if (is_array($data_upload_sugg) && !empty($data_upload_sugg)) {

                        /*  uploading successful  */

                        $add_data = array(

                            'products_id' => $productId,

                            'media_type' => 'photo',

                            'media' => $data_upload_sugg['upload_data']['file_name'],

                            'media_date_added' => $this->config->item('config.date.time'),

                        );

                        /* If there already exists record in the database update then else insert new entry

                        $res_photo_media  holding existing resultset from databse in the form given below:

                        $res_photo_media = array( 0 => array(row1) )

                         */

                        if (array_key_exists($sx, $res_photo_media)) {

                            $media_id = $res_photo_media[$sx]['id'];

                            $media_file = $res_photo_media[$sx]['media'];

                            $where = "id = '" . $media_id . "'";

                            $this->product_model->safe_update('wl_products_media', $add_data, $where, false);

                            $unlink_image = array('source_dir' => "products", 'source_file' => $media_file);

                            removeImage($unlink_image);

                            /* New File has been browsed and delete checkbox also checked for this file */

                            /* This  media id cannot be removed as it been browsed and updated */

                            if (in_array($media_id, $arr_delete_items)) {

                                $media_del_index = array_search($media_id, $arr_delete_items);

                                unset($arr_delete_items[$media_del_index]);

                            }

                        } else {

                            $this->product_model->safe_insert('wl_products_media', $add_data, false);

                        }

                    }

                }

                $sx++;

            }

        }

        if (!empty($arr_delete_items)) {

            $del_ids = implode(',', $arr_delete_items);

            $where = " id IN(" . $del_ids . ") ";

            $this->product_model->delete_in('wl_products_media', $where, false);

        }

    }

    public function related()
    {

        $productId = (int) $this->uri->segment(4);

        $option = array('productid' => $productId);

        $res = $this->product_model->get_products(1, 0, $option);

        if (is_array($res)) {

            $res = $res[0];

            $data['heading_title'] = "Add Related Products";

            $fetch_related_products = $this->product_model->related_products_added($res['products_id']);

            if (empty($fetch_related_products)) {

                $fetch_not_ids = array($res['products_id']);

            } else {

                $fetch_not_ids = array_values($fetch_related_products);

                array_push($fetch_not_ids, $res['products_id']);

            }

            $condition_related = " AND status='1' AND products_id NOT IN(" . implode(",", $fetch_not_ids) . ") ";

            $res_array = $this->product_model->get_related_products($condition_related);

            $data['res'] = $res_array;

            /* Add related products */

            if ($this->input->post('add_related') == 'Add related product') {

                $this->add_related_products($res['products_id']);

                $this->session->set_flashdata('message', "Related Product has been added successfully.");

                redirect('sitepanel/products/related/' . $productId, '');

            }

            /* End of  related products */

            $this->load->view('catalog/view_add_related_products', $data);

        }

    }

    public function add_related_products($product_id)
    {

        $arr_ids = $this->input->post('arr_ids');

        if (is_array($arr_ids)) {

            foreach ($arr_ids as $val) {

                $rec_exits = $this->product_model->is_record_exits('wl_products_related', array('condition' => "related_id =" . $val . " AND product_id =" . $product_id . " "));

                if (!$rec_exits) {

                    $posted_data = array(

                        'product_id' => $product_id,

                        'related_id' => $val,

                        'related_date_added' => $this->config->item('config.date.time'),

                    );

                    $this->product_model->safe_insert('wl_products_related', $posted_data, false);

                }

            }

        }

    }

    public function remove_related_products($productId)
    {

        $arr_ids = $this->input->post('arr_ids');

        if (is_array($arr_ids)) {

            if ($this->input->post('remove_related') != '') {

                foreach ($arr_ids as $val) {

                    $data = array('related_id' => $val, 'product_id' => $productId);

                    $this->product_model->safe_delete('wl_products_related', $data, false);

                }

            }

        }

    }

    public function view_related()
    {

        $productId = (int) $this->uri->segment(4);

        $option = array('productid' => $productId);

        $res = $this->product_model->get_products(1, 0, $option);

        if (is_array($res)) {

            $res = $res[0];

            $data['heading_title'] = "View Related Products";

            $res_array = $this->product_model->related_products($res);

            $data['res'] = $res_array;

            /* Remove related products */

            if ($this->input->post('remove_related') != '') {

                $this->remove_related_products($res['products_id']);

                $this->session->set_flashdata('message', "Related Product has been removed successfully.");

                redirect('sitepanel/products/view_related/' . $productId, '');

            }

            /* End of  remove related products */

            $this->load->view('catalog/view_related_products', $data);

        }

    }

    public function view_stocks()
    {

        $productId = (int) $this->uri->segment(4);

        $option = array('productid' => $productId);

        $res = $this->product_model->get_products(1, 0, $option);

        if (is_array($res)) {

            $res = $res[0];

            $post_err = array(

                'quantity' => array(),

                'product_price' => array(),

                'product_discounted_price' => array(),

            );

            $post_error = false;

            if ($this->input->post('sub') != '') {

                $product_price = $this->input->post('product_price');

                $product_discounted_price = $this->input->post('product_discounted_price');

                $quantity = $this->input->post('quantity');

                $color_id = $this->input->post('color');

                $size_id = $this->input->post('size');

                $color_traced = true;

                $size_traced = true;

                if (!is_array($color_id)) {

                    $color_traced = false;

                }

                if (!is_array($size_id)) {

                    $size_traced = false;

                }

                $data_insert = array();

                foreach ($quantity as $key => $val) {

                    $loop_verified = true;

                    $loop_price = $product_price[$key];

                    $loop_discount_price = $product_discounted_price[$key];

                    $loop_quantity = $val;

                    $loop_color_id = $color_traced === true ? $color_id[$key] : 0;

                    $loop_size_id = $size_traced === true ? $size_id[$key] : 0;

                    if ($loop_price != '' || $loop_discount_price != '' || $loop_quantity != '') {

                        if ($loop_price == '') {

                            $post_err['product_price'][$key] = "Price is required";

                            $loop_verified = false;

                        } elseif (!array_key_exists($key, $post_err['product_price'])) {

                            if (!preg_match('/^[0-9]*(\.)?[0-9]+$/', $loop_price)) {

                                $post_err['product_price'][$key] = "Price is invalid";

                                $loop_verified = false;

                            }

                            if ($loop_price >= 10000000) {

                                $post_err['product_price'][$key] = "Price must be less than 10000000";

                                $loop_verified = false;

                            }

                            if ($loop_price <= 0) {

                                $post_err['product_price'][$key] = "Price must be greater than 0";

                                $loop_verified = false;

                            }

                        }

                        if ($loop_discount_price != '') {

                            if (!preg_match('/^[0-9]*(\.)?[0-9]+$/', $loop_price)) {

                                $post_err['product_discounted_price'][$key] = "Price is invalid";

                                $loop_verified = false;

                            } elseif (!array_key_exists($key, $post_err['product_price'])) {

                                if ($loop_discount_price >= $loop_price) {

                                    $post_err['product_discounted_price'][$key] = "Price must be less than actual price";

                                    $loop_verified = false;

                                }

                            }

                        }

                        if ($loop_quantity == '') {

                            $post_err['quantity'][$key] = "Quantity is required";

                            $loop_verified = false;

                        } elseif (!array_key_exists($key, $post_err['quantity'])) {

                            if (!preg_match('/^[0-9]+$/', $loop_quantity)) {

                                $post_err['quantity'][$key] = "Quantity is invalid";

                                $loop_verified = false;

                            }

                        }

                        if ($loop_verified === true) {

                            $data_insert[] = array(

                                'product_id' => $res['products_id'],

                                'color_id' => $loop_color_id,

                                'size_id' => $loop_size_id,

                                'product_price' => $loop_price,

                                'product_discounted_price' => $loop_discount_price == '' ? null : $loop_discount_price,

                                'quantity' => $loop_quantity,

                            );

                        } else {

                            $post_error = true;

                        }

                    }

                }

                if ($post_error === false) {

                    $this->db->query("DELETE FROM wl_product_attributes WHERE product_id='" . $res['products_id'] . "'");

                    if (!empty($data_insert)) {

                        foreach ($data_insert as $val) {

                            $this->product_model->safe_insert('wl_product_attributes', $val, false);

                        }

                    }

                    $this->session->set_userdata(array('msg_type' => 'success'));

                    $this->session->set_flashdata('success', lang('successupdate'));

                    redirect('sitepanel/products/view_stocks/' . $res['products_id'], '');

                }

            }

            $matrix_arr_filled = false;

            $matrix_arr_db = array();

            $attr_cond = array(

                'where' => "product_id='" . $res['products_id'] . "'",

            );

            $res_attr = $this->product_model->product_attributes($attr_cond);

            if (is_array($res_attr) && !empty($res_attr)) {

                foreach ($res_attr as $val) {

                    $color_id = $val['color_id'];

                    $size_id = $val['size_id'];

                    $matrix_arr_db[$color_id][$size_id] = $val;

                    $matrix_arr_filled = true;

                }

            }

            $color_ids = $res['color_ids'] != '' ? $res['color_ids'] : "-9999";

            $prod_color_cond = array(

                'where' => "wlc.color_id IN($color_ids)",

            );

            $res_colors = $this->product_model->related_colors($prod_color_cond);

            $size_ids = $res['size_ids'] != '' ? $res['size_ids'] : "-9999";

            $prod_size_cond = array(

                'where' => "wls.size_id IN($size_ids)",

            );

            $res_size = $this->product_model->related_sizes($prod_size_cond);

            $data['res_size'] = $res_size;

            $data['res_colors'] = $res_colors;

            $data['res_attr'] = $res_attr;

            $data['matrix_arr_filled'] = $matrix_arr_filled;

            $data['matrix_arr_db'] = $matrix_arr_db;

            $data['res'] = $res;

            $data['heading_title'] = "Manage Stocks";

            $data['post_err'] = $post_err;

            $this->load->view('catalog/view_stock_products', $data);

        }

    }

    public function view_stocks_store()
    {

        $productId = (int) $this->uri->segment(4);

        $option = array('productid' => $productId);

        $res = $this->product_model->get_products(1, 0, $option);

        if (is_array($res)) {

            $res = $res[0];

            $post_err = array(

                'quantity' => array(),

                'product_price' => array(),

                'product_discounted_price' => array(),

            );

            $post_error = false;

            if ($this->input->post('sub') != '') {

                $product_price = $this->input->post('product_price');

                $product_discounted_price = $this->input->post('product_discounted_price');

                $quantity = $this->input->post('quantity');

                $store_id = $this->input->post('store');

                $store_traced = true;

                if (!is_array($store_id)) {

                    $store_traced = false;

                }

                $data_insert = array();

                foreach ($quantity as $key => $val) {

                    $loop_verified = true;

                    $loop_price = $product_price[$key];

                    $loop_discount_price = $product_discounted_price[$key];

                    $loop_quantity = $val;

                    $loop_store_id = $store_traced === true ? $store_id[$key] : 0;

                    if ($loop_price != '' || $loop_discount_price != '' || $loop_quantity != '') {

                        if ($loop_price == '') {

                            $post_err['product_price'][$key] = "Price is required";

                            $loop_verified = false;

                        } elseif (!array_key_exists($key, $post_err['product_price'])) {

                            if (!preg_match('/^[0-9]*(\.)?[0-9]+$/', $loop_price)) {

                                $post_err['product_price'][$key] = "Price is invalid";

                                $loop_verified = false;

                            }

                            if ($loop_price >= 10000000) {

                                $post_err['product_price'][$key] = "Price must be less than 10000000";

                                $loop_verified = false;

                            }

                            if ($loop_price <= 0) {

                                $post_err['product_price'][$key] = "Price must be greater than 0";

                                $loop_verified = false;

                            }

                        }

                        if ($loop_discount_price != '') {

                            if (!preg_match('/^[0-9]*(\.)?[0-9]+$/', $loop_price)) {

                                $post_err['product_discounted_price'][$key] = "Price is invalid";

                                $loop_verified = false;

                            } elseif (!array_key_exists($key, $post_err['product_price'])) {

                                if ($loop_discount_price >= $loop_price) {

                                    $post_err['product_discounted_price'][$key] = "Price must be less than actual price";

                                    $loop_verified = false;

                                }

                            }

                        }

                        if ($loop_quantity == '') {

                            $post_err['quantity'][$key] = "Quantity is required";

                            $loop_verified = false;

                        } elseif (!array_key_exists($key, $post_err['quantity'])) {

                            if (!preg_match('/^[0-9]+$/', $loop_quantity)) {

                                $post_err['quantity'][$key] = "Quantity is invalid";

                                $loop_verified = false;

                            }

                        }

                        if ($loop_verified === true) {

                            $data_insert[] = array(

                                'product_id' => $res['products_id'],

                                'store_id' => $loop_store_id,

                                'product_price' => $loop_price,

                                'product_discounted_price' => $loop_discount_price == '' ? null : $loop_discount_price,

                                'quantity' => $loop_quantity,

                            );

                        } else {

                            $post_error = true;

                        }

                    }

                }

                //Insert into Table

                if ($post_error === false) {

                    $this->db->query("DELETE FROM wl_product_attributes WHERE product_id='" . $res['products_id'] . "'");

                    if (!empty($data_insert)) {

                        foreach ($data_insert as $val) {

                            $this->product_model->safe_insert('wl_product_attributes', $val, false);

                        }

                        $this->session->set_userdata(array('msg_type' => 'success'));

                        $this->session->set_flashdata('success', lang('successupdate'));

                    }

                    redirect('sitepanel/products/view_stocks_store/' . $res['products_id'], '');

                }

            }

            //End

            //Attribute Value

            $matrix_arr_filled = false;

            $matrix_arr_db = array();

            $attr_cond = array('where' => "product_id='" . $res['products_id'] . "'");

            $res_attr = $this->product_model->product_attributes($attr_cond);

            if (is_array($res_attr) && !empty($res_attr)) {

                foreach ($res_attr as $val) {

                    $store_id = $val['store_id'];

                    $matrix_arr_db[$store_id] = $val;

                    $matrix_arr_filled = true;

                }

            }

            //Send data to View

            $data['res_store'] = explode(',', $res['store_id']);

            $data['res_attr'] = $res_attr;

            $data['matrix_arr_filled'] = $matrix_arr_filled;

            $data['matrix_arr_db'] = $matrix_arr_db;

            $data['res'] = $res;

            $data['heading_title'] = "Manage Stocks";

            $data['post_err'] = $post_err;

            $this->load->view('catalog/view_stock_products_store', $data);

        }

    }

    public function report($page = null)
    {

        $this->load->helper(array('products/product'));

        $condtion = array();

        $pagesize = (int) $this->input->get_post('pagesize');

        $config['limit'] = ($pagesize > 0) ? $pagesize : $this->config->item('pagesize');

        $offset = ($this->input->get_post('per_page') > 0) ? $this->input->get_post('per_page') : 0;

        $base_url = current_url_query_string(array('filter' => 'result'), array('per_page'));

        $category_id = (int) $this->uri->segment(4, 0);

        $status = $this->input->get_post('status', true);

        $cat_name = '';

        if ($category_id > 0) {

            $condtion['category_id'] = $category_id;

            $cat_name = 'in ';

            $cat_name .= get_db_field_value('wl_categories', 'category_name', "WHERE category_id='$category_id'");

        }

        if ($status != '') {

            $condtion['status'] = $status;

        }

        $res_array = $this->product_model->get_products($config['limit'], $offset, $condtion);

        $config['total_rows'] = get_found_rows();

        $data['heading_title'] = 'Product Lists';

        $data['res'] = $res_array;

        $data['page_links'] = admin_pagination($base_url, $config['total_rows'], $config['limit'], $offset);

        $data['category_result_found'] = "Total " . $config['total_rows'] . " result(s) found " . strtolower($cat_name) . " ";

        //print_r($data);exit;

        $this->load->view('catalog/view_product_report', $data);

    }

    public function details()
    {

        $id = (int) $this->uri->segment(4);

        $condition = array(

            'fields' => "SQL_CALC_FOUND_ROWS wlp.*,wlc.first_name,wlc.company_name,wlcat.category_links",

            'offset' => 0,

            'limit' => 1,

            'where' => "wlp.products_id ='" . $id . "'",

        );

        $res_array = $this->product_model->get_products($condition);

        $data['heading_title'] = 'View Details';

        $data['page_title'] = 'View Details';

        $data['res'] = $res_array;

        $this->load->view('catalog/view_product_details', $data);

    }

    public function check_price()
    {

        $disc_price = $this->input->post('product_discounted_price');

        $price = $this->input->post('product_price');

        if ($disc_price != '' && $price != '') {

            $disc_price = floatval($disc_price);

            $price = floatval($price);

            if ($disc_price >= $price && $disc_price > 0 && $price > 0) {

                $this->form_validation->set_message('check_price', 'Discount price must be less than actual price.');

                return false;

            } else {

                return true;

            }

        } else {

            return true;

        }

    }

    public function delete_media()
    {

        $id = (int) $this->input->post('id');

        if ($id > 0) {

            $res = $this->db->select('media,id')->get_where('wl_products_media', array('id' => $id))->row();

            if (is_object($res)) {

                $unlink_image = array('source_dir' => "products", 'source_file' => $res->media);

                removeImage($unlink_image);

                $this->db->query("DELETE FROM wl_products_media WHERE id='" . $res->id . "'");

                echo 'success';

            }

        }

    }

    public function check_zipcode()
    {

        //$zipcode=$this->input->post("zipcode");

        $this->form_validation->set_rules('zip_code', 'Zipcode', 'trim|required|max_length[6]|callback_is_zipcode_exist');

        if ($this->form_validation->run() === true) {

            $this->session->set_userdata("zip_code", $this->input->post("zip_code"));

            print json_encode(array("success" => ''));

        } else {

            print json_encode(array("error" => form_error("zip_code", '<span>', '</span>')));

        }

    }

    public function is_zipcode_exist()
    {

        $zipcode = $this->input->post("zip_code");

        $zc = get_db_field_value('tbl_zip_location', 'zip_code', array("zip_code" => $zipcode));

        if ($zc == "") {

            $this->form_validation->set_message('is_zipcode_exist', 'Not available in your location yet.');

            return false;

        }

    }

    public function get_html_category_ids()
    {

        $data['heading_title'] = 'Excel Category List Ids';

        set_time_limit(0);

        $file_path = $this->load->view('catalog/excel_category_ids', $data);

        ob_start();

        include_once $this->load->view('catalog/excel_category_ids', $data);

        $mess = ob_get_contents();

        $filename = "category.htm";

        ob_end_clean();

        header("Pragma: public");

        header("Expires: 0");

        header("Cache-Control: must-revalidate, post-check=0, pre-check=0");

        header("Cache-Control: public");

        header("Content-Description: File Transfer");

        //Use the switch-generated Content-Type

        header("Content-Type: application/force-download");

        //Force the download

        $header = "Content-Disposition: attachment; filename=" . $filename . ";";

        header($header);

        header("Content-Transfer-Encoding: binary");

        echo $mess;

        exit;

    }

    public function get_html_color_ids()
    {

        $data['heading_title'] = 'Excel Color Ids';

        set_time_limit(0);

        $file_path = $this->load->view('catalog/excel_color_ids', $data);

        ob_start();

        include_once $this->load->view('catalog/excel_color_ids', $data);

        $mess = ob_get_contents();

        $filename = "color.htm";

        ob_end_clean();

        header("Pragma: public");

        header("Expires: 0");

        header("Cache-Control: must-revalidate, post-check=0, pre-check=0");

        header("Cache-Control: public");

        header("Content-Description: File Transfer");

        //Use the switch-generated Content-Type

        header("Content-Type: application/force-download");

        //Force the download

        $header = "Content-Disposition: attachment; filename=" . $filename . ";";

        header($header);

        header("Content-Transfer-Encoding: binary");

        echo $mess;

        exit;

    }

    public function get_html_size_ids()
    {

        $data['heading_title'] = 'Excel Color Ids';

        set_time_limit(0);

        $file_path = $this->load->view('catalog/excel_size_ids', $data);

        ob_start();

        include_once $this->load->view('catalog/excel_size_ids', $data);

        $mess = ob_get_contents();

        $filename = "size.htm";

        ob_end_clean();

        header("Pragma: public");

        header("Expires: 0");

        header("Cache-Control: must-revalidate, post-check=0, pre-check=0");

        header("Cache-Control: public");

        header("Content-Description: File Transfer");

        //Use the switch-generated Content-Type

        header("Content-Type: application/force-download");

        //Force the download

        $header = "Content-Disposition: attachment; filename=" . $filename . ";";

        header($header);

        header("Content-Transfer-Encoding: binary");

        echo $mess;

        exit;

    }

    public function check_upload_excel()
    {

        $filearrext = array('xls');

        if ($_FILES['excel_file']['name'] == '') {

            $this->form_validation->set_message('check_upload_excel', 'Please upload excel file.');

            return false;

        }

        if ($_FILES['excel_file']['name'] != '') {

            $extension = substr(strrchr($_FILES['excel_file']['name'], '.'), 1);

            if (!in_array($extension, $filearrext)) {

                $this->form_validation->set_message('check_upload_excel', 'Please upload (xls) file only.');

                return false;

            } else {

                return true;

            }

        }

    }

    public function test_gcm()
    {

        $registration_ids = 'dNfacaboC18:APA91bHJDYV4StgIFZuTAJbzlYWXLJb9MnZtmMkmvl8j8_WXK6sIj6Khs8Bm0jLcD3fEZ8aPVomtG2D7UnR3PGEWDoFqyZuFuwzPBvVdscKNk3EXYV0Kz47yWQuoylRf3RgeXa7UeFc6';

        send_notification_android($registration_ids, "Testing");

    }

}

// End of controller
