<?php

class Users extends Public_Controller {

  public function __construct() {
    parent::__construct();

    if (!isset($this->ci)) {
      $this->ci = & get_instance();
    }

    $this->load->model(array('users/users_model', 'members/members_model'));
    $this->load->library(array('safe_encrypt', 'securimage_library', 'Auth', 'Dmailer', 'cart'));
    $this->load->library(array('Mailer'));
  }

  //OLD Way
  public function register_member() {
    $count = count_record("wl_customers", "user_name = '" . $this->input->post('username') . "'");
    if ($count > 0) {
      $data['error'] = "Email ID already Exists!";
      $data['success'] = false;
    } else {
      $postData = $this->input->post();
      $username = $postData['username'];
      $password = $postData['password'];

      $registerID = $this->register_member_mail($postData);
      //Make user Login after Successful registartion
      $this->auth->verify_user($username, $password);
      if ($this->auth->is_user_logged_in()) {
        $user_id = $this->session->userdata('user_id');
        $userData = get_db_single_row("wl_customers", "*", "customers_id = '" . $user_id . "'");

        if ($userData['is_blocked'] == 1) {
          //echo "ssss";
          $data['error'] = "Your login details have been Blocked, please contact Admin!";
          $data['success'] = false;
        } else {
          $name = $userData['first_name'] . ' ' . $userData['last_name'];
          $data = array(
              'user_id' => $userData['customers_id'],
              'username' => $userData['user_name'],
              'name' => $name,
              'login_type' => $userData['login_type'],
              'first_name' => $userData['first_name'],
              'phone' => $userData['phone_number'],
              'last_name' => $userData['last_name'],
              'logged_in' => TRUE
          );
          $this->session->set_userdata($data);
        }
      }
      //End

      $this->session->set_userdata('user_id', $registerID);
      $message = $this->config->item('register_thanks');
      $message = str_replace('<site_name>', $this->config->item('site_name'), $message);
      // $this->session->set_userdata(array('msg_type'=>'success'));
      $this->session->set_flashdata('success', $message);
      $data['message'] = $message;
      $data['success'] = true;
      $data['transactionId'] = $this->session->userdata('transactionId');
      $data['user_id'] = $registerID;
    }
    echo json_encode($data);
  }

  // New API on 1st June 2016
  public function register_member_mail($postData) {
    $registeredId = $this->users_model->create_user($postData);
    $username = $postData['username'];
    $password = $postData['password'];


    /* Send  mail to user */
    $content = get_content('wl_auto_respond_mails', '1');
    $subject = str_replace('{site_name}', $this->config->item('site_name'), $content->email_subject);
    $body = $content->email_content;
    $verify_url = "";
    $name = " User ";
    $body = str_replace('{mem_name}', $name, $body);
    $body = str_replace('{username}', $username, $body);
    $body = str_replace('{password}', $password, $body);
    $body = str_replace('{admin_email}', $this->admin_info->admin_email, $body);
    $body = str_replace('{site_name}', $this->config->item('site_name'), $body);
    $body = str_replace('{url}', base_url(), $body);
    $body = str_replace('{link}', $verify_url, $body);

    $mail_conf = array(
        'subject' => $subject,
        'to_email' => $username,
        'from_email' => $this->admin_info->admin_email,
        'from_name' => $this->config->item('site_name'),
        'body_part' => $body
    );
    //trace($mail_conf);
    @$this->dmailer->mail_notify($mail_conf);

    /* Send  mail to admin */
    $subject = 'New member is registered';
    $body = '<table border="0" style="width:100%">
        <tbody>
          <tr><td colspan="2"><strong>Hi Admin,</strong></td></tr>
          <tr><td colspan="2">You have new member registered on {site_name} with the following details:</td></tr>
          <tr><td colspan="2">&nbsp;</td></tr>
          <tr><td><strong>Email ID:</strong></td><td>{username}</td></tr>
          <tr><td><strong>Password:</strong></td><td>{password}</td></tr>
          <tr><td colspan="2">&nbsp;</td></tr>
          <tr><td colspan="2">&nbsp;</td></tr>
          <tr>
            <td colspan="2">
              Thank you.<br />
              {site_name} Customer Service<br />
              Email: {admin_email}
            </td>
          </tr>
          <tr>
            <td colspan="2" style="text-align:center">
              &copy; ' . date('Y') . ' {site_name}. All rights reserved.
            </td>
          </tr>
        </tbody>
        </table>';
    $body = str_replace('{username}', $username, $body);
    $body = str_replace('{password}', $password, $body);
    $body = str_replace('{admin_email}', $this->admin_info->admin_email, $body);
    $body = str_replace('{site_name}', $this->config->item('site_name'), $body);
    $body = str_replace('{url}', base_url(), $body);
    $mail_conf = array(
        'subject' => $subject,
        'to_email' => $this->admin_info->admin_email,
        'from_email' => $username,
        'from_name' => $this->config->item('site_name'),
        'body_part' => $body
    );
    //trace($mail_conf);
    @$this->dmailer->mail_notify($mail_conf);
    /* End send  mail to admin */

    return $registeredId;
  }

  //Old Way
  public function login() {
    echo "ddd"; die;
    $this->form_validation->set_rules('login_username', 'Email ID', 'trim|required|valid_email');
    $this->form_validation->set_rules('login_password', 'Password', 'trim|required|');

    //$this->form_validation->set_rules('user', 'User', 'trim');
    if ($this->form_validation->run() == TRUE) {
      $username = $this->input->post('login_username');
      $password = $this->input->post('login_password');
      $this->auth->verify_user($username, $password);
      if ($this->auth->is_user_logged_in()) {
        $user_id = $this->session->userdata('user_id');
        $userData = get_db_single_row("wl_customers", "*", "customers_id = '" . $user_id . "'");
        if ($userData['is_blocked'] == 1) {
          //echo "ssss";
          $data['error'] = "Your login details have been Blocked, please contact Admin!";
          $data['success'] = false;
        } else {
          $name = $userData['first_name'] . ' ' . $userData['last_name'];
          $data = array(
              'user_id' => $userData['customers_id'],
              'username' => $userData['user_name'],
              'name' => $name,
              'login_type' => $userData['login_type'],
              'first_name' => $userData['first_name'],
              'phone' => $userData['phone_number'],
              'last_name' => $userData['last_name'],
              'logged_in' => TRUE
          );
          $this->session->set_userdata($data);
          //trace($this->session->userdata); exit;
          //Transaction
          $data['post_type'] = $this->session->userdata('post_type');
          $data['transactionId'] = $this->session->userdata('transactionId');

          $data['Userdata'] = $userData;
          $data['user_id'] = $user_id;
          //$data['txnId'] = $this->session->userdata('transactionId');
          $data['message'] = "Login Successful!!";
          $data['success'] = true;
        }
      } else {
        $data['error'] = $this->config->item('login_failed'); //"Something wrong, please try again!!!";
        $data['success'] = false;
      }
    } else {
      $data['error'] = "Parameter Missing!!!";
      $data['success'] = false;
    }
    echo json_encode($data);
  }

  public function member_exists($email) {
    $count = count_record("wl_customers", "email = '" . $email . "'");
    if ($count > 0) {
      return 1;
    } else {
      return 0;
    }
    echo my_json_encode($data);
  }

  public function logout() {
    $data = array('user_id' => 0,
        'type' => 0,
        'login_type' => 0,
        'username' => 0,
        'name' => 0,
        'mkey' => 0,
        'is_blocked' => 0,
        'blocked_time' => 0,
        'logged_in' => FALSE
    );
    $this->session->unset_userdata($data);
    $data['message'] = "Logout Successful!!!";
    $data['success'] = true;
    echo my_json_encode($data);
  }

  public function forgot_password() {


    if (is_array($this->input->post()) && !empty($this->input->post())) {
      $email = $this->input->post('email');

      $condtion = array('field' => "user_name,password,first_name,last_name", 'condition' => "user_name ='" . $email . "' AND status ='1' ");
      $res = $this->users_model->find('wl_customers', $condtion);
      if (is_array($res) && !empty($res)) {
        $first_name = $res['first_name'];
        $last_name = $res['last_name'];
        $username = $res['user_name'];
        $password = $res['password'];
        $password = $this->safe_encrypt->decode($password);
        /* Send  mail to user */

        $content = get_content('wl_auto_respond_mails', '2');
        $subject = $content->email_subject;
        $body = $content->email_content;

        $verify_url = "<a href=" . base_url() . "users/register>Click here </a>";

        $name = $first_name . ' ' . $last_name;
        $body = str_replace('{mem_name}', $name, $body);
        $body = str_replace('{username}', $username, $body);
        $body = str_replace('{password}', $password, $body);
        $body = str_replace('{admin_email}', $this->admin_info->admin_email, $body);
        $body = str_replace('{site_name}', $this->config->item('site_name'), $body);
        $body = str_replace('{url}', base_url(), $body);
        $body = str_replace('{link}', $verify_url, $body);

        $mail_conf = array(
            'subject' => $subject,
            'to_email' => $username,
            'from_email' => $this->admin_info->admin_email,
            'from_name' => $this->config->item('site_name'),
            'body_part' => $body
        );
        //trace($mail_conf);
        @$this->dmailer->mail_notify($mail_conf);

        $data['message'] = $this->config->item('forgot_password_success');
        $data['success'] = true;
      } else {
        $data['error'] = $this->config->item('email_not_exist');
        $data['success'] = false;
      }
    } else {
      if (validation_errors()) {
        $data['error'] = validation_errors();
      } else {
        $data['error'] = "Parameter Missing!!!";
      }
      $data['success'] = false;
    }
    echo json_encode($data);
  }

  public function edit_account() {
    header('Content-Type: application/json');
    $postData = array();
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $postData = json_decode(file_get_contents("php://input"));
      $postData = (array) $postData;
    }
    $user_id = $postData['user_id'];
    $mres = $this->members_model->get_member_row($user_id);

    if (is_array($mres) && !empty($mres)) {

      $register_array = array(
          //'first_name' => $postData['fullname'],
          'userName' => $postData['username'],
          'email' => $postData['email'],
          'phone_number' => $postData['phone_number'],
          'location' => $postData['location'],
          'school_university' => $postData['school_university'],
          'service_opted' => $postData['service_opted'],
      );
      $where = "customers_id = '" . $mres['customers_id'] . "'";
      $this->users_model->safe_update('wl_customers', $register_array, $where, FALSE);

      $data['Userdata'] = get_db_single_row("wl_customers", "customers_id as user_id, first_name, userName as username, email, password, phone_number, profile_picture, location, profile_picture, my_ref_code, service_opted, school_university, status, is_blocked, is_forcelogout, is_dataclean", "customers_id = '" . $mres['customers_id'] . "'");

      $data['success'] = true;
      $data['message'] = 'Account has been updated successfully!!!';
    } else {
      if (validation_errors()) {
        $data['error'] = validation_errors();
      } else {
        $data['error'] = "Parameter Missing!!!";
      }
      $data['success'] = false;
    }
    echo my_json_encode($data);
  }

}

/* End of file apis.php */
/* Location: .application/modules/apis/controllers/apis.php */
//201611133760 - 1 working / 