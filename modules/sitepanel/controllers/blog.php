<?php

class Blog extends Admin_Controller
{

    public function __construct()
    {

        parent::__construct();

        $this->load->model(array('blog/blog_model'));

        //$this->load->helper('blogcategory/blogcategory');

        $this->config->set_item('menu_highlight', 'manage tips');

    }

    public function index($page = null)
    {

        $condtion = array();

        $pagesize = (int) $this->input->get_post('pagesize');

        $config['limit'] = ($pagesize > 0) ? $pagesize : $this->config->item('pagesize');

        $offset = ($this->input->get_post('per_page') > 0) ? $this->input->get_post('per_page') : 0;

        $base_url = current_url_query_string(array('filter' => 'result'), array('per_page'));

        $status = $this->input->get_post('status', true);

        if ($status != '') {

            $condtion['status'] = $status;

        }

        $res_array = $this->blog_model->get_blog($config['limit'], $offset, $condtion);

        //echo_sql();

        $config['total_rows'] = get_found_rows();

        $data['heading_title'] = 'Tips Lists';

        $data['res'] = $res_array;

        $data['page_links'] = admin_pagination($base_url, $config['total_rows'], $config['limit'], $offset);

        if ($this->input->post('status_action') != '') {

            $this->update_status('wl_blog', 'article_id');

        }

        /* Product set as a */

        if ($this->input->post('set_as') != '') {

            $set_as = $this->input->post('set_as', true);

            $this->set_as('wl_blog', 'article_id', array($set_as => '1'));

        }

        if ($this->input->post('unset_as') != '') {

            $unset_as = $this->input->post('unset_as', true);

            $this->set_as('wl_blog', 'article_id', array($unset_as => '0'));

        }

        /* End product set as a */

        $data['category_result_found'] = "Total " . $config['total_rows'] . " result(s) found ";

        $this->load->view('catalog/view_blog_list', $data);

    }

    public function add()
    {

        $seo_url_length = $this->config->item('seo_url_length');

        $data['heading_title'] = 'Add Tips';

        $data['ckeditor'] = set_ck_config(array('textarea_id' => 'article_desc'));

        $data['ckeditor1'] = set_ck_config(array('textarea_id' => 'article_desc_p'));

        $this->form_validation->set_rules('article_title', 'Title', "trim|required|max_length[200]");

        $this->form_validation->set_rules('article_title_p', 'Title Portuguese', "trim|required|max_length[200]");

        $this->form_validation->set_rules('blog_author', 'Author Name', "trim|required|alpha|max_length[80]");

        $this->form_validation->set_rules('short_desc', 'Short Description', "trim|required|max_length[450]");

        $this->form_validation->set_rules('short_desc_p', 'Short Description Portuguese', "trim|required|max_length[450]");

        $this->form_validation->set_rules('article_desc', 'Description', "required|max_length[8500]");

        $this->form_validation->set_rules('article_desc_p', 'Description in Portuguese', "required|max_length[8500]");

        $this->form_validation->set_rules('image1', 'Image', "required|file_allowed_type[image]");

        if ($this->form_validation->run() === true) {

            $uploaded_file = "";

            if (!empty($_FILES) && $_FILES['image1']['name'] != '') {

                $this->load->library('upload');

                $uploaded_data = $this->upload->my_upload('image1', 'blog');

                if (is_array($uploaded_data) && !empty($uploaded_data)) {

                    $uploaded_file = $uploaded_data['upload_data']['file_name'];

                }

            }

            $posted_data = array(

                'article_title' => $this->input->post('article_title', true),

                'article_title_p' => $this->input->post('article_title_p', true),

                'friendly_url' => $this->input->post('friendly_url'),

                'blog_author' => $this->input->post('blog_author'),

                'short_desc' => $this->input->post('short_desc'),

                'short_desc_p' => $this->input->post('short_desc_p'),

                'article_desc' => $this->input->post('article_desc'),

                'article_desc_p' => $this->input->post('article_desc_p'),

                'article_image' => $uploaded_file,

                'post_date' => $this->config->item('config.date.time'),

            );

            $blogId = $this->blog_model->safe_insert('wl_blog', $posted_data, false);

            if ($blogId) {

                $posted_friendly_url = $this->input->post('friendly_url');

                $this->cbk_friendly_url = seo_url_title($posted_friendly_url);

                $redirect_url = "blog/details";

                $meta_array = array(

                    'entity_type' => $redirect_url,

                    'entity_id' => $blogId,

                    'page_url' => $this->cbk_friendly_url,

                    'meta_title' => get_text($this->input->post('article_title'), 80),

                    'meta_description' => get_text($this->input->post('article_desc')),

                    'meta_keyword' => get_keywords($this->input->post('article_desc')),

                );

                create_meta($meta_array);

            }

            //$this->add_product_media($productId);

            $this->session->set_userdata(array('msg_type' => 'success'));

            $this->session->set_flashdata('success', lang('success'));

            redirect('sitepanel/blog/index/', '');

        }

        $this->load->view('catalog/view_blog_add', $data);

    }

    public function edit()
    {

        $seo_url_length = $this->config->item('seo_url_length');
        $data['heading_title'] = 'Edit Tips';
        $blogId = (int) $this->uri->segment(4);
        $option = array('productid' => $blogId);
        $res = $this->blog_model->get_blog(1, 0, $option);
        $data['res'] = $res;
        $data['ckeditor'] = set_ck_config(array('textarea_id' => 'article_desc'));
        $data['ckeditor1'] = set_ck_config(array('textarea_id' => 'article_desc_p'));

		$this->form_validation->set_rules('article_title', 'Title', "trim|required|max_length[200]");
        $this->form_validation->set_rules('article_title_p', 'Title Portuguese', "trim|required|max_length[200]");
        $this->form_validation->set_rules('blog_author', 'Author Name', "trim|required|alpha|max_length[80]");
        $this->form_validation->set_rules('short_desc', 'Short Description', "trim|required|max_length[450]");
        $this->form_validation->set_rules('short_desc_p', 'Short Description Portuguese', "trim|required|max_length[450]");
        $this->form_validation->set_rules('article_desc', 'Description', "required|max_length[8500]");
        $this->form_validation->set_rules('article_desc_p', 'Description in Portuguese', "required|max_length[8500]");
        $this->form_validation->set_rules('image1', 'Image', "file_allowed_type[image]");

        if (is_array($res) && !empty($res)) {
            $posted_friendly_url = $this->input->post('friendly_url');
            $this->cbk_friendly_url = seo_url_title($posted_friendly_url);
            $redirect_url = "blog/details";
            if ($this->form_validation->run() == true) {
                $uploaded_file = $res['article_image'];
                $unlink_image = array('source_dir' => "blog", 'source_file' => $res['article_image']);
                if (!empty($_FILES) && $_FILES['image1']['name'] != '') {
                    $this->load->library('upload');
                    $uploaded_data = $this->upload->my_upload('image1', 'blog');
                    if (is_array($uploaded_data) && !empty($uploaded_data)) {
                        $uploaded_file = $uploaded_data['upload_data']['file_name'];
                        removeImage($unlink_image);
                    }
                }

                $posted_data = array(

                    'article_title' => $this->input->post('article_title'),
                    'article_title_p' => $this->input->post('article_title_p', true),
                    'friendly_url' => $this->input->post('friendly_url'),
                    'blog_author' => $this->input->post('blog_author'),
                    'short_desc' => $this->input->post('short_desc'),
                    'short_desc_p' => $this->input->post('short_desc_p'),
                    'article_desc' => $this->input->post('article_desc'),
                    'article_desc_p' => $this->input->post('article_desc_p'),
                    'article_image' => $uploaded_file,
                );

                $where = "article_id = '" . $blogId . "'";

                $this->blog_model->safe_update('wl_blog', $posted_data, $where, false);
                //update meta
				update_meta_page_url($redirect_url, $res['article_id'], $this->cbk_friendly_url);
				//last_qry();
                //End here
                $this->session->set_userdata(array('msg_type' => 'success'));
                $this->session->set_flashdata('success', lang('successupdate'));
                redirect('sitepanel/blog/index/', '');
            }else{
                echo validation_errors();
            }
            $this->load->view('catalog/view_blog_edit', $data);
        } else {
            redirect('sitepanel/blog', '');
        }

    }

    public function comment()
    {

        $ref_article_id = (int) $this->uri->segment(4);

        $pagesize = (int) $this->input->get_post('pagesize');

        $config['limit'] = ($pagesize > 0) ? $pagesize : $this->config->item('pagesize');

        $offset = ($this->input->get_post('per_page') > 0) ? $this->input->get_post('per_page') : 0;

        $base_url = current_url_query_string(array('filter' => 'result'), array('per_page'));

        $keyword = trim($this->input->get_post('keyword', true));

        $keyword = $this->db->escape_str($keyword);

        $condtion = "";

        if ($ref_article_id != '') {

            $condtion = "&& ref_article_id = '" . $ref_article_id . "'";

        }

        $status = $this->input->get_post('status', true);

        $keyword = $this->input->get_post('keyword', true);

        if ($status != '') {

            $condtion['status'] = $status;

        }

        if ($keyword != '') {

            $condtion['keyword'] = $keyword;

        }

        $condtion_array = array(

            'field' => "*",

            'condition' => $condtion,

            'ref_article_id' => $ref_article_id,

            'type' => 'A',

            'debug' => false,

        );

        $res_array = $this->blog_model->get_review_comment($config['limit'], $offset, $condtion_array);

        $data['title'] = 'Blog Comment';

        $config['total_rows'] = $this->blog_model->total_rec_found;

        $data['page_links'] = admin_pagination($base_url, $config['total_rows'], $config['limit'], $offset);

        $data['heading_title'] = 'Comments';

        $data['ref_article_id'] = $ref_article_id;

        $data['res'] = $res_array;

        if ($this->input->post('status_action') != '') {

            $this->update_status('wl_blog_comment', 'comment_id');

        }

        if ($this->input->post('update_order') != '') {

            $this->update_displayOrder('wl_blog_comment', 'sort_order', 'comment_id');

        }

        $this->load->view('catalog/view_comment_list', $data);

    }

}

// End of controller
