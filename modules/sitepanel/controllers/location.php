<?php



class Location extends Admin_Controller

{



    public function __construct()

    {

        parent::__construct();

        $this->load->model(array('location_model'));

        $this->load->helper('category/category');

        $this->form_validation->set_error_delimiters("<div class='required'>", "</div>");

    }



    //Country

    public function index()

    {



        $pagesize = (int) $this->input->get_post('pagesize');

        $config['limit'] = ($pagesize > 0) ? $pagesize : $this->config->item('pagesize');

        $offset = ($this->input->get_post('per_page') > 0) ? $this->input->get_post('per_page') : 0;

        $base_url = current_url_query_string(array('filter' => 'result'), array('per_page'));



        $keyword = trim($this->input->get_post('keyword', true));

        $keyword = $this->db->escape_str($keyword);

        $condtion = " ";

        if ($keyword != '') {

            $condtion = "AND country_name like '%" . $keyword . "%'";

        }



        $condtion_array = array();

        $res_array = $this->location_model->get_record();

        $config['total_rows'] = $this->location_model->total_rec_found;



        $data['heading_title'] = "Manage Country";

        $data['res'] = $res_array;



        if ($this->input->post('status_action') != '') {

            $this->update_status('tbl_country', 'id');

        }

        $this->load->view('location/list_view', $data);

    }



    public function add_country()

    {



        $data['heading_title'] = "Add Country";



        if ($this->input->post('submit')) {



            $this->form_validation->set_rules('country', "Country Name", "trim|required");

            $this->form_validation->set_rules('page_title', "Page Title", "trim|max_length[160]");

            $this->form_validation->set_rules('meta_title', "Meta Title", "trim|required|max_length[220]");

            $this->form_validation->set_rules('meta_keyword', "Meta Keyword", "trim|required|max_length[460]");

            $this->form_validation->set_rules('meta_description', "Meta Description", "trim|required|max_length[250]");

            $this->form_validation->set_rules('sp_content', "Special Content", "trim");

            $this->form_validation->set_rules('category_id', "Categories", "trim");

            $this->form_validation->set_rules('meta_key1', "Keyword 1", "trim|max_length[60]");

            $this->form_validation->set_rules('meta_key2', "Keyword 2", "trim|max_length[60]");

            $this->form_validation->set_rules('meta_key3', "Keyword 3", "trim|max_length[60]");



            if ($this->form_validation->run() == true) {



                //Category Links

                $postCategory = array();

                if ($this->input->post('category_id')) {

                    $postCategory = $this->input->post('category_id');

                }

                //trace($postCategory);

                $category_links = "";

                $catlink = $ctl = "";

                foreach ($postCategory as $ctv) {

                    $catlink = get_parent_categories($ctv, "AND status='1'", "category_id,parent_id");

                    $ctl = array_keys($catlink);

                    $category_links .= implode(",", $ctl) . ',';

                }

                $category_links = substr($category_links, 0, -1);

                //End Here

                $url_title = seo_url_title($this->input->post('country'));



                //Insert in Country Table

                $posted_data_loc = array(

                    'country_name' => $this->input->post('country'),

                    'country_temp_name' => $url_title,

                    'created_at' => $this->config->item('config.date.time'),

                );

                $id = $this->location_model->safe_insert('tbl_country', $posted_data_loc, false);



                //Insert in meta table

                $posted_data = array(

                    'is_fixed' => 'L',

                    'entity_type' => 'home/index',

                    'entity_id' => $id,

                    'page_url' => $url_title,

                    'page_heading' => $this->input->post('page_title'),

                    'meta_title' => $this->input->post('meta_title'),

                    'meta_keyword' => $this->input->post('meta_keyword'),

                    'meta_description' => $this->input->post('meta_description'),

                    'page_content' => $this->input->post('sp_content'),

                    'category_links' => $category_links,

                    'keyword_1' => $this->input->post('meta_key1'),

                    'keyword_2' => $this->input->post('meta_key2'),

                    'keyword_3' => $this->input->post('meta_key3'),

                );



                $this->location_model->safe_insert('wl_meta_tags', $posted_data, false);



                $this->session->set_flashdata('success', lang('success'));

                redirect("sitepanel/location/");

            }

        }



        $this->load->view("location/add_country", $data);

    }



    public function edit_country()

    {

        $country_id = $this->uri->segment(4, 0);



        $data['heading_title'] = "Edit Country";

        $res = $this->db->query("SELECT * FROM tbl_country WHERE id=$country_id")->row();

        $data['res'] = $res;



        $data['meta'] = $this->db->query("SELECT * FROM wl_meta_tags WHERE is_fixed = 'L' AND page_url = '" . $res->country_temp_name . "'")->row_array();



        if ($this->input->post('update')) {



            $this->form_validation->set_rules('country', "Country Name", "trim|required");

            $this->form_validation->set_rules('page_title', "Page Title", "trim|max_length[160]");

            $this->form_validation->set_rules('meta_title', "Meta Title", "trim|required|max_length[220]");

            $this->form_validation->set_rules('meta_keyword', "Meta Keyword", "trim|required|max_length[460]");

            $this->form_validation->set_rules('meta_description', "Meta Description", "trim|required|max_length[250]");

            $this->form_validation->set_rules('sp_content', "Special Content", "trim");

            $this->form_validation->set_rules('category_id', "Categories", "trim");

            $this->form_validation->set_rules('meta_key1', "Keyword 1", "trim|max_length[60]");

            $this->form_validation->set_rules('meta_key2', "Keyword 2", "trim|max_length[60]");

            $this->form_validation->set_rules('meta_key3', "Keyword 3", "trim|max_length[60]");



            if ($this->form_validation->run() == true) {

                //Category Links

                $postCategory = array();

                if ($this->input->post('category_id')) {

                    $postCategory = $this->input->post('category_id');

                }

                //trace($postCategory);

                $category_links = "";

                $catlink = $ctl = "";

                foreach ($postCategory as $ctv) {

                    $catlink = get_parent_categories($ctv, "AND status='1'", "category_id,parent_id");

                    $ctl = array_keys($catlink);

                    $category_links .= implode(",", $ctl) . ',';

                }

                $category_links = substr($category_links, 0, -1);

                //End Here

                $url_title = seo_url_title($this->input->post('country'));

                $posted_data_loc = array(

                    'country_name' => $this->input->post('country'),

                    'country_temp_name' => $url_title,

                    'created_at' => $this->config->item('config.date.time'),

                );

                $where = "id=" . $country_id;

                $this->location_model->safe_update('tbl_country', $posted_data_loc, $where, false);



                //Insert in meta table

                $posted_data = array(

                    'is_fixed' => 'L',

                    'entity_type' => 'home/index',

                    'entity_id' => $id,

                    'page_url' => $url_title,

                    'page_heading' => $this->input->post('page_title'),

                    'meta_title' => $this->input->post('meta_title'),

                    'meta_keyword' => $this->input->post('meta_keyword'),

                    'meta_description' => $this->input->post('meta_description'),

                    'page_content' => $this->input->post('sp_content'),

                    'category_links' => $category_links,

                    'keyword_1' => $this->input->post('meta_key1'),

                    'keyword_2' => $this->input->post('meta_key2'),

                    'keyword_3' => $this->input->post('meta_key3'),

                );

                $where_meta = "entity_id=" . $country_id . " AND page_url = '" . $res->country_temp_name . "'";

                $this->location_model->safe_update('wl_meta_tags', $posted_data, $where_meta, false);



                $this->session->set_flashdata('success', lang('successupdate'));

                redirect("sitepanel/location/");

            }

        }



        $this->load->view("location/edit_country", $data);

    }



    public function add_edit()

    {

        $id = (int) $this->uri->segment(4, 0);

        $row_data = '';

        if ($id > 0) {

            $row_data = $this->location_model->get_record_by_id($id);

        }

        $data['row'] = $row_data;



        $data['parentData'] = '';

        $data['heading_title'] = ($id > 0) ? 'Edit Country' : 'Add Country';



        if (is_object($row_data)) {



            $this->form_validation->set_rules('country_name', 'Country Name', "trim|required|max_length[100]|unique[tbl_country.country_name='" . $this->db->escape_str($this->input->post('country_name')) . "' AND tbl_country.status!='2' AND tbl_country.id !=$id]");

        } else {

            $this->form_validation->set_rules('country_name', 'Country Name', "trim|required|max_length[100]|unique[tbl_country.country_name='" . $this->db->escape_str($this->input->post('country_name')) . "' AND tbl_country.status!='2']");

        }



        if ($this->form_validation->run() === true) {

            if ($id > 0) {

                $posted_data = array(

                    'country_name' => $this->input->post('country_name'),

                    'country_temp_name' => str_replace("-", "", url_title($this->input->post('country_name'))),

                    'cont_currency' => $this->input->post('cont_currency'),

                );



                $this->location_model->safe_update('tbl_country', $posted_data, "id ='" . $id . "'", false);



                $this->session->set_userdata(array('msg_type' => 'success'));

                $this->session->set_flashdata('success', lang('successupdate'));

            } else {

                $posted_data = array(

                    'country_name' => $this->input->post('country_name'),

                    'country_temp_name' => str_replace("-", "", url_title($this->input->post('country_name'))),

                    'cont_currency' => $this->input->post('cont_currency'),

                );



                $this->location_model->safe_insert('tbl_country', $posted_data, false);



                $this->session->set_userdata(array('msg_type' => 'success'));

                $this->session->set_flashdata('success', lang('success'));

            }



            $redirect_path = 'location';

            redirect('sitepanel/' . $redirect_path, '');

        }

        $data['includes'] = $this->view_path . 'addedit_view';

        $this->load->view('includes/sitepanel_container', $data);

    }



    //State

    public function state()

    {

        $pagesize = (int) $this->input->get_post('pagesize');

        $config['limit'] = ($pagesize > 0) ? $pagesize : $this->config->item('pagesize');

        $offset = ($this->input->get_post('per_page') > 0) ? $this->input->get_post('per_page') : 0;

        $base_url = current_url_query_string(array('filter' => 'result'), array('per_page'));



        $keyword = $this->db->escape_str(trim($this->input->get_post('keyword', true)));

        $country_id = $this->db->escape_str(trim($this->input->get_post('country_id', true)));



        $condtion = " ";



        if ($keyword != '') {

            $condtion .= "AND title like '%" . $keyword . "%'";

        }

        if ($country_id > 0) {

            $condtion .= "AND country_id ='" . $country_id . "'";

        }



        $condtion_array = array(

        );



        $res_array = $this->location_model->get_states($condtion_array);

        $config['total_rows'] = $this->location_model->total_rec_found;

        //$data['page_links'] = admin_pagination($base_url, $config['total_rows'], $config['limit'], $offset);

        $data['heading_title'] = "Manage States";

        $data['res'] = $res_array;



        if ($this->input->post('status_action') != '') {

            if ($this->input->post('status_action') == "Set Popular") {

                $arr_ids = $this->input->post('arr_ids');

                if (is_array($arr_ids)) {

                    $id_str = implode(',', $arr_ids);

                    $data = array("is_state_popular" => "1");

                    $where = "id IN($id_str)";

                    $this->location_model->safe_update("tbl_states", $data, $where, true);

                }



                $this->session->set_userdata(array('msg_type' => 'success'));

                $this->session->set_flashdata('success', lang('successupdate'));

                redirect($this->input->server('HTTP_REFERER'));

            } elseif ($this->input->post('status_action') == "Unset Popular") {



                $arr_ids = $this->input->post('arr_ids');

                //trace($arr_ids);exit;

                if (is_array($arr_ids)) {

                    //trace($arr_ids);exit;

                    $id_str = implode(',', $arr_ids);

                    $data = array("is_state_popular" => "0");

                    $where = "id IN($id_str)";

                    $this->location_model->safe_update("tbl_states", $data, $where, true);

                }

                $this->session->set_userdata(array('msg_type' => 'success'));

                $this->session->set_flashdata('success', lang('successupdate'));

                redirect($this->input->server('HTTP_REFERER'));

            } else {

                $this->update_status('tbl_states', 'id');

            }

        }



        $this->load->view('location/state_list_view', $data);

    }



    public function state_add()

    {



        $country = $this->db->query("SELECT * FROM tbl_country ORDER BY country_name ASC")->result_array();



        $data['country'] = $country;

        $data['heading_title'] = "Add State";



        if ($this->input->post('submit')) {



            $this->form_validation->set_rules('country_id', 'Country', "trim|required");

            $this->form_validation->set_rules('state', 'State', "trim|required");



            $this->form_validation->set_rules('page_title', "Page Title", "trim|max_length[160]");

            /* $this->form_validation->set_rules('meta_title', "Meta Title", "trim|required|max_length[220]");
            $this->form_validation->set_rules('meta_keyword', "Meta Keyword", "trim|required|max_length[460]");
            $this->form_validation->set_rules('meta_description', "Meta Description", "trim|required|max_length[250]");
            $this->form_validation->set_rules('sp_content', "Special Content", "trim");
            $this->form_validation->set_rules('category_id', "Categories", "trim");
            $this->form_validation->set_rules('meta_key1', "Keyword 1", "trim|max_length[60]");
            $this->form_validation->set_rules('meta_key2', "Keyword 2", "trim|max_length[60]");
            $this->form_validation->set_rules('meta_key3', "Keyword 3", "trim|max_length[60]"); */



            if ($this->form_validation->run() == true) {



                //Category Links

                $postCategory = array();

                if ($this->input->post('category_id')) {

                    $postCategory = $this->input->post('category_id');

                }

                //trace($postCategory);

                $category_links = "";

                $catlink = $ctl = "";

                foreach ($postCategory as $ctv) {

                    $catlink = get_parent_categories($ctv, "AND status='1'", "category_id,parent_id");

                    $ctl = array_keys($catlink);

                    $category_links .= implode(",", $ctl) . ',';

                }

                $category_links = substr($category_links, 0, -1);

                //End Here



                $url_title = str_replace("-", "", url_title($this->input->post('state')));

                $posted_data = array(

                    'title' => $this->input->post('state'),

                    'temp_title' => $url_title,

                    'country_id' => $this->input->post('country_id'),

                    'created_at' => $this->config->item('config.date.time'),

                );

                $id = $this->location_model->safe_insert('tbl_states', $posted_data, false);



                //Insert in meta table

                $posted_data = array(

                    'is_fixed' => 'L',

                    'entity_type' => 'home/index',

                    'entity_id' => $id,

                    'page_url' => $url_title,

                    'page_heading' => $this->input->post('page_title'),

                    'meta_title' => $this->input->post('meta_title'),

                    'meta_keyword' => $this->input->post('meta_keyword'),

                    'meta_description' => $this->input->post('meta_description'),

                    'page_content' => $this->input->post('sp_content'),

                    'category_links' => $category_links,

                    'keyword_1' => $this->input->post('meta_key1'),

                    'keyword_2' => $this->input->post('meta_key2'),

                    'keyword_3' => $this->input->post('meta_key3'),

                );

                $this->location_model->safe_insert('wl_meta_tags', $posted_data, false);



                $this->session->set_flashdata('success', lang('success'));

                redirect(base_url("sitepanel/location/state"));

            }

        }



        $this->load->view('location/state_add', $data);

    }



    public function state_edit()

    {

        $id = (int) $this->uri->segment(4, 0);
        $row_data = '';
        $data['id'] = $id;
        $country = $this->db->query("SELECT * FROM tbl_country ORDER BY country_name ASC")->result_array();
        $data['country'] = $country;
        $row_data = $this->location_model->get_single_row("tbl_states", $id);

        $data['row_data'] = $row_data;
        //print_r($data['row_data']);exit;
        $data['heading_title'] = 'Edit State';

        if ($this->input->post('update')) {

            $this->form_validation->set_rules('country_id', 'Country Name', "trim|required");
            $this->form_validation->set_rules('state', 'State', "trim|required");

            if ($this->form_validation->run() == true) {

                $url_title = str_replace("-", "", url_title($this->input->post('state')));

                $posted_data = array(

                    'title' => $this->input->post('state'),

                    'temp_title' => $url_title,

                    'country_id' => $this->input->post('country_id'),

                    'created_at' => $this->config->item('config.date.time'),

                );



                $where = "id=" . $row_data->id;

                $this->location_model->safe_update('tbl_states', $posted_data, $where, false);

                $this->session->set_flashdata('success', lang('successupdate'));

                redirect(base_url('sitepanel/location/state'));

            }

        }

        $this->load->view('location/state_edit_view', $data);

    }



    //City

    public function city()

    {

        $pagesize = (int) $this->input->get_post('pagesize');
        $config['limit'] = ($pagesize > 0) ? $pagesize : $this->config->item('pagesize');
        $offset = ($this->input->get_post('per_page') > 0) ? $this->input->get_post('per_page') : 0;
        $base_url = current_url_query_string(array('filter' => 'result'), array('per_page'));

        $keyword = $this->db->escape_str(trim($this->input->get_post('keyword', true)));
        $country_id = $this->db->escape_str(trim($this->input->get_post('country_id', true)));
        $state_id = $this->db->escape_str(trim($this->input->get_post('state_id', true)));

        //$district_id = $this->db->escape_str(trim($this->input->get_post('district_id', TRUE)));



        $is_city_popular = $this->db->escape_str(trim($this->input->get_post('is_city_popular', true)));
        $is_othercity_popular = $this->db->escape_str(trim($this->input->get_post('is_othercity_popular', true)));

        $condtion = " ";

        if ($keyword != '') {
            $condtion .= "AND title like '%" . $keyword . "%'";
        }

        if ($state_id > 0) {

            $condtion .= "AND state_id ='" . $state_id . "'";

        }

        //    if ($district_id > 0) {

        //      $condtion .= "AND district_id ='" . $district_id . "'";

        //    }

        if ($country_id > 0) {

            $condtion .= "AND country_id ='" . $country_id . "'";

        }

        if ($is_city_popular > 0) {

            $condtion .= "AND is_city_popular ='" . $is_city_popular . "'";

        }

        if ($is_othercity_popular > 0) {

            $condtion .= "AND is_othercity_popular ='" . $is_othercity_popular . "'";

        }



        $condtion_array = array();



        $res_array = $this->location_model->get_city($condtion_array);

        $config['total_rows'] = $this->location_model->total_rec_found;

        //$data['page_links'] = admin_pagination($base_url, $config['total_rows'], $config['limit'], $offset);

        $data['heading_title'] = "Manage City";

        $data['res'] = $res_array;



        if ($this->input->post('status_action') != '') {

            if ($this->input->post('status_action') == "Set Popular") {

                $arr_ids = $this->input->post('arr_ids');
                if (is_array($arr_ids)) {
                    $id_str = implode(',', $arr_ids);
                    $data = array("is_city_popular" => "1");
                    $where = "id IN($id_str)";
                    $this->location_model->safe_update("tbl_city", $data, $where, true);
                }
                $this->session->set_userdata(array('msg_type' => 'success'));
                $this->session->set_flashdata('success', lang('successupdate'));
                redirect($this->input->server('HTTP_REFERER'));

            } elseif ($this->input->post('status_action') == "Unset Popular") {

                $arr_ids = $this->input->post('arr_ids');
                //trace($arr_ids);exit;
                if (is_array($arr_ids)) {
                    //trace($arr_ids);exit;
                    $id_str = implode(',', $arr_ids);
                    $data = array("is_city_popular" => "0");
                    $where = "id IN($id_str)";
                    $this->location_model->safe_update("tbl_city", $data, $where, true);
                }

                $this->session->set_userdata(array('msg_type' => 'success'));
                $this->session->set_flashdata('success', lang('successupdate'));
                redirect($this->input->server('HTTP_REFERER'));

            } elseif ($this->input->post('status_action') == "Set Othercity Popular") {

                $arr_ids = $this->input->post('arr_ids');

                if (is_array($arr_ids)) {

                    $id_str = implode(',', $arr_ids);

                    $data = array("is_othercity_popular" => "1");

                    $where = "id IN($id_str)";

                    $this->location_model->safe_update("tbl_city", $data, $where, true);

                }



                $this->session->set_userdata(array('msg_type' => 'success'));

                $this->session->set_flashdata('success', lang('successupdate'));

                redirect($this->input->server('HTTP_REFERER'));

            } elseif ($this->input->post('status_action') == "Unset Othercity Popular") {

                $arr_ids = $this->input->post('arr_ids');

                if (is_array($arr_ids)) {

                    $id_str = implode(',', $arr_ids);

                    $data = array("is_othercity_popular" => "0");

                    $where = "id IN($id_str)";

                    $this->location_model->safe_update("tbl_city", $data, $where, true);

                }



                $this->session->set_userdata(array('msg_type' => 'success'));

                $this->session->set_flashdata('success', lang('successupdate'));

                redirect($this->input->server('HTTP_REFERER'));

            } elseif ($this->input->post('status_action') == "Available Premimum Ads") {



                $arr_ids = $this->input->post('arr_ids');

                //trace($arr_ids);exit;

                if (is_array($arr_ids)) {

                    //trace($arr_ids);exit;

                    $id_str = implode(',', $arr_ids);

                    $data = array("premimum_ads_avl" => "1");

                    $where = "id IN($id_str)";

                    $this->location_model->safe_update("tbl_city", $data, $where, true);

                }

                $this->session->set_userdata(array('msg_type' => 'success'));

                $this->session->set_flashdata('success', lang('successupdate'));

                redirect($this->input->server('HTTP_REFERER'));

            } elseif ($this->input->post('status_action') == "Not Available Premimum Ads") {



                $arr_ids = $this->input->post('arr_ids');

                //trace($arr_ids);exit;

                if (is_array($arr_ids)) {

                    //trace($arr_ids);exit;

                    $id_str = implode(',', $arr_ids);

                    $data = array("premimum_ads_avl" => "0");

                    $where = "id IN($id_str)";

                    $this->location_model->safe_update("tbl_city", $data, $where, true);

                }

                $this->session->set_userdata(array('msg_type' => 'success'));

                $this->session->set_flashdata('success', lang('successupdate'));

                redirect($this->input->server('HTTP_REFERER'));

            } else {

                $this->update_status('tbl_city', 'id');

            }

        }



        //    $data['includes'] = $this->view_path . 'city_list_vew';



        $this->load->view('location/city_list_view', $data);

    }



    public function city_add()

    {



        $data['heading_title'] = "Add City";



        $data['country'] = $this->db->query("SELECT * FROM tbl_country ORDER BY country_name ASC")->result_array();



        if ($this->input->post('submit')) {



            $this->form_validation->set_rules('country_id', "Country Name", 'trim|required');

            //  $this->form_validation->set_rules('state_id', "State Name", "trim|required");

            $this->form_validation->set_rules('city', "City Name", "trim|required|xss_clean");



            $this->form_validation->set_rules('page_title', "Page Title", "trim|max_length[160]");

            /* $this->form_validation->set_rules('meta_title', "Meta Title", "trim|required|max_length[220]");
            $this->form_validation->set_rules('meta_keyword', "Meta Keyword", "trim|required|max_length[460]");
            $this->form_validation->set_rules('meta_description', "Meta Description", "trim|required|max_length[250]");
            $this->form_validation->set_rules('sp_content', "Special Content", "trim");
            $this->form_validation->set_rules('category_id', "Categories", "trim");
            $this->form_validation->set_rules('meta_key1', "Keyword 1", "trim|max_length[60]");
            $this->form_validation->set_rules('meta_key2', "Keyword 2", "trim|max_length[60]");
            $this->form_validation->set_rules('meta_key3', "Keyword 3", "trim|max_length[60]"); */



            if ($this->form_validation->run() == true) {

                //Category Links

                $postCategory = array();

                if ($this->input->post('category_id')) {

                    $postCategory = $this->input->post('category_id');

                }

                //trace($postCategory);

                $category_links = "";

                $catlink = $ctl = "";

                foreach ($postCategory as $ctv) {

                    $catlink = get_parent_categories($ctv, "AND status='1'", "category_id,parent_id");

                    $ctl = array_keys($catlink);

                    $category_links .= implode(",", $ctl) . ',';

                }

                $category_links = substr($category_links, 0, -1);

                //End Here



                $url_title = str_replace("-", "", url_title($this->input->post('city')));

                $posted_data = array(

                    'title' => $this->input->post('city'),

                    'temp_title' => $url_title,

                    'country_id' => $this->input->post('country_id'),

                    'state_id' => $this->input->post('state_id'),

                    'created_at' => $this->config->item('config.date.time'),

                );

                $id = $this->location_model->safe_insert('tbl_city', $posted_data, false);



                //Insert in meta table

                $posted_data = array(
                    'is_fixed' => 'L',
                    'entity_type' => 'home/index',
                    'entity_id' => $id,
                    'page_url' => $url_title,
                    'page_heading' => $this->input->post('page_title'),
                    'meta_title' => $this->input->post('meta_title'),
                    'meta_keyword' => $this->input->post('meta_keyword'),
                    'meta_description' => $this->input->post('meta_description'),
                    'page_content' => $this->input->post('sp_content'),
                    'category_links' => $category_links,
                    'keyword_1' => $this->input->post('meta_key1'),
                    'keyword_2' => $this->input->post('meta_key2'),
                    'keyword_3' => $this->input->post('meta_key3'),
                );

                $this->location_model->safe_insert('wl_meta_tags', $posted_data, false);



                $this->session->set_flashdata('success', lang('success'));

                redirect(base_url('sitepanel/location/city'));

            }

        }



        $this->load->view("location/city_add", $data);

    }



    public function city_edit()

    {



        $city_id = $this->uri->segment(4, 0);



        $data['heading_title'] = "Edit City";



        $data['country'] = $this->db->query("SELECT * FROM tbl_country ORDER BY country_name ASC")->result_array();



        $res = $this->db->query("SELECT * FROM tbl_city WHERE id=$city_id")->row();



        $state = $this->db->query("SELECT * FROM tbl_states ORDER BY title ASC")->result_array();



        $data['res'] = $res;



        $data['states'] = $state;



        if ($this->input->post('update')) {



            $this->form_validation->set_rules('country_id', "Country Name", "trim|required");

            $this->form_validation->set_rules('state_id', "State Name", "trim|required");

            $this->form_validation->set_rules('city', "City Name", "trim|required");



            if ($this->form_validation->run() == true) {



                $url_title = str_replace("-", "", url_title($this->input->post('state')));

                $posted_data = array(

                    'title' => $this->input->post('city'),

                    'temp_title' => $url_title,

                    'state_id' => $this->input->post('state_id'),

                    'country_id' => $this->input->post('country_id'),

                    'created_at' => $this->config->item('config.date.time'),

                );



                $where = "id=" . $city_id;

                $this->location_model->safe_update('tbl_city', $posted_data, $where, false);



                $this->session->set_flashdata('success', lang('successupdate'));

                redirect(base_url('sitepanel/location/city'));

            }

        }



        $this->load->view("location/city_edit", $data);

    }



    //ajax state calling



    public function ajax_state()

    {



        $country_id = $this->input->post('country_id');



        $states = $this->db->query("SELECT * FROM tbl_states WHERE country_id=$country_id")->result_array();

        echo '<option value="">Select State</option>';

        foreach ($states as $state) {



            echo "<option value=" . $state['id'] . ">" . $state['title'] . "</option>";

        }

    }



    public function city_add_edit()

    {

        $id = (int) $this->uri->segment(4, 0);

        $row_data = '';

        if ($id > 0) {

            $row_data = $this->location_model->get_single_row("tbl_city", $id);

        }

        $data['row'] = $row_data;



        $data['parentData'] = '';

        $data['heading_title'] = ($id > 0) ? 'Edit City' : 'Add City';



        if (is_object($row_data)) {

            $this->form_validation->set_rules('country_id', 'Country', "trim|required|max_length[11]");

            $this->form_validation->set_rules('state_id', 'State', "trim|required|max_length[11]");

            //$this->form_validation->set_rules('district_id', 'District', "trim|required|max_length[11]");



            $this->form_validation->set_rules('title', 'City Name', "trim|required|max_length[100]|unique[tbl_city.title='" . $this->db->escape_str($this->input->post('title')) . "' AND tbl_city.status!='2' AND tbl_city.id !=$id]");

        } else {

            $this->form_validation->set_rules('country_id', 'Country', "trim|required|max_length[11]");

            $this->form_validation->set_rules('state_id', 'State', "trim|required|max_length[11]");

            //$this->form_validation->set_rules('district_id', 'District', "trim|required|max_length[11]");



            $this->form_validation->set_rules('title', 'City Name', "trim|required|max_length[100]|unique[tbl_city.title='" . $this->db->escape_str($this->input->post('title')) . "' AND tbl_city.status!='2' ]");

        }



        if ($this->form_validation->run() === true) {

            if ($id > 0) {

                $url_title = str_replace("-", "", url_title($this->input->post('title')));

                $posted_data = array(

                    'title' => $this->input->post('title'),

                    'temp_title' => $url_title,

                    'country_id' => $this->input->post('country_id'),

                    'state_id' => $this->input->post('state_id'),

                    //'district_id' => $this->input->post('district_id')

                );

                $posted_data = $this->security->xss_clean($posted_data);

                $this->location_model->safe_update('tbl_city', $posted_data, "id ='" . $id . "'", false);



                $this->session->set_userdata(array('msg_type' => 'success'));

                $this->session->set_flashdata('success', lang('successupdate'));

            } else {

                $url_title = str_replace("-", "", url_title($this->input->post('title')));

                $posted_data = array(

                    'title' => $this->input->post('title'),

                    'temp_title' => $url_title,

                    'country_id' => $this->input->post('country_id'),

                    'state_id' => $this->input->post('state_id'),

                    //'district_id' => $this->input->post('district_id')

                );

                $posted_data = $this->security->xss_clean($posted_data);

                $city_id = $this->location_model->safe_insert('tbl_city', $posted_data, false);

                $this->session->set_userdata(array('msg_type' => 'success'));

                $this->session->set_flashdata('success', lang('success'));

            }



            $redirect_path = 'location/city';

            redirect('sitepanel/' . $redirect_path, '');

        }

        $data['includes'] = $this->view_path . 'city_addedit_view';

        $this->load->view('includes/sitepanel_container', $data);

    }



    public function set_city_group()

    {

        $city_id = (int) $this->uri->segment('4');

        $state_id = (int) $this->uri->segment('5');



        $data['city_id'] = $city_id;

        $data['state_id'] = $state_id;



        $condtion = "AND state_id ='" . $state_id . "' AND id !='" . $city_id . "'";

        $condtion_array = array(

            'condition' => $condtion,

            'limit' => false,

            'offset' => false,

            'debug' => false,

        );



        $res_array = $this->location_model->get_city($condtion_array);

        $data['res'] = $res_array;



        if ($this->input->post('action') == "Add in Group") {



            $arr_ids = $this->input->post('arr_ids');

            if (is_array($arr_ids) && count($arr_ids) > 0) {

                array_push($arr_ids, $city_id);

            } else {

                $arr_ids = array($city_id);

            }



            $id_str = implode(",", $arr_ids);



            $data = array('city_group_id' => $id_str);

            $where = "id ='" . $city_id . "'";

            $this->location_model->safe_update("tbl_city", $data, $where, false);



            $this->session->set_userdata(array('msg_type' => 'success'));

            $this->session->set_flashdata('success', lang('successupdate'));



            $redirect_path = 'location/set_city_group/' . $city_id . "/" . $state_id;

            redirect('sitepanel/' . $redirect_path, '');

        }



        $this->load->view("location/set_city_group_view", $data);

    }



    //Neighborhood

    public function neighborhood()

    {

        $pagesize = (int) $this->input->get_post('pagesize');

        $config['limit'] = ($pagesize > 0) ? $pagesize : $this->config->item('pagesize');

        $offset = ($this->input->get_post('per_page') > 0) ? $this->input->get_post('per_page') : 0;

        $base_url = current_url_query_string(array('filter' => 'result'), array('per_page'));



        $keyword = $this->db->escape_str(trim($this->input->get_post('keyword', true)));

        $country_id = $this->db->escape_str(trim($this->input->get_post('country_id', true)));

        $state_id = $this->db->escape_str(trim($this->input->get_post('state_id', true)));

        $district_id = $this->db->escape_str(trim($this->input->get_post('district_id', true)));

        $city_id = $this->db->escape_str(trim($this->input->get_post('city_id', true)));



        $condtion = " ";



        if ($keyword != '') {

            $condtion .= "AND title like '%" . $keyword . "%'";

        }

        if ($city_id > 0) {

            $condtion .= "AND city_id ='" . $city_id . "'";

        }

        if ($district_id > 0) {

            $condtion .= "AND district_id ='" . $district_id . "'";

        }

        if ($state_id > 0) {

            $condtion .= "AND state_id ='" . $state_id . "'";

        }

        if ($country_id > 0) {

            $condtion .= "AND country_id ='" . $country_id . "'";

        }



        $condtion_array = array(

            'condition' => $condtion,

            'limit' => $config['limit'],

            'offset' => $offset,

            'debug' => false,

        );



        $res_array = $this->location_model->get_neighborhood($condtion_array);

        $config['total_rows'] = $this->location_model->total_rec_found;

        $data['page_links'] = admin_pagination($base_url, $config['total_rows'], $config['limit'], $offset);

        $data['heading_title'] = "Manage Location";

        $data['res'] = $res_array;



        if ($this->input->post('status_action') != '') {

            $this->update_status('tbl_neighborhood', 'id');

        }



        $data['includes'] = $this->view_path . 'neighborhood_list_vew';



        $this->load->view('includes/sitepanel_container', $data);

    }



    public function neighborhood_add_edit()

    {

        $id = (int) $this->uri->segment(4, 0);

        $row_data = '';

        if ($id > 0) {

            $row_data = $this->location_model->get_single_row("tbl_neighborhood", $id);

        }

        $data['row'] = $row_data;



        $data['parentData'] = '';

        $data['heading_title'] = ($id > 0) ? 'Edit Location' : 'Add Location';



        if (is_object($row_data)) {

            $this->form_validation->set_rules('country_id', 'Country', "trim|required|max_length[11]");

            $this->form_validation->set_rules('state_id', 'State', "trim|required|max_length[11]");

            $this->form_validation->set_rules('district_id', 'District', "trim|required|max_length[11]");

            $this->form_validation->set_rules('city_id', 'City', "trim|required|max_length[11]");



            $this->form_validation->set_rules('title', 'Location', "trim|required|max_length[100]|unique[tbl_neighborhood.title='" . $this->db->escape_str($this->input->post('title')) . "' AND tbl_neighborhood.status!='2' AND tbl_neighborhood.country_id='" . $this->db->escape_str($this->input->post('country_id')) . "' AND tbl_neighborhood.state_id='" . $this->db->escape_str($this->input->post('state_id')) . "' AND tbl_neighborhood.city_id='" . $this->db->escape_str($this->input->post('city_id')) . "' AND tbl_neighborhood.id !=$id]");

        } else {

            $this->form_validation->set_rules('country_id', 'Country', "trim|required|max_length[11]");

            $this->form_validation->set_rules('state_id', 'State', "trim|required|max_length[11]");

            $this->form_validation->set_rules('district_id', 'District', "trim|required|max_length[11]");

            $this->form_validation->set_rules('city_id', 'City', "trim|required|max_length[11]");



            $this->form_validation->set_rules('title', 'Location', "trim|required|max_length[100]|unique[tbl_neighborhood.title='" . $this->db->escape_str($this->input->post('title')) . "' AND tbl_neighborhood.status!='2' AND tbl_neighborhood.country_id='" . $this->db->escape_str($this->input->post('country_id')) . "' AND tbl_neighborhood.state_id='" . $this->db->escape_str($this->input->post('state_id')) . "' AND tbl_neighborhood.city_id='" . $this->db->escape_str($this->input->post('city_id')) . "']");

        }



        if ($this->form_validation->run() === true) {

            if ($id > 0) {

                $posted_data = array(

                    'title' => $this->input->post('title'),

                    'country_id' => $this->input->post('country_id'),

                    'state_id' => $this->input->post('state_id'),

                    'district_id' => $this->input->post('district_id'),

                    'city_id' => $this->input->post('city_id'),

                );

                $posted_data = $this->security->xss_clean($posted_data);

                $this->location_model->safe_update('tbl_neighborhood', $posted_data, "id ='" . $id . "'", false);



                $this->session->set_userdata(array('msg_type' => 'success'));

                $this->session->set_flashdata('success', lang('successupdate'));

            } else {

                $posted_data = array(

                    'title' => $this->input->post('title'),

                    'country_id' => $this->input->post('country_id'),

                    'state_id' => $this->input->post('state_id'),

                    'district_id' => $this->input->post('district_id'),

                    'city_id' => $this->input->post('city_id'),

                );

                $posted_data = $this->security->xss_clean($posted_data);

                $this->location_model->safe_insert('tbl_neighborhood', $posted_data, false);



                $this->session->set_userdata(array('msg_type' => 'success'));

                $this->session->set_flashdata('success', lang('success'));

            }



            $redirect_path = 'location/neighborhood';

            redirect('sitepanel/' . $redirect_path, '');

        }

        $data['includes'] = $this->view_path . 'neighborhood_addedit_view';

        $this->load->view('includes/sitepanel_container', $data);

    }



    //Online List Ajax Methods

    public function bind_state()

    {

        $parent_id = $this->input->post('parent_id');

        $from_section = $this->input->post('from_section');



        $arr = array("tbl_name" => "tbl_states", "select_fld" => "id,title", "where" => "and status='1' and country_id ='" . $parent_id . "'");

        if ($from_section == "state_section") {

            echo common_dropdown('state_id', '', $arr, 'style="width:235px;" onchange="bind_data(this.value,\'sitepanel/location/bind_district\',\'district_list\',\'loader_district\',\'district_section\');"');

        } else {

            echo common_dropdown('state_id', '', $arr, 'style="width:235px;"');

        }

    }



    //Online List Ajax Methods

    public function bind_district()

    {

        $parent_id = $this->input->post('parent_id');



        $from_section = $this->input->post('from_section');



        $arr = array("tbl_name" => "tbl_district", "select_fld" => "id,title", "where" => "and status='1' and state_id ='" . $parent_id . "'");

        if ($from_section == "district_section") {

            echo common_dropdown('district_id', '', $arr, 'style="width:235px;" onchange="bind_data(this.value,\'sitepanel/location/bind_city\',\'city_list\',\'loader_city\',\'city_section\');"');

        } else {

            echo common_dropdown('district_id', '', $arr, 'style="width:235px;"');

        }

    }



    public function bind_city()

    {

        $parent_id = $this->input->post('parent_id');



        $arr = array("tbl_name" => "tbl_city", "select_fld" => "id,title", "where" => "and status='1' and district_id ='" . $parent_id . "'");

        echo common_dropdown('city_id', '', $arr, 'style="width:235px;"');

    }



    public function bind_city_call()

    {

        $parent_id = $this->input->post('parent_id');



        $arr = array("tbl_name" => "tbl_city", "select_fld" => "id,title", "where" => "and status='1' and country_id ='" . $parent_id . "'");

        echo common_dropdown('city_id', '', $arr, 'style="width:235px;"');

    }



}



// End of controller

