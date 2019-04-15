<?php



if (!defined('BASEPATH'))

  exit('No direct script access allowed');


/* Users_model */
class Users_model extends MY_Model {



  /**

   * Get account by id

   *

   * @access public

   * @param string $account_id

   * @return object account object

   */

  public function create_user() {

    $password = $this->safe_encrypt->encode($this->input->post('password', TRUE));

    $register_array = array(

        'user_name' => $this->input->post('email_address', TRUE),

        'password' => $password,

        'first_name' => $this->input->post('first_name', TRUE),

        'last_name' => $this->input->post('last_name', TRUE),

        'gender' => $this->input->post('gender', TRUE),

        'mobile_number' => $this->input->post('mobile_number', TRUE),

		'user_location' => $this->input->post('user_location', TRUE),

        'actkey' => md5($this->input->post('login_username', TRUE)),

        'account_created_date' => $this->config->item('config.date.time'),

        'current_login' => $this->config->item('config.date.time'),

        'status' => '1',

        'is_verified' => '1',

        'ip_address' => $this->input->ip_address()

    );

    $insId = $this->safe_insert('wl_customers', $register_array, FALSE);

    if ($insId > 0) {

      $add_array = array(

          'customer_id' => $insId,

          'reciv_date' => $this->config->item('config.date.time'),

          'address_type' => 'Bill',

          'default_status' => 'Y'

      );

      $this->safe_insert('wl_customers_address_book', $add_array, FALSE);

    }

    return $insId;

  }



  public function is_email_exits($data) {

    $this->db->select('customers_id');

    $this->db->from('wl_customers');

    $this->db->where($data);

    $this->db->where('status !=', '2');



    $query = $this->db->get();

    if ($query->num_rows() == 1) {

      return TRUE;

    } else {

      return FALSE;

    }

  }



  public function logout() {

    $data = array(

        'user_id' => 0,

        'email' => 0,

        'name' => 0,

        'user_photo' => 0,

        'logged_in' => FALSE

    );

    $this->session->sess_destroy();

    $this->session->unset_userdata($data);

  }



}



/* End of file users_model.php */

/* Location: ./application/modules/users/models/users_model.php */