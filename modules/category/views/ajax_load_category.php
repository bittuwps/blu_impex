<?php
foreach ($res as $val) {
  //trace($val);
  $link_url = base_url() . $val['friendly_url'];
  $catCount = count_category(" AND parent_id = '" . $val['category_id'] . "' ");
  $proCount = count_products(" AND category_id = '" . $val['category_id'] . "' ");
  if ($proCount > 0) {
    $count = $proCount;
  } else {
    $count = $catCount;
  }
  ?>
  <li class="col-sx-12 col-sm-4 listpager">
    <div class="product-container">
      <div class="left-block">
        <a href="<?php echo $link_url; ?>">
          <img class="img-responsive" alt="product" src="<?php echo get_image('category', $val['category_image'], '268', '328', 'R'); ?>" />
        </a>  
      </div>
      <div class="right-block">
        <h5 class="product-name"><a href="<?php echo $link_url; ?>"><strong><?php echo $val['category_name']; ?></strong></a></h5>
        <p style="min-height: 40px;"><?php echo $val['category_description']; ?></p>
      </div>
    </div>
  </li>
  <?php
}
?>