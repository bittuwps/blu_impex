<?php

class Members extends Public_Controller {

  public function __construct() {
    parent::__construct();
    $this->load->model(array('users/users_model', 'members/members_model', 'sitepanel_new/mentor_profile_model'));
    $this->load->library(array('safe_encrypt', 'securimage_library', 'Auth', 'Dmailer', 'cart'));
    $this->load->library(array('mailer'));
  }

  public function chk_change_password() {
    echo form_open('web_apis/members/change_password');
    echo form_input('user_id', '12');
    echo form_input('old_password', 'bKZ%o0Cg');
    echo form_input('new_password', '123654');
    echo form_input('confirm_password', '123655');
    echo form_submit('submit', 'Submit');
  }

  public function change_password() {
    $user_id = (int) $this->input->post('user_id', TRUE);
    if ($user_id > 0) {
      $mres = $this->members_model->get_member_row($this->session->userdata('user_id'));

      $this->form_validation->set_rules('old_password', 'Old Password', 'trim|required');
      $this->form_validation->set_rules('new_password', 'New Password', 'trim|required|valid_password');
      $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|required|matches[new_password]');

      if ($this->form_validation->run() == TRUE) {
        $password_old = $this->safe_encrypt->encode($this->input->post('old_password', TRUE));

        $mres = $this->members_model->get_member_row($user_id, " AND password='$password_old' AND customers_id = '" . $user_id . "'");

        if (is_array($mres) && !empty($mres)) {
          $password = $this->safe_encrypt->encode($this->input->post('new_password', TRUE));
          $where = "customers_id=" . $user_id . " ";
          $data1 = array('password' => $password);
          $this->members_model->safe_update('wl_users', $data1, $where, FALSE);
          $message = $this->config->item('myaccount_password_changed');
          $data['message'] = $message;
          $data['success'] = true;
        } else {
//$this->session->set_userdata(array('msg_type'=>'warning'));
          $message = $this->config->item('myaccount_password_not_match');
          $data['message'] = $message;
          $data['success'] = true;
        }
      } else {
        if (validation_errors()) {
          $data['error'] = validation_errors();
        } else {

          $data['error'] = "Parameter Missing!!!";
        }
        $data['success'] = false;
      }
    } else {
      $data['error'] = "User Invalid!!!";
      $data['success'] = false;
    }
    /* End  member change password  */
    echo my_json_encode($data);
  }

  public function update_phone() {
    header('Content-Type: application/json');

    $postData = array();
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $postData = json_decode(file_get_contents("php://input"));
      $postData = (array) $postData;
    }

    if (is_array($postData) && !empty($postData)) {

      //$userId = $postData['userId'];
      $phone = $postData['phone'];
      $memberId = $postData['memberId'];
      $this->db->query("UPDATE wl_users SET phone_number = '" . $phone . "' WHERE customers_id = '" . $memberId . "'");
      //echo_sql();
      $data['message'] = "Phone No. Updated Successfully!";
      $data['success'] = true;
    } else {
      $data['error'] = "Parameter Missing!!!";
      $data['success'] = false;
    }
    echo my_json_encode($data);
  }

  public function timeDiff($firstTime, $lastTime) {
    $time = $lastTime;
// convert to unix timestamps
    $firstTime = strtotime($firstTime);
    $lastTime = strtotime($lastTime);
    $rt = "";
// perform subtraction to get the difference (in seconds) between times
    $timeDiff = $firstTime - $lastTime;

// return the difference

    if ($timeDiff > 60) {
      if ($timeDiff > 60 && $timeDiff < 1440) {
        $timeDiff = $timeDiff / 60;
        $rt = ceil($timeDiff) . ' minutes ago';
      } elseif ($timeDiff > 1440 && $timeDiff < 86400) {
        $timeDiff = $timeDiff / (60 * 60);
        $rt = 'about ' . ceil($timeDiff) . ' hours ago';
      } elseif ($timeDiff > 86400 && $timeDiff < 172800) {
        $timeDiff = $timeDiff / (60 * 60 * 2);
        $tm = explode(' ', $time);
        $rt = "yesterday"; // at " . $tm[1];
      } else {
        $timeDiff = $timeDiff / (24 * 60 * 60);
        $rt = ceil($timeDiff) . " days ago";
      }
    } else {
      $rt = $timeDiff . " seconds ago";
    }
    return $rt;
  }

  public function post_document() {

    $member_id = (int) $this->input->get_post('user_id');
    $name = $this->input->get_post('name');
    $email = $this->input->get_post('email');
    $phone = $this->input->get_post('phone');

    $total_amount = $this->input->post('totalcost');
    $checkbox = $this->input->post('checkbox');
    $service_ids = $this->input->post('service_ids_post');
    $university_appiled = $this->input->get_post('university_appiled');
    $number_of_essay = $this->input->get_post('number_of_essay');
    $service_level = $this->input->get_post('service_level');
    $service_type = $this->input->get_post('service_type');
    $paymentType = 'TrackNPay';

    //    print_r($_POST);exit;

    if ($service_type != '') {
      $check = 1;
      if ($checkbox == 1) {
        $check = 0;
      }

      $order_id1 = get_db_field_value("wl_order", "max(order_id)", "");
      $order_id = $order_id1 + 1;
      $txnId = 'UNYQRN-' . $order_id;
      //exit;

      $this->db->query("INSERT INTO wl_order SET post_type = '1', service_type = '" . $service_type . "', service_level = '" . $service_level . "', check_file = '" . $check . "', customers_id = '" . $member_id . "', invoice_number = '" . $txnId . "', phone = '" . $phone . "', email = '" . $email . "', name = '" . $name . "', university_appiled='" . $university_appiled . "', number_of_essay='" . $number_of_essay . "', total_amount = '" . $total_amount . "', paymentType = '" . $paymentType . "', order_received_date = '" . $this->config->item('config.date.time') . "'");


      //$this->db->query("INSERT INTO wl_order SET post_type = '1', service_type = '" . $service_type . "', service_level = '" . $service_level . "', check_file = '" . $check . "', invoice_number = '" . $txnId . "', phone = '" . $phone . "', email = '" . $email . "', name = '" . $name . "', university_appiled='" . $university_appiled . "', number_of_essay='" . $number_of_essay . "', total_amount = '" . $total_amount . "', paymentType = '" . $paymentType . "', order_received_date = '" . $this->config->item('config.date.time') . "'");
      //echo_sql();exit;
      $orderID = mysql_insert_id();

      //exit;
      //Upload Doc
      if ($orderID > 0) {
        if ($checkbox == 1) {
          for ($i = 0; $i < $number_of_essay; $i++) {
            $this->db->query("INSERT INTO wl_user_docs SET order_id = '" . $orderID . "', customers_id = '" . $member_id . "', service_ids='" . $service_ids[$i] . "'");
          }
        } else {
          //update files
          $number_of_files = sizeof($_FILES['upload_essay']['tmp_name']);
          $files = $_FILES['upload_essay'];
          //trace($files);die();
          $status = true;
          if ($status == true) {
            $errors = array();
            $this->load->library('upload');
            // next we pass the upload path for the images
            $data1 = array();
            // next we pass the upload path for the images
            $config['upload_path'] = UPLOAD_DIR . '/user/document/';
            // also, we make sure we allow only certain type of images
            $config['allowed_types'] = 'doc|docx|txt|rtf';

            for ($i = 0; $i < $number_of_files; $i++) {
//            print_r($files);
//            exit;
              $_FILES['uploadedimage']['name'] = $files['name'][$i];
              $_FILES['uploadedimage']['type'] = $files['type'][$i];
              $_FILES['uploadedimage']['tmp_name'] = $files['tmp_name'][$i];
              $_FILES['uploadedimage']['error'] = $files['error'][$i];
              $_FILES['uploadedimage']['size'] = $files['size'][$i];
              //now we initialize the upload library
              $this->upload->initialize($config);
              if ($this->upload->do_upload('uploadedimage')) {
                $data1['uploads'][$i] = $this->upload->data();
                $uploaded_file = $data1['uploads'][$i]['file_name'];

                //Insert into Table
                $this->db->query("INSERT INTO wl_user_docs SET order_id = '" . $orderID . "', customers_id = '" . $member_id . "', service_ids='" . $service_ids[$i] . "', 	doc_name = '" . $uploaded_file . "'");

                $data['message'] = "Image(s) Uploaded Successfully!!";
                $data['success'] = true;

                $from = $this->admin_info->admin_email;
                if ($service_type == '1') {
                  $id = 2;
                } elseif ($service_type == '2') {
                  $id = 5;
                } elseif ($service_type == '3') {
                  $id = 7;
                }
                $content = get_content('wl_auto_respond_mails', $id);
                $subject = "UNYQORN Services";
                $user = $name;
                $to = $email;
                $service = $this->config->item('service_type');

                $body = $content->email_content;
                $body = str_replace('{User}', $user, $body);
                $body = str_replace('{collegeeassay}', $service[$service_type], $body);


                $mail_conf = array(
                    'subject' => $subject,
                    'to_email' => $to,
                    'from_email' => $from,
                    'from_name' => $this->config->item('site_name'),
                    'body_part' => $body
                );
                $file = '';
                //$this->mailer->sending_mail($mail_conf, $file);
              } else {
                $data['message'] = $this->upload->display_errors();
                $data['success'] = false;
                $data1['upload_errors'][$i] = $this->upload->display_errors();

                //echo my_json_encode($data);
                //exit;
              }
            }
          }
        }
        $data['amount'] = $total_amount;
        $data['txnId'] = $orderID;
        $data['message'] = "Document posted successfully!";
        $data['success'] = true;
      } else {
        $data['error'] = "Parameter Missing ,try again!";
        $data['success'] = false;
      }
    } else {
      $data['error'] = "Parameter Missing!";
      $data['success'] = false;
    }

    echo my_json_encode($data);
  }

  public function post_document_web() {

//    trace($this->input->post());

    $this->session->unset_userdata('post_type');
    $this->session->set_userdata('post_type', 'submitPayment');
    $total_amount = $this->input->post('totalcost');
    $checkbox = $this->input->post('checkbox');
    $service_ids = $this->input->post('service_ids');
    $name = $this->input->get_post('name');
    $email = $this->input->get_post('email');
    $phone = $this->input->get_post('phone');
    $university_appiled = $this->input->get_post('university_appiled');
    $number_of_essay = $this->input->get_post('number_of_essay');
    $service_level = $this->input->get_post('service_level');
    $service_type = $this->input->get_post('service_type');
    $paymentType = 'TrackNPay';

//    print_r($_POST);exit;

    if ($service_type != '') {
      $check = 1;
      if ($checkbox == 1) {
        $check = 0;
      }

      $order_id1 = get_db_field_value("wl_order", "max(order_id)", "");
      $order_id = $order_id1 + 1;
      $txnId = 'UNYQRN-' . $order_id;
      //exit;
      $this->db->query("INSERT INTO wl_order SET post_type = '1', service_type = '" . $service_type . "', service_level = '" . $service_level . "', check_file = '" . $check . "', invoice_number = '" . $txnId . "', phone = '" . $phone . "', email = '" . $email . "', name = '" . $name . "', university_appiled='" . $university_appiled . "', number_of_essay='" . $number_of_essay . "', total_amount = '" . $total_amount . "', paymentType = '" . $paymentType . "', order_received_date = '" . $this->config->item('config.date.time') . "'");
      //echo_sql();exit;
      $orderID = mysql_insert_id();

      //exit;
      //Upload Doc
      if ($orderID > 0) {
        $this->session->unset_userdata('transactionId');
        $this->session->set_userdata('transactionId', $orderID);
        if ($checkbox == 1) {
          for ($i = 0; $i < $number_of_essay; $i++) {
            $this->db->query("INSERT INTO wl_user_docs SET order_id = '" . $orderID . "', service_ids='" . $service_ids[$i] . "'");
          }
        } else {
          //update files
          $number_of_files = sizeof($_FILES['upload_essay']['tmp_name']);
          $files = $_FILES['upload_essay'];
          //trace($files);die();
          $status = true;
          if ($status == true) {
            $errors = array();
            $this->load->library('upload');
            // next we pass the upload path for the images
            $data1 = array();
            // next we pass the upload path for the images
            $config['upload_path'] = UPLOAD_DIR . '/user/document/';
            // also, we make sure we allow only certain type of images
            $config['allowed_types'] = 'doc|docx|txt|rtf';

            for ($i = 0; $i < $number_of_files; $i++) {
//            print_r($files);
//            exit;
              $_FILES['uploadedimage']['name'] = $files['name'][$i];
              $_FILES['uploadedimage']['type'] = $files['type'][$i];
              $_FILES['uploadedimage']['tmp_name'] = $files['tmp_name'][$i];
              $_FILES['uploadedimage']['error'] = $files['error'][$i];
              $_FILES['uploadedimage']['size'] = $files['size'][$i];
              //now we initialize the upload library
              $this->upload->initialize($config);
              if ($this->upload->do_upload('uploadedimage')) {
                $data1['uploads'][$i] = $this->upload->data();
                $uploaded_file = $data1['uploads'][$i]['file_name'];

                //Insert into Table
                $this->db->query("INSERT INTO wl_user_docs SET order_id = '" . $orderID . "', service_ids='" . $service_ids[$i] . "', 	doc_name = '" . $uploaded_file . "'");

                $data['message'] = "Image(s) Uploaded Successfully!!";
                $data['success'] = true;

                $from = $this->admin_info->admin_email;
                if ($service_type == '1') {
                  $id = 2;
                } elseif ($service_type == '2') {
                  $id = 5;
                } elseif ($service_type == '3') {
                  $id = 7;
                }
                $content = get_content('wl_auto_respond_mails', $id);
                $subject = "UNYQORN Services";
                $user = $name;
                $to = $email;
                $service = $this->config->item('service_type');

                $body = $content->email_content;
                $body = str_replace('{User}', $user, $body);
                $body = str_replace('{collegeeassay}', $service[$service_type], $body);


                $mail_conf = array(
                    'subject' => $subject,
                    'to_email' => $to,
                    'from_email' => $from,
                    'from_name' => $this->config->item('site_name'),
                    'body_part' => $body
                );
                $file = '';
                //$this->mailer->sending_mail($mail_conf, $file);
              } else {
                $data['message'] = $this->upload->display_errors();
                $data['success'] = false;
                $data1['upload_errors'][$i] = $this->upload->display_errors();

                //echo my_json_encode($data);
                //exit;
              }
            }
          }
        }
        $data['amount'] = $total_amount;
        $data['txnId'] = $orderID;
        $data['message'] = "Document posted successfully!";
        $data['success'] = true;
      } else {
        $data['error'] = "Parameter Missing ,try again!";
        $data['success'] = false;
      }
    } else {
      $data['error'] = "Parameter Missing!";
      $data['success'] = false;
    }

    echo my_json_encode($data);
  }

  public function post_resume() {
    $this->session->unset_userdata('post_type');
    $this->session->set_userdata('post_type', 'submitPayment');
    $name = $this->input->get_post('name');
    $email = $this->input->get_post('email');
    $phone = $this->input->get_post('phone');

    $resume_for = $this->input->get_post('resume_for'); //Internship/Job/CollegeApplication
    $resume_type = $this->input->get_post('resume_type'); //Existing or New i.e 1 / 2
    $time_duration = $this->input->get_post('time_duration'); //if no existing resume

    $total_amount = $this->input->get_post('totalcost');
    $service_ids = $this->input->get_post('service_ids_resume');
    //trace($service_ids);
    $paymentType = 'Paypal';

    if ($resume_for != '' && $resume_type != '') {

      $order_id1 = get_db_field_value("wl_order", "max(order_id)", "");
      $order_id = $order_id1 + 1;
      $txnId = 'UNYQRN-' . $order_id;
      // customers_id = '" . $member_id . "',
//      print_r($_POST);
//      print_r($_POST);
//      exit;

      $this->db->query("INSERT INTO wl_order SET post_type = '2', invoice_number = '" . $txnId . "', service_ids='" . $service_ids . "', resume_for='" . $resume_for . "', resume_type = '" . $resume_type . "', time_duration = '" . $time_duration . "', phone = '" . $phone . "', email = '" . $email . "', name = '" . $name . "', total_amount = '" . $total_amount . "', paymentType = '" . $paymentType . "', order_received_date = '" . $this->config->item('config.date.time') . "'");
      $orderID = mysql_insert_id();
      //exit;
      //Upload Doc
      if ($orderID > 0) {
        //update files
        $this->session->unset_userdata('transactionId');
        $this->session->set_userdata('transactionId', $orderID);

        $status = true;
//        print_r($_POST);
////        print_r($_FILES);
//        exit;
        if ($status == true && ($_FILES['upload_essay']['tmp_name'][0] != '')) {
          $number_of_files = sizeof($_FILES['upload_essay']['tmp_name']);
          $files = $_FILES['upload_essay'];
          $errors = array();
          $this->load->library('upload');
          // next we pass the upload path for the images
          $data1 = array();
          // next we pass the upload path for the images
          $config['upload_path'] = UPLOAD_DIR . '/user/document/';
          // also, we make sure we allow only certain type of images
          $config['allowed_types'] = 'doc|docx|txt|rtf';

          for ($i = 0; $i < $number_of_files; $i++) {
            //trace($files['name'][$i]);
            //exit;
            $_FILES['uploadedimage']['name'] = $files['name'][$i];
            $_FILES['uploadedimage']['type'] = $files['type'][$i];
            $_FILES['uploadedimage']['tmp_name'] = $files['tmp_name'][$i];
            $_FILES['uploadedimage']['error'] = $files['error'][$i];
            $_FILES['uploadedimage']['size'] = $files['size'][$i];
            //now we initialize the upload library
            $this->upload->initialize($config);
            if ($this->upload->do_upload('uploadedimage')) {
              $data1['uploads'][$i] = $this->upload->data();
              $uploaded_file = $data1['uploads'][$i]['file_name'];

              //Insert into Table
              $this->db->query("INSERT INTO wl_user_docs SET order_id = '" . $orderID . "',doc_name = '" . $uploaded_file . "', service_ids='" . $service_ids . "'");

              $data['message'] = "Image(s) Uploaded Successfully!!";
              $data['success'] = true;
            } else {
              $data['message'] = $this->upload->display_errors();
              $data['success'] = false;
              $data1['upload_errors'][$i] = $this->upload->display_errors();
            }
          }
        } else {


          $this->db->query("INSERT INTO wl_user_docs SET order_id = '" . $orderID . "', service_ids='" . $service_ids . "'");
        }
      }

      $data['amount'] = $total_amount;
      $data['txnId'] = $order_id;
      $data['message'] = "Service Request posted successfully!";
      $data['success'] = true;
    } else {
      $data['error'] = "Parameter Missing!";
      $data['success'] = false;
    }
    echo my_json_encode($data);
  }

  public function post_resume_app() {
    $member_id = (int) $this->input->get_post('user_id');
//    $this->session->unset_userdata('post_type');
//    $this->session->set_userdata('post_type', 'submitPayment');
    $name = $this->input->get_post('name');
    $email = $this->input->get_post('email');
    $phone = $this->input->get_post('phone');

    $resume_for = $this->input->get_post('resume_for'); //Internship/Job/CollegeApplication
    $resume_type = $this->input->get_post('resume_type'); //Existing or New i.e 1 / 2
    $time_duration = $this->input->get_post('time_duration'); //if no existing resume

    $total_amount = $this->input->get_post('totalcost');
    $service_ids = $this->input->get_post('service_ids');
    //trace($service_ids);
    $paymentType = 'Paypal';

    if ($resume_for != '' && $resume_type != '') {

      $order_id1 = get_db_field_value("wl_order", "max(order_id)", "");
      $order_id = $order_id1 + 1;
      $txnId = 'UNYQRN-' . $order_id;
      // customers_id = '" . $member_id . "',
//      print_r($_POST);

      $this->db->query("INSERT INTO wl_order SET post_type = '2', customers_id = '" . $member_id . "', invoice_number = '" . $txnId . "', service_ids='" . $service_ids . "', resume_for='" . $resume_for . "', resume_type = '" . $resume_type . "', time_duration = '" . $time_duration . "', phone = '" . $phone . "', email = '" . $email . "', name = '" . $name . "', total_amount = '" . $total_amount . "', paymentType = '" . $paymentType . "', order_received_date = '" . $this->config->item('config.date.time') . "'");
      $orderID = mysql_insert_id();
      //exit;
      //Upload Doc
      if ($orderID > 0) {
        //update files
//        $this->session->unset_userdata('transactionId');
//        $this->session->set_userdata('transactionId', $orderID);

        $status = true;
        // print_r($_FILES);exit;
        if ($status == true && !empty($_FILES)) {
          $number_of_files = sizeof($_FILES['upload_essay']['tmp_name']);
          $files = $_FILES['upload_essay'];
          $errors = array();
          $this->load->library('upload');
          // next we pass the upload path for the images
          $data1 = array();
          // next we pass the upload path for the images
          $config['upload_path'] = UPLOAD_DIR . '/user/document/';
          // also, we make sure we allow only certain type of images
          $config['allowed_types'] = 'doc|docx|txt';

          for ($i = 0; $i < $number_of_files; $i++) {
            //trace($files['name'][$i]);
            //exit;
            $_FILES['uploadedimage']['name'] = $files['name'][$i];
            $_FILES['uploadedimage']['type'] = $files['type'][$i];
            $_FILES['uploadedimage']['tmp_name'] = $files['tmp_name'][$i];
            $_FILES['uploadedimage']['error'] = $files['error'][$i];
            $_FILES['uploadedimage']['size'] = $files['size'][$i];
            //now we initialize the upload library
            $this->upload->initialize($config);
            if ($this->upload->do_upload('uploadedimage')) {
              $data1['uploads'][$i] = $this->upload->data();
              $uploaded_file = $data1['uploads'][$i]['file_name'];

              //Insert into Table
              $this->db->query("INSERT INTO wl_user_docs SET order_id = '" . $orderID . "', customers_id = '" . $member_id . "',service_ids='" . $service_ids . "',doc_name = '" . $uploaded_file . "'");

              $data['message'] = "Doc Uploaded Successfully!!";
              $data['success'] = true;
            } else {
              $data['message'] = $this->upload->display_errors();
              $data['success'] = false;
              $data1['upload_errors'][$i] = $this->upload->display_errors();
            }
          }
        } else {


          $this->db->query("INSERT INTO wl_user_docs SET order_id = '" . $orderID . "',service_ids='" . $service_ids . "', customers_id = '" . $member_id . "'");
        }
      }

      $data['amount'] = $total_amount;
      $data['txnId'] = $order_id;
      $data['message'] = "Service Request posted successfully!";
      $data['success'] = true;
    } else {
      $data['error'] = "Parameter Missing!";
      $data['success'] = false;
    }
    echo my_json_encode($data);
  }

  public function my_files() {

    header('Content-Type: application/json');

    $postData = array();
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $postData = json_decode(file_get_contents("php://input"));
      $postData = (array) $postData;
    }
    //arrays

    $order_id = $postData['order_id'];
    $res = $this->db->query("SELECT * from wl_user_docs where order_id='" . $order_id . "'")->result_array();

    foreach ($res as $r) {
      $service_name = get_db_field_value("wl_services", "service_name", "where  service_id=" . $r['service_ids']);
    }



    if (is_array($res) && !empty($res)) {
      $data['path'] = base_url() . 'uploaded_files/user/document';
      $data['result'] = $res;
      $data['success'] = true;
    } else {
      $data['error'] = "No result found!";
      $data['success'] = false;
    }
    echo my_json_encode($data);
  }

  public function my_edits_new() {

    header('Content-Type: application/json');

    $postData = array();
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $postData = json_decode(file_get_contents("php://input"));
      $postData = (array) $postData;
    }
    //arrays
    $orderType = $postData['orderType'];
    $serviceTypeArr = $this->config->item('service_type');
    $servicelevelArr = $this->config->item('service_level');
    $resumeFor = $this->config->item('resumeFor');
    $offset = ($postData['off'] > 0) ? $postData['off'] : 0;
    $perPage = 10;
    $qry = "'Pending','Inprocess','Completed'";
    if ($orderType == 'Pending') {
      $qry = "'Pending'";
    } elseif ($orderType == 'Inprocess') {
      $qry = "'Inprocess'";
    } elseif ($orderType == 'Completed') {
      $qry = "'Completed'";
    }

    $userId = $postData['user_id'];
    $result_pending = $this->db->query("SELECT wl_order.total_amount,wl_order.order_status,wl_user_docs.order_id,wl_user_docs.document_status,wl_user_docs.doc_name,wl_user_docs.recv_date,wl_user_docs.order_id,wl_user_docs.service_ids,wl_order.resume_for, GROUP_CONCAT(doc_id ORDER BY wl_user_docs.order_id separator ',') as doc_id,GROUP_CONCAT(wl_user_docs.service_ids ORDER BY wl_user_docs.order_id separator ',') as service_ids,GROUP_CONCAT(doc_name ORDER BY wl_user_docs.order_id separator ',') as doc_name,wl_order.post_type,service_type,resume_type FROM wl_user_docs inner join wl_order on wl_order.order_id=wl_user_docs.order_id WHERE wl_user_docs.customers_id = '" . $userId . "' AND wl_user_docs.document_status IN ($qry) group by wl_user_docs.doc_id DESC LIMIT $offset, $perPage")->result_array();

//    echo_sql();

    $res = array();
    if (is_array($result_pending) && !empty($result_pending)) {
      $i = 0;
      foreach ($result_pending as $k => $val) {

        $fileCount = count_record("wl_user_docs", "order_id = '" . $val['order_id'] . "'");
        $fileCountCompleted = count_record("wl_user_docs", "order_id = '" . $val['order_id'] . "' AND document_status = 'Completed'");

        //trace($val);
        $res[$i]['post_type'] = $val['post_type'];
        $res[$i]['order_id'] = $val['order_id'];

        if ($fileCount == $fileCountCompleted) {
          $res[$i]['order_status'] = "Completed";
        } else {
          $res[$i]['order_status'] = $val['document_status'];
        }


        if ($val['post_type'] == 1) {
          $res[$i]['service_type'] = @$serviceTypeArr[$val['service_type']];
          $res[$i]['service_level'] = @$servicelevelArr[$val['service_level']];
        } else {
          $res[$i]['resume_type'] = ($val['resume_type'] == '1') ? 'Existing' : 'New';
          $res[$i]['resume_for'] = $resumeFor[$val['resume_for']];
        }

        $res[$i]['amount'] = $val['total_amount'];
        $res[$i]['date'] = getDateFormat($val['recv_date'], 3);
        $res[$i]['status'] = $val['document_status'];
        if ($val['document_status'] == 'Inprocess') {
          //fetch date
          $dt = explode(' ', $val['recv_date']);
          $dt = explode('-', $dt[0]);
          $completionDate = date("Y-m-d", mktime(0, 0, 0, $dt[1], $dt[2] + 7, $dt[0]));

          //calculate date
          $date1 = date('Y-m-d');
          $date2 = $completionDate;
          $diff = abs(strtotime($date2) - strtotime($date1));
          $years = floor($diff / (365 * 60 * 60 * 24));
          $months = floor(($diff - $years * 365 * 60 * 60 * 24) / (30 * 60 * 60 * 24));
          $days = floor(($diff - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 * 24) / (60 * 60 * 24));
          $res[$i]['time_left'] = $days . ' Days';
        } else {
          $res[$i]['time_left'] = NULL;
        }

        $i++;
      }
      $data['result'] = $res;
      $data['success'] = true;
    } else {
      $data['error'] = "No result found!";
      $data['success'] = false;
    }


    //$data['result'] = $result_pending;
    //$data['success'] = true;
    //$result_process = $this->db->query("SELECT wl_user_docs.document_status,wl_user_docs.doc_name,wl_user_docs.recv_date,wl_user_docs.order_id,wl_user_docs.service_ids, GROUP_CONCAT(doc_id ORDER BY wl_user_docs.order_id separator ',') as doc_id,GROUP_CONCAT(wl_user_docs.service_ids ORDER BY wl_user_docs.order_id separator ',') as service_ids,GROUP_CONCAT(doc_name ORDER BY wl_user_docs.order_id separator ',') as doc_name,post_type,service_type,resume_type FROM wl_user_docs inner join wl_order on wl_order.order_id=wl_user_docs.order_id WHERE wl_user_docs.customers_id = '" . $userId . "' AND wl_user_docs.document_status = 'Inprocess' group by wl_user_docs.order_id ")->result_array();
    //$data=$result_pending;
    echo my_json_encode($data);
  }

  public function my_edits() {

    header('Content-Type: application/json');

    $postData = array();
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $postData = json_decode(file_get_contents("php://input"));
      $postData = (array) $postData;
    }

    if (is_array($postData) && !empty($postData)) {
      $userId = $postData['user_id'];
      if ($userId > 0) {

        $serviceTypeArr = $this->config->item('service_type');

        $servicelevelArr = $this->config->item('service_level');
        $resumeFor = $this->config->item('resumeFor');


        $offset = ($postData['off'] > 0) ? $postData['off'] : 0;
        $perPage = 10;
        $orderType = $postData['orderType'];
        $qry = "'Pending','Inprocess','Completed'";
        if ($orderType == 'Pending') {
          $qry = "'Pending'";
        } elseif ($orderType == 'Inprocess') {
          $qry = "'Inprocess'";
        } elseif ($orderType == 'Completed') {
          $qry = "'Completed'";
        }

        $res = array();
        $restult = $this->db->query("SELECT * FROM wl_order WHERE customers_id = '" . $userId . "' AND order_status in ($qry)  ORDER BY order_id DESC LIMIT $offset, $perPage")->result_array();
        if (is_array($restult) && !empty($restult)) {
          $i = 0;
          foreach ($restult as $k => $val) {

            $fileCount = count_record("wl_user_docs", "order_id = '" . $val['order_id'] . "'");
            $fileCountCompleted = count_record("wl_user_docs", "order_id = '" . $val['order_id'] . "' AND document_status = 'Completed'");

            if ($fileCount == $fileCountCompleted) {
              $res[$i]['order_status'] = "Completed";
            }
            elseif ($fileCountCompleted > 0 && $fileCount != $fileCountCompleted) {
              $res[$i]['order_status'] = "Inprocess";
            }else {
              $res[$i]['order_status'] = $val['order_status'];
            }

            $res[$i]['order_id'] = $val['order_id'];
            $res[$i]['post_type'] = $val['post_type'];
            if ($val['post_type'] == 1) {
              $res[$i]['service_type'] = @$serviceTypeArr[$val['service_type']];
              $res[$i]['service_level'] = @$servicelevelArr[$val['service_level']];
            } else {
              $res[$i]['resume_type'] = ($val['resume_type'] == '1') ? 'Existing' : 'New';
              $res[$i]['resume_for'] = $resumeFor[$val['resume_for']];
            }
            $res[$i]['amount'] = $val['total_amount'];
            $res[$i]['document'] = $this->db->query("SELECT doc_id, mentor_id, customers_id, doc_name, doc_name as service_name, document_status FROM wl_user_docs WHERE customers_id = '" . $userId . "' AND order_id = '" . $val['order_id'] . "' ORDER BY doc_id")->result_array();
            $res[$i]['date'] = getDateFormat($val['order_received_date'], 3);
            $res[$i]['status'] = $val['order_status'];
            if ($val['order_status'] == 'Inprocess') {
              //fetch date
              $dt = explode(' ', $val['order_received_date']);
              $dt = explode('-', $dt[0]);
              $completionDate = date("Y-m-d", mktime(0, 0, 0, $dt[1], $dt[2] + 7, $dt[0]));

              //calculate date
              $date1 = date('Y-m-d');
              $date2 = $completionDate;
              $diff = abs(strtotime($date2) - strtotime($date1));
              $years = floor($diff / (365 * 60 * 60 * 24));
              $months = floor(($diff - $years * 365 * 60 * 60 * 24) / (30 * 60 * 60 * 24));
              $days = floor(($diff - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 * 24) / (60 * 60 * 24));
              $res[$i]['time_left'] = $days . ' Days';
            } else {
              $res[$i]['time_left'] = NULL;
            }

            $i++;
          }
          $data['result'] = $res;
          $data['success'] = true;
        } else {
          $data['error'] = "No result found!";
          $data['success'] = false;
        }
      } else {
        $data['error'] = "Invalid User!";
        $data['success'] = false;
      }
    } else {
      $data['error'] = "Parameter Missing!";
      $data['success'] = false;
    }
    echo my_json_encode($data);
  }

  public function post_enquiry() {
    $member_id = (int) $this->input->get_post('user_id');
    $name = $this->input->get_post('username');
    $email = $this->input->get_post('email');
    $phone = $this->input->get_post('phone');

    if ($member_id > 0) {

      //upload image
      $uploaded_file = "";
      if (!empty($_FILES) && $_FILES['document']['name'] != '') {
        $this->load->library('upload');
        $uploaded_data = $this->upload->my_upload('document', 'user/document');
        if (is_array($uploaded_data) && !empty($uploaded_data)) {
          $uploaded_file = $uploaded_data['upload_data']['file_name'];
        }
      }
      //End here
      //insert to DB
      $this->db->query("INSERT INTO wl_enquiry SET type = '1', email = '" . $email . "', first_name = '" . $name . "', phone_number = '" . $phone . "', document='" . $uploaded_file . "', receive_date = '" . $this->config->item('config.date.time') . "'");
      //End Here

      $data['message'] = "Enquiry posted successfully!";
      $data['success'] = true;
    } else {
      $data['error'] = "Parameter Missing!";
      $data['success'] = false;
    }
    echo my_json_encode($data);
  }

  public function cancel_trip_order() {
    $order_id = (int) $this->input->get_post('order_id');
    if ($order_id > 0) {
      $this->db->query("UPDATE wl_order SET order_status = 'Canceled' WHERE order_id = '" . $order_id . "'");
      $data['message'] = "cancelled!!!";
      $data['success'] = true;
      $data['order_id'] = $order_id;
      $data['tripDetails'] = $this->db->query("SELECT t.name, t.price FROM wl_trips as t LEFT JOIN wl_order as o ON t.trip_id = o.trip_id WHERE order_id = '" . $order_id . "'")->row_array();
//trace($data);
    } else {
      $data['message'] = "Invalid Transaction!!!";
      $data['success'] = false;
      $data['tripDetails'] = array();
      $data['order_id'] = $order_id;
    }
    $this->load->view('failed', $data);
//echo my_json_encode($data);
  }

  public function success_trip_order() {
    $order_id = (int) $this->input->get_post('order_id');
    $this->db->query("UPDATE wl_order SET payment_status = 'Paid' WHERE order_id = '" . $order_id . "'");
    /* Start  send mail */
    $this->load->helper(array('trips/trips'));

    $orderDetails = $this->db->query("SELECT t.trip_id, t.name, t.price, t.location, t.duration, o.total_amount, o.invoice_number, o.coupon_discount_amount, o.order_received_date, u.customers_id, u.first_name, u.last_name, u.email FROM wl_trips as t LEFT JOIN wl_order as o ON t.trip_id = o.trip_id LEFT JOIN wl_users as u ON u.customers_id = o.customers_id WHERE order_id = '" . $order_id . "'")->row_array();
//trace($orderDetails);
//Setting up Notifications


    $cnt = count_record("wl_notifications", "notification_receiver_id = '" . $orderDetails['customers_id'] . "' AND sender_id = '" . $orderDetails['customers_id'] . "' AND message = 'joined' AND notification_type = 'T' AND trip_id = '" . $orderDetails['trip_id'] . "'");
    if ($cnt <= 0) {
      $n = $this->db->query("INSERT INTO wl_notifications SET notification_receiver_id = '" . $orderDetails['customers_id'] . "', sender_id = '" . $orderDetails['customers_id'] . "', message = 'joined', notification_type = 'T', trip_id = '" . $orderDetails['trip_id'] . "', dateTime = '" . $this->config->item('config.date.time') . "'");
    }


//end

    $this->db->query("UPDATE wl_trips SET modified_date='" . $this->config->item('config.date.time') . "' WHERE trip_id = '" . $orderDetails['trip_id'] . "'");

    $mail_subject = "Trip Order @ " . $this->config->item('site_name');
    $from_email = $this->admin_info->admin_email;
    $from_name = $this->config->item('site_name');
    $mail_to = $orderDetails['email'];
    ob_start();
    $body = order_invoice($orderDetails);
    $msg = ob_get_contents();
    ob_end_flush();
    $mail_conf = array(
        'subject' => $mail_subject,
        'to_email' => $mail_to,
        'from_email' => $from_email,
        'from_name' => $this->config->item('site_name'),
        'body_part' => $msg
    );
//trace($mail_conf);
//exit;						
    @$this->dmailer->mail_notify($mail_conf);
    /* End  send mail */
//End here
    redirect(site_url() . 'web_apis/members/success_trip_order1?order_id=' . $order_id, 'refresh');
  }

  public function success_trip_order1() {
    $order_id = (int) $this->input->get_post('order_id');

    if ($order_id > 0) {
      $data['message'] = "Congrats!!! you have successfully joined our WTS trip.";
      $data['success'] = true;
      $data['order_id'] = $order_id;


//Return Trip Details
      $data['tripDetails'] = $this->db->query("SELECT t.name, t.price FROM wl_trips as t LEFT JOIN wl_order as o ON t.trip_id = o.trip_id WHERE order_id = '" . $order_id . "'")->row_array();
    } else {
      $data['error'] = "Something Went Wrong!!!";
      $data['success'] = false;
      $data['tripDetails'] = array();
      $data['order_id'] = $order_id;
    }
    $this->load->view('success', $data);
//echo my_json_encode($data);
  }

  public function join_trip() {
    $member_id = (int) $this->input->get_post('member_id');
    $trip_id = (int) $this->input->get_post('trip_id');
    $name = $this->input->get_post('name');
    $email = $this->input->get_post('email ');
    $phone = $this->input->get_post('phone');
    $total_amount = $this->input->get_post('total_amount');
    $paymentType = $this->input->get_post('paymentType');
    $coupon_id = "";
    $coupon_amt = "";

    $coupon_code = $this->input->get_post('coupon_code');
    if ($coupon_code != '') {
      $cpRes = $this->db->query("SELECT cd.coupon_id, c.price FROM wl_coupon as c LEFT JOIN wl_coupon_details as cd ON c.coupon_id = cd.coupon_id WHERE cd.coupon_code = '" . $coupon_code . "' AND (DATE(c.start_date_time) <='" . date('Y-m-d') . "' AND DATE(c.end_date_time) >='" . date('Y-m-d') . "')")->row_array();
      if (is_array($cpRes) && !empty($cpRes)) {
        $coupon_id = $cpRes['coupon_id'];
        $coupon_amt = $cpRes['price'];
        $total_amount = $total_amount - $coupon_amt;
        $data['coupon_status'] = true;
      } else {
        $data['coupon_status'] = false;
      }
    }

    if ($member_id > 0 && $trip_id > 0) {

      $order_id1 = get_db_field_value("wl_order", "max(order_id)", "");
      $order_id = $order_id1 + 1;
      $txnId = 'WTS-' . $order_id;

      $this->db->query("INSERT INTO wl_order SET trip_id = '" . $trip_id . "', customers_id = '" . $member_id . "', invoice_number = '" . $txnId . "', phone = '" . $phone . "', email = '" . $email . "', name = '" . $name . "', discount_coupon_id = '" . $coupon_id . "', coupon_discount_amount = '" . $coupon_amt . "', total_amount = '" . $total_amount . "', paymentType = '" . $paymentType . "', order_received_date = '" . $this->config->item('config.date.time') . "'");

      $this->session->set_userdata('ORDER_ID', $order_id);
      $data['amount'] = $total_amount;
      $data['txnId'] = $order_id;
      $data['message'] = "Order Posted Successfully!!!";
      $data['success'] = true;
    } else {
      $data['error'] = "Parameter Missing!!!";
      $data['success'] = false;
    }
    echo my_json_encode($data);
  }

  public function payment_request() {
    //get user data
    $userdata = $this->db->query("SELECT * FROM wl_users WHERE customers_id='" . $this->session->userdata('user_id') . "'")->row();
    $name = $userdata->first_name . ' ' . $userdata->last_name;

    //Update wl_order
    $this->db->query("UPDATE wl_order SET customers_id='" . $this->input->get_post('user_id') . "',name='" . $name . "',email='" . $userdata->email . "',phone='" . $userdata->phone_number . "' WHERE order_id='" . $this->input->get_post('order_id') . "'");
    //Update wl_users_doc
    $this->db->query("UPDATE wl_user_docs SET customers_id='" . $this->input->get_post('user_id') . "' WHERE order_id='" . $this->input->get_post('order_id') . "'");

    //get order details
    $customer_id = $this->input->get_post('user_id');
    $order_id = $this->input->get_post('order_id');
    $user_data = $this->db->query("SELECT order_id, customers_id, invoice_number, email, name, phone, total_amount from wl_order WHERE order_id = '" . $order_id . "'")->row_array();
    $data['user_data'] = $user_data;

    //send to payment gateway
    $this->load->view('payment_request', $data);
  }

  public function payment_success() {


    if (isset($_POST) && (count($_POST) > 0)) {

      $data['payment_details'] = $_POST;
      $c_p_id = $_POST['order_id'];
      $response_message = $_POST['response_message'];
      if ($response_code == 0) {
        $this->db->query("UPDATE wl_order SET payment_status = 'Paid' WHERE order_id = '" . $c_p_id . "'");
        $data['status'] = 1;
      } else {
        $data['status'] = 0;
      }


      $this->load->view('payment_success', $data);
    } else {
      redirect(base_url('members'));
    }
  }

  public function payment_request_app() {

    $customer_id = $this->input->get_post('user_id');
    $order_id = $this->input->get_post('order_id');

    $user_data = $this->db->query("SELECT order_id, customers_id, invoice_number, email, name, phone, total_amount from wl_order WHERE customers_id = '" . $customer_id . "' and order_id = '" . $order_id . "'")->row_array();
    $data['user_data'] = $user_data;

    $this->load->view('payment_request_app', $data);
  }

  public function payment_success_fail_app() {


    if (isset($_POST) && (count($_POST) > 0)) {



      $data['payment_details'] = $_POST;
      $c_p_id = $_POST['order_id'];
      $data['order_id'] = $c_p_id;
      $data['response_message'] = $_POST['response_message'];

      $data['customer_id'] = $this->session->userdata('user_id');
      $data['transaction_id'] = $_POST['transaction_id'];
      $data['payment_method'] = $_POST['payment_method'];
      $data['payment_datetime'] = $_POST['payment_datetime'];
      $data['response_code'] = $_POST['response_code'];
      $data['amount'] = $_POST['amount'];

      if ($data['response_code'] == 0) {
        $this->db->query("UPDATE wl_order SET payment_status = 'Paid' WHERE order_id = '" . $c_p_id . "'");
        $data['status'] = 1;
        $data['message'] = "Something Went wrong!";
        $data['success'] = true;
      } else {
        $data['status'] = 0;
        $data['error'] = "Transaction Failed/Canceled!";
        $data['success'] = false;
      }
    } else {
      $data['error'] = "Something Went wrong!";
      $data['success'] = false;
    }
    //Update DB
    $this->db->query("UPDATE wl_order SET paymentResponse = '" . json_encode($data) . "' WHERE order_id = '" . $c_p_id . "'");
    //echo_sql();

    echo my_json_encode($data);
  }

  public function payment_success_fail_response() {
    $order_id = $this->input->get_post('order_id');
    $data = get_db_field_value('wl_order', 'paymentResponse', "WHERE order_id = '" . $order_id . "'");
    echo $data;
  }

  public function get_conversation() {
    header('Content-Type: application/json');

    $postData = array();
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $postData = json_decode(file_get_contents("php://input"));
      $postData = (array) $postData;
    }

    if (isset($postData['file_id']) && !empty($postData['file_id'])) {

      $file_id = $postData['file_id'];
      $flag_check = $this->mentor_profile_model->get_file_flag($file_id);

      $uconnect_check = $this->mentor_profile_model->get_file_uconnectorder($file_id);
      $express_check = $this->mentor_profile_model->get_file_express_check($file_id);
      $files_service = $this->mentor_profile_model->get_file_service_files($file_id, 1);
      $client_details = $this->mentor_profile_model->get_client_file_info($file_id);
      $post_type = $this->config->item('lookingFor');
      $service_type = $this->config->item('service_type');
      $resume_type = $this->config->item('resume_type');

      if ($client_details->post_type == 1) {
        $data['post_type'] = $service_type[$client_details->service_type];
      } else {
        $data['post_type'] = $resume_type[$client_details->resume_type];
      }
//    $data['service_type'] = $client_details->service_type;
//    $data['post_type'] = $client_details->post_type;

      if ($client_details->service_type == 1 || $client_details->post_type == 2) {
        $conversation = $files_service;
      } elseif ($client_details->service_type == 3) {
        $conversation = $uconnect_check;
      } elseif ($client_details->service_type == 2) {
        $conversation = $express_check;
      }
      $data['conversationSatus'] = $flag_check;
      $data['url'] = base_url() . 'uploaded_files/user/document';

      $convo = array();
      if (!empty($conversation)) {
        if (is_object($conversation)) {
          $conversation->mentorName = get_db_field_value("wl_mentors", "CONCAT(first_name,' ',last_name)", "WHERE mentor_id='" . $conversation->mentor_id . "'");
          $conversation->clientName = get_db_field_value("wl_users", "CONCAT(first_name,' ',last_name)", "WHERE customers_id='" . $conversation->customers_id . "'");
          $convo[] = $conversation;
        } else {
          $sl = 0;
          foreach ($conversation as $val) {
//          trace($val);
            $convo[$sl] = $val;
            if (isset($val['mentor_id'])) {
              $convo[$sl]['mentorName'] = get_db_field_value("wl_mentors", "CONCAT(first_name,' ',last_name)", "WHERE mentor_id='" . $val['mentor_id'] . "'");
              $convo[$sl]['clientName'] = get_db_field_value("wl_users", "CONCAT(first_name,' ',last_name)", "WHERE customers_id='" . $val['customers_id'] . "'");
            }

            $sl++;
          }
        }
      }
      if (count($convo) > 0) {
        $data['message'] = "Conversation available";
        $data['conversation'] = $convo;
        $data['success'] = TRUE;
      } else {
        $data['message'] = "No Conversation Found";
        $data['success'] = FALSE;
      }
    } else {
      $data['message'] = "Parameter Missing";
      $data['success'] = FALSE;
    }


    echo my_json_encode($data);
  }

  public function post_conversation() {

    $commented_by = '0';
    $flag_check_value = '0';
    date_default_timezone_set('Asia/calcutta');
    $date = date('m/d/Y h:i:s a', time());
    $mentor_id = $this->input->get_post('mentor_id', TRUE);
    $doc_id = $this->input->get_post('doc_id', TRUE);
    $customers_id = $this->input->get_post('customers_id', TRUE);
    $message = $this->input->get_post('message', TRUE);
    $uploaded_file = "";
    $check = $this->input->get_post('check', TRUE);
    $posted_data_mesg = array(
        'mentor_id' => $mentor_id,
        'file_id' => $this->input->get_post('doc_id', TRUE),
        'customers_id' => $this->input->get_post('customers_id', TRUE),
        'conversation' => $this->input->get_post('message', TRUE),
        'created_date' => $date,
        'commented_by' => $commented_by,
        'flag_check_resume' => $flag_check_value,
    );
    $convo_id = $this->mentor_profile_model->safe_insert('wl_client_conversation', $posted_data_mesg, FALSE);
    if ($convo_id > 0) {
      if ($check == 1) {

        if (is_array($_FILES) && $_FILES['doc']['name'][0] != '') {
          $files = $_FILES['doc'];
          $uploaded_file = "";
          $_FILES['to_upload']['name'] = $files['name'];
          $_FILES['to_upload']['type'] = $files['type'];
          $_FILES['to_upload']['tmp_name'] = $files['tmp_name'];
          $_FILES['to_upload']['error'] = $files['error'];
          $_FILES['to_upload']['size'] = $files['size'];


          $this->load->library('upload');
          $uploaded_data = $this->upload->my_upload('to_upload', "user/document");
          if (is_array($uploaded_data) && !empty($uploaded_data)) {
            $uploaded_file = $uploaded_data['upload_data']['file_name'];

            $data['uploaded_file_path'] = base_url() . 'uploaded_files/user/document/' . $uploaded_file;
            $posted_data = array(
                'mentor_id' => $mentor_id,
                'file_id' => $this->input->get_post('doc_id', TRUE),
                'customers_id' => $this->input->get_post('customers_id', TRUE),
                'doc_name' => $uploaded_file,
                'uploaded_by' => $commented_by,
                'recv_date' => $date,
                'convo_id' => $convo_id,
            );
            $insertId = $this->mentor_profile_model->safe_insert('wl_convo_docs', $posted_data, FALSE);
          }
        }
      }
      $data['message'] = "Conversation posted successfully!";

      $data['success'] = true;
    } else {
      $data['error'] = "Parameter Missing ,try again!";
      $data['success'] = false;
    }


    echo my_json_encode($data);
  }

}

/* End of file members.php */
/* Location: .application/modules/web_apis/controllers/members.php */
