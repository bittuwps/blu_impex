<?php
$curr_sec_val = $this->input->post('section') ? $this->input->post('section') : $res->banner_page;
$curr_position_val = $this->input->post('banner_position') ? $this->input->post('banner_position') : $res->banner_position;
//trace($res);
?>
<?php $this->load->view('includes/header'); ?>
<div class="page-title">
  <h2><span><?php echo $heading_title; ?></span></h2>
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

          <?php echo form_open_multipart(current_url_query_string(), 'class="form-horizontal"'); ?>
          <div class="form-group">
            <label class="col-md-3 col-xs-12 control-label"><span class="required">*</span>Section</label>
            <div class="col-md-6 col-xs-12">

              <select name="section" class="form-control" onchange="change_ban_postions(this.value);">
                <option value="">Select Section</option>
                <?php
                foreach ($this->config->item('bannersections') as $key => $val) {
                  $sel = ($curr_sec_val == $key ) ? "selected" : "";
                  ?> 
                  <option value="<?php echo $key; ?>" <?php echo $sel; ?> ><?php echo $val; ?></option> 
                  <?php
                }
                ?>  
              </select>

            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 col-xs-12 control-label"><span class="required">*</span>Banner Position</label>
            <div class="col-md-6 col-xs-12">                                                                                                <div id="ban_postion">
                <?php echo banner_postion_drop_down('banner_position', $curr_position_val, $this->input->post('section')); ?>
              </div>
            </div>                                                      
          </div>

          <div class="form-group">
            <label class="col-md-3 col-xs-12 control-label">Banner Image</label>
            <div class="col-md-3 col-xs-12">                                                                                                          

              <a class="file-input-wrapper btn btn-default  fileinput btn-primary"><span>Browse file</span><input type="file" class="fileinput btn-primary" name="image1" id="image1" title="Browse file"></a>

            </div>
            <div class="col-md-3 col-xs-12">                                                                                                          
              <?php $product_path = "banner/" . $res->banner_image; ?>                                
              <a href="#" data-toggle="modal" data-target=".image_pop">
                <img src="<?php echo base_url() . 'uploaded_files/' . $product_path; ?>" width="150" class="img-responsive img-rounded center-block" alt=""></a>
            </div>

          </div>
            
             <div class="form-group">
            <label class="col-md-3 col-xs-12 control-label"><span class="required">*</span>Banner Title</label>
            <div class="col-md-6 col-xs-12">                                                                                          <input type="text" name="ban_title" id="ban_title" class="form-control" value="<?php echo $res->ban_title; ?>"/>                                                    
            </div>
          </div>
            
          <div class="form-group">
            <label class="col-md-3 col-xs-12 control-label"><span class="required">*</span>Banner URL</label>
            <div class="col-md-6 col-xs-12">                                                                                          <input type="text" name="url" id="url" class="form-control" value="<?php echo $res->banner_url; ?>"/> (e.g http://wwww.google.co.in)                                                    
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-6 col-xs-12">
              <input type="submit" name="sub" value="Update Banner" class="btn bg-red pull-right" />
              <input type="hidden" name="action" value="addbanner" />

            </div>
          </div>
          <?php echo form_close(); ?>
        </div>
      </div>
    </div>
  </div>
</div>



<div class="modal fade image_pop" tabindex="-1" role="dialog" aria-labelledby="image_modal" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title" id="image_modal">Image</h4>
      </div>
      <div class="modal-body">
        <img src="<?php echo base_url() . 'uploaded_files/' . $product_path; ?>" class="img-responsive img-rounded center-block" alt="">
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal mixer image -->

<script type="text/javascript">
  function change_ban_postions() {
    var section = $('[name="section"]').val();
    if (section != '' && section != 'undefined')
    {
      $.ajax({
        type: "POST",
        url: "<?php echo base_url(); ?>sitepanel/banners/ajx_ban_postions",
        data: {banner_section: section}
      }).done(function (data) {
        $('#ban_postion').html(data);
      });


    }
    return false;

  }
</script>
<?php $this->load->view('includes/footer'); ?>