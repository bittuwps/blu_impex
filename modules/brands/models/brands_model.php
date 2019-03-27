<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class Brands_model extends MY_Model {
  public function __construct() {
    parent::__construct();
  }
  public function getbrand($opts = array()) {
    $keyword = trim($this->input->get_post('keyword', TRUE));
    $keyword = $this->db->escape_str($keyword);
    $status = $this->db->escape_str($this->input->get_post('status', TRUE));
    if (!array_key_exists('condition', $opts) || $opts['condition'] == '') {
      $opts['condition'] = "status !='2' ";
    } else {
      $opts['condition'] = "status !='2' " . $opts['condition'];
    }
    if ($keyword != '') {
      $opts['condition'].= " AND brand_name like '%" . $keyword . "%'";
    }
    if ($status != '') {
      $opts['condition'].= " AND status='$status' ";
    }
    $opts['order'] = "brand_id desc ";
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
    $result = $this->findAll('wl_brands as a', $fetch_config);
    return $result;
  }

  public function get_brand_by_id($id) {
    $id = applyFilter('NUMERIC_GT_ZERO', $id);
    if ($id > 0) {
      $condtion = "status !='2' AND brand_id=$id";
      $fetch_config = array(
          'condition' => $condtion,
          'debug' => FALSE,
          'return_type' => "array"
      );
      $result = $this->find('wl_brands', $fetch_config);
      return $result;
    }
  }
}
// model end here