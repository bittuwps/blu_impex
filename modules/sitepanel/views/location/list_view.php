<?php $this->load->view('includes/header'); ?> 
<div class="page-title">                    
  <h2><span ></span><?php echo $heading_title; ?></h2>
  <a href="<?php echo base_url("sitepanel/location/add_country"); ?>" class="btn btn-primary pull-right">Add New Country</a>


</div>

<div class="page-content-wrap">                

  <div class="row">
    <div class="col-md-12">
      <?php if ($this->session->flashdata('success')) { ?>
        <div class="alert alert-info">
          <?php echo $this->session->flashdata('success'); ?>
        </div>
      <?php } ?>
      <!-- START DEFAULT DATATABLE -->
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="table-responsive">
            <?php
            if (is_array($res) && !empty($res)) {
              echo form_open("sitepanel/location", 'id="data_form" class="form-horizontal"');
              ?>

              <table class="table datatable" width="100%" id="my_data">
                <thead>
                  <tr>
                    <th width="20" style="text-align: center;">
                      <input type="checkbox" onclick="$('input:checkbox').not(this).prop('checked', this.checked);" />
                    </th>
                    <th>Name </th>									
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  foreach ($res as $catKey => $pageVal) {
                    $imgdisplay = FALSE;
                    ?>
                    <tr>
                      <td style="text-align: center;">
                        <input type="checkbox" name="arr_ids[]" value="<?php echo $pageVal['id']; ?>" />
                      </td>
                      <td class="left">
    <?php echo $pageVal['country_name']; ?>
                      </td>	

        <!--                <td class="left"><?php //echo ($pageVal['cont_currency'] != '') ? '<strong>' . $pageVal['cont_currency'] . '</strong>' : 'N/A';   ?></td>-->
                      <td align="left" ><?php echo ($pageVal['status'] == 1) ? "Active" : "In-active"; ?></td>
                      <td>
    <?php echo anchor("sitepanel/location/edit_country/$pageVal[id]/" . query_string(), '<span>Edit</span>', 'class="btn btn-info"'); ?>
                      </td>
                    </tr>
                    <?php
                  }
                  ?>
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
              echo "<center><strong> No Record(s) Found !</strong></center>";
            }
            ?>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php $this->load->view('includes/footer'); ?>

