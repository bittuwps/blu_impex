<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class Store_model extends MY_Model {

  public function get_store($limit = '10', $offset = '0', $param = array()) {
    $status = @$param['status'];
    $orderby = @$param['orderby'];
    $where = @$param['where'];
    $keyword = trim($this->input->get_post('keyword', TRUE));
    $keyword = $this->db->escape_str($keyword);
        
    if ($status != '') {
      $this->db->where("wlp.status", "$status");
    }
    if ($where != '') {
      $this->db->where($where);
    }
    if ($keyword != '') {
      $this->db->where("(wlp.store_name LIKE '%" . $keyword . "%' )");
    }
    if ($orderby != '') {
      $this->db->order_by($orderby);
    } else {
      $this->db->order_by('wlp.setId ', 'desc');
    }
    if ($limit > 0) {
      if (applyFilter('NUMERIC_WT_ZERO', $offset) == -1) {
        $offset = 0;
      }
      $this->db->limit($limit, $offset);
    }
    $this->db->group_by("wlp.setId");
    $this->db->select('SQL_CALC_FOUND_ROWS wlp.*', FALSE);
    $this->db->from('wl_store as wlp');
    $this->db->where('wlp.status !=', '2');
    //$this->db->join('wl_fullset_media AS wlpm', 'wlp.setId=wlpm.fullset_id', 'left');
    $q = $this->db->get();
    //echo_sql();
    //die;
    $result = $q->result_array();
    return $result;
  }
  
  public function get_pickup($limit = '10', $offset = '0', $param = array()) {
    $status = @$param['status'];
    $orderby = @$param['orderby'];
    $where = @$param['where'];
    $setId = @$param['setId'];
    $keyword = trim($this->input->get_post('keyword', TRUE));
    $keyword = $this->db->escape_str($keyword);
        
    if ($status != '') {
      $this->db->where("wlp.status", "$status");
    }
    if ($setId != '') {
      $this->db->where("wlp.setId", "$setId");
    }
    if ($where != '') {
      $this->db->where($where);
    }
    if ($keyword != '') {
      $this->db->where("(wlp.pickup_name LIKE '%" . $keyword . "%' )");
    }
    if ($orderby != '') {
      $this->db->order_by($orderby);
    } else {
      $this->db->order_by('wlp.setId ', 'desc');
    }
    if ($limit > 0) {
      if (applyFilter('NUMERIC_WT_ZERO', $offset) == -1) {
        $offset = 0;
      }
      $this->db->limit($limit, $offset);
    }
    $this->db->group_by("wlp.setId");
    $this->db->select('SQL_CALC_FOUND_ROWS wlp.*', FALSE);
    $this->db->from('wl_pick_point as wlp');
    $this->db->where('wlp.status !=', '2');
    //$this->db->join('wl_fullset_media AS wlpm', 'wlp.setId=wlpm.fullset_id', 'left');
    $q = $this->db->get();
    //echo_sql();
    //die;
    $result = $q->result_array();
    return $result;
  }
  
  
  public function get_fullset_front($limit = '10', $offset = '0', $param = array()) {
    $category_id = @$param['category_id'];
    $categoryIds = @$param['categoryIds'];
    $status = @$param['status'];
    $productid = @$param['productid'];
    $orderby = @$param['orderby'];
    $where = @$param['where'];
    $price = @$param['price'];
    $keyword = trim($this->input->get_post('keyword', TRUE));
    $keyword = $this->db->escape_str($keyword);
    
    
    if (!empty($price)) {
      $price = explode('-', $price);
      if ($price[0] <= 0) {
        $this->db->where("wlp.catalog_price <= '$price[1]'");
      } elseif ($price[1] <= 0) {
        $this->db->where("wlp.catalog_price >= '$price[0]'");
      } else {
        $this->db->where("wlp.catalog_price between '$price[0]' AND '$price[1]'");
      }
    }
    if ($category_id != '') {
      $this->db->where("wlp.category_id ", "$category_id");
    }
    if ($categoryIds != '') {
      $this->db->where("FIND_IN_SET($categoryIds, wlp.category_links)");
    }
    if ($productid != '') {
      $this->db->where("wlp.setId  ", "$productid");
    }
    if ($status != '') {
      $this->db->where("wlp.status", "$status");
    }
    if ($where != '') {
      $this->db->where($where);
    }
    if ($keyword != '') {
      $this->db->where("(wlp.catalog_name LIKE '%" . $keyword . "%' OR wlp.catalog_code LIKE '%" . $keyword . "%' )");
    }
    if ($orderby != '') {
      $this->db->order_by($orderby);
    } else {
      $this->db->order_by('wlp.setId ', 'desc');
    }
    if ($limit > 0) {
      if (applyFilter('NUMERIC_WT_ZERO', $offset) == -1) {
        $offset = 0;
      }
      $this->db->limit($limit, $offset);
    }
    $this->db->group_by("wlp.setId");
    $this->db->select('SQL_CALC_FOUND_ROWS wlp.*,wlpm.media,wlpm.media_type,wlpm.is_default', FALSE);
    $this->db->from('wl_fullset as wlp');
    $this->db->where('wlp.status !=', '2');
    $this->db->join('wl_fullset_media AS wlpm', 'wlp.setId=wlpm.fullset_id', 'left');
    $q = $this->db->get();
    //echo_sql();
    //die;
    $result = $q->result_array();
    return $result;
  }
  public function update_viewed($id, $counter = 0) {
    $id = (int) $id;
    if ($id > 0) {
      $posted_data = array(
          'catalog_viewed' => ($counter + 1)
      );
      $where = "setId = '" . $id . "'";
      $this->category_model->safe_update('wl_fullset', $posted_data, $where, FALSE);
    }
  }
  
  public function get_fullset_media($limit = '5', $offset = '0', $param = array()) {

    $default = @$param['default'];
    $fullsetid = @$param['fullsetid'];
    $media_type = @$param['media_type'];

    if (is_array($param) && !empty($param)) {
      $this->db->select('SQL_CALC_FOUND_ROWS *', FALSE);
      $this->db->limit($limit, $offset);
      $this->db->from('wl_fullset_media');
      $this->db->where('fullset_id', $fullsetid);

      if ($default != '') {
        $this->db->where('is_default', $default);
      }
      if ($media_type != '') {
        $this->db->where('media_type', $media_type);
      }

      $q = $this->db->get();
      $result = $q->result_array();
      $result = ($limit == '1') ? $result[0] : $result;
      return $result;
    }
  }

}
