<?php $this->load->view('includes/header'); ?>  

<div class="page-title">
    <h2><span><?php echo $heading_title; ?></span></h2>
    <div class="buttons"><?php echo anchor("sitepanel/color/", '<span><i class="fa fa-remove"></i> Cancel</span>', 'class="btn bg-red pull-right" '); ?></div>
</div>

<div class="page-content-wrap">

    <div class="row">
        <?php echo validation_message('alert'); ?>
        
        <div class="col-md-12">


            <div class="panel panel-default">

                <div class="panel-body">                                                                                                        

                    <?php echo form_open_multipart(current_url_query_string(), 'class="form-horizontal"'); ?>  
                   
                        <div class="row">
                            <div class="form-group">
                                <label class="col-md-3 control-label">Color Name</label>
                                <div class="col-md-6">                                  
                                    <input type="text" name="color_name" class="form-control" value="<?php echo set_value('color_name',$edit_result['color_name']);?>">    
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label"> Color Code</label>

                                <div class="col-md-6">
                                  <input type="text" name="color_code" class="form-control my-colorpicker1 colorpicker-element "  value="<?php echo set_value('color_code',$edit_result['color_code']);?>">
                                </div>
                                
                            </div>
                            
                            <div class="form-group">
                                
                                <div class="col-md-6">                                  
                                     
                                    <input type="submit" name="sub" value="Update" class="btn bg-red pull-right" />
					<input type="hidden" name="action" value="edit" />
					<input type="hidden" name="color_id" value="<?php echo $edit_result['color_id'];?>">
                                </div>
                            </div>
                        </div>
                    <?php echo form_close();?>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="<?php echo base_url('assets/sitepanel_new')?>/colorpicker/bootstrap-colorpicker.min.css">
  <!-- bootstrap color picker -->
<script src="<?php echo base_url('assets/sitepanel_new')?>/colorpicker/bootstrap-colorpicker.min.js"></script>
<script type="text/javascript">
    //color picker with addon
    $(".my-colorpicker1").colorpicker();
    
   
</script>
<?php $this->load->view('includes/footer'); ?>