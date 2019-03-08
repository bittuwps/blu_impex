<?php

class Setting extends Admin_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('ckeditor');
        $this->load->model(array('sitepanel/setting_model'));
    }

    public function index($page = null)
    {
        $data['heading_title'] = 'Admin Setting';
        $data['admin_info'] = get_db_single_row('tbl_admin','*',"`admin_id`='1'"); //$this->setting_model->get_admin_info(1);
        $this->load->view('dashboard/setting_edit_view', $data);
    }

    public function edit()
    {
        if(is_post()){
            $post=$this->input->post();
            $this->form_validation->set_rules('admin_email', 'Email ID', 'required|valid_email');
            $this->form_validation->set_rules('phone', 'Phone Number', 'required|max_length[15]|numeric');
            $this->form_validation->set_rules('address', 'Address', 'required');
            $this->form_validation->set_rules('site_name', 'Site Name', 'required');
            $this->form_validation->set_rules('site_url', 'Site url link', 'required');
            $this->form_validation->set_rules('site_phone_no', 'Site Phone no', 'required');
            $this->form_validation->set_rules('site_email', 'Site Email', 'required|valid_email');
            
            if ($this->form_validation->run() == true) {
                $data=filter_arr($post,tbl_cols('tbl_admin',FALSE));
                $this->setting_model->safe_update('tbl_admin',$data,"`admin_id`='1'");
                set_success('Admin Setting Has Changed');
                redirect('sitepanel/');
            }else{
                set_err('Admin Setting Not Changed Try Again');
                $data['errs']=$this->form_validation->error_arr();
            }
        }
        
        $data['heading_title'] = 'Admin Setting';
        $data['admin_info'] = get_db_single_row('tbl_admin','*',"`admin_id`='1'");
        $this->load->view('dashboard/setting_edit_view', $data);
    }

    public function change_pass(){
        if(is_post()){
            $post=$this->input->post();
            $v=$this->form_validation;
            $v->set_rules('old_pass', 'Old Password', 'required|max_length[80]');
            $v->set_rules('new_pass', 'New Password', 'required|valid_password|max_length[80]');
            $v->set_rules('confirm_password', 'Confirm Password', 'required|matches[new_pass]|max_length[80]');
            if($v->run()){
                $admin = $this->setting_model->get_admin_info(1);
                if($admin->admin_password != $post['old_pass']){
                    set_err('Old Password Not Match with current Password.');
                }else{
                    set_success('Password Changed Successfully');
                    $data['admin_password']=$post['new_pass'];
                    $this->setting_model->safe_update('tbl_admin',$data,"`admin_id`='".$this->session->userdata('admin_id')."'");
                    redirect('sitepanel/');
                }
            }else{
                set_err('Password Not Changed Try Again');
                $data['errs']=$v->error_arr();
            }
        }
        $data['heading_title'] = 'Change Admin Password';
        $this->load->view('dashboard/change_pass', $data);
    }

}

// End of controller
