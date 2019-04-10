<?php $this->load->view('includes/header'); ?>
<div class="page-title">                    
  <h2><span ></span><?php echo $heading_title; ?></h2>
  <div class="buttons">
    <a href="<?= base_url('sitepanel/videos/add') ?>" class="btn btn-primary pull-right">Add Videos</a>

  </div>
</div>
<!-- END PAGE TITLE -->                
<!-- PAGE CONTENT WRAPPER -->
<div class="page-content-wrap">                
  <div class="row">
    <div class="col-md-12">
      <!-- START DEFAULT DATATABLE -->
      <div class="panel panel-default">
        <div class="panel-body">
            <?= $this->session->flashdata('msg') ?>
          <div class="table-responsive">
            <?php
            if (is_array($videos) && !empty($videos)) {
              echo form_open("sitepanel/videos", 'id="data_form"');
              ?>
              <table class="table datatable" width="100%" id="my_data">
                <thead>
                  <tr>
                    <th width="23" style="text-align: center;"><input type="checkbox" onclick="$('input:checkbox').not(this).prop('checked', this.checked);" /></th>
                    <th>Title</th>
                    <th>Link</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                    $atts = array('width' => '900', 'height' => '600', 'scrollbars' => 'yes', 'status' => 'yes', 'resizable' => 'yes', 'screenx' => '0', 'screeny' => '0');
                    $atts1 = array('width' => '650', 'height' => '400', 'scrollbars' => 'yes', 'status' => 'yes', 'resizable' => 'yes', 'screenx' => '200', 'screeny' => '150');
                    foreach ($videos as $k=>$r) {
                        ?>
                    <tr>
                        <td style="text-align: center;">
                            <input type="checkbox" name="arr_ids[]" value="<?php echo $r['id']; ?>" />
                        </td>
                        <td class="left">
                            <strong><?= $r['title']; ?></strong>
                        </td>
                        <td align="left">
                            <?= $r['link']; ?>
                        </td>
                        <td>
                            <?php $st=$r['status']; if($st==0){$msg="Deleted";} if($st==1){$msg="Active";} if($st==2){$msg="De Active";} echo $msg; ?>
                        </td>
                        <td>
                            <a href="<?= base_url() ?>sitepanel/videos/edit/<?= $r['id'] ?>">Edit </a>
                        </td>
                    </tr>
                        <?php
                    }
                ?> 
                </tbody>
              </table>
              <table class="list" width="100%"> 
                <tbody>
                    <tr>
                        <td align="left" style="padding:5px">
                            <input name="status_action" type="submit"  value="Activate" class="button2" id="Activate" onClick="return validcheckstatus('arr_ids[]', 'Activate', 'Record', 'u_status_arr[]');"/>
    
                            <input name="status_action" type="submit" class="button2" value="Deactivate" id="Deactivate"  onClick="return validcheckstatus('arr_ids[]', 'Deactivate', 'Record', 'u_status_arr[]');"/>
                            <?php if ($this->session->userdata('admin_type') == 1) { ?>
                              <input name="status_action" type="submit" class="button2" id="Delete" value="Delete"  onClick="return validcheckstatus('arr_ids[]', 'delete', 'Record');"/>
                            <?php } ?>
                        </td>
                    </tr>
                </tbody>
            </table>
            <?= form_close(); ?>
            <?php }else{ ?>
                <div class="alert alert-danger">
                    No Videos Found
                </div>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
  $.noConflict();
  function onclickgroup() {
    if (validcheckstatus('arr_ids[]', 'Update order status', 'record', 'u_status_arr[]')) {
      $('#data_form').submit();
    }
  }
</script>
<?php $this->load->view('includes/footer'); ?>