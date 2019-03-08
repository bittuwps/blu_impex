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
            <?php echo validation_message();?>
    <?php echo error_message(); ?>  
    
	<?php echo form_open_multipart("sitepanel/zip_location/add/",'class="form-horizontal"');?> 
            
            <div class="form-group">
                <label class="col-md-3 col-xs-12 control-label"><span class="required">*</span>Location Name</label>
                <div class="col-md-9 col-xs-12">                                                                                          <input type="text" name="location_name" class="form-control" value="<?php echo set_value('location_name');?>" />                                                    
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 col-xs-12 control-label"><span class="required">*</span>Zip Code</label>
                <div class="col-md-9 col-xs-12">                                                                                            <input type="text" name="zip_code" class="form-control" value="<?php echo set_value('zip_code');?>" />                                                                                                               
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 col-xs-12 control-label"><span class="required">*</span>COD Available</label>
                <div class="col-md-9 col-xs-12">  
                    <input type="radio" name="cod" value="N" <?php if($this->input->post('cod') == 'N') echo 'checked="checked"'; ?> /> No &nbsp; 
        <input type="radio" name="cod" value="Y" <?php if($this->input->post('cod') == 'Y') echo 'checked="checked"'; ?> /> Yes
                    
                </div>
            </div>
        
            <div class="form-group">
                
                <div class="col-md-6 col-xs-12">                                                                                              <input type="submit" name="sub" value="Add" class="btn bg-red pull-right" />
			<input type="hidden" name="action" value="add" />                                                                                                            
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('includes/footer'); ?>