<?php

class contact extends Public_Controller {

  public function __construct() {
    parent::__construct();
  }

  public function index() {
    $data['title'] = '';
    $this->load->view('contact', $data);
  }

  public function contact_us() {
    $this->form_validation->set_rules('name', 'Your Name', 'trim|required');
    $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
    $this->form_validation->set_rules('title', 'Title', 'trim|required');
    $this->form_validation->set_rules('edition', 'Edition', 'trim|required');
    $this->form_validation->set_rules('toppings[]', 'Toppings', 'trim|required');
    $this->form_validation->set_rules('comment', 'Comment', 'trim|required');

    if ($this->form_validation->run() == TRUE) {
      //echo "<pre>";print_r($this->input->post());echo "</pre>";die;

      $toppings = implode(",", $this->input->post('toppings'));

      $subject = 'New query is posted on Test Bank';

      $body = '
                      <table border="0" style="width:100%">
                      <tbody>
                      <tr>
                      <td colspan="3"><strong></strong></td> 
                      </tr>
                      <tr>
                      <td colspan="3">You have new query with the following details:</td>
                      </tr>
                      <tr>
                      <td colspan="3">&nbsp;</td>
                      </tr>
                      
                      <tr>
                      <td style="width:20%"><strong>NAME:</strong></td>
                      <td style="width:5%">:</td>
                      <td style="width:75%">{name}</td>
                      </tr>
                      
                      <tr>
                      <td style="width:20%"><strong>EMAIL:</strong></td>
                      <td style="width:5%">:</td>
                      <td style="width:75%">{email}</td>
                      </tr>
                      
                      <tr>
                      <td style="width:20%"><strong>TITLE:</strong></td>
                      <td style="width:5%">:</td>
                      <td style="width:75%">{title}</td>
                      </tr>
                      
                       <tr>
                      <td style="width:20%"><strong>EDITION:</strong></td>
                      <td style="width:5%">:</td>
                      <td style="width:75%">{edition}</td>
                      </tr>
                      
                      <tr>
                      <td style="width:20%"><strong>TOPPINGS:</strong></td>
                      <td style="width:5%">:</td>
                      <td style="width:75%">{toppings}</td>
                      
                      </tr>
                      <tr>
                      <td style="width:20%"><strong>COMMENTS:</strong></td>
                      <td style="width:5%">:</td>
                      <td style="width:75%">{comment}</td>
                      </tr> 
                      
                      <tr>
                      <td colspan="3"><strong></strong></td> 
                      </tr>
                      
                      <tr>
                      <td colspan="3"><strong></strong></td> 
                      </tr>
                      
                      <tr>
                      <td colspan="2" style="text-align:center">&copy; ' . date('Y') . ' Test Bank. All rights reserved.</td>
                      </tr>
                  </tbody>
                  </table>';

      $body = str_replace('{name}', $this->input->post('name'), $body);
      $body = str_replace('{email}', $this->input->post('email'), $body);
      $body = str_replace('{title}', $this->input->post('title'), $body);
      $body = str_replace('{edition}', $this->input->post('edition'), $body);
      $body = str_replace('{comment}', $this->input->post('comment'), $body);
      $body = str_replace('{toppings}', $toppings, $body);
      $body = str_replace('{site_name}', $this->config->item('site_name'), $body);

      // echo $body;die;

      $config = array(
          'protocol' => 'sendmail',
          'mailtype' => 'html',
          'charset' => 'utf-8',
          'priority' => '1'
      );

      $from = ADMIN_EMAIL_FROM;
      $to = ADMIN_EMAIL;


      ///$to='farman@web-shuttle.com'
      //$to="farmanahmed15@gmail.com";
      $this->load->library('email');
      $this->email->initialize($config);
      $this->email->from($from, 'Testbank');
      $this->email->to($to);
      $this->email->subject($subject);
      $this->email->message($body);
      $vartt = $this->email->send();

//         if($vartt){
//             echo "Mail Sent Successfully";die;
//         }else{
//             echo "Mail Not Sent Successfully";die;
//         }

      $msg = "Thank you for submitting your query.  One of our experts will get in touch with you shortly.";
      $this->session->set_userdata(array('msg_type' => 'success'));
      $this->session->set_userdata('contact_success', 'YES');
      $this->session->set_flashdata('success', $msg);
      redirect(base_url('contact#contactusform'));
    }
    $this->load->view('contact');
  }

}

/* End of file member.php */
/* Location: .application/modules/member/member.php */