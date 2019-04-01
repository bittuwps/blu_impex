<?php

class Subloccontent extends Admin_Controller {

  public function __construct() {
    parent::__construct();
    $this->load->model(array('subloccontent_model'));
    $this->load->helper('category/category');
    $this->form_validation->set_error_delimiters("<div class='required'>", "</div>");
  }

  //Country 
  public function index() {
    $pagesize = (int) $this->input->get_post('pagesize');
    $config['limit'] = ( $pagesize > 0 ) ? $pagesize : $this->config->item('pagesize');
    $offset = ( $this->input->get_post('per_page') > 0 ) ? $this->input->get_post('per_page') : 0;
    $base_url = current_url_query_string(array('filter' => 'result'), array('per_page'));

    $keyword = trim($this->input->get_post('keyword', TRUE));
    $keyword = $this->db->escape_str($keyword);
    $condtion = " ";
    if ($keyword != '') {
      $condtion = "AND (description like '%" . $keyword . "%' OR shortdescription like '%" . $keyword . "%')";
    }

    $condtion_array = array();
    $res_array = $this->subloccontent_model->get_record();
    $config['total_rows'] = $this->subloccontent_model->total_rec_found;

    $data['heading_title'] = "Manage Subcontent";
    $data['res'] = $res_array;

    if ($this->input->post('status_action') != '') {
      $this->update_status('wl_subloccontent', 'subcontentId');
    }
    
    $this->load->view('subloccontent/subloccontent_list_view', $data);
  }

  public function add() {

    $data['heading_title'] = "Add Location Subdomain Content";
    $data['ckeditor'] = set_ck_config(array('textarea_id' => 'description'));
    if ($this->input->post('submit')) {

      $this->form_validation->set_rules('location_id', "Locations", "required");
      //$this->form_validation->set_rules('page_heading', "Page Heading", "trim|max_length[220]");
      $this->form_validation->set_rules('description', "Description", "trim|required");
      $this->form_validation->set_rules('short_description', "Short Description", "trim|required");
      $this->form_validation->set_rules('meta_title', "Meta Title", "trim|required|max_length[220]");
      $this->form_validation->set_rules('meta_keyword', "Meta Keyword", "trim|required|max_length[460]");
      $this->form_validation->set_rules('meta_description', "Meta Description", "trim|required|max_length[250]");
      $this->form_validation->set_rules('meta_key1', "Keyword 1", "trim|max_length[60]");
      $this->form_validation->set_rules('meta_key2', "Keyword 2", "trim|max_length[60]");
      $this->form_validation->set_rules('meta_key3', "Keyword 3", "trim|max_length[60]");

      if ($this->form_validation->run() == TRUE) {

        //Category Links
        $postCategory = array();
        if ($this->input->post('location_id')) {
          $postCategory = $this->input->post('location_id');
        }
        //trace($postCategory);
       

        //Insert in meta table
        $posted_data = array(
            'description' => $this->input->post('description'),
            'short_description' => $this->input->post('short_description'),
            //'page_heading' => $this->input->post('page_heading'),
            'meta_keyword' => $this->input->post('meta_keyword'),
            'meta_description' => $this->input->post('meta_description'),
            'meta_title' => $this->input->post('meta_title'),
            'location_id' => implode(",", $postCategory),
            'meta_key1' => $this->input->post('meta_key1'),
            'meta_key2' => $this->input->post('meta_key2'),
            'meta_key3' => $this->input->post('meta_key3'),
        );
        //trace($posted_data);
        //die;
        $this->subloccontent_model->safe_insert('wl_subloccontent', $posted_data, FALSE);

        $this->session->set_flashdata('success', lang('success'));
        redirect("sitepanel/subloccontent/");
      }
    }
    $data['locations'] = $this->db->query("SELECT meta_id,page_url FROM wl_meta_tags WHERE is_fixed='L' ORDER BY page_url")->result_array();
    $this->load->view("subloccontent/add_subloccontent", $data);
  }

  public function edit() {
    $id = $this->uri->segment(4, 0);
    
    $data['ckeditor'] = set_ck_config(array('textarea_id' => 'description'));
    $data['heading_title'] = "Edit Country";
    $res = $this->db->query("SELECT * FROM wl_subloccontent WHERE subcontentId='".$id."'")->row_array();
    $data['res'] = $res;

    if ($this->input->post('update')) {

      $this->form_validation->set_rules('location_id', "Locations", "required");
      //$this->form_validation->set_rules('page_heading', "Page Heading", "trim|max_length[220]");
      $this->form_validation->set_rules('description', "Description", "trim|required");
      $this->form_validation->set_rules('short_description', "Short Description", "trim|required");
      $this->form_validation->set_rules('meta_title', "Meta Title", "trim|required|max_length[220]");
      $this->form_validation->set_rules('meta_keyword', "Meta Keyword", "trim|required|max_length[460]");
      $this->form_validation->set_rules('meta_description', "Meta Description", "trim|required|max_length[250]");
      $this->form_validation->set_rules('meta_key1', "Keyword 1", "trim|max_length[60]");
      $this->form_validation->set_rules('meta_key2', "Keyword 2", "trim|max_length[60]");
      $this->form_validation->set_rules('meta_key3', "Keyword 3", "trim|max_length[60]");

      if ($this->form_validation->run() == TRUE) {
        //Category Links
        $postCategory = array();
        if ($this->input->post('location_id')) {
          $postCategory = $this->input->post('location_id');
        }
        
        
        //Insert in meta table
        $posted_data = array(
            'description' => $this->input->post('description'),
            'short_description' => $this->input->post('short_description'),
            //'page_heading' => $this->input->post('page_heading'),
            'meta_keyword' => $this->input->post('meta_keyword'),
            'meta_description' => $this->input->post('meta_description'),
            'meta_title' => $this->input->post('meta_title'),
            'location_id' => implode(",", $postCategory),
            'meta_key1' => $this->input->post('meta_key1'),
            'meta_key2' => $this->input->post('meta_key2'),
            'meta_key3' => $this->input->post('meta_key3'),
        );
        //trace($posted_data);
        //die;
        $where_meta = "subcontentId=" . $id . " ";
        $this->subloccontent_model->safe_update('wl_subloccontent', $posted_data, $where_meta, FALSE);
        $this->session->set_flashdata('success', lang('successupdate'));
        redirect("sitepanel/subloccontent/");
      }
    }
    $data['locations'] = $this->db->query("SELECT meta_id,page_url FROM wl_meta_tags WHERE is_fixed='L' ORDER BY page_url")->result_array();
    $this->load->view("subloccontent/edit_subloccontent", $data);
  }
}
// End of controller