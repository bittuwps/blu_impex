<?php $this->load->view('includes/header'); ?>  
<div class="page-title">
    <h2><span><?php echo $heading_title; ?></span></h2>
    <div class="buttons"><?php echo anchor("sitepanel/size/", '<span><i class="fa fa-remove"></i> Cancel</span>', 'class="btn bg-red pull-right" '); ?></div>
</div>

<div class="page-content-wrap">

    <div class="row">
        <?php echo validation_message('alert'); ?>
        
        <div class="col-md-12">


            <div class="panel panel-default">

                <div class="panel-body">                                                                                                        

                    <?php echo form_open_multipart("sitepanel/size/add/", 'class="form-horizontal"'); ?>  
                   
                        <div class="row">
                            <div class="form-group">
                                <label class="col-md-3 control-label">Title</label>
                                <div class="col-md-6">                                  
                                    <input type="text" name="size_name" class="form-control" value="<?php echo set_value('size_name');?>">    
                                </div>
                            </div>
                            <div class="form-group">
                                
                                <div class="col-md-6">                                  
                                     
                                    <input type="submit" name="sub" value="Add" class="btn bg-red pull-right" />
					<input type="hidden" name="action" value="add" />
                                </div>
                            </div>
                        </div>
                    <?php echo form_close();?>
                </div>
            </div>
        </div>
    </div>
</div>


<?php $this->load->view('includes/footer'); ?>