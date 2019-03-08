<?php

class Products extends Public_Controller {

  public function __construct() {
    parent::__construct();
    $this->load->model(array('category/category_model', 'products/product_model', 'color/color_model', 'size/size_model', 'testimonials/testimonial_model'));
    $this->load->helper(array('products/product', 'category/category'));
    $this->lang->load('portuguese', 'portuguese');
    $this->form_validation->set_error_delimiters("<div class='required'>", "</div>");
    $this->page_section_ct = 'product';
  }

  public function index() {
    $this->page_section_ct = 'product';
    $condtion = array();
    $cat_res = '';
    $record_per_page = (int) $this->input->post('per_page');
    $category_id = (int) $this->uri->segment(3);
    $page_segment = find_paging_segment();
    $config['per_page'] = ( $record_per_page > 0 ) ? $record_per_page : $this->config->item('per_page');
    $offset = (int) $this->uri->segment($page_segment, 0);
    $base_url = ( $category_id != '' ) ? "products/index/$category_id/pg/" : "products/index/pg/";
    $condtion['status'] = '1';

    //Sorting
    $sort = $this->input->get_post('sort');
    if ($sort > 0) {
      if ($sort == 1) {
        $condtion['orderby'] = 'newarrival_product DESC';
      }
      if ($sort == 2) {
        $condtion['orderby'] = 'popular_product DESC';
      }
      if ($sort == 3) {
        $condtion['orderby'] = 'products_id DESC';
      }
      if ($sort == 4) {
        $condtion['orderby'] = 'product_price ASC';
      }
      if ($sort == 5) {
        $condtion['orderby'] = 'product_price DESC';
      }
    } else {
      $condtion['orderby'] = 'products_id asc';
    }
    if ($this->input->post('search_keyword')) {
      $page_title = "Search Result - " . $this->input->post('search_keyword');
    } else {
      $page_title = "Product Lists";
    }

    $color = $this->input->post('color');
    $size = $this->input->post('size');
    $price = $this->input->post('price');
    //trace($price);
    $catIds = $this->input->post('categoryId');

    if (!empty($color)) {
      $colors = implode(',', $color);
      $condtion['color'] = $colors;
    }
    if (!empty($size)) {
      $sizes = implode(',', $size);
      $condtion['size'] = $sizes;
    }
    if (!empty($catIds)) {
      $catIds = implode(',', $catIds);
      $condtion['catIds'] = $catIds;
    }
    if (!empty($price)) {
      $condtion['price'] = $price;
    }

    if ($category_id > 0) {
      $condtion['category_id'] = $category_id;
      $cat_res = get_db_single_row('wl_categories', '*', " category_id='$category_id'");
      $page_title = $cat_res['category_name'];
    }
    $data['catid'] = '';
    $res_array = $this->product_model->get_products($config['per_page'], $offset, $condtion);
    $data['total_rows'] = $config['total_rows'] = get_found_rows();
    $data['page_links'] = front_pagination("$base_url", $config['total_rows'], $config['per_page'], $page_segment);
    $data['heading_title'] = $page_title;
    $data['res'] = $res_array;
    $data['cat_res'] = $cat_res;

    /* Global array */
    $color_cond_config = array(
        'condition' => " AND status='1' ",
        'order' => 'color_name '
    );
    $colors = $this->color_model->getcolors($color_cond_config);
    $data['colors'] = $colors;

    $size_cond_config = array(
        'condition' => " AND status='1' ",
        'order' => 'size_name '
    );
    $sizes = $this->size_model->getsizes($size_cond_config);
    $data['sizes'] = $sizes;

    //Testimonials
    $testimonial = $this->testimonial_model->get_testimonial('5', '0', array("orderby" => "RAND()"));
    $data['testimonial'] = $testimonial;

    //Products
    $condPro = array();
    if ($category_id > 0) {
      $condPro = array("categoryIds" => $category_id);
    }
    $proRes = $this->product_model->get_products(5, 0, $condPro);
    $data['proRes'] = $proRes;

    //category with products
    $data['catleftRes'] = $this->db->query("SELECT p.category_id, category_name, c.friendly_url FROM wl_products as p LEFT JOIN wl_categories as c ON p.category_id=c.category_id WHERE c.status='1' GROUP BY p.category_id")->result_array();
    $data['catleftRes'] = $this->db->query("SELECT category_id, category_name, friendly_url FROM wl_categories WHERE status='1' AND parent_id = '1' GROUP BY category_id")->result_array();

    //banner
    $data['banner'] = get_db_field_value("wl_banners", "banner_image", "WHERE banner_page='product' AND banner_position='Top Banner' ORDER BY RAND()");
    $this->load->view('products/view_product_listing', $data);
  }

  public function ajax_load_product_view() {

    $data['title'] = 'Ajax Load Products';
    $config['per_page'] = $this->config->item('per_page');
    $offset = $this->input->get_post('stOffSet');

    if ($this->input->get_post('category_id')) {
      $parent_segment = (int) $this->input->get_post('category_id');
    } else {
      $parent_segment = (int) $this->input->get_post('category_id');
    }
    $page_segment = find_paging_segment();
    $parent_id = ( $parent_segment > 0 ) ? $parent_segment : '0';

    $condtion['status'] = '1';
    $condtion['orderby'] = 'products_id asc';
    $page_title = "Product Lists";
    if ($parent_id > 0) {
      $condtion['category_id'] = $parent_id;
      $cat_res = get_db_single_row('wl_categories', '*', " category_id='$parent_id'");
      $page_title = $cat_res['category_name'];
      $data['catid'] = $parent_id;
    }
    if ($this->input->get_post('brand') != '') {
      if (is_array($this->input->get_post('brand'))) {
        $condtion['brand'] = implode(',', $this->input->get_post('brand'));
      } else {
        $condtion['brand'] = $this->input->get_post('brand');
      }
    }
    if ($this->input->get_post('size') != '') {
      if (is_array($this->input->get_post('size'))) {
        $condtion['size'] = implode(',', $this->input->get_post('size'));
      } else {
        $condtion['size'] = $this->input->get_post('size');
      }
    }
    if ($this->input->get_post('categoryId') != '') {
      if (is_array($this->input->get_post('categoryId'))) {
        $condtion['catIds'] = implode(',', $this->input->get_post('categoryId'));
      } else {
        $condtion['catIds'] = $this->input->get_post('categoryId');
      }
    }
    if ($this->input->get_post('price') != '') {
      $condtion['price'] = $this->input->get_post('price');
    }
    if ($this->input->get_post('color') != '') {
      $condtion['color'] = $this->input->get_post('color');
    }
    if ($this->input->get_post('keyword') != '') {
      $condtion['keyword'] = $this->input->get_post('keyword');
    }
    if ($this->input->get_post('product_for') != '') {
      $condtion['product_for'] = $this->input->get_post('product_for');
    }
    if ($this->input->get_post('sort') != '') {
      $condtion['orderby'] = $this->input->get_post('sort');
    }
    if ($this->input->post('product_typeb') == 'best_seller') {
      $condtion['best_seller'] = 1;
    }
    if ($this->input->post('product_typen') == 'new_arrival') {
      $condtion['new_arrival'] = 1;
    }
    if ($this->input->post('product_typeh') == 'hot_deal') {
      $condtion['hot_deal'] = 1;
    }
    $res_array = $this->product_model->get_products($config['per_page'], $offset, $condtion);

    $data['res'] = $res_array;
    $this->load->view('products/ajax_load_products', $data);
  }

  public function hot_products() {
    $this->page_section_ct = 'product';
    $condtion = array();
    $cat_res = '';
    $record_per_page = (int) $this->input->post('per_page');
    $category_id = (int) $this->uri->segment(3);
    $page_segment = find_paging_segment();
    $config['per_page'] = ( $record_per_page > 0 ) ? $record_per_page : $this->config->item('per_page');
    $offset = (int) $this->uri->segment($page_segment, 0);
    $base_url = ( $category_id != '' ) ? "products/index/$category_id/pg/" : "products/index/pg/";
    $condtion['status'] = '1';
    $condtion['hot'] = '1';
    $color = $this->input->post('color');
    $size = $this->input->post('size');
    $price = $this->input->post('price');

    if (!empty($color)) {
      $colors = implode(',', $color);
      $condtion['color'] = $colors;
    }
    if (!empty($size)) {
      $sizes = implode(',', $size);
      $condtion['size'] = $sizes;
    }
    if (!empty($price)) {
      $condtion['price'] = $price;
    }

    $condtion['orderby'] = 'products_id asc';
    $page_title = "Hot Product Lists";

    $res_array = $this->product_model->get_products($config['per_page'], $offset, $condtion);
    //echo_sql();		
    $config['total_rows'] = get_found_rows();
    $data['page_links'] = front_pagination("$base_url", $config['total_rows'], $config['per_page'], $page_segment);
    $data['heading_title'] = $page_title;
    $data['catid'] = "";
    $data['category_id'] = "";
    $data['res'] = $res_array;
    $data['cat_res'] = $cat_res;
    $this->load->view('products/view_product_listing', $data);
  }

  public function featured_products() {
    $this->page_section_ct = 'product';
    $condtion = array();
    $cat_res = '';
    $record_per_page = (int) $this->input->post('per_page');
    $category_id = (int) $this->uri->segment(3);
    $page_segment = find_paging_segment();
    $config['per_page'] = ( $record_per_page > 0 ) ? $record_per_page : $this->config->item('per_page');
    $offset = (int) $this->uri->segment($page_segment, 0);
    $base_url = ( $category_id != '' ) ? "products/index/$category_id/pg/" : "products/index/pg/";
    $condtion['status'] = '1';
    $condtion['featured'] = '1';
    $color = $this->input->post('color');
    $size = $this->input->post('size');
    $price = $this->input->post('price');

    if (!empty($color)) {
      $colors = implode(',', $color);
      $condtion['color'] = $colors;
    }
    if (!empty($size)) {
      $sizes = implode(',', $size);
      $condtion['size'] = $sizes;
    }
    if (!empty($price)) {
      $condtion['price'] = $price;
    }

    $condtion['orderby'] = 'products_id asc';
    $page_title = "Featured Product Lists";

    $res_array = $this->product_model->get_products($config['per_page'], $offset, $condtion);
    //echo_sql();
    $config['total_rows'] = get_found_rows();
    $data['page_links'] = front_pagination("$base_url", $config['total_rows'], $config['per_page'], $page_segment);
    $data['heading_title'] = $page_title;
    $data['catid'] = "";
    $data['category_id'] = "";
    $data['res'] = $res_array;
    $data['cat_res'] = $cat_res;
    $this->load->view('products/view_product_listing', $data);
  }

  public function detail() {
    $this->page_section_ct = 'product';
    $data['unq_section'] = "Product";
    $productId = (int) $this->meta_info['entity_id'];
    $where = "wlp.products_id = '" . $productId . "'";
    $option = array(
        'fields' => "SQL_CALC_FOUND_ROWS wlp.*,wlc.first_name,wlc.user_name,wlc.mobile_number,wlcat.category_id",
        'where' => $where
    );
    $res = $this->product_model->get_products('1', '', $option);
    if (is_array($res) && !empty($res)) {
      $res = $res[0];
      // Recent View
      $id = $res['products_id'];
      $ee = $this->session->userdata('recent_view');
      if (is_array($ee)) {
        if (!@in_array($id, $ee)) {
          @array_push($ee, $id);
          $this->session->set_userdata('recent_view', $ee);
        }
      } else {
        $this->session->set_userdata('recent_view', array($id));
      }
      // End Here

      $this->load->model('comments/comments_model');
      $data['error_validate'] = TRUE;

      $data['title'] = "Product";
      $data['res'] = $res;
      $this->product_model->update_viewed($res['products_id'], $res['products_viewed']);
      $media_res = $this->product_model->get_product_media(4, 0, array('productid' => $res['products_id']));
      $data['media_res'] = $media_res;

      //Reviews
      $qry_options = array('limit' => 200, 'offset' => 0, 'condition' => " AND entity_id ='" . $res['products_id'] . "' AND entity_type='product' AND a.status='1'");
      $review_res = $this->comments_model->get_comments($qry_options);
      $data['review_count'] = get_found_rows();
      $data['review_res'] = $review_res;

      //Related Products
      $related_products = $this->get_product_related_list($res['category_id'], $productId);
      $data['related'] = $related_products;
      //End
      $data['coupon_code'] = get_db_field_value('wl_categories', 'coupon_code', "WHERE category_id = '" . $res['category_id'] . "'");
      //echo_sql();
      $data['store'] = $this->db->query("SELECt * FROM wl_store WHERE location_id = '" . $this->session->userdata('location_id') . "' AND status = '1'")->result_array();

      $data['attributes'] = $this->db->query("SELECT * FROM wl_attributes WHERE status = '1' order by id")->result_array();
      $data['is_exits_inot_cart'] = $this->check_product_exits_into_cart($res);
      $this->load->view('products/view_product_details', $data);
    } else {
      redirect('products', '');
    }
  }

  public function get_product_related_list($catId = "", $productId) {
    $condtion['status'] = '1';
    $condtion['where'] = "wlp.category_id = '" . $catId . "' AND wlp.products_id != '" . $productId . "'";
    $condtion['orderby'] = 'products_id DESC';
    $product_list = $this->product_model->get_products('10', '0', $condtion);
    return $product_list;
  }

  public function get_product_price() {
    $sid = (int) $this->input->post('sid');
    $cid = (int) $this->input->post('cid');
    $pid = (int) $this->input->post('pid');

    if ($cid > 0 && $sid > 0) {
      $res = $this->db->select('quantity,quantity,product_price,product_discounted_price')->get_where('wl_product_attributes', array('color_id' => $cid, 'size_id' => $sid, 'product_id' => $pid))->row();
      if (is_object($res)) {
        echo $res->quantity . '-' . $res->product_price . '-' . $res->product_discounted_price.'-'.$res->quantity;
      }
    }
  }

  public function get_product_price_store() {
    $sid = (int) $this->input->post('sid');
    $pid = (int) $this->input->post('pid');

    if ($sid > 0) {
      $res = $this->db->select('quantity,product_price,product_discounted_price')->get_where('wl_product_attributes', array('store_id' => $sid, 'product_id' => $pid))->row();
      if (is_object($res)) {
        if ($res->product_discounted_price > 0) {
          echo '<span class="price" style="font-size: 18px;">' . display_price($res->product_discounted_price) . '</span> <span class="price-strike">' . display_price($res->product_price) . '</span>';
        } elseif ($res->product_discounted_price <= 0 && $res->product_price > 0) {
          echo '<span class="price">' . display_price($res->product_price) . '</span>';
        } else {
          echo 'Out of Stock';
        }
        //echo $res->quantity . '-' . $res->product_price . '-' . $res->product_discounted_price;
      } else {
        echo 'Out of Stock';
      }
    }
  }

  public function get_product_stock() {
    $sid = (int) $this->input->post('sid');
    $pid = (int) $this->input->post('pid');
    if ($sid > 0) {
      $res = $this->db->select('quantity')->get_where('wl_product_attributes', array('store_id' => $sid, 'product_id' => $pid))->row();
      if (is_object($res)) {
        echo $res->quantity;
      } else {
        echo '0';
      }
    }
  }

  public function check_zipcode() {
    //$zipcode=$this->input->post("zipcode");
    $this->form_validation->set_rules('zip_code', 'Zipcode', 'trim|required|is_numeric|max_length[6]|callback_is_zipcode_exist');

    if ($this->form_validation->run() === TRUE) {
      $this->session->set_userdata("zip_code", $this->input->post("zip_code"));
      print json_encode(array("success" => ''));
    } else {
      print json_encode(array("error" => form_error("zip_code", '<span>', '</span>')));
    }
  }

  public function is_zipcode_exist() {
    $zipcode = $this->input->post("zip_code");

    $zc = $this->db->query("select zip_code, cod from tbl_zip_location where zip_code='" . $this->input->post("zip_code") . "' AND status='1'")->row_array();

    if (empty($zc)) {
      $this->form_validation->set_message('is_zipcode_exist', 'COD not available at your location and not servicable.');
      return FALSE;
    } elseif ($zc['cod'] == 'N') {
      $this->form_validation->set_message('is_zipcode_exist', 'COD not available at your location.');
      return FALSE;
    }
  }

  public function post_review() {

    $this->form_validation->set_error_delimiters("<div class='required'>", "</div>");

    $this->form_validation->set_rules('name', 'Name', 'trim|required|max_length[70]');
    $this->form_validation->set_rules('email', 'Email', 'trim|required|max_length[80]|valid_email');
    $this->form_validation->set_rules('rating', 'Rating', 'trim|required|max_length[1]');
    $this->form_validation->set_rules('reviews', 'Review', 'trim|required|max_length[450]');
    if ($this->form_validation->run() === TRUE) {
      $mem_id = $this->session->userdata('user_id');
      $posted_data = array(
          'entity_id' => $this->input->get_post('products_id'),
          'entity_type' => 'product',
          'customer_id' => $mem_id,
          'ads_rating' => $this->input->post('rating'),
          'author' => $this->input->post('name'),
          'author_email' => $this->input->post('email'),
          'text' => $this->input->post('reviews'),
          'status' => '1',
          'review_date' => $this->config->item('config.date.time')
      );
      $this->product_model->safe_insert('wl_review', $posted_data, FALSE);

      $data['success'] = true;
      $data['message'] = 'Thank you. Your review has been submitted successfully';
      echo json_encode($data);
    } else {
      $data['success'] = false;
      $data['error'] = validation_errors();
      echo json_encode($data);
    }
  }

  public function apply_coupon() {
    if ($this->input->get_post('submitcoupon')) {
      $ccode = $this->input->get_post('coupon_code');
      $pcat = $this->input->get_post('category_id');
      $pid = $this->input->get_post('pid');
      $pprice = $this->input->get_post('product_price');
      $cmesg = $cdmsg = "";
      $couponArray = $couponArray1 = array();
      $discountpercent = $discountPrice = $productPrice = 0;
      $sqlsc = $this->db->query("select coupon_code, coupon_value from wl_categories where coupon_code='" . $ccode . "' AND category_id = '" . $pcat . "'")->row_array();
      if (is_array($sqlsc) && !empty($sqlsc)) {
        if ($sqlsc['coupon_value'] > 0) {
          $discountpercent = $sqlsc['coupon_value'];
          $cmesg = "Coupon applied successfully";
          $_SESSION['cdis'] = $discountpercent;
          $cprice = $pprice * $discountpercent / 100;
          $discountPrice = $cprice;
          $productPrice = $pprice - $discountPrice;

          //for refreshed page
          $couponArray[$pid]['discountPercentage'] = $discountpercent;
          $couponArray[$pid]['productPrice'] = $pprice;
          $couponArray[$pid]['productDiscount'] = $cprice;
          $couponArray[$pid]['productDiscountPrice'] = $productPrice;
          $couponArray[$pid]['message'] = $cmesg;

          // on click change value
          $couponArray1['discountPercentage'] = $discountpercent;
          $couponArray1['productPrice'] = $pprice;
          $couponArray1['productDiscount'] = $cprice;
          $couponArray1['productDiscountPrice'] = $productPrice;
          $couponArray1['message'] = $cmesg;
        } else {
          $couponArray1['message'] = "Invalid Coupon Code.";
        }
      } else {
        $couponArray1['message'] = "Invalid Coupon Code.";
      }
      $ee = $this->session->userdata('coupon_session');
      if (is_array($ee)) {
        if (!array_key_exists($pid, $ee)) {
          $ee[] = $couponArray;
          //@array_push($ee[], $couponArray);
        }
        $this->session->set_userdata('coupon_session', $ee);
      } else {
        $ee[] = $couponArray;
        $this->session->set_userdata('coupon_session', $ee);
      }
      //trace($this->session->userdata('coupon_session'));
      echo json_encode($couponArray1);
    }
  }

  //Remobe Coupon
  public function remove_coupon() {
    $productId = $this->input->get_post('product_id');
    if ($productId > 0) {
      $ee = $this->session->userdata('coupon_session');
      $key = findKey($ee, $productId);
      unset($ee[$key]);

      $this->session->set_userdata('coupon_session', $ee);
    }
  }
  
  public function check_product_exits_into_cart($pres) {
    $cart_array = $this->cart->contents();
    $insert_flag = 0;
    if (is_array($cart_array) && !empty($cart_array)) {
      foreach ($this->cart->contents() as $item) {
        if (array_key_exists('pid', $item)) {
          if ($item['pid'] == $pres['products_id']) {
            $insert_flag = 1;
          }
        }
      }
    }
    return $insert_flag;
  }

}

?>