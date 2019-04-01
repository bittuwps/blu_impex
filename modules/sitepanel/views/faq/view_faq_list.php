<?php $this->load->view('includes/header'); ?>
<div class="page-title">
    <h2><span><?php echo $heading_title;?></span></h2>
    <div class="buttons"><?php echo anchor("sitepanel/faq/add/","<span>Post FAQ</span>",'class="btn btn-primary pull-right" ' );?></div>
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
	     if( is_array($pagelist) && !empty($pagelist) )
		 {
		  echo form_open("sitepanel/faq/",'id="data_form" ');
		 
		 ?>
        
	      <table class="table datatable" width="100%" id="my_data">
     
        <thead>
          <tr>
            <th width="21" style="text-align: center;">
            <input type="checkbox" onclick="$('input[name*=\'arr_ids\']').attr('checked', this.checked);" /></th>
            <th>Question/Answer</th>
            <th>Order </th>
			<th>Status</th>
            <th>Action</th>
          </tr>
        </thead>
		
        <tbody>
          <?php 
		
			foreach($res as $catKey=>$pageVal)
			{ 							
		   ?> 
          <tr>
             <td style="text-align: center;"><input type="checkbox" name="arr_ids[]" value="<?php echo $pageVal['faq_id'];?>" /></td>
            <td>
			 <strong> Question -</strong> <?php echo $pageVal['faq_question'];?>
            
           <br /> <strong> Answer -</strong>
           <a href="#" data-toggle="modal" data-target=".faq_<?php echo $pageVal['faq_id'];?>">
 View Banner
</a>
            <div class="modal fade faq_<?php echo $pageVal['faq_id'];?>" tabindex="-1" role="dialog" aria-labelledby="faq_answer" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">

                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                      <h4 class="modal-title" id="faq_answer">Answer</h4>
                    </div>
                    <div class="modal-body">
                    <?php echo $pageVal['faq_answer'];?>
                    </div>
                  </div>
                </div>
            </div>
           
            </td>
            <td>
            <input type="text" name="ord[<?php echo $pageVal['faq_id'];?>]" value="<?php echo $pageVal['sort_order'];?>" size="5"  /></td>
		    <td><?php echo ($pageVal['status']==1)?"Active":"In-active";?></td>
            <td>		
          
			<?php echo anchor("sitepanel/faq/edit/$pageVal[faq_id]/",'<span>Edit</span>','class="btn btn-info"'); ?></td>
          </tr>
          <?php
		   }		  
		  ?>   
        </tbody>
    	<tr>
			<td align="left" colspan="7" style="padding:2px" height="35">
            
				<input name="status_action" type="submit"  value="Activate" class="button2" id="Activate" onClick="return validcheckstatus('arr_ids[]','Activate','Record','u_status_arr[]');"/>
				<input name="status_action" type="submit" class="button2" value="Deactivate" id="Deactivate"  onClick="return validcheckstatus('arr_ids[]','Deactivate','Record','u_status_arr[]');"/>
                <input name="status_action" type="submit" class="button2" value="Update_order" id="Update_order"  onClick="return validcheckstatus('arr_ids[]','Update_order','Record','u_status_arr[]');"/>
<!--              	<input name="update_order" type="submit" class="button2" id="Delete" value="Update Order"  />           -->
				<input name="status_action" type="submit" class="button2" id="Delete" value="Delete"  onClick="return validcheckstatus('arr_ids[]','delete','Record');"/>
                
			</td>
	</tr>
      </table>
	<?php echo form_close();
	 }else{
			echo "<center><strong> No record(s) found !</strong></center>" ;
		}?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

 
<?php $this->load->view('includes/footer'); ?>