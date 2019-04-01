<?php



if (!defined('BASEPATH'))

  exit('No direct script access allowed');



class Home_model extends MY_Model {



  protected $table_name;



  public function __construct() {

    parent::__construct();

    $this->load->database();

    $this->table_name = 'wl_users';

  }



  public function getAll() {

    return $this->db->query("select * from ".$this->table_name." where status = '1'")->result_array();

  }

  

}



?>