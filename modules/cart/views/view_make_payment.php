<?php
$this->load->view("top_application");
?>
<div class="columns-container">
  <div class="container" id="columns">
    <!-- breadcrumb -->
    <div class="breadcrumb clearfix">
      <a class="home" href="<?php echo site_url(); ?>" title="Return to Home"><?php echo ($this->session->userdata('lang') == 'p') ? $this->lang->line('home') : 'Home'; ?></a>
      <span class="navigation-pipe">&nbsp;</span>
      <span class="navigation_page"><?php echo ($this->session->userdata('lang') == 'p') ? $this->lang->line('confirm_address') : 'Confirm Address'; ?></span>
    </div>
    <!-- ./breadcrumb -->
    <!-- page heading-->
    <h2 class="page-heading">
      <span class="page-heading-title2"><?php echo ($this->session->userdata('lang') == 'p') ? $this->lang->line('confirm_address') : 'Confirm Address'; ?></span>
    </h2>
    <div class="page-content page-order">
      <ul class="step">
        <li ><span>01. <?php echo ($this->session->userdata('lang') == 'p') ? $this->lang->line('summary') : 'Summary'; ?></span></li>
        <li><span>02. <?php echo ($this->session->userdata('lang') == 'p') ? $this->lang->line('Signin') : 'Sign in'; ?></span></li>
        <li ><span>03. <?php echo ($this->session->userdata('lang') == 'p') ? $this->lang->line('Shipping_address') : 'Shipping Address'; ?></span></li>
        <li class="current-step"><span>04. <?php echo ($this->session->userdata('lang') == 'p') ? $this->lang->line('Review_order') : 'Review Order'; ?></span></li>
        <li><span>05. <?php echo ($this->session->userdata('lang') == 'p') ? $this->lang->line('payment') : 'Payment'; ?></span></li>
      </ul>
    </div>
    <!-- ../page heading-->
    <div class="page-content">
      <div class="row">
        <div class="col-sm-9">
          <div class="box-inputfeilds">
            <div class="row">  
              <div class="col-sm-6">
                <div class="top-cs">
                  <p><?php echo ($this->session->userdata('lang') == 'p') ? $this->lang->line('deliver_order_here') : 'We will deliver your order here'; ?> </p>
                </div>
                <h3><?php echo ($this->session->userdata('lang') == 'p') ? $this->lang->line('Shipping_address') : 'Shipping Address'; ?></h3>
                <div class="cb20"></div>
                <ul class="value-box">
                  <li class="control">
                    <label for="name"><strong><?php echo ($this->session->userdata('lang') == 'p') ? $this->lang->line('name') : 'Name'; ?></strong></label>
                    <?php
                    echo $posted_data['name'];
                    ?>
                  </li>
                  <li class="control">
                    <label for="name"><strong><?php echo ($this->session->userdata('lang') == 'p') ? $this->lang->line('name') : 'Mobile Number'; ?></strong></label>
                    <?php echo $posted_data['mobile']; ?>
                  </li>
                  <li class="control">
                    <label for="name"><strong><?php echo ($this->session->userdata('lang') == 'p') ? $this->lang->line('idcard') : 'ID Card No.'; ?></strong></label>
                    <?php echo $this->session->userdata('idcard_no'); ?>
                  </li>
                  <li class="control">
                    <label for="name"><strong><?php echo ($this->session->userdata('lang') == 'p') ? $this->lang->line('address') : 'Address'; ?></strong></label>
                    <?php echo $posted_data['address']; ?>
                  </li>	
                  <?php
                  if ($posted_data['landmark'] != '') {
                    ?>
                    <li class="control">
                      <label for="name"><strong><?php echo ($this->session->userdata('lang') == 'p') ? $this->lang->line('landmark') : 'Landmark'; ?></strong></label>
                      <?php echo $posted_data['landmark']; ?>
                    </li>
                    <?php
                  }
                  ?>
                  <li class="control">
                    <label for="name"><strong><?php echo ($this->session->userdata('lang') == 'p') ? $this->lang->line('city') : 'City'; ?></strong></label>
                    <?php echo $posted_data['city']; ?>
                  </li>
                  <!--li class="control" hidden="hidden">
                    <label for="name"><strong><?php echo ($this->session->userdata('lang') == 'p') ? $this->lang->line('pincode') : 'Pincode'; ?></strong></label>
                    <?php echo $posted_data['zipcode']; ?>
                  </li-->
                  <li class="control">
                    <label for="name"><strong><?php echo ($this->session->userdata('lang') == 'p') ? $this->lang->line('state') : 'State'; ?></strong></label>
                    <?php echo $posted_data['state']; ?>
                  </li>
                  <li class="control">
                    <label for="name"><strong><?php echo ($this->session->userdata('lang') == 'p') ? $this->lang->line('country') : 'Country'; ?></strong></label>
                    <?php
                    echo $scountry = $posted_data['country'];
                    ?>
                  </li>
                </ul>
              </div>         
              <div class="col-sm-6">
                <div class="top-cs">
                  <a href="<?php echo site_url('products'); ?>" class="button pull-right"><?php echo ($this->session->userdata('lang') == 'p') ? $this->lang->line('continue_shopping') : 'Continue Shopping'; ?></a>
                </div>
                <h3><?php echo ($this->session->userdata('lang') == 'p') ? $this->lang->line('billing_shopping') : 'Billing Address'; ?></h3>
                <div class="cb20"></div>
                <ul class="value-box">
                  <li class="control">
                    <label for="name"><strong><?php echo ($this->session->userdata('lang') == 'p') ? $this->lang->line('name') : 'Name'; ?></strong> </label>
                    <?php
                    echo $posted_data['bil_name'];
                    ?>
                  </li>
                  <li class="control">
                    <label for="name"><strong><?php echo ($this->session->userdata('lang') == 'p') ? $this->lang->line('mobile_number') : 'Mobile Number'; ?></strong></label>
                    <?php echo $posted_data['bil_mobile']; ?>
                  </li>
                  <li class="control">
                    <label for="name"><strong><?php echo ($this->session->userdata('lang') == 'p') ? $this->lang->line('address') : 'Address'; ?></strong></label>
                    <?php echo $posted_data['bil_address']; ?>
                  </li>	
                  <?php
                  if ($posted_data['bil_landmark'] != '') {
                    ?>
                    <li class="control">
                      <label for="name"><strong><?php echo ($this->session->userdata('lang') == 'p') ? $this->lang->line('landmark') : 'Landmark'; ?></strong></label>
                      <?php echo $posted_data['bil_landmark']; ?>
                    </li>
                    <?php
                  }
                  ?>
                  <li class="control">
                    <label for="name"><strong><?php echo ($this->session->userdata('lang') == 'p') ? $this->lang->line('city') : 'City'; ?></strong></label>
                    <?php echo $posted_data['bil_city']; ?>
                  </li>
                  <!--li class="control" hidden="hidden">
                    <label for="name"><strong><?php echo ($this->session->userdata('lang') == 'p') ? $this->lang->line('pincode') : 'Pincode'; ?></strong></label>
                    <?php echo $posted_data['bil_zipcode']; ?>
                  </li-->
                  <li class="control">
                    <label for="name"><strong><?php echo ($this->session->userdata('lang') == 'p') ? $this->lang->line('state') : 'State'; ?></strong></label>
                    <?php echo $posted_data['bil_state']; ?>
                  </li>
                  <li class="control">
                    <label for="name"><strong><?php echo ($this->session->userdata('lang') == 'p') ? $this->lang->line('country') : 'Country'; ?></strong></label>
                    <?php
                    echo $bcountry = $posted_data['bil_country'];
                    ?>
                  </li>
                </ul>
                <button class="button pull-right" onclick="window.location.href = '<?php echo site_url('cart/delivery_info'); ?>';">Edit Address</button>
              </div>
            </div>
          </div>
        </div>
        <div class="column col-xs-12 col-sm-3" id="left_column">
          <!-- block best sellers -->
          <div class="block left-module">
            <p class="title_block"><?php echo ($this->session->userdata('lang') == 'p') ? $this->lang->line('cart') : 'My Cart'; ?> </p>
            <div class="block_content">
              <ul class="products-block best-sell">
                <?php
                $cart = $this->cart->contents();
                $totalAmount = $origAmount = $discountAmt = 0;
                $i = 1;
                foreach ($cart as $items) {
                  $totalAmount +=$items['price'] * $items['qty'];
                  ?>
                  <li>
                    <div class="products-block-left">
                      <a href="#">
                        <?php
                        if ($items['product_type'] == 1) {
                          ?>
                          <img src="<?php echo get_image('product_images/catalog', $items['img'], '80', '80', 'R'); ?>" alt="">
                          <?php
                        } else {
                          ?>
                          <img src="<?php echo get_image('product_images', $items['img'], '80', '80', 'R'); ?>" alt="">
                          <?php
                        }
                        ?>
                      </a>
                    </div>
                    <div class="products-block-right">
                      <p class="product-name">
                        <a href="#"><?php echo $items['origname']; ?></a>
                      </p>
                      <p class="product-price"><?php echo display_price($items['price']); ?></span></p>
                      <p class="product-name"><?php echo ($this->session->userdata('lang') == 'p') ? $this->lang->line('qty') : 'Qty'; ?>: <?php echo $items['qty']; ?></span></p>
                    </div>
                  </li>
                  <?php
                  $i++;
                }
                ?>
              </ul>
            </div>
          </div>
          <div class="checkout-page">
            <div class="box-border">
              <ul class="shipping_method">
                <li>
                  <p class="subcaption "><?php echo ($this->session->userdata('lang') == 'p') ? $this->lang->line('payable_amount') : 'Payable Amount'; ?>: <span class="bold"><?php echo display_price($totalAmount); ?></span></p>
                </li>
              </ul>
            </div>
          </div>
          <div class="block left-module">
            <p class="title_block"><?php echo ($this->session->userdata('lang') == 'p') ? $this->lang->line('payment_option') : 'Payment Options'; ?> </p>
            <div class="block-content">
              <form name="" id="paymentForm" method="post" action="">  
                <?php /*?><?php
                if ($totalAmount >= 1000) {
                  if($totalAmount >= 1000 && $totalAmount <= 2000){
                    $msg = ($this->session->userdata('lang') == 'p') ? ' (Caro cliente, o valor da sua compra está entre 1000 MHz MZN para 1999, você pode coletar seu pacote de PICKUP POINT perto de você, Obrigado)' : '(Dear Customer, Your purchase value is between 1000 MZN to 1999 MZN, you can collect your parcel from PICKUP POINT nearby you, Thanks)';
                  }  else {
                    $msg = ($this->session->userdata('lang') == 'p') ? ' (Caro Cliente, o valor da sua compra é superior a 2000 MZN. Procederemos a entrega gratuita em seu endereço. Se você não quiser entrega no seu endereço, você pode coletar seu pacote do ponto de retirada perto de você. Obrigado )' : '(Dear Customer, Your purchase value is more than 2000 MZN. We will proceed free delivery at you given address. if you don’t want delivery at your address, please select PICKUP Point you can collect your parcel from pickup point nearby you, . Thanks)';
                  }
                  
                  //if ($totalAmount >= 1000 && $totalAmount <= 2000) {
                  $pickup = $this->db->query("SELECT * FROM wl_pick_point WHERE status='1'")->result_array();
                  ?>
                  <div class="m10x0">
                    <div class="alert alert-info"><?php echo $msg; ?></div>
                    
                    <div class="alert alert-info pickupAddressDiv" hidden="hidden">
                      <strong>Pickup Address!</strong> <span class="pickupAddress"></span>
                    </div>                    
                    
                    <select name="pickup_point" id="pickup_point" <?php echo ($totalAmount < 2000) ? 'required' : ''; ?> class="form-control" onchange="$('.pickupAddress').html($('option:selected',this).attr('data-address'));$('.pickupAddressDiv').show();">
                      <option value="">---<?php echo ($this->session->userdata('lang') == 'p') ? $this->lang->line('pickup_point') : 'Select Pickup Point'; ?>---</option>
                      <?php
                      foreach ($pickup as $p => $pick) {
                        ?><option data-address="<?php echo $pick['pickup_address'] . ' - ' . $pick['pickup_city']; ?>" value="<?php echo $pick['pickup_name']; ?>"><?php echo $pick['pickup_name']; ?></option><?php
                      }
                      ?>
                    </select>
                  </div>
                  <?php
                  //}
                }
                ?><?php */?>
                <div><input id="radio2" name="pay" value="COD" type="radio" checked>
                  <label for="radio2"><?php echo ($this->session->userdata('lang') == 'p') ? $this->lang->line('cod') : 'Cash on Delivery'; ?></label>
                </div>
                <div class="m10x0">
                  <input name="terms" id="checkTerms" value="1" class="checkbox_left" required="" type="checkbox"> <span>I Agree. <a href="<?php echo site_url('terms-conditions'); ?>" class="tnch" target="_blank"><?php echo ($this->session->userdata('lang') == 'p') ? $this->lang->line('term&conditions') : 'Terms And Conditions.'; ?></a> </span>
                </div>
                <div class="confirm-order">
                  <?php
                 // if ($totalAmount >= 1000) {
                    ?>              
                    <button class="button payButton" type="submit"><?php echo ($this->session->userdata('lang') == 'p') ? $this->lang->line('proceed') : 'proceed'; ?></button>
                    <?php
                 // } else {
                    ?>
                  <!--  <button class="button" type="button" onclick="alert('<?php echo ($this->session->userdata('lang') == 'p') ? $this->lang->line('min_order') : 'Please add more products to proceed, min. HK100 is required to proceed.'; ?>');"><?php echo ($this->session->userdata('lang') == 'p') ? $this->lang->line('proceed') : 'Proceed'; ?></button>-->
                    <?php
                 // }
                  ?>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php $this->load->view("bottom_application"); ?>
<!--<script type="text/javascript">
  $('.payButton').click(function (e) {
    e.preventDefault();
    var totAmt = '<?php echo $totalAmount; ?>';
    if ($("#pickup_point").val() == '' && totAmt < '2000') {
      alert("Select Pickup Point!");
      return false;
    }
    if ($("#checkTerms").is(':checked')) {
      $('#paymentForm').submit();
    }
    else {
      alert('<?php echo ($this->session->userdata('lang') == 'p') ? $this->lang->line('agreetoterms') : 'Please Check to agree mercadomoz.Com Terms & Conditions.'; ?>');
    }
  });
</script>-->