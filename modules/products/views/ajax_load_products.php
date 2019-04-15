<?php
$ix = 1;
foreach ($res as $val) {
  $link_url = base_url($val['friendly_url']);
  $productStock = product_stock($val['products_id']);
  $overall_rating_product = product_overall_rating($val['products_id'], 'product');
  ?>
  <div class="col-sm-6 col-md-4 listpager">
    <div class="product-in-list">
      <div class="product-img-section">
        <img src="<?php echo get_image('product-images', $val['media'], '240', '240', 'AR'); ?>" class="img-responsive">
        <div class="list-cart"><a href="<?php echo $link_url; ?>"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Add TO Cart</a></div>
      </div>
      <h2><a href="<?php echo $link_url; ?>"><?php echo $val['product_name']; ?></a></h2>
      <div class="clearfix"></div>

      <div class="price-rang">
        <ul>
          <?php
          if ($val['product_discounted_price'] > 0) {
            ?>
            <li><b> <?php echo display_price($val['product_discounted_price']); ?></b></li>
            <li><span> <?php echo display_price($val['product_price']); ?></span></li>
            <?php
          } else {
            ?>
            <li> <?php echo display_price($val['product_price']); ?></li>
            <?php
          }
          ?>
        </ul>
      </div>
      <!--<i class="fa fa-inr" aria-hidden="true"></i>-->
    </div>
  </div>
  <?php
}
?>