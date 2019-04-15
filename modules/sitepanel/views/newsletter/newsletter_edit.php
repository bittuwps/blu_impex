<?php $this->load->view('includes/header');  ?>
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
            <?php
                echo validation_errors();?>
            <?php echo form_open(current_url_query_string(),'class="form-horizontal"');?>
            <div class="form-group">
                <label class="col-md-3 col-xs-12 control-label"><span class="required">*</span>Name</label>
                <div class="col-md-6 col-xs-12">                                                                                                                                                        
                    <input type="text" name="subscriber_name" class="form-control" value="<?php echo set_value('subscriber_name',$catresult->subscriber_name);?>">                                                    
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 col-xs-12 control-label"><span class="required">*</span> E-Mail</label>
                <div class="col-md-6 col-xs-12">                                                                                                                                                        
                    <input type="text" name="subscriber_email" class="form-control" value="<?php echo set_value('subscriber_email',$catresult->subscriber_email);?>">                                                    
                </div>
            </div>
            
            <div class="form-group">
                
                <div class="col-md-6 col-xs-12">                                                                                                                                                        
                       <input type="submit" name="sub" value="Edit Member" class="btn bg-red pull-right" />                               <input type="hidden" name="subscriber_id" value="<?php echo $catresult->subscriber_id;?>">                 
                </div>
            </div>
            <?php echo form_close();?>
                </div>
            </div>
        </div>
    </div>
</div>   
    
<?php $this->load->view('includes/footer'); ?>