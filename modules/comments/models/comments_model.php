<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class Comments_model extends MY_Model {

  public function get_comments($cfg = array()) {

    $sql_keys = '';
    $limit_clause = '';
    $excond = '';
    if (array_key_exists('limit', $cfg) && applyFilter('NUMERIC_GT_ZERO', $cfg['limit']) > 0) {
      $sql_keys = "SQL_CALC_FOUND_ROWS";
      $limit_clause = " limit " . $cfg['limit'];
    }
    if (array_key_exists('offset', $cfg) && applyFilter('NUMERIC_WT_ZERO', $cfg['offset']) != -1) {
      $limit_clause = " limit " . $cfg['offset'] . "," . $cfg['limit'];
    }
    if (array_key_exists('condition', $cfg) && $cfg['condition'] != '') {
      $excond .= $cfg['condition'];
    }

    if (!array_key_exists('order', $cfg) || $cfg['order'] == '') {
      $order_by = "a.review_date DESC ";
    } else {
      $order_by = $cfg['order'];
    }

    if (!array_key_exists('exjoin', $cfg) || $cfg['exjoin'] == '') {
      $exjoin = "";
    } else {
      $exjoin = $cfg['exjoin'];
    }

    if (!array_key_exists('exselect', $cfg) || $cfg['exselect'] == '') {
      $exselect = "";
    } else {
      $exselect = $cfg['exselect'];
    }

    $query = "SELECT $sql_keys a.*, u.first_name, u.last_name $exselect FROM wl_review as a LEFT JOIN wl_customers as u ON  a.customer_id=u.customers_id $exjoin WHERE (a.status != '2' AND (u.status !='2' OR  ISNULL(u.customers_id)) )   $excond  ORDER BY $order_by ";
    $query.=$limit_clause;
    $comment_query = $this->db->query($query);
    $result = $comment_query->result_array();
    return $result;
  }

  public function getUtripComments($cfg = array()) {

    $sql_keys = '';
    $limit_clause = '';
    $excond = '';
    if (array_key_exists('limit', $cfg) && applyFilter('NUMERIC_GT_ZERO', $cfg['limit']) > 0) {
      $sql_keys = "SQL_CALC_FOUND_ROWS";
      $limit_clause = " limit " . $cfg['limit'];
    }
    if (array_key_exists('offset', $cfg) && applyFilter('NUMERIC_WT_ZERO', $cfg['offset']) != -1) {
      $limit_clause = " limit " . $cfg['offset'] . "," . $cfg['limit'];
    }
    if (array_key_exists('condition', $cfg) && $cfg['condition'] != '') {
      $excond .= $cfg['condition'];
    }

    if (!array_key_exists('order', $cfg) || $cfg['order'] == '') {
      $order_by = "a.subscribed DESC ";
    } else {
      $order_by = $cfg['order'];
    }

    if (!array_key_exists('exjoin', $cfg) || $cfg['exjoin'] == '') {
      $exjoin = "";
    } else {
      $exjoin = $cfg['exjoin'];
    }

    if (!array_key_exists('exselect', $cfg) || $cfg['exselect'] == '') {
      $exselect = "";
    } else {
      $exselect = $cfg['exselect'];
    }

    $query = "SELECT $sql_keys a.*,  u.username, u.phone_number, u.first_name, u.last_name $exselect FROM wl_trip_idea_comments as a LEFT JOIN wl_users as u ON  a.customers_id=u.customers_id $exjoin WHERE (a.status != '2' AND (u.status !='2' OR  ISNULL(u.customers_id)) )   $excond  ORDER BY $order_by ";
    $query.=$limit_clause;
    $comment_query = $this->db->query($query);
    $result = $comment_query->result_array();
    return $result;
  }

  public function getAlbumComments($cfg = array()) {

    $sql_keys = '';
    $limit_clause = '';
    $excond = '';
    if (array_key_exists('limit', $cfg) && applyFilter('NUMERIC_GT_ZERO', $cfg['limit']) > 0) {
      $sql_keys = "SQL_CALC_FOUND_ROWS";
      $limit_clause = " limit " . $cfg['limit'];
    }
    if (array_key_exists('offset', $cfg) && applyFilter('NUMERIC_WT_ZERO', $cfg['offset']) != -1) {
      $limit_clause = " limit " . $cfg['offset'] . "," . $cfg['limit'];
    }
    if (array_key_exists('condition', $cfg) && $cfg['condition'] != '') {
      $excond .= $cfg['condition'];
    }

    if (!array_key_exists('order', $cfg) || $cfg['order'] == '') {
      $order_by = "a.subscribed DESC ";
    } else {
      $order_by = $cfg['order'];
    }

    if (!array_key_exists('exjoin', $cfg) || $cfg['exjoin'] == '') {
      $exjoin = "";
    } else {
      $exjoin = $cfg['exjoin'];
    }

    if (!array_key_exists('exselect', $cfg) || $cfg['exselect'] == '') {
      $exselect = "";
    } else {
      $exselect = $cfg['exselect'];
    }

    $query = "SELECT $sql_keys a.*, u.first_name, u.last_name $exselect FROM wl_share_image_comments as a LEFT JOIN wl_users as u ON  a.customers_id=u.customers_id $exjoin WHERE (a.status != '2' AND (u.status !='2' OR  ISNULL(u.customers_id)) )   $excond  ORDER BY $order_by ";
    $query.=$limit_clause;
    $comment_query = $this->db->query($query);
    $result = $comment_query->result_array();
    return $result;
  }

  public function getVideoComments($cfg = array()) {

    $sql_keys = '';
    $limit_clause = '';
    $excond = '';
    if (array_key_exists('limit', $cfg) && applyFilter('NUMERIC_GT_ZERO', $cfg['limit']) > 0) {
      $sql_keys = "SQL_CALC_FOUND_ROWS";
      $limit_clause = " limit " . $cfg['limit'];
    }
    if (array_key_exists('offset', $cfg) && applyFilter('NUMERIC_WT_ZERO', $cfg['offset']) != -1) {
      $limit_clause = " limit " . $cfg['offset'] . "," . $cfg['limit'];
    }
    if (array_key_exists('condition', $cfg) && $cfg['condition'] != '') {
      $excond .= $cfg['condition'];
    }

    if (!array_key_exists('order', $cfg) || $cfg['order'] == '') {
      $order_by = "a.subscribed DESC ";
    } else {
      $order_by = $cfg['order'];
    }

    if (!array_key_exists('exjoin', $cfg) || $cfg['exjoin'] == '') {
      $exjoin = "";
    } else {
      $exjoin = $cfg['exjoin'];
    }

    if (!array_key_exists('exselect', $cfg) || $cfg['exselect'] == '') {
      $exselect = "";
    } else {
      $exselect = $cfg['exselect'];
    }

    $query = "SELECT $sql_keys a.*, u.first_name, u.last_name $exselect FROM wl_share_video_comments as a LEFT JOIN wl_users as u ON  a.customers_id=u.customers_id $exjoin WHERE (a.status != '2' AND (u.status !='2' OR  ISNULL(u.customers_id)) )   $excond  ORDER BY $order_by ";
    $query.=$limit_clause;
    $comment_query = $this->db->query($query);
    $result = $comment_query->result_array();
    return $result;
  }

  public function getStoryComments($cfg = array()) {

    $sql_keys = '';
    $limit_clause = '';
    $excond = '';
    if (array_key_exists('limit', $cfg) && applyFilter('NUMERIC_GT_ZERO', $cfg['limit']) > 0) {
      $sql_keys = "SQL_CALC_FOUND_ROWS";
      $limit_clause = " limit " . $cfg['limit'];
    }
    if (array_key_exists('offset', $cfg) && applyFilter('NUMERIC_WT_ZERO', $cfg['offset']) != -1) {
      $limit_clause = " limit " . $cfg['offset'] . "," . $cfg['limit'];
    }
    if (array_key_exists('condition', $cfg) && $cfg['condition'] != '') {
      $excond .= $cfg['condition'];
    }

    if (!array_key_exists('order', $cfg) || $cfg['order'] == '') {
      $order_by = "a.subscribed DESC ";
    } else {
      $order_by = $cfg['order'];
    }

    if (!array_key_exists('exjoin', $cfg) || $cfg['exjoin'] == '') {
      $exjoin = "";
    } else {
      $exjoin = $cfg['exjoin'];
    }

    if (!array_key_exists('exselect', $cfg) || $cfg['exselect'] == '') {
      $exselect = "";
    } else {
      $exselect = $cfg['exselect'];
    }

    $query = "SELECT $sql_keys a.*, u.first_name, u.last_name $exselect FROM wl_share_story_comments as a LEFT JOIN wl_users as u ON  a.customers_id=u.customers_id $exjoin WHERE (a.status != '2' AND (u.status !='2' OR  ISNULL(u.customers_id)) )   $excond  ORDER BY $order_by ";
    $query.=$limit_clause;
    $comment_query = $this->db->query($query);
    $result = $comment_query->result_array();
    return $result;
  }

  public function get_count_comments($cfg = array()) {
    $query = "SELECT count(a.id) as gtotal FROM wl_trip_comments as a LEFT JOIN wl_trips as b ON a.trip_id=b.trip_id  WHERE   b.status!='2' " . $cfg['condition'];
    $result = $this->db->query($query)->row();
    return $result->gtotal;
  }

  public function get_comment_by_id($id) {
    $id = applyFilter('NUMERIC_GT_ZERO', $id);

    if ($id > 0) {
      $condtion = "status !='2' AND id=$id";
      $fetch_config = array(
          'condition' => $condtion,
          'debug' => FALSE,
          'return_type' => "array"
      );
      $result = $this->find('wl_trip_comments', $fetch_config);
      return $result;
    }
  }

}

?>