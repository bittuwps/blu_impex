<?php
$this->load->view('includes/header');
$attr = $this->config->item('attributeArray');
echo form_open_multipart("", 'class="form-horizontal"');
?> 
<div class="page-title">
  <div class="row">
    <div class="col-md-3 col-sm-12 col-xs-12">
      <h2><span><?php echo $heading_title; ?></span></h2>
    </div>
  </div>
</div>
<!-- PAGE CONTENT WRAPPER -->
<div class="page-content-wrap">
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-body">              
          <div id="tab_pinfo">
            <div class="row">
              <?php
              error_message();
              ?>
              <div class="col-md-10 col-md-offset-1">
                <div class="form-group">
                  <label class="col-md-3 control-label"><span class="required">*</span>Lable/Option Name</label>
                  <div class="col-md-6"> <input type="text" placeholder="Attribute Name" class="form-control" name="name" value="<?php echo set_value('name'); ?>"  /><?php echo form_error('name') ?>
                  </div>                    
                </div>
                
                <div class="form-group">
                  <label class="col-md-3 control-label"></label>
                  <div class="col-md-9 pull-right">
                    <?php echo anchor("sitepanel/attributes/lable_add/".$parent_id, '<span><i class="fa fa-remove"></i> Cancel</span>', 'class="btn bg-red pull-right" '); ?>
                    <input type="submit" name="sub" class="btn bg-red pull-right" value="Save & New" class="button2" style="margin-left: 5px; margin-right: 5px;" />
                    <input type="submit" name="sub" class="btn bg-red pull-right" value="Save & Close" class="button2" style="margin-left: 5px; margin-right: 5px;" />
                    <input type="submit" name="sub" class="btn bg-red pull-right" value="Save" class="button2" style="margin-left: 5px; margin-right: 5px;" />
                    <input type="hidden" name="action" value="addcategory" />
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>                    
</div>
<?php echo form_close(); ?>     
<!-- END PAGE CONTENT WRAPPER --> 
<?php $this->load->view('includes/footer'); ?>