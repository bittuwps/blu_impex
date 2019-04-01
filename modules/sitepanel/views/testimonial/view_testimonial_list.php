<?php $this->load->view('includes/header'); ?>

<div class="page-title">
    <h2><span><?php echo $heading_title;?></span></h2>
    <div class="buttons"><?php echo anchor("sitepanel/testimonial/post","<span>Post Testimonial</span>",'class="btn btn-primary pull-right" ' );?></div>
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
		if(is_array($res) && ! empty($res))
		{
			
		?>
        
			<?php echo form_open("sitepanel/testimonial/",'id="data_form"', 'class="form-horizontal"');?>
            
          
           
			<table class="table datatable" width="100%" id="my_data">
            
			<thead>
			  <tr>
				<td width="30" style="text-align: center;">
                                
                <input type="checkbox" onclick="$('input:checkbox').not(this).prop('checked', this.checked);" />
                
                </td>
				<td>Poster </td>
				<td>Description</td>
				<td>Status</td>
                <td>Action</td>
			  </tr>
			</thead>
			<tbody>
			<?php 	
			foreach($res as $catKey=>$pageVal)
			{ 
				
				
			?> 
				<tr>
					<td style="text-align: center;">
						<input type="checkbox" name="arr_ids[]" value="<?php echo $pageVal['testimonial_id'];?>" />
					</td>
					<td class="left">
						Name : <?php echo $pageVal['poster_name'];?>
            <br />
           
					<td><?php echo $pageVal['testimonial_description'];?></td>
					<td class="right"><?php echo ($pageVal['status']==1)? "Active":"In-active";?>
                    </td>
          <td><?php echo anchor("sitepanel/testimonial/edit/$pageVal[testimonial_id]/".query_string(),'<span>Edit</span>', 'class="btn btn-info"'); ?></td>
				</tr>
			<?php
			}		   
			?>      
			</tbody>
			<tr>
				<td align="left" colspan="5" style="padding:2px" height="35">
					<input name="status_action" type="submit"  value="Activate" class="button2" id="Activate" onClick="return validcheckstatus('arr_ids[]','Activate','Record','u_status_arr[]');"/>
					<input name="status_action" type="submit" class="button2" value="Deactivate" id="Deactivate"  onClick="return validcheckstatus('arr_ids[]','Deactivate','Record','u_status_arr[]');"/>
                    <input name="status_action" type="submit" class="button2" id="Delete" value="Delete"  onclick="return validcheckstatus('arr_ids[]','delete','Record');"/>
                    </td>
			</tr>
			</table>
			<?php
			echo form_close();
		}else{
			echo "<center><strong> No record(s) found !</strong></center>" ;
		}?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php if(1==2){?>
  <div id="content">
  
  <div class="breadcrumb">
  
       <?php echo anchor('sitepanel/dashbord','Home'); ?> &raquo; <?php echo $heading_title; ?> </a>   
             
   </div>      
       
 <div class="box">

     <div class="content">
 		<?php
		if(is_array($res) && ! empty($res))
		{
			
		?>
        
			<?php echo form_open("sitepanel/testimonial/",'id="data_form"');?>
            
          
           
			<table class="list" width="100%" id="my_data">
            
			<thead>
			  <tr>
				<td width="30" style="text-align: center;">
                                
                <input type="checkbox" onclick="$('input[name*=\'arr_ids\']').attr('checked', this.checked);" />
                
                </td>
				<td width="224" class="left">Poster </td>
			<!--	<td width="290" class="left">Title</td>-->
				<td width="335" class="left">Description</td>
				<td width="91" class="right">Status</td>
        <td width="100">Action</td>
			  </tr>
			</thead>
			<tbody>
			<?php 	
			foreach($res as $catKey=>$pageVal)
			{ 
				
				
			?> 
				<tr>
					<td style="text-align: center;">
						<input type="checkbox" name="arr_ids[]" value="<?php echo $pageVal['testimonial_id'];?>" />
					</td>
					<td class="left">
						Name : <?php echo $pageVal['poster_name'];?>
            <br />
           <!-- Email : <?php //echo $pageVal['email'];?>-->
						
					</td>
                    
					<!--<td align="left"><?php echo $pageVal['testimonial_title'];?>
                    <div>
                    <?php
          
					?>
                    </div>
                    </td>-->
					<td><?php echo $pageVal['testimonial_description'];?></td>
					<td class="right"><?php echo ($pageVal['status']==1)? "Active":"In-active";?>
                    </td>
          <td><?php echo anchor("sitepanel/testimonial/edit/$pageVal[testimonial_id]/".query_string(),'Edit'); ?></td>
				</tr>
			<?php
			}		   
			?> 
			
			<tr><td colspan="5" align="right" height="30"><?php echo $page_links; ?></td></tr>     
			</tbody>
			<tr>
				<td align="left" colspan="5" style="padding:2px" height="35">
					<input name="status_action" type="submit"  value="Activate" class="button2" id="Activate" onClick="return validcheckstatus('arr_ids[]','Activate','Record','u_status_arr[]');"/>
					<input name="status_action" type="submit" class="button2" value="Deactivate" id="Deactivate"  onClick="return validcheckstatus('arr_ids[]','Deactivate','Record','u_status_arr[]');"/>
                    <input name="status_action" type="submit" class="button2" id="Delete" value="Delete"  onclick="return validcheckstatus('arr_ids[]','delete','Record');"/>
                    </td>
			</tr>
			</table>
			<?php
			echo form_close();
		}else{
			echo "<center><strong> No record(s) found !</strong></center>" ;
		}
		?> 
	</div>    
    
</div>
<?php }?>
<?php $this->load->view('includes/footer'); ?>