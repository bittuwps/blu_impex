<?php $this->load->view('includes/header'); ?>  
<!-- PAGE TITLE -->
<div class="page-title">                    
  <h2><span ></span><?php echo $heading_title; ?></h2>
  <div class="buttons">
    <?php echo anchor("sitepanel/brands/add", "<span><i class='fa fa-plus'></i>Add $heading_title</span>", 'class="btn btn-primary pull-right" '); ?></div>
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
              echo form_open("sitepanel/brands/", 'id="data_form"');
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
                    <th>Image</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  foreach ($res as $catKey => $pageVal) {
                    $imgdisplay = FALSE;
                    $displayorder = ($pageVal['sort_order'] != '') ? $pageVal['sort_order'] : "0";
                    ?>
                    <tr>
                      <td>
                        <input type="checkbox" name="arr_ids[]" value="<?php echo $pageVal['brand_id']; ?>" />
                        <input type="hidden" name="category_count" value="Y" />
                        <input type="hidden" name="product_count" value="Y" />
                      </td>
                      <td>
                        <?php echo $pageVal['brand_name']; ?>
                      </td>
                      <td><img src="<?php echo get_image('brands', $pageVal['brand_image'], 50, 50, 'AR'); ?>"</td>
                      <td><?php echo ($pageVal['status'] == 1) ? "Active" : "In-active"; ?></td>
                      <td>
                        <?php echo anchor("sitepanel/brands/edit/$pageVal[brand_id]/" . query_string(), "<span><i class='icon-edit'></i>Edit</span>", 'class="btn btn-info" '); ?>
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