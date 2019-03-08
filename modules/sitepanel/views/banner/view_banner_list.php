<?php $this->load->view('includes/header'); ?>
<div class="page-title">                    
    <h2><span ></span><?php echo $heading_title; ?></h2> 
    <div class="buttons"> <?php echo anchor("sitepanel/banners/add/",'<span>Add Banner</span>','class="btn btn-primary pull-right" ' );?> </div>
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
		$pagesection = $this->config->item('bannersections'); 
		 $j=0;
		if( is_array($res) && !empty($res) )
		{
			echo form_open("sitepanel/banners/",'id="myform"');
			?>
                        <table class="table datatable" width="100%" id="my_data">
			<thead>
			<tr>
				<th width="20" style="text-align: center;"><input type="checkbox" onclick="$('input:checkbox').not(this).prop('checked', this.checked);" /></th>
				<th>Banner Position</th>
				<th>Section</th>
				<th>Banner Picture</th>
                <th>Banner URL</th>
				<th>Status</th>
				<th>Action</th>
			</tr>
			</thead>
			<tbody>
			<?php 	
			$atts = array(
											'width'      => '740',
											'height'     => '600',
											'scrollbars' => 'yes',
											'status'     => 'yes',
											'resizable'  => 'yes',
											'screenx'    => '0',
											'screeny'    => '0'
									 );
		$j=1;							 
		foreach($res as $catKey=>$pageVal)
		{ 
		?> 
			<tr>
				<td style="text-align: center;">
					<input type="checkbox" name="arr_ids[]" value="<?=$pageVal['banner_id'];?>" />
				</td>
				<td><?php echo $pageVal['banner_position'];?></td>
				<td><?php echo (array_key_exists($pageVal['banner_page'],$pagesection) ? $pagesection[$pageVal['banner_page']] : "-");?></td>
				<td>
                    <?php
		 
		 $product_path = "banner/".$pageVal['banner_image'];
		?>
                    <a href="#" data-toggle="modal" data-target=".banner_<?php echo $j;?>">
 View Banner
</a>
            <div class="modal fade banner_<?php echo $j;?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel-1" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">

                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                      <h4 class="modal-title" id="myLargeModalLabel-1"><strong><?php echo (array_key_exists($pageVal['banner_page'],$pagesection) ? $pagesection[$pageVal['banner_page']] : "-");?></strong> <i class="fa fa-arrow-right"></i> <strong><?php echo $pageVal['banner_position'];?></strong></h4>
                    </div>
                    <div class="modal-body">
                    <img src="<?php echo base_url().'uploaded_files/'.$product_path;?>" class="img-responsive img-rounded center-block" alt="">
                    </div>
                  </div>
                </div>
            </div>
				</td>
        <td><?php echo $pageVal['banner_url'];?></td>
				<td><?php echo ($pageVal['status']==1)? "Active":"In-active";?></td>
        <td>  
                
                  <?php echo anchor("sitepanel/banners/edit/$pageVal[banner_id]/".query_string(),'<span>Edit</span>', 'class="btn btn-info"'); ?>         
					
				</td>
			</tr>
		<?php
		$j++;
		}		   
		?> 
		
		</tbody>
		<tr>
			<td align="left" colspan="7" style="padding:2px" height="35">
				<input name="status_action" type="submit"  value="Activate" class="button2" id="Activate" onClick="return validcheckstatus('arr_ids[]','Activate','Record','u_status_arr[]');"/>
				<input name="status_action" type="submit" class="button2" value="Deactivate" id="Deactivate"  onClick="return validcheckstatus('arr_ids[]','Deactivate','Record','u_status_arr[]');"/>             
				<input name="status_action" type="submit" class="button2" id="Delete" value="Delete"  onClick="return validcheckstatus('arr_ids[]','delete','Record');"/>
			</td>
		</tr>
		</table>
		<?php
		echo form_close();
	} else {
    echo "<center><strong> No Record(s) Found !</strong></center>";
}?>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>


                        
  
<?php $this->load->view('includes/footer'); ?>