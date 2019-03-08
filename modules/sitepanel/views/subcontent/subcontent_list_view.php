<?php $this->load->view('includes/header'); ?> 
<div class="page-title">                    
  <h2><span ></span><?php echo $heading_title; ?></h2>
  <a href="<?php echo base_url("sitepanel/subcontent/add"); ?>" class="btn btn-primary pull-right">Add Standard Sudomain Content</a>
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
              echo form_open("", 'id="data_form" class="form-horizontal"');
              ?>
              <table class="table datatable" width="100%" id="my_data">
                <thead>
                  <tr>
                    <th width="20" style="text-align: center;">
                      <input type="checkbox" onclick="$('input:checkbox').not(this).prop('checked', this.checked);" />
                    </th>
                    <th>Category</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  foreach ($res as $catKey => $pageVal) {
                    $imgdisplay = FALSE;
                    $cat = explode(',',$pageVal['category_id']);
                    $cat = array_unique($cat);
                    ?>
                    <tr>
                      <td style="text-align: center;">
                        <input type="checkbox" name="arr_ids[]" value="<?php echo $pageVal['subcontentId']; ?>" />
                      </td>
                      <td class="left">
                        <a href="#" data-toggle="modal" data-target=".pro_list_<?php echo $pageVal['subcontentId']; ?>">View Categories</a>
                        <div class="modal fade pro_list_<?php echo $pageVal['subcontentId']; ?>" tabindex="-1" role="dialog" aria-labelledby="description" aria-hidden="true">
                          <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <h4 class="modal-title" id="description">Categories Added</h4>
                              </div>
                              <div class="modal-body">
                                <div class="row">
                                <?php
                                $slLoc = 1;
                                foreach($cat as $cval){
                                  ?>
                                  <div class="col-md-3 cols-sm-3">
                                    <?php
                                    echo '<b>('.$slLoc.').</b> '.ucwords(get_db_field_value('wl_categories','category_name',"WHERE category_id = '".$cval."'"));
                                    ?>
                                  </div>
                                  <?php                                  
                                  $slLoc++;
                                }
                                ?>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </td>
                      <td class="left">
                        <?php echo $pageVal['short_description']; ?>
                      </td>	
                      <td align="left" ><?php echo ($pageVal['status'] == 1) ? "Active" : "In-active"; ?></td>
                      <td>
                        <?php echo anchor("sitepanel/subcontent/edit/$pageVal[subcontentId]/" . query_string(), '<span>Edit</span>', 'class="btn btn-info"'); ?>
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

