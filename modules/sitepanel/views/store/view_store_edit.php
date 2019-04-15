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
          <li class="active"><a href="#tab-general" role="tab" data-toggle="tab">Edit Location</a></li>
        </ul>
        <div class="panel-body tab-content">
          <div class="tab-pane active" id="tab-general">
            <?php echo validation_errors(); ?>   
            <div class="form-group">
              <label class="col-md-3 col-xs-12 control-label"><span class="required">*</span>Location</label>
              <div class="col-md-6">
                <select name="location_id" class="form-control">
                  <option value="">--Select Location--</option>
                  <?php
                  foreach ($location as $k => $v) {
                    $sel = ($res['location_id'] == $v['id'])?'selected':'';
                    ?>
                    <option value="<?php echo $v['id']; ?>" <?php echo $sel; ?>><?php echo $v['country_name']; ?></option>
                    <?php
                  }
                  ?>
                </select>
                <?php echo form_error('location_id'); ?>                                                    
              </div>
              <label class="pull-right">
                <span class="required">*Required Fields</span>
                <span class="required" style="display: block;">**Conditional Fields</span>
              </label>
            </div>
            <div class="form-group">
              <label class="col-md-3 col-xs-12 control-label"><span class="required">*</span>Store Name</label>
              <div class="col-md-6">                                            
                <input type="text" name="store_name" class="form-control" value="<?php echo set_value('store_name', $res['store_name']); ?>" />
                <?php echo form_error('store_name'); ?>
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