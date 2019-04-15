<?php

class Help_guide extends Public_Controller {

  public function __construct() {
    parent::__construct();
    $this->load->model(array('users/users_model', 'products/product_model'));
  }

  public function index() {
    $this->load->view('web_apis/user_guide');
  }
}

/* End of file help_guide.php */
/* Location: .application/modules/web_apis/controllers/help_guide.php */