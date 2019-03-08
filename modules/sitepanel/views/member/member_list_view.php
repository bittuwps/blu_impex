<?php $this->load->view('includes/header'); ?>


<!-- PAGE TITLE -->
<div class="page-title">                    
  <h2><span ></span><?php echo $heading_title; ?></h2>
</div>
<!-- END PAGE TITLE -->                

<!-- PAGE CONTENT WRAPPER -->
<div class="page-content-wrap">                

  <div class="row">
    <div class="col-md-12">

      <!-- START DEFAULT DATATABLE -->
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="table-responsive">
            <?php
            if (count($pagelist) > 0) {
              ?>
              <?php echo form_open("sitepanel/members/", 'id="data_form"'); ?>         


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
                    <th>Username</th>
                    <th>Password</th>
                    <th>Reg. Date</th>
                    <th>Status</th>

                  </tr>
                </thead>



                <tbody>
                  <?php
                  foreach ($pagelist as $catKey => $pageVal) {
                    ?>    

                    <tr>
                      <td><input type="checkbox" name="arr_ids[]" value="<?php echo $pageVal['customers_id']; ?>" /></td>
                      <td>
                        <?php echo $pageVal['name']; ?>             
                        <br /> <br /> 
                        <?php echo anchor_popup('sitepanel/members/details/' . $pageVal['customers_id'], 'View Details!', $atts); ?>
                        <br /><br />
                      </td>
                      <td><?php echo $pageVal['user_name']; ?></td>
                      <td><?php echo $pageVal['password']; ?></td>
                      <td><?php echo getDateFormat($pageVal['account_created_date'], 7); ?></td>
                      <td><?php echo ($pageVal['status'] == '1') ? "Active" : "Inactive"; ?></td>
                    </tr>
                  <?php } ?>
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
              <center><strong><?php echo "No Record(s) Found!"; ?></strong></center>
            <?php } ?>
          </div>
        </div>
      </div>
      <!-- END DEFAULT DATATABLE -->




    </div>
  </div>                                

</div>
<!-- PAGE CONTENT WRAPPER -->                                
</div>    
<!-- END PAGE CONTENT -->
</div>
<!-- END PAGE CONTAINER -->       

<!-- MESSAGE BOX-->
<div class="message-box animated fadeIn" data-sound="alert" id="mb-signout">
  <div class="mb-container">
    <div class="mb-middle">
      <div class="mb-title"><span class="fa fa-sign-out"></span> Log <strong>Out</strong> ?</div>
      <div class="mb-content">
        <p>Are you sure you want to log out?</p>                    
        <p>Press No if you want to continue work. Press Yes to logout current user.</p>
      </div>
      <div class="mb-footer">
        <div class="pull-right">
          <a href="pages-login.html" class="btn btn-success btn-lg">Yes</a>
          <button class="btn btn-default btn-lg mb-control-close">No</button>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- END MESSAGE BOX-->
<?php $this->load->view('includes/footer'); ?>