<?php
class Sm_app_color extends Admin_Controller
{
	public function __construct()
	{		
		parent::__construct(); 				
		$this->load->model(array('color/color_model'));
		$this->config->set_item('menu_highlight','product management');				
	}
	 
	public  function index()
	{
		
		$data['heading_title'] = "SM Backgorund Color";
                $res = $this->db->query("SELECT * FROM wl_sm_bg_colors WHERE status='1'")->result_array();
                //echo_sql();
//                echo "<pre>";
//                print_r($res);
                $data['res'] = $res;
		 $this->load->view('catalog/view_sm_color',$data);		
		
		
	}	
	
	public function add()
	{
		 $data['heading_title'] = 'Add SM Color';
		
		
		
		 $this->form_validation->set_rules('color_name','Color Name',"trim|required|max_length[32]|xss_clean|unique[wl_sm_bg_colors.color_name='".$this->db->escape_str($this->input->post('color_name'))."' AND status!='2']");
		$this->form_validation->set_rules('color_code','Color Code',"trim|required|max_length[6]|xss_clean");
		
		 
		if($this->form_validation->run()===TRUE)
		{
			    $posted_data = array(
					'color_name'=>$this->input->post('color_name'),
					'color_code'=>$this->input->post('color_code'),
					'color_date_added'=>$this->config->item('config.date.time')
				 );
                            //print_r($posted_data);exit;
								
		    $this->color_model->safe_insert('wl_sm_bg_colors',$posted_data,FALSE);	
								
			$this->session->set_userdata(array('msg_type'=>'success'));			
			$this->session->set_flashdata('success',lang('success'));				
			redirect('sitepanel/sm_app_color', '');		
					
		}	
		$this->load->view('catalog/view_sm_appcolor_add',$data);		  
		  
	}
	
	
	public function edit()
	{
		$colorId = (int) $this->uri->segment(4);
		
		$rowdata=$this->db->query("SELECT * FROM wl_sm_bg_colors WHERE bg_id='$colorId'")->result_array();
				
		//print_r($rowdata);exit;
		$rowdata = $rowdata[0];
                //print_r($rowdata);exit;
		$data['heading_title'] = 'Color';
		
		if( !is_array($rowdata) )
		{
			$this->session->set_flashdata('message', lang('idmissing'));	
			redirect('sitepanel/sm_app_color', ''); 	
			
		}
		$colorId = $rowdata['bg_id'];		

			$this->form_validation->set_rules('color_name','Color Name',"trim|required|max_length[32]|xss_clean|unique[wl_sm_bg_colors.color_name='".$this->db->escape_str($this->input->post('color_name'))."' AND status!='2' AND bg_id!='".$rowdata['bg_id']."']");

			$this->form_validation->set_rules('color_code','Color Code',"trim|required|max_length[6]|xss_clean");
			 		
			
			if($this->form_validation->run()==TRUE)
			{	
				$posted_data = array(
					'color_name'=>$this->input->post('color_name'),
					'color_code'=>$this->input->post('color_code'),
					'color_date_updated'=>$this->config->item('config.date.time')
				 );
				 
			 	$where = "bg_id = '".$colorId."'"; 				
				$this->color_model->safe_update('wl_sm_bg_colors',$posted_data,$where,FALSE);	
							
				$this->session->set_userdata(array('msg_type'=>'success'));				
				$this->session->set_flashdata('success',lang('successupdate'));								
				
				redirect('sitepanel/sm_app_color'.'/'.query_string(), ''); 	
							
			}						
			
		$data['edit_result']=$rowdata;		
		$this->load->view('catalog/view_app_color_edit',$data);				
		
	}
	
	
}
// End of controller