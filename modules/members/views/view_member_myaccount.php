<?php
$this->load->view("top_application");
$fieldType = $this->session->userdata('field_type');
?>
<div class="columns-container">
  <div class="container" id="columns">
    <!-- breadcrumb -->
    <div class="breadcrumb clearfix">
      <a class="home" href="<?php echo site_url(); ?>" title="Return to Home"><?php echo ($this->session->userdata('lang') == 'p') ? $this->lang->line('home') : 'Home'; ?></a>
      <span class="navigation-pipe">/</span>
      <span class="navigation_page"><?php echo ($this->session->userdata('lang') == 'p') ? $this->lang->line('Myaccount') : 'My Account' ?></span>
    </div>
    <!-- ./breadcrumb -->
    <!-- page heading-->
    <div class="container">
      <h1 class="page-heading">
        <span class="page-heading-title2"><?php echo ($this->session->userdata('lang') == 'p') ? $this->lang->line('Myaccount') : 'My Account'; ?></span>
      </h1>
    </div>
    <!-- ../page heading-->
    <div class="page-content ">
      <div class="row">
        <div class="column col-xs-12 col-sm-3" id="left_column">
          <!-- block category -->
          <?php $this->load->view('members/left'); ?>
          <!-- ./block category  -->
        </div>
        <div class="col-sm-9">

          <div class="page-content ">

            <div class="member-area"  style="min-height: 320px;">

              <?php
              echo error_message();
              echo validation_message();
              //$orders = array();
              if (is_array($orders) && !empty($orders)) {
                foreach ($orders as $key => $val) {
                  $orderDets = $this->order_model->get_order_detail($val['order_id']);
                  //trace($orderDets);
                  //trace($val);
                  ?>

                  <div class="my-orders">  

                    <div class="top-links">

                      <div class="row">

                        <div class="col-sm-6">					

                          <a class="pro-code-btn" href="javascript:void(0);"><?php echo ($this->session->userdata('lang') == 'p') ? $this->lang->line('invoiceno') : 'Invoice No'; ?>: <?php echo $val['invoice_number']; ?></a>	</div>	

                        <div class="col-sm-6">

                          <?php
                          //if ($val['order_status'] == 'Dispatched' || $val['order_status'] == 'Delivered' || $val['order_status'] == 'Pending') {
                            ?>

                            <a class="track btn btn-primary pull-right" href="<?php echo site_url(); ?>members/order_details/<?php echo $val['order_id']; ?>" style="line-height:25px !important;"><i class="fa fa-map-marker"></i> <?php echo ($this->session->userdata('lang') == 'p') ? $this->lang->line('track') : 'Track'; ?></a>	

                            <?php
                          //}
                          ?>

                        </div>

                      </div>				

                    </div>

                    <?php
                    if (is_array($orderDets) && !empty($orderDets)) {

                      foreach ($orderDets as $o => $pageVal) {

                        //trace($pageVal);

                        $furl = get_db_field_value("wl_products", "friendly_url", "WHERE products_id = '" . $pageVal['products_id'] . "'");

                        $img = get_db_field_value("wl_products_media", "media", "WHERE products_id = '" . $pageVal['products_id'] . "'");

                        $productName = get_db_field_value("wl_products", "product_name" . $fieldType, "WHERE products_id = '" . $pageVal['products_id'] . "'");
                        ?>

                        <div class = "list">

                          <div class = "product-details">

                            <div class = "row">

                              <div class = "col-sm-1">

                                <img src = "<?php echo get_image('product_images', $img, '80', '80', 'R'); ?>" alt = "<?php echo $productName; ?>">

                              </div>

                              <div class = "col-sm-4">

                                <div class = "product-name">

                                  <a href = "<?php echo site_url($furl); ?>"><?php echo $productName; ?></a>

                                </div>

                              </div>

                              <div class="col-sm-2">
                                <div class="product-price">
                                  <p class="cost"><?php echo display_price($pageVal['product_price']); ?></p>
                                  <p class="cost">Qty: <?php echo $pageVal['quantity']; ?></p>
                                </div>
                              </div>
                              <div class="col-sm-5">

                                <?php
                                if ($val['order_status'] == 'Delivered') {
                                  ?>

                                  <div class="product-name">

                                    <?php echo ($this->session->userdata('lang') == 'p') ? $this->lang->line('delivered_on') : 'Delivered on'; ?> <?php echo getDateFormat($val['order_delivery_date'], 3); ?></span>

                                    <a class="smaller"><?php echo ($this->session->userdata('lang') == 'p') ? $this->lang->line('item_delivered') : 'Your item has been delivered'; ?></a>

                                  </div>

                                  <?php
                                } elseif ($val['order_status'] == 'Canceled') {
                                  ?>
                                <div class="product-name" style="color: #BD4C14;">
                                    <?php echo ucwords(($this->session->userdata('lang') == 'p') ? $this->lang->line('order_canceled') : 'Order Canceled'); ?>

                                  </div>
                                  <?php
                                }
                                ?>

                              </div>                   

                            </div>

                          </div>

                        </div>

                        <?php
                      }
                    }
                    ?>

                    <div class="product-overview">

                      <div class="row">

                        <div class="col-sm-6"><p class="order-date"><?php echo ($this->session->userdata('lang') == 'p') ? $this->lang->line('ordered_on') : 'Ordered On'; ?> <span><?php echo getDateFormat($val['order_received_date'], 3); ?></span></p></div>

                        <div class="col-sm-6"><p class="order-total"><?php echo ($this->session->userdata('lang') == 'p') ? $this->lang->line('order_total') : 'Order Total'; ?> <span><?php echo display_price($val['total_amount']); ?></span></p></div>

                      </div>

                    </div>

                  </div>

                  <?php
                }
              } else {
                ?>

                <div class="row">
                  <div style="min-height: 300px;">
                    <div class="alert alert-danger" role="alert">
                      <strong><?php echo ucwords($this->session->userdata('first_name') . ' ' . $this->session->userdata('last_name')); ?>,</strong> <?php echo ($this->session->userdata('lang') == 'p') ? $this->lang->line('no_orders') : 'You have no orders yet.'; ?>
                    </div>
                    <div style="text-align: center">
                      <a href="<?php echo site_url('products'); ?>"><img src="<?php echo theme_url(); ?>images/shop-now-button_large.png" /></a>
                    </div>
                  </div>
                </div>
                <?php
              }
              ?>

            </div>

          </div>

        </div>

      </div>



    </div>



  </div>

</div>



<?php $this->load->view("bottom_application"); ?>

<script>

  $("#edit_account_form").submit(function (e) {

    e.preventDefault();

    var form_data = $(this).serialize();

    $.ajax({
      type: "Post",
      url: '<?php echo site_url() ?>members/edit_account',
      data: form_data,
      success: function (msg) {

        if (msg == 2) {

          $("#success_div").html("Updated Successfully").fadeIn('slow').delay(4000).fadeOut('slow');

        } else {

          $("#error_div").html(msg).fadeIn('slow').delay(4000).fadeOut('slow');

        }

        s

      }

    });

  });





  $("#address_account_form").submit(function (e) {

    e.preventDefault();

    var form_data = $(this).serialize();

    $.ajax({
      type: "Post",
      url: '<?php echo site_url() ?>members/manage_addresses_edit',
      data: form_data,
      success: function (msg) {

        if (msg == 2) {

          $("#success_div").html("Updated Successfully").fadeIn('slow').delay(4000).fadeOut('slow');

        } else {

          $("#error_div").html(msg).fadeIn('slow').delay(4000).fadeOut('slow');

        }

      }

    });

  });

</script>