<?php

class Store extends Admin_Controller {

  public function __construct() {
    parent::__construct();
    $this->load->model(array('store/store_model'));
  }

  public function index($page = NULL) {
    $condtion = array();
    $pagesize = (int) $this->input->get_post('pagesize');
    $config['limit'] = ( $pagesize > 0 ) ? $pagesize : $this->config->item('pagesize');
    $offset = ( $this->input->get_post('per_page') > 0 ) ? $this->input->get_post('per_page') : 0;
    $base_url = current_url_query_string(array('filter' => 'result'), array('per_page'));

    $status = $this->input->get_post('status', TRUE);
    if ($status != '') {
      $condtion['status'] = $status;
    }
    $res_array = $this->store_model->get_store("", "", $condtion);
    //echo_sql();
    $config['total_rows'] = get_found_rows();
    $data['heading_title'] = 'Store Lists';
    $data['res'] = $res_array;
    $data['page_links'] = admin_pagination($base_url, $config['total_rows'], $config['limit'], $offset);

    if ($this->input->post('status_action') != '') {
      $this->update_status('wl_store', 'setId');
    }

    $data['result_found'] = "Total " . $config['total_rows'] . " result(s) found ";
    $this->load->view('store/view_store_list', $data);
  }

  public function add() {
    $data['heading_title'] = 'Add Store';

    $this->form_validation->set_error_delimiters("<div class='required'>", "</div>");

    $this->form_validation->set_rules('location_id', 'Location Name', "trim|required");
    $this->form_validation->set_rules('store_name', 'Store Name', "trim|required|max_length[100]");
    if ($this->form_validation->run() === TRUE) {

      $posted_data = array(
          'location_id' => $this->input->post('location_id'),
          'store_name' => $this->input->post('store_name', TRUE),
          'added_date' => $this->config->item('config.date.time')
      );
      $setId = $this->store_model->safe_insert('wl_store', $posted_data, FALSE);


      $this->session->set_userdata(array('msg_type' => 'success'));
      $this->session->set_flashdata('success', lang('success'));
      redirect('sitepanel/store/index/', '');
    }

    $data['location'] = $this->db->query("SELECT * FROM tbl_country WHERE status = '1'")->result_array();
    $this->load->view('store/view_store_add', $data);
  }

  public function edit($productId) {

    $data['heading_title'] = 'Edit Catalog';
    $productId = (int) $this->uri->segment(4);
    $option = array('productid' => $productId);
    $res = $this->store_model->get_store(1, 0, $option);
    $this->form_validation->set_error_delimiters("<div class='required'>", "</div>");

    if (is_array($res) && !empty($res)) {
      $res = $res[0];

      $this->form_validation->set_rules('location_id', 'Location Name', "trim|required");
      $this->form_validation->set_rules('store_name', 'Store Name', "trim|required|max_length[100]");

      if ($this->form_validation->run() == TRUE) {
        $posted_data = array(
            'location_id' => $this->input->post('location_id'),
            'store_name' => $this->input->post('store_name', TRUE),
            'updated_date' => $this->config->item('config.date.time')
        );
        $where = "setId = '" . $res['setId'] . "'";
        $this->store_model->safe_update('wl_store', $posted_data, $where, FALSE);

        $this->session->set_userdata(array('msg_type' => 'success'));
        $this->session->set_flashdata('success', lang('successupdate'));
        redirect('sitepanel/store/index/', '');
      }

      $data['res'] = $res;
      $data['location'] = $this->db->query("SELECT * FROM tbl_country WHERE status = '1'")->result_array();
      $this->load->view('store/view_store_edit', $data);
    } else {
      redirect('sitepanel/store', '');
    }
  }

  public function pickup_point($page = NULL) {
    $condtion = array();
    $pagesize = (int) $this->input->get_post('pagesize');
    $config['limit'] = ( $pagesize > 0 ) ? $pagesize : $this->config->item('pagesize');
    $offset = ( $this->input->get_post('per_page') > 0 ) ? $this->input->get_post('per_page') : 0;
    $base_url = current_url_query_string(array('filter' => 'result'), array('per_page'));

    $status = $this->input->get_post('status', TRUE);
    if ($status != '') {
      $condtion['status'] = $status;
    }
    $res_array = $this->store_model->get_pickup("", "", $condtion);
    //echo_sql();
    $config['total_rows'] = get_found_rows();
    $data['heading_title'] = 'Pickup Point Lists';
    $data['res'] = $res_array;
    $data['page_links'] = admin_pagination($base_url, $config['total_rows'], $config['limit'], $offset);

    if ($this->input->post('status_action') != '') {
      $this->update_status('wl_pick_point', 'setId');
    }

    $data['result_found'] = "Total " . $config['total_rows'] . " result(s) found ";
    $this->load->view('store/view_pickup_list', $data);
  }

  public function add_point() {
    $data['heading_title'] = 'Add Store';

    $this->form_validation->set_error_delimiters("<div class='required'>", "</div>");
    $this->form_validation->set_rules('pickup_name', 'Pickup Point Name', "trim|required|max_length[100]");
    $this->form_validation->set_rules('pickup_city', 'Pickup Point City', "trim|required|max_length[100]");
    $this->form_validation->set_rules('pickup_address', 'Pickup Point Address', "trim|required|max_length[250]");
    if ($this->form_validation->run() === TRUE) {
      $posted_data = array(
          'pickup_name' => $this->input->post('pickup_name', TRUE),
          'pickup_city' => $this->input->post('pickup_city', TRUE),
          'pickup_address' => $this->input->post('pickup_address', TRUE),
          'added_date' => $this->config->item('config.date.time')
      );
      $setId = $this->store_model->safe_insert('wl_pick_point', $posted_data, FALSE);

      $this->session->set_userdata(array('msg_type' => 'success'));
      $this->session->set_flashdata('success', lang('success'));
      redirect('sitepanel/store/pickup_point/', '');
    }

    $data['location'] = $this->db->query("SELECT * FROM tbl_country WHERE status = '1'")->result_array();
    $this->load->view('store/view_pickup_add', $data);
  }

  public function edit_point($productId) {

    $data['heading_title'] = 'Edit Pickup Point';
    $productId = (int) $this->uri->segment(4);
    $option = array('setId' => $productId);
    $res = $this->store_model->get_pickup(1, 0, $option);
    //echo_sql();
    $this->form_validation->set_error_delimiters("<div class='required'>", "</div>");

    if (is_array($res) && !empty($res)) {
      $res = $res[0];

      $this->form_validation->set_rules('pickup_name', 'Pickup Point Name', "trim|required|max_length[100]");
      $this->form_validation->set_rules('pickup_city', 'Pickup Point City', "trim|required|max_length[100]");
      $this->form_validation->set_rules('pickup_address', 'Pickup Point Address', "trim|required|max_length[250]");

      if ($this->form_validation->run() == TRUE) {
        $posted_data = array(
            'pickup_name' => $this->input->post('pickup_name', TRUE),
            'pickup_city' => $this->input->post('pickup_city', TRUE),
            'pickup_address' => $this->input->post('pickup_address', TRUE),
            'updated_date' => $this->config->item('config.date.time')
        );
        $where = "setId = '" . $res['setId'] . "'";
        $this->store_model->safe_update('wl_pick_point', $posted_data, $where, FALSE);

        $this->session->set_userdata(array('msg_type' => 'success'));
        $this->session->set_flashdata('success', lang('successupdate'));
        redirect('sitepanel/store/pickup_point/', '');
      }

      $data['res'] = $res;
      $data['location'] = $this->db->query("SELECT * FROM tbl_country WHERE status = '1'")->result_array();
      $this->load->view('store/view_pickup_edit', $data);
    } else {
      redirect('sitepanel/store/pickup_point', '');
    }
  }

}

// End of controller