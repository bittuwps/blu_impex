<?php $this->load->view("top_application"); ?>
<?php
$values_posted_back = (is_array($this->input->post())) ? TRUE : FALSE;
$is_same = $values_posted_back === TRUE ? $this->input->post('is_same') : '';
//trace($mres);
?>
<style>.box-inputfeilds input, textarea, select{margin-top: 5px;}</style>
<div class="columns-container">
  <div class="container" id="columns">
    <!-- breadcrumb -->
    <div class="breadcrumb clearfix">
      <a class="home" href="<?php echo site_url(); ?>" title="Return to Home"><?php echo ($this->session->userdata('lang') == 'p')?$this->lang->line('home'):'Home';?></a>
      <span class="navigation-pipe">&nbsp;</span>
      <span class="navigation_page"><?php echo ($this->session->userdata('lang') == 'p')?$this->lang->line('confirm_address'):'Confirm Address'; ?></span>
    </div>
    <!-- ./breadcrumb -->

    <!-- page heading-->
    <div class="container">
      <h1 class="page-heading">
        <span class="page-heading-title2"><?php echo ($this->session->userdata('lang') == 'p')?$this->lang->line('confirm_address'):'Confirm Address';?></span>
      </h1>
    </div>
    <div class="page-content page-order">
      <ul class="step">
        <li ><span>01. <?php echo ($this->session->userdata('lang') == 'p')?$this->lang->line('summary'):'Summary';?></span></li>
        <li><span>02. <?php echo ($this->session->userdata('lang') == 'p')?$this->lang->line('Signin'):'Sign in';?></span></li>
        <li class="current-step"><span>03. <?php echo ($this->session->userdata('lang') == 'p')?$this->lang->line('Shipping_address'):'Shipping Address';?></span></li>
        <li><span>04. <?php echo ($this->session->userdata('lang') == 'p')?$this->lang->line('Review_order'):'Review Order';?></span></li>
        <li><span>05. <?php echo ($this->session->userdata('lang') == 'p')?$this->lang->line('payment'):'Payment';?></span></li>
      </ul>
    </div>
    <!-- ../page heading-->
    <div class="page-content">
      <div class="row">
        <div class="col-sm-9">
          <div class="box-inputfeilds">
            <div class="row">
              <?php
              echo form_open('', 'class="row"');
              error_message();
              ?>
              <div class="col-sm-6">
                <div class="top-cs">
                  <p><?php echo ($this->session->userdata('lang') == 'p')?$this->lang->line('deliver_order_here'):'We will deliver your order here';?> </p>
                </div>
                <h3><?php echo ($this->session->userdata('lang') == 'p')?$this->lang->line('Shipping_address'):'Shipping Address';?></h3>
                <div class="cb40"></div>
                <input type="text" name="ship_name" placeholder="Full Name*"  value="<?php echo $mres['name']; ?>" class="form-control" required/>
                <input type="tel" pattern="[1-9]{1}[0-9]{8}" maxlength="9" name="ship_mobile" placeholder="Mobile Number*" value="<?php echo $mres['mobile']; ?>" class="form-control" required/>
                <textarea name="ship_address" cols="1"  placeholder="Address Details*" rows="3"  class="form-control unicase-form-control" required><?php echo $mres['address']; ?></textarea>
                <input type="text" name="ship_lmark" value="<?php echo $mres['landmark']; ?>" placeholder="Landmark" class="form-control" />
                <input type="text" name="ship_city" value="<?php echo $mres['city']; ?>" placeholder="City*" class="form-control" required/>
                <input type="hidden" name="ship_pin" value="<?php echo $mres['zipcode']; ?>" placeholder="Pincode*" class="form-control" required/>
                <input type="text" name="ship_state" placeholder="State*" value="<?php echo $mres['state']; ?>" class="form-control" required/>
                <input type="hidden" name="ship_country" id="ship_country" value="Hong Kong" />
				
                <!--<input type="text" name="idcard_no" placeholder="Passport No, DIRE No, B.I No *" value="<?php echo set_value('idcard_no'); ?>" class="form-control" required/>-->
				<input type="hidden" name="idcard_no" placeholder="Passport No, DIRE No, B.I No *" value="112345" class="form-control" required/>
                <?php //echo CountrySelectBox(array("name" => "ship_country", 'current_selected_val' => $mres['country'], "format" => 'class="form-control unicase-form-control text-input" required')); ?> 
                <br><br>
                <a onClick="goBack()" class="button" ><?php echo ($this->session->userdata('lang') == 'p')?$this->lang->line('go_back'):'Go Back';?></b></a>
                <script>
                  function goBack() {
                    window.history.back();
                  }
                </script>
              </div>         
              <div class="col-sm-6">
                <div class="top-cs">
                  <button class="button pull-right" type="submit"><?php echo ($this->session->userdata('lang') == 'p')?$this->lang->line('checkout'):'Checkout';?></button>
                  <a href="<?php echo site_url('products'); ?>" class="button pull-right"><?php echo ($this->session->userdata('lang') == 'p')?$this->lang->line('continue_shopping'):'Continue Shopping';?></a>
                </div>
                <h3><?php echo ($this->session->userdata('lang') == 'p')?$this->lang->line('billing_address'):'Billing Address';?></h3>
                <div class="checkbox-same">
                  <input id="check_add" class="" name="check_add" onClick="Check_Bill_Ship(this.form);" value="Y" onClick="" type="checkbox"> <?php echo ($this->session->userdata('lang') == 'p')?$this->lang->line('same_as_shipping'):'Same as Shipping address'; ?>
                </div>
                <input type="text" name="bil_name" placeholder="Full Name*"  value="<?php echo $mres['bil_name']; ?>" class="form-control" required/>
                <input type="tel" pattern="[1-9]{1}[0-9]{8}" maxlength="9" name="bil_mobile" value="<?php echo $mres['bil_mobile']; ?>" placeholder="Mobile Number*" class="form-control" required/>
                <textarea name="bil_address" cols="1" placeholder="Address Details*" rows="3" class="form-control unicase-form-control" required><?php echo $mres['bil_address']; ?></textarea>
                <input type="text" name="bil_lmark" value="<?php echo $mres['bil_landmark']; ?>" placeholder="Landmark" class="form-control"/>
                <input type="text" name="bil_city" value="<?php echo $mres['bil_city']; ?>" placeholder="City*" class="form-control" required/>
                <input type="hidden" name="bil_pin" value="<?php echo $mres['bil_zipcode']; ?>" placeholder="Pincode*" class="form-control" required/>
                <input type="text" name="bil_state" value="<?php echo $mres['bil_state']; ?>" placeholder="State*" class="form-control" required/>
                <input type="hidden" name="bil_country" id="bil_country" value="Hong Kong" />
                
                <?php //echo CountrySelectBox(array("name" => "bil_country", 'current_selected_val' => $mres['bil_country'], "format" => 'class="form-control unicase-form-control text-input" required')); ?>
                <button class="button pull-right" type="submit"><?php echo ($this->session->userdata('lang') == 'p')?$this->lang->line('checkout'):'Checkout';?></button>
              </div>
              <?php echo form_close(); ?>
            </div>
          </div>
        </div>
        <div class="column col-xs-12 col-sm-3" id="left_column">
          <!-- block best sellers -->
          <div class="block left-module">
            <p class="title_block"><?php echo ($this->session->userdata('lang') == 'p')?$this->lang->line('cart'):'My Cart';?> </p>
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
                      <p class="product-name"><?php echo ($this->session->userdata('lang') == 'p')?$this->lang->line('qty'):'Qty';?>: <?php echo $items['qty']; ?></span></p>
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
                  <p class="subcaption "><?php echo ($this->session->userdata('lang') == 'p')?$this->lang->line('total'):'Total';?>: <span class="bold"><?php echo display_price($totalAmount); ?></span></p>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
  function Check_Bill_Ship(chk) {

    if (chk.check_add.checked == 1) {
      //chk.bmtitle.value = chk.mtitle.value;
      chk.bil_name.value = chk.ship_name.value;
      chk.bil_mobile.value = chk.ship_mobile.value;
      chk.bil_address.value = chk.ship_address.value;
      chk.bil_lmark.value = chk.ship_lmark.value;
      chk.bil_city.value = chk.ship_city.value;
      chk.bil_pin.value = chk.ship_pin.value;
      chk.bil_state.value = chk.ship_state.value;
      chk.bil_country.value = chk.ship_country.options[chk.ship_country.selectedIndex].value;
    }
    if (chk.check_add.checked == 0) {
      //chk.bmtitle.value = '';
      chk.bil_name.value = '';
      chk.bil_mobile.value = '';
      chk.bil_address.value = '';
      chk.bil_lmark.value = '';
      chk.bil_city.value = '';
      chk.bil_pin.value = '';
      chk.bil_state.value = '';
      chk.bil_country.value = chk.ship_country.options[0].value;
    }
  }
</script>
<?php $this->load->view("bottom_application"); ?>