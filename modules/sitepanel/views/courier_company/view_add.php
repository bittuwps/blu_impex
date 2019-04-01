<?php $this->load->view('includes/header'); ?> 

<div class="page-title">                    
    <h2><span ></span><?php echo $heading_title; ?></h2>
    <div class="buttons">
	   <a href="javascript:void(0);" onclick="history.back();" class="btn btn-primary pull-right">Cancel</a>  
	</div>
</div>
<div class="page-content-wrap">                

    <div class="row">
        
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
            <?php echo validation_message();?>
     
    
	<?php echo form_open_multipart("sitepanel/courier_company/add/",'class="form-horizontal"');?> 
            
            <div class="form-group">
                <label class="col-md-3 col-xs-12 control-label"><span class="required">*</span> Courier Company Name </label>
                <div class="col-md-4 col-xs-12">                                                                                          <input type="text" name="company_name" class="form-control" value="<?php echo set_value('company_name');?>" />                                                    
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 col-xs-12 control-label"><span class="required">*</span>Select PinCode(s)</label>
                <select class="col-md-4" name="picode[]" multiple="multiple" size="7" >
        	<option value="" disabled="disabled">--- Select Pin Code ---</option>
          <?php
					foreach($pin_res as $key=>$val){
						?>
            <option value="<?php echo $val['zip_code']; ?>"><?php echo $val['location_name']; ?> - <?php echo $val['zip_code']; ?></option>
            <?php
					}
					?>
        </select>
            </div>
            <div class="form-group">
                <div class="col-md-6 col-xs-12">
                    <input type="submit" name="sub" value="Add" class="btn bg-red pull-right" />
			<input type="hidden" name="action" value="add" />
                                                                                                                                
                </div>
            </div>
                    <?php echo form_close();?>
                </div>
            </div>
        </div>
    </div>
</div>


<!--
<div id="content">
  
  <div class="breadcrumb">
  
    <?php echo anchor('sitepanel/dashbord','Home'); ?>
 &raquo; <?php echo anchor('sitepanel/courier_company','Back To Listing'); ?> &raquo;  <?php echo $heading_title; ?>
             
   </div>      
       
 <div class="box">
 
    <div class="heading">
    
      <h1><img src="<?php echo base_url(); ?>assets/sitepanel/image/category.png" alt="" /> <?php echo $heading_title; ?></h1>
      
      <div class="buttons">&nbsp;</div>
      
    </div>
   
  
     <div class="content">
   
       
	    <?php echo validation_message();?>
        <?php echo error_message(); ?>
     
       <?php echo form_open_multipart('sitepanel/courier_company/add/');?>  
	<table width="90%"  class="tableList" align="center">
		<tr>
			<th colspan="2" align="center" > </th>
		</tr>
		<tr class="trOdd">
			<td width="253" height="26"> Courier Company Name : <span class="required">*</span></td>
			<td width="597"><input type="text" name="company_name" size="60" value="<?php echo set_value('company_name');?>"></td>
		</tr>
    
    <tr class="trOdd">
			<td width="253" height="26"> Select Pincode(s) : <span class="required">*</span></td>
			<td width="597">
      	<select name="picode[]" multiple="multiple" size="7" style="padding:5px;">
        	<option value="" disabled="disabled">--- Select Pin Code ---</option>
          <?php
					foreach($pin_res as $key=>$val){
						?>
            <option value="<?php echo $val['zip_code']; ?>"><?php echo $val['location_name']; ?> - <?php echo $val['zip_code']; ?></option>
            <?php
					}
					?>
        </select>
      </td>
		</tr>
		
    <tr class="trOdd">
			<td align="left">&nbsp;</td>
			<td align="left">
			<input type="submit" name="sub" value="Add" class="button2" />
			<input type="hidden" name="action" value="add" />
			</td>
		</tr>
	</table>
<?php echo form_close(); ?>
  </div>
</div>-->
<?php $this->load->view('includes/footer'); ?>