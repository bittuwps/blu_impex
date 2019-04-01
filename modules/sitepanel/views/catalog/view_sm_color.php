<?php $this->load->view('includes/header'); ?>

<div class="page-title">                    
    <h2><span ></span><?php echo $heading_title; ?></h2>
<!--    <div class="buttons">
        <a href="<?php echo base_url(); ?>sitepanel/sm_app_color/add/<?php echo $this->uri->segment(4, 0); ?>" class="btn btn-primary pull-right">Add SM Color</a>

    </div>-->
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
        
          
        
			<?php echo form_open("sitepanel/sm_app_color/",'id="data_form"');?>
            
          
           
			<table class="table datatable" width="100%" id="my_data">
            
			<thead>
			  <tr>
				<th width="20" style="text-align: center;">
                                
                <input type="checkbox" onclick="$('input:checkbox').not(this).prop('checked', this.checked);" />
                
                </th>
				<th>Name</th>
<!--				<th>Display Order</th>
				<th>Status</th>-->
				<th>Action</th>
			</tr>
			</thead>
			<tbody>
			<?php 	
			foreach($res as $catKey=>$pageVal)
			{
			?> 
				<tr>
					<td style="text-align: center;">
						<input type="checkbox" name="arr_ids[]" value="<?php echo  $pageVal['bg_id'];?>" />
                    </td>
					<td >
						<?php echo $pageVal['color_name'];?>
					</td>
                    
<!--					<td><?php echo ($pageVal['status']==1)? "Active":"In-active";?></td>-->
					<td>
						<?php echo anchor("sitepanel/sm_app_color/edit/$pageVal[bg_id]/".query_string(),'<span>Edit</span>', 'class="btn btn-info"'); ?> 
					</td>
				</tr>
			<?php
			}		   
			?> 
			</table>
<!--            <table class="list" width="100%"> 
                <tr>
                    <td align="left" style="padding:5px">
                        <input name="status_action" type="submit"  value="Activate" class="button2" id="Activate" onClick="return validcheckstatus('arr_ids[]', 'Activate', 'Record', 'u_status_arr[]');"/>

                        <input name="status_action" type="submit" class="button2" value="Deactivate" id="Deactivate"  onClick="return validcheckstatus('arr_ids[]', 'Deactivate', 'Record', 'u_status_arr[]');"/>

                        <input name="status_action" type="submit" class="button2" id="Delete" value="Delete"  onClick="return validcheckstatus('arr_ids[]', 'delete', 'Record');"/>


                    </td>
                </tr>

            </table>-->
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
<!-- PAGE CONTENT WRAPPER -->            


 
      <script type="text/javascript">
            function onclickgroup() {
                if (validcheckstatus('arr_ids[]', 'set', 'record', 'u_status_arr[]')) {
                    $('#data_form').submit();
                }
            }
        </script>

<?php $this->load->view('includes/footer'); ?>