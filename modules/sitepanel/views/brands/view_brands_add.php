<?php $this->load->view('includes/header'); ?>
<div class="page-title">
  <h2><span><?php echo $heading_title; ?></span></h2>
  <div class="buttons"><?php echo anchor("sitepanel/category/", '<span><i class="fa fa-remove"></i> Cancel</span>', 'class="btn bg-red pull-right" '); ?></div>
</div>
<!-- PAGE CONTENT WRAPPER -->
<div class="page-content-wrap">
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-body">                                                                                         <?php echo form_open_multipart("sitepanel/brands/add/", 'class="form-horizontal"'); ?>  
          <div id="tab_pinfo">
            <div class="row">
              <div class="col-md-10 col-md-offset-1">
                <?php
                $default_params = array(
                    'heading_element' => array(
                        'field_heading' => "Name",
                        'field_name' => "brands_name",
                        'field_placeholder' => "Your Brand Name",
                        'exparams' => 'size="40"'
                    ),
                    'url_element' => array(
                        'field_heading' => "Page URL",
                        'field_name' => "friendly_url",
                        'field_placeholder' => "Your Page URL",
                        'exparams' => 'size="40"',
                        'pre_seo_url' => '',
                        'pre_url_tag' => FALSE
                    )
                );

                if (is_array($parentData)) {
                  $pre_seo_url = base_url() . $parentData['friendly_url'] . "/";
                  $default_params['url_element']['pre_seo_url'] = $pre_seo_url;
                  $default_params['url_element']['pre_url_tag'] = TRUE;
                  $default_params['url_element']['exparams'] = 'size="30"';
                }
                seo_add_form_element($default_params);
                ?>

                <div class="form-group">
                  <label class="col-md-3 control-label">Brand Image</label>
                  <div class="col-md-9">                                                                                           <input type="file" class="fileinput btn-primary" name="brands_image"  title="Browse file" />
                    <br />
                    <br />
                    [ <?php echo $this->config->item('category.best.image.view'); ?> ]

                  </div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 control-label"></label>
                  <div class="col-md-9">
                    <input type="submit" name="sub" class="btn bg-red pull-right" value="Add" class="button2" />
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
<?php $this->load->view('includes/footer'); ?>