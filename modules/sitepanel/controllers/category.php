<?php

class Category extends Admin_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('category/category_model'));
        $this->load->helper('category/category');
        $this->config->set_item('menu_highlight', 'product management');
        $this->form_validation->set_error_delimiters("<div class='required'>", "</div>");
        $this->default_view = 'catalog';
        $this->deletePrvg = true;
    }

    public function index()
    {
        $pagesize = (int) $this->input->get_post('pagesize');
        $config['limit'] = ($pagesize > 0) ? $pagesize : $this->config->item('pagesize');
        $offset = ($this->input->get_post('per_page') > 0) ? $this->input->get_post('per_page') : 0;
        $base_url = current_url_query_string(array('filter' => 'result'), array('per_page'));
        $parent_id = (int) $this->uri->segment(4, 0);

        $keyword = trim($this->input->get_post('keyword', true));
        $keyword = $this->db->escape_str($keyword);
        if($keyword){
            $condtion = "AND category_name like '%$keyword%' ";
        }else{
            $condtion = "AND parent_id = '$parent_id'";
        }
        
        $condtion_array = array(
            'field' => "*,( SELECT COUNT(category_id) FROM wl_categories AS b WHERE b.parent_id=a.category_id ) AS total_subcategories",
            'condition' => $condtion,
            //'limit' => $config['limit'],
            //'offset' => $offset,
            'debug' => false,
        );
        $res_array = $this->category_model->getcategory($condtion_array);
        $config['total_rows'] = $this->category_model->total_rec_found;
        $data['page_links'] = admin_pagination($base_url, $config['total_rows'], $config['limit'], $offset);
        $data['heading_title'] = ($parent_id > 0) ? 'Subcategory' : 'Category';
        $data['res'] = $res_array;
        $data['parent_id'] = $parent_id;

        if ($this->input->get_post('set_home_category')) {
            $this->db->query("UPDATE wl_categories SET home_menu = '1' WHERE category_id = '" . $this->input->get_post('set_home_category') . "'");
            $this->session->set_userdata(array('msg_type' => 'success'));
            $this->session->set_flashdata('success', 'Select Category has been set as home menu.');
            redirect($_SERVER['HTTP_REFERER']);
        }
        if ($this->input->get_post('unset_home_category')) {
            $this->db->query("UPDATE wl_categories SET home_menu = '0' WHERE category_id = '" . $this->input->get_post('unset_home_category') . "'");
            $this->session->set_userdata(array('msg_type' => 'success'));
            $this->session->set_flashdata('success', 'Select Category has been removed from home menu.');
            redirect($_SERVER['HTTP_REFERER']);
        }

        if ($this->input->post('status_action') != '') {
            if ($this->input->post('status_action') == 'Delete') {
                $prod_id = $this->input->post('arr_ids');
                $this->session->set_flashdata('delete_cat', 'Category Has been deleted Successfully!');

                foreach ($prod_id as $v) {
                    $where = array('entity_type' => 'category/index', 'entity_id' => $v);
                    $this->category_model->safe_delete('wl_meta_tags', $where, true);
                }
            }
            $this->update_status('wl_categories', 'category_id');
        }
        if ($this->input->post('update_order') != '') {
            $this->update_displayOrder('wl_categories', 'sort_order', 'category_id');
        }

        /* category set as a */

        if ($this->input->post('set_as') != '') {
            $set_as = $this->input->post('set_as', true);
            $this->set_as('wl_categories', 'category_id', array($set_as => '1'));
        }

        if ($this->input->post('unset_as') != '') {
            $unset_as = $this->input->post('unset_as', true);
            $this->set_as('wl_categories', 'category_id', array($unset_as => '0'));
        }
        /* End category set as a */

        $this->load->view($this->default_view . '/view_category_list', $data);
    }

    public function add()
    {
        $data['ckeditor'] = set_ck_config(array('textarea_id' => 'cat_desc'));
        $parent_id = (int) $this->uri->segment(4, 0);
        $img_allow_size = $this->config->item('allow.file.size');
        $img_allow_dim = $this->config->item('allow.imgage.dimension');
        $category_name = $this->db->escape_str($this->input->post('category_name'));
        $category_name_p = $this->db->escape_str($this->input->post('category_name_p'));
        $posted_friendly_url = $this->input->post('friendly_url');

        if ($parent_id != '' && $parent_id > 0) {
            $parent_id = applyFilter('NUMERIC_GT_ZERO', $parent_id);

            $data['heading_title'] = 'Add Subcategory';

            if ($parent_id <= 0) {
                redirect("sitepanel/category");
            }

            $parentdata = $this->category_model->get_category_by_id($parent_id);

            if (!is_array($parentdata)) {
                $this->session->set_flashdata('message', lang('invalidRecord'));

                redirect('sitepanel/category', '');
            }

            $this->cbk_friendly_url = $parentdata['friendly_url'] . "/" . seo_url_title($posted_friendly_url);
            $data['parentData'] = $parentdata;
        } else {
            $this->cbk_friendly_url = seo_url_title($posted_friendly_url);
            $data['parentData'] = '';
            $data['heading_title'] = 'Add Category';
        }

        $seo_url_length = $this->config->item('seo_url_length');

        $this->form_validation->set_rules('category_name', 'Category Name', "trim|required|max_length[100]|xss_clean|unique[wl_categories.category_name ='" . $category_name . "' AND status!='2' AND parent_id='" . $parent_id . "']");
        $this->form_validation->set_rules('friendly_url', 'Page URL', "trim|required|max_length[$seo_url_length]|xss_clean|unique[wl_meta_tags.page_url ='" . $this->cbk_friendly_url . "'] ");

        //$this->form_validation->set_rules('category_name_p', 'Category Name in Portuguese', "trim|required|max_length[100]|xss_clean|unique[wl_categories.category_name_p ='" . $category_name_p . "' AND status!='2' AND parent_id='" . $parent_id . "']");

        $this->form_validation->set_rules('category_image', 'Image', "file_allowed_type[image]|file_size_max[$img_allow_size]|check_dimension[$img_allow_dim]");

        $this->form_validation->set_rules('category_description', 'Description', "max_length[6000]");

        $this->form_validation->set_rules('category_shortdescription', 'Short Description', "max_length[6000]");
        $this->form_validation->set_rules('category_alt', 'Alt', "trim|max_length[100]");
        $this->form_validation->set_rules('dispatch_time', 'Description', "max_length[200]");
        //$this->form_validation->set_rules('coupon_code', 'Coupon Code', "max_length[10]");
        //if ($this->input->get_post('coupon_code') != '') {
        //$this->form_validation->set_rules('coupon_value', 'Coupon Value', "required|max_length[2]|numeric");
        //} else {
        //$this->form_validation->set_rules('coupon_value', 'Coupon Value', "max_length[2]|numeric");
        //}
        if ($this->form_validation->run() === true) {
            $uploaded_file = "";

            if (!empty($_FILES) && $_FILES['category_image']['name'] != '') {
                $this->load->library('upload');

                $uploaded_data = $this->upload->my_upload('category_image', 'category');
                
                if (is_array($uploaded_data) && !empty($uploaded_data)) {
                    $uploaded_file = $uploaded_data['upload_data']['file_name'];
                }
            }

            $redirect_url = "category/index";

            $category_alt = $this->input->post('category_alt');

            if ($category_alt == '') {
                $category_alt = $this->input->post('category_name');
            }

            $category_description = $this->input->post('category_description');
            $category_shortdescription = $this->input->post('category_shortdescription');

            $category_description = $category_description != '' ? $category_description : null;

            if (!is_null($category_description)) {
                $meta_description = $category_description;
                $meta_keyword = $category_description;
            } else {
                $meta_description = $this->input->post('category_name');
                $meta_keyword = $this->input->post('category_name');
            }

            $posted_data = array(
                'category_name' => $this->input->post('category_name'),
                'category_name_p' => $this->input->post('category_name_p'),
                'category_alt' => $category_alt,
                'category_description' => $category_description,
                'category_shortdescription' => $category_shortdescription,
                'dispatch_time' => $this->input->post('dispatch_time'),
                'coupon_code' => $this->input->post('coupon_code'),
                'coupon_value' => $this->input->post('coupon_value'),
                'parent_id' => $parent_id,
                'friendly_url' => $this->cbk_friendly_url,
                'date_added' => $this->config->item('config.date.time'),
                'category_image' => $uploaded_file,
            );

            $insertId = $this->category_model->safe_insert('wl_categories', $posted_data, false);

            if ($insertId > 0) {
                $meta_array = array(
                    'entity_type' => $redirect_url,
                    'entity_id' => $insertId,
                    'page_url' => $this->cbk_friendly_url,
                    'meta_title' => get_text($this->input->post('category_name'), 80),
                    'meta_description' => get_text($meta_description),
                    'meta_keyword' => get_keywords($meta_keyword),
                );

                create_meta($meta_array);
            }

            $this->session->set_userdata(array('msg_type' => 'success'));
            $this->session->set_flashdata('success', lang('success'));
            $redirect_path = isset($parentdata) && is_array($parentdata) ? 'category/index/' . $parentdata['category_id'] : 'category';
            redirect('sitepanel/' . $redirect_path, '');
        }
        $data['parent_id'] = $parent_id;
        $this->load->view($this->default_view . '/view_category_add', $data);
    }

    public function edit()
    {
        
        $data['ckeditor'] = set_ck_config(array('textarea_id' => 'cat_desc'));
        $catId = (int) $this->uri->segment(4);
        $rowdata = $this->category_model->get_category_by_id($catId);
        $data['heading_title'] = ($rowdata['parent_id'] > 0) ? 'Subcategory' : 'Category';
        $img_allow_size = $this->config->item('allow.file.size');
        $img_allow_dim = $this->config->item('allow.imgage.dimension');
        if (!is_array($rowdata)) {
            $this->session->set_flashdata('message', lang('idmissing'));
            redirect('sitepanel/category', '');
        }
        $posted_friendly_url = $this->input->post('friendly_url');
        $this->cbk_friendly_url = seo_url_title($posted_friendly_url);
        $categoryId = $rowdata['category_id'];

        //$this->form_validation->set_rules('category_name', 'Category Name', "trim|required|max_length[100]|xss_clean|unique[wl_categories.category_name ='" . $this->db->escape_str($this->input->post('category_name')) . "' AND status!='2' AND parent_id='" . $rowdata['parent_id'] . "' AND category_id!='" . $categoryId . "']");

        $seo_url_length = $this->config->item('seo_url_length');

        //$this->cbk_friendly_url = seo_url_title($this->input->post('friendly_url',TRUE));

        $this->form_validation->set_rules('friendly_url', 'Page URL', "trim|required|max_length[$seo_url_length]|xss_clean|unique[wl_meta_tags.page_url ='" . $this->cbk_friendly_url . "' AND entity_id !='" . $categoryId . "'] ");
        
        //$this->form_validation->set_rules('category_name_p', 'Category Name in Portuguese', "trim|required|max_length[100]|xss_clean|unique[wl_categories.category_name_p ='" . $this->db->escape_str($this->input->post('category_name_p')) . "' AND status!='2' AND parent_id='" . $rowdata['parent_id'] . "' AND category_id!='" . $categoryId . "']");

        $this->form_validation->set_rules('category_description', 'Description', "max_length[6000]");

        $this->form_validation->set_rules('category_shortdescription', 'Short Description', "max_length[6000]");
        $this->form_validation->set_rules('category_image', 'Image', "file_allowed_type[image]|file_size_max[$img_allow_size]|check_dimension[$img_allow_dim]");
        $this->form_validation->set_rules('dispatch_time', 'Description', "max_length[200]");
        
        
        if ($this->form_validation->run() == true) {
            
            $uploaded_file = $rowdata['category_image'];
            $unlink_image = array('source_dir' => "category", 'source_file' => $rowdata['category_image']);
            if ($this->input->post('cat_img_delete') === 'Y') {
                removeImage($unlink_image);
                $uploaded_file = null;
            }
            if (!empty($_FILES) && $_FILES['category_image']['name'] != '') {
                $this->load->library('upload');

                $uploaded_data = $this->upload->my_upload('category_image', 'category');
                
                if (is_array($uploaded_data) && !empty($uploaded_data)) {
                    $uploaded_file = $uploaded_data['upload_data']['file_name'];
                    removeImage($unlink_image);
                }
            }

            $post=$this->input->post();
            
            $where = "category_id = '" . $categoryId . "'";
            unset($post['category_id'],$post['category_image']);

            $posted_data=filter_arr($post,tbl_cols('wl_categories',FALSE));
            
            $posted_data['category_image']=$uploaded_file;
            $this->category_model->safe_update('wl_categories',$posted_data,$where);

            update_meta_page_url('category/index',$categoryId,$this->cbk_friendly_url);
            
            $this->session->set_userdata(array('msg_type' => 'success'));
            $this->session->set_flashdata('success', lang('successupdate'));
            $redirect_path = $rowdata['parent_id'] > 0 ? 'category/index/' . $rowdata['parent_id'] : 'category';

            redirect('sitepanel/' . $redirect_path . '/' . query_string(), '');
        }

        $data['catresult'] = $rowdata;
        $this->load->view($this->default_view . '/view_category_edit', $data);
    }

    public function delete()
    {
        $catId = (int) $this->uri->segment(4, 0);
        $rowdata = $this->category_model->get_category_by_id($catId);

        if (!is_array($rowdata)) {
            $this->session->set_flashdata('message', lang('idmissing'));
            redirect('sitepanel/category', '');
        } else {
            $total_category = count_category("AND parent_id='$catId' ");

            $total_product = count_products("AND category_id='$catId' ");

            if ($total_category > 0 || $total_product > 0) {
                $this->session->set_userdata(array('msg_type' => 'error'));
                $this->session->set_flashdata('error', lang('child_to_delete'));
            } else {
                $where = array('category_id' => $catId);
                $this->category_model->safe_delete('wl_categories', $where, true);
                $this->session->set_userdata(array('msg_type' => 'success'));
                $this->session->set_flashdata('success', lang('deleted'));
            }
            redirect($_SERVER['HTTP_REFERER'], '');
        }
    }

}

// End of controller
