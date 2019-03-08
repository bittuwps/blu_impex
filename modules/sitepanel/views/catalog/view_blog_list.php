<?php $this->load->view('includes/header'); ?>
<div class="page-title">                    
  <h2><span ></span><?php echo $heading_title; ?></h2>
  <div class="buttons">
    <a href="<?php echo base_url(); ?>sitepanel/blog/add/" class="btn btn-primary pull-right">Add New Tips</a>
  </div>
</div>
<!-- END PAGE TITLE -->                

<!-- PAGE CONTENT WRAPPER -->
<div class="page-content-wrap">                

  <div class="row">
    <div class="col-md-12">
      <?php if ($this->session->flashdata('success')) { ?>
        <div class="alert alert-info" id="success-alert">
          <?php echo $this->session->flashdata('success'); ?>
        </div>
      <?php } ?>
      <!-- START DEFAULT DATATABLE -->
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="table-responsive">
            <?php
            if (is_array($res) && !empty($res)) {
              echo form_open("sitepanel/blog/index/", 'id="data_form"');
              ?>     
              <table class="table datatable" width="100%" id="my_data">
                <thead>
                  <tr>
                    <th width="23" style="text-align: center;"><input type="checkbox" onclick="$('input:checkbox').not(this).prop('checked', this.checked);" /></th>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Details</th>
                    <th>Image</th>
                    <th>Status</th>
                    <th>Action</th>

                  </tr>
                </thead>
                <tbody>
                  <?php
                  $j = 1;
                  foreach ($res as $catKey => $pageVal) {
                    $commentCount = count_record("wl_blog_comment", "ref_article_id =" . $pageVal['article_id']);
                    ?> 
                    <tr>
                      <td style="text-align: center;">
                        <input type="checkbox" name="arr_ids[]" value="<?php echo $pageVal['article_id']; ?>" />
                      </td>
                      <td class="left" valign="top"> 
                        <?php echo $pageVal['article_title']; ?>  <br />
                        <?php
                        echo "<br><br>" . anchor("sitepanel/blog/comment/" . $pageVal['article_id'], 'Comments [' . $commentCount . ']', 'class="refSection" ');
                        ?>
                        <div id="dialog_<?php echo $pageVal['article_id']; ?>" title="Description" style="display:none;"><?php echo $pageVal['article_desc']; ?></div>
                      </td>
                      <td class="left" valign="top">
                        <?php echo $pageVal['blog_author']; ?>
                      </td>
                      <td class="left" valign="top">
    <!--                    <a href="#"  onclick="$('#dialog_<?php echo $pageVal['article_id']; ?>').dialog({width: 650});">View Details</a> -->

                        <a href="#" data-toggle="modal" data-target=".pro_list_<?php echo $pageVal['article_id']; ?>">
                          View Details
                        </a>
                        <div class="modal fade pro_list_<?php echo $pageVal['article_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="description" aria-hidden="true">
                          <div class="modal-dialog modal-lg">
                            <div class="modal-content">

                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <h4 class="modal-title" id="description">Details</h4>
                              </div>
                              <div class="modal-body">
                                <?php echo $pageVal['article_desc']; ?>
                              </div>
                            </div>
                          </div>
                        </div> 
                      </td>
                      <td class="left" valign="top">
                        <img src="<?php echo get_image('blog', $pageVal['article_image'], '150', '150', 'R'); ?>" />
                      </td>
                      <td class="left" valign="top">
                        <?php echo ($pageVal['status'] == 1) ? "Active" : "In-active"; ?>
                      </td>
                      <td align="center" valign="top">
                        <?php
                        echo anchor("sitepanel/blog/edit/" . $pageVal['article_id'] . query_string(), 'Edit');
                        ?> 
                      </td>
                    </tr>
                    <?php
                    $j++;
                  }
                  ?> 

                </tbody>
              </table>
              <table class="list" width="100%">
                <tr>
                  <td align="left" colspan="11" style="padding:2px" height="35">
                    <input name="status_action" type="submit"  value="Activate" class="button2" id="Activate" onClick="return validcheckstatus('arr_ids[]', 'Activate', 'Record', 'u_status_arr[]');"/>
                    <input name="status_action" type="submit" class="button2" value="Deactivate" id="Deactivate"  onClick="return validcheckstatus('arr_ids[]', 'Deactivate', 'Record', 'u_status_arr[]');"/>
                    <input name="status_action" type="submit" class="button2" id="Delete" value="Delete"  onClick="return validcheckstatus('arr_ids[]', 'delete', 'Record');"/> 
                  </td>
                </tr>
              </table>
              <?php
              echo form_close();
            } else {
              echo "<center><strong> No record(s) found !</strong></center>";
            }
            ?>   
            <center><strong></strong></center>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php $this->load->view('includes/footer'); ?>