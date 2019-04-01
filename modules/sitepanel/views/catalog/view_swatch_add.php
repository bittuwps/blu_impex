<?php $this->load->view('includes/header'); ?>

<div class="page-title">
    <h2><span><?php echo $heading_title; ?></span></h2>
    <div class="buttons"><?php echo anchor("sitepanel/swatches/", '<span><i class="fa fa-remove"></i> Cancel</span>', 'class="btn bg-red pull-right" '); ?></div>
</div>

<div class="page-content-wrap">

    <div class="row">
        <?php echo validation_message('alert'); ?>
        
        <div class="col-md-12">


            <div class="panel panel-default">

                <div class="panel-body">                                                                                                        

                    <?php echo form_open_multipart("sitepanel/swatches/add/", 'class="form-horizontal"'); ?>  
                   
                        <div class="row">
                            <div class="form-group">
                                <label class="col-md-3 control-label">Swatch Name</label>
                                <div class="col-md-6">                                  
                                    <input type="text" name="swatch_name" class="form-control" value="<?php echo set_value('swatch_name');?>">    
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label"> Image</label>

                                <div class="col-md-6">
                                  <input type="file" name="image">
                                </div>
                                
                            </div>
                            
                            <div class="form-group">
                                
                                <div class="col-md-6">                                  
                                     
                                    <input type="submit" name="sub" value="Add" class="btn bg-red pull-right" />
					<input type="hidden" name="upload" value="add" />
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