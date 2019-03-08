<?php
$this->load->view('includes/header');
$values_posted_back = (is_array($this->input->post())) ? TRUE : FALSE;
?>
<div class="page-title">
  <h2><span>Edit <?php echo $heading_title; ?></span></h2>
  <div class="buttons"><?php echo anchor("sitepanel/themes/", '<span>Cancel</span>', 'class="btn btn-primary pull-right" '); ?></div>
</div>

<div class="page-content-wrap">
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-body">  
          <span class="required"><?php echo validation_errors(); ?></span>
          <?php echo form_open_multipart(current_url_query_string(), array('id' => 'catfrm', 'name' => 'catfrm', 'class' => "form-horizontal")); ?>

          <div id="tab_pinfo">
            <div class="row">

              <div class="col-md-10 col-md-offset-1">
                <?php
                //echo $catresult['category_id'];
                $default_params = array(
                    'heading_element' => array(
                        'field_heading' => $heading_title . " Name",
                        'field_name' => "themes_name",
                        'field_value' => $catresult['theme_name'],
                        'field_placeholder' => "Your Brand Name",
                        'exparams' => 'size="40"',
                        'cat_id' => $catresult['theme_id']
                    ),
                    'url_element' => array(
                        'field_heading' => "Page URL",
                        'field_name' => "friendly_url",
                        'field_value' => $catresult['friendly_url'],
                        'field_placeholder' => "Your Page URL",
                        'exparams' => 'size="40"',
                    )
                );
                seo_edit_form_element($default_params);
                ?>
                <div class="form-group">
                  <label class="col-md-3 control-label">Brand Image</label>
                  <div class="col-md-3">                                                                                                   <input type="file" class="fileinput btn-primary" name="themes_image" />
                  </div>
                  <div class="col-md-3">
                    <?php
                    if ($catresult['theme_image'] != '' && file_exists(UPLOAD_DIR . "/themes/" . $catresult['theme_image'])) {
                      ?>
                      <a href="#" data-toggle="modal" data-target=".pop-up-1">
                        <img src="<?php echo base_url() . 'uploaded_files/themes/' . $catresult['theme_image']; ?>" width="150" class="img-responsive img-rounded center-block" alt="">
                      </a>
                    </div>
                  </div>
                  <?php 
                  if ($this->deletePrvg === TRUE) { ?>
                    <div class="form-group">
                      <div class="col-md-6 col-md-offset-3">
                        <input type="checkbox"  name="cat_img_delete" value="Y">
                        Delete
                      </div>
                    </div>
                    <?php 
                  } 
                }
                ?>
                <div class="form-group">
                  <br />
                  <br />
                  <div class="col-md-12 pull-left">
                    [ <?php echo $this->config->item('category.best.image.view'); ?> ]
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-md-6 col-md-offset-3">
                    <input type="submit" name="sub" class="btn bg-red pull-right" value="Update" class="button2" />
                    <input type="hidden" name="theme_id" id="pg_recid" value="<?php echo $catresult['theme_id']; ?>">
                  </div>
                </div>                      
              </div>
            </div>
          </div>
          <?php echo form_close(); ?>                              
        </div>                              
      </div>                    
    </div>                                
  </div>
</div>
<!-- END PAGE CONTENT WRAPPER -->
<div class="modal fade pop-up-1" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel-1" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title" id="myLargeModalLabel-1">Image</h4>
      </div>
      <div class="modal-body">
        <img src="<?php echo base_url() . 'uploaded_files/themes/' . $catresult['theme_image']; ?>" class="img-responsive img-rounded center-block" alt="">
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal mixer image -->

<script type="text/javascript">
  $(document).ready(function () {
    $('#catfrm').submit(function (e) {
      e.preventDefault();
      var frmObj = this;
      $('#theme_id option:eq(0),#frame_material_id option:eq(0),#frame_type_id option:eq(0)').attr('selected', false);
      frmObj.submit();
    });
  });
</script>
<?php $this->load->view('includes/footer'); ?>