<?php
$this->load->view('includes/header');
$attr = $this->config->item('attributeArray');
$values_posted_back = (is_array($this->input->post())) ? TRUE : FALSE;
echo form_open_multipart(current_url_query_string(), array('id' => 'catfrm', 'name' => 'catfrm', 'class' => "form-horizontal"));
?> 
<div class="page-title">
  <div class="row">
    <div class="col-md-3 col-sm-12 col-xs-12">
      <h2><span><?php echo $heading_title; ?></span></h2>
    </div>
    <div class="col-md-8  col-sm-12  col-xs-12">
      <div class="buttons">
        <?php echo anchor("sitepanel/attributes/", '<span><i class="fa fa-remove"></i> Cancel</span>', 'class="btn bg-red pull-right" '); ?>
        <input type="submit" name="sub" class="btn bg-red pull-right" value="Save & New" class="button2" style="margin-left: 5px; margin-right: 5px;" />
        <input type="submit" name="sub" class="btn bg-red pull-right" value="Save & Close" class="button2" style="margin-left: 5px; margin-right: 5px;" />
        <input type="submit" name="sub" class="btn bg-red pull-right" value="Save" class="button2" style="margin-left: 5px; margin-right: 5px;" />
      </div>
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
                  <label class="col-md-3 control-label"><span class="required">*</span>Attribute Name</label>
                  <div class="col-md-6"> <input type="text" placeholder="Attribute Name" class="form-control" name="name" value="<?php echo set_value('name',$catresult['name']); ?>"  /><?php echo form_error('name') ?>
                  </div>                    
                </div>
                <div class="form-group">
                  <label class="col-md-3 control-label"><span class="required">*</span>Attribute Type</label>
                  <div class="col-md-6">
                    <select name="type" class="form-control">
                      <option value="">--Choose Attribute Type</option>
                      <?php
                      foreach ($attr as $key => $val) {
                        $sel = ($catresult['type'] == $key)?'selected':'';
                        ?>
                        <option value="<?php echo $key; ?>" <?php echo $sel; ?>><?php echo $val; ?></option>
                        <?php
                      }
                      ?>
                    </select>
                    <?php echo form_error('type') ?>
                  </div>                    
                </div>
                <div class="form-group">
                  <label class="col-md-3 control-label"><span class="required">*</span>Is Mandatory</label>
                  <div class="col-md-6">                      
                    <input type="checkbox" style="margin-top:10px;" name="for_cart" value="1" <?php echo ($catresult['is_cart_mandatory'] == '1')?'checked':'';?> /><span style="font-weight:800; padding: 5px;">For Cart (E-commerce)</span> 
                    <input type="checkbox" style="margin-top:10px;" name="for_product_display" <?php echo ($catresult['is_product_mandatory'] == '1')?'checked':'';?> value="1" /><span style="font-weight:800; padding: 5px;">for Product Display</span>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 control-label"></label>
                  <div class="col-md-9 pull-right">
                    <?php echo anchor("sitepanel/attributes/", '<span><i class="fa fa-remove"></i> Cancel</span>', 'class="btn bg-red pull-right" '); ?>
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
<div class="modal fade pop-up-1" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel-1" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title" id="myLargeModalLabel-1">Image</h4>
      </div>
      <div class="modal-body">
        <img src="<?php echo base_url() . 'uploaded_files/category/' . $catresult['category_image']; ?>" class="img-responsive img-rounded center-block" alt="">
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal mixer image -->

<script type="text/javascript">
  $(document).ready(function () {
    $('#catfrm').submit(function (e) {
      e.preventDefault();
      var frmObj = this;
      $('#brand_id option:eq(0),#frame_material_id option:eq(0),#frame_type_id option:eq(0)').attr('selected', false);
      frmObj.submit();
    });
  });
</script>
<?php $this->load->view('includes/footer'); ?>