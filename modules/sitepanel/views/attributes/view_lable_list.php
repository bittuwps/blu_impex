<?php 
$this->load->view('includes/header'); 
$attr = $this->config->item('attributeArray');
?>
<!-- PAGE TITLE -->
<div class="page-title">                    
  <h2><span ></span><?php echo $heading_title; ?></h2>
  <div class="buttons">
    <?php echo anchor("sitepanel/attributes/lable_add/$parent_id", "<span><i class='fa fa-plus'></i>Add $heading_title</span>", 'class="btn btn-primary pull-right" '); ?></div>
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
              echo form_open("sitepanel/attributes/lables/", 'id="data_form"');
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
                    <th width="31" style="text-align: center;">
                      <input type="checkbox" onclick="$('input:checkbox').not(this).prop('checked', this.checked);" /></th>
                    <th>Name</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  foreach ($res as $catKey => $pageVal) {
                    ?>
                    <tr>
                      <td>
                        <input type="checkbox" name="arr_ids[]" value="<?php echo $pageVal['id']; ?>" />
                      </td>
                      <td>
                        <?php
                        echo $pageVal['name'];
                        ?>
                      </td>
                      <td><?php echo ($pageVal['status'] == 1) ? "Active" : "In-active"; ?></td>
                      <td>
                        <?php echo anchor("sitepanel/attributes/lable_edit/".$pageVal['id']."/" . query_string(), "<span><i class='icon-edit'></i>Edit</span>", 'class="btn btn-info" '); ?>
                      </td>
                    </tr>
                    <?php
                  }
                  ?>
                </tbody>                
              </table>
              <table class="list" width="100%"> 
                <tr>
                  <td align="left" style="padding:5px">
                    <input name="status_action" type="submit"  value="Activate" class="button2" id="Activate" onClick="return validcheckstatus('arr_ids[]', 'Activate', 'Record', 'u_status_arr[]');"/>

                    <input name="status_action" type="submit" class="button2" value="Deactivate" id="Deactivate"  onClick="return validcheckstatus('arr_ids[]', 'Deactivate', 'Record', 'u_status_arr[]');"/>

                    <input name="status_action" type="submit" class="button2" id="Delete" value="Delete"  onClick="return validcheckstatus('arr_ids[]', 'delete', 'Record');"/>
                    <input name="update_order" type="submit"  value="Update Order" class="button2" />

                  </td>
                </tr>
                </tbody>
              </table>

              <?php echo form_close(); ?>

            <?php } else { ?>
              <center><strong><?php echo "No Record(s) Found!" ?></strong></center>
            <?php } ?>
          </div>
        </div>
      </div>
      <!-- END DEFAULT DATATABLE -->
    </div>
  </div>                                

</div>
<!-- PAGE CONTENT WRAPPER -->                                
<?php $this->load->view('includes/footer'); ?>