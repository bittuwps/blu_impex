<?php $this->load->view('includes/header'); ?> 

<div class="page-title">                    
    <h2><span ></span><?php echo $heading_title; ?></h2>
    <div class="buttons">
        <a href="<?php echo base_url(); ?>sitepanel/size/add/<?php echo $this->uri->segment(4, 0); ?>" class="btn btn-primary pull-right">Add Size</a>

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
            <?php if($this->session->flashdata('error')){?>
            <div class="alert alert-danger">
                <?php echo $this->session->flashdata('error');?>
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
        
          
        
			<?php echo form_open("sitepanel/size/",'id="data_form"');?>
            
          
           
			<table class="table datatable" width="100%" id="my_data">
            
			<thead>
			  <tr>
				<th width="20" style="text-align: center;">
                                
                <input type="checkbox" onclick="$('input:checkbox').not(this).prop('checked', this.checked);" />
                
                </th>
				<th>Name</th>
<!--				<th>Display Order</th>-->
				<th>Status</th>
				<th>Action</th>
			</tr>
			</thead>
			<tbody>
			<?php 	
			foreach($res as $catKey=>$pageVal)
			{ 
				$imgdisplay=FALSE;		
						
				$displayorder       = ($pageVal['sort_order']!='') ? $pageVal['sort_order']: "0";								
				
				
				
			?> 
				<tr>
					<td style="text-align: center;">
						<input type="checkbox" name="arr_ids[]" value="<?php echo  $pageVal['size_id'];?>" />
                    </td>
					<td>
						<?php echo $pageVal['size_name'];?>
					</td>
<!--                    <td>
                     <input type="text" name="ord[<?php echo $pageVal['size_id'];?>]" value="<?php echo $displayorder;?>" size="5" />
                    </td>-->
					<td><?php echo ($pageVal['status']==1)? "Active":"In-active";?></td>
					<td>
						<?php echo anchor("sitepanel/size/edit/$pageVal[size_id]/".query_string(),'<span>Edit</span>', 'class="btn btn-info"'); ?> 
					</td>
				</tr>
			<?php
			}		   
			?> 
			</table>
            <table class="list" width="100%"> 
                <tr>
                    <td align="left" style="padding:5px">
                        <input name="status_action" type="submit"  value="Activate" class="button2" id="Activate" onClick="return validcheckstatus('arr_ids[]', 'Activate', 'Record', 'u_status_arr[]');"/>

                        <input name="status_action" type="submit" class="button2" value="Deactivate" id="Deactivate"  onClick="return validcheckstatus('arr_ids[]', 'Deactivate', 'Record', 'u_status_arr[]');"/>

                        <input name="status_action" type="submit" class="button2" id="Delete" value="Delete"  onClick="return validcheckstatus('arr_ids[]', 'delete', 'Record');"/>


                    </td>
                </tr>

            </table>
                        <?php echo form_close();?>
        <?php }else{?>
                        <center><strong><?php echo "No Record(s) Found!"?></strong></center>
        <?php }?>
                    </div>
                </div>
            </div>
            <!-- END DEFAULT DATATABLE -->




        </div>
    </div>                                

</div>

 <?php if(1==2){?> 
  <div id="content">
  
  <div class="breadcrumb">
  
    <?php echo anchor('sitepanel/dashbord','Home'); 
	
	echo '<span class="pr2 fs14">»</span> Size';
	
    ?>
       
             
   </div>      
       
 <div class="box">
 
    <div class="heading">
    
      <h1><img src="<?php echo base_url(); ?>assets/sitepanel/image/category.png" alt="" /> <?php echo $heading_title; ?></h1>
      
      <div class="buttons"><?php echo anchor("sitepanel/size/add","<span>Add $heading_title</span>",'class="button" ' );?></div>
      
    </div>
   
  
      
     <div class="content">
    	
        
        
		<?php
		if(is_array($res) && ! empty($res))
		{
			
		?>
        
          
        
			<?php echo form_open("sitepanel/size/",'id="data_form"');?>
            
          
           
			<table class="list" width="100%" id="my_data">
            
			<thead>
			  <tr>
				<td width="20" style="text-align: center;">
                                
                <input type="checkbox" onclick="$('input[name*=\'arr_ids\']').attr('checked', this.checked);" />
                
                </td>
				<td width="239" class="left">Title </td>
				<td width="94" class="left">Display Order</td>
				<td width="118" align="left" >Status</td>
				<td width="131" align="center">Action</td>
			</tr>
			</thead>
			<tbody>
			<?php 	
			foreach($res as $catKey=>$pageVal)
			{ 
				$imgdisplay=FALSE;		
						
				$displayorder       = ($pageVal['sort_order']!='') ? $pageVal['sort_order']: "0";								
				
				
				
			?> 
				<tr>
					<td style="text-align: center;">
						<input type="checkbox" name="arr_ids[]" value="<?php echo  $pageVal['size_id'];?>" />
                    </td>
					<td class="left">
						<?php echo $pageVal['size_name'];?>
					</td>
                    <td>
                     <input type="text" name="ord[<?php echo $pageVal['size_id'];?>]" value="<?php echo $displayorder;?>" size="5" />
                    </td>
					<td align="left" ><?php echo ($pageVal['status']==1)? "Active":"In-active";?></td>
					<td align="center" >
						<?php echo anchor("sitepanel/size/edit/$pageVal[size_id]/".query_string(),'Edit'); ?> 
					</td>
				</tr>
			<?php
			}		   
			?> 
			</table>
			<?php
			if($page_links!='')
			{
			?>
			  <table class="list" width="100%">
			  <tr><td align="right" height="30"><?php echo $page_links; ?></td></tr>     
			  </table>
			<?php
			}
			?>
			<table class="list" width="100%">
			<tr>
				<td align="left" colspan="6" style="padding:2px" height="35">
				  <input name="status_action" type="submit"  value="Activate" class="button2" id="Activate" onClick="return validcheckstatus('arr_ids[]','Activate','Record','u_status_arr[]');"/>
				  
				  <input name="status_action" type="submit" class="button2" value="Deactivate" id="Deactivate"  onClick="return validcheckstatus('arr_ids[]','Deactivate','Record','u_status_arr[]');"/>
				  
                  <input name="status_action" type="submit" class="button2" id="Delete" value="Delete"  onClick="return validcheckstatus('arr_ids[]','delete','Record');"/>
					
				  <input name="update_order" type="submit"  value="Update Order" class="button2" />
					
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
      <script type="text/javascript">
            function onclickgroup() {
                if (validcheckstatus('arr_ids[]', 'set', 'record', 'u_status_arr[]')) {
                    $('#data_form').submit();
                }
            }
        </script>
<?php $this->load->view('includes/footer'); ?>