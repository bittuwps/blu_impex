<?php

class Swatsquad extends Admin_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model(array('size/coupan_model'));
        $this->config->set_item('menu_highlight', 'product management');
    }

    public function index() {
        if ($this->input->post('status_action') != '') {
            $this->update_status('wl_swatssquad', 'swats_id');
        }

        $res = $this->db->query("SELECT * FROM wl_swatssquad ORDER BY swats_id DESC")->result_array();

        $data['res'] = $res;
        $data['heading_title'] = "Swatsquad";
        $this->load->view('swatsquad/swatsquad', $data);
    }

    public function add() {
        $data['heading_title'] = 'Add images';
        if ($this->input->post('action') && ($this->input->post('action') == 'add' )) {

            //$this->form_validation->set_rules('image_name','Image Name',"trim|required|max_length[100]");
            $this->form_validation->set_rules('images[]', 'Upload Image', "required|file_allowed_type[image]");
            //$this->form_validation->set_rules('images[]','Upload Image','required|file_allowed_type[image]');
//            print_r($_FILES['images']['error']);
//            print_r($this->form_validation->run());exit;

            if ($this->form_validation->run() == TRUE) {
                if ($this->checkimage() == true) {
                    $number_of_files = sizeof($_FILES['images']['tmp_name']);
                    
                    if ($number_of_files > 0) {

                        $files = $_FILES['images'];
                        $status = true;

                        if ($status == true) {
                            $errors = array();
                            $this->load->library('upload');

                            $data1 = array();

                            $config['upload_path'] = UPLOAD_DIR . "/swatssqaud/";

                            $config['allowed_types'] = 'jpg|jpeg|png|gif';

                            for ($i = 0; $i < $number_of_files; $i++) {

                                $_FILES['uploaded_images']['name'] = $files['name'][$i];
                                $_FILES['uploaded_images']['type'] = $files['type'][$i];
                                $_FILES['uploaded_images']['tmp_name'] = $files['tmp_name'][$i];
                                $_FILES['uploaded_images']['error'] = $files['error'][$i];
                                $_FILES['uploaded_images']['size'] = $files['size'][$i];

                                $this->upload->initialize($config);
                                if (!$this->upload->do_upload('uploaded_images')) {
                                    $error = $this->upload->display_errors();
                                    $this->session->set_userdata('swats_error', $error);
                                    //print_r($this->session->userdata('swats_error'));exit;
                                    //$this->load->view('swatsquad/view_swatsquad_add', $data);
                                    
                                } elseif($this->upload->do_upload('uploaded_images')){
                                    $data1['uploads'][$i] = $this->upload->data();
                                    $uploaded_file = $data1['uploads'][$i]['file_name'];

                                    $added_date = date('Y-m-d H:i:s');
                                    $added_by = '1';
                                    //INsert into table;
                                    $this->db->query("INSERT INTO wl_swatssquad SET swats_added_date = '" . $added_date . "', swats_image = '" . $uploaded_file . "', status='1', added_by='" . $added_by . "'");
                                    
                                }
                            }
                        }
                    }
                    if(!$this->session->userdata('swats_error')){
                        $this->session->set_userdata(array('msg_type' => 'success'));
                        $this->session->set_flashdata('success', lang('success'));
                        redirect('sitepanel/swatsquad');
                    }
                                    
                } else {

                    echo '<script type="text/javascript">alert("Please select at least one image!"); </script>';
                }
            }
        }

        $this->load->view('swatsquad/view_swatsquad_add', $data);
    }

    public function checkimage() {
        if (is_array($_FILES['images']['tmp_name']) && !empty($_FILES['images']['tmp_name'][0])) {
            return true;
        } else {
            $this->form_validation->set_message('checkimage', 'Please select at least one image!');
            return false;
        }
    }

}

// End of controller