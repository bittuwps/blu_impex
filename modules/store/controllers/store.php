<?php
class Store extends Public_Controller {

  public function __construct() {

    parent::__construct();

    $this->load->model(array('fullset/fullset_model'));

    $this->load->helper(array('products/product', 'category/category'));

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

      /*if ($sort == 1) {

        $condtion['orderby'] = 'newarrival_product DESC';

      }

      if ($sort == 2) {

        $condtion['orderby'] = 'popular_product DESC';

      }*/

      if ($sort == 3) {

        $condtion['orderby'] = 'setId DESC';

      }

      if ($sort == 4) {

        $condtion['orderby'] = 'catalog_price ASC';

      }

      if ($sort == 5) {

        $condtion['orderby'] = 'catalog_price DESC';

      }

    } else {

      $condtion['orderby'] = 'setId asc';

    }

    $page_title = "Catalog Lists";



    $price = $this->input->post('price');

    $catIds = $this->input->post('categoryId');



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

    $res_array = $this->fullset_model->get_fullset_front($config['per_page'], $offset, $condtion);

    $data['total_rows'] = $config['total_rows'] = get_found_rows();

    $data['page_links'] = front_pagination("$base_url", $config['total_rows'], $config['per_page'], $page_segment);

    $data['heading_title'] = $page_title;

    $data['res'] = $res_array;

    $data['cat_res'] = $cat_res;



    /* Global array */

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

    //banner

    $data['banner'] = get_db_field_value("wl_banners", "banner_image", "WHERE banner_page='product' AND banner_position='Top Banner' ORDER BY RAND()");



    $this->load->view('fullset/view_catalog_listing', $data);

  }



  public function ajax_load_catalog_view() {



    $data['title'] = 'Ajax Load Catalog';

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

    $this->load->view('products/ajax_load_catalog', $data);

  }



  public function detail() {

    $this->page_section_ct = 'catalog';

    $data['unq_section'] = "Catalog";

    $productId = (int) $this->meta_info['entity_id'];

    $where = "wlp.products_id = '" . $productId . "'";

    $option = array();

    $option['productid'] = $productId;

    $res = $this->fullset_model->get_fullset_front('1', '', $option);



    if (is_array($res) && !empty($res)) {

      $res = $res[0];

      $data['error_validate'] = TRUE;

      $data['title'] = "catalog";

      $data['res'] = $res;

      $media_res = $this->fullset_model->get_fullset_media(16, 0, array('fullsetid' => $res['setId']));

      $data['mediaRes'] = $media_res;

      

      //Related Products

      $related_products = $this->get_product_related_list($res['category_id'], $productId);

      $data['related'] = $related_products;

      //End

      

      $this->load->view('fullset/view_catalog_details', $data);

    } else {

      redirect('products', '');

    }

  }



  public function get_product_related_list($catId = "", $productId) {

    $condtion['status'] = '1';

    $condtion['where'] = "wlp.category_id = '" . $catId . "' AND wlp.setId != '" . $productId . "'";

    $condtion['orderby'] = 'setId DESC';

    $product_list = $this->fullset_model->get_fullset_front('10', '0', $condtion);

    return $product_list;

  }



  public function get_product_price() {

    $sid = (int) $this->input->post('sid');

    $cid = (int) $this->input->post('cid');

    $pid = (int) $this->input->post('pid');



    if ($cid > 0 && $sid > 0) {

      $res = $this->db->select('quantity,product_price,product_discounted_price')->get_where('wl_product_attributes', array('color_id' => $cid, 'size_id' => $sid, 'product_id' => $pid))->row();

      if (is_object($res)) {

        echo $res->quantity . '-' . $res->product_price . '-' . $res->product_discounted_price;

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



}



?>