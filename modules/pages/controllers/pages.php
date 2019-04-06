<?php



class Pages extends Public_Controller

{



    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('file', 'currency'));
        $this->load->library(array('Dmailer', 'safe_encrypt'));
        $this->load->model(array('pages/pages_model', 'members/members_model'));
        $this->lang->load('portuguese', 'portuguese');
        $this->form_validation->set_error_delimiters("<div class='required red'>", "</div>");
        $this->page_section_ct = 'static';
    }



    public function index()
    {
        $friendly_url = $this->uri->uri_string;
        $condition = array('friendly_url' => $friendly_url, 'status' => '1');
        $content = $this->pages_model->get_cms_page($condition);
        $data['content'] = $content;
        $this->load->view('pages/cms_page_view', $data);
    }



    public function aboutus()
    {
        $friendly_url = $this->uri->uri_string;
        $condition = array('friendly_url' => $friendly_url, 'status' => '1');
        $content = $this->pages_model->get_cms_page($condition);
        $data['content'] = $content;
        $data['banner'] = get_db_field_value("wl_banners", "banner_image", "WHERE banner_page='about' ORDER BY RAND()");
        $this->load->view('pages/about-us', $data);
    }



    public function achievements()

    {

        $friendly_url = $this->uri->uri_string;

        $condition = array('friendly_url' => $friendly_url, 'status' => '1');

        $content = $this->pages_model->get_cms_page($condition);

        $data['content'] = $content;

        $this->load->view('pages/our-achievements', $data);

    }



    public function contactus()

    {



        $this->form_validation->set_rules('name', 'Your Name', 'trim|required');

        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');

        $this->form_validation->set_rules('phone', 'Phone Number', 'trim|required');

        $this->form_validation->set_rules('country', 'Country', 'trim|required');

        $this->form_validation->set_rules('message', 'Comment', 'trim|required');

        $this->form_validation->set_rules('verification_code', 'Verification code', 'trim|required|valid_captcha_code');



        if ($this->form_validation->run() == true) {



            $posted_data = array(

                'type' => '3',

                'first_name' => $this->input->post('name'),

                'last_name' => '',

                'email' => $this->input->post('email'),

                'phone_number' => $this->input->post('phone'),

                'mobile_number' => '',

                'country' => $this->input->post('country'),

                'message' => $this->input->post('message'),

                'receive_date' => $this->config->item('config.date.time'),

            );

            $this->pages_model->safe_insert('wl_enquiry', $posted_data, false);



            //Mail

            $subject = 'New query have been posted on mercadomoz.com';

            $content = get_content('wl_auto_respond_mails', '5');

            $body = $content->email_content;

            $body = str_replace('{mem_name}', $this->input->post('name'), $body);

            $body = str_replace('{email}', $this->input->post('email'), $body);

            $body = str_replace('{phone}', $this->input->post('phone'), $body);

            $body = str_replace('{country}', $this->input->post('country'), $body);

            $body = str_replace('{message}', $this->input->post('message'), $body);

            $body = str_replace('{site_name}', $this->config->item('site_name'), $body);

            //$body = str_replace('{admin_email}', $this->config->item('site_name'), $body);

            $mail_conf = array(

                'subject' => "Enquiry from " . ucwords($this->input->post('name')) . " ",

                'to_email' => "shashikant@webpulseindia.com",

                'from_email' => $this->input->post('email'),

                'from_name' => $this->input->post('name'),

                'body_part' => $body,

            );

            //trace($mail_conf);

            //exit;

            $this->dmailer->mail_notify($mail_conf);



            $msg = "Your request has been sent successfully ! We will get back to you shortly !";

            $this->session->set_userdata(array('msg_type' => 'success'));

            $this->session->set_flashdata('success', $msg);

            redirect(base_url('contact-us#contactusform'));

        }



        $data['title'] = "Contact Us";

        $this->load->view('contactus', $data);

    }



    public function bulk_orders()

    {

        $this->form_validation->set_rules('product', 'Product', 'trim|required');

        $this->form_validation->set_rules('name', 'Your Name', 'trim|required');

        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');

        $this->form_validation->set_rules('phone', 'Phone Number', 'trim|required');

        $this->form_validation->set_rules('country', 'Country', 'trim|required');

        $this->form_validation->set_rules('message', 'Comment', 'trim|required');



        if ($this->form_validation->run() == true) {



            $posted_data = array(

                'product_id' => $this->input->post('product'),

                'first_name' => $this->input->post('name'),

                'last_name' => '',

                'email' => $this->input->post('email'),

                'phone_number' => $this->input->post('phone'),

                'mobile_number' => '',

                'country' => $this->input->post('country'),

                'message' => $this->input->post('message'),

                'receive_date' => $this->config->item('config.date.time'),

            );

            $this->pages_model->safe_insert('wl_enquiry', $posted_data, false);



            //Mail

            $subject = 'New bulk order query have been posted on D-Magine.com';

            $content = get_content('wl_auto_respond_mails', '5');

            $body = $content->email_content;

            $body = str_replace('{name}', $this->input->post('name'), $body);

            $body = str_replace('{email}', $this->input->post('email'), $body);

            $body = str_replace('{phone}', $this->input->post('phone_number'), $body);

            $body = str_replace('{country}', $this->input->post('country'), $body);

            $body = str_replace('{comment}', $this->input->post('message'), $body);

            $body = str_replace('{site_name}', $this->config->item('site_name'), $body);

            $mail_conf = array(

                'subject' => "Enquiry from " . ucwords($this->input->post('name')) . " ",

                'to_email' => " demo@gmail.com",

                'from_email' => $this->input->post('email'),

                'from_name' => $this->input->post('name'),

                'body_part' => $body,

            );

            //trace($mail_conf);

            //exit;

            $this->dmailer->mail_notify($mail_conf);



            $msg = "Your request has been sent successfully ! We will get back to you shortly !";

            $this->session->set_userdata(array('msg_type' => 'success'));

            $this->session->set_flashdata('success', $msg);

            redirect(base_url('contactus#contactusform'));

        }

        $data['products'] = $this->db->query("SELECT products_id, product_name FROM wl_products WHERE status = '1'")->result_array();

        $data['title'] = "Bulk Order";

        $this->load->view('bulk_orders', $data);

    }



    public function sitemap()

    {

        $data['title'] = "Sitemap";

        $this->load->view('sitemap', $data);

    }



    public function connect()

    {

        $data = array();

        $resCrafter = array();

        $res = array();



        $strQr = $ageStart = $ageEnd = "";

        //Solo Travelers

        $condtion = array();

        $pagesize = (int) $this->input->get_post('pagesize');

        $config['limit'] = ($pagesize > 0) ? $pagesize : 24;

        $page_segment = find_paging_segment();

        $offset = (int) $this->uri->segment($page_segment, 0);

        $base_url = $base_url = "pages/connect/pg/";



        $status = $this->input->get_post('status', true);

        if ($status != '') {

            $condtion['status'] = $status;

        }



        $country = $this->input->get_post('country', true);

        if ($country != '') {

            $condtion['country'] = $country;

        }



        $state = $this->input->get_post('state', true);

        if ($state != '') {

            $condtion['state'] = $state;

        }



        $category = $this->input->get_post('category', true);

        if ($category != '') {

            $condtion['category'] = $category;

        }



        $age = $this->input->get_post('age', true);

        if ($age != '') {

            $ageStart = date("Y", mktime(0, 0, 0, date('d'), date('m'), date('Y') - $age));

            $condtion['age'] = $ageStart;

        }



        $gender = $this->input->get_post('gender', true);

        if ($gender != '') {

            $condtion['gender'] = $gender;

        }



        //Travel category

        $resultPassion = $this->user_category_model->get_usercat($opts = array());

        $data['Usercatlist'] = array();

        if (is_array($resultPassion) && !empty($resultPassion)) {

            $data['Usercatlist'] = $resultPassion;

        }



        $res_array = $this->members_model->get_members($config['limit'], $offset, $condtion); //echo_sql();

        $total_record = get_found_rows();

        $data['total_rows'] = $total_record;

        $data['page_links'] = front_pagination($base_url, $total_record, $config['limit'], $page_segment);

        //End Here



        $data['soloRes'] = $res_array;



        $data['title'] = "Connect";

        $this->load->view('pages/connect', $data);

    }



    public function thanks()

    {

        $data['heading_title'] = "Thanks";

        $this->load->view('pages/thanks', $data);

    }



    public function page_not_found()

    {

        $this->meta_info['meta_title'] = '404 page not found';

        $this->load->view('pages/view_404'); //loading in my template

    }



    private function subscribe_newsletter($posted_data)

    {

        $query = $this->db->query("SELECT subscriber_email,status FROM  tbl_newsletters WHERE subscriber_email='$posted_data[subscriber_email]'");

        $subscribe_me = $posted_data['subscribe_me'];



        if ($query->num_rows() > 0) {

            $row = $query->row_array();

            if ($row['status'] == '0' && ($subscribe_me == 'Y')) {

                $where = "subscriber_email = '" . $row['subscriber_email'] . "'";

                $this->pages_model->safe_update('tbl_newsletters', array('status' => '1'), $where, false);

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

                $this->pages_model->safe_update('tbl_newsletters', array('status' => '0'), $where, false);

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



    public function newsletter()

    {

        $data['default_email_text'] = "Email Id";

        $this->form_validation->set_rules('subscriber_name', 'Name', 'trim|required|max_length[225]');

        $this->form_validation->set_rules('subscriber_email', 'Email', 'trim|required|valid_email|max_length[255]');

        $this->form_validation->set_rules('subscribe_me', 'Status', 'trim|required');

        $this->form_validation->set_rules('verification_code', 'Verification Code', 'trim|required|valid_captcha_code');

        if ($this->form_validation->run() == true) {

            $res = $this->pages_model->add_newsletter_member();

            $this->session->set_userdata('msg_type', $res['error_type']);

            $this->session->set_flashdata($res['error_type'], $res['error_msg']);

            redirect('pages/newsletter', '');

        }

        $this->load->view('view_subscribe_newsletter', $data);

    }



    public function join_newsletter()

    {

        $subscriber_name = $this->input->post('newsletter_name', true);

        $subscriber_email = $this->input->post('newsletter_email', true);



        $this->form_validation->set_rules('newsletter_name', 'Name', "trim|required|alpha|max_lenght[200]");

        $this->form_validation->set_rules('newsletter_email', 'Email ID', "trim|required|valid_email|max_lenght[80]");

        $this->form_validation->set_rules('newsletter_captcha', 'Verification code', 'trim|required|valid_captcha_code');



        if ($this->form_validation->run() == true) {

            $subscribe_me = $this->input->post('subscribe_me', true);



            $posted_data = array('subscriber_name' => $subscriber_name, 'subscriber_email' => $subscriber_email, 'subscribe_me' => $subscribe_me);

            $result = $this->subscribe_newsletter($posted_data);

            if ($result) {

                //echo '<div style="color:#009900">'.$result.'</div>';

                $res = array('error_type' => 'sucess', 'error_msg' => '<div style="color:#009900">' . $result . '</div>');

            }

        } else {

            //echo '<p style="color:#009900">'.validation_errors().'</p>';

            $res = array('error_type' => 'error', 'error_msg' => validation_errors());

        }



        echo json_encode($res);

        exit;

    }



    public function get_country()

    {

        $country = $this->db->query("SELECT id, country_name, status FROM tbl_country WHERE status ='1'")->result_array();

        //trace($country);

        $selVal = $this->input->get_post('selVal');

        $option = '<option value="">Select Country</option>';

        if (is_array($country) && !empty($country)) {

            foreach ($country as $key => $val) {

                $sel = ($selVal == $val['id']) ? 'selected="selected"' : '';

                $option .= '<option value="' . $val["id"] . '" ' . $sel . '>' . $val["country_name"] . '</option>';

            }

        }

        echo $option;

    }



    public function get_state()

    {

        $count_id = (int) $this->input->get_post('country_id');

        $selVal = $this->input->get_post('selVal');

        $strQry = ($count_id > 0) ? " AND country_id ='" . $count_id . "'" : '';

        $state = $this->db->query("SELECT id, country_id, title, status FROM tbl_states WHERE status ='1' $strQry")->result_array();

        $option = '<option value="">Choose State</option>';



        if (is_array($state) && !empty($state)) {

            $result = array();

            foreach ($state as $key => $val) {

                $sel = ($selVal == $val['id']) ? 'selected="selected"' : '';

                $option .= '<option value="' . $val["id"] . '" ' . $sel . '>' . $val["title"] . '</option>';

            }

        }

        echo $option;

    }



    public function get_city()

    {

        $selVal = $this->input->get_post('selVal');

        $state_id = (int) $this->input->get_post('state_id');

        $strQry = ($state_id > 0) ? " AND state_id  ='" . $state_id . "'" : '';

        $city = $this->db->query("SELECT id, state_id, country_id, title, status FROM tbl_city WHERE status ='1' $strQry")->result_array();

        $option = '<option value="">Choose City</option>';



        if (is_array($city) && !empty($city)) {

            $result = array();

            foreach ($city as $key => $val) {

                $sel = ($selVal == $val['id']) ? 'selected="selected"' : '';

                $option .= '<option value="' . $val["id"] . '" ' . $sel . '>' . $val["title"] . '</option>';

            }

        }

        echo $option;

    }



    public function verify_otp()

    {

        $sent_otp_id = $this->input->post('sent_otp_id');

        $user_otp = $this->input->post('user_otp');



        if (($user_otp != "") && ($sent_otp_id != "")) {

            $match_otp = $this->db->get_where('tbl_sent_otp', array('otp_id' => $sent_otp_id, 'otp' => $user_otp))->row_array();

            if (count($match_otp) > 0) {

                echo 'success';

            } else {

                echo 'failed';

            }

        } else {

            echo "wrong";

        }

    }

    public function marketarea()

    {

        $data = array();



        $data['country'] = $this->db->query("SELECT id, country_name, country_temp_name, status FROM tbl_country WHERE status ='1'")->result_array();



        $data['state'] = $this->db->query("SELECT id, temp_title, country_id, title, status FROM tbl_states WHERE status ='1'")->result_array();



        $this->load->view('marketarea', $data);

    }



}



/* End of file pages.php */

