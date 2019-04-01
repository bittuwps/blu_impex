<?php $this->load->view('includes/header'); ?> 
<div class="page-title">
    <h2><span><?php echo $heading_title;?></span></h2>
    <div class="buttons">
        <a href="javascript:void(0);" onclick="history.back();" class="btn btn-primary pull-right">Cancel</a>
    </div>
</div>

 <div class="page-content-wrap">                

    <div class="row">
        
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <span class="required">
                    <?php echo validation_errors();?>
                        </span>
            <?php 
                
   echo form_open('sitepanel/newsletter/change_status/', 'class="form-horizontal"');?>  

            <div class="form-group">
                <label class="col-md-3 col-xs-12 control-label"><span class="required">*</span>To</label>
                <div class="col-md-9 col-xs-12">                                                                                                                                                        
                    <input type="text" name="sendto" class="form-control" value="<?php echo reduce_multiples($newsresult,",");?>">                                                    
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 col-xs-12 control-label"><span class="required">*</span>Subject</label>
                <div class="col-md-9 col-xs-12">                                                                                                                                                        
                    <input type="text" name="subject" class="form-control" value="<?php echo set_value('subject');?>">                                                    
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 col-xs-12 control-label"><span class="required">*</span>Message</label>
                <div class="col-md-9 col-xs-12">                                                                                            <textarea name="message" rows="5" class="form-control" cols="50" id="message" ><?php echo set_value('message');?></textarea>
			<?php  echo display_ckeditor($ckeditor); ?>                                                                                                               
                </div>
            </div>
            <div class="form-group textarea">
                
                <div class="col-md-6 col-xs-12 col-md-offset-2">                                                                                                                                                        
                    <input type="submit" name="sub" value="Preview" class="btn bg-red pull-right" />
			<input type="hidden" name="Send" value="Send Email">
			<input type="hidden" name="arr_ids" value="<?php echo $ids;?>">
			<input type="hidden" name="action" value="preview" />                                                    
                </div>
            </div>
	
<?php echo form_close(); ?>
                </div>
            </div>
  </div>
</div>
 </div>
<?php $this->load->view('includes/footer'); ?>