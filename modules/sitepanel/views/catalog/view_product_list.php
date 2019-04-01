<?php $this->load->view('includes/header'); ?>

<!-- PAGE TITLE -->

<div class="page-title">                    

  <h2><span ></span><?php echo $heading_title; ?></h2>

  <div class="buttons">

    <a href="<?php echo base_url(); ?>sitepanel/products/add/<?php echo $this->uri->segment(4, 0); ?>" class="btn btn-primary pull-right">Add product</a>



  </div>

</div>

<!-- END PAGE TITLE -->                

<div class="row">

  <div class="col-md-12">

    <div class="panel panel-default">

      <div class="panel-body">

        <div class="table-responsive">

          <?php echo form_open_multipart("", 'id="form"'); ?>

          <table  width="75%" align="center" bgcolor="#999999" border="0" cellspacing="1" cellpadding="3" >

            <tr bgcolor="#FFFFFF">

              <td colspan="2" align="left"><strong style="font-size:14px">Bulk Upload</strong></td>

            </tr>

            <tr bgcolor="#FFFFFF">

              <td width="20%" align="" ><strong>Upload Excel File</strong></td>

              <td width="80%">

                <input type="file" name="excel_file" />&nbsp;

                <input type="hidden" name="action" value="submit_excel" />

              </td>

            </tr>

            <tr><td colspan="2"><input type="submit" value="Submit" />&nbsp;&nbsp;&nbsp; <a href="<?php echo base_url() ?>assets/sample/sample.xls">Download Sample File</a></td></tr>

          </table>

          <?php echo form_close(); ?>

        </div>

      </div>

    </div>

  </div>

</div>



<div class="row">

  <?php echo form_open("sitepanel/products", 'id="myForm" method="get"'); ?>

  <div class="col-md-8">

    <div class="panel panel-default">

      <div class="panel-body">

        <div class="table-responsive">



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

              <td width="30%" colspan="2"><input type="submit" value="Search" /></td>

            </tr>

          </table>



        </div>

      </div>

    </div>

  </div>

  <div class="col-md-4">

    <div class="panel panel-default">

      <div class="panel-body">

        <div class="table-responsive">

          Records Per Page : <?php echo display_record_per_page(); ?> </div>

      </div>

    </div>

  </div>

  <?php echo form_close(); ?>

</div>



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

              echo form_open("sitepanel/products/", 'id="data_form"');

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

                    <th  width="23" style="text-align: center;">

                      <input type="checkbox" onclick="$('input:checkbox').not(this).prop('checked', this.checked);" />

                    </th>

                    <th>Product Name</th>

                    <th>Product Code</th>

                    <th>Price</th>

                    <th>Product Picture</th>

                    <th>Details</th>

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

                        <input type="checkbox" name="arr_ids[]" class="chk" value="<?php echo $pageVal['products_id']; ?>" />

                      </td>

                      <td><?php echo $pageVal['product_name']; ?>                    

                        <?php

                        $product_set_in = array();



                        if ($pageVal['popular_product'] != "" && $pageVal['popular_product'] != '0') {

                          $product_set_in[] = "<b>Hot Deal  : </b> Yes";

                        }

                        if ($pageVal['newarrival_product'] != "" && $pageVal['newarrival_product'] != '0') {

                          $product_set_in[] = "<b>New Arrival : </b> Yes";

                        }



                        if ($pageVal['coming_product'] != "" && $pageVal['coming_product'] != '0') {

                          $product_set_in[] = "<b>Popular Product  : </b> Yes";

                        }



                        //if ($pageVal['bestseller_product'] != "" && $pageVal['bestseller_product'] != '0') {

                        //$product_set_in[] = "<b>Best Seller  : </b> Yes";

                        //}



                        if ($pageVal['special_product'] != "" && $pageVal['special_product'] != '0') {

                          $product_set_in[] = "<b>Best Seller  : </b> Yes";

                        }



                        if (!empty($product_set_in)) {

                          echo "<br /><br />";

                          echo implode("<br>", $product_set_in) . "<br />";

                        }





                        //$overall_rating = product_overall_rating($pageVal['products_id'], 'product');

                        ?>

                        <p><?php //echo rating_html($overall_rating, 5);         ?></p>



                        <p><?php echo anchor("sitepanel/product_reviews?ref_id=$pageVal[products_id]", 'Reviews', 'target="_blank"'); ?></p>



                        <div id="dialog_<?php echo $pageVal['products_id']; ?>" title="Description" style="display:none;"><?php echo $pageVal['products_description']; ?></div>

                      </td>

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

                      <td>

                        <a href="#" data-toggle="modal" data-target=".pro_list_<?php echo $pageVal['products_id']; ?>">

                          View Description

                        </a>

                        <div class="modal fade pro_list_<?php echo $pageVal['products_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="description" aria-hidden="true">

                          <div class="modal-dialog modal-lg">

                            <div class="modal-content">



                              <div class="modal-header">

                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>

                                <h4 class="modal-title" id="description">Description</h4>

                              </div>

                              <div class="modal-body">

                                <?php echo html_entity_decode($pageVal['products_description']); ?>

                              </div>

                            </div>

                          </div>

                        </div>           

                      </td>

                      <td class="left" valign="top"><?php echo ($pageVal['status'] == 1) ? "Active" : "In-active"; ?></td>

                      <td align="center" valign="top">

                        <p >                    

                          <?php echo anchor("sitepanel/products/edit/$pageVal[products_id]/" . query_string(), "<span>Edit</span>", 'class="btn btn-info" '); ?> 

                        </p>

                        <!--p>

                        <?php echo anchor_popup('sitepanel/products/related/' . $pageVal['products_id'], 'Add Related Products', $atts); ?>

                        </p>

                      <p>

                        <?php echo anchor_popup('sitepanel/products/view_related/' . $pageVal['products_id'], 'View Related Products', $atts); ?>

                      </p>-->

                       <!-- <p>

                          <?php echo anchor_popup('sitepanel/products/view_stocks_store/' . $pageVal['products_id'], "<span>Manage Stocks</span>", $atts); ?>

                        </p>-->

						 <!--p>  <?php echo anchor_popup('sitepanel/products/view_stocks/' . $pageVal['products_id'], "<span>Manage Stocks</span>", $atts); ?> </p-->

                      </td>

                    </tr>

                  <?php } ?>

                </tbody>

              </table>

              <table class="list" width="100%"> 

                <tr><td align="right"><?php echo $page_links; ?></td></tr>

                <tr>

                  <td align="left" style="padding:5px">

                    <input name="status_action" type="submit"  value="Activate" class="button2" id="Activate" onClick="return validcheckstatus('arr_ids[]', 'Activate', 'Record', 'u_status_arr[]');"/>



                    <input name="status_action" type="submit" class="button2" value="Deactivate" id="Deactivate"  onClick="return validcheckstatus('arr_ids[]', 'Deactivate', 'Record', 'u_status_arr[]');"/>

                    <input name="status_action" type="submit" class="button2" id="Delete" value="Delete"  onClick="return validcheckstatus('arr_ids[]', 'delete', 'Record');"/>

                    <?php echo form_dropdown("set_as", $this->config->item('product_set_as_config'), $this->input->post('set_as'), 'style="width:120px;" onchange="return onclickgroup()"'); ?>



                    <?php echo form_dropdown("unset_as", $this->config->item('product_unset_as_config'), $this->input->post('unset_as'), 'style="width:120px;" onchange="return onclickgroup()"'); ?>



                  </td>

                </tr>

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



  $('#pagesize').change(function () {

    $('#myForm').submit();

  });



  $('#my_data').dataTable({

    "bInfo": false, //Dont display info e.g. "Showing 1 to 4 of 4 entries"

    "paging": false, //Dont want paging                

    "bPaginate": false, //Dont want paging 

    "searching": false,

    "sort": false,

  })

</script>