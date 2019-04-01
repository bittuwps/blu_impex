<?php

class Attributes extends Admin_Controller {

  public function __construct() {
    parent::__construct();
    $this->load->model(array('attributes_model', 'sitepanel/setting_model'));
    $this->form_validation->set_error_delimiters("<div class='required'>", "</div>");
    $this->default_view = 'attributes';
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
    $condtion_array = array(
        'field' => "*",
        'condition' => $condtion,
        'limit' => $config['limit'],
        'offset' => $offset,
        'debug' => FALSE
    );
    $res_array = $this->attributes_model->getattributes($condtion_array);
    $config['total_rows'] = $this->attributes_model->total_rec_found;
    $data['page_links'] = admin_pagination($base_url, $config['total_rows'], $config['limit'], $offset);
    $data['heading_title'] = 'Attributes';
    $data['res'] = $res_array;
    $data['parent_id'] = $parent_id;


    if ($this->input->post('status_action') != '') {
      if ($this->input->post('status_action') == 'Delete') {
        $prod_id = $this->input->post('arr_ids');
        $this->session->set_flashdata('delete_cat', 'Category Has been deleted Successfully!');
      }
      $this->update_status('wl_attributes', 'id');
    }
    $this->load->view($this->default_view . '/view_attributes_list', $data);
  }

  public function add() {    
    $data['heading_title'] = 'Add Attribute';
    
    $attributes_name = $this->input->get_post('name');
    $this->form_validation->set_rules('name', 'Attribute Name', "trim|required|max_length[80]|xss_clean|unique[wl_attributes.name ='" . $attributes_name . "' AND status!='2']");    
    $this->form_validation->set_rules('type', 'Attribut Type', "trim|required");
    
    
    if ($this->form_validation->run() === TRUE) {
      $posted_data = array(
          'name' => $this->input->post('name'),
          'type' => $this->input->post('type'),
          'is_cart_mandatory' => $this->input->post('for_cart'),
          'is_product_mandatory' => $this->input->post('for_product_display'),
      );
      ///trace($posted_data); dei;
      $insertId = $this->attributes_model->safe_insert('wl_attributes', $posted_data, FALSE);
      $this->session->set_userdata(array('msg_type' => 'success'));
      $this->session->set_flashdata('success', lang('success'));
      if ($this->input->get_post('sub') == 'Save') {
        redirect('sitepanel/attributes/edit/' . $insertId, '');
      } elseif ($this->input->get_post('sub') == 'Save & Close') {
        redirect('sitepanel/' . $redirect_path, '');
      } else {
        redirect('sitepanel/attributes/add/' . $parent_id, '');
      }
    }
    
    $this->load->view($this->default_view . '/view_attributes_add', $data);
  }

  public function edit() {
    $admin_info = $this->setting_model->get_admin_info(1);
    $data['admin_info'] = $admin_info;
    $catId = (int) $this->uri->segment(4);
    $rowdata = $this->attributes_model->get_attributes_by_id($catId);
    $data['heading_title'] = 'Edit Attribute';
    
    if (!is_array($rowdata)) {
      $this->session->set_flashdata('message', lang('idmissing'));
      redirect('sitepanel/attributes', '');
    }
    
    $attributes_name = $this->input->get_post('name');
    $this->form_validation->set_rules('name', 'Attribute Name', "trim|required|max_length[80]|xss_clean|unique[wl_attributes.name ='" . $attributes_name . "' AND id !=$catId AND status!='2']");    
    $this->form_validation->set_rules('type', 'Attribut Type', "trim|required");

    if ($this->form_validation->run() == TRUE) {

      $posted_data = array(
          'name' => $this->input->post('name'),
          'type' => $this->input->post('type'),
          'is_cart_mandatory' => $this->input->post('for_cart'),
          'is_product_mandatory' => $this->input->post('for_product_display'),
      );


      $where = "id = '" . $catId . "'";
      $this->attributes_model->safe_update('wl_attributes', $posted_data, $where, FALSE);

      //update_meta_page_url('category/index',$categoryId,$this->cbk_friendly_url);

      $this->session->set_userdata(array('msg_type' => 'success'));
      $this->session->set_flashdata('success', lang('successupdate'));
      $redirect_path = 'attributes';
      
      if ($this->input->get_post('sub') == 'Save') {
        redirect('sitepanel/attributes/edit/' . $catId, '');
      } elseif ($this->input->get_post('sub') == 'Save & Close') {
        redirect('sitepanel/' . $redirect_path, '');
      } else {
        redirect('sitepanel/attributes/add/', '');
      }
      
    }

    $data['catresult'] = $rowdata;
    $this->load->view($this->default_view . '/view_attributes_edit', $data);
  }
  
  
  ///Lable
  
  public function lables() {
    $pagesize = (int) $this->input->get_post('pagesize');
    $config['limit'] = ( $pagesize > 0 ) ? $pagesize : $this->config->item('pagesize');
    $offset = ( $this->input->get_post('per_page') > 0 ) ? $this->input->get_post('per_page') : 0;
    $base_url = current_url_query_string(array('filter' => 'result'), array('per_page'));
    $parent_id = (int) $this->uri->segment(4, 0);
    $keyword = trim($this->input->get_post('keyword', TRUE));
    $keyword = $this->db->escape_str($keyword);
    $condtion = " AND parent_id = '".$parent_id."'";
    $condtion_array = array(
        'field' => "*",
        'condition' => $condtion,
        'limit' => $config['limit'],
        'offset' => $offset,
        'debug' => FALSE
    );
    $res_array = $this->attributes_model->getlables($condtion_array);
    $config['total_rows'] = $this->attributes_model->total_rec_found;
    $data['page_links'] = admin_pagination($base_url, $config['total_rows'], $config['limit'], $offset);
    $data['heading_title'] = 'Option & Lable';
    $data['res'] = $res_array;
    $data['parent_id'] = $parent_id;


    if ($this->input->post('status_action') != '') {
      $this->update_status('wl_attributes_lable', 'id');
    }
    $this->load->view($this->default_view . '/view_lable_list', $data);
  }
  
  
  public function lable_add() {    
    $data['heading_title'] = 'Add Lable/Option';
    $parent_id = $this->uri->segment(4, 0);
    $data['parent_id'] = $parent_id;
    $attributes_name = $this->input->get_post('name');
    $this->form_validation->set_rules('name', 'Option Name', "trim|required|max_length[80]|xss_clean|unique[wl_attributes_lable.name ='" . $attributes_name . "' AND status!='2']");    
    
    if ($this->form_validation->run() === TRUE) {
      $posted_data = array(
          'name' => $this->input->post('name'),
          'parent_id' => $parent_id,
      );
      //trace($posted_data); die;
      $insertId = $this->attributes_model->safe_insert('wl_attributes_lable', $posted_data, FALSE);
      $this->session->set_userdata(array('msg_type' => 'success'));
      $this->session->set_flashdata('success', lang('success'));
      if ($this->input->get_post('sub') == 'Save') {
        redirect('sitepanel/attributes/lable_edit/' . $insertId, '');
      } elseif ($this->input->get_post('sub') == 'Save & Close') {
        redirect('sitepanel/attributes/lables/' . $parent_id, '');
      } else {
        redirect('sitepanel/attributes/lable_add/' . $parent_id, '');
      }
    }
    
    $this->load->view($this->default_view . '/view_lable_add', $data);
  }

  public function lable_edit() {
    $admin_info = $this->setting_model->get_admin_info(1);
    $data['admin_info'] = $admin_info;
    $catId = (int) $this->uri->segment(4);
    $rowdata = $this->attributes_model->get_label_by_id($catId);
    $data['heading_title'] = 'Edit Lable';
    
    if (!is_array($rowdata)) {
      $this->session->set_flashdata('message', lang('idmissing'));
      redirect('sitepanel/attributes', '');
    }
    
    $attributes_name = $this->input->get_post('name');
    $this->form_validation->set_rules('name', 'Lable Name', "trim|required|max_length[80]|xss_clean|unique[wl_attributes_lable.name ='" . $attributes_name . "' AND id !=$catId AND status!='2']");    
    
    if ($this->form_validation->run() == TRUE) {

      $posted_data = array(
          'name' => $this->input->post('name'),
      );


      $where = "id = '" . $catId . "'";
      $this->attributes_model->safe_update('wl_attributes_lable', $posted_data, $where, FALSE);

      $this->session->set_userdata(array('msg_type' => 'success'));
      $this->session->set_flashdata('success', lang('successupdate'));
      $redirect_path = 'attributes/lables/'.$rowdata['parent_id'];
      
      if ($this->input->get_post('sub') == 'Save') {
        redirect('sitepanel/attributes/lable_edit/' . $catId, '');
      } elseif ($this->input->get_post('sub') == 'Save & Close') {
        redirect('sitepanel/' . $redirect_path, '');
      } else {
        redirect('sitepanel/attributes/lable_add/'.$rowdata['parent_id'], '');
      }
      
    }

    $data['catresult'] = $rowdata;
    $this->load->view($this->default_view . '/view_lable_edit', $data);
  }
  

  public function delete() {
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
        $this->category_model->safe_delete('wl_categories', $where, TRUE);
        $this->session->set_userdata(array('msg_type' => 'success'));
        $this->session->set_flashdata('success', lang('deleted'));
      }
      redirect($_SERVER['HTTP_REFERER'], '');
    }
  }

}

// End of controller