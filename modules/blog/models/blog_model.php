<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class Blog_model extends MY_Model {

  public function get_blog($limit = '10', $offset = '0', $param = array()) {
    $category_id = @$param['id'];
    $status = @$param['status'];
    $productid = @$param['productid'];
    $orderby = @$param['orderby'];
    $where = @$param['where'];
    $keyword = trim($this->input->get_post('keyword', TRUE));
    $keyword = $this->db->escape_str($keyword);



    if ($category_id != '') {
      $this->db->where("catid ", "$category_id");
    }

    if ($productid != '') {
      $this->db->where("article_id  ", "$productid");
    }

    if ($status != '') {
      $this->db->where("status", "$status");
    }

    if ($where != '') {
      $this->db->where($where);
    }
    if ($keyword != '') {
      $this->db->where("(article_title LIKE '%" . $keyword . "%' OR article_desc LIKE '%" . $keyword . "%' )");
    }

    if ($orderby != '') {
      $this->db->order_by($orderby);
    } else {
      $this->db->order_by('article_id ', 'desc');
    }

    //$this->db->limit($limit, $offset);
    $this->db->select('SQL_CALC_FOUND_ROWS*', FALSE);
    $this->db->from('wl_blog');
    $this->db->where('status !=', '2');
    $q = $this->db->get();
    //echo_sql();
    $result = $q->result_array();
    $result = ($limit == '1') ? $result[0] : $result;
    return $result;
  }

  public function get_blog_comment($limit = '10', $offset = '0', $param = array()) {

    $status = @$param['status'];
    $ref_article_id = @$param['ref_article_id'];
    $orderby = @$param['orderby'];
    $where = @$param['where'];
    $keyword = @$param['keyword'];


    if ($ref_article_id != '') {
      $this->db->where("ref_article_id", "$ref_article_id");
    }

    if ($status != '') {
      $this->db->where("status", "$status");
    }

    if ($where != '') {
      $this->db->where($where);
    }

    if ($orderby != '') {
      $this->db->order_by($orderby);
    } else {
      $this->db->order_by('comment_id  ', 'desc');
    }
    if ($keyword != '') {
      $this->db->where("(comment LIKE '%" . $keyword . "%')");
    }
    // $this->db->group_by("rev.review_id"); 	
    if ($limit != FALSE) {
      $this->db->limit($limit, $offset);
    }
    $this->db->select('SQL_CALC_FOUND_ROWS *', FALSE);
    $this->db->from('wl_blog_comment ');
    //$this->db->where('status =','1');
    $q = $this->db->get();
    //echo_sql();
    $result = $q->result_array();
    $result = ($limit == '1') ? $result[0] : $result;
    return $result;
  }

  public function get_review_comment($limit = '10', $offset = '0', $param = array()) {

    $ref_article_id = @$param['ref_article_id'];
    $status = @$param['status'];
    $orderby = @$param['orderby'];
    $where = @$param['where'];
    $keyword = trim($this->input->get_post('keyword', TRUE));
    $keyword = $this->db->escape_str($keyword);

    $status = $this->input->get_post('status');


    if ($ref_article_id != '') {
      $this->db->where("ref_article_id", "$ref_article_id");
    }

    if ($status != '') {
      $this->db->where("status", "$status");
    } else {
      $this->db->where('status !=', '2');
    }


    if ($where != '') {
      $this->db->where($where);
    }
    if ($keyword != '') {
      $this->db->where("(mem_name LIKE '%" . $keyword . "%' OR comment LIKE '%" . $keyword . "%' )");
    }

    if ($orderby != '') {
      $this->db->order_by($orderby);
    } else {
      $this->db->order_by('comment_id ', 'desc');
    }

    // $this->db->group_by("rev.review_id"); 	
    if ($limit != FALSE) {
      $this->db->limit($limit, $offset);
    }
    $this->db->select('SQL_CALC_FOUND_ROWS *', FALSE);
    $this->db->from('wl_blog_comment');
    //$this->db->where('status !=','2');
    $q = $this->db->get();
    //echo_sql();
    $result = $q->result_array();
    $result = ($limit == '1') ? $result[0] : $result;
    return $result;
  }

}
