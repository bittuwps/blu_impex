<?php



class Faq extends Admin_Controller {



  public function __construct() {

    parent::__construct();

    $this->load->model(array('faq/faq_model'));

    $this->config->set_item('menu_highlight', 'other management');

  }



  public function index() {



    $pagesize = (int) $this->input->get_post('pagesize');



    $config['limit'] = ( $pagesize > 0 ) ? $pagesize : $this->config->item('pagesize');



    $offset = ( $this->input->get_post('per_page') > 0 ) ? $this->input->get_post('per_page') : 0;



    $base_url = current_url_query_string(array('filter' => 'result'), array('per_page'));



    $res_array = $this->faq_model->get_faq($config['limit'], $offset);



    $total_record = get_found_rows();



    $config['total_rows'] = $total_record;



    $data['page_links'] = admin_pagination($base_url, $config['total_rows'], $config['limit'], $offset);



    $data['res'] = $res_array;



    if ($this->input->post('status_action') != '') {

      $this->update_status('tbl_faq', 'faq_id');

    }



    if ($this->input->post('update_order') != '') {

      $this->update_displayOrder('tbl_faq', 'sort_order', 'faq_id');

    }



    $data['heading_title'] = 'Manage FAQ\'s';

    $data['pagelist'] = $res_array;

    $this->load->view('faq/view_faq_list', $data);

  }



  public function display() {



    $res = $this->faq_model->getHelpcenter_by_id($this->uri->segment(4));

    $data['heading_title'] = 'View FAQ Information';

    $data['page_title'] = 'View FAQ Information';

    $data['pageresult'] = $res;

    $this->load->view('common/view_helpcenter_detail', $data);

  }



  public function add() {

    $data['ckeditor'] = set_ck_config(array('textarea_id' => 'faq_answer'));

    $data['ckeditor1'] = set_ck_config(array('textarea_id' => 'faq_answer_p'));

    $data['heading_title'] = 'Add FAQ';

    

    $this->form_validation->set_rules('faq_question', 'Question', 'trim|required|xss_clean|max_length[250]');

    //$this->form_validation->set_rules('faq_question_p', 'Question Portuguese', 'trim|required|xss_clean|max_length[250]');

    

    $this->form_validation->set_rules('faq_answer', 'Answer', 'trim|required|required_stripped|xss_clean|min_length[20]|max_length[8500]');

    //$this->form_validation->set_rules('faq_answer_p', 'Answer Portuguese', 'trim|required|required_stripped|xss_clean|min_length[20]|max_length[8500]');

    

    if ($this->form_validation->run() == TRUE) {

      $posted_data = array(

          'faq_question' => $this->input->post('faq_question', TRUE),

          //'faq_question_p' => $this->input->post('faq_question_p', TRUE),

          'faq_answer' => $this->input->post('faq_answer', TRUE),

          //'faq_answer_p' => $this->input->post('faq_answer_p', TRUE),

          'faq_date_added' => $this->config->item('config.date.time')

      );

      $this->faq_model->safe_insert('tbl_faq', $posted_data, FALSE);

      $this->session->set_userdata(array('msg_type' => 'success'));

      $this->session->set_flashdata('success', lang('success'));

      redirect('sitepanel/faq', '');

    }

    $this->load->view('faq/view_faq_add', $data);

  }

  public function edit() {

    $data['ckeditor'] = set_ck_config(array('textarea_id' => 'faq_answer'));

    $data['ckeditor1'] = set_ck_config(array('textarea_id' => 'faq_answer_p'));

    $data['heading_title'] = 'Edit FAQ';

    $Id = (int) $this->uri->segment(4);

    $res = $this->faq_model->get_faq(1, 0, array('id' => $Id));

    if (is_array($res) && !empty($res)) {

      $this->form_validation->set_rules('faq_question', 'Question', 'trim|required|xss_clean|max_length[250]');

      $this->form_validation->set_rules('faq_question_p', 'Question Portuguese', 'trim|required|xss_clean|max_length[250]');

      $this->form_validation->set_rules('faq_answer', 'Answer', 'trim|required|required_stripped|xss_clean|max_length[8500]');

      $this->form_validation->set_rules('faq_answer_p', 'Answer Portuguese', 'trim|required|required_stripped|xss_clean|min_length[20]|max_length[8500]');

      

      if ($this->form_validation->run() == TRUE) {

        $posted_data = array(

            'faq_question' => $this->input->post('faq_question', TRUE),

            'faq_question_p' => $this->input->post('faq_question_p', TRUE),

            'faq_answer' => $this->input->post('faq_answer', TRUE),

            'faq_answer_p' => $this->input->post('faq_answer_p', TRUE)

        );

        $where = "faq_id = '" . $res['faq_id'] . "'";

        $this->faq_model->safe_update('tbl_faq', $posted_data, $where, FALSE);

        $this->session->set_userdata(array('msg_type' => 'success'));

        $this->session->set_flashdata('success', lang('successupdate'));

        redirect('sitepanel/faq/' . query_string(), '');

      }

      $data['res'] = $res;

      $this->load->view('faq/view_faq_edit', $data);

    } else {

      redirect('sitepanel/faq', '');

    }

  }

}

//controllet end