<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_Controller extends MY_Controller {

  public function __construct() {
    parent::__construct();
    $this->load->library(array('sitepanel/jquery_pagination'));
    $this->load->model(array('utils_model'));
    $this->admin_lib->is_admin_logged_in();
  }

  public function update_status($table, $auto_field = 'id') {
    $action = $this->input->post('status_action', TRUE);
    $arr_ids = $this->input->post('arr_ids', TRUE);
    $category_count = $this->input->post('category_count', TRUE);
    $product_count = $this->input->post('product_count', TRUE);
    $gallery_count = $this->input->post('gallery_count', TRUE);
    $controller = $this->router->fetch_class();
    $method = $this->router->fetch_method();

    if (is_array($arr_ids)) {
      $str_ids = implode(',', $arr_ids);
      if ($action == 'Activate') {
        foreach ($arr_ids as $k => $v) {
          $data = array('status' => '1');
          if ($controller == "members" || $controller == "crafters") {
            $data = array('status' => '1', 'is_verified' => '1');
          } else {
            if ($controller == "buckets") {
              $data = array('status' => 'Y');
            } else {
              $data = array('status' => '1');
            }
          }
          $where = "$auto_field ='$v'";
          $this->utils_model->safe_update($table, $data, $where, FALSE);
          $this->session->set_userdata(array('msg_type' => 'success'));
          $this->session->set_flashdata('success', lang('activate'));
        }
      }
      if ($action == 'Deactivate') {
        foreach ($arr_ids as $k => $v) {
          $countChild = 0;
          if ($controller == 'category') {
            $countChild = count_record('wl_products', "FIND_IN_SET (" . $v . ",category_links) AND status !='2'");
          }
          if ($countChild > 0) {
            $this->session->set_userdata(array('msg_type' => 'error'));
            $this->session->set_flashdata('error', lang('child_to_deactivate'));
          } else {
            if ($controller == "buckets") {
              $data = array('status' => 'N');
            } else {
              $data = array('status' => '0');
            }
            $data = array('status' => '0');
            $where = "$auto_field ='$v'";
            $this->utils_model->safe_update($table, $data, $where, FALSE);
            $this->session->set_userdata(array('msg_type' => 'success'));
            $this->session->set_flashdata('success', lang('deactivate'));
          }
        }
      }

      if ($action == 'Delete') {
        foreach ($arr_ids as $k => $v) {
          $countChild = 0;
          if ($controller == 'category') {
            $countChild = count_record('wl_products', "FIND_IN_SET (" . $v . ",category_links) AND status !='2'");
          }

          if ($countChild > 0) {
            $this->session->set_userdata(array('msg_type' => 'error'));
            $this->session->set_flashdata('error', lang('child_to_delete'));
          } else {

            $where = array($auto_field => $v);
            $this->utils_model->safe_delete($table, $where, TRUE);
            $this->session->set_userdata(array('msg_type' => 'success'));
            $this->session->set_flashdata('success', lang('deleted'));
          }
        }
      }

      if ($action == 'Block') {
        $data = array('is_blocked' => '1');
        $where = "$auto_field IN ($str_ids)";
        $this->utils_model->safe_update($table, $data, $where, FALSE);
        $this->session->set_userdata(array('msg_type' => 'success'));
        $this->session->set_flashdata('success', 'Members have been set as blocked!');
      }
      if ($action == 'Unblock') {
        $data = array('is_blocked' => '0');
        $where = "$auto_field IN ($str_ids)";
        $this->utils_model->safe_update($table, $data, $where, FALSE);
        $this->session->set_userdata(array('msg_type' => 'success'));
        $this->session->set_flashdata('success', 'Members have been set as unblocked!');
      }

      if ($action == 'Tempdelete') {
        $data = array('status' => '2');
        $where = "$auto_field IN ($str_ids)";
        $this->utils_model->safe_update($table, $data, $where, FALSE);
        $this->session->set_userdata(array('msg_type' => 'success'));
        $this->session->set_flashdata('success', lang('deleted'));
      }
    }
    redirect($_SERVER['HTTP_REFERER'], '');
  }

  public function set_as($table, $auto_field = 'id', $data = array()) {
    $arr_ids = $this->input->post('arr_ids', TRUE);
    if (is_array($arr_ids)) {
      $str_ids = implode(',', $arr_ids);
      if (is_array($data) && !empty($data)) {
        $data = $data;
        $where = "$auto_field IN ($str_ids)";
        $this->utils_model->safe_update($table, $data, $where, FALSE);

        $current_controller = $this->router->fetch_class();
        if ($current_controller == "orders" && $this->input->post("ord_status") != "" && ($this->input->post("ord_status") != "Pending" && $this->input->post("ord_status") != "Closed")) {


          $this->load->library("dmailer");
          $mail_subject = $this->config->item('site_name') . " Order overview";
          $from_email = $this->admin_info->admin_email;
          $from_name = $this->config->item('site_name');
          foreach ($arr_ids as $key => $val) {

            if ($this->input->post("ord_status") == 'Delivered') {
              $data = array('payment_status'=>'Paid', 'order_delivery_date' => $this->config->item('config.date.time'));
              $where = "order_id = '" . $val . "'";
              $this->utils_model->safe_update('wl_order', $data, $where, FALSE);
              //update stock
              //$orders = $this->db->query("SELECT store, products_id, quantity FROM wl_orders_products WHERE ".$where)->result_array();
              //foreach($orders as $ord){
                //$qty = $ord['quantity'];
                //$this->db->query("UPDATE wl_product_attributes SET quantity=quantity-$qty WHERE store_id = '".$ord['store']."' AND product_id = '".$ord['products_id']."'");
              //}
              //End here              
              
            }
            
            if($this->input->post("ord_status") == 'Canceled'){
              //update stock
              $orders = $this->db->query("SELECT store, products_id, quantity FROM wl_orders_products WHERE ".$where)->result_array();
              foreach($orders as $ord){
                $qty = $ord['quantity'];
                $this->db->query("UPDATE wl_product_attributes SET quantity=quantity+$qty WHERE store_id = '".$ord['store']."' AND product_id = '".$ord['products_id']."'");
              }
              //End here
            }


            $order = get_db_single_row("wl_order", '*', " order_id = " . $val);
            $courier_details = "";
            if ($this->input->post("ord_status") == "Dispatched") {
              if ($order['courier_company_name'] != "") {
                $courier_details.="<br/>Courier Company Name: " . $order['courier_company_name'];
              }
              if ($order['tracing_code'] != "") {
                $courier_details.="<br/>Tracking Code: " . $order['tracing_code'];
              }
            }
            $mail_to = $order["email"];
            $body = "Dear " . ucwords($order["first_name"] . " " . $order["last_name"]);
            $body .=",<br /><br />";
            $body .="This is to notify you that your order is " . $this->input->post("ord_status") . "  successfully .<br /><br />Here are the details<br /> Order Number: $order[invoice_number] <br/>" . $this->input->post("ord_status") . " Date/Time: " . date("d-m-Y h:i:s") . $courier_details . "<br /><br />Regards,<br />Customer Support Team<br />" . $this->config->item('site_name');
            $mail_conf = array(
                'subject' => $this->config->item('site_name') . " Order " . $this->input->post("ord_status"),
                'to_email' => $mail_to,
                'from_email' => $from_email,
                'from_name' => $this->config->item('site_name'),
                'body_part' => $body);
            //trace($mail_conf);
            //exit;
            $this->dmailer->mail_notify($mail_conf);
          }
        }
        $this->session->set_userdata(array('msg_type' => 'success'));
        $this->session->set_flashdata('success', "Record has been updated/deleted successfully.");
      }
      redirect($_SERVER['HTTP_REFERER'], '');
    }
  }

  public function update_displayOrder($tblname, $fldname, $fld_id) {
    $posted_order_data = $this->input->post('ord');
    while (list($key, $val) = each($posted_order_data)) {
      if ($val != '') {
        $val = (int) $val;
        $data = array($fldname => $val);
        $where = "$fld_id=$key";
        $this->utils_model->safe_update($tblname, $data, $where, TRUE);
      }
    }
    $this->session->set_userdata(array('msg_type' => 'success'));
    $this->session->set_flashdata('success', lang('order_updated'));
    redirect($_SERVER['HTTP_REFERER'], '');
  }

}
