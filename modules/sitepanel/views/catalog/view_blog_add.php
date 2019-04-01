<?php $this->load->view('includes/header'); ?> 


<div class="page-title">
  <h2><span ></span><?php echo $heading_title; ?></h2>

</div>

<div class="page-content-wrap">

  <div class="row">

    <div class="col-md-12">
      <?php echo validation_message(); ?>
      <?php echo error_message(); ?> 
      <?php if ($this->session->flashdata('success')) { ?>
        <div class="alert alert-info" id="success-alert">
          <?php echo $this->session->flashdata('success'); ?>
        </div>
      <?php } ?>
      <?php echo form_open_multipart('', array('id' => 'form', 'class' => "form-horizontal")); ?>
      <div class="panel panel-default tabs"> 
        <ul class="nav nav-tabs" role="tablist">
          <li class="active"><a href="#tab-general" role="tab" data-toggle="tab">General</a></li>
        </ul>
        <div class="panel-body tab-content">
          <div class="tab-pane active" id="tab-general">
            <?php
            $default_params = array(
                'heading_element' => array(
                    'field_heading' => "Blog Title",
                    'field_name' => "article_title",
                    'field_placeholder' => "",
                    'exparams' => 'size="50"'
                ),
                'url_element' => array(
                    'field_heading' => "Page URL",
                    'field_name' => "friendly_url",
                    'field_placeholder' => "Your Page URL",
                    'exparams' => 'size="50"',
                    'pre_seo_url' => '',
                    'pre_url_tag' => FALSE
                )
            );
            seo_add_form_element($default_params);
            ?>
            <div class="form-group">
              <label class="col-md-3 col-xs-12 control-label"><span class="required">*</span>Blog Title Portuguese :</label>
              <div class="col-md-6">                                            
                <input type="text" name="article_title_p" class="form-control"size="70" value="<?php echo set_value('article_title_p'); ?>" />
              </div>
            </div>
            
            
            <div class="form-group">
              <label class="col-md-3 col-xs-12 control-label"><span class="required">*</span>Author Name :</label>
              <div class="col-md-6">                                            
                <input type="text" name="blog_author" class="form-control"size="70" value="<?php echo set_value('blog_author'); ?>" />
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-3 col-xs-12 control-label">Short Description</label>
              <div class="col-md-6 col-xs-12">                                            
                <textarea style="width: 70%;" name="short_desc" rows="5" cols="70" id="short_desc" ><?php echo set_value('short_desc'); ?></textarea>
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-3 col-xs-12 control-label">Short Description Portuguese</label>
              <div class="col-md-6 col-xs-12">                                            
                <textarea style="width: 70%;" name="short_desc_p" rows="5" cols="70" id="short_desc_p" ><?php echo set_value('short_desc_p'); ?></textarea>
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-3 col-xs-12 control-label">Description</label>
              <div class="col-md-6 col-xs-12">                                            
                <textarea name="article_desc" rows="5" cols="50" id="article_desc" ><?php echo set_value('article_desc'); ?></textarea> <?php echo display_ckeditor($ckeditor); ?>
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-3 col-xs-12 control-label">Description in Portuguese</label>
              <div class="col-md-6 col-xs-12">                                            
                <textarea name="article_desc_p" rows="5" cols="50" id="article_desc_p" ><?php echo set_value('article_desc_p'); ?></textarea> <?php echo display_ckeditor($ckeditor1); ?>
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-3 col-xs-12 control-label"> Blog Image :</label>
              <div class="col-md-6 col-xs-12">                                            
                <input type="file" name="image1" id="image1" />
              </div>
            </div>
            <div class="buttons pull-right col-md-2">
              <input type="submit" name="sub" value="Post" class="btn btn-primary pull-right" onclick="$('#form').submit();">
              <a href="<?php echo base_url('sitepanel/blog'); ?>"  class="btn bg-red pull-left">Cancel</a>  
            </div>
          </div>
          <div class="form-group">

            <div class="col-md-6 col-xs-12">                                                                                            <input type="hidden" name="action" value="addnews" />
              <input type="hidden" name="pcatID" value="" />

            </div>
          </div>
        </div>
      </div>
    </div>
    <?php echo form_close(); ?>
  </div>
</div>
<?php $this->load->view('includes/footer'); ?>