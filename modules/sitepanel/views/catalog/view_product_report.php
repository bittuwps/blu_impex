<?php $this->load->view('includes/header'); ?>
<!-- PAGE TITLE -->
<div class="page-title">                    
  <h2><span ></span><?php echo $heading_title; ?></h2>
  <div class="buttons">
  </div>
</div>

<div class="row">
  <div class="col-md-12">
    <div class="panel panel-default">
      <div class="panel-body">
        <div class="table-responsive">
          <?php echo form_open_multipart("", 'id="form" method="get"'); ?>
          <table  width="100%" align="center" bgcolor="#999999" border="0" cellspacing="1" cellpadding="3" >
            <tr bgcolor="#FFFFFF">
              <td colspan="3" width="100%" colspan="2" align="left"><strong style="font-size:14px">Search</strong></td>
            </tr>
            <tr bgcolor="#FFFFFF">
              <td width="30%" align="" ><strong>Keyword (Name, Description)</strong></td>
              <td width="40%">
                <input type="text" name="keyword" />&nbsp;
                <input type="hidden" name="action" value="Seach" />
              </td>
              <td width="30%" colspan="2"><input type="submit" name="submit" value="Search" /></td>
            </tr>
          </table>
          <?php echo form_close(); ?>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- END PAGE TITLE -->                
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
              echo form_open("sitepanel/products/report", 'id="data_form"');
              ?>
              <table class="table" id="my_data">
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
                    <th  width="23" style="text-align: center;">SL.</th>
                    <th>Product Name</th>
                    <th>Product Code</th>
                    <th>Base Price</th>
                    <th>Product Picture</th>
                    <th>Category</th>
                    <th>Stock Available</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $sl = 1;
                  foreach ($res as $catKey => $pageVal) {
                    $stock = $this->db->query("SELECT a.*, s.store_name FROM wl_product_attributes as a LEFT JOIN wl_store as s ON a.store_id = s.setId WHERE a.product_id = '" . $pageVal['products_id'] . "'")->result_array();
                    //trace($stock);
                    ?>
                    <tr>
                      <td   width="23" style="text-align: center;">
                        <?php echo $sl; ?>.
                      </td>
                      <td><?php echo $pageVal['product_name']; ?></td>
                      <td><?php echo $pageVal['product_code']; ?></td>
                      <td>
                        <?php
                        if ($pageVal['product_discounted_price'] == '0.00') {
                          ?>
                          <span style="color: #b00;"><?php echo display_price($pageVal['product_price']); ?></span>
                          <?php
                        } else {
                          ?>
                          <span style="text-decoration: line-through;"><?php echo display_price($pageVal['product_price']); ?></span><br> 
                          <span style="color: #b00;"><?php echo display_price($pageVal['product_discounted_price']); ?></span>
                          <?php
                        }
                        ?>
                      </td>
                      <td align="center" valign="top">
                        <img src="<?php echo get_image('product_images', $pageVal['media'], 50, 50, 'AR'); ?>" />
                      </td>
                      <td class="left" valign="top">
                        <?php echo category_breadcrumbs_admin($pageVal['category_id']); ?>
                      </td>
                      <td align="left" valign="top">
                        <?php
                        if (is_array($stock) && !empty($stock)) {
                          foreach ($stock as $stockVal) {
                            $pr = ($stockVal['product_discounted_price']) ? $stockVal['product_discounted_price'] : $stockVal['product_price'];
                            $qty = $stockVal['quantity'];
                            ?>
                            <p>
                              <b>Store Name :</b> <?php echo $stockVal['store_name']; ?> <br />
                              <b>Available Stock :</b> <?php echo $qty ; ?>
                              <b>Stock Value :</b> <?php echo $qty * $pr; ?>
                            </p>
                            <?php
                          }
                        }
                        ?>
                      </td>
                    </tr>
                    <?php
                    $sl++;
                  }
                  ?>
                </tbody>
              </table>
              <table class="list" width="100%"> 
                <tr><td align="right"><?php echo $page_links; ?></td></tr>
              </table>
              <?php
              echo form_close();
            } else {
              ?>
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
<script type="text/javascript">
  function onclickgroup() {
    if (validcheckstatus('arr_ids[]', 'set', 'record', 'u_status_arr[]')) {
      $('#data_form').submit();
    }
  }



</script>
<?php $this->load->view('includes/footer'); ?>
<script type="text/javascript">
  $('#my_data').dataTable({
    "bInfo": false, //Dont display info e.g. "Showing 1 to 4 of 4 entries"
    "paging": false, //Dont want paging                
    "bPaginate": false, //Dont want paging 
    "searching": false,
    "sort": false,
  })
</script>