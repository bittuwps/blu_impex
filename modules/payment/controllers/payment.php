<?php

class Payment extends Public_Controller {

  public function __construct() {

    parent::__construct();
    $this->load->helper(array('payment/paypal', 'payment/payu', 'payment/ccavenue', 'cart/cart', 'file'));
    $this->load->model(array('order/order_model', 'payment/payment_model'));
    $this->load->library(array('Dmailer', 'safe_encrypt'));
    $this->lang->load('portuguese', 'portuguese');
    $this->page_section_ct = 'common';
  }

  public function index() {
    $payMode = str_replace('.html', '', $this->input->get_post('pay_method'));

    if ($payMode == "payu") {
      $working_order_id = $this->session->userdata('working_order_id');
      $order_res = array(); //$this->order_model->get_order_master($working_order_id);
      payuForm($order_res);
    } elseif ($payMode == "COD") {
      $this->pay_by_check();
    } elseif ($payMode == "CCAvenue") {
      $data = array('payment_method' => $payMode, 'payment_status' => 'Unpaid');
      $ordId = $this->session->userdata('working_order_id');
      $where = "order_id = '" . $ordId . "' ";
      $order_res = $this->order_model->get_order_master($ordId);
      ccavenueForm($order_res);
    } else {
      $data = array('payment_method' => $payMode, 'payment_status' => 'Unpaid');
      $ordId = $this->session->userdata('working_order_id');
      $where = "order_id = '" . $ordId . "' ";
      $order_res = $this->order_model->get_order_master($ordId);
      paypalForm($order_res);
    }

    //	}  
  }

  //ccavenue handler
  public function ccavRequestHandler() {
    $data = array();
    $this->load->view('payment/ccavRequestHandler', $data);
  }

  public function pay_by_check() {
    $data = array('payment_method' => 'Cash', 'payment_status' => 'Unpaid');
    $ordId = $this->session->userdata('working_order_id');
    $where = "order_id = '" . $ordId . "' ";
    $this->payment_model->safe_update('wl_order', $data, $where, FALSE);
    
    //update stock
    $orders = $this->db->query("SELECT store, products_id, quantity FROM wl_orders_products WHERE " . $where)->result_array();
    foreach ($orders as $ord) {
      $qty = $ord['quantity'];
      $this->db->query("UPDATE wl_product_attributes SET quantity=quantity-$qty WHERE store_id = '" . $ord['store'] . "' AND product_id = '" . $ord['products_id'] . "'");
    }
    //End here    
    
    $condition = "&& order_id='" . $ordId . "'";
    $cupn = $this->order_model->get_orders(0, 1, $condition);
    $cupn = $cupn[0];
    $ordId = md5($ordId);

    redirect('payment/thanks/' . $ordId, '');
  }

  public function order_success() {
    $ordId = $this->uri->segment(4);
    //update payment status
    $data = array('payment_method' => 'Paypal', 'payment_status' => 'Paid');
    $where = "MD5(order_id) = '$ordId' ";
    $this->payment_model->safe_update('wl_order', $data, $where, FALSE);
    //echo_sql();
    //exit;

    $res = get_db_field_value('wl_order', 'order_id', array('MD5(order_id)' => $ordId));
    $ordmaster = $this->order_model->get_order_master($res);
    $orddetail = $this->order_model->get_order_detail($res);
    if (is_array($ordmaster) && !empty($ordmaster)) {
      ob_start();
      $mail_subject = $this->config->item('site_name') . " Order Oerview";
      $from_email = $this->admin_info->admin_email;
      $from_name = $this->config->item('site_name');
      $mail_to = $ordmaster['email'];
      $body = invoice_content_print($ordmaster, $orddetail);
      $msg = ob_get_contents();

      $mail_conf = array(
          'subject' => $this->config->item('site_name') . " Order overview",
          'to_email' => $mail_to,
          'from_email' => $from_email,
          'from_name' => $this->config->item('site_name'),
          'body_part' => $msg
      );
      //trace($mail_conf); die;
      $this->dmailer->mail_notify($mail_conf);
    }

    $this->session->set_flashdata('msg', $this->config->item('payment_success'));
    redirect('payment/thanks/' . $ordId, '');
  }

  public function order_cancle() {
    $ordId = $this->uri->segment(4);
    $payment_method = $this->uri->segment(3);
    $data = array('order_status' => 'Canceled');
    $where = "MD5(order_id) = '$ordId' ";
    $this->payment_model->safe_update('wl_order', $data, $where, FALSE);
    $this->session->unset_userdata(array('working_order_id' => 0));
    $this->session->set_flashdata('msg', $this->config->item('payment_failed'));
    redirect('payment/thanks/' . $ordId, '');
  }

  public function thanks() {
    $order_id = $this->uri->segment(3);
    $res = get_db_field_value('wl_order', 'order_id', array('MD5(order_id)' => $order_id));
    //trace($res);exit;
    if ($res > 0) {
      $data['title'] = "Invoice Print";
      $order_res = $this->order_model->get_order_master($res);
      //trace($order_res);
      $order_details_res = $this->order_model->get_order_detail($res);
      $data['orddetail'] = $order_details_res;
      $data['ordmaster'] = $order_res;
      $this->load->view('payment/pay_thanks', $data);
    }
  }

}

/* End of file member.php */
/* Location: .application/modules/products/controllers/cart.php */