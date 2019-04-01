public function add_gallery_images() {
//echo "here";exit;
       $this->form_validation->set_rules('album_name', 'Album Name', "trim|required");
       $this->form_validation->set_rules('image', '', "required|callback_file_check");

       if ($this->form_validation->run() == TRUE) {

           $album_name = get_single_field($this->input->post('album_name'), 'wl_event_album', 'album_name', 'id');
           $number_of_files = sizeof($_FILES['image']['tmp_name']);
           $files = $_FILES['image'];

           for ($i = 0; $i < $number_of_files; $i++) {
               //echo $files['type'][$i];die;
               if ($files['type'][$i] == 'image/jpg' || $files['type'][$i] == 'image/png' || $files['type'][$i] == 'image/gif' || $files['type'][$i] == 'image/jpeg' || $files['type'][$i] == 'image/JPG' || $files['type'][$i] == 'image/PNG' || $files['type'][$i] == 'image/GIF') {
                   $uploaded_file = "";
                   $_FILES['image']['name'] = $files['name'][$i];
                   $_FILES['image']['type'] = $files['type'][$i];
                   $_FILES['image']['tmp_name'] = $files['tmp_name'][$i];
                   $_FILES['image']['error'] = $files['error'][$i];
                   $_FILES['image']['size'] = $files['size'][$i];

                   if (!empty($_FILES) && $_FILES['image']['name'] != '') {
                       $this->load->library('upload');
                       $uploaded_data = $this->upload->my_upload('image', "album/$album_name");
                       if (is_array($uploaded_data) && !empty($uploaded_data)) {
                           $uploaded_file_image = $uploaded_data['upload_data']['file_name'];
                       }
                   }

                   $posted_data = array(
                       'album_id' => $this->input->post('album_name', TRUE),
                       'image' => $uploaded_file_image,
                   );

                   $insertId = $this->gallery_model->safe_insert('wl_gallery', $posted_data, FALSE);
               }
           }
           $message = "New Image has been added successfuly!";
           $message = str_replace('<site_name>', $this->config->item('site_name'), $message);
           $this->session->set_userdata(array('msg_type' => 'success'));
           $this->session->set_flashdata('success', $message);
           redirect('sitepanel/gallery', '');
       }
       $data['albums'] = $this->gallery_model->get_all_album();
//        echo "<pre>";
//        print_r($data['albums']);exit;
       $data['heading_title'] = "Add Image";
       $this->load->view('gallery/view_post', $data);
   }
Ravikant • Now
