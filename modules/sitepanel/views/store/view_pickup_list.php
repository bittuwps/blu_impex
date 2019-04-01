<?php $this->load->view('includes/header'); ?>
<!-- PAGE TITLE -->
<div class="page-title">                    
  <h2><span ></span><?php echo $heading_title; ?></h2>
  <div class="buttons">
    <a href="<?php echo base_url(); ?>sitepanel/store/add_point/" class="btn btn-primary pull-right">Add Pickup Point</a>
  </div>
</div>
<!-- END PAGE TITLE -->               
<!-- PAGE CONTENT WRAPPER -->
<div class="page-content-wrap">
  <div class="row">
    <div class="col-md-12">
      <?php
      error_message();
      validation_message();
      ?>
      <!-- START DEFAULT DATATABLE -->
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="table-responsive">
            <?php
            if (is_array($res) && !empty($res)) {
              echo form_open("sitepanel/store/pickup_point", 'id="data_form"');
              ?>
              <table class="table datatable" id="my_data">
                <?php
                $atts = array(
                    'width' => '650',
                    'height' => '400',
                    'scrollbars' => 'yes',
                    'status' => 'yes',
                    'resizable' => 'yes',
                    'screenx' => '0',
                    'screeny' => '0'
                );
                ?>
                <thead>
                  <tr>
                    <th  width="23" style="text-align: center;">
                      <input type="checkbox" onclick="$('input:checkbox').not(this).prop('checked', this.checked);" />
                    </th>
                    <th>Pickup Point Name</th>
                    <th>Area/Address</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  foreach ($res as $catKey => $pageVal) {
                    ?>
                    <tr>
                      <td   width="23" style="text-align: center;">
                        <input type="checkbox" name="arr_ids[]" class="chk" value="<?php echo $pageVal['setId']; ?>" />
                      </td>
                      <td><?php echo $pageVal['pickup_name']; ?></td>
                      <td>
                        <b>Area:</b> <?php echo $pageVal['pickup_city']; ?><br />
                        <b>Address:</><?php echo $pageVal['pickup_address']; ?>
                      </td>
                      <td class="left" valign="top"><?php echo ($pageVal['status'] == 1) ? "Active" : "In-active"; ?></td>
                      <td align="center" valign="top">
                        <p >                    
                          <?php echo anchor("sitepanel/store/edit_point/$pageVal[setId]/" . query_string(), "<span>Edit</span>", 'class="btn btn-info" '); ?> 
                        </p>
                      </td>
                    </tr>
                  <?php } ?>
                </tbody>
                <tr>
                  <td align="left" colspan="6" style="padding:2px" height="35">
                    <input name="status_action" type="submit"  value="Activate" class="button2" id="Activate" onClick="return validcheckstatus('arr_ids[]', 'Activate', 'Record', 'u_status_arr[]');"/>
                    <input name="status_action" type="submit" class="button2" value="Deactivate" id="Deactivate"  onClick="return validcheckstatus('arr_ids[]', 'Deactivate', 'Record', 'u_status_arr[]');"/>
                    <input name="status_action" type="submit" class="button2" id="Delete" value="Delete"  onClick="return validcheckstatus('arr_ids[]', 'delete', 'Record');"/> 
                  </td>
                </tr>
              </table>
              <?php
              echo form_close();
            } else {
              ?>
              <center><strong><?php echo "No Record(s) Found!"; ?></strong></center>
              <?php
            }
            ?>
          </div>
        </div>
      </div>
      <!-- END DEFAULT DATATABLE -->
    </div>
  </div>                                
</div>
<!-- PAGE CONTENT WRAPPER --> 
<script type="text/javascript">
  function onclickgroup() {
    if (validcheckstatus('arr_ids[]', 'set', 'record', 'u_status_arr[]')) {
      $('#data_form').submit();
    }
  }
</script>
<?php $this->load->view('includes/footer'); ?>