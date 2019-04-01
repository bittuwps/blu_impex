<?php $this->load->view('includes/header'); ?> 
<div class="page-title">
    <h2><span><?php echo $heading_title;?></span></h2>
    <div class="buttons"><?php echo anchor("sitepanel/courier_company/add/","<span>Add Courier Company</span>",'class="btn btn-primary pull-right" ' );?></div>
</div>
<div class="page-content-wrap"> 
    
    

    <div class="row">
        <div class="col-md-12">

            <!-- START DEFAULT DATATABLE -->
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="table-responsive">
  <?php 
	   if( is_array($res) && !empty($res) )
	  {
	 
	    echo form_open("sitepanel/courier_company/",'id="data_form"', '"class=form-horizontal"');?>
     
	  <table class="table datatable" width="100%" id="my_data">
     
        <thead>
          <tr>
            <th width="25" style="text-align: center;"><input type="checkbox" onclick="$('input[name*=\'arr_ids\']').attr('checked', this.checked);" /></th>
            <th>Company Name</th>
            <th>Zip Code</th>
            <th>Status</th>
            <th>Action</th>
          </tr>
        </thead>
		
        <tbody>
          <?php
		  $j=1; 
			foreach($res as $catKey=>$pageVal)
			{
		   ?> 
          <tr>
            <td style="text-align: center;">
            <input type="checkbox" name="arr_ids[]" value="<?php echo $pageVal['company_id'];?>" /></td>
            <td><?php echo $pageVal['company_name'];?></td>
            <td style="word-wrap:break-word"><?php echo $pageVal['zip_code'];?></td>
		    <td><?php echo ($pageVal['status']==1)?"Active":"In-active";?></td>
            <td><?php echo anchor("sitepanel/courier_company/edit/$pageVal[company_id]/".query_string(),'<span>Edit</span>','class="btn btn-info"'); ?></td>
          </tr>
          <?php
		   $j++;}		  
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
	<?php echo form_close();
	 }else{
	    echo "<center><strong> No record(s) found !</strong></center>" ;
	 }
	?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('includes/footer'); ?>