<?php

class Cart extends Public_Controller
{

    public function __construct()
    {

        parent::__construct();

        $this->load->helper(array('cart', 'products/product'));

        $this->load->model(array('products/product_model', 'members/members_model', 'cart_model'));

        $this->load->library(array('safe_encrypt', 'securimage_library', 'Auth'));

        $this->lang->load('portuguese', 'portuguese');

        $this->form_validation->set_error_delimiters("<div class='required fs12'>", "</div>");

        $this->page_section_ct = 'common';

    }

    public function index()
    {

        $order_cart_id = $this->session->userdata('working_order_id');

        if ($order_cart_id != '') {

            $this->session->unset_userdata('working_order_id');

        }

        if ($this->input->post('EmptyCart') != "") {

            $this->empty_cart();

            $this->session->set_userdata(array('msg_type' => 'success'));

            $this->session->set_flashdata('success', $this->config->item('cart_empty'));

            redirect('cart');

        }

        //cart Items

        //trace($this->cart->contents());

        $tax_cent = $this->cart_model->get_vat();

        $data['tax_cent'] = $tax_cent;

        $data['title'] = "Shopping Cart";

        $this->load->view('view_my_cart', $data);

    }

    public function make_payment()
    {

        $posted_data = $this->session->userdata('posted_data');

        $data['posted_data'] = $posted_data;

        $data['mtitle'] = $this->config->item('titleArray');

        if (is_array($posted_data) && !empty($posted_data) && $this->cart->total_items() > 0 && $this->input->get_post('pay') != '') {

            $posted_data['cod_amount'] = 0.00;

            $costumer_data['shipping_amount'] = 0.00;

            if ($this->input->get_post('pay') == 'COD') {

                $posted_data['cod_amount'] = '50.00';

            }

            if ($posted_data['country'] != 'India') {

                $posted_data['shipping_amount'] = '30.00';

            }

            $posted_data['payment_mode'] = $this->input->get_post('pay');

            $posted_data['pickup_point'] = $this->input->get_post('pickup_point');

            //trace($posted_data);exit;

            $this->add_customer_order($posted_data, $this->session->userdata('is_same_bill_ship'));

            $this->session->unset_userdata('posted_data');

            $this->session->unset_userdata('email');

            $this->session->unset_userdata('is_same_bill_ship');

            redirect('payment?pay_method=' . $this->input->get_post('pay'));

        }

        $this->load->view('view_make_payment', $data);

    }

    public function checkout()
    {

        if (!$this->cart->total_items() > 0) {

            redirect('products');

        }

        if (!$this->auth->is_user_logged_in()) {

            $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|xss_clean|max_length[80]');

            if ($this->input->post('checkout_type') == 'User') {

                $this->form_validation->set_rules('password', 'Password', 'trim|required');

            }

            if ($this->form_validation->run() == true) {

                $username = $this->input->post('email');

                if ($this->input->post('checkout_type') == 'User') {

                    $password = $this->input->post('password');

                    //   $rember    =  ($this->input->post('remember')!="") ? TRUE : FALSE;

                    if ($this->input->post('remember') == "Y") {

                        set_cookie('userName', $this->input->post('email'), time() + 60 * 60 * 24 * 30);

                        set_cookie('pwd', $this->input->post('password'), time() + 60 * 60 * 24 * 30);

                    } else {

                        delete_cookie('userName');

                        delete_cookie('pwd');

                    }

                    $this->auth->verify_user($username, $password);

                    if ($this->auth->is_user_logged_in()) {

                        redirect('cart/delivery_info', '');

                    } else {

                        $this->session->set_userdata(array('msg_type' => 'error'));

                        $this->session->set_flashdata('error', $this->config->item('login_failed'));

                        redirect('cart/checkout', '');

                    }

                } else {

                    $this->session->set_userdata('username', $username);

                    redirect('cart/delivery_info', '');

                }

            } else {

                $data['title'] = "Checkout Info";

                $this->load->view('view_cart_checkout', $data);

            }

        } else {

            redirect('cart/delivery_info', '');

        }

    }

    public function delivery_info()
    {

        if (!$this->cart->total_items() > 0) {

            redirect('products');

        }

        //if (!$this->auth->is_user_logged_in() && $this->input->post('email')=='') {

        //redirect('cart');

        //}

        // trace($this->input->post());

        $data['title'] = 'Delivery Information';

        //trace($this->session->userdata);

        $is_same_bill_ship = $this->input->post('is_same', true);

        $mres = $this->members_model->get_member_row($this->session->userdata('user_id'));

        if (is_array($mres) && !empty($mres)) {

            $email = $mres['user_name'];

        } else {

            $email = $this->session->userdata['username'];

        }

        //Shipping validation

        //$this->form_validation->set_rules('mtitle', 'Shipping Name Title', 'trim|required');

        $this->form_validation->set_rules('ship_name', 'Shipping Name', 'trim|required|alpha|max_length[160]');

        $this->form_validation->set_rules('ship_mobile', 'Ship Mobile No.', 'trim|required|max_length[20]');

        $this->form_validation->set_rules('ship_address', 'Shipping Address', 'trim|required|max_length[200]');

        $this->form_validation->set_rules('ship_lmark', 'Shipping Landmark', 'trim|max_length[160]');

        $this->form_validation->set_rules('ship_city', 'Shipping City', 'trim|required|max_length[40]');

        //$this->form_validation->set_rules('ship_pin', 'Pin Code', 'trim|required|max_length[20]');

        $this->form_validation->set_rules('ship_state', 'Shipping State', 'trim|required|max_length[40]');

        $this->form_validation->set_rules('idcard_no', 'ID Card No', 'trim|required|max_length[40]');

        $this->form_validation->set_rules('ship_country', 'Shipping Country', 'trim|required|max_length[80]');

        //Billing validation

        //$this->form_validation->set_rules('bmtitle', 'Billing Name Title', 'trim|required');

        $this->form_validation->set_rules('bil_name', 'Billing Name', 'trim|required|alpha|max_length[160]');

        $this->form_validation->set_rules('bil_mobile', 'Billing Mobile No.', 'trim|required|max_length[20]');

        $this->form_validation->set_rules('bil_address', 'Billing Address', 'trim|required|max_length[200]');

        $this->form_validation->set_rules('bil_lmark', 'Billing Landmark', 'trim|max_length[160]');

        $this->form_validation->set_rules('bil_city', 'Billing City', 'trim|required|max_length[40]');

        //$this->form_validation->set_rules('bil_pin', 'Billing Pin Code', 'trim|required|max_length[20]');

        $this->form_validation->set_rules('bil_state', 'Billing State', 'trim|required|max_length[40]');

        $this->form_validation->set_rules('bil_country', 'Billing Country', 'trim|required|max_length[80]');

        $name = $this->input->post('name') . ' ' . $this->input->post('lname');

        $posted_data = array(

            'customer_id' => $this->session->userdata('user_id'),

            'mtitle' => '',

            'name' => $this->input->post('ship_name'),

            'mobile' => $this->input->post('ship_mobile'),

            'address' => $this->input->post('ship_address'),

            'landmark' => $this->input->post('ship_lmark'),

            'zipcode' => $this->input->post('ship_pin'),

            'country' => $this->input->post('ship_country'),

            'idcard_no' => $this->input->post('idcard_no'),

            'city' => $this->input->post('ship_city'),

            'state' => $this->input->post('ship_state'),

            'bmtitle' => $this->input->post('bmtitle'),

            'bil_name' => $this->input->post('bil_name'),

            'bil_mobile' => $this->input->post('bil_mobile'),

            'bil_address' => $this->input->post('bil_address'),

            'bil_landmark' => $this->input->post('bil_lmark'),

            'bil_zipcode' => $this->input->post('bil_pin'),

            'bil_country' => $this->input->post('bil_country'),

            'bil_city' => $this->input->post('bil_city'),

            'bil_state' => $this->input->post('bil_state'),

            'last_shopping_comment' => '',

        );

        if (is_array($mres) && !empty($mres)) {

            if ($this->form_validation->run() === false) {

                $mres_address = $this->db->query("select * from wl_customers_address_book where  customer_id='" . $mres['customers_id'] . "' AND address_type = 'Ship' order by address_id desc limit 0, 1")->row_array();

                $mres_address_bil = $this->db->query("select * from wl_customers_address_book where  customer_id='" . $mres['customers_id'] . "' AND address_type = 'Bill' order by address_id desc limit 0, 1")->row_array();

                //trace($mres_address);

                if (is_array($mres_address) && !empty($mres_address)) {

                    $mres = array(

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

                        //'idcard_no' => $mres_address['idcard_no'],

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

                        'last_shopping_comment' => '',

                    );

                } else {

                    $mres = array(

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

                        'idcard_no' => '',

                        'bil_name' => '',

                        'bil_mobile' => '',

                        'bil_address' => '',

                        'bil_landmark' => '',

                        'bil_zipcode' => '',

                        'bil_country' => '',

                        'bil_city' => '',

                        'bil_state' => '',

                        'bil_address_id' => '',

                        'last_shopping_comment' => '',

                    );

                }

                $data['mres'] = $mres;

                $this->load->view('view_cart_delivery', $data);

            } else {

                //Count Ship Address

                $shipAddRessCount = count_record('wl_customers_address_book', "customer_id = '" . $mres['customers_id'] . "' AND mobile = '" . $this->db->escape_str($this->input->post('ship_mobile')) . "' AND address = '" . $this->db->escape_str($this->input->post('ship_address')) . "' AND city = '" . $this->db->escape_str($this->input->post('ship_city')) . "' AND address_type = 'Ship'");

                if ($shipAddRessCount == 0) {

                    $name = $this->input->post('name') . ' ' . $this->input->post('lname');

                    $addressData = array(

                        'customer_id' => $mres['customers_id'],

                        //'mtitle' => '',

                        'first_name' => $this->input->post('ship_name'),

                        'mobile' => $this->input->post('ship_mobile'),

                        'address' => $this->input->post('ship_address'),

                        'landmark' => $this->input->post('ship_lmark'),

                        'zipcode' => $this->input->post('ship_pin'),

                        'country' => $this->input->post('ship_country'),

                        'city' => $this->input->post('ship_city'),

                        'state' => $this->input->post('ship_state'),

                        'address_type' => 'Ship',

                    );

                    $addressIDs = $this->cart_model->safe_insert('wl_customers_address_book', $addressData);

                }

                //Count Bill Address

                $shipAddRessCount = count_record('wl_customers_address_book', "customer_id = '" . $mres['customers_id'] . "' AND mobile = '" . $this->db->escape_str($this->input->post('bil_mobile')) . "' AND address = '" . $this->db->escape_str($this->input->post('bil_address')) . "' AND city = '" . $this->db->escape_str($this->input->post('bil_city')) . "' AND address_type = 'Bill'");

                if ($shipAddRessCount == 0) {

                    $name = $this->input->post('name') . ' ' . $this->input->post('lname');

                    $addressDataBill = array(

                        'customer_id' => $mres['customers_id'],

                        //'mtitle' => '',

                        'first_name' => $this->input->post('bil_name'),

                        'mobile' => $this->input->post('bil_mobile'),

                        'address' => $this->input->post('bil_address'),

                        'landmark' => $this->input->post('bil_lmark'),

                        'zipcode' => $this->input->post('bil_pin'),

                        'country' => $this->input->post('bil_country'),

                        'city' => $this->input->post('bil_city'),

                        'state' => $this->input->post('bil_state'),

                        'address_type' => 'Bill',

                    );

                    $addressIDs = $this->cart_model->safe_insert('wl_customers_address_book', $addressDataBill);

                }

                /* if ($this->input->post('default_address') != '') {

                $this->db->query("update wl_customers_address_book SET default_address = 'N' where customer_id = '" . $mres['customers_id'] . "'");

                $this->db->query("update wl_customers_address_book SET default_address = 'Y' where address_id = '" . $this->input->post('default_address') . "'");

                } */

                $shipcharge = 0;

                $cart_total = $this->cart->total();

                //$rate_dhl = $this->DHLShipPrice($totweight);

                $this->session->set_userdata('idcard_no', $this->input->post('idcard_no'));

                $this->session->set_userdata('posted_data', $posted_data);

                $this->session->set_userdata('is_same_bill_ship', $is_same_bill_ship);

                redirect('cart/make_payment');

                //   $this->add_customer_order($posted_data,$is_same_bill_ship);

            }

        } else {

            if ($this->form_validation->run() == false) {

                $data['mres'] = $posted_data;

                $this->load->view('view_cart_delivery', $data);

            } else {

                $shipcharge = 0;

                $cart_total = $this->cart->total();

                $this->session->set_userdata('posted_data', $posted_data);

                $this->session->set_userdata('is_same_bill_ship', $is_same_bill_ship);

                redirect('cart/make_payment');

                // $this->add_customer_order($posted_data,$is_same_bill_ship);

            }

        }

    }

    public function delivery_info1()
    {

        if (!$this->cart->total_items() > 0) {

            redirect('products');

        }

        // trace($this->input->post());

        $data['title'] = 'Delivery Information';

        //trace($this->session->userdata);

        $is_same_bill_ship = $this->input->post('is_same', true);

        $mres = $this->members_model->get_member_row($this->session->userdata('user_id'));

        if (is_array($mres) && !empty($mres)) {

            $email = $mres['user_name'];

        } else {

            $email = $this->session->userdata['username'];

        }

        //Shipping validation

        $this->form_validation->set_rules('mtitle', 'Shipping Name Title', 'trim|required');

        $this->form_validation->set_rules('ship_name', 'Shipping Name', 'trim|required|alpha|max_length[160]');

        $this->form_validation->set_rules('ship_mobile', 'Ship Mobile No.', 'trim|required|max_length[20]');

        $this->form_validation->set_rules('ship_address', 'Shipping Address', 'trim|required|max_length[200]');

        $this->form_validation->set_rules('ship_lmark', 'Shipping Landmark', 'trim|max_length[160]');

        $this->form_validation->set_rules('ship_city', 'Shipping City', 'trim|required|max_length[40]');

        $this->form_validation->set_rules('ship_pin', 'Pin Code', 'trim|required|max_length[20]');

        $this->form_validation->set_rules('ship_state', 'Shipping State', 'trim|required|max_length[40]');

        $this->form_validation->set_rules('ship_country', 'Shipping Country', 'trim|required|max_length[80]');

        //Billing validation

        $this->form_validation->set_rules('bmtitle', 'Billing Name Title', 'trim|required');

        $this->form_validation->set_rules('bil_name', 'Billing Name', 'trim|required|alpha|max_length[160]');

        $this->form_validation->set_rules('bil_mobile', 'Billing Mobile No.', 'trim|required|max_length[20]');

        $this->form_validation->set_rules('bil_address', 'Billing Address', 'trim|required|max_length[200]');

        $this->form_validation->set_rules('bil_lmark', 'Billing Landmark', 'trim|max_length[160]');

        $this->form_validation->set_rules('bil_city', 'Billing City', 'trim|required|max_length[40]');

        $this->form_validation->set_rules('bil_pin', 'Billing Pin Code', 'trim|required|max_length[20]');

        $this->form_validation->set_rules('bil_state', 'Billing State', 'trim|required|max_length[40]');

        $this->form_validation->set_rules('bil_country', 'Billing Country', 'trim|required|max_length[80]');

        $name = $this->input->post('name') . ' ' . $this->input->post('lname');

        $posted_data = array(

            'customer_id' => $this->session->userdata('user_id'),

            'mtitle' => $this->input->post('mtitle'),

            'name' => $this->input->post('ship_name'),

            'mobile' => $this->input->post('ship_mobile'),

            'address' => $this->input->post('ship_address'),

            'landmark' => $this->input->post('ship_lmark'),

            'zipcode' => $this->input->post('ship_pin'),

            'country' => $this->input->post('ship_country'),

            'city' => $this->input->post('ship_city'),

            'state' => $this->input->post('ship_state'),

            'bmtitle' => $this->input->post('bmtitle'),

            'bil_name' => $this->input->post('bil_name'),

            'bil_mobile' => $this->input->post('bil_mobile'),

            'bil_address' => $this->input->post('bil_address'),

            'bil_landmark' => $this->input->post('bil_lmark'),

            'bil_zipcode' => $this->input->post('bil_pin'),

            'bil_country' => $this->input->post('bil_country'),

            'bil_city' => $this->input->post('bil_city'),

            'bil_state' => $this->input->post('bil_state'),

            'last_shopping_comment' => $this->input->post('last_shopping_comment'),

        );

        if (is_array($mres) && !empty($mres)) {

            if ($this->form_validation->run() === false) {

                $mres_address = $this->db->query("select * from wl_customers_address_book where  customer_id='" . $mres['customers_id'] . "' AND address_type = 'Ship' order by address_id desc limit 0, 1")->row_array();

                $mres_address_bil = $this->db->query("select * from wl_customers_address_book where  customer_id='" . $mres['customers_id'] . "' AND address_type = 'Bill' order by address_id desc limit 0, 1")->row_array();

                //trace($mres_address);

                if (is_array($mres_address) && !empty($mres_address)) {

                    $mres = array(

                        'mtitle' => $mres_address['mtitle'],

                        'name' => $mres_address['first_name'],

                        'mobile' => $mres_address['mobile'],

                        'address' => $mres_address['address'],

                        'landmark' => $mres_address['landmark'],

                        'zipcode' => $mres_address['zipcode'],

                        'country' => $mres_address['country'],

                        'city' => $mres_address['city'],

                        'state' => $mres_address['state'],

                        'address_id' => $mres_address['address_id'],

                        'bmtitle' => $mres_address_bil['mtitle'],

                        'bil_name' => $mres_address_bil['first_name'],

                        'bil_mobile' => $mres_address_bil['mobile'],

                        'bil_address' => $mres_address_bil['address'],

                        'bil_landmark' => $mres_address_bil['landmark'],

                        'bil_zipcode' => $mres_address_bil['zipcode'],

                        'bil_country' => $mres_address_bil['country'],

                        'bil_city' => $mres_address_bil['city'],

                        'bil_state' => $mres_address_bil['state'],

                        'bil_address_id' => $mres_address_bil['address_id'],

                        'last_shopping_comment' => $this->input->post('last_shopping_comment'),

                    );

                } else {

                    $mres = array(

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

                        'bil_address_id' => '',

                        'last_shopping_comment' => '',

                    );

                }

                $data['mres'] = $mres;

                $this->load->view('view_cart_delivery', $data);

            } else {

                //Count Ship Address

                $shipAddRessCount = count_record('wl_customers_address_book', "customer_id = '" . $mres['customers_id'] . "' AND mobile = '" . $this->db->escape_str($this->input->post('ship_mobile')) . "' AND address = '" . $this->db->escape_str($this->input->post('ship_address')) . "' AND city = '" . $this->db->escape_str($this->input->post('ship_city')) . "' AND address_type = 'Ship'");

                if ($shipAddRessCount == 0) {

                    $name = $this->input->post('name') . ' ' . $this->input->post('lname');

                    $addressData = array(

                        'customer_id' => $mres['customers_id'],

                        'mtitle' => $this->input->post('mtitle'),

                        'first_name' => $this->input->post('ship_name'),

                        'mobile' => $this->input->post('ship_mobile'),

                        'address' => $this->input->post('ship_address'),

                        'landmark' => $this->input->post('ship_lmark'),

                        'zipcode' => $this->input->post('ship_pin'),

                        'country' => $this->input->post('ship_country'),

                        'city' => $this->input->post('ship_city'),

                        'state' => $this->input->post('ship_state'),

                        'address_type' => 'Ship',

                    );

                    $addressIDs = $this->cart_model->safe_insert('wl_customers_address_book', $addressData);

                }

                //Count Bill Address

                $shipAddRessCount = count_record('wl_customers_address_book', "customer_id = '" . $mres['customers_id'] . "' AND mobile = '" . $this->db->escape_str($this->input->post('bil_mobile')) . "' AND address = '" . $this->db->escape_str($this->input->post('bil_address')) . "' AND city = '" . $this->db->escape_str($this->input->post('bil_city')) . "' AND address_type = 'Bill'");

                if ($shipAddRessCount == 0) {

                    $name = $this->input->post('name') . ' ' . $this->input->post('lname');

                    $addressDataBill = array(

                        'customer_id' => $mres['customers_id'],

                        'mtitle' => $this->input->post('bmtitle'),

                        'first_name' => $this->input->post('bil_name'),

                        'mobile' => $this->input->post('bil_mobile'),

                        'address' => $this->input->post('bil_address'),

                        'landmark' => $this->input->post('bil_lmark'),

                        'zipcode' => $this->input->post('bil_pin'),

                        'country' => $this->input->post('bil_country'),

                        'city' => $this->input->post('bil_city'),

                        'state' => $this->input->post('bil_state'),

                        'address_type' => 'Bill',

                    );

                    $addressIDs = $this->cart_model->safe_insert('wl_customers_address_book', $addressDataBill);

                }

                /* if ($this->input->post('default_address') != '') {

                $this->db->query("update wl_customers_address_book SET default_address = 'N' where customer_id = '" . $mres['customers_id'] . "'");

                $this->db->query("update wl_customers_address_book SET default_address = 'Y' where address_id = '" . $this->input->post('default_address') . "'");

                } */

                $shipcharge = 0;

                $cart_total = $this->cart->total();

                //$rate_dhl = $this->DHLShipPrice($totweight);

                $this->session->set_userdata('posted_data', $posted_data);

                $this->session->set_userdata('is_same_bill_ship', $is_same_bill_ship);

                redirect('cart/make_payment');

                //   $this->add_customer_order($posted_data,$is_same_bill_ship);

            }

        } else {

            if ($this->form_validation->run() == false) {

                $data['mres'] = $posted_data;

                $this->load->view('view_cart_delivery', $data);

            } else {

                $shipcharge = 0;

                $cart_total = $this->cart->total();

                $this->session->set_userdata('posted_data', $posted_data);

                $this->session->set_userdata('is_same_bill_ship', $is_same_bill_ship);

                redirect('cart/make_payment');

                // $this->add_customer_order($posted_data,$is_same_bill_ship);

            }

        }

    }

    private function add_customer_order($costumer_data = array(), $is_same_bill_ship)
    {

        if ($this->cart->total_items() > 0) {

            $userId = $this->session->userdata('user_id');

            $invoice_number = "HK_" . get_auto_increment('wl_order');

            $coupon_id = $this->session->userdata('coupon_id');

            $discount_amount = $this->session->userdata('discount_amount');

            $currency_code = $this->session->userdata('currency_code');

            $currency_value = $this->session->userdata('currency_value');

            $customers_id = ($userId != '') ? $userId : 0;

            $cart_total = $this->cart->total();

            $tax_cent = $this->cart_model->get_vat();

            $ship_method = 'none';

            $ship_amount = $costumer_data['shipping_amount'];

            $tax = ($cart_total * $tax_cent) / 100;

            ////$ship_amount,

            $data_order = array(

                'customers_id' => $customers_id,

                'invoice_number' => $invoice_number,

                'first_name' => $costumer_data['name'],

                'last_name' => '',

                'email' => $this->session->userdata('username'),

                'billing_title' => $costumer_data['bmtitle'],

                'billing_name' => $costumer_data['bil_name'],

                'billing_phone' => $costumer_data['bil_mobile'],

                'billing_address' => $costumer_data['bil_address'],

                'billing_landmark' => $costumer_data['bil_landmark'],

                'billing_zipcode' => $costumer_data['bil_zipcode'],

                'billing_country' => $costumer_data['bil_country'],

                'billing_city' => $costumer_data['bil_city'],

                'billing_state' => $costumer_data['bil_state'],

                'shipping_title' => $costumer_data['mtitle'],

                'shipping_name' => $costumer_data['name'],

                'shipping_phone' => $costumer_data['mobile'],

                'shipping_address' => $costumer_data['address'],

                'shipping_landmark' => $costumer_data['landmark'],

                'shipping_zipcode' => $costumer_data['zipcode'],

                'shipping_country' => $costumer_data['country'],

                'shipping_state' => $costumer_data['state'],

                'shipping_city' => $costumer_data['city'],

                'idcard_no' => $this->session->userdata('idcard_no'),

                'last_shopping_comment' => $costumer_data['last_shopping_comment'],

                'shipping_method' => $ship_method,

                'pickup_point' => $costumer_data['pickup_point'],

                'discount_coupon_id' => $coupon_id,

                'coupon_discount_amount' => $discount_amount,

                'shipping_amount' => '0',

                'cod_amount' => $costumer_data['cod_amount'],

                'total_amount' => $cart_total,

                'vat_amount' => $tax,

                'vat_applied_cent' => $tax_cent,

                'currency_code' => $currency_code,

                'currency_value' => $currency_value,

                'order_status' => 'Pending',

                'order_received_date' => $this->config->item('config.date.time'),

                'payment_method' => $costumer_data['payment_mode'],

                'payment_status' => 'Unpaid',

            );

            //trace($data_order); exit;

            if (!$this->cart_model->is_order_no_exits($invoice_number)) {

                $orderId = $this->cart_model->safe_insert('wl_order', $data_order, false);

                $this->session->set_userdata(array('working_order_id' => $orderId));

                foreach ($this->cart->contents() as $items) {

                    $thumbc['width'] = 195;

                    $thumbc['height'] = 150;

                    $thumb_name = "thumb_" . $thumbc['width'] . "_" . $thumbc['height'] . "_" . $items['img'];

                    $image_file = IMG_CACH_DIR . "/" . $thumb_name;

                    $default_no_img = FCROOT . "assets/developers/images/noimg1.gif";

                    $file_data = (file_exists($image_file)) ? file_get_contents($image_file) : file_get_contents($default_no_img);

                    $data = array(

                        'order_id' => $orderId,

                        'products_id' => $items['pid'],

                        'product_name' => $items['origname'],

                        'product_code' => $items['code'],

                        'product_image' => $file_data,

                        'product_price' => $items['price'],

                        'quantity' => $items['qty'],

                        'product_type' => $items['product_type'],

                        'product_attributes' => $items['options']['Attributes'],

                        'store' => $items['options']['Store'],

                    );

                    $this->cart_model->safe_insert('wl_orders_products', $data, false);

                }

                $user_id = $this->session->userdata('user_id');

                $this->cart->destroy();

                $data = array('shipping_id' => 0, 'coupon_id' => 0, 'discount_amount' => 0, 'posted_data' => 0, 'is_same_bill_ship' => 0);

                $this->session->unset_userdata($data);

            }

        }

    }

    public function invoice_mail_data($ordId)
    {

        if ($ordId != "") {

            $msgdata = invoice_data($ordId);

            $msgdata = str_replace('bgcolor="#333333"', '', $msgdata);

            $msgdata = str_replace('Print', '', $msgdata);

            $msgdata = str_replace('Close', '', $msgdata);

            return $msgdata;

        }

    }

    public function invoice()
    {

        if ($this->session->userdata('working_order_id') > 0) {

            $this->load->model(array('order/order_model'));

            $data['title'] = "Checkout";

            $order_res = $this->order_model->get_order_master($this->session->userdata('working_order_id'));

            $order_details_res = $this->order_model->get_order_detail($order_res['order_id']);

            $data['orddetail'] = $order_details_res;

            $data['ordmaster'] = $order_res;

            $data['ordId'] = $order_res['order_id'];

            $data['unq_section'] = "Checkout";

            $this->load->view('view_cart_invoice', $data);

        } else {

            redirect('cart', '');

        }

    }

    public function print_invoice()
    {

        $this->load->model(array('order/order_model'));

        $ordId = $this->uri->segment(3, $this->session->userdata('working_order_id'));

        $order_res = $this->order_model->get_order_master($ordId);

        $order_details_res = $this->order_model->get_order_detail($order_res['order_id']);

        $data['orddetail'] = $order_details_res;

        $data['ordmaster'] = $order_res;

        $data['ordId'] = $ordId;

        $this->load->view('view_invoice_print', $data);

    }

    public function add_to_wishlist()
    {

        $product_id = (int) $this->uri->segment(3);

        if ($this->session->userdata('user_id') > 0) {

            $this->session->set_userdata(array('msg_type' => 'success'));

            $this->session->set_flashdata('success', 'Product has been added to cart.');

            $this->cart_model->add_wislists($product_id, $this->session->userdata('user_id'));

            $ref = $this->session->userdata('ref2');

            $this->session->unset_userdata(array('ref' => 0));

            if ($ref != "") {

                redirect($ref, '');

            } else {

                $referer = $_SERVER["HTTP_REFERER"];

                echo '<script type="text/javascript">alert("Product has been add to wishlist!"); window.location.href="' . $referer . '"</script>';

                //redirect($_SERVER['HTTP_REFERER'],'refresh');

                //redirect('members/mywishlist');

            }

        } else {

            $this->session->set_userdata('ref2', $_SERVER['HTTP_REFERER']);

            $this->session->set_userdata('ref', 'cart/add_to_wishlist/' . $product_id);

            redirect('register');

        }

    }

    public function add_to_cart()
    {

        $this->add_cart();

    }

    public function check_product_exits_into_cart($pres)
    {

        $prod_size = (int) $this->input->post('size');

        $prod_color = (int) $this->input->post('color');

        $cart_array = $this->cart->contents();

        $insert_flag = 0;

        if (is_array($cart_array) && !empty($cart_array)) {

            foreach ($this->cart->contents() as $item) {

                if (array_key_exists('pid', $item)) {

                    if ($item['pid'] == $pres['products_id']) {

                        $insert_flag = 1;

                    }

                }

            }

        }

        return $insert_flag;

    }

    private function add_cart()
    {

        $productId = (int) $this->input->post('product_id');

        $qty = (int) $this->input->post('qty');

        $option = array('productid' => $productId);

        $res_base_price = array();

        if ($this->input->get_post('product_type') == '0') {

            $product_type = "0";

            $pres = $this->product_model->get_products(1, 0, $option);

            $pres = $pres[0];

            //color && size

            $color = (int) $this->input->post('color_id');

            $size = (int) $this->input->post('size_id');

            //Price and Discount Price

            $ee = $this->session->userdata('coupon_session');

            //trace($ee);

            $key = findKey($ee, $productId);

            if ($key >= 0 && is_array($ee) && array_key_exists($key, $ee)) {

                //$res_base_price['product_mrp'] = $pres['product_price'];

                //trace($ee[$key]);

                $res_base_price['quantity'] = $pres['product_qty'];

                $res_base_price['product_price'] = $ee[$key][$productId]['productPrice'];

                $res_base_price['product_discounted_price'] = $ee[$key][$productId]['productDiscountPrice'];

                //trace($res_base_price); exit;

            } else {

                //Price and Discount Price

                if ($color > 0 && $size > 0) {

                    $base_price_cond = array('where' => "product_id ='" . $pres['products_id'] . "' AND color_id ='" . $color . "' AND  size_id = '" . $size . "'");

                    $res_base_price = $this->product_model->get_product_base_price($base_price_cond);

                } else {

                    $res_base_price['product_discounted_price'] = $pres['product_discounted_price'];

                    $res_base_price['product_price'] = $pres['product_price'];

                    $res_base_price['quantity'] = $pres['product_qty'];

                }

            }

        } else {

            $product_type = "1";

            $pres = $this->fullset_model->get_fullset_front(1, 0, array("productid" => $productId));

            $pres = $pres[0];

            $pres['product_name'] = $pres['catalog_name'];

            $pres['products_id'] = $pres['setId'];

            $pres['media'] = $pres['catalog_image'];

            $pres['product_code'] = $pres['catalog_code'];

            $res_base_price['product_discounted_price'] = $pres['catalog_discounted_price'];

            $res_base_price['product_price'] = $pres['catalog_price'];

            $res_base_price['quantity'] = $pres['catalog_qty'];

            $size = "";

            $color = "";

        }

        //Qty

        $res_base_price['quantity'] = $qty;

        if ((is_array($pres) && !empty($pres)) && (is_array($res_base_price) && !empty($res_base_price))) {

            $cart_price = ((int) $res_base_price['product_discounted_price'] > 0) ? $res_base_price['product_discounted_price'] : $res_base_price['product_price'];

            $is_exits_inot_cart = $this->check_product_exits_into_cart($pres);

            if ($is_exits_inot_cart == 1) {

                $this->session->set_userdata(array('msg_type' => 'success'));

                $this->session->set_flashdata('success', 'Product already exists to cart.');

                redirect('cart', 'refresh');

            } else {

                $availableqty = 1000; // - $res_base_price['used_quantity'] );

                $availableqty = ($availableqty < 0) ? 0 : $availableqty;

                $cart_data = array(

                    'id' => random_string('numeric', 6),

                    'qty' => $qty,

                    'availableqty' => $availableqty,

                    'price' => $cart_price,

                    'product_price' => $res_base_price['product_price'],

                    'discount_price' => $res_base_price['product_discounted_price'],

                    'name' => url_title($pres['product_name']),

                    'origname' => $pres['product_name'],

                    'pid' => $pres['products_id'],

                    'img' => $pres['media'],

                    'code' => $pres['product_code'],

                    'product_type' => $product_type,

                    'options' => array(

                        'Size' => $size,

                        'Color' => $color,

                    ),

                );

                $this->cart->insert($cart_data);

                $this->session->set_userdata(array('msg_type' => 'success'));

                $this->session->set_flashdata('success', 'Product has been added to cart.');

                redirect('cart', 'refresh');

            }

        } else {

            redirect("products");

        }

    }

    public function empty_cart()
    {

        $this->cart->destroy();

        $data2 = array(

            'shipping_id' => 0,

            'coupon_id' => 0,

            'discount_amount' => 0,

        );

        $this->session->unset_userdata($data2);

        redirect('cart');

    }

    public function remove_item()
    {

        $data = array(

            'rowid' => $this->uri->segment(3),

            'qty' => 0,

        );

        $data2 = array(

            'shipping_id' => 0,

            'coupon_id' => 0,

            'discount_amount' => 0,

        );

        $this->session->unset_userdata($data2);

        $this->cart->update($data);

        if ($this->cart->total_items() == 0) {

            $this->session->unset_userdata(array('coupon_id' => 0, 'discount_amount' => 0));

        } else {

            $discount_res = $this->cart_model->get_discount($this->session->userdata('coupon_id'));

            // $this->apply_coupon_code( $discount_res );

        }

        //$this->session->set_userdata(array('msg_type' => 'success'));

        //$this->session->set_flashdata('success', $this->config->item('cart_delete_item'));

        $cartmessage = ($this->session->userdata('lang') == 'p') ? $this->lang->line('remove_cart') : $this->config->item('cart_delete_item');

        $this->session->set_userdata(array('cart_success' => $cartmessage));

        redirect($_SERVER['HTTP_REFERER'], 'refresh');

    }

    public function update_cart_qty()
    {

        $cart = $this->cart->contents();

        for ($i = 1; $i <= count($cart); $i++) {

            $item = $this->input->post($i);

            $cart_id = $item['rowid'];

            if ($item['qty'] <= 0) {

                $res = array('error_type' => 'error', 'error_msg' => "Can not update less then 0");

            } elseif (1000 >= $item['qty']) {

                $data = array(

                    'rowid' => $item['rowid'],

                    'qty' => $item['qty'],

                );

                $this->cart->update($data);

                $res = array('error_type' => 'pass', 'error_msg' => $this->config->item('cart_quantity_update'));

            } else {

                $res = array('error_type' => 'error', 'error_msg' => "Can not update more then available quantity");

            }

        }

        echo json_encode($res);

    }

    public function count_cart_item()
    {

        return $this->cart->total_items();

    }

    public function cart_total_amount()
    {

        $total = $this->cart->total();

        return $total;

    }

    public function display_cart_image($orders_products_id)
    {

        $binary_data = get_db_field_value('wl_orders_products', 'product_image', array('orders_products_id' => $orders_products_id));

        header("Content-Type: image/jpeg");

        echo $binary_data;

    }

    public function thanksorder()
    {

        $data['page_text'] = cms_page_content(15);

        $data['page_title'] = "Thanks";

        $this->load->view('view_order_thanks', $data);

    }

    public function send_verification_code()
    {

        $mobile = $this->input->post('mobile');

        if ($mobile) {

            sendSms($mobile);

        } else {

            echo 'Something went wrong, please try again.';

        }

    }

    public function verify_otp_code()
    {

        $mobile = $this->input->post('mobile');

        $otp = $this->input->post('otp');

        $num = count_record('wl_otp', "mobile_number = '" . $mobile . "' AND otp = '" . $otp . "' AND status = '0'");

        if ($num > 0) {

            $this->db->query("update wl_otp set status = '1' WHERE mobile_number = '" . $mobile . "' AND otp = '" . $otp . "'");

            echo 'success';

        } else {

            echo 'fail';

        }

    }

}

/* End of file member.php */

/* Location: .application/modules/products/controllers/cart.php */
