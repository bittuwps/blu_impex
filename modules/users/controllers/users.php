<?php

class Users extends Public_Controller
{

    public function __construct()
    {

        parent::__construct();

        $this->load->helper(array('date', 'language', 'cookie', 'file'));

        $this->load->model(array('users/users_model', 'pages/pages_model', 'members/members_model'));

        $this->load->library(array('safe_encrypt', 'securimage_library', 'Auth', 'Dmailer', 'mailer', 'cart'));

        $this->lang->load('portuguese', 'portuguese');

        $this->form_validation->set_error_delimiters("<div class='required'>", "</div>");

        $rf_session = $this->session->userdata('ref');

        if ($rf_session == '' && $this->input->get('ref') != "") {

            $this->session->set_userdata(array('ref' => $this->input->get('ref')));

        }

    }

    public function index()
    {

        if ($this->auth->is_user_logged_in()) {

            redirect('members/', '');

        }

        //$condition       = array('friendly_url'=>'login','status'=>'1');

        //$content         = $this->pages_model->get_cms_page( $condition );

        //$data['page_content'] = $content;

        $data['heading_title'] = "Login";

        $data['unq_section'] = "Login";

        $this->load->view('users_register', $data);

    }

    public function forgotten_password()
    {

        if ($this->input->post('forgotme') != "") {

            $email = $this->input->post('email', true);

            $this->form_validation->set_rules('email', ' Email ID', 'required|valid_email');

            if ($this->form_validation->run() == true) {

                $condtion = array('field' => "customers_id,first_name,user_name", 'condition' => "user_name ='" . $email . "' AND status ='1' ");

                $res = $this->users_model->find('wl_customers', $condtion);

                if (is_array($res) && !empty($res)) {

                    $first_name = $res['first_name'];

                    $userId = $this->safe_encrypt->encode($res['customers_id']);

                    $content = get_content('wl_auto_respond_mails', '2');

                    $subject = $content->email_subject;

                    $body = $content->email_content;

                    $verify_url = "<a href=" . base_url() . "users/reset_password/" . $userId . ">Reset Password</a>";

                    $name = $first_name;

                    $body = str_replace('{mem_name}', $name, $body);

                    $body = str_replace('{admin_email}', $this->admin_info->admin_email, $body);

                    $body = str_replace('{site_name}', $this->config->item('site_name'), $body);

                    $body = str_replace('{url}', base_url(), $body);

                    $body = str_replace('{link}', $verify_url, $body);

                    $mail_conf = array(

                        'subject' => $subject,

                        'to_email' => $res['user_name'],

                        'from_email' => $this->admin_info->admin_email,

                        'from_name' => $this->config->item('site_name'),

                        'body_part' => $body,

                    );

                    trace($mail_conf);die;

                    $this->dmailer->mail_notify($mail_conf);

                    //Mail End

                    $this->session->set_userdata(array('msg_type' => 'success'));

                    $this->session->set_flashdata('success', $this->config->item('forgot_password_success'));

                    redirect('users/forgotten_password', '');

                } else {

                    $this->session->set_userdata(array('msg_type' => 'validation'));

                    $this->session->set_flashdata('validation', $this->config->item('email_not_exist'));

                    redirect('users/forgotten_password', '');

                }

            }

        }

        $data['heading_title'] = "Forgot Password";

        $this->load->view('users_forgot_password', $data);

    }

    public function reset_password()
    {

        $userId = $this->safe_encrypt->decode($this->uri->segment(3));

        $mres = $this->members_model->get_member_row($userId);

        $data['mres'] = $mres;

        if (is_array($mres) && !empty($mres)) {

            $this->form_validation->set_rules('new_password', 'New Password', 'trim|required|valid_password');

            $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|required|matches[new_password]');

            if ($this->form_validation->run() == true) {

                $password = $this->safe_encrypt->encode($this->input->post('new_password'));

                $data = array('password' => $password);

                $where = "customers_id=" . $userId . " ";

                $this->members_model->safe_update('wl_customers', $data, $where, false);

                $this->session->set_userdata(array('msg_type' => 'success'));

                $this->session->set_flashdata('success', 'Your Password has been updated, please login now!');

                redirect('users/register', '');

            }

            /* End  member change password  */

            $data['heading_title'] = "Reset Password";

            $this->load->view('users_reset_password', $data);

        } else {

        }

    }

    public function direct_login()
    {

        if (!$this->auth->is_user_logged_in()) {

            //$this->form_validation->set_rules('login_username', 'Username','trim|required|valid_email');

            //$this->form_validation->set_rules('login_password', 'Password', 'trim|required|');

            //$this->form_validation->set_rules('user', 'User', 'trim');

            //if ($this->form_validation->run() == TRUE){

            $username = $this->input->get_post('username');

            $password = $this->safe_encrypt->decode($this->input->get_post('mypass'));

            $this->auth->verify_user($username, $password);

            if ($this->auth->is_user_logged_in()) {

                $ref = $this->session->userdata('ref');

                $this->session->unset_userdata(array('ref' => 0));

                if ($ref != "") {

                    redirect($ref, '');

                } else {

                    redirect('members/myaccount', '');

                }

            } else {

                $this->session->set_flashdata('error', $this->config->item('login_failed'));

                redirect('login', '');

            }

            //}

            //$condition       = array('friendly_url'=>'login','status'=>'1');

            //$content         = $this->pages_model->get_cms_page( $condition );

            //$data['page_content'] = $content;

            $data['heading_title'] = "Login";

            $this->load->view('users_login', $data);

        } else {

            redirect('members/myaccount', 'refresh');

        }

    }

    public function login()
    {

        if (!$this->auth->is_user_logged_in()) {

            $this->form_validation->set_rules('login_email', 'Email ID', 'trim|required|valid_email');

            $this->form_validation->set_rules('login_password', 'Password', 'trim|required|');

            //$this->form_validation->set_rules('user', 'User', 'trim');

            if ($this->form_validation->run() == true) {

                $username = $this->input->post('login_email');

                $password = $this->input->post('login_password');

                $rember = ($this->input->post('remember') != "") ? true : false;

                if ($this->input->post('remember') == "Y") {

                    set_cookie('userName', $this->input->post('login_email'), time() + 60 * 60 * 24 * 30);

                    set_cookie('pwd', $this->input->post('login_password'), time() + 60 * 60 * 24 * 30);

                } else {

                    delete_cookie('userName');

                    delete_cookie('pwd');

                }

                $this->auth->verify_user($username, $password);

                if ($this->auth->is_user_logged_in()) {

                    /* Saving Login Ip Address */

                    $ip_array = array(

                        'member_id' => $this->session->userdata('user_id'),

                        'ip_address' => $_SERVER['REMOTE_ADDR'],

                    );

                    $insId = $this->users_model->safe_insert('wl_ip_details', $ip_array, false);

                    /* End Here */

                    $ref = $this->session->userdata('ref');

                    $this->session->unset_userdata(array('ref' => 0));

                    if ($ref != "") {

                        // redirect($ref, '');

                        echo 2;

                        die;

                    } else {

                        //redirect('members/myaccount', '');

                        echo 2;

                        die;

                    }

                } else {

                    //echo 3;die;

                    // $this->session->set_userdata(array('msg_type' => 'error'));

                    // $this->session->set_flashdata('error', $this->config->item('login_failed'));

                    // redirect('login', '');

                }

            } else {

                echo validation_errors();

                die;

            }

            //$condition       = array('friendly_url'=>'login','status'=>'1');

            //$content         = $this->pages_model->get_cms_page( $condition );

            //$data['page_content'] = $content;

            $data['heading_title'] = "Login";

            $this->load->view('users_login', $data);

        } else {

            //redirect('members/myaccount', 'refresh');

            echo 4;

        }

    }

    public function logout()
    {

        $data2 = array(

            'shipping_id' => 0,

            'coupon_id' => 0,

            'discount_amount' => 0,

        );

        $this->session->unset_userdata($data2);

        $this->session->unset_userdata(array("ref" => '0'));

        //$this->cart->destroy();

        $this->auth->logout();

        $this->session->set_userdata(array('msg_type' => 'success'));

        $this->session->set_flashdata('success', $this->config->item('member_logout'));

        redirect('users/register', '');

    }

    public function thanks()
    {

        $data['heading_title'] = "Thanks";

        $this->load->view('users_thanks', $data);

    }

    public function register()
    {

        if (!$this->auth->is_user_logged_in()) {

            if ($this->input->get_post('action') == 'register') {

                $this->form_validation->set_rules('first_name', 'First Name', 'trim|required|alpha|max_length[32]|xss_clean');

                $this->form_validation->set_rules('last_name', 'last Name', 'trim|required|alpha|max_length[32]|xss_clean');

                $this->form_validation->set_rules('gender', 'Gender', 'trim|required|xss_clean');

                $this->form_validation->set_rules('email_address', 'Email ID', 'trim|required|valid_email|max_length[80]|callback_email_check');

                $this->form_validation->set_rules('mobile_number', 'Mobile No', 'trim|required|numeric|max_length[10]|xss_clean');

                $this->form_validation->set_rules('password', 'Password', 'trim|required|max_length[20]|valid_password');

                $this->form_validation->set_rules('c_password', 'Confirm passsword', 'required|matches[password]');

                if ($this->form_validation->run() == true) {

                    $registerId = $this->users_model->create_user();

                    $first_name = $this->input->post('first_name', true);

                    //$last_name   = $this->input->post('last_name',TRUE);

                    $username = $this->input->post('email_address', true);

                    $password = $this->input->post('password', true);

                    if ($registerId != '') {

                        /* Send  mail to user */

                        $content = get_content('wl_auto_respond_mails', '1');

                        $subject = str_replace('{site_name}', $this->config->item('site_name'), $content->email_subject);

                        $body = $content->email_content;

                        $verify_url = "<a href=" . base_url() . "users/login>Click here </a>";

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

                            'to_email' => $this->input->post('email_address'),

                            'from_email' => $this->admin_info->admin_email,

                            'from_name' => $this->config->item('site_name'),

                            'body_part' => $body,

                        );

                        //$this->dmailer->mail_notify($mail_conf);

                        $this->mailer->sending_mail($mail_conf);

                        /* End send  mail to user */

                        /* Send  mail to admin */

                        $subject = 'New member is registered';

                        $body = '

              <table border="0" style="width:100%">

              <tbody>

                <tr>

                  <td colspan="2"><strong>Hi Admin,</strong></td>

                </tr>

                <tr>

                  <td colspan="2">You have new member registered on {site_name} with the following details:</td>

                </tr>

                <tr>

                  <td colspan="2">&nbsp;</td>

                </tr>

                <tr>

                  <td><strong>Email ID:</strong></td>

                  <td>{username}</td>

                </tr>

                <tr>

                  <td><strong>Password:</strong></td>

                  <td>{password}</td>

                </tr>

                <tr>

                  <td colspan="2">&nbsp;</td>

                </tr>

                <tr>

                  <td colspan="2">&nbsp;</td>

                </tr>

                <tr>

                  <td colspan="2">Thank you.<br />

                    {site_name} Customer Service<br />

                    Email: {admin_email}

                  </td>

                </tr>

                <tr>

                  <td colspan="2" style="text-align:center">&copy; ' . date('Y') . ' {site_name}. All rights reserved.</td>

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

                            'from_email' => $this->input->post('email_address'),

                            'from_name' => $this->config->item('site_name'),

                            'body_part' => $body,

                        );

                        //$this->dmailer->mail_notify($mail_conf);

                        $this->mailer->sending_mail($mail_conf);

                        /* End send  mail to admin */

                    }

                    $this->auth->verify_user($username, $password);

                    $message = $this->config->item('register_thanks');

                    $message = str_replace('<site_name>', $this->config->item('site_name'), $message);

                    // $this->session->set_userdata(array('msg_type'=>'success'));

                    $this->session->set_flashdata('success', $message);

                    //$cart_items='';

                    if ($this->cart->contents() != "" && count($this->cart->contents()) > 0) {

                        redirect('cart', '');

                    } else {

                        redirect('members/myaccount', '');

                    }

                }

            } elseif ($this->input->get_post('action') == 'login') {

                $this->form_validation->set_rules('login_email', 'Email ID', 'trim|required|valid_email');

                $this->form_validation->set_rules('login_password', 'Password', 'trim|required|');

                if ($this->form_validation->run() == true) {

                    $username = $this->input->post('login_email');

                    $password = $this->input->post('login_password');

                    $rember = ($this->input->post('remember') != "") ? true : false;

                    if ($this->input->post('remember') == "Y") {

                        set_cookie('userName', $this->input->post('login_email'), time() + 60 * 60 * 24 * 30);

                        set_cookie('pwd', $this->input->post('login_password'), time() + 60 * 60 * 24 * 30);

                    } else {

                        delete_cookie('userName');

                        delete_cookie('pwd');

                    }

                    $this->auth->verify_user($username, $password);

                    if ($this->auth->is_user_logged_in()) {

                        /* Saving Login Ip Address */

                        $ip_array = array(

                            'member_id' => $this->session->userdata('user_id'),

                            'ip_address' => $_SERVER['REMOTE_ADDR'],

                        );

                        $insId = $this->users_model->safe_insert('wl_ip_details', $ip_array, false);

                        /* End Here */

                        $ref = $this->session->userdata('ref');

                        $this->session->unset_userdata(array('ref' => 0));

                        if ($this->cart->total() > 0) {

                            redirect('cart/delivery_info', '');

                        }

                        if ($ref != "") {

                            redirect($ref, '');

                        } else {

                            redirect('members/myaccount', '');

                        }

                    } else {

                        $this->session->set_userdata(array('msg_type' => 'validation'));

                        $this->session->set_flashdata('validation', $this->config->item('login_failed'));

                        redirect('register', '');

                    }

                }

            }

            $data['heading_title'] = "Register";

            $data['unq_section'] = "Register";

            $this->load->view('users_register', $data);

        } else {

            redirect('members/myaccount', 'refresh');

        }

    }

    public function email_check()
    {

        $email = $this->input->post('email_address');

        if ($this->users_model->is_email_exits(array('user_name' => $email))) {

            $this->form_validation->set_message('email_check', $this->config->item('exists_user_id'));

            return false;

        } else {

            return true;

        }

    }

    public function valid_captcha_code($verification_code)
    {

        if ($this->securimage_library->check($verification_code) == true) {

            return true;

        } else {

            $this->form_validation->set_message('valid_captcha_code', 'The Word verification code you have entered is invalid.');

            return false;

        }

    }

    public function verify()
    {

        $this->users_model->activate_account($this->uri->segment(3));

    }

}

/* End of file users.php */

/* Location: ./application/modules/users/controller/users.php */
