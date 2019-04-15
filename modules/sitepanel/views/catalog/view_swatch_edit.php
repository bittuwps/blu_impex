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

                    <?php echo form_open_multipart("sitepanel/swatches/edit/".$edit_result['swatch_id'], 'class="form-horizontal"'); ?>  
                   
                        <div class="row">
                            <div class="form-group">
                                <label class="col-md-3 control-label">Swatch Name</label>
                                <div class="col-md-6">                                  
                                    <input type="text" name="swatch_name" class="form-control" value="<?php echo set_value('swatch_name',$edit_result['swatch_name']);?>">    
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label"> Image</label>

                                <div class="col-md-3">
                                  <input type="file" name="image">
                                </div>
                                <div class="col-md-3">
                                    <a href="#" data-toggle="modal" data-target=".pop-up-1">
<img src="<?php echo base_url().'uploaded_files/swatches/'.$edit_result['image'];?>" width="60" class="img-responsive img-rounded " alt="">
</a>	
                                           <div class="modal fade pop-up-1" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel-1" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                              <div class="modal-content">

                                                <div class="modal-header">
                                                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                  <h4 class="modal-title" id="myLargeModalLabel-1">Image</h4>
                                                </div>
                                                <div class="modal-body">
                                                <img src="<?php echo base_url().'uploaded_files/swatches/'.$edit_result['image'];?>" class="img-responsive img-rounded center-block" alt="">
                                                </div>
                                              </div><!-- /.modal-content -->
                                            </div><!-- /.modal-dialog -->
                                          </div><!-- /.modal mixer image -->
                                </div>
                                
                                
                            </div>
                            
                            <div class="form-group">
                                
                                <div class="col-md-9">                                  
                                     
                                    <input type="submit" name="edit_upload" value="Update" class="btn bg-red pull-right" />
					
                                        <input type="hidden" name="swatch_id" value="<?php echo $edit_result['swatch_id'];?>">
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
<?php if(1==2){ $this->load->view('includes/header'); ?>  

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
<?php $this->load->view('includes/footer');} ?>