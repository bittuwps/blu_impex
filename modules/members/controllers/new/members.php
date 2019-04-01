<?php

class Members extends Private_Controller {

  private $mId;

  public function __construct() {
    parent::__construct();
    $this->load->model(array('members/members_model', 'order/order_model', 'products/product_model'));
    $this->load->helper(array('cart/cart'));
    $this->load->library(array('safe_encrypt', 'Dmailer', 'cart'));
    $this->form_validation->set_error_delimiters("<div class='required red'>", "</div>");
    $this->page_section_ct = 'common';
  }

  public function index() {
    redirect('members/myaccount', '');
  }

  public function myaccount() {
    $config['per_page'] = $this->config->item('per_page');
    $offset = $this->uri->segment(3, 0);
    $mres = $this->members_model->get_member_address_book($this->session->userdata('user_id'));
    $condtion = "AND customers_id = '" . $this->userId . "' ";
    $res_array = $this->order_model->get_orders('0', '100', $condtion);
    //echo_sql();
    //$data['billres']    =   $mres[0];		
    //$data['shipres']    =   $mres[1];

    $data['page_content'] = get_db_field_value('wl_cms_pages', 'page_description', array('friendly_url' => 'my-account', 'status' => 1));
    $data['member_account'] = $this->members_model->get_member_row($this->session->userdata('user_id'));
    $data['res_add'] = $this->db->query("select * from wl_customers_address_book where customer_id='" . $this->session->userdata('user_id') . "'")->row_array();
    $data['orders'] = $res_array;
    $data['unq_section'] = "Myaccount";
    $data['title'] = "My Account";
    //print_r($data['res_add']);die;
    $this->load->view('view_member_myaccount', $data);
  }

  public function order_details() {
    $id = (int) $this->uri->segment(3);
    $order_res = $this->order_model->get_order_master($id);
    $order_details_res = $this->order_model->get_order_detail($id);

    $data['order_res'] = $order_res;
    $data['order_details'] = $order_details_res;

    $this->load->view('members/view_oder_details', $data);
  }

  public function edit_account() {
    $data['unq_section'] = "Myaccount";
    $data['title'] = "Edit Account";
    $data['titleArray'] = $this->config->item('titleArray');
    $mres = $this->members_model->get_member_row($this->session->userdata('user_id'));
    //trace($mres);

    if (is_array($mres) && !empty($mres)) {
      $mres_address = $this->db->query("select * from wl_customers_address_book where  customer_id='" . $mres['customers_id'] . "' AND address_type = 'Ship' order by address_id desc limit 0, 1")->row_array();

      $mres_address_bil = $this->db->query("select * from wl_customers_address_book where  customer_id='" . $mres['customers_id'] . "' AND address_type = 'Bill' order by address_id desc limit 0, 1")->row_array();

      //trace($mres_address);
      if (is_array($mres_address) && !empty($mres_address)) {
        $mres1 = array(
            'mtitle' => '',
            'name' => $mres_address['first_name'],
            'mobile' => $mres_address['mobile'],
            'address' => $mres_address['address'],
            'landmark' => $mres_address['landmark'],
            'zipcode' => $mres_address['zipcode'],
            'country' => $mres_address['country'],
            'city' => $mres_address['city'],
            'state' => $mres_address['state'],
            'address_id' => $mres_address['address_id'],
            'bmtitle' => '',
            'bil_name' => $mres_address_bil['first_name'],
            'bil_mobile' => $mres_address_bil['mobile'],
            'bil_address' => $mres_address_bil['address'],
            'bil_landmark' => $mres_address_bil['landmark'],
            'bil_zipcode' => $mres_address_bil['zipcode'],
            'bil_country' => $mres_address_bil['country'],
            'bil_city' => $mres_address_bil['city'],
            'bil_state' => $mres_address_bil['state'],
            'bil_address_id' => $mres_address_bil['address_id'],
        );
      } else {
        $mres1 = array(
            'mtitle' => '',
            'name' => '',
            'mobile' => '',
            'address' => '',
            'landmark' => '',
            'zipcode' => '',
            'country' => '',
            'city' => '',
            'state' => '',
            'address_id' => '',
            'bmtitle' => '',
            'bil_name' => '',
            'bil_mobile' => '',
            'bil_address' => '',
            'bil_landmark' => '',
            'bil_zipcode' => '',
            'bil_country' => '',
            'bil_city' => '',
            'bil_state' => '',
            'bil_address_id' => $mres_address_bil['address_id'],
            'last_shopping_comment' => ''
        );
      }
      $data['mres1'] = $mres1;

      //Shipping validation
      //$this->form_validation->set_rules('mtitle', 'Shipping Name Title', 'trim|required');
      $this->form_validation->set_rules('ship_name', 'Shipping Name', 'trim|required|alpha|max_length[160]');
      $this->form_validation->set_rules('ship_mobile', 'Ship Mobile No.', 'trim|required|max_length[20]');
      $this->form_validation->set_rules('ship_address', 'Shipping Address', 'trim|required|max_length[200]');
      $this->form_validation->set_rules('ship_lmark', 'Shipping Landmark', 'trim|max_length[160]');
      $this->form_validation->set_rules('ship_city', 'Shipping City', 'trim|required|max_length[40]');
      $this->form_validation->set_rules('ship_pin', 'Pin Code', 'trim|required|max_length[20]');
      $this->form_validation->set_rules('ship_state', 'Shipping State', 'trim|required|max_length[40]');
      $this->form_validation->set_rules('ship_country', 'Shipping Country', 'trim|required|max_length[80]');

      //Billing validation
      //$this->form_validation->set_rules('bmtitle', 'Billing Name Title', 'trim|required');
      $this->form_validation->set_rules('bil_name', 'Billing Name', 'trim|required|alpha|max_length[160]');
      $this->form_validation->set_rules('bil_mobile', 'Billing Mobile No.', 'trim|required|max_length[20]');
      $this->form_validation->set_rules('bil_address', 'Billing Address', 'trim|required|max_length[200]');
      $this->form_validation->set_rules('bil_lmark', 'Billing Landmark', 'trim|max_length[160]');
      $this->form_validation->set_rules('bil_city', 'Billing City', 'trim|required|max_length[40]');
      $this->form_validation->set_rules('bil_pin', 'Billing Pin Code', 'trim|required|max_length[20]');
      $this->form_validation->set_rules('bil_state', 'Billing State', 'trim|required|max_length[40]');
      $this->form_validation->set_rules('bil_country', 'Billing Country', 'trim|required|max_length[80]');

      if ($this->form_validation->run() == TRUE) {

        $posted_user_data_ship = array(
            'mtitle' => '',
            'first_name' => $this->input->post('ship_name'),
            'mobile' => $this->input->post('ship_mobile'),
            'address' => $this->input->post('ship_address'),
            'landmark' => $this->input->post('ship_lmark'),
            'zipcode' => $this->input->post('ship_pin'),
            'country' => $this->input->post('ship_country'),
            'city' => $this->input->post('ship_city'),
            'state' => $this->input->post('ship_state'),
        );
		//trace($posted_user_data_ship);
		//exit;
        $where_ship = "address_id = '" . $mres1['address_id'] . "'";
        $this->members_model->safe_update('wl_customers_address_book', $posted_user_data_ship, $where_ship, FALSE);

        $posted_user_data = array(
            'mtitle' => '',
            'first_name' => $this->input->post('bil_name'),
            'mobile' => $this->input->post('bil_mobile'),
            'address' => $this->input->post('bil_address'),
            'landmark' => $this->input->post('bil_lmark'),
            'zipcode' => $this->input->post('bil_pin'),
            'country' => $this->input->post('bil_country'),
            'city' => $this->input->post('bil_city'),
            'state' => $this->input->post('bil_state'),
        );
		
        $where = "address_id = '" . $mres1['bil_address_id'] . "'";
        $this->members_model->safe_update('wl_customers_address_book', $posted_user_data, $where, FALSE);


        $this->session->set_userdata(array('msg_type' => 'success'));
        $this->session->set_flashdata('success', 'Account has been updated successfully!!!');
        redirect('members/edit_account', 'refresh');
      }
    } else {
      redirect('members', '');
    }


    $data['mres'] = $mres;
    $this->load->view('view_member_edit_account', $data);
  }

  public function change_password() {
    $mres = $this->members_model->get_member_row($this->session->userdata('user_id'));
    $data['mres'] = $mres;
    $this->form_validation->set_rules('old_password', 'Old Password', 'trim|required');
    $this->form_validation->set_rules('new_password', 'New Password', 'trim|required|valid_password');
    $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|required|matches[new_password]');

    if ($this->form_validation->run() == TRUE) {
      $password_old = $this->safe_encrypt->encode($this->input->post('old_password', TRUE));
      $mres = $this->members_model->get_member_row($this->userId, " AND password='$password_old' ");
      if (is_array($mres) && !empty($mres)) {
        $password = $this->safe_encrypt->encode($this->input->post('new_password', TRUE));
        $data = array('password' => $password);
        $where = "customers_id=" . $this->session->userdata('user_id') . " ";
        $this->members_model->safe_update('wl_customers', $data, $where, FALSE);
        $this->session->set_userdata(array('msg_type' => 'success'));
        $this->session->set_flashdata('success', $this->config->item('myaccount_password_changed'));
      } else {
        $this->session->set_userdata(array('msg_type' => 'error'));
        $this->session->set_flashdata('error', $this->config->item('myaccount_password_not_match'));
      }
      redirect('members/change_password', '');
    }
    /* End  member change password  */
    $data['unq_section'] = "Myaccount";
    $data['heading_title'] = "Account Settings";
    $this->load->view('members/view_member_change_password', $data);
  }

  public function mywishlist() {
    $data['mres'] = $this->members_model->get_member_row($this->session->userdata('user_id'));
    $data['wishlist'] = $this->members_model->get_wislists(NULL, NULL, array());
    $data['total_records'] = get_found_rows();
    $this->load->view('members/view_member_wishlist', $data);
  }

  public function my_invoice() {
    $this->load->model(array('order/order_model'));
    $ordId = $this->uri->segment(3);
    $order_res = $this->order_model->get_order_master($ordId);
    $order_details_res = $this->order_model->get_order_detail($ordId);
    //trace($order_details_res);
    $data['orddetail'] = $order_details_res;
    $data['ordmaster'] = $order_res;
    $data['ordId'] = $ordId;
    $this->load->view('view_cart_invoice1', $data);
  }

  public function wishlist() {
    $this->load->model('products/product_model');
    $record_per_page = (int) $this->input->post('per_page');
    $config['per_page'] = ( $record_per_page > 0 ) ? $record_per_page : $this->config->item('per_page');
    $page_segment = find_paging_segment();
    $offset = (int) $this->uri->segment($page_segment, 0);
    $limit = $config['per_page'];
    $next = $offset + $limit;

    $param = array(
        'condition' => ''
    );

    $res_array = $this->members_model->get_wislists($offset, $config['per_page'], $param);
    $config['total_rows'] = $this->members_model->total_rec_found;
    $base_url = "members/wishlist/pg/";
    $data['page_links'] = front_pagination("$base_url", $config['total_rows'], $config['per_page'], $page_segment);
    $data['per_page'] = $config['per_page'];
    $data['wishlist'] = $res_array;
    $data['title'] = "My Wish List";
    $data['unq_section'] = "Myaccount";
    $this->load->view('members/view_member_wishlist', $data);
  }

  public function favourites() {
    $this->load->model('products/product_model');
    $record_per_page = (int) $this->input->post('per_page');
    $config['per_page'] = ( $record_per_page > 0 ) ? $record_per_page : $this->config->item('per_page');
    $page_segment = find_paging_segment();
    $offset = (int) $this->uri->segment($page_segment, 0);
    $limit = $config['per_page'];
    $next = $offset + $limit;

    $param = array(
        'condition' => "&& wis.notify != '1'"
    );

    $res_array = $this->members_model->get_wislists($offset, $config['per_page'], $param);
    $config['total_rows'] = $this->members_model->total_rec_found;

    $base_url = "members/favourites/pg/";

    $data['page_links'] = front_pagination("$base_url", $config['total_rows'], $config['per_page'], $page_segment);

    $data['per_page'] = $config['per_page'];

    $data['res'] = $res_array;
    $data['title'] = "My Favourites";
    $data['unq_section'] = "Myaccount";
    $this->load->view('members/view_member_favorlists', $data);
  }

  public function remove_wislist() {
    $wishlists_id = $ordId = $this->uri->segment(3);
    if ($wishlists_id != '') {
      
      $where = array('id' => $wishlists_id, 'customer_id' => $this->userId);
      $this->members_model->safe_delete('wl_wishlists', $where, FALSE);
      
      $this->session->set_userdata(array('msg_type'=>'success'));
      $this->session->set_flashdata('success', $this->config->item('wish_list_delete'));
      redirect('members/mywishlist', '');
    }
  }

  public function remove_favlist($wishlists_id) {
    if ($wishlists_id != '') {
      $where = array('wishlists_id' => $wishlists_id, 'customer_id' => $this->userId);
      $this->members_model->safe_delete('wl_wishlists', $where, FALSE);
      //		$this->session->set_userdata(array('msg_type'=>'success'));
      $this->session->set_flashdata('success', $this->config->item('wish_list_delete'));
      redirect('members/favourites', '');
    }
  }

  public function track_order() {
    $data['unq_section'] = "Track Order";

    $this->form_validation->set_rules('order_id', 'Order No', 'trim|required');

    if ($this->form_validation->run() == TRUE) {
      redirect('members/orders_history/' . $this->input->post('order_id'));
    }
    $this->load->view('view_track_order', $data);
  }

  public function loyalty() {
    $loyal = (int) $this->uri->segment(3);
    $data['unq_section'] = "Loyalty Program";

    $loyal_res = $this->loyalty_model->get_loyalty_points($this->userId);

    $param = array('status' => '1');

    if ($loyal != '' && $loyal != 0) {
      $param['gift_id'] = $loyal;
    }

    $param['where'] = "reedem_points <= '" . $loyal_res['available_points'] . "'";

    $param['orderby'] = 'rand()';

    $gift_res = $this->gift_model->get_gifts(0, 1, $param);

    if ($loyal > 0) {
      if ($loyal_res['available_points'] >= $gift_res[0]['reedem_points']) {

        $data = array(
            'customer_id' => $this->userId,
            'name' => $this->session->userdata('first_name'),
            'email' => $this->session->userdata('username'),
            'gift_id' => $gift_res[0]['id'],
            'receive_on' => $this->config->item('config.date.time')
        );
        $this->gift_model->safe_insert('wl_gift_customers', $data, FALSE);

        $gift = $this->loyalty_model->redeem_loyalty_points($this->userId, $gift_res[0]['reedem_points']);

        /* Send  mail to user */

        $content = get_content('wl_auto_respond_mails', '4');
        $subject = str_replace('{site_name}', $this->config->item('site_name'), $content->email_subject);
        $body = $content->email_content;

        //		$verify_url = "<a href=".base_url().">Click here </a>";		

        $name = $this->session->userdata('first_name') . ' ' . $this->session->userdata('last_name');

        $body = str_replace('{mem_name}', $name, $body);
        $body = str_replace('{gift}', $gift_res[0]['gift_title'], $body);
        $body = str_replace('{points}', $gift_res[0]['reedem_points'], $body);
        $body = str_replace('{available_points}', $loyal_res['available_points'], $body);
        $body = str_replace('{total_points}', $loyal_res['debited_points'], $body);
        $body = str_replace('{admin_email}', $this->admin_info->admin_email, $body);
        $body = str_replace('{site_name}', $this->config->item('site_name'), $body);
        $body = str_replace('{url}', base_url(), $body);
        //		$body			=	str_replace('{totle_points}',$verify_url,$body);

        $mail_conf = array(
            'subject' => $subject,
            'to_email' => $this->session->userdata('username'),
            'from_email' => $this->admin_info->admin_email,
            'from_name' => $this->config->item('site_name'),
            'body_part' => $body
        );

        $this->dmailer->mail_notify($mail_conf);

        /* End send  mail to user */

        /* Send  mail to admin */

        $body = $content->email_content;

        //	$verify_url = "<a href=".base_url().">Click here </a>";		

        $name = 'Admin';

        $body = str_replace('{mem_name}', $name, $body);
        $body = str_replace('{gift}', $gift_res[0]['gift_title'], $body);
        $body = str_replace('{points}', $gift_res[0]['reedem_points'], $body);
        $body = str_replace('{available_points}', $loyal_res['available_points'], $body);
        $body = str_replace('{total_points}', $verify_url, $body);
        $body = str_replace('{admin_email}', $this->admin_info->admin_email, $body);
        $body = str_replace('{site_name}', $this->config->item('site_name'), $body);
        $body = str_replace('{url}', base_url(), $body);
        //	$body			=	str_replace('{link}',$verify_url,$body);

        $mail_conf = array(
            'subject' => $subject,
            'to_email' => $this->admin_info->admin_email,
            'from_email' => $this->admin_info->admin_email,
            'from_name' => $this->config->item('site_name'),
            'body_part' => $body
        );

        $this->dmailer->mail_notify($mail_conf);

        /* End send  mail to admin */


        $this->session->set_flashdata('success', $this->config->item('redeem_gift_success'));
      } else {
        $this->session->set_flashdata('error', $this->config->item('redeem_gift_fail'));
      }
      redirect('members/loyalty/', FALSE);
    }

    $data['loyalty'] = $loyal_res;

    $data['gift'] = $gift_res;

    $this->load->view('view_loyalty_points', $data);
  }

  public function orders_history() {

    $record_per_page = (int) $this->input->post('per_page');
    $config['per_page'] = ( $record_per_page > 0 ) ? $record_per_page : $this->config->item('per_page');
    $page_segment = find_paging_segment();
    $offset = (int) $this->uri->segment($page_segment, 0);
    $limit = $config['per_page'];
    $next = $offset + $limit;
    $condtion = "AND customers_id = '$this->userId' ";
    if ($this->input->post('order_id') != '') {
      $condtion .= "AND invoice_number = '" . $this->input->post('order_id') . "' ";
    }
    if ($this->input->post('start_date') != '') {
      $condtion .= "AND order_received_date >= '" . $this->input->post('start_date') . "' ";
    }
    if ($this->input->post('end_date') != '') {
      $condtion .= "AND order_received_date <= '" . $this->input->post('end_date') . "' ";
    }
    if ((int) $this->uri->segment(3, 0) == TRUE) {
      $condtion .= "AND order_id = '" . $this->uri->segment(3) . "' ";
    }
    $data['unq_section'] = "Myaccount";
    $base_url = "members/orders_history/index/pg/";
    $res_array = $this->order_model->get_orders($offset, $config['per_page'], $condtion);
    //echo_sql();		
    $config['total_rows'] = $this->order_model->total_rec_found;
    $data['page_links'] = front_pagination($base_url, $config['total_rows'], $config['per_page'], $page_segment);
    $data['per_page'] = $config['per_page'];
    $data['res'] = $res_array;
    if ($this->uri->segment(3, 0) == 'download') {
      
    }
    $this->load->view('view_member_orders', $data);
  }

  public function download_view() {
    $output = $this->load->view('download_member_orders', '', true);
    $this->load->library('mpdf/mpdf');
    $mpdf = new mPDF('utf-8', 'A4');
    $mpdf->WriteHTML($output);
    $mpdf->Output();
  }

  public function print_invoice() {
    $this->load->model(array('order/order_model'));
    $ordId = (int) $this->uri->segment(3);
    $order_res = $this->order_model->get_order_master($ordId);
    $order_details_res = $this->order_model->get_order_detail($order_res['order_id']);
    $data['orddetail'] = $order_details_res;
    $data['ordmaster'] = $order_res;
    $this->load->view('view_invoice_print', $data);
  }

  public function manage_addresses() {
    $customer_id = $this->session->userdata('user_id');

    $record_per_page = (int) $this->input->post('per_page');
    $parent_segment = (int) $this->uri->segment(3);
    $page_segment = find_paging_segment();

    $config['per_page'] = ( $record_per_page > 0 ) ? $record_per_page : $this->config->item('per_page');
    $offset = (int) $this->uri->segment($page_segment, 0);

    $parent_id = ( $parent_segment > 0 ) ? $parent_segment : '0';
    $base_url = ( $parent_segment > 0 ) ? "members/manage_addresses/$parent_id/pg/" : "members/manage_addresses/pg/";


    $address_res = $this->members_model->get_member_address_book($customer_id, $offset, $config['per_page']);
    $config['total_rows'] = $this->members_model->total_rec_found;
    $data['page_links'] = front_pagination("$base_url", $config['total_rows'], $config['per_page'], $page_segment);

    $data['address_res'] = $address_res;
    $data['heading'] = "Manage Addresses";
    $this->load->view('view_member_addresses', $data);
  }

  public function view_my_addresses() {
    $customer_id = $this->session->userdata('user_id');
    $address_res = $this->db->query("select * from wl_customers_address_book where  customer_id='" . $customer_id . "' AND default_status='Y'")->result_array();
    $data['address_res'] = $address_res;
    $data['heading'] = "Manage Addresses";
    $this->load->view('address_book_select', $data);
  }

  public function delete_address() {
    $addressid = (int) $this->uri->segment(3);
    $this->db->query("delete from wl_customers_address_book where address_id = '" . $addressid . "'");
    $this->session->set_userdata(array('msg_type' => 'success'));
    $this->session->set_flashdata('success', 'Address has been Deleted successfully!!!');
    redirect($_SERVER['HTTP_REFERER']);
  }

  public function manage_addresses_add() {

    $this->form_validation->set_rules('name', 'Name', 'trim|required|alpha|max_length[80]');
    $this->form_validation->set_rules('mobile', 'Mobile No.', 'trim|required|max_length[20]');
    $this->form_validation->set_rules('phone', 'Phone No.', 'trim|max_length[20]');
    $this->form_validation->set_rules('zipcode', 'Pin Code', 'trim|required|max_length[20]');
    $this->form_validation->set_rules('address', 'Address', 'trim|required|max_length[200]');
    $this->form_validation->set_rules('landmark', 'Landmark', 'trim|required|max_length[200]');
    $this->form_validation->set_rules('city', 'City', 'trim|required|max_length[40]');
    $this->form_validation->set_rules('state', 'State', 'trim|required|max_length[40]');
    $this->form_validation->set_rules('country', 'Country', 'trim|required|max_length[80]');

    if ($this->form_validation->run() == TRUE) {
      $data = array(
          'customer_id' => $this->session->userdata('user_id'),
          'name' => $this->input->post('name'),
          'mobile' => $this->input->post('mobile'),
          'phone' => $this->input->post('phone'),
          'zipcode' => $this->input->post('zipcode'),
          'address' => $this->input->post('address'),
          'landmark' => $this->input->post('landmark'),
          'city' => $this->input->post('city'),
          'state' => $this->input->post('state'),
          'country' => $this->input->post('country'),
          'default_status' => 'Y'
      );
      //trace($data);
      //exit;
      $this->members_model->safe_insert('wl_customers_address_book', $data, FALSE);
      $this->session->set_userdata(array('msg_type' => 'success'));
      $this->session->set_flashdata('success', 'New Address has been added successfully!!!');
      redirect('members/manage_addresses_add', '');
    }

    /* End  member change password  */

    $data['unq_section'] = "Myaccount";
    $data['heading_title'] = "Account Settings";
    $this->load->view('members/view_address_add', $data);
  }

  public function manage_addresses_edit() {

    //$addressid     = (int) $this->uri->segment(3);
    //$res=$this->db->query("select * from wl_customers_address_book where address_id='".$addressid."'")->row_array();

    $this->form_validation->set_rules('add_name', 'Name', 'trim|required|alpha|max_length[80]');
    $this->form_validation->set_rules('add_mobile', 'Mobile No.', 'trim|required|max_length[20]');

    $this->form_validation->set_rules('add_zipcode', 'Pin Code', 'trim|required|max_length[20]');
    $this->form_validation->set_rules('add_address', 'Address', 'trim|required|max_length[200]');
    $this->form_validation->set_rules('add_landmark', 'Landmark', 'trim|required|max_length[200]');
    $this->form_validation->set_rules('add_city', 'City', 'trim|required|max_length[40]');
    $this->form_validation->set_rules('add_state', 'State', 'trim|required|max_length[40]');
    $this->form_validation->set_rules('add_country', 'Country', 'trim|required|max_length[80]');

    if ($this->form_validation->run() == TRUE) {
      $data = array(
          'name' => $this->input->post('add_name'),
          'mobile' => $this->input->post('add_mobile'),
          'phone' => $this->input->post('add_mobile'),
          'zipcode' => $this->input->post('add_zipcode'),
          'address' => $this->input->post('add_address'),
          'landmark' => $this->input->post('add_landmark'),
          'city' => $this->input->post('add_city'),
          'state' => $this->input->post('add_state'),
          'country' => $this->input->post('add_country'),
      );
      //trace($data);
      //exit;
      $where = array('customer_id' => $this->session->userdata('user_id'));
      $this->members_model->safe_update('wl_customers_address_book', $data, $where, FALSE);
      $this->session->set_userdata(array('msg_type' => 'success'));
      echo 2;
      //$this->session->set_flashdata('success', 'New Address has been updated successfully!!!');
      //redirect('members/manage_addresses_edit/' . $addressid, '');
    } else {
      echo validation_errors();
      die;
    }

    /* End  member change password  */
    /* $data['res'] = $res;
      //trace($res);
      $data['unq_section'] = "Myaccount";
      $data['heading_title'] = "Account Settings";
      $this->load->view('members/view_address_edit',$data); */
  }

  public function notify() {
    //  $this->load->model(array('order/order_model'));
    $wishId = (int) $this->uri->segment(3);
    $data['wishId'] = $wishId;

    $param = array('condition' => "&& wishlists_id='" . $wishId . "'");

    $res = $this->members_model->get_wislists(0, 1, $param);

    $this->form_validation->set_rules('message', 'Message', 'trim|xss_clean|max_length[250]');
    if ($this->form_validation->run() == TRUE) {
      $data = array(
          'message' => $this->input->post('message', FALSE),
          'notify' => '1'
      );

      $where = array(
          'wishlists_id' => $wishId
      );

      $this->members_model->safe_update('wl_wishlists', $data, $where, TRUE);
      //		$this->session->set_userdata('msg_type',$res['error_type']);
      $this->session->set_flashdata('success', 'Your Notification has been set sucessfully.');
      redirect('members/notify/' . $wishId, '');
    }

    $data['wish'] = $res[0];
    $this->load->view('view_product_notify', $data);
  }

  private function subscribe_newsletter($posted_data) {
    $query = $this->db->query("SELECT subscriber_email,status FROM  tbl_newsletters WHERE subscriber_email='$posted_data[subscriber_email]'");
    $subscribe_me = $posted_data['subscribe_me'];

    if ($query->num_rows() > 0) {
      $row = $query->row_array();
      if ($row['status'] == '0' && ($subscribe_me == 'Y')) {
        $where = "subscriber_email = '" . $row['subscriber_email'] . "'";
        $this->pages_model->safe_update('tbl_newsletters', array('status' => '1'), $where, FALSE);
        $msg = $this->config->item('newsletter_subscribed');
        return $msg;
      } else if ($row['status'] == '0' && ($subscribe_me == 'N')) {
        $msg = $this->config->item('newsletter_not_subscribe');
        return $msg;
      } else if ($row['status'] == '1' && ($subscribe_me == 'Y')) {
        $msg = $this->config->item('newsletter_already_subscribed');
        return $msg;
      } else if ($row['status'] == '1' && ($subscribe_me == 'N')) {
        $where = "subscriber_email = '" . $row['subscriber_email'] . "'";
        $this->pages_model->safe_update('tbl_newsletters', array('status' => '0'), $where, FALSE);
        $msg = $this->config->item('newsletter_unsubscribed');
        return $msg;
      }
    } else {
      if ($subscribe_me == 'N') {
        $msg = $this->config->item('newsletter_not_subscribe');
        return $msg;
      } else {
        $data = array('status' => '1', 'subscriber_name' => $posted_data['subscriber_name'], 'subscriber_email' => $posted_data['subscriber_email']);
        $this->pages_model->safe_insert('tbl_newsletters', $data);
        $msg = $this->config->item('newsletter_subscribed');
        return $msg;
      }
    }
  }

  public function subscriptions() {
    $data['default_email_text'] = "Email Id";
    $this->form_validation->set_rules('subscriber_name', 'Name', 'trim|required|max_length[225]');
    $this->form_validation->set_rules('subscriber_email', 'Email', 'trim|required|valid_email|max_length[255]');
    $this->form_validation->set_rules('subscribe_me', 'Status', 'trim|required');
    $this->form_validation->set_rules('verification_code', 'Verification Code', 'trim|required|valid_captcha_code');
    if ($this->form_validation->run() == TRUE) {
      $res = $this->members_model->add_newsletter_member();
      $this->session->set_userdata('msg_type', $res['error_type']);
      $this->session->set_flashdata($res['error_type'], $res['error_msg']);
      redirect('members/subscriptions', '');
    }
    $this->load->view('view_subscribe_newsletter', $data);
  }

}

/* End of file member.php */
/* Location: .application/modules/member/member.php */