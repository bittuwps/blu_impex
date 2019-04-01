<?php $this->load->view('includes/header'); ?>
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
            if (is_array($res) && !empty($res)) {
              echo form_open("sitepanel/orders", 'id="data_form"');
              ?>
              <table class="table datatable" width="100%" id="my_data">
                <thead>
                  <tr>
                    <th width="23" style="text-align: center;"><input type="checkbox" onclick="$('input:checkbox').not(this).prop('checked', this.checked);" /></th>
                    <th>Invoice Number</th>
                    <th>Payment Status</th>
                    <th>Order Status</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $atts = array('width' => '900', 'height' => '600', 'scrollbars' => 'yes', 'status' => 'yes', 'resizable' => 'yes', 'screenx' => '0', 'screeny' => '0');
                  $atts1 = array('width' => '650', 'height' => '400', 'scrollbars' => 'yes', 'status' => 'yes', 'resizable' => 'yes', 'screenx' => '200', 'screeny' => '150');
                  foreach ($res as $catKey => $pageVal) {
                    $payment_method = ($pageVal['payment_method'] != "" ) ? $pageVal['payment_method'] : "N/A";
                    ?>
                    <tr>
                      <td style="text-align: center;">
                        <input type="checkbox" name="arr_ids[]" value="<?php echo $pageVal['order_id']; ?>" />
                      </td>
                      <td class="left"><strong><?php echo $pageVal['invoice_number']; ?></strong><br />
                        <?php echo $pageVal['order_received_date']; ?><br />
                        <?php echo $pageVal['first_name']; ?> <?php echo $pageVal['last_name']; ?> <br />
                        <?php echo $pageVal['billing_phone']; ?><br />
                        <?php echo $pageVal['email']; ?> <br />    
                        <strong><?php echo anchor_popup('sitepanel/orders/print_invoice/' . $pageVal['order_id'], 'View Invoice', $atts); ?></strong>
                        <?php
                        if ($pageVal['customers_id'] == '0') {
                          echo"( Quick Checkout )";
                        }
                        ?>
                      </td>
                      <td align="left">
                        <?php echo $pageVal['payment_status']; ?>
                        <br />
                        <?php
                        if ($pageVal['payment_status'] == 'Unpaid') {
                          /* ?>
                            <strong><a onclick="return confirm('Are you sure you want to make this order paid');" href="<?php echo base_url(); ?>sitepanel/orders/make_paid/<?php echo $pageVal['order_id']; ?>" >Make Paid</a></strong>

                            <?php */
                        }
                        ?>
                        <br /><br />
                        <strong>Payment Method : </strong><?php echo $pageVal['payment_method']; ?>
                      </td>
                      <td class="left">
                        <?php echo $pageVal['order_status']; ?>
                        <br /><br />
                        <strong>Order Date : </strong><?php echo getDateFormat($pageVal['order_received_date'], 2); ?>
                        <br /><br />
                                <!--strong><?php //echo anchor_popup('sitepanel/orders/tracking_details/' . $pageVal['order_id'], 'Tracking Details', $atts1);   ?></strong-->
                      </td>
                    </tr>
                    <?php
                  }
                  ?> 
                </tbody>
              </table>
              <?php
              if ($this->router->fetch_method() == 'index') {
                ?>
                <table class="list" width="100%">
                  <tr>
                    <td align="left" style="padding:2px">
                      <?php
                      $sql = "SELECT * FROM tbl_courier_company WHERE status = '1'";
                      $result = $this->db->query($sql)->result_array();
                      ?>                    
                      <input name="unset_as" type="submit" class="button2" value="Unpaid" id="Deactivate"  onClick="return validcheckstatus('arr_ids[]', 'Set Unpaid', 'Record', 'u_status_arr[]');"/>
                      <input name="Delete" type="submit" class="button2" id="Delete" value="Delete"  onClick="return validcheckstatus('arr_ids[]', 'delete', 'Record');"/>
                      <select name="ord_status"  onchange="return onclickgroup()">
                        <option value="">Update Order Status</option>                      
                        <option value="Pending">Pending</option>
                        <option value="Dispatched">Dispatched</option>
                        <option value="Delivered">Delivered </option>
                        <option value="Closed">Closed</option>
                        <option value="Canceled">Canceled </option>
                      </select>

                      <!--select name="courier_status"  onchange="return onclickgroup()">
                        <option value="">---Select Courier Company---</option>
                      <?php
                      //foreach ($result as $key => $val) {
                      ?>
                          <option value="<?php //echo $val['company_id'];    ?>"><?php echo $val['company_name']; ?></option>
                      <?php
                      //}
                      ?>					 
                      </select -->
                    </td>
                  </tr>
                </table>
                <?php
              }
              echo form_close();
            } else {
              ?>
              <center><strong><?php echo "No Record(s) Found!" ?></strong></center>
              <?php 
            } 
            ?>
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