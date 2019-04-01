<?php $this->load->view("includes/header"); ?>
<div class="page-title">
  <h2><span><?php echo $heading_title; ?></span></h2>
  <a href="javascript:void(0);" onclick="history.back();" class="btn btn-primary pull-right">Cancel</a>
</div>
<div class="page-content-wrap"> 
  <div class="fix"></div>

  <div class="row">

    <div class="col-md-12">

      <div class="panel panel-default">
        <div class="panel-body">
          <?php echo form_open_multipart("", 'class="form-horizontal"'); ?>
          <div class="form-group">
            <label class="col-md-3 col-xs-12 control-label"><span class="required">*</span>Country</label>
            <div class="col-md-6">                                                    
              <input type="text" class="form-control" name="country" value="<?php echo set_value('country') ?>"><?php echo form_error('country'); ?>
            </div>
          </div>

          <div style="border: 1px solid #ddd; padding: 10px; margin: 10px;">


            
            <div class="form-group">
              <label class="col-md-3 col-xs-12 control-label"><span class="required">*</span>Title</label>
              <div class="col-md-6 col-xs-12">     
                <input type="text" class="form-control" name="meta_title" id="title" value="<?php echo set_value('meta_title'); ?>" /><?php echo form_error('meta_title'); ?>
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-3 col-xs-12 control-label"><span class="required">*</span>Keywords</label>
              <div class="col-md-6 col-xs-12"> 
                <textarea class="form-control" name="meta_keyword" rows="5" cols="80" id="keyword" ><?php echo set_value('meta_keyword'); ?></textarea><?php echo form_error('meta_keyword'); ?>
              </div> 
            </div>

            <div class="form-group">
              <label class="col-md-3 col-xs-12 control-label"><span class="required">*</span>Description</label>
              <div class="col-md-6 col-xs-12"> 
                <textarea class="form-control" name="meta_description" rows="5" cols="80" id="description" ><?php echo set_value('meta_description'); ?></textarea><?php echo form_error('meta_description'); ?>
              </div> 
            </div>


            <div class="form-group">
              <label class="col-md-3 col-xs-12 control-label">Keyword 1</label>
              <div class="col-md-3 col-xs-12">     
                <input type="text" class="form-control" placeholder="Keyword 1" name="meta_key1" id="title" value="<?php echo set_value('meta_key1'); ?>" /><?php echo form_error('meta_key1'); ?>
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-3 col-xs-12 control-label">Keyword 2</label>
              <div class="col-md-3 col-xs-12">     
                <input type="text" class="form-control" placeholder="Keyword 2" name="meta_key2" id="title" value="<?php echo set_value('meta_key2'); ?>" /><?php echo form_error('meta_key1'); ?>
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-3 col-xs-12 control-label">Keyword 3</label>
              <div class="col-md-3 col-xs-12">     
                <input type="text" class="form-control" placeholder="Keyword 3" name="meta_key3" id="title" value="<?php echo set_value('meta_key3'); ?>" /><?php echo form_error('meta_key1'); ?>
              </div>
            </div>
          </div>

          <div class="form-group">
            <div class="col-md-9">                                                     
              <input type="submit" class="btn bg-red pull-right" name="submit" value="Submit">                    </div>
          </div>
          <?php echo form_close(); ?>
        </div>
      </div>
    </div>
  </div>
</div>
<?php $this->load->view("includes/footer"); ?>


