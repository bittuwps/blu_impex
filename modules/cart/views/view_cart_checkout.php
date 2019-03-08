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
      <span class="navigation_page"><?php echo ($this->session->userdata('lang') == 'p')?$this->lang->line('checkout'):'Checkout';?></span>
    </div>
    <!-- ./breadcrumb -->

    <!-- page heading-->
    <div class="container">
      <h1 class="page-heading">
        <span class="page-heading-title2"><?php echo ($this->session->userdata('lang') == 'p')?$this->lang->line('checkout'):'Checkout';?></span>
      </h1>
    </div>
    <div class="page-content page-order">
      <ul class="step">
        <li ><span>01. <?php echo ($this->session->userdata('lang') == 'p')?$this->lang->line('summary'):'Summary';?></span></li>
        <li class="current-step"><span>02. <?php echo ($this->session->userdata('lang') == 'p')?$this->lang->line('Signin'):'Sign in';?></span></li>
        <li><span>03. <?php echo ($this->session->userdata('lang') == 'p')?$this->lang->line('Shipping_address'):'Shipping Address';?></span></li>
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

              <div class="col-sm-9 col-md-offset-1">
                <div class="row">
                  <div class="md-col-12">
                    <input type="text" name="email" placeholder="Email ID*"  value="" class="form-control" required/>
                    <div class="password_cont" style="display: none;">
                      <input name="password" id="password" type="password" value="<?= get_cookie('pwd') != "" ? get_cookie('pwd') : ''; ?>" placeholder="Password*" class="form-control">
                      <?php echo form_error('password'); ?>
                    </div>
                  </div>
                </div>
                <div class="row" style="margin-top:10px;">
                  <div class="col-sm-6">
                    <div class="row">
                      <div class="col-md-3">
                        <input name="checkout_type" type="radio" value="Guest" class="" checked onClick="$('.password_cont').slideUp('fast')" />
                      </div>
                      <div class="col-md-9">
                        <b><?php echo ($this->session->userdata('lang') == 'p')?$this->lang->line('continue_guest'):'Continue as guest';?></b> <?php echo ($this->session->userdata('lang') == 'p')?$this->lang->line('no_password'):'(No password or registration required)';?>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="row">
                      <div class="col-md-3">
                        <input name="checkout_type" id="checkout_type_user" type="radio" value="User" class="" onClick="$('.password_cont').slideDown('fast')" />
                      </div>
                      <div class="col-md-9">
                        <b><?php echo ($this->session->userdata('lang') == 'p')?$this->lang->line('i_have_account'):'I have a Asiana account and password';?></b>
                      </div>
                    </div>
                  </div>
                </div>
                <p><button class="button pull-right" type="submit"><?php echo ($this->session->userdata('lang') == 'p')?$this->lang->line('continue'):'Continue'; ?></button></p>
                <p style="clear: both;">&nbsp;</p>
                <p><a class="button pull-right" a href="<?php echo site_url('users/register'); ?>"><?php echo ($this->session->userdata('lang') == 'p')?$this->lang->line('register_here'):'Register Here'; ?></a></p>
              </div>


            </div>
            <?php echo form_close(); ?>
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
<?php
if ($this->input->post('checkout_type') == 'User') {
  ?>
  <script type="text/javascript" language="javascript">
    jQuery('#checkout_type_user').trigger('click');
  </script>
  <?php
}
$this->load->view("bottom_application");
?>