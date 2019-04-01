<?php
$this->load->view('top_application');
$fieldType = $this->session->userdata('field_type');
$mediaRes = $media_res;
$overall_rating_product = product_overall_rating($res['products_id'], 'product');
error_message('alert');
//$sz = explode(',', $res['size_ids']);
//$cl = explode(',', $res['color_ids']);
?>
<link rel="stylesheet" type="text/css" href="<?php echo theme_url(); ?>css/xzoom.css">


<div class="inner-img-bg"> 
  <img src="<?php echo theme_url(); ?>img/slider/inner-bg.jpg" title="Product Details" alt="Product Details">
  <!--div class="inner-breadcrum">
    <ul>
      <li><a href="<?php echo site_url(); ?>" title="Home">Home</a></li>/
      <li>Product Details</li>
    </ul>
  </div-->
</div>
<div class="clearfix"></div>
<!-- ======inner-pages========-->

<div class="inner-pages-section">
  <div class="container">
    <div class="row">
      <div class="col-sm-6 col-md-7"> 

        
  <div class="details-zoom-product">                    
<div class="app-figure" id="zoom-fig">
<a id="Zoom-1" class="MagicZoom" title="Show your product in stunning detail with Magic Zoom Plus." href="<?php echo get_image('product-images', $res['media'], '', '', 'R'); ?>" data-options="zoomWidth:500px; zoomHeight:500px">        
<img src="<?php echo get_image('product-images', $res['media'], '493', '493', 'R'); ?>?scale.height=400"  alt=""/>
</a>
<div class="selectors">
<?php
foreach ($mediaRes as $mkey => $mval) {
?>  


<a data-zoom-id="Zoom-1" href="<?php echo get_image('product-images', $mval['media'], '', '', 'R'); ?>" data-image="<?php echo get_image('product-images', $mval['media'], '493', '493', 'R'); ?>?scale.height=400">
<img srcset="<?php echo get_image('product-images', $mval['media'], '80', '155', 'R'); ?>?scale.width=112 2x" src="<?php echo get_image('product-images', $mval['media'], '80', '155', 'R'); ?>?scale.width=56"/>
</a>


 <?php
}
?>           
</div>            
            
            
          </div>        
 
        </div> 
      </div> 


      <div class="col-sm-6 col-md-5">
        <div class="details-right-section">
          <h1><?php echo $res['product_name']; ?></h1> 
          <div class="right-s-price">
           <?php
         if ($res['product_discounted_price'] > 0) {
           ?>
          <b><?php echo display_price($res['product_discounted_price']); ?></b>
           <strike><?php echo display_price($res['product_price']); ?></strike>
           <?php
           $productPriceCart = $res['product_discounted_price'];
         } else {
           ?>
            <span class="price"><?php echo display_price($res['product_price']); ?> </span>
           <?php
           $productPriceCart = $res['product_price'];
         }
         ?>
          </div>
          <?php echo $res['products_description']; ?>
        </div> 
        <?php echo form_open(site_url('cart/add_to_cart'), 'id="cart_form"'); ?>
       
        <!--div class="quantity-section">
          <span class="form-title">Color:</span>
          <div class="attributes">
            <div class="attribute-list">
              <select name="color_id" class="color" onchange="$('#color_id').val($(this).val());">
                <option value="">Select Color</option>
                <?php
/*
                foreach ($cl as $sval) {
                  $size = $this->db->query("SELECT * FROM wl_colors WHERE color_id = '" . trim($sval) . "'")->row_array();
                  ?>
                  <option value="<?php echo $size['color_id']; ?>"><?php echo $size['color_name']; ?></option>
                  <?php
                }
                */
                ?>
              </select>
            </div>
          </div>
        </div-->
        <!--div class="quantity-section">
          <span class="form-title">Size:</span>
          <div class="attributes">
            <div class="attribute-list">
              <select name="size_id" class="size" onchange="$('#size_id').val($(this).val());">
                <option value="">Select Size</option>
                <?php
/*
                foreach ($sz as $sval) {
                  $size = $this->db->query("SELECT * FROM wl_sizes WHERE size_id = '" . trim($sval) . "'")->row_array();
                  ?>
                  <option value="<?php echo $size['size_id']; ?>"><?php echo $size['size_name']; ?></option>
                  <?php
                }
                */  
                ?>
              </select>
            </div>
          </div>
        </div-->
        <div class="quantity-section">
          <span class="form-title">Quantity:</span>
          <div class="quantity">
            <input type="button" value="-" id="minus1" class="minus" />
            <input type="text" name="qty" id="qty" maxlength="1000" value="1" title="Qty" class="input-text qty" />
            <input type="button" value="+" id="add1" class="plus" />
          </div>
        </div>
        <div class="row">
          <div class="col-sm-6 col-md-6">
            <div class="p-details-cart">
              <button type="submit" class="btn-primary p10 cartButton"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Add TO Cart</button>
            </div></div>

          <div class="col-sm-6 col-md-6">
            <div class="p-details-cart">
              <a href="<?php echo site_url('cart/add_to_wishlist/' . $res['products_id']); ?>" class="btn-primary p10"><i class="fa fa-heart" aria-hidden="true"></i> Add To Wishlist</a>
            </div></div>

        </div>
        <div class="dec_2018">
        <!--<h4>THE STORY</h4>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique voluptatibus nulla sunt possimus facere asperiores inventore explicabo ex, ut quibusdam reiciendis necessitatibus ab voluptates adipisci maiores dolor cupiditate voluptate distinctio?</p>-->
        </div>

        <div class="social-m-section">
          <ul>
            <li>Share :-</li>
            <li><a href="#" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
            <li><a href="#" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
            <li><a href="#" target="_blank" ><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
          </ul>
        </div>
        <input type="hidden" name="color_id" id="color_id" value="" />
        <input type="hidden" name="size_id" id="size_id" value="" />
        <input type="hidden" name="product_id" value="<?php echo $res['products_id']; ?>" />
        <input type="hidden" name="stockValue" class="stockValue" value="<?php echo $res['product_qty']; ?>" />
        <?php echo form_close(); ?>

      </div>
    </div>
  </div>
  <div class="clearfix"></div>
  
      <?php
  //trace($related);
  if (is_array($related) && !empty($related)) {
    ?>
      
<div class="trending-products">
<h2 class="wow fadeInLeft animated" data-wow-delay=".2s" style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInLeft;">Trending products
<span></span>
</h2>

<div class="blog-section wow fadeInDown animated" data-wow-delay=".2s" style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInDown;"> 
<div class="container">
<div class="row">
  <div class="container">
 <div id="demo">
          <div class="row">
            <div class="span12">

              <div id="owl-demo3" class="owl-carousel">
               
               <?php
                      foreach ($related as $r => $new) {
                        $link_url = base_url($new['friendly_url']);
                        //$productStock = product_stock($new['products_id']);
                        ?>
                <div class="item">
                 <div class="custom-Trending-box">
                 <div class="blog-box">
                  <a href="<?php echo site_url($new['friendly_url']); ?>" title="<?php echo $new['product_name']; ?>">
                <img class="lazyOwl" data-src="<?php echo get_image('product-images', $new['media'], '267', '267', 'R', $new['friendly_url']); ?>" title="<?php echo $new['product_name']; ?>" alt="<?php echo $new['product_name']; ?>">
              </a></div>
                <h3><a href="<?php echo site_url($new['friendly_url']); ?>" title="<?php echo $new['product_name']; ?>"><?php echo $new['product_name']; ?></a></h3>
                <?php
                              if ($new['product_discounted_price'] > 0) {
                                ?>
                                 <p><i class="fa fa-rupee"></i><b> <?php echo ($new['product_price']); ?></b> <i class="fa fa-rupee"></i><strike> <?php echo ($new['product_discounted_price']); ?></strike></p>
                        
                                <?php
                              } else {
                                ?>
                             
                                                <p><i class="fa fa-rupee"></i> <?php echo display_price($new['product_price']); ?></p>
                                <?php
                              }
                              ?>
        
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

<link href="<?php echo theme_url(); ?>js/zoom/magiczoomplus.css" rel="stylesheet" type="text/css" />
<script src="<?php echo theme_url(); ?>js/zoom/magiczoomplus.js" type="text/javascript"></script>



<!--<script src="<?php echo theme_url(); ?>js/xzoom.min.js"></script>
<script src="<?php echo theme_url(); ?>js/setup.js"></script>-->

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

                
</script>
<script>
var mzOptions = {
  zoomPosition: "inner"
};
</script>