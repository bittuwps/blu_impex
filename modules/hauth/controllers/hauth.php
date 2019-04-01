<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class HAuth extends Public_Controller {

  public function __construct() {
    parent::__construct();
    $this->load->model(array('users/users_model'));
    $this->load->library(array('safe_encrypt', 'Auth', 'Dmailer'));
    error_reporting(E_ALL);
  }

  public function index() {
    //$this->load->view('hauth/home');
    redirect('');
  }

  public function login($provider) {
    log_message('debug', "controllers.HAuth.login($provider) called");

    try {
      log_message('debug', 'controllers.HAuth.login: loading HybridAuthLib');
      $this->load->library('HybridAuthLib');

      if ($this->hybridauthlib->providerEnabled($provider)) {
        log_message('debug', "controllers.HAuth.login: service $provider enabled, trying to authenticate.");
        $service = $this->hybridauthlib->authenticate($provider);

        if ($service->isUserConnected()) {
          log_message('debug', 'controller.HAuth.login: user authenticated.');

          $user_profile = $service->getUserProfile();

          log_message('info', 'controllers.HAuth.login: user profile:' . PHP_EOL . print_r($user_profile, TRUE));

          if (isset($service)) {
            $service->logout();
          }

          $data['user_profile'] = $user_profile;

          if (is_object($user_profile) && !empty($user_profile)) {
            $dataArr = array(
                'type' => strtolower($this->uri->segment(3)),
                'name' => $user_profile->displayName,
                'email' => $user_profile->email
            );



            $name = $dataArr['name'];
            $name_arr = @explode(" ", $name);
            $first_name = $name_arr[0];
            $last_name = $name_arr[1];
            $email = $dataArr['email'];

            $address = '';
            $phone = '';

            $password_rand = random_string('alnum', 8);
            $password = $this->safe_encrypt->encode($password_rand);

            $where = "status !='2' and user_name ='" . $email . "'";
            $this->db->from('wl_customers');
            $this->db->where($where);
            $query = $this->db->get();
            if ($query->num_rows() == 1) {
              $mdtl = $query->row();
              $name = ucwords($mdtl->first_name . ' ' . $mdtl->last_name);
              $data = array(
                  'user_id' => $mdtl->customers_id,
                  //'name' => $name,
                  'username' => $mdtl->user_name,
                  'first_name' => $mdtl->first_name,
                  'last_name' => $mdtl->last_name,
                  'is_blocked' => $mdtl->is_blocked,
                  'blocked_time' => $mdtl->block_time,
                  'logged_in' => TRUE
              );
              $this->session->set_userdata($data);
            } else {
              $updId = "";
              $data = array(
                  'user_name' => $email,
                  'password' => $password,
                  'first_name' => $first_name,
                  'phone_number' => $phone,
                  'last_name' => $last_name,
                  'actkey' => md5($email),
                  'account_created_date' => $this->config->item('config.date.time'),
                  'current_login' => $this->config->item('config.date.time'),
                  'status' => '1',
                  'login_type' => $dataArr['type'],
                  'is_verified' => '1',
                  'ip_address' => $this->input->ip_address()
              );

              $insId = $this->users_model->safe_insert('wl_customers', $data, false);

              $data1 = array(
                  'user_id' => $insId,
                  'name' => ucwords($name),
                  'login_type' => $dataArr['type'],
                  'username' => $email,
                  'first_name' => $first_name,
                  'last_name' => $last_name,
                  'logged_in' => TRUE
              );

              $this->session->set_userdata($data1);


              if ($insId > 0) {
                $city = ($user_profile->region) ? $user_profile->region : '';
                $billing_array = array
                    (
                    'customer_id' => $insId,
                    'reciv_date' => $this->config->item('config.date.time'),
                    'city' => $city,
                    'address_type' => 'Bill',
                    'default_status' => 'Y'
                );
                $bill_Id = get_db_field_value("wl_customers_address_book", 'address_id', array("customer_id" => $insId, "address" => $address, "default_status" => "Y", "address_type" => "Bill"));

                if ($bill_Id == "") {
                  $bill_Id = $this->users_model->safe_insert('wl_customers_address_book', $billing_array, FALSE);
                } else {
                  $this->safe_update('wl_customers_address_book', $billing_array, "address_id = '" . $bill_Id . "'", FALSE);
                }

                if ($bill_Id > 0) {
                  if ($is_same_bill_ship == 'Y') {
                    $shipping_array = array
                        (
                        'customer_id' => $insId,
                        'reciv_date' => $this->config->item('config.date.time'),
                        'city' => $city,
                        'address_type' => 'Ship',
                        'default_status' => 'Y'
                    );
                  } else {
                    $shipping_array = array
                        (
                        'customer_id' => $insId,
                        'reciv_date' => $this->config->item('config.date.time'),
                        'city' => $city,
                        'address_type' => 'Ship',
                        'default_status' => 'Y'
                    );
                  }
                  if ($updId == "") {
                    $this->users_model->safe_insert('wl_customers_address_book', $shipping_array, FALSE);
                  } else {
                    $this->users_model->safe_update('wl_customers_address_book', $shipping_array, "customer_id = '" . $insId . "' AND default_status='Y' AND address_type ='Ship'", FALSE);
                  }
                }
              }

              /* Send  mail to user */

              $content = get_content('wl_auto_respond_mails', '1');
              $subject = str_replace('{site_name}', $this->config->item('site_name'), $content->email_subject);
              $body = $content->email_content;
              $verify_url = "<a href=" . base_url() . "users/>Click here </a>";

              $name = ucwords($first_name) . " " . ucwords($last_name);

              $body = str_replace('{mem_name}', $name, $body);
              $body = str_replace('{username}', $email, $body);
              $body = str_replace('{password}', $password_rand, $body);
              $body = str_replace('{admin_email}', $this->admin_info->admin_email, $body);
              $body = str_replace('{site_name}', $this->config->item('site_name'), $body);
              $body = str_replace('{url}', base_url(), $body);
              $body = str_replace('{link}', $verify_url, $body);

              $mail_conf = array(
                  'subject' => $subject,
                  'to_email' => $email,
                  'from_email' => $this->admin_info->admin_email,
                  'from_name' => $this->config->item('site_name'),
                  'body_part' => $body
              );

              $this->dmailer->mail_notify($mail_conf);
            }
          }

          //trace($user_profile);
          //exit;
          redirect('members/', '');
          //$this->load->view('hauth/done',$data);
        } else { // Cannot authenticate user
          show_error('Cannot authenticate user');
        }
      } else { // This service is not enabled.
        log_message('error', 'controllers.HAuth.login: This provider is not enabled (' . $provider . ')');
        show_404($_SERVER['REQUEST_URI']);
      }
    } catch (Exception $e) {
      $error = 'Unexpected error';
      switch ($e->getCode()) {
        case 0 : $error = 'Unspecified error.';
          break;
        case 1 : $error = 'Hybriauth configuration error.';
          break;
        case 2 : $error = 'Provider not properly configured.';
          break;
        case 3 : $error = 'Unknown or disabled provider.';
          break;
        case 4 : $error = 'Missing provider application credentials.';
          break;
        case 5 : log_message('debug', 'controllers.HAuth.login: Authentification failed. The user has canceled the authentication or the provider refused the connection.');
          //redirect();
          if (isset($service)) {
            log_message('debug', 'controllers.HAuth.login: logging out from service.');
            $service->logout();
          }
          show_error('User has cancelled the authentication or the provider refused the connection.');
          break;
        case 6 : $error = 'User profile request failed. Most likely the user is not connected to the provider and he should to authenticate again.';
          break;
        case 7 : $error = 'User not connected to the provider.';
          break;
      }

      if (isset($service)) {
        $service->logout();
      }

      log_message('error', 'controllers.HAuth.login: ' . $error);
      show_error('Error authenticating user.');
    }
  }

  public function endpoint() {

    log_message('debug', 'controllers.HAuth.endpoint called.');
    log_message('info', 'controllers.HAuth.endpoint: $_REQUEST: ' . print_r($_REQUEST, TRUE));

    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
      log_message('debug', 'controllers.HAuth.endpoint: the request method is GET, copying REQUEST array into GET array.');
      $_GET = $_REQUEST;
    }

    log_message('debug', 'controllers.HAuth.endpoint: loading the original HybridAuth endpoint script.');
    require_once APPPATH . '/third_party/hybridauth/index.php';
  }

}

/* End of file hauth.php */
/* Location: ./application/controllers/hauth.php */
