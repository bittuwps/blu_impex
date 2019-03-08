<?php

class Brands extends Admin_Controller {

  public function __construct() {
    parent::__construct();
    $this->load->model(array('brands/brands_model'));
    $this->form_validation->set_error_delimiters("<div class='required'>", "</div>");
    $this->default_view = 'brands';
    $this->deletePrvg = TRUE;
  }

  public function index() {
    $pagesize = (int) $this->input->get_post('pagesize');
    $config['limit'] = ( $pagesize > 0 ) ? $pagesize : $this->config->item('pagesize');
    $offset = ( $this->input->get_post('per_page') > 0 ) ? $this->input->get_post('per_page') : 0;
    $base_url = current_url_query_string(array('filter' => 'result'), array('per_page'));
    $parent_id = (int) $this->uri->segment(4, 0);

    $keyword = trim($this->input->get_post('keyword', TRUE));
    $keyword = $this->db->escape_str($keyword);
    $condtion = "";
    //$condtion = "AND parent_id = '$parent_id'";



    $condtion_array = array(
        'field' => "*",
        'condition' => $condtion,
        'limit' => $config['limit'],
        'offset' => $offset,
        'debug' => FALSE
    );
    $res_array = $this->brands_model->getbrand($condtion_array);
    $config['total_rows'] = $this->brands_model->total_rec_found;
    $data['page_links'] = admin_pagination($base_url, $config['total_rows'], $config['limit'], $offset);
    $data['heading_title'] = ( $parent_id > 0 ) ? 'Subbrands' : 'Brands';
    $data['res'] = $res_array;
    $data['parent_id'] = $parent_id;


    if ($this->input->post('status_action') != '') {
      if ($this->input->post('status_action') == 'Delete') {
        $prod_id = $this->input->post('arr_ids');
        $this->session->set_flashdata('delete_cat', 'Brand Has been deleted Successfully!');
        foreach ($prod_id as $v) {
          $where = array('entity_type' => 'brands/index', 'entity_id' => $v);
          $this->brands_model->safe_delete('wl_meta_tags', $where, TRUE);
        }
      }
      $this->update_status('wl_brands', 'brand_id');
    }
    if ($this->input->post('update_order') != '') {
      $this->update_displayOrder('wl_brands', 'sort_order', 'brand_id');
    }

    /* brands set as a */
    if ($this->input->post('set_as') != '') {
      $set_as = $this->input->post('set_as', TRUE);
      $this->set_as('wl_brands', 'brand_id', array($set_as => '1'));
    }
    if ($this->input->post('unset_as') != '') {
      $unset_as = $this->input->post('unset_as', TRUE);
      $this->set_as('wl_brands', 'brand_id', array($unset_as => '0'));
    }
    /* End brands set as a */
    $this->load->view($this->default_view . '/view_brands_list', $data);
  }

  public function add() {
    $parent_id = (int) $this->uri->segment(4, 0);
    $img_allow_size = $this->config->item('allow.file.size');
    $img_allow_dim = $this->config->item('allow.imgage.dimension');
    $brands_name = $this->db->escape_str($this->input->post('brands_name'));
    $posted_friendly_url = $this->input->post('friendly_url');

    if ($parent_id != '' && $parent_id > 0) {
      $parent_id = applyFilter('NUMERIC_GT_ZERO', $parent_id);
      $data['heading_title'] = 'Add Subbrands';
      if ($parent_id <= 0) {
        redirect("sitepanel/brands");
      }
      $parentdata = $this->brands_model->get_brand_by_id($parent_id);
      if (!is_array($parentdata)) {
        $this->session->set_flashdata('message', lang('invalidRecord'));
        redirect('sitepanel/brands', '');
      }
      $this->cbk_friendly_url = $parentdata['friendly_url'] . "/" . seo_url_title($posted_friendly_url);
      $data['parentData'] = $parentdata;
    } else {
      $this->cbk_friendly_url = seo_url_title($posted_friendly_url);
      $data['parentData'] = '';
      $data['heading_title'] = 'Add Brand';
    }

    $seo_url_length = $this->config->item('seo_url_length');
    $this->form_validation->set_rules('brands_name', 'Brand Name', "trim|required|max_length[100]|xss_clean|unique[wl_brands.brand_name ='" . $brands_name . "' AND status!='2']");
    $this->form_validation->set_rules('friendly_url', 'Page URL', "trim|required|max_length[$seo_url_length]|xss_clean|unique[wl_meta_tags.page_url ='" . $this->cbk_friendly_url . "'] ");
    $this->form_validation->set_rules('brands_image', 'Brand Image', "file_allowed_type[image]|file_size_max[$img_allow_size]|check_dimension[$img_allow_dim]");
    $this->form_validation->set_rules('brands_alt', 'Alt', "trim|max_length[100]");
    
    if ($this->form_validation->run() === TRUE) {
      $uploaded_file = "";
      if (!empty($_FILES) && $_FILES['brands_image']['name'] != '') {
        $this->load->library('upload');
        $uploaded_data = $this->upload->my_upload('brands_image', 'brands');
        if (is_array($uploaded_data) && !empty($uploaded_data)) {
          $uploaded_file = $uploaded_data['upload_data']['file_name'];
        }
      }
      $redirect_url = "brands/index";
      $brands_alt = $this->input->post('brands_alt');
      if ($brands_alt == '') {
        $brands_alt = $this->input->post('brands_name');
      }
      $meta_description = $this->input->post('brands_name');
      $meta_keyword = $this->input->post('brands_name');
      
      $posted_data = array(
          'brand_name' => $this->input->post('brands_name'),
          'brand_alt' => $brands_alt,
          'friendly_url' => $this->cbk_friendly_url,
          'date_added' => $this->config->item('config.date.time'),
          'brand_image' => $uploaded_file
      );
      $insertId = $this->brands_model->safe_insert('wl_brands', $posted_data, FALSE);
      if ($insertId > 0) {
        $meta_array = array(
            'entity_type' => $redirect_url,
            'entity_id' => $insertId,
            'page_url' => $this->cbk_friendly_url,
            'meta_title' => get_text($this->input->post('brands_name'), 80),
            'meta_description' => get_text($meta_description),
            'meta_keyword' => get_keywords($meta_keyword)
        );
        create_meta($meta_array);
      }
      $this->session->set_userdata(array('msg_type' => 'success'));
      $this->session->set_flashdata('success', lang('success'));
      $redirect_path = isset($parentdata) && is_array($parentdata) ? 'brands/index/' . $parentdata['brands_id'] : 'brands';
      redirect('sitepanel/' . $redirect_path, '');
    }
    $data['parent_id'] = $parent_id;
    $this->load->view($this->default_view . '/view_brands_add', $data);
  }

  public function edit() {
    $catId = (int) $this->uri->segment(4);
    $rowdata = $this->brands_model->get_brand_by_id($catId);
    $data['heading_title'] = 'Brand';
    $img_allow_size = $this->config->item('allow.file.size');
    $img_allow_dim = $this->config->item('allow.imgage.dimension');
    if (!is_array($rowdata)) {
      $this->session->set_flashdata('message', lang('idmissing'));
      redirect('sitepanel/brands', '');
    }
    $brandsId = $rowdata['brand_id'];

    $this->form_validation->set_rules('brands_name', 'Brand Name', "trim|required|max_length[100]|xss_clean|unique[wl_brands.brand_name ='" . $this->db->escape_str($this->input->post('brands_name')) . "' AND status!='2' AND brand_id!='" . $brandsId . "']");
    $seo_url_length = $this->config->item('seo_url_length');
    $this->form_validation->set_rules('brands_description', 'Description', "max_length[6000]");
    $this->form_validation->set_rules('brands_image', 'Image', "file_allowed_type[image]|file_size_max[$img_allow_size]|check_dimension[$img_allow_dim]");
    if ($this->form_validation->run() == TRUE) {
      $uploaded_file = $rowdata['brand_image'];
      $unlink_image = array('source_dir' => "brands", 'source_file' => $rowdata['brand_image']);
      if ($this->input->post('cat_img_delete') === 'Y') {
        removeImage($unlink_image);
        $uploaded_file = NULL;
      }
      if (!empty($_FILES) && $_FILES['brands_image']['name'] != '') {
        $this->load->library('upload');
        $uploaded_data = $this->upload->my_upload('brands_image', 'brands');
        if (is_array($uploaded_data) && !empty($uploaded_data)) {
          $uploaded_file = $uploaded_data['upload_data']['file_name'];
          removeImage($unlink_image);
        }
      }
      $brands_alt = $this->input->post('brands_alt');
      if ($brands_alt == '') {
        $brands_alt = $this->input->post('brands_name');
      }
      $brands_description = $this->input->post('brands_description');
      $brands_description = $brands_description != '' ? $brands_description : null;
      $posted_data = array(
          'brand_name' => $this->input->post('brands_name'),
          'brand_alt' => $brands_alt,
          'brand_description' => $brands_description,
          'brand_image' => $uploaded_file
      );
      $where = "brand_id = '" . $brandsId . "'";
      $this->brands_model->safe_update('wl_brands', $posted_data, $where, FALSE);
      update_meta_page_url('brands/index',$brandsId,$this->cbk_friendly_url);
      $this->session->set_userdata(array('msg_type' => 'success'));
      $this->session->set_flashdata('success', lang('successupdate'));
      $redirect_path = $rowdata['parent_id'] > 0 ? 'brands/index/' . $rowdata['parent_id'] : 'brands';
      redirect('sitepanel/' . $redirect_path . '/' . query_string(), '');
    }
    $data['catresult'] = $rowdata;
    $this->load->view($this->default_view . '/view_brands_edit', $data);
  }

  public function delete() {
    $catId = (int) $this->uri->segment(4, 0);
    $rowdata = $this->brands_model->get_brand_by_id($catId);
    if (!is_array($rowdata)) {
      $this->session->set_flashdata('message', lang('idmissing'));
      redirect('sitepanel/brands', '');
    } else {
      $total_product = count_products("AND brand_id='$catId' ");
      if ($total_product > 0) {
        $this->session->set_userdata(array('msg_type' => 'error'));
        $this->session->set_flashdata('error', lang('child_to_delete'));
      } else {
        $where = array('brand_id' => $catId);
        $this->brands_model->safe_delete('wl_brands', $where, TRUE);
        $this->session->set_userdata(array('msg_type' => 'success'));
        $this->session->set_flashdata('success', lang('deleted'));
      }
      redirect($_SERVER['HTTP_REFERER'], '');
    }
  }

}

// End of controller