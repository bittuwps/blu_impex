<?php



class Blog extends Public_Controller

{



    public function __construct()

    {
        parent::__construct();
        $this->load->model(array('blog/blog_model'));
        $this->load->helper(array('blog'));
        $this->lang->load('portuguese', 'portuguese');
    }

    public function index()
    {

		/*
			$category_id   Segment used for category_id,featured,new arrival hot product
		*/

        $condtion = array();
        $record_per_page = (int) $this->input->post('per_page');
        $category_id = $this->uri->segment(3);
        $page_segment = find_paging_segment();
        $config['per_page'] = ($record_per_page > 0) ? $record_per_page : $this->config->item('per_page');
        $offset = (int) $this->uri->segment($page_segment, 0);
        $base_url = ($category_id != '' && $category_id != 'pg') ? "blog/index/$category_id/pg/" : "blog/index/pg/";
        $condtion['status'] = '1';
        $page_title = ($this->session->userdata('lang') == 'p') ? $this->lang->line('Myaccount') : "Blog Lists";
        if ($category_id > 0) {
            $condtion['id'] = $category_id;
            $page_title = get_db_field_value('wl_blog_category', 'cat_name', "WHERE id='$category_id'");
            $data['heading_title'] = $page_title;
        } else {
            $data['heading_title'] = ($this->session->userdata('lang') == 'p') ? $this->lang->line('Myaccount') : "Our Blog";
        }

        $res_array = $this->blog_model->get_blog($config['per_page'], $offset, $condtion);

        $config['total_rows'] = get_found_rows();
        $data['page_links'] = front_pagination("$base_url", $config['total_rows'], $config['per_page'], $page_segment);
        $data['res'] = $res_array;
        $this->load->view('blog/view_blog_listing', $data);
    }



    public function details()
    {
        global $meta_array;
        $data['unq_section'] = "Blog";
        $blog_id = (int) $this->meta_info['entity_id']; //(int) $this->uri->segment(3);
        $option = array('productid' => $blog_id);
        $res = $this->blog_model->get_blog(1, 0, $option);

        if (is_array($res)) {
            $data['title'] = "Blog";
            $data['res'] = $res;
            if ($this->input->post('action') == "post_comment") {
                // Post comment Start
                $this->form_validation->set_rules('comment', 'Comment', 'trim|required|xss_clean|max_length[8500]');
                $this->form_validation->set_rules('name', 'Name', 'trim|required|alpha|xss_clean|max_length[60]');
                $this->form_validation->set_rules('email', 'Email Id', 'trim|required|valid_email|max_length[200]');
                //    trace($this->session->userdata);
                if ($this->form_validation->run() == true) {
                    $posted_data = array('ref_article_id' => $blog_id,
                        'mem_name' => $this->input->post('name'),
                        'comment' => $this->input->post('comment'),
                        'mem_email' => $this->input->post('email'),
                        'post_date' => $this->config->item('config.date.time'),
                        'status' => '1',
                    );

                    $this->blog_model->safe_insert('wl_blog_comment', $posted_data, false);
                    $message = "Comment posted successfully.";
                    $message = str_replace('<site_name>', $this->config->item('site_name'), $message);
                    $this->session->set_userdata(array('msg_type' => 'success'));
                    $this->session->set_flashdata('success', $message);
                    redirect($_SERVER['HTTP_REFERER']);
                }
            }
            // Post comment End
            $data['meta_array'] = array(
                "meta_title" => $res['article_title'],
                "meta_description" => character_limiter(strip_tags($res['article_title']), 330),
                "meta_keyword" => $res['article_title'],
            );

            $cparam = array('ref_article_id' => $blog_id, "status" => 1);
            $data['comm'] = $this->blog_model->get_blog_comment(false, false, $cparam);
            $this->load->view('blog/view_blog_details', $data);
        } else {
            redirect('blog', '');
        }
    }

}