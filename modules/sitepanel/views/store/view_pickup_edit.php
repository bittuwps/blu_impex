<?php
$this->load->view('includes/header');
?>
<div class="page-title">
  <h2><span><?php echo $heading_title; ?></span></h2>
  <div class="buttons pull-right col-md-2">
    <a href="javascript:void(0);" onclick="$('#form').submit();" class="btn btn-primary pull-right">Save</a>
    <a href="javascript:void(0);" onclick="history.back();" class="btn bg-red pull-left">Cancel</a>  
  </div>
</div>
<div class="page-content-wrap">
  <div class="row">
    <div class="col-md-12">
      <?php echo form_open_multipart(current_url_query_string(), array('id' => 'form', 'class' => "form-horizontal")); ?>
      <div class="panel panel-default tabs">                            
        <ul class="nav nav-tabs" role="tablist">
          <li class="active"><a href="#tab-general" role="tab" data-toggle="tab">Edit Pickup Point</a></li>
        </ul>
        <div class="panel-body tab-content">
          <div class="tab-pane active" id="tab-general">
            <?php echo validation_errors(); ?>   
            <div class="form-group">
              <label class="col-md-3 col-xs-12 control-label"><span class="required">*</span>Pickup Point Name</label>
              <div class="col-md-6">                                            
                <input type="text" name="pickup_name" class="form-control" value="<?php echo set_value('pickup_name', $res['pickup_name']); ?>" />
                <?php echo form_error('pickup_name'); ?>
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-3 col-xs-12 control-label"><span class="required">*</span>Area Name</label>
              <div class="col-md-6">                                            
                <input type="text" name="pickup_city" class="form-control" value="<?php echo set_value('pickup_city',$res['pickup_city']); ?>" />
                <?php echo form_error('pickup_city'); ?>
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-3 col-xs-12 control-label"><span class="required">*</span>Address</label>
              <div class="col-md-6">                                            
                <textarea name="pickup_address" class="form-control"><?php echo set_value('pickup_name',$res['pickup_address']); ?></textarea>
                <?php echo form_error('pickup_address'); ?>
              </div>
            </div>

            <div class="form-group">
              <div class="col-md-6 col-xs-12">
                <input type="hidden" name="setId" value="<?php echo $res['setId']; ?>">
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php echo form_close(); ?>
    </div>
  </div>
</div>
<?php $this->load->view('includes/footer'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo resource_url(); ?>fancybox/jquery.fancybox.css" />
<script src="<?php echo resource_url(); ?>fancybox/jquery.fancybox.pack.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/sitepanel_new/js/uploader.js"></script> 
<script type="text/javascript" src="<?php echo base_url(); ?>assets/sitepanel_new/js/jquery/jquery-3.1.1.min.js"></script>