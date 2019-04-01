<?php
$this->load->view('includes/header');
$block_path = $inq_type == 'Wholesale' ? "enquiry/wholesale/" : "enquiry/";
?> 
<div class="page-title">                    
  <h2><span ></span><?php echo $heading_title; ?></h2> 
</div>
<div class="page-content-wrap">                

  <div class="fix"></div>
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
              ?>
              <?php echo form_open("sitepanel/enquiry/", 'id="data_form"'); ?>
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
                      <input type="checkbox" onclick="$('input:checkbox').not(this).prop('checked', this.checked);" /></th>
                    <th>User Info</th>
                    <th>E-Mail</th>
                    <th>COmments</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  foreach ($res as $catKey => $res) {
                    $address_details = array();
                    ?> 
                    <tr>
                      <td style="text-align: center;" valign="top">
                        <input type="checkbox" name="arr_ids[]" value="<?php echo $res['id']; ?>" /></td>
                      <td>
                        <?php echo $res['first_name']; ?> <?php echo $res['last_name']; ?> <br>
                        <?php
                        if ($res['country'] != "" && $res['country'] != '0') {
                          $address_details[] = "<b>Country : </b>" . $res['country'];
                        }

                        if ($res['city'] != "" && $res['city'] != '0') {
                          $address_details[] = "<b>City : </b>" . $res['city'];
                        }

                        if ($res['state'] != "" && $res['state'] != '0') {
                          $address_details[] = "<b>State : </b>" . $res['state'];
                        }


                        if ($res['company_name'] != "" && $res['company_name'] != '0') {
                          $address_details[] = "<b>Company : </b>" . $res['company_name'];
                        }
                        if ($res['address'] != "" && $res['address'] != '0') {
                          $address_details[] = "<b>Address : </b>" . $res['address'];
                        }
                        if ($res['phone_number'] != "" && $res['phone_number'] != '0') {
                          $address_details[] = "<b>Phone : </b>" . $res['phone_number'];
                        }

                        if ($res['mobile_number'] != "" && $res['mobile_number'] != '0') {
                          $address_details[] = "<b>Mobile No. : </b>" . $res['mobile_number'];
                        }
                        if (!empty($address_details)) {
                          echo implode("<br>", $address_details) . "<br /><br />";
                        }

                        if (!empty($res['product_id'])) {
                          echo "<b>Product Enquiry : </b>" . get_db_field_value('wl_products', "product_name", "WHERE products_id='" . $res['product_id'] . "'") . "<br /><br />";
                        }
                        ?>
                        <?php if ($res['reply_status'] == 'Y') { ?>
                          <font color="#FF0000">Replied</font>  
                        <?php } ?>
                        <br />
                        <?php //echo anchor('sitepanel/enquiry/send_reply/' . $res['id'], 'Send Reply', $atts); ?>
                      </td>
                      <td><?php echo $res['email']; ?></td>
                      <td><?php echo strip_tags($res['message']); ?> </td>            
                    </tr>
                    <?php
                  }
                  ?>

                </tbody>
                <tr>
                  <td align="left" colspan="6" style="padding:2px" height="35">
                    <input name="status_action" type="submit" class="button2" id="Delete" value="Delete"  onClick="return validcheckstatus('arr_ids[]', 'delete', 'Record');"/>
                  </td>
                </tr>
              </table>
              <?php echo form_close(); ?>
            <?php } else { ?>
              <center><strong><?php echo "No Record(s) Found!" ?></strong></center>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php $this->load->view('includes/footer'); ?>