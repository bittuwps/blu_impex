<?php

class Themes extends Admin_Controller {

  public function __construct() {
    parent::__construct();
    $this->load->model(array('themes/themes_model'));
    $this->form_validation->set_error_delimiters("<div class='required'>", "</div>");
    $this->default_view = 'themes';
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
    $res_array = $this->themes_model->gettheme($condtion_array);
    $config['total_rows'] = $this->themes_model->total_rec_found;
    $data['page_links'] = admin_pagination($base_url, $config['total_rows'], $config['limit'], $offset);
    $data['heading_title'] = ( $parent_id > 0 ) ? 'Subthemes' : 'Themes';
    $data['res'] = $res_array;
    $data['parent_id'] = $parent_id;


    if ($this->input->post('status_action') != '') {
      if ($this->input->post('status_action') == 'Delete') {
        $prod_id = $this->input->post('arr_ids');
        $this->session->set_flashdata('delete_cat', 'Theme Has been deleted Successfully!');
        foreach ($prod_id as $v) {
          $where = array('entity_type' => 'themes/index', 'entity_id' => $v);
          $this->themes_model->safe_delete('wl_meta_tags', $where, TRUE);
        }
      }
      $this->update_status('wl_themes', 'theme_id');
    }
    if ($this->input->post('update_order') != '') {
      $this->update_displayOrder('wl_themes', 'sort_order', 'theme_id');
    }

    /* themes set as a */
    if ($this->input->post('set_as') != '') {
      $set_as = $this->input->post('set_as', TRUE);
      $this->set_as('wl_themes', 'theme_id', array($set_as => '1'));
    }
    if ($this->input->post('unset_as') != '') {
      $unset_as = $this->input->post('unset_as', TRUE);
      $this->set_as('wl_themes', 'theme_id', array($unset_as => '0'));
    }
    /* End themes set as a */
    $this->load->view($this->default_view . '/view_themes_list', $data);
  }

  public function add() {
    $parent_id = (int) $this->uri->segment(4, 0);
    $img_allow_size = $this->config->item('allow.file.size');
    $img_allow_dim = $this->config->item('allow.imgage.dimension');
    $themes_name = $this->db->escape_str($this->input->post('themes_name'));
    $posted_friendly_url = $this->input->post('friendly_url');

    if ($parent_id != '' && $parent_id > 0) {
      $parent_id = applyFilter('NUMERIC_GT_ZERO', $parent_id);
      $data['heading_title'] = 'Add Subthemes';
      if ($parent_id <= 0) {
        redirect("sitepanel/themes");
      }
      $parentdata = $this->themes_model->get_theme_by_id($parent_id);
      if (!is_array($parentdata)) {
        $this->session->set_flashdata('message', lang('invalidRecord'));
        redirect('sitepanel/themes', '');
      }
      $this->cbk_friendly_url = $parentdata['friendly_url'] . "/" . seo_url_title($posted_friendly_url);
      $data['parentData'] = $parentdata;
    } else {
      $this->cbk_friendly_url = seo_url_title($posted_friendly_url);
      $data['parentData'] = '';
      $data['heading_title'] = 'Add Theme';
    }

    $seo_url_length = $this->config->item('seo_url_length');
    $this->form_validation->set_rules('themes_name', 'Theme Name', "trim|required|max_length[100]|xss_clean|unique[wl_themes.theme_name ='" . $themes_name . "' AND status!='2']");
    $this->form_validation->set_rules('friendly_url', 'Page URL', "trim|required|max_length[$seo_url_length]|xss_clean|unique[wl_meta_tags.page_url ='" . $this->cbk_friendly_url . "'] ");
    $this->form_validation->set_rules('themes_image', 'Theme Image', "file_allowed_type[image]|file_size_max[$img_allow_size]|check_dimension[$img_allow_dim]");
    $this->form_validation->set_rules('themes_alt', 'Alt', "trim|max_length[100]");
    
    if ($this->form_validation->run() === TRUE) {
      $uploaded_file = "";
      if (!empty($_FILES) && $_FILES['themes_image']['name'] != '') {
        $this->load->library('upload');
        $uploaded_data = $this->upload->my_upload('themes_image', 'themes');
        if (is_array($uploaded_data) && !empty($uploaded_data)) {
          $uploaded_file = $uploaded_data['upload_data']['file_name'];
        }
      }
      $redirect_url = "themes/index";
      $themes_alt = $this->input->post('themes_alt');
      if ($themes_alt == '') {
        $themes_alt = $this->input->post('themes_name');
      }
      $meta_description = $this->input->post('themes_name');
      $meta_keyword = $this->input->post('themes_name');
      
      $posted_data = array(
          'theme_name' => $this->input->post('themes_name'),
          'theme_alt' => $themes_alt,
          'friendly_url' => $this->cbk_friendly_url,
          'date_added' => $this->config->item('config.date.time'),
          'theme_image' => $uploaded_file
      );
      $insertId = $this->themes_model->safe_insert('wl_themes', $posted_data, FALSE);
      if ($insertId > 0) {
        $meta_array = array(
            'entity_type' => $redirect_url,
            'entity_id' => $insertId,
            'page_url' => $this->cbk_friendly_url,
            'meta_title' => get_text($this->input->post('themes_name'), 80),
            'meta_description' => get_text($meta_description),
            'meta_keyword' => get_keywords($meta_keyword)
        );
        create_meta($meta_array);
      }
      $this->session->set_userdata(array('msg_type' => 'success'));
      $this->session->set_flashdata('success', lang('success'));
      $redirect_path = isset($parentdata) && is_array($parentdata) ? 'themes/index/' . $parentdata['themes_id'] : 'themes';
      redirect('sitepanel/' . $redirect_path, '');
    }
    $data['parent_id'] = $parent_id;
    $this->load->view($this->default_view . '/view_themes_add', $data);
  }

  public function edit() {
    $catId = (int) $this->uri->segment(4);
    $rowdata = $this->themes_model->get_theme_by_id($catId);
    $data['heading_title'] = 'Theme';
    $img_allow_size = $this->config->item('allow.file.size');
    $img_allow_dim = $this->config->item('allow.imgage.dimension');
    if (!is_array($rowdata)) {
      $this->session->set_flashdata('message', lang('idmissing'));
      redirect('sitepanel/themes', '');
    }
    $themesId = $rowdata['theme_id'];

    $this->form_validation->set_rules('themes_name', 'Theme Name', "trim|required|max_length[100]|xss_clean|unique[wl_themes.theme_name ='" . $this->db->escape_str($this->input->post('themes_name')) . "' AND status!='2' AND theme_id!='" . $themesId . "']");
    $seo_url_length = $this->config->item('seo_url_length');
    $this->form_validation->set_rules('themes_image', 'Theme Image', "file_allowed_type[image]|file_size_max[$img_allow_size]|check_dimension[$img_allow_dim]");
    if ($this->form_validation->run() == TRUE) {
      $uploaded_file = $rowdata['theme_image'];
      $unlink_image = array('source_dir' => "themes", 'source_file' => $rowdata['theme_image']);
      if ($this->input->post('cat_img_delete') === 'Y') {
        removeImage($unlink_image);
        $uploaded_file = NULL;
      }
      if (!empty($_FILES) && $_FILES['themes_image']['name'] != '') {
        $this->load->library('upload');
        $uploaded_data = $this->upload->my_upload('themes_image', 'themes');
        if (is_array($uploaded_data) && !empty($uploaded_data)) {
          $uploaded_file = $uploaded_data['upload_data']['file_name'];
          removeImage($unlink_image);
        }
      }
      $themes_alt = $this->input->post('themes_alt');
      if ($themes_alt == '') {
        $themes_alt = $this->input->post('themes_name');
      }
      $themes_description = $this->input->post('themes_description');
      $themes_description = $themes_description != '' ? $themes_description : null;
      $posted_data = array(
          'theme_name' => $this->input->post('themes_name'),
          'theme_alt' => $themes_alt,
          'theme_description' => $themes_description,
          'theme_image' => $uploaded_file
      );
      $where = "theme_id = '" . $themesId . "'";
      $this->themes_model->safe_update('wl_themes', $posted_data, $where, FALSE);
      update_meta_page_url('themes/index',$themesId,$this->cbk_friendly_url);
      $this->session->set_userdata(array('msg_type' => 'success'));
      $this->session->set_flashdata('success', lang('successupdate'));
      $redirect_path = $rowdata['parent_id'] > 0 ? 'themes/index/' . $rowdata['parent_id'] : 'themes';
      redirect('sitepanel/' . $redirect_path . '/' . query_string(), '');
    }
    $data['catresult'] = $rowdata;
    $this->load->view($this->default_view . '/view_themes_edit', $data);
  }

  public function delete() {
    $catId = (int) $this->uri->segment(4, 0);
    $rowdata = $this->themes_model->get_theme_by_id($catId);
    if (!is_array($rowdata)) {
      $this->session->set_flashdata('message', lang('idmissing'));
      redirect('sitepanel/themes', '');
    } else {
      $total_product = count_products("AND theme_id='$catId' ");
      if ($total_product > 0) {
        $this->session->set_userdata(array('msg_type' => 'error'));
        $this->session->set_flashdata('error', lang('child_to_delete'));
      } else {
        $where = array('theme_id' => $catId);
        $this->themes_model->safe_delete('wl_themes', $where, TRUE);
        $this->session->set_userdata(array('msg_type' => 'success'));
        $this->session->set_flashdata('success', lang('deleted'));
      }
      redirect($_SERVER['HTTP_REFERER'], '');
    }
  }

}

// End of controller