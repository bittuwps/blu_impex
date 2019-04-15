<?php

class Web_apis extends Public_Controller {

  public function __construct() {
    parent::__construct();
    //$this->load->model(array('products/product_model'));
  }

  public function help_guide() {
    $this->load->view('web_apis/user_guide');
  }
  
  public function share_guide() {
    $this->load->view('web_apis/share_guide');
  }

  public function get_category() {

    $fields = "category_id, category_name, category_image, category_image_off, status";
    $condition = "status = '1' AND category_id NOT IN ('2','3')";
    $updatedDate = $this->input->get_post('updatedDate');
    
    if($updatedDate != ''){
      $condition .= " and date_modified > '".$updatedDate."'";
    }
    
    $fetch_config = array(
        'field' => $fields,
        'condition' => $condition,
        'order' => 'category_id asc',
        'debug' => FALSE,
        'return_type' => "array"
    );

    $result = $this->category_model->findAll("wl_categories", $fetch_config);
    //echo_sql();
    $cnt_cat = get_found_rows();

    if (is_array($result) && !empty($result)) {
      $data['cat_list'] = $result;
      $data['success'] = "true";
    } else {
      $data['error'] = "No Result Found!!!";
      $data['success'] = "false";
    }
    echo my_json_encode($data);
  }

  public function get_products() {

    $record_per_page = (int) $this->input->post('per_page');
    $config['per_page'] = ( $record_per_page > 0 ) ? $record_per_page : $this->config->item('per_page');
    $offset = ($this->input->post('offset')) ? $this->input->post('offset') : 0;

    $cat_id = (int) $this->input->get_post('category_id');
    if ($cat_id > 0) {
      $condtion['category_id'] = $cat_id;
    }
    
    $updatedDate = $this->input->get_post('updatedDate');
    
    if($updatedDate != ''){
      $condtion["date_modified"] = $updatedDate;
    }

    $condtion['status'] = '1';
    $condtion['orderby'] = 'products_id asc';

    $res_array = $this->product_model->get_products($config['per_page'], $offset, $condtion);
    //echo_sql();
    $proCount = get_found_rows();

    if (is_array($res_array) && !empty($res_array)) {
      $data['product_list'] = $res_array;
      $data['success'] = "true";
    } else {
      $data['error'] = "No Result Found!!!";
      $data['success'] = "false";
    }
    echo my_json_encode($data);
  }
  
  public function get_offer_products() {

    $record_per_page = (int) $this->input->post('per_page');
    $config['per_page'] = ( $record_per_page > 0 ) ? $record_per_page : $this->config->item('per_page');
    $offset = ($this->input->post('offset')) ? $this->input->post('offset') : 0;

    $cat_id = 2;
    if ($cat_id > 0) {
      $condtion['category_id'] = $cat_id;
    }
    
    $condtion['status'] = '1';
    $condtion['orderby'] = 'products_id asc';
    
    
    $updatedDate = $this->input->get_post('updatedDate');
    
    if($updatedDate != ''){
      $condtion["date_modified"] = $updatedDate;
    }
    
    $res_array = $this->product_model->get_products($config['per_page'], $offset, $condtion);
    //echo_sql();
    $proCount = get_found_rows();

    if (is_array($res_array) && !empty($res_array)) {
      $data['product_list'] = $res_array;
      $data['success'] = "true";
    } else {
      $data['error'] = "No Result Found!!!";
      $data['success'] = "false";
    }
    echo my_json_encode($data);
  }
  
  public function get_laundry_products() {

    $record_per_page = (int) $this->input->post('per_page');
    $config['per_page'] = ( $record_per_page > 0 ) ? $record_per_page : $this->config->item('per_page');
    $offset = ($this->input->post('offset')) ? $this->input->post('offset') : 0;

    $cat_id = 3;
    if ($cat_id > 0) {
      $condtion['category_id'] = $cat_id;
    }

    $condtion['status'] = '1';
    $condtion['orderby'] = 'products_id asc';
    
    $updatedDate = $this->input->get_post('updatedDate');
    
    if($updatedDate != ''){
      $condtion["date_modified"] = $updatedDate;
    }
    
    $res_array = $this->product_model->get_products($config['per_page'], $offset, $condtion);
    //echo_sql();
    $proCount = get_found_rows();

    if (is_array($res_array) && !empty($res_array)) {
      $data['product_list'] = $res_array;
      $data['success'] = "true";
    } else {
      $data['error'] = "No Result Found!!!";
      $data['success'] = "false";
    }
    echo my_json_encode($data);
  }

  public function get_product_details() {

    $productId = (int) $this->input->get_post('product_id');
    if ($productId > 0) {
      $where = "wlp.products_id = '" . $productId . "'";
      $option = array(
          'fields' => "SQL_CALC_FOUND_ROWS wlp.*,wlc.first_name,wlc.user_name,wlc.mobile_number,wlcat.category_id",
          'where' => $where
      );
      $res = $this->product_model->get_products('1', '', $option);

      if (is_array($res) && !empty($res)) {
        $data['product_details'] = $res;
        $data['success'] = "true";
      } else {
        $data['error'] = "No Result Found!!!";
        $data['success'] = "false";
      }
    } else {
      $data['error'] = "parameter Missing!!";
      $data['success'] = "false";
    }
    echo my_json_encode($data);
  }

  public function send_feedback() {

    $this->form_validation->set_rules('name', 'Name', 'trim|alpha|required|max_length[30]');
    $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|max_length[80]');
    $this->form_validation->set_rules('phone_no', 'Contact Number', 'trim|required|max_length[20]');
    $this->form_validation->set_rules('message', 'Message', 'trim|required|max_length[8500]');

    if ($this->form_validation->run() == TRUE) {
      $name = $this->input->get_post('name'); // N/E/S    
      $email = $this->input->get_post('email'); // E/H/T
      $phone = $this->input->get_post('phone_no');
      $message = $this->input->get_post('message');
      $posted_data = array(
          'type' => '2',
          'first_name' => $name,
          'email' => $email,
          'phone_number' => $phone,
          'message' => $message,
          'receive_date' => $this->config->item('config.date.time')
      );
      $this->news_model->safe_insert('wl_enquiry', $posted_data, FALSE);
      $data['message'] = "Feedback Posted Successfully!!!";
      $data['success'] = "true";
    } else {
      $data['message'] = "Something went wrong, please try again!!!";
      $data['success'] = "false";
    }
    print_jason_encode($data);
  }

  public function get_device() {
//echo "skdjfhjkdfh";exit;
    if ($this->input->get_post('device_id') != '') {
      $device_id = $this->input->get_post('device_id');
      $device_status = $this->input->get_post('device_status');
      if ($device_status == '') {
        $device_status = 'T';
      }
      $cnt = count_record('wl_device_ids', "device_id = '" . $device_id . "'");
      if ($cnt == 0) {
        $posted_data = array(
            'device_id' => $device_id,
            'status' => $device_status,
            'date' => $this->config->item('config.date.time')
        );
        $this->news_model->safe_insert('wl_device_ids', $posted_data, FALSE);
        $data['message'] = "Device ID Stored Successfully!!!";
        $data['success'] = "true";
      } else {
        if ($device_status != '') {
          $this->db->query("UPDATE wl_device_ids SET status = '" . $device_status . "' WHERE device_id = '" . $device_id . "'");
          $data['message'] = "Device status have been updated.";
          $data['success'] = "true";
        } else {
          $data['message'] = "Device ID already exists!!!";
          $data['success'] = "false";
        }
      }
    } else {
      $data['message'] = "Something went wrong, please try again!!!";
      $data['success'] = "false";
    }
    print_jason_encode($data);
  }
  
  //Web Api Example
  
  
//   public function get_discount() {
//     
//     header('Content-Type:application/json');
//     $postData = array();
//     if($_SERVER['REQUEST_METHOD']=='POST'){
//       $postData = json_decode(file_get_contents('php://input'));
//       $postData = (array)$postData;
//       }
//       
//       if(isset($postData['customer_id']) &&$postData['customer_id']>0){
//         $discount=$this->db->query("select discount_value from wl_admin where admin_id='1'")->row();
//      
//      if(count($discount)>0){
//        $data['message'] = "All discount available";
//        $data['discount'] = $discount->discount_value;
//        $data['success'] = TRUE;
//      }else{
//        $data['message'] = "No Records Found";
//        $data['success'] = FALSE;
//      }
//       }else{
//         $data['message'] = "Parameter Missing";
//         $data['success'] = FALSE;
//       }
//        
//      
//      echo my_json_encode($data);
//   }
  public function get_discount() {
     
     header('Content-Type:application/json');
     $postData = array();
     if($_SERVER['REQUEST_METHOD']=='POST'){
       $postData = json_decode(file_get_contents('php://input'));
       $postData = (array)$postData;
       }
         $discount=$this->db->query("select discount_value from wl_admin where admin_id='1'")->row();
      
      if(count($discount)>0){
        $data['message'] = "All discount available";
        $data['discount'] = $discount->discount_value;
        $data['success'] = TRUE;
      }else{
        $data['message'] = "No Records Found";
        $data['success'] = FALSE;
      }
      
        
      
      echo my_json_encode($data);
   }

}

/* End of file apis.php */
/* Location: .application/modules/apis/controllers/apis.php */