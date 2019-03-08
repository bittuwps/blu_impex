<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class Product_model extends MY_Model {

  public function get_products($limit = '10', $offset = '0', $param = array()) {
    $category_id = @$param['category_id'];
    $categoryIds = @$param['categoryIds'];
    $status = @$param['status'];
    $productid = @$param['productid'];
    $orderby = @$param['orderby'];
    $where = @$param['where'];
    $color = @$param['color'];
    $catIds = @$param['catIds'];
    $size = @$param['size'];
    $price = @$param['price'];
    $hot = @$param['hot'];
    $featured = @$param['featured'];
    $keyword = trim($this->input->get_post('keyword', TRUE));
    $keyword = $this->db->escape_str($keyword);

    $search_keyword = trim($this->input->get_post('search_keyword', TRUE));
    $search_keyword = $this->db->escape_str($search_keyword);

    if (!empty($color)) {
      $this->db->where("wlp.color_ids IN ($color)");
    }
    if (!empty($size)) {
      $this->db->where("wlp.size_ids IN ($size)");
    }
    if (!empty($catIds)) {
      $this->db->where("wlp.category_id IN ($catIds)");
    }
    if (!empty($hot)) {
      $this->db->where("wlp.hot_product = '" . $hot . "'");
    }
    if (!empty($featured)) {
      $this->db->where("wlp.featured_product = '" . $featured . "'");
    }
    if (!empty($price)) {
      $price = explode(',', $price);
      $this->db->where("wlp.product_price between '$price[0]' AND '$price[1]'");
    }
    if ($category_id != '') {
      $this->db->where("FIND_IN_SET('" . $category_id . "',wlp.category_links) AND category_id!=''");
    }
    if ($this->session->userdata('location') != '') {
      $store = $this->db->query("SELECt * FROM wl_store WHERE location_id = '" . $this->session->userdata('location') . "'")->result_array();
      $sf = "(";
      $pr = ")";
      $strQ = "";
      $cn = 1;
      foreach ($store as $k => $v) {
        if ($cn > 1)
          $strQ.="OR ";
        $strQ .= "FIND_IN_SET('" . $v['setId'] . "',wlp.store_id)";
        $cn++;
      }
      $this->db->where($sf . $strQ . $pr);
      //$this->db->where("FIND_IN_SET('" . $this->session->userdata('location') . "',wlp.store_id) AND store_id!='' AND store_id != '0'");
    }
    if ($categoryIds != '') {
      $this->db->where("FIND_IN_SET('" . $categoryIds . "', wlp.category_links)");
    }
    if ($productid != '') {
      $this->db->where("wlp.products_id  ", "$productid");
    }
    if ($status != '') {
      $this->db->where("wlp.status", "$status");
    }
    if ($where != '') {
      $this->db->where($where);
    }
    if ($keyword != '') {
      $this->db->where("(wlp.product_name LIKE '%" . $keyword . "%' OR wlp.product_code LIKE '%" . $keyword . "%'  OR wlp.product_name_p LIKE '%" . $keyword . "%')");
    }
    if ($search_keyword != '') {
      $this->db->where("(wlp.product_name LIKE '%" . $search_keyword . "%' OR wlp.product_code LIKE '%" . $search_keyword . "%'  OR wlp.product_name_p LIKE '%" . $search_keyword . "%')");
    }
    if ($orderby != '') {
      $this->db->order_by($orderby);
    } else {
      $this->db->order_by('wlp.products_id ', 'desc');
    }
    if ($limit > 0) {
      if (applyFilter('NUMERIC_WT_ZERO', $offset) == -1) {
        $offset = 0;
      }
      $this->db->limit($limit, $offset);
    }
    $this->db->group_by("wlp.products_id");
    $this->db->select('SQL_CALC_FOUND_ROWS wlp.*,wlpm.media,wlpm.media_type,wlpm.is_default', FALSE);
    $this->db->from('wl_products as wlp');
    $this->db->where('wlp.status !=', '2');
    $this->db->join('wl_products_media AS wlpm', 'wlp.products_id=wlpm.products_id', 'left');
    $q = $this->db->get();
    //echo_sql();
    //die;
    $result = $q->result_array();
    return $result;
  }

  public function get_product_media($limit = '5', $offset = '0', $param = array()) {
    $default = @$param['default'];
    $productid = @$param['productid'];
    $media_type = @$param['media_type'];

    if (is_array($param) && !empty($param)) {
      $this->db->select('SQL_CALC_FOUND_ROWS *', FALSE);
      $this->db->limit($limit, $offset);
      $this->db->from('wl_products_media');
      $this->db->where('products_id', $productid);

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

  public function related_products_added($productId, $limit = 'NULL', $start = 'NULL') {
    $res_data = array();
    $condtion = ($productId != '') ? "status ='1' AND product_id = '$productId' " : "status ='1'";
    $fetch_config = array(
        'condition' => $condtion,
        'order' => "id DESC",
        'limit' => $limit,
        'start' => $start,
        'debug' => FALSE,
        'return_type' => "array"
    );
    $result = $this->findAll('wl_products_related', $fetch_config);
    if (is_array($result) && !empty($result)) {
      foreach ($result as $val) {
        $res_data[$val['id']] = $val['related_id'];
      }
    }
    return $res_data;
  }

  public function update_viewed($id, $counter = 0) {
    $id = (int) $id;
    if ($id > 0) {
      $posted_data = array(
          'products_viewed' => ($counter + 1)
      );
      $where = "products_id = '" . $id . "'";
      $this->category_model->safe_update('wl_products', $posted_data, $where, FALSE);
    }
  }

  public function get_related_products($condition) {
    $condtion = (!empty($condition)) ? "status !='2'  $condition" : "status !='2'";
    $fetch_config = array(
        'condition' => $condtion,
        'order' => "products_id DESC",
        'limit' => 'NULL',
        'start' => 'NULL',
        'debug' => FALSE,
        'return_type' => "array"
    );
    $result = $this->findAll('wl_products', $fetch_config);
    return $result;
  }

  public function related_products($res, $limit = 'NULL', $start = 'NULL') {
    $condtion = array();
    $condtion['where'] = "wlp.status ='1' AND wlp.products_id IN(SELECT wpr.related_id FROM wl_products_related as wpr WHERE wpr.product_id ='" . $res['products_id'] . "') ";
    $res_data = $this->get_products($limit, $start, $condtion);
    return $res_data;
  }

  public function hot_products() {
    $condtion = array();
    $limit = 10;
    $start = 0;
    $condtion['where'] = "wlp.status ='1' AND wlp.hot_product = '1'";
    $res_data = $this->get_products($limit, $start, $condtion);
    return $res_data;
  }

  public function featured_products() {
    $condtion = array();
    $limit = 10;
    $start = 0;
    $condtion['where'] = "wlp.status ='1' AND wlp.featured_product = '1'";
    $res_data = $this->get_products($limit, $start, $condtion);
    return $res_data;
  }

  public function related_sizes($param = array()) {
    $where = @$param['where'];
    $limit = @$param['limit'];
    $offset = @$param['offset'];

    $query_size = "SELECT SQL_CALC_FOUND_ROWS wls.size_name,wls.size_id,wls.status as size_status FROM wl_sizes as wls WHERE wls.status!='2' AND ";
    if ($where != '') {
      $query_size .= $where;
    }
    $query_size = trim($query_size, "AND");
    if ($limit > 0) {
      $query_size .= " LIMIT $offset,$limit";
    }
    $q = $this->db->query($query_size);
    $result = $q->result_array();
    $res_total = $this->db->query("Select FOUND_ROWS() as total")->row_array();
    $this->total_recs = $res_total['total'];
    return $result;
  }

  public function related_colors($param = array()) {
    $res_data = array();

    $where = @$param['where'];
    $limit = @$param['limit'];
    $offset = @$param['offset'];



    $query_size = "SELECT SQL_CALC_FOUND_ROWS wlc.color_name,wlc.status as color_status,wlc.color_code,wlc.color_id FROM wl_colors as wlc WHERE wlc.status!='2' AND ";

    if ($where != '') {
      $query_size .= $where;
    }

    $query_size = trim($query_size, "AND");

    if ($limit > 0) {
      $query_size .= " LIMIT $offset,$limit";
    }

    $q = $this->db->query($query_size);

    $result = $q->result_array();

    $res_total = $this->db->query("Select FOUND_ROWS() as total")->row_array();

    $this->total_recs = $res_total['total'];

    return $result;
  }

  public function product_attributes($param = array()) {
    $res_data = array();
    $where = @$param['where'];
    $limit = @$param['limit'];
    $offset = @$param['offset'];
    $query_attr = "SELECT * FROM wl_product_attributes  as wlc WHERE status!='2' AND ";
    if ($where != '') {
      $query_attr .= $where;
    }
    $query_attr = trim($query_attr, "AND");
    if ($limit > 0) {
      $query_attr .= " LIMIT $offset,$limit";
    }
    $q = $this->db->query($query_attr);
    $result = $q->result_array();
    //$res_total =  $this->db->query("Select FOUND_ROWS() as total")->row_array();
    //$this->total_recs = $res_total['total'];
    return $result;
  }

  public function get_product_base_price($param = array()) {
    $where = @$param['where'];
    $this->db->select('*', FALSE);
    $this->db->from('wl_product_attributes');
    if ($where != '') {
      $this->db->where($where);
    }
    $q = $this->db->get();
    // echo_sql();
    $result = $q->row_array();
    return $result;
  }
  public function add_bulk_upload_product($worksheet) {
    //echo "ssss";
    //trace($worksheet);
    //exit;
    for ($i = 2; $i <= count($worksheet); $i++) {

      $category_id = (!isset($worksheet[$i][1])) ? '' : addslashes(trim($worksheet[$i][1]));
      $product_name = (!isset($worksheet[$i][2])) ? '' : addslashes(trim($worksheet[$i][2]));
      $product_code = (!isset($worksheet[$i][3])) ? '' : addslashes(trim($worksheet[$i][3]));
      $price = (!isset($worksheet[$i][4])) ? '' : addslashes(trim($worksheet[$i][4]));
      $discounted_price = (!isset($worksheet[$i][5])) ? '' : addslashes(trim($worksheet[$i][5]));


      $description = (!isset($worksheet[$i][6])) ? '' : addslashes(trim($worksheet[$i][6]));

      $qty = (!isset($worksheet[$i][7])) ? '' : addslashes(trim($worksheet[$i][7]));

      $imageLink = (!isset($worksheet[$i][8])) ? '' : addslashes(trim($worksheet[$i][8]));
      $imageLink2 = (!isset($worksheet[$i][9])) ? '' : addslashes(trim($worksheet[$i][9]));
      $imageLink3 = (!isset($worksheet[$i][10])) ? '' : addslashes(trim($worksheet[$i][10]));
      $imageLink4 = (!isset($worksheet[$i][11])) ? '' : addslashes(trim($worksheet[$i][11]));

      //Category Links
      $postCategory = array();
      if ($category_id) {
        $postCategory = explode(',', $category_id);
      }
      //trace($postCategory);
      $category_links = "";
      $catlink = $ctl = "";
      $catID = array();
      foreach ($postCategory as $ctv) {
        $cat_Id = get_db_field_value('wl_categories', 'category_id', "WHERE LOWER(category_name) = '" . strtolower(trim($ctv)) . "'");
        $catlink = get_parent_categories($cat_Id, "AND status='1'", "category_id,parent_id");
        $ctl = array_keys($catlink);
        $category_links .= implode(",", $ctl) . ',';
        $catID[] = $cat_Id;
      }
      $category_links = substr($category_links, 0, -1);
      //End Here

      //$catalogId = get_db_field_value('wl_fullset', 'setId', "WHERE LOWER(catalog_name) = '" . strtolower(trim($catalog_name)) . "'");
      

      $seo_url = seo_url_title($product_name);

      //$color_ids = explode(',', $color_id);
     // $size_ids = explode(',', $size_id);

      //$colIds = $sizeIds = array();
      //$sizes = $colors = "";
      //Size Ids
   

      //Color Ids
  

      if ($imageLink != '') {
        $url = $imageLink;
        $image_ext = explode('.', $imageLink);
        $image_ext = array_reverse($image_ext);
        $filename = seo_url_title($product_name) . '_1.' . str_replace('?dl=1', '', $image_ext[0]);
        //get File content and save to destination path
        $blob = file_get_contents($url);
        $image = base64_encode($blob);
        $dataImg = base64_decode($image);
        //echo '<img src="data:image/jpg;base64,'.$image.'">';
        $success = file_put_contents(UPLOAD_DIR . '/product-images/' . $filename, $dataImg);
        //print $success ? $file : 'Unable to save the file.';
        //die;
      }
      if ($imageLink2 != '') {
        $url = $imageLink2;
        $image_ext = explode('.', $imageLink2);
        $image_ext = array_reverse($image_ext);
        $filename2 = seo_url_title($product_name) . '_2.' . str_replace('?dl=1', '', $image_ext[0]);

        //get File content and save to destination path
        $blob = file_get_contents($url);
        $image = base64_encode($blob);
        $dataImg = base64_decode($image);
        //echo '<img src="data:image/jpg;base64,'.$image.'">';
        $success = file_put_contents(UPLOAD_DIR . '/product-images/' . $filename2, $dataImg);
        //print $success ? $file : 'Unable to save the file.';
        //die;
      }
      if ($imageLink3 != '') {
        $url = $imageLink3;
        $image_ext = explode('.', $imageLink3);
        $image_ext = array_reverse($image_ext);
        $filename3 = seo_url_title($product_name) . '_3.' . str_replace('?dl=1', '', $image_ext[0]);

        //get File content and save to destination path
        $blob = file_get_contents($url);
        $image = base64_encode($blob);
        $dataImg = base64_decode($image);
        //echo '<img src="data:image/jpg;base64,'.$image.'">';
        $success = file_put_contents(UPLOAD_DIR . '/product-images/' . $filename3, $dataImg);
        //print $success ? $file : 'Unable to save the file.';
        //die;
      }
      
      if ($imageLink4 != '') {
        $url = $imageLink4;
        $image_ext = explode('.', $imageLink4);
        $image_ext = array_reverse($image_ext);
        $filename4 = seo_url_title($product_name) . '_4.' . str_replace('?dl=1', '', $image_ext[0]);

        //get File content and save to destination path
        $blob = file_get_contents($url);
        $image = base64_encode($blob);
        $dataImg = base64_decode($image);
        //echo '<img src="data:image/jpg;base64,'.$image.'">';
        $success = file_put_contents(UPLOAD_DIR . '/product-images/' . $filename4, $dataImg);
        //print $success ? $file : 'Unable to save the file.';
        //die;
      }

      if ($product_code == "") {
        $product_code = str_pad(mt_rand(0, 999999), 6, '0', STR_PAD_LEFT);
        $product_code = 'AF' . $product_code . date('Ym');
      }

      $data = array(
          'category_id' => $category_id,
          'category_links' => $category_links,
          //'catalog_id' => $catalogId,
          'product_name' => $product_name,
          'friendly_url' => $seo_url,
          'product_code' => $product_code,
          'product_qty' => $qty,
          //'size_ids' => $sizes,
          //'color_ids' => $colors,
          'product_price' => $price,
          'product_discounted_price' => $discounted_price,
          //'product_wholesale_price' => $wholesale_price,
          'product_alt' => $product_name,
          'products_description' => $description,
          //'products_custom_description' => $policy,
          'product_added_date' => $this->config->item('config.date.time')
      );
      
      //trace($data); exit;
      $product_id = $this->safe_insert('wl_products', $data, FALSE);

      //Update Media
      if ($product_id > 0) {
        if ($filename) {
          $dataMedia = array(
              'products_id' => $product_id,
              'media' => $filename,
              'is_default' => 'Y',
              'media_date_added' => $this->config->item('config.date.time'),
          );
          $this->safe_insert('wl_products_media', $dataMedia, FALSE);
        }
        if ($filename2) {
          $dataMedia = array(
              'products_id' => $product_id,
              'media' => $filename2,
              'is_default' => 'N',
              'media_date_added' => $this->config->item('config.date.time'),
          );
          $this->safe_insert('wl_products_media', $dataMedia, FALSE);
        }
        if ($filename3) {
          $dataMedia = array(
              'products_id' => $product_id,
              'media' => $filename3,
              'is_default' => 'N',
              'media_date_added' => $this->config->item('config.date.time'),
          );
          $this->safe_insert('wl_products_media', $dataMedia, FALSE);
        }
        if ($filename4) {
          $dataMedia = array(
              'products_id' => $product_id,
              'media' => $filename4,
              'is_default' => '4',
              'media_date_added' => $this->config->item('config.date.time'),
          );
          $this->safe_insert('wl_products_media', $dataMedia, FALSE);
        }
      }
      //Create Meta
      $redirect_url = "products/detail";
      $meta_array = array(
          'entity_type' => $redirect_url,
          'entity_id' => $product_id,
          'page_url' => $seo_url,
          'meta_title' => get_text($product_name, 80),
          'meta_description' => get_text($description),
          'meta_keyword' => get_keywords($description)
      );
      create_meta($meta_array);
    }
    return true;
  }

}
