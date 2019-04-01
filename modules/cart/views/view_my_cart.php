<?php
$this->load->view("top_application");
$curr_symbol = display_symbol();
?>
<div class="columns-container">
  <div class="container" id="columns">
    <!-- breadcrumb -->
    <div class="breadcrumb clearfix">
      <a class="home" href="<?php echo site_url(); ?>" title="Return to Home"><?php echo ($this->session->userdata('lang') == 'p') ? $this->lang->line('home') : 'Home'; ?></a>
      <span class="navigation-pipe">/</span>
      <span class="navigation_page"><?php echo ($this->session->userdata('lang') == 'p') ? $this->lang->line('my_bag') : 'My Shopping Bag'; ?></span>
    </div>
    <!-- ./breadcrumb -->
    <!-- page heading-->
    <div class="container">
      <h1 class="page-heading">
        <span class="page-heading-title2"><?php echo ($this->session->userdata('lang') == 'p') ? $this->lang->line('my_bag') : 'My Shopping Bag'; ?></span>
      </h1>
    </div>
    <!-- ../page heading-->

    <div class="page-content page-order">
      <!--ul class="step">
        <li class="current-step"><span>01. Summary</span></li>
        <li><span>02. Sign in</span></li>
        <li><span>03. Shipping Address</span></li>
        <li><span>04. Review Order</span></li>
        <li><span>05. Payment</span></li>
      </ul-->

      <div class="heading-counter"><?php echo ($this->session->userdata('lang') == 'p') ? $this->lang->line('my_bag_contains') : 'Your shopping cart contains'; ?>:
        <span><?php echo count($this->cart->contents()); ?> <?php echo ($this->session->userdata('lang') == 'p') ? $this->lang->line('product') : 'Product'; ?></span>
      </div>
      <div class="order-detail-content">
        <?php
        error_message();
        validation_message();

        $cart = $this->cart->contents();
        //trace($cart);
        if (is_array($cart) && !empty($cart)) {
          ?>
          <?php echo form_open('cart/', 'name="cart_frm" id="cart_frm" '); ?>
          <table class="table table-bordered table-responsive cart_summary">
            <thead>
              <tr>
                <th class="cart_product"><?php echo ($this->session->userdata('lang') == 'p') ? $this->lang->line('product') : 'Product'; ?></th>
                <th><?php echo ($this->session->userdata('lang') == 'p') ? $this->lang->line('description') : 'Product'; ?></th>
                <th><?php echo ($this->session->userdata('lang') == 'p') ? $this->lang->line('unit_price') : 'Unit price'; ?></th>
                <th><?php echo ($this->session->userdata('lang') == 'p') ? $this->lang->line('qty') : 'Qty'; ?></th>
                <th><?php echo ($this->session->userdata('lang') == 'p') ? $this->lang->line('total') : 'Total'; ?></th>
                <th  class="action"><i class="fa fa-trash-o"></i></th>
              </tr>
            </thead>
            <tbody>
              <?php
              $totalAmount = $origAmount = $discountAmt = $sellingAmount = 0;
              $i = 1;
              foreach ($cart as $items) {
                //trace($items);
                $link = ($this->session->userdata('user_id') > 0) ? 'href="' . site_url() . 'cart/add_to_wishlist/' . $items['pid'] . '"' : 'href="#" data-toggle="modal" data-target="#log-modal"';
                $pprice = $items['price'];
                $totalAmount += $pprice * $items['qty'];
                $origAmount += $items['product_price'] * $items['qty'];
                $sellingAmount += $items['product_price'] * $items['qty'];
                //$storeName = $size = get_db_field_value("wl_store", "store_name", "WHERE setId = '" . $items['options']['Store'] . "'");
                $stock = get_db_field_value("wl_products", "product_qty", "WHERE products_id = '" . $items['pid'] . "'");
                ?>
                <tr>
                  <td class="cart_product">
                    <a href="<?php echo site_url($items['name']); ?>">
                      <?php
                      if ($items['product_type'] == 1) {
                        ?>
                        <img src="<?php echo get_image('product_images/catalog', $items['img'], '100', '100', 'R'); ?>" />
                        <?php
                      } else {
                        ?>
                        <img src="<?php echo get_image('product_images', $items['img'], '100', '100', 'R'); ?>" />
                        <?php
                      }
                      ?>
                    </a>
                  </td>
                  <td class="cart_description">
                    <p class="product-name"><a href="#"><?php echo $items['origname']; ?> </a></p>
                    <small class="cart_ref">SKU : <?php echo $items['code']; ?></small><br>
                    <?php /*?><?php
                    if ($items['product_type'] == 0) {
                      $attribute = json_decode($items['options']['Attributes']);
                      if (is_array($attribute) && !empty($attribute)) {
                        foreach ($attribute as $k => $v) {
                          ?>
                          <small><?php echo ucwords($k); ?> : <?php echo $v; ?> </small><br>   
                          <?php
                        }
                      }
                    }
                    ?>
                    <small><?php echo ($this->session->userdata('lang') == 'p') ? $this->lang->line('store_name') : 'Store Name'; ?> : <?php echo $storeName; ?></small><?php */?>
                  </td>
                  <td >
                    <h5 class="cost"><?php echo display_price($items['price']); ?></h5>
                  </td>
                  <td align="center">
                    <div class="quantity">
                      <a href="javascript:void(0)" onclick="return incDnc(2, <?php echo $i; ?>, '<?php echo $stock; ?>');" id="minus1" class="minus"><i class="fa fa-minus-square"></i></a>
                      <input readonly="readonly" name="<?php echo $i; ?>[qty]" id="qty_<?php echo $i; ?>" type="text" value="<?php echo $items['qty']; ?>" class="input-text qty" />
                      <a href="javascript:void(0)" onclick="return incDnc(1, <?php echo $i; ?>, '<?php echo $stock; ?>');" id="add1" class="plus"><i class="fa fa-plus-square"></i></a>
                      <input type="hidden" name="<?php echo $i; ?>[rowid]" id='cart_rowid_<?php echo $i; ?>' value="<?php echo $items['rowid']; ?>" />
                    </div>


                  </td>
                  <td class="price">
                    <?php echo display_price($items['price'] * $items['qty']); ?>
                  </td>
                  <td class="action">
                    <a href="<?php echo site_url(); ?>cart/remove_item/<?php echo $items['rowid']; ?>"><?php echo ($this->session->userdata('lang') == 'p') ? $this->lang->line('delete_item') : 'Delete item'; ?></a>
                  </td>
                </tr>
                <?php
                $i++;
              }
              ?>
            </tbody>
            <tfoot>
              <tr>
                <td colspan="2" rowspan="2"></td>
                <td colspan="3"><?php echo ($this->session->userdata('lang') == 'p') ? $this->lang->line('products_with_tax') : 'Total products (IVA incl.)'; ?></td>
                <td colspan="2"><?php echo display_price($totalAmount); ?></td>
              </tr>
              <!--tr>
                <td colspan="3"><strong>Total</strong></td>
                <td colspan="2"><strong><i class="fa fa-inr"></i> 3895</strong></td>
              </tr-->
            </tfoot>    
          </table>
          <div class="cart_navigation">
            <a class="prev-btn" href="<?php echo site_url('products'); ?>"><i class="fa fa-angle-left" aria-hidden="true"></i> <?php echo ($this->session->userdata('lang') == 'p') ? $this->lang->line('continue_shopping') : 'Continue shopping'; ?></a>
            <?php
            //if ($totalAmount >= 100) {
              ?>              
              <a class="next-btn" href="<?php echo site_url('cart/checkout'); ?>"><?php echo ($this->session->userdata('lang') == 'p') ? $this->lang->line('checkout') : 'Proceed to checkout'; ?> <i class="fa fa-angle-right" aria-hidden="true"></i> </a>
              <?php
            //} else {
              ?>
              <!--<a class="next-btn" onclick="alert('<?php echo ($this->session->userdata('lang') == 'p') ? $this->lang->line('min_order') : 'Please add more products to proceed, min. HK 100 is required to proceed.'; ?>');" href="javascript:void(0);"><?php echo ($this->session->userdata('lang') == 'p') ? $this->lang->line('checkout') : 'Proceed to checkout'; ?> <i class="fa fa-angle-right" aria-hidden="true"></i> </a>-->
              <?php
            //}
            ?>

          </div>

          <?php
          echo form_close();
        } else {
          ?>
          <div class="row">
            <div class="col-md-4 col-sm-4 col-md-offset-4">
              <div class="text-center">
                <img src="<?php echo theme_url(); ?>images/shopping_cart_empty.jpg" alt="Cart Empty" title="Cart Empty">
              </div>
              <div class="cart_navigation" style="text-align:center;">              
                <a href="<?php echo site_url(); ?>products" class="btn-1 shadow-0 sm"><?php echo ($this->session->userdata('lang') == 'p') ? $this->lang->line('continue_shopping') : 'Continue shopping'; ?></a>
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
<?php $this->load->view("bottom_application"); ?>
<script type="text/javascript" src="<?php echo site_url(); ?>assets/developers/js/common.js"></script>