<?php
class Swatches extends Admin_Controller
{
	public function __construct()
	{		
		parent::__construct(); 				
		$this->load->model(array('swatch/swatch_model'));
		$this->config->set_item('menu_highlight','Swatch management');				
	}
	 
	public  function index()
	{
		
		
		 $pagesize               =  (int) $this->input->get_post('pagesize');
	     $config['limit']		 =  ( $pagesize > 0 ) ? $pagesize : $this->config->item('pagesize');		 		 				
		 $offset                 =  ( $this->input->get_post('per_page') > 0 ) ? $this->input->get_post('per_page') : 0;		
		 $base_url               =  current_url_query_string(array('filter'=>'result'),array('per_page'));				 
		 $parent_id              =   (int) $this->uri->segment(4,0);			
	     
		 $keyword = trim($this->input->get_post('keyword',TRUE));		
		 $keyword = $this->db->escape_str($keyword);
	     $condtion = " ";
		 
		
									
		$condtion_array = array(
		                'field' =>"*",
						 'index'=>'swatch_id',
						 
						  'debug'=>FALSE
						 );							 						 	
		
                $res_array              =  $this->swatch_model->getswatch($condtion_array);
//print_r($res_array);exit;
		$config['total_rows']	=  $this->swatch_model->total_rec_found;	
		
		$data['page_links']     =  admin_pagination($base_url,$config['total_rows'],$config['limit'],$offset);
				
		$data['heading_title']  =  'Swatches';
						
		$data['res']            =  $res_array; 	
		
		$data['parent_id']      =  $parent_id; 	
		
		
		if( $this->input->post('status_action')!='')
		{			
			$this->update_status('wl_swatch','swatch_id');			
		}
		
						
		$this->load->view('catalog/view_swatch_list',$data);		
		
		
	}	
	
	public function add()
	{
		 $data['heading_title'] = 'Add Swatch';
		
		
                 //print_r($this->input->post('swatch_name'));
                 //print_r($this->input->post('image'));exit;
		$this->form_validation->set_rules('swatch_name','Swatch Name',"trim|required|max_length[60]|xss_clean|unique[wl_swatch.swatch_name='".$this->db->escape_str($this->input->post('swatch_name'))."' AND status!='2']");
		$this->form_validation->set_rules('image','Image',"file_allowed_type[image]|required|xss_clean");
		
		 
		if($this->form_validation->run()===TRUE)
		{
                    
                    if($this->input->post('upload')){
                        
                        
                        if(!empty($_FILES) && @$_FILES['image']['name']!=''){
                            $uploaded_file = $_FILES['image']['name'];
                            $this->load->library('upload');
                            $uploaded_data = $this->upload->my_upload('image','swatches');
                            if(is_array($uploaded_data) && !empty($uploaded_data)){
                                $uploaded_file = $uploaded_data['upload_data']['file_name'];
                            }
                        }
                         $posted_data = array(
					'swatch_name'=>$this->input->post('swatch_name'),
                                        'swatch_date_added'=>$this->config->item('config.date.time'),
                                        'image'=>$uploaded_file
				 );
                    }
                    
			    
								
		    $this->swatch_model->safe_insert('wl_swatch',$posted_data,FALSE);	
								
			$this->session->set_userdata(array('msg_type'=>'success'));			
			$this->session->set_flashdata('success',lang('success'));				
			redirect('sitepanel/swatches', '');		
					
		}
                //print_r("hello");exit;
		$this->load->view('catalog/view_swatch_add',$data);		  
		  
	}
	
	
	public function edit()
	{
		$swatchId = (int) $this->uri->segment(4);
		
		$rowdata=$this->swatch_model->get_swatch_by_id($swatchId);
		
		$data['heading_title'] = 'Edit Swatch';
               
		if($this->input->post('edit_upload')!='Update'){
                   
		if( !is_array($rowdata) )
		{
                    
			$this->session->set_flashdata('message', lang('idmissing'));	
			redirect('sitepanel/swatches', ''); 	
			
                }}
                
		$swatchId = $rowdata['swatch_id'];
               
                        $this->form_validation->set_rules('swatch_name','Swatch Name',"trim|required|max_length[32]|xss_clean|");

			$this->form_validation->set_rules('image','Image',"required|file_allowed_type[image]|xss_clean");
			 		
			if($this->form_validation->run()==TRUE)
			{
                            
                             //echo $this->input->post('swatch_name');die();
                            if($this->input->post('edit_upload')){
                               //echo "in edity_post";exit;
                                if(!empty($_FILES) && @$_FILES['image']['name']!=''){
                                    $this->load->library('upload');
                                    $uploaded_data = $this->upload->my_upload('image','swatches');
                                    if(is_array($uploaded_data) && !empty($uploaded_data)){
                                        $uploaded_file = $uploaded_data['upload_data']['file_name'];
                                        $unlink_image = array('source_dir'=>"swatches",'source_file'=>$rowdata['image']);
					   removeImage($unlink_image);
                                           
                                    }
                                    
                                }
                                
                                
                            }
				$posted_data = array(
					'swatch_name'=>$this->input->post('swatch_name'),
					'image'=>$uploaded_file,
					'swatch_date_updated'=>$this->config->item('config.date.time')
				 );
				 //print_r($posted_data);exit;
			 	$where = "swatch_id = '".$swatchId."'"; 				
				$this->swatch_model->safe_update('wl_swatch',$posted_data,$where,FALSE);	
				//echo_sql();exit;			
				$this->session->set_userdata(array('msg_type'=>'success'));				
				$this->session->set_flashdata('success',lang('successupdate'));								
				
				redirect('sitepanel/swatches'.'/'.query_string(), ''); 	
							
			}else{
                            $data['edit_result']=$rowdata;		
		$this->load->view('catalog/view_swatch_edit',$data);				
                        }						
                	
		$data['edit_result']=$rowdata;		
		$this->load->view('catalog/view_swatch_edit',$data);				
		
	}
	
	
}
// End of controller