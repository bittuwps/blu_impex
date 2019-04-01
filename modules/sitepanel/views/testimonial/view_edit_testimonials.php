<?php $this->load->view('includes/header'); ?>  
<div class="page-title">                    
  <h2><span ></span><?php echo $heading_title; ?></h2>
  <div class="buttons">
    <a href="javascript:void(0);" onclick="history.back();" class="btn btn-primary pull-right">Cancel</a>  
  </div>
</div>
<div class="page-content-wrap">                

  <div class="row">

    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-body">
          <?php echo validation_message(); ?>

          <?php echo form_open_multipart("sitepanel/testimonial/edit/" . $res['testimonial_id'], 'class="form-horizontal"'); ?> 

          <div class="form-group">
            <label class="col-md-3 col-xs-12 control-label"><span class="required">*</span>Name</label>
            <div class="col-md-9 col-xs-12">
              <input type="text" name="poster_name" class="form-control" value="<?php echo set_value('poster_name', $res['poster_name']); ?>" />                                                    
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 col-xs-12 control-label"><span class="required">*</span>Page Url</label>
            <div class="col-md-9 col-xs-12">
              <input type="text" name="friendly_url" class="form-control" value="<?php echo set_value('friendly_url', $res['friendly_url']); ?>" />                                                    
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 col-xs-12 control-label"><span class="required">*</span>Success Story</label>
            <div class="col-md-9 col-xs-12">
              <textarea name="testimonial_description" rows="5" class="form-control" cols="50" id="testimonial_description" ><?php echo set_value('testimonial_description', $res['testimonial_description']); ?></textarea>
              <?php echo display_ckeditor($ckeditor); ?>
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 col-xs-12 control-label"><span class="required">*</span>Success Story in Portuguese</label>
            <div class="col-md-9 col-xs-12">
              <textarea name="testimonial_description_p" rows="5" class="form-control" cols="50" id="testimonial_description" ><?php echo set_value('testimonial_description_p', $res['testimonial_description_p']); ?></textarea><?php echo display_ckeditor($ckeditor1); ?>
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-9 col-xs-12">
              <input type="submit" name="sub" value="Post" class="btn bg-red pull-right" />                        </div>
          </div>
          <?php echo form_close(); ?>
        </div>
      </div>
    </div>
  </div>
</div>

<?php $this->load->view('includes/footer'); ?>