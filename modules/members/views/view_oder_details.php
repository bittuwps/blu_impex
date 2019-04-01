<?php
$this->load->view("top_application");
//trace($order_res);
$countRows = count_record("wl_orders_products", "order_id = '" . $order_res['order_id'] . "' ");
$orderDets = $this->order_model->get_order_detail($order_res['order_id']);
?>
<div class="columns-container">
  <div class="container" id="columns">
    <!-- breadcrumb -->
    <div class="breadcrumb clearfix">
      <a class="home" href="<?php echo site_url(); ?>" title="Return to Home"><?php echo ($this->session->userdata('lang') == 'p') ? $this->lang->line('home') : 'Home'; ?></a>
      <span class="navigation-pipe">/</span>
      <span class="navigation_page"><?php echo ($this->session->userdata('lang') == 'p') ? $this->lang->line('trackOrder') : 'Track Order'; ?></span>
    </div>
    <!-- ./breadcrumb -->
    <!-- page heading-->
    <div class="container">
      <h1 class="page-heading">
        <span class="page-heading-title2"><?php echo ($this->session->userdata('lang') == 'p') ? $this->lang->line('trackOrder') : 'Track Order'; ?></span>
      </h1>
    </div>

    <!-- ../page heading-->
    <?php echo error_message(); ?>
    <div class="page-content ">
      <div class="member-area" >		
        <div class="track-orders">
          <div class="shipping-info">  
            <div class="row">    					
              <div class="col-lg-4 col-xs-12 col-md-4 col-sm-4 ">
                <div class="order-details">
                  <p class="title">Order Details</p>
                  <div class="order-left-field">Order ID</div>
                  <div class="order-right-field"><?php echo $order_res['invoice_number']; ?> <span>(<?php echo $countRows; ?> item(s))</span></div>
                  <div class="order-left-field">Order Date</div>
                  <div class="order-right-field"><?php echo getDateFormat($order_res['order_received_date'], 6); ?></span></div>
                  <div class="order-left-field">Amount Paid</div>
                  <div class="order-right-field"><?php echo display_price($order_res['total_amount']); ?></span></div></div>
              </div>
              <div class="col-lg-5 col-xs-12 col-md-5 col-sm-5 bdr">
                <div class="address">
                  <p class="title">Billing Details</p>
                  <p class="name"><?php echo $order_res['billing_name']; ?></p>
                  <p class="add"><?php echo $order_res['billing_address']; ?>, <?php echo $order_res['billing_state']; ?>, <?php echo $order_res['billing_city']; ?> - <?php echo $order_res['billing_zipcode']; ?></p>
                  <p class="phone">Phone <span> <?php echo $order_res['billing_phone']; ?></span></p>
                </div>
              </div>
              <div class="col-lg-3 col-xs-12 col-md-3 col-sm-3 bdr">
                <div class="manage-order">
                  <p class="title"></p>
                  <ul>
                    <li>
                      <!--label>
                        <i class="fa fa-file-text"></i> 
                        <input type="checkbox" name="colorCheckbox" value="request-invoice" style="display:none;"> Request Invoice
                      </label-->
                      <div class="ship-different request-invoice">
                        Invoice will be sent to: <?php echo $order_res['email']; ?>
                        <a href="#" class="ri-btn">Request Invoice</a>
                      </div>
                    </li>

                    <li><a href="<?php echo site_url('contact-us'); ?>"><i class="fa fa-question-circle"></i> Need Help?</a></li>
                    <?php
                    if ($order_res['order_status'] != 'Canceled' && $order_res['order_status'] != 'Delivered') {
                      ?>
                    <li><a href="javascript:void(0);" onclick="return confirmReset();"><i class="fa fa-close"></i> Cancel Order</a></li>
                      <?php
                    } elseif ($order_res['order_status'] == 'Canceled') {
                      ?>
                      <li style="color:#BD4C14;"><i class="fa fa-close"  style="color:#BD4C14;"></i> Order Canceled</li>
                      <?php
                    }
                    ?>
                  </ul>					
                </div>
              </div>
            </div>
          </div> 
          <div class="product-directory">
            <ul class="row list-wishlist">
              <?php
              if (is_array($orderDets) && !empty($orderDets)) {
                foreach ($orderDets as $o => $pageVal) {
                  //trace($pageVal);
                  $furl = get_db_field_value("wl_products", "friendly_url", "WHERE products_id = '" . $pageVal['products_id'] . "'");
                  $img = get_db_field_value("wl_products_media", "media", "WHERE products_id = '" . $pageVal['products_id'] . "'");
                  ?>
                  <li class="col-sm-6">
                    <div class="product-img">
                      <div class="col-sm-3">
                        <a href="#"><img src="<?php echo get_image('product_images', $img, '80', '80', 'R'); ?>" alt="Product"></a>
                      </div>
                      <div class="col-sm-9">
                        <div class="product-name">
                          <a href="<?php echo site_url($furl); ?>"><?php echo $pageVal['product_name']; ?></a>
                          <div class="single-product">
                            <p class="cost"><?php echo display_price($pageVal['product_price']); ?> (<?php echo $pageVal['quantity']; ?>)</p>

                          </div>
                        </div>                   
                      </div>
                    </div>
                  </li>
                  <?php
                }
              }
              ?>
            </ul>
          </div>
          <div class="row">&nbsp;</div>
          <div class="product-directory">
            <div class="product-status">
              <div class="row">

                <div class="col-lg-4 col-xs-12 col-md-4 col-sm-4 ">

                  <div class="address">
                    <p style="color: #878787;text-transform: uppercase;margin-bottom: 15px;">Shipping Details</p>
                    <p class="name"><?php echo $order_res['shipping_name']; ?></p>
                    <p class="add"><?php echo $order_res['shipping_address']; ?>, <?php echo $order_res['shipping_state']; ?>, <?php echo $order_res['shipping_city']; ?> - <?php echo $order_res['shipping_zipcode']; ?></p>
                    <p class="phone">Phone <span> <?php echo $order_res['shipping_phone']; ?></span></p>
                  </div>

                </div>
                <div class="col-lg-5 col-xs-12 col-md-5 col-sm-5 ">
                  <div class="timeLineText">

                    <?php
                    if ($order_res['order_status'] == 'Pending') {
                      ?>
                      <div class="subOrdTimeLine">
                        <span class="statusCircle greenStatusCircle greenStatusCircle-text1"></span>
                        <span class="statusLine  greyStatusLine" style="display:inline-block"></span>
                        <span class="statusCircle greyStatusCircle greenStatusCircle-text2"></span>
                        <span class="statusLine  greyStatusLine" style="display:inline-block"></span>
                        <span class="statusCircle greyStatusCircle greenStatusCircle-text3"></span>
                      </div>
                      <?php
                    }
                    if ($order_res['order_status'] == 'Dispatched') {
                      ?>
                      <div class="subOrdTimeLine">
                        <span class="statusCircle greenStatusCircle greenStatusCircle-text1"></span>
                        <span class="statusLine  greenStatusLine" style="display:inline-block"></span>
                        <span class="statusCircle greenStatusCircle greenStatusCircle-text2"></span>
                        <span class="statusLine  greyStatusLine" style="display:inline-block"></span>
                        <span class="statusCircle greyStatusCircle greenStatusCircle-text3"></span>
                      </div>
                      <?php
                    }
                    if ($order_res['order_status'] == 'Closed' || $order_res['order_status'] == 'Delivered') {
                      ?>
                      <div class="subOrdTimeLine">
                        <span class="statusCircle greenStatusCircle greenStatusCircle-text1"></span>
                        <span class="statusLine  greenStatusLine" style="display:inline-block"></span>
                        <span class="statusCircle greenStatusCircle greenStatusCircle-text2"></span>
                        <span class="statusLine  greenStatusLine" style="display:inline-block"></span>
                        <span class="statusCircle greenStatusCircle greenStatusCircle-text3"></span>
                      </div>
                      <?php
                    }
                    ?>
                  </div>
                </div>

              </div>
              <?php
              if ($order_res['order_status'] == "Delivered") {
                ?>
                <div class="delivered-date">
                  <strong>Delivered Date:</strong> <span><?php echo getDateFormat($order_res['order_delivery_date'], 6); ?></span><br />
                  <strong>Tracking Code:</strong> <?php echo $order_res['tracking_code']; ?> (<?php echo $order_res['courier_partner']; ?>)<br />
                  <strong>Message from Seller:</strong> <?php echo $order_res['tracking_text']; ?> 
                </div>
                <?php
              } else if ($order_res['order_status'] == "Dispatched") {
                ?>
                <div class="delivered-date">
                  <strong>Expected Delivery Date:</strong> <?php echo getDateFormat($order_res['expected_delivery_date'], 3); ?><br />
                  <strong>Tracking Code:</strong> <?php echo $order_res['tracking_code']; ?> (<?php echo $order_res['courier_partner']; ?>)<br />
                  <strong>Message from Seller:</strong> <?php echo $order_res['tracking_text']; ?> 
                </div>
                <?php
              }
              ?>
              <div class="final-price">
                <div class="right"<span>Total</span> <?php echo display_price($order_res['total_amount']); ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php $this->load->view("bottom_application"); ?>
<script type="text/javascript">
  function confirmReset() {
    var r = confirm('Are you sure?');
    if (r == true) {
      window.location = '<?php echo site_url('members/cancel_order/' . $order_res['order_id']); ?>';
    } else {
      return false;
    }
    return false;
  }
</script>