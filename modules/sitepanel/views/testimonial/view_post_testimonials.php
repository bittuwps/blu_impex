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
          <?php echo form_open_multipart("sitepanel/testimonial/post", 'class="form-horizontal"'); ?> 
          <div class="form-group">
            <label class="col-md-3 col-xs-12 control-label"><span class="required">*</span>Name</label>
            <div class="col-md-9 col-xs-12">                                                                                  <input type="text" name="poster_name" class="form-control" value="<?php echo set_value('poster_name'); ?>" />                                                    
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 col-xs-12 control-label"><span class="required">*</span>Testimonial image</label>
              <div class="col-md-9 col-xs-12">
                <input type="file" class="fileinput btn-primary" name="image1" id="image1" title="Browse file" accept="image/*">
              </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 col-xs-12 control-label"><span class="required">*</span>Success Story</label>
            <div class="col-md-9 col-xs-12">
              <textarea name="testimonial_description" rows="5" class="form-control" cols="50" id="testimonial_description" ><?php echo set_value('testimonial_description'); ?></textarea>
              <?php echo display_ckeditor($ckeditor); ?>                                         
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 col-xs-12 control-label"><span class="required">*</span>Success Story in Portuguese</label>
            <div class="col-md-9 col-xs-12">
              <textarea name="testimonial_description_p" rows="5" class="form-control" cols="50" id="testimonial_description_p" ><?php echo set_value('testimonial_description_p'); ?></textarea>
              <?php echo display_ckeditor($ckeditor1); ?>                                         
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-9 col-xs-12">
              <input type="submit" name="sub" value="Post" class="btn bg-red pull-right" />                                 </div>
          </div>
          <?php echo form_close(); ?>
        </div>
      </div>
    </div>
  </div>
</div>

<?php if (1 == 2) { ?>
  <div class="content">
    <div id="content">


      <div class="box">
        <div class="content">

          <?php echo validation_message(); ?>
          <?php echo error_message(); ?>  

          <?php echo form_open_multipart("sitepanel/testimonial/post"); ?>  
          <div id="tab_pinfo">
            <table width="90%"  class="form"  cellpadding="3" cellspacing="3">

              <tr class="trOdd">
                <td width="28%" height="26" align="right" ><span class="required">*</span> Name:</td>
                <td width="72%" align="left">
                  <input type="text" name="poster_name" size="40" value="<?php echo set_value('poster_name'); ?>"></td>
              </tr>
              <tr class="trOdd">
                <td height="26" align="right"> <span class="required">*</span> Comment:</td>
                <td>
                  <textarea name="testimonial_description" rows="5" cols="50" id="testimonial_description" > <?php echo set_value('testimonial_description'); ?></textarea>
                  <?php echo display_ckeditor($ckeditor); ?>
                </td>
              </tr>
          <!--<tr class="trOdd">
          <td width="28%" height="26" align="right" > Image :</td>
          <td align="left">
            <input type="file" name="testimonial_image" />
            <br />
                      <br />
            [ ( File should be .jpg, .png, .gif format and file size should not be more then 2 MB (2048 KB)) ( Best image size 211X175 ) ]
          </td>
        </tr>-->
              <tr class="trOdd">
                <td align="left">&nbsp;</td>
                <td align="left">
                  <input type="submit" name="sub" value="Post" class="button2" />

                </td>
              </tr>
            </table>
          </div>
          <?php echo form_close(); ?>
        </div>
      </div>
    <?php } ?>

    <?php $this->load->view('includes/footer'); ?>