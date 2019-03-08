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
            <label class="col-md-3 col-xs-12 control-label"><span class="required">*</span>Locations</label>
            <div class="col-md-6">
              <select name="location_id[]" id="categorIds" class="form-control" required multiple size="7">
                <?php
                foreach($locations as $lk=>$lval){
                  $selArray = explode(',',$res['location_id']);
                  $sel = (in_array($lval['meta_id'], $selArray))?'selected':'';
                  ?><option value="<?php echo $lval['meta_id'];?>" <?php echo $sel; ?>>-<?php echo ucwords($lval['page_url']);?></option><?php
                }
                ?>
              </select>
              <?php echo form_error('location_id'); ?>
            </div>
          </div>
          
          <!--<div class="form-group">
            <label class="col-md-3 col-xs-12 control-label">Page Heading</label>
            <div class="col-md-6 col-xs-12">     
              <input type="text" class="form-control" name="page_heading" id="title" value="<?php //echo set_value('page_heading',$res['page_heading']); ?>" />
              <?php //echo form_error('page_heading'); ?>
              <br /><b style="color:#660000;">Buy {catname} online in {location}</b>
            </div>
          </div>-->
          <div class="form-group">
            <label class="col-md-3 col-xs-12 control-label"><span class="required">*</span>Description</label>
            <div class="col-md-6 col-xs-12">     
              <textarea class="form-control" name="description" id="description"><?php echo set_value('description',$res['description']); ?></textarea><?php echo form_error('description'); ?><?php echo display_ckeditor($ckeditor); ?><br /><b style="color:#660000;">Contrary to {location} belief, Lorem {catname} is not simply random text.</b>
            </div>
          </div>

          <div class="form-group">
            <label class="col-md-3 col-xs-12 control-label"><span class="required">*</span>Short Description</label>
            <div class="col-md-6 col-xs-12">     
              <textarea class="form-control" name="short_description" id="short_description"><?php echo set_value('short_description',$res['short_description']); ?></textarea><?php echo form_error('short_description'); ?><br /><b style="color:#660000;">Contrary to {location} belief, Lorem {catname} is not simply random text.</b>
            </div>
          </div>

          <div class="form-group">
            <label class="col-md-3 col-xs-12 control-label"><span class="required">*</span>Title</label>
            <div class="col-md-6 col-xs-12">     
              <input type="text" class="form-control" name="meta_title" id="title" value="<?php echo set_value('meta_title',$res['meta_title']); ?>" /><?php echo form_error('meta_title'); ?>
              <br /><b style="color:#660000;">{catname} manufacturer in {location}</b>
            </div>
          </div>

          <div class="form-group">
            <label class="col-md-3 col-xs-12 control-label"><span class="required">*</span>Keywords</label>
            <div class="col-md-6 col-xs-12"> 
              <textarea class="form-control" name="meta_keyword" rows="5" cols="80" id="keyword" ><?php echo set_value('meta_keyword',$res['meta_keyword']); ?></textarea><?php echo form_error('meta_keyword'); ?><br /><b style="color:#660000;">{catname} manufacturer in {location}</b>
            </div> 
          </div>

          <div class="form-group">
            <label class="col-md-3 col-xs-12 control-label"><span class="required">*</span>Description</label>
            <div class="col-md-6 col-xs-12"> 
              <textarea class="form-control" name="meta_description" rows="5" cols="80" id="description" ><?php echo set_value('meta_description',$res['meta_description']); ?></textarea><?php echo form_error('meta_description'); ?><br /><b style="color:#660000;">{catname} manufacturer in {location}</b>
            </div> 
          </div>

          <div class="form-group">
            <label class="col-md-3 col-xs-12 control-label">Keyword 1</label>
            <div class="col-md-3 col-xs-12">     
              <input type="text" class="form-control" placeholder="Keyword 1" name="meta_key1" id="title" value="<?php echo set_value('meta_key1',$res['meta_key1']); ?>" /><?php echo form_error('meta_key1'); ?>
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 col-xs-12 control-label">Keyword 2</label>
            <div class="col-md-3 col-xs-12">     
              <input type="text" class="form-control" placeholder="Keyword 2" name="meta_key2" id="title" value="<?php echo set_value('meta_key2',$res['meta_key2']); ?>" /><?php echo form_error('meta_key1'); ?>
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 col-xs-12 control-label">Keyword 3</label>
            <div class="col-md-3 col-xs-12">     
              <input type="text" class="form-control" placeholder="Keyword 3" name="meta_key3" id="title" value="<?php echo set_value('meta_key3',$res['meta_key3']); ?>" /><?php echo form_error('meta_key1'); ?>
            </div>
          </div>

          <div class="form-group">
            <div class="col-md-9">                                                                            <input type="submit" class="btn bg-red pull-right" name="update" value="Update">
            </div>
          </div>
          <?php echo form_close(); ?>
        </div>
      </div>
    </div>
  </div>
</div>

<?php $this->load->view('includes/footer'); ?>



