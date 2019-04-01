<?php $this->load->view('includes/header'); ?>  
<div class="page-title">                    
    <h2><span ></span><?php echo $heading_title; ?></h2>
    <div class="buttons">
        <a href="<?php echo base_url(); ?>sitepanel/newsletter/add/" class="btn btn-primary pull-right">Add Newsletter Subscriber</a>

    </div>
</div>

     <div class="page-content-wrap">    
         <div class="fix"></div>

    <div class="row">
        <div class="col-md-12">
            <?php if($this->session->flashdata('success')){?>
            <div class="alert alert-info">
                <?php echo $this->session->flashdata('success');?>
            </div>
            <?php }?>

            <!-- START DEFAULT DATATABLE -->
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="table-responsive">
    <?php 
			
     		if( count($pagelist) > 0 ){ 
     		 	echo form_open("sitepanel/newsletter/change_status/",'id="data_form"');
     		 	?>
			  <table class="table datatable" width="100%" id="my_data">     
		        <thead>
		          <tr>
		            <th width="20" style="text-align: center;">
                    
                    <input type="checkbox" onclick="$('input:checkbox').not(this).prop('checked', this.checked);" />
                    
		            	<input type="hidden" name="add_group" id="add_group" value="" />
					 	<input type="hidden" name="keyword"  value="<?php echo set_value('keyword',$this->input->post('keyword'));?>" />
					 	<input type="hidden" name="ngroup_id" value="<?php echo $this->input->post('ngroup_id')?>" />
		            </th>
		            <th>Name</th>
						<th>Email</th>
						<th>Status</th>
						<th>Action</th>
		          </tr>
		        </thead>				
		        <tbody>
		        <?php 		
					foreach($pagelist as $catKey=>$pageVal)
					{
						$group_name=$this->newsletter_model->get_group_email($pageVal['subscriber_id']);
						
				  	 	?> 
		          	<tr>
		            	<td style="text-align: center;"><input type="checkbox" name="arr_ids[]" value="<?php echo $pageVal['subscriber_id'];?>" /></td>
		            	<td><?php echo $pageVal['subscriber_name'];?></td>
							<td style="line-height:20px">
								<?php echo $pageVal['subscriber_email'];?>
                                
                                
							</td>	
							<td><?php echo ($pageVal['status']==1)?"Active":"In-active";?></td>
							<td>
							  <?php
							  ?>
							  <?php echo anchor("sitepanel/newsletter/edit/$pageVal[subscriber_id]/".query_string(),'<span>Edit</span> ', 'class="btn btn-info"');?>
							  <?php
							  ?>
							</td>
		          	</tr>
                    
		         	<?php
				   }		  
				  ?> 
				  </tbody>
				       
					</table>
				  
				  <table class="list" width="100%">	    
					<tr>
						<td align="left" style="padding:2px" height="35">
							<input name="Send" type="submit"  value="Send Email" class="button2" id="Activate" onClick="return validcheckstatus('arr_ids[]','Send Email','Record','u_status_arr[]');"/>
              
              <input name="Delete" type="submit" class="button2" id="Delete" value="Delete"  onClick="return validcheckstatus('arr_ids[]','delete','Record');"/>
							<?php
              //echo $this->newsletter_group_model->group_drop_down('group_id',$this->input->post('group_id'),'style="width:150px;" class="button2" onchange="return onclickgroup(1)"',"Select");
								
							//echo $this->newsletter_group_model->group_drop_down('ugroup_id',$this->input->post('ugroup_id'),'style="width:150px;" class="button2"  onchange="return onclickgroup(2)"',"Unselect");
							?>
						</td>
					</tr>
		      </table>
				<?php 
				echo form_close();
			 }else{
			    echo "<center><strong> No Record(s) Found !</strong></center>" ;
			 }
		?>
  </div>
</div>
            </div>
        </div>
    </div>
     </div>
<script type="text/javascript">	
	$('#add_group').val(0);
	function onclickgroup(v){
		if(validcheckstatus('arr_ids[]','Group','Record','u_status_arr[]')){
			$('#add_group').val(v);
			$('#data_form').submit();
		}
	}	
</script>
<?php $this->load->view('includes/footer');