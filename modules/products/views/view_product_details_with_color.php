<?php
$this->load->view('top_application');
$fieldType = $this->session->userdata('field_type');
$mediaRes = $media_res;
$overall_rating_product = product_overall_rating($res['products_id'], 'product');
error_message('alert');
$sz = explode(',', $res['size_ids']);
$cl = explode(',', $res['color_ids']);
?>
<link rel="stylesheet" type="text/css" href="<?php echo theme_url(); ?>css/xzoom.css">

<div class="clearfix"></div>
<div class="inner-banner-section"> 
  <img src="<?php echo theme_url(); ?>images/login/inner-bg.jpg">
  <div class="inner-breadcrum">
    <ul>
      <li><a href="<?php echo site_url(); ?>">Home</a></li>/
      <li>Product Details</li>
    </ul>
  </div>
</div>
<!-- ======inner-pages========-->

<div class="inner-pages-section">
  <div class="container">
    <div class="row">
      <div class="col-sm-6 col-md-5">
        <div class="details-zoom-product">
          <div class="xzoom-container">
            <img class="xzoom4" id="xzoom-fancy" src="<?php echo get_image('product-images', $res['media'], '493', '493', 'R'); ?>" xoriginal="<?php echo get_image('product-images', $res['media'], '', '', 'R'); ?>" />
            <div class="xzoom-thumbs">
              <?php
              foreach ($mediaRes as $mkey => $mval) {
                ?>
                <a href="<?php echo get_image('product-images', $mval['media'], '', '', 'R'); ?>"> 
                  <img class="xzoom-gallery4" width="80" xpreview="<?php echo get_image('product-images', $mval['media'], '493', '493', 'R'); ?>" src="<?php echo get_image('product-images', $mval['media'], '80', '85', 'AR'); ?>"/> 
                </a>
                <?php
              }
              ?>
            </div>
          </div> 
        </div> 
      </div> 


      <div class="col-sm-6 col-md-7">
        <div class="details-right-section">
          <h1><?php echo $res['product_name']; ?></h1> 
          <p><?php echo $res['products_description']; ?></p>
        </div> 
        <?php echo form_open(site_url('cart/add_to_cart'), 'id="cart_form"'); ?>
        <?php
        if ($res['product_discounted_price'] > 0) {
          ?>
          <span class="price" style="font-size: 25px;"><?php echo display_price($res['product_discounted_price']); ?> </span> 
          <span class="price-strike"><strike><?php echo display_price($res['product_price']); ?></strike></span>
          <?php
          $productPriceCart = $res['product_discounted_price'];
        } else {
          ?>
          <span class="price"><?php echo display_price($res['product_price']); ?> </span>
          <?php
          $productPriceCart = $res['product_price'];
        }
        ?>
        <div class="quantity-section">
          <span class="form-title">Color:</span>
          <div class="attributes">
            <div class="attribute-list">
              <select name="color_id" class="color" onchange="$('#color_id').val($(this).val());">
                <option value="">Select Color</option>
                <?php
                foreach ($cl as $sval) {
                  $size = $this->db->query("SELECT * FROM wl_colors WHERE color_id = '" . trim($sval) . "'")->row_array();
                  ?>
                  <option value="<?php echo $size['color_id']; ?>"><?php echo $size['color_name']; ?></option>
                  <?php
                }
                ?>
              </select>
            </div>
          </div>
        </div>
        <div class="quantity-section">
          <span class="form-title">Size:</span>
          <div class="attributes">
            <div class="attribute-list">
              <select name="size_id" class="size" onchange="$('#size_id').val($(this).val());">
                <option value="">Select Size</option>
                <?php
                foreach ($sz as $sval) {
                  $size = $this->db->query("SELECT * FROM wl_sizes WHERE size_id = '" . trim($sval) . "'")->row_array();
                  ?>
                  <option value="<?php echo $size['size_id']; ?>"><?php echo $size['size_name']; ?></option>
                  <?php
                }
                ?>
              </select>
            </div>
          </div>
        </div>
        <div class="quantity-section">
          <span class="form-title">Quantity:</span>
          <div class="quantity">
            <input type="button" value="-" id="minus1" class="minus" />
            <input type="text" name="qty" id="qty" maxlength="1000" value="1" title="Qty" class="input-text qty" />
            <input type="button" value="+" id="add1" class="plus" />
          </div>
        </div>
        <div class="row">
          <div class="col-sm-4 col-md-4">
            <div class="p-details-cart">
              <button type="submit" class="btn-primary p10 cartButton"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Add TO Cart</button>
            </div></div>

          <div class="col-sm-4 col-md-4">
            <div class="p-details-cart">
              <a href="<?php echo site_url('cart/add_to_wishlist/' . $res['products_id']); ?>" class="btn-primary p10"><i class="fa fa-heart" aria-hidden="true"></i> Add To Wishlist</a>
            </div></div>

        </div>

        <div class="social-m-section">
          <ul>
            <li>Share :-</li>
            <li><a href="https://www.facebook.com/yourastro" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
            <li><a href="https://twitter.com/UR_Astro" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
            <li><a href="https://www.linkedin.com/in/ur-astro-3846a0b2/" target="_blank" ><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
          </ul>
        </div>
        <input type="hidden" name="color_id" id="color_id" value="" />
        <input type="hidden" name="size_id" id="size_id" value="" />
        <input type="hidden" name="product_id" value="<?php echo $res['products_id']; ?>" />
        <input type="hidden" name="stockValue" class="stockValue" value="" />
        <?php echo form_close(); ?>

      </div>
    </div>
  </div>
  <?php
  if (is_array($related) && !empty($related)) {
    ?>
    <div class="vastu-section wow fadeInDown animated" data-wow-duration="500ms" data-wow-delay="400ms" style="visibility: visible; animation-duration: 500ms; animation-delay: 400ms; animation-name: fadeInDown;">
      <div class="common-tag text-center">
        <h2>You May Also Like
          <span></span>
        </h2>
      </div>
      <div class="container">
        <div class="row">
          <div class="product-in-section">
            <div class="container">
              <div id="demo">
                <div class="row">
                  <div class="span12">
                    <div id="owl-demo2" class="owl-carousel">
                      <?php
                      foreach ($related as $r => $new) {
                        $link_url = base_url($new['friendly_url']);
                        $productStock = product_stock($new['products_id']);
                        ?>
                        <div class="item">
                          <div class="vastu-product">
                            <div class="custom-related-box">
                            <img class="lazyOwl" data-src="<?php echo get_image('product-images', $new['media'], '267', '267', 'R'); ?>" alt="1">
                          </div>
                            <h4><?php echo $new['product_name']; ?></h4>
                            <div class="price-rang">
                              <ul>
                                <?php
                                if ($new['product_discounted_price'] > 0) {
                                  ?>
                                  <li><b><i class="fa fa-inr" aria-hidden="true"></i> <?php echo $new['product_price']; ?></b></li>
                                  <li><span><i class="fa fa-inr" aria-hidden="true"></i> <?php echo $new['product_discounted_price']; ?></span></li>
                                  <?php
                                } else {
                                  ?>
                                  <li><span><i class="fa fa-inr" aria-hidden="true"></i> <?php echo $new['product_price']; ?></span></li>
                                  <?php
                                }
                                ?>
                              </ul>
                            </div>
                            <div class="add-tocart"><a href="<?php echo site_url($new['friendly_url']); ?>"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Add TO Cart</a></div>
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
      </div>
    </div>
    <?php
  }
  ?>
</div>
<?php $this->load->view("bottom_application"); ?>
<script src="<?php echo theme_url(); ?>js/xzoom.min.js"></script>
<script src="<?php echo theme_url(); ?>js/setup.js"></script>

<script type="text/javascript">
                //Max and Min Quantity
                var MAX_QTY = $('.stockValue').val();
                var MIN_QTY = 1;
                jQuery(".plus").click(function () {
                  MAX_QTY = $('.stockValue').val();
                  var currentVal = parseInt(jQuery(this).prev(".qty").val());
                  if (!currentVal || currentVal == "" || currentVal == "NaN")
                    currentVal = 0;
                  if (currentVal < MAX_QTY)
                    jQuery(this).prev(".qty").val(currentVal + 1);
                  else
                    alert('You have reached to maximum available quantity.');
                });
                jQuery(".minus").click(function () {
                  var currentVal = parseInt(jQuery(this).next(".qty").val());
                  if (currentVal == "NaN")
                    currentVal = 0;
                  if (currentVal > MIN_QTY) {
                    jQuery(this).next(".qty").val(currentVal - 1);
                  }
                });

                //Post Review
                $("#contactReview").submit(function (event) {
                  event.preventDefault();
                  var radioValue = $("input[name='rating']:checked").val();
                  $.post("<?php echo base_url('products/post_review'); ?>", {email: $("#email").val(), name: $("#name").val(), rating: $('#ads_rating').val(), reviews: $("#comment").val(), products_id: '<?php echo $res['products_id']; ?>'}, function (data) {
                    obj = $.parseJSON(data);
                    //display message and redirect
                    if (obj.success == true) {
                      $(".alert-danger").hide();
                      $(".alert-success").show();
                      $("#sucessMsg1").html(obj.message);
                      $("#contactReview").resetForm();
                      setTimeout(function () {
                        $(".alert-danger").hide();
                        $(".alert-success").hide();
                      }, 5000);
                    } else {
                      $(".alert-success").hide();
                      $(".alert-danger").show();
                      $("#errortxt1").html(obj.error);
                      setTimeout(function () {
                        $(".alert-danger").hide();
                        $(".alert-success").hide();
                      }, 5000);
                    }
                  });
                });
                //End Here

                // Price canculation on change of store
<?php
if (is_array($sz) && !empty($sz) && $res['size_ids'] != "") {
  ?>
                  $('.size, .color').change(function () {
                    var sz = $('#size_id').val();
                    var cl = $('#color_id').val();
                    if (sz > 0) {
                      $.post('<?php echo site_url(); ?>products/get_product_price', {sid: sz, cid: cl, pid: '<?php echo $res['products_id']; ?>'}, function (msg) {
                        if (msg) {
                          var txt = msg.split('-');
                          if (txt[2] > 0) {
                            //var dis = (100 * 1 - ((txt[2] * 1 / txt[1] * 1) * 100));
                            $('.price').html('');
                            $('.price-strike').html('');
                            $('.price').html('INR. ' + txt[2] + '');
                            $('.price-strike').html('<strike>INR. ' + txt[1] + '</strike>');
                            $('.cartButton').show(0);
                          }
                          else {
                            $('.price').html('');
                            $('.price-strike').html('');
                            $('.price').html('INR. ' + txt[1] + '');
                            $('.cartButton').show(0);
                          }
                        } else {
                          $('.price').html('');
                          $('.price-strike').html('');
                          $('.price').html('Out of Stock');
                          $('.cartButton').hide(0);
                        }
                        $('.stockValue').val(txt[3]);
                      });
                    }
                  });
                  $('.cartButton').click(function () {
                    if ($('#size_id').val() == '' || $('#color_id').val() == '') {
                      alert('please select size & color to add in the cart!');
                      return false;
                    } else {
                      $('#cart_form').submit();
                    }
                  });
  <?php
}
?>
</script>
