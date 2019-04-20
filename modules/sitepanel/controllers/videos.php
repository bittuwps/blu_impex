<?php

class Videos extends Admin_Controller {

    public function __construct() {
        parent::__construct();
        $this->config->set_item('menu_highlight', 'product management');
        $this->load->model(array('category/category_model'));
    }
  
    public function index(){
        if($this->input->server('REQUEST_METHOD') == 'POST'){
            $post=$this->input->post();
            $status=1;
            if($post['status_action'] == 'Deactivate')
                $status=2;
            else if($post['status_action'] == 'Delete')
                $status=0;
                
            $ids=implode(',',$post['arr_ids']); 
            $this->db->query("update wl_videos set `status`=".$status." where (`id` in (".$ids."))");
        }
        
        $data['videos']=$this->db->query("select * from wl_videos")->result_array();
        $data['heading_title']="Videos List";
        $this->load->view('video/list',$data);
    }
    
    public function add(){
        $data['heading_title']="Add Video";
        if($this->input->server('REQUEST_METHOD') == 'POST'){
            $this->form_validation->set_rules('title', 'Title', "required");
            $this->form_validation->set_rules('link', 'Link', "required|unique[wl_videos.link]");
            if(empty($_FILES['thumb_img']['name'])){
                $this->form_validation->set_rules('thumb_img', 'Thumb Image', "required");
            }
            $post=$this->input->post();
            if($this->form_validation->run()){
                $resp = $this->db->query("insert into wl_videos (`link`, `title`, `status`) values (?,?,?)",array($post['link'],$post['title'],'1'));
                $insert_id = $this->db->insert_id();
                if($resp){
                    
                    $this->load->library('upload');
                    $uploaded_data = $this->upload->my_upload('thumb_img', 'video_thumb');
                    
                    if (is_array($uploaded_data) && !empty($uploaded_data)) {
                        $new_data['thumb_img'] = $uploaded_data['upload_data']['file_name'];
                        $this->category_model->safe_update('wl_videos',$new_data,"`id`='$insert_id'");
                    }
                    
                    //$this->session->set_flashdata('msg','<div class="alert alert-success">Video Saved Successfully</div>');
                    redirect(base_url('sitepanel/videos'), 'refresh');
                }
            }
            $data['dtl']=$post;
        }else{
            $data['dtl']=array('title'=>'','link'=>'');
        }
        $this->load->view('video/add',$data);
    }
    
    public function edit($id){
        $data['heading_title']="Edit Video";
        if($this->input->server('REQUEST_METHOD') == 'POST'){
            $this->form_validation->set_rules('title', 'Title', "required");
            $this->form_validation->set_rules('link', 'Link', "required|unique[wl_videos.link and wl_videos.id != ".$id."]");
            
            if(empty($_FILES['thumb_img']['name'])){
                $this->form_validation->set_rules('thumb_img', 'Thumb Image', "required");
            }
            
            $post=$this->input->post();
            if($this->form_validation->run()){
               $resp = $this->db->query("update wl_videos set `link`=?, `title`=? where (`id`=?)",array($post['link'],$post['title'],$id));
                if($resp){
                   //$this->session->set_flashdata('msg','<div class="alert alert-success">Video Updated Successfully</div>');
                   
                    $this->load->library('upload');
                    $uploaded_data = $this->upload->my_upload('thumb_img', 'video_thumb');
                    
                    if (is_array($uploaded_data) && !empty($uploaded_data)) {
                        $new_data['thumb_img'] = $uploaded_data['upload_data']['file_name'];
                        $this->category_model->safe_update('wl_videos',$new_data,"`id`='$id'");
                    }

                   redirect(base_url('sitepanel/videos'), 'refresh');
                }
            }
            $data['dtl']=$post;
        }else{
            $data['dtl']=get_db_single_row('wl_videos','*',"`id`='".$id."'");
        }
        $this->load->view('video/add',$data);
    }
    
}

// End of controller