<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class Themes_model extends MY_Model {
  public function __construct() {
    parent::__construct();
  }
  public function gettheme($opts = array()) {
    $keyword = trim($this->input->get_post('keyword', TRUE));
    $keyword = $this->db->escape_str($keyword);
    $status = $this->db->escape_str($this->input->get_post('status', TRUE));
    if (!array_key_exists('condition', $opts) || $opts['condition'] == '') {
      $opts['condition'] = "status !='2' ";
    } else {
      $opts['condition'] = "status !='2' " . $opts['condition'];
    }
    if ($keyword != '') {
      $opts['condition'].= " AND theme_name like '%" . $keyword . "%'";
    }
    if ($status != '') {
      $opts['condition'].= " AND status='$status' ";
    }
    $opts['order'] = "theme_id desc ";
    $opts['condition'].= " ";
    $fetch_config = array('condition' => $opts['condition'],'order' => $opts['order'],'return_type' => "array");
    if (array_key_exists('debug', $opts)) {
      $fetch_config['debug'] = $opts['debug'];
    }
    if (array_key_exists('field', $opts) && $opts['field'] != '') {
      $fetch_config['field'] = $opts['field'];
    }
    if (array_key_exists('limit', $opts) && applyFilter('NUMERIC_GT_ZERO', $opts['limit']) > 0) {
      $fetch_config['limit'] = $opts['limit'];
    }
    if (array_key_exists('offset', $opts) && applyFilter('NUMERIC_WT_ZERO', $opts['offset']) != -1) {
      $fetch_config['start'] = $opts['offset'];
    }
    //trace($fetch_config);exit;
    $result = $this->findAll('wl_themes as a', $fetch_config);
    return $result;
  }

  public function get_theme_by_id($id) {
    $id = applyFilter('NUMERIC_GT_ZERO', $id);
    if ($id > 0) {
      $condtion = "status !='2' AND theme_id=$id";
      $fetch_config = array(
          'condition' => $condtion,
          'debug' => FALSE,
          'return_type' => "array"
      );
      $result = $this->find('wl_themes', $fetch_config);
      return $result;
    }
  }
}
// model end here