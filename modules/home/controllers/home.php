<?php

class Home extends Public_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('home/home_model', 'products/product_model', 'users/users_model', 'members/members_model'));
        $this->load->model(array('sitepanel/setting_model'));
        $this->load->helper(array('products/product'));
        $this->lang->load('portuguese', 'portuguese');
        $this->load->library(array('safe_encrypt', 'securimage_library', 'Auth', 'Dmailer', 'cart'));
    }

    public function index()
    {
        $data['page_title'] = "";
        $data['page_keyword'] = "";
        $data['page_description'] = "";
        $content = "";

        //Check if it is subdomain
        $uri_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $uri_segments = explode('/', $uri_path);
        $st = $uri_segments[1];
        if (strstr($st, '.html')) {
            $st = substr($st, 0, -5);
        }
        $stArray = $this->db->query("SELECT meta_id, page_url FROM wl_meta_tags WHERE is_fixed='L' AND page_url='" . $st . "'")->row_array();
        if (is_array($stArray) & !empty($stArray)) {
            $locId = $stArray['meta_id'];
            $resprosub = $this->db->query("SELECT * FROM wl_subloccontent WHERE status = '1' AND FIND_IN_SET($locId,location_id)")->row();
            
            if (is_object($resprosub) && !empty($resprosub)) {
                $key1 = $resprosub->meta_key1;
                $key2 = $resprosub->meta_key2;
                $key3 = $resprosub->meta_key3;
                $content = str_replace('{location}', ucwords(locationName($st)), str_replace('{key3}', $key3, str_replace('{key2}', $key2, str_replace('{key1}', $key1, $resprosub->description))));
            } 
        }

        //Pass to view
        $data['content'] = $content;

        $data['new_products'] = $this->get_product_new_list();
        $data['latest_products'] = $this->get_product_popular();
        $data['seller_products'] = $this->get_seller_product_list();
        $data['special_products'] = $this->get_special_product_list();
        $data['coming_products'] = $this->get_coming_product_list();

        //banners
        $data['banner'] = $this->db->query("SELECT * FROM wl_banners WHERE status = '1'")->result_array();
        $data['upper'] = $this->db->query("SELECT * FROM wl_banners WHERE status = '1' AND banner_position = 'Index Uppper 1'")->result_array();
        $data['upper1'] = $this->db->query("SELECT * FROM wl_banners WHERE status = '1' AND banner_position = 'Index Uppper 2'")->result_array();
        $data['lower'] = $this->db->query("SELECT * FROM wl_banners WHERE status = '1' AND banner_position = 'Index Bottom'")->result_array();
        //blog
        $data['blog'] = $this->db->query("SELECT * FROM wl_blog WHERE status = '1' order by article_id LIMIT 0,3")->result_array();
        //home page content
        $data['home_res'] = $this->db->query("SELECT * FROM wl_cms_pages WHERE page_id = '13'")->result_array();

        $data['new_pro'] = $this->db->query("SELECT * FROM wl_categories WHERE status = '1' AND parent_id='1' ORDER BY sort_order limit 5")->result_array();

        $data['blog'] = $this->db->query("SELECT * FROM wl_blog order by article_id DESC limit 0,3")->result_array();
		
		

        $this->load->view('home', $data);
    }

    public function get_seller_product_list()
    {
        $this->load->model('products/product_model');
        $condtion['status'] = '1';
        $condtion['where'] = "bestseller_product = '1'";
        $condtion['orderby'] = 'products_id DESC';
        $product_list = $this->product_model->get_products('', '', $condtion);
        //echo_sql();
        return $product_list;
    }

    public function get_special_product_list()
    {
        $this->load->model('products/product_model');
        $condtion['status'] = '1';
        $condtion['where'] = "special_product = '1'";
        $condtion['orderby'] = 'products_id DESC';
        $product_list = $this->product_model->get_products('', '', $condtion);
        //echo_sql();
        return $product_list;
    }

    public function get_coming_product_list()
    {
        $this->load->model('products/product_model');
        $condtion['status'] = '1';
        $condtion['where'] = "coming_product = '1'";
        $condtion['orderby'] = 'products_id DESC';
        $product_list = $this->product_model->get_products('', '', $condtion);
        //echo_sql();
        return $product_list;
    }

    public function get_product_new_list()
    {
        $condtion['status'] = '1';
        $condtion['where'] = "newarrival_product = '1'";
        $condtion['orderby'] = 'products_id DESC';
        $product_list = $this->product_model->get_products('10', '0', $condtion);
        return $product_list;
    }

    public function get_product_popular()
    {
        $condtion['status'] = '1';
        $condtion['where'] = "popular_product = '1'";
        $condtion['orderby'] = 'products_id DESC';
        $product_list = $this->product_model->get_products(3, '0', $condtion);
        return $product_list;
    }

    public function add_newsletter_member($email, $name = null)
    {

        $query = $this->db->query("SELECT * FROM wl_newsletters  WHERE subscriber_email='" . $email . "' ");
        if ($query->num_rows() > 0) {
            $row = $query->row_array();
            if ($row['status'] == 1) {
                $error_type = "error";
                $error_msg = $this->config->item('newsletter_already_subscribed');
            } else {
                $where = "subscriber_email = '" . $row['subscriber_email'] . "'";
                $this->safe_update('wl_newsletters', array('status' => '1'), $where, false);

                $error_type = "success";
                $error_msg = $this->config->item('newsletter_subscribed');
            }
        } else {
            $data = array('status' => '1',
                'subscriber_name' => $name,
                'subscriber_email' => $email,
                'subscribe_date' => $this->config->item('config.date.time'),
            );
            $this->home_model->safe_insert('wl_newsletters', $data);
        }
    }

    public function set_currency()
    {
        $currId = (int) $this->uri->segment(3);
        $this->session->set_userdata('currency_id', $currId);
        redirect($_SERVER['HTTP_REFERER'], 'refresh');
    }

    public function set_location()
    {
        $locId = (int) $this->uri->segment(3);
        $this->session->set_userdata('location_id', $locId);
        redirect($_SERVER['HTTP_REFERER'], 'refresh');
    }

    public function set_language()
    {
        $locId = $this->uri->segment(3);
        $this->session->unset_userdata('lang', '0');
        $this->session->unset_userdata('field_type', '');
        $this->session->set_userdata('lang', $locId);
        if ($locId == 'p') {
            $this->session->set_userdata('field_type', '_p');
        }
        redirect($_SERVER['HTTP_REFERER'], 'refresh');
    }

    public function set_sessions()
    {
        $ref = $this->input->get_post('ref');
        $p1 = $this->input->get_post('p1');
        $p2 = $this->input->get_post('p2');
        $p3 = $this->input->get_post('p3');

        $this->session->set_userdata('ref', $ref);
        if ($ref == 'buckets') {
            $this->session->set_userdata('destination', $p1);
            $this->session->set_userdata('start', $p2);
        }
        if ($ref == 'tripSearch') {
            $this->session->set_userdata('theme', $p1);
            $this->session->set_userdata('start', $p2);
            $this->session->set_userdata('zone', $p3);
        }
        echo $this->session->userdata('ref');
    }

    public function search_products()
    {
        $keyword = $this->input->post('keyword');
        $where = "";
        $qry = "SELECT p.friendly_url, p.product_name, pm.media from wl_products p LEFT JOIN wl_products_media as pm ON p.products_id=pm.products_id where p.status='1' and (p.product_name LIKE '%" . $keyword . "%' OR p.product_code LIKE '%" . $keyword . "%') AND pm.is_default = 'Y' $where group by p.products_id";
        $products = $this->db->query($qry)->result_array();
        if (count($products) > 0) {
            ?>
      <ul class="searching_listing" style="margin-bottom: 0;border: 1px solid gray;padding: 10px; z-index: 999999 !important;">
      <?php foreach ($products as $prod) {?>
          <li style=" float: none !important; margin-left: 0px !important; padding: 5px; cursor: pointer;" onclick="window.location.href = '<?php echo base_url($prod['friendly_url']); ?>'">
            <img src="<?php echo get_image('product_images', $prod['media'], '50', '50', 'R'); ?>" width="32" height="32"> &nbsp; <?php echo $prod['product_name']; ?>
          </li>
          <?php
}
            echo "</ul>";
        } else {
            ?>
        <ul class="searching_listing" style="margin-bottom: 0; width: 100%; border: 1px solid gray;padding: 10px; z-index: 999999 !important;">
          <li style="width: 99%;">No Product Found</li>
        </ul>
        <?php
}
    }

    public function post_newsletter()
    {
        $email = $this->input->get_post('email');

        $query = $this->db->query("SELECT subscriber_email,status FROM  tbl_newsletters WHERE subscriber_email='$email'");
        $subscribe_me = 'Y';

        if ($query->num_rows() > 0) {
            $row = $query->row_array();
            if ($row['status'] == '0' && ($subscribe_me == 'Y')) {
                $where = "subscriber_email = '" . $row['subscriber_email'] . "'";
                $this->pages_model->safe_update('tbl_newsletters', array('status' => '1'), $where, false);
                $msg = $this->config->item('newsletter_subscribed');
                echo $msg;
            } else if ($row['status'] == '0' && ($subscribe_me == 'N')) {
                $msg = $this->config->item('newsletter_not_subscribe');
                echo $msg;
            } else if ($row['status'] == '1' && ($subscribe_me == 'Y')) {
                $msg = $this->config->item('newsletter_already_subscribed');
                echo $msg;
            } else if ($row['status'] == '1' && ($subscribe_me == 'N')) {
                $where = "subscriber_email = '" . $row['subscriber_email'] . "'";
                $this->pages_model->safe_update('tbl_newsletters', array('status' => '0'), $where, false);
                $msg = $this->config->item('newsletter_unsubscribed');
                echo $msg;
            }
        } else {
            if ($subscribe_me == 'N') {
                $msg = $this->config->item('newsletter_not_subscribe');
                echo $msg;
            } else {
                $data = array('status' => '1', 'subscriber_email' => $email);
                $this->home_model->safe_insert('tbl_newsletters', $data);
                $msg = $this->config->item('newsletter_subscribed');
                echo $msg;
            }
        }
    }

    public function recoverPassword()
    {
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
                'body_part' => $body,
            );
            //trace($mail_conf);
            @$this->dmailer->mail_notify($mail_conf);

            $data['message'] = $this->config->item('forgot_password_success');
            $data['success'] = true;
        } else {
            $data['error'] = $this->config->item('email_not_exist');
            $data['success'] = false;
        }

        echo json_encode($data);
    }

    //Old Way
    public function logIn()
    {
        $this->form_validation->set_rules('username', 'Email ID', 'trim|required|valid_email');
        if ($this->input->post('login_type') == 'normal' || $this->input->post('login_type') == '') {
            $this->form_validation->set_rules('password', 'Password', 'trim|required|');
        }
        //$this->form_validation->set_rules('user', 'User', 'trim');
        if ($this->form_validation->run() == true) {
            $username = $this->input->post('username');
            $password = $this->input->post('password');
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
                        'logged_in' => true,
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

    //OLD Way
    public function registerMember()
    {
        $count = count_record("wl_customers", "user_name = '" . $this->input->post('email') . "'");
        if ($count > 0) {
            $data['error'] = "Email ID already Exists!";
            $data['success'] = false;
        } else {
            $postData = $this->input->post();
            $username = $postData['email'];
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
                        'logged_in' => true,
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
    public function register_member_mail($postData)
    {
        $registeredId = $this->users_model->create_user_json($postData);
        $username = $postData['email'];
        $password = $postData['password'];

        //Mail to user if user registered as a normal User
        if ($postData['login_type'] == 'normal' || $postData['login_type'] == '') {
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
                'body_part' => $body,
            );
            //trace($mail_conf);
            @$this->dmailer->mail_notify($mail_conf);
        }

        /* Send  mail to admin */
        $subject = ($postData['login_type'] == 'normal' || $postData['login_type'] == '') ? 'New member is registered' : 'New member is registered with ' . $this->input->get_post('login_type');

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
            'body_part' => $body,
        );
        //trace($mail_conf);
        @$this->dmailer->mail_notify($mail_conf);
        /* End send  mail to admin */

        return $registeredId;
    }

    public function member_exists($email)
    {
        $count = count_record("wl_customers", "email = '" . $email . "'");
        if ($count > 0) {
            return 1;
        } else {
            return 0;
        }
        echo my_json_encode($data);
    }

}
