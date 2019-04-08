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
          
          
       <div class="product-details-content ml-70">
          <h2>Guitar Floral Wooden Notebook</h2> 
		  
          			  <div class="product-details-price">
				<span class="new">RS. 999.00</span>
				<span class="old">RS. 1,199.00</span>
			  </div> 
          
          	       <p>Product Code:  
                <b>CFMWN001</b></p> 
		       <p>Product Material:   <b>wood , metal , paper</b></p> 
	 
	
	       <p>Paper:         <b>100 gsm , 100% Elemental chlorine free fiber , ISO9001, 14001 AND OHSAS18001 Certified</b></p> 
		
	       <p>No of Pages:         <b>60</b></p> 
		            <div class="row">
              <div class="col-lg-3 col-md-3 col-sm-4 col-xs-6">
                <div class="pro-size">
                  <label>Select Paper</label>
                  <select name="keyfeature" >
				    <option value="Ruler">Ruler Pages</option>
                    <option value="Plan">Plan Pages</option> 
                  </select>
                </div>
              </div>

            </div>
         
            <div class="product-quantity">
              <div class="cart-plus-minus">
                <input class="cart-plus-minus-box" type="text" name="qty" value="1">
              </div>
            </div>
            <div class="pro-details-cart">
              <input type="hidden" name="product_id" value="333">
              <input type="hidden" name="stockValue" class="stockValue" value="0" />

              <button><i class="fa fa-shopping-cart"></i> Add to Cart</button>
            </div>
            <div class="pro-details-wishlist">
              <a href="https://www.craftfortune.com/cart/add_to_wishlist/333"><i class="fa fa-heart-o"></i> Wishlist</a>
            </div>
			<br/>
			<div class="social-m-section">
			  <div> 
				<h4 class="heading">Share</h4> 
                <div class="addthis_inline_share_toolbox"></div>
            
					<!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5ca2e7ad73f83648"></script>
				 
			  </div>
			</div>
          </div>   
        </div>
          
          
      
        
        
     

      </div>
    </div>
  </div>
  <div class="clearfix"></div>



<div class="description-review-area">
    <div class="container">
      <div class="description-review-wrapper">
        <div class="description-review-topbar nav">
                      <a class="active" style="margin-right: 7px;" data-toggle="tab" href="#des-details2">Description</a>
                    		  <a class="active" data-toggle="tab" href="#des-details3">Other Details</a> 
        </div>
		 
		
        <div class="tab-content description-review-bottom">
          <div id="des-details2" class="tab-pane active">
            <div class="product-description-wrapper">
              <ul>
	<li>No. of Sheets 60 (No. of Pages 120)</li>
	<li>The Diary Comes with a Beautifull Gift Box.</li>
</ul>            </div>
          </div>
          <div id="des-details3" class="tab-pane">
            			   <p>Product colour:   <b>Textured Brown , Silver</b></p> 
																			<p>Notes:         <b>Metal emits light and hampers the photo quality. Actual product looks better than the image</b></p> 
												   <p>Product Weight:         <b>360.00 gm </b></p> 
									   <p>HSN Code:         <b>4820</b></p> 
									   <p>Paper Size:         <b>145 mm x 200 mm</b></p> 
			          </div>
        </div>
      </div>
    </div>
  </div>



<div class="related_product">
  <div class="container">
    <div class="related_product text-center">
      <h2>Related Products</h2>
    </div>

    <div class="row">
              <div class="col-xl-12 col-md-3 col-lg-3 col-sm-4">
          <div class="product-wrap" prd-id="374">
            <div class="product-img">
              <div class="image23">
                <a href="moroccan-arch-window-wooden-notebook">
                  <img class="default-img" src="https://www.craftfortune.com/uploaded-files/thumb-cache/thumb-270-200-12-1XKs5.jpg" alt="Moroccan arch window wooden notebook" title="Moroccan arch window wooden notebook">
                </a>
              </div>
                              <span class="pink">16.68%</span>
                              <div class="product-action">
                <div class="pro-same-action pro-wishlist">
                  <a title="Wishlist" href="https://www.craftfortune.com/cart/add_to_wishlist/374"><i class="fa fa-heart-o"></i></a>
                </div>
                <div class="pro-same-action pro-cart">
                  <a title="Add To Cart" href="javascript:void()" onclick="add_to_cart(this)"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                </div>
                <div class="pro-same-action pro-quickview">
                  <a title="Quick View" href="moroccan-arch-window-wooden-notebook"><i class="fa fa-search-plus"></i></a>
                </div>
              </div>
            </div>
            <div class="product-content text-center">
              <h3><a href="moroccan-arch-window-wooden-notebook" title="Moroccan arch window wooden notebook">Moroccan arch window wooden&#8230;</a></h3>
              <!--      <div class="product-rating">
                        <i class="fa fa-star-o yellow"></i>
                        <i class="fa fa-star-o yellow"></i>
                        <i class="fa fa-star-o yellow"></i>
                        <i class="fa fa-star-o"></i>
                        <i class="fa fa-star-o"></i>
                    </div>-->
              <div class="product-price">
                <span>RS. 999.00</span>
                <span class="old">RS. 1,199.00</span>
              </div>
            </div>
          </div>
        </div>
                <div class="col-xl-12 col-md-3 col-lg-3 col-sm-4">
          <div class="product-wrap" prd-id="373">
            <div class="product-img">
              <div class="image23">
                <a href="moroccan-arch-wooden-notebook">
                  <img class="default-img" src="https://www.craftfortune.com/uploaded-files/thumb-cache/thumb-270-200-10-1ozv7.jpg" alt="Moroccan Arch wooden notebook" title="Moroccan Arch wooden notebook">
                </a>
              </div>
                              <span class="pink">16.68%</span>
                              <div class="product-action">
                <div class="pro-same-action pro-wishlist">
                  <a title="Wishlist" href="https://www.craftfortune.com/cart/add_to_wishlist/373"><i class="fa fa-heart-o"></i></a>
                </div>
                <div class="pro-same-action pro-cart">
                  <a title="Add To Cart" href="javascript:void()" onclick="add_to_cart(this)"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                </div>
                <div class="pro-same-action pro-quickview">
                  <a title="Quick View" href="moroccan-arch-wooden-notebook"><i class="fa fa-search-plus"></i></a>
                </div>
              </div>
            </div>
            <div class="product-content text-center">
              <h3><a href="moroccan-arch-wooden-notebook" title="Moroccan Arch wooden notebook">Moroccan Arch wooden notebook</a></h3>
              <!--      <div class="product-rating">
                        <i class="fa fa-star-o yellow"></i>
                        <i class="fa fa-star-o yellow"></i>
                        <i class="fa fa-star-o yellow"></i>
                        <i class="fa fa-star-o"></i>
                        <i class="fa fa-star-o"></i>
                    </div>-->
              <div class="product-price">
                <span>RS. 999.00</span>
                <span class="old">RS. 1,199.00</span>
              </div>
            </div>
          </div>
        </div>
                <div class="col-xl-12 col-md-3 col-lg-3 col-sm-4">
          <div class="product-wrap" prd-id="372">
            <div class="product-img">
              <div class="image23">
                <a href="merry-and-bright-wooden-notebook">
                  <img class="default-img" src="https://www.craftfortune.com/uploaded-files/thumb-cache/thumb-270-200-15-1YEEV.jpg" alt="Merry and Bright wooden notebook" title="Merry and Bright wooden notebook">
                </a>
              </div>
                              <span class="pink">16.68%</span>
                              <div class="product-action">
                <div class="pro-same-action pro-wishlist">
                  <a title="Wishlist" href="https://www.craftfortune.com/cart/add_to_wishlist/372"><i class="fa fa-heart-o"></i></a>
                </div>
                <div class="pro-same-action pro-cart">
                  <a title="Add To Cart" href="javascript:void()" onclick="add_to_cart(this)"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                </div>
                <div class="pro-same-action pro-quickview">
                  <a title="Quick View" href="merry-and-bright-wooden-notebook"><i class="fa fa-search-plus"></i></a>
                </div>
              </div>
            </div>
            <div class="product-content text-center">
              <h3><a href="merry-and-bright-wooden-notebook" title="Merry and Bright wooden notebook">Merry and Bright wooden notebook</a></h3>
              <!--      <div class="product-rating">
                        <i class="fa fa-star-o yellow"></i>
                        <i class="fa fa-star-o yellow"></i>
                        <i class="fa fa-star-o yellow"></i>
                        <i class="fa fa-star-o"></i>
                        <i class="fa fa-star-o"></i>
                    </div>-->
              <div class="product-price">
                <span>RS. 999.00</span>
                <span class="old">RS. 1,199.00</span>
              </div>
            </div>
          </div>
        </div>
                <div class="col-xl-12 col-md-3 col-lg-3 col-sm-4">
          <div class="product-wrap" prd-id="371">
            <div class="product-img">
              <div class="image23">
                <a href="hot-air-baloon-wooden-notebook">
                  <img class="default-img" src="https://www.craftfortune.com/uploaded-files/thumb-cache/thumb-270-200-37-1X0FJ.jpg" alt="Hot air baloon wooden notebook" title="Hot air baloon wooden notebook">
                </a>
              </div>
                              <span class="pink">16.68%</span>
                              <div class="product-action">
                <div class="pro-same-action pro-wishlist">
                  <a title="Wishlist" href="https://www.craftfortune.com/cart/add_to_wishlist/371"><i class="fa fa-heart-o"></i></a>
                </div>
                <div class="pro-same-action pro-cart">
                  <a title="Add To Cart" href="javascript:void()" onclick="add_to_cart(this)"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                </div>
                <div class="pro-same-action pro-quickview">
                  <a title="Quick View" href="hot-air-baloon-wooden-notebook"><i class="fa fa-search-plus"></i></a>
                </div>
              </div>
            </div>
            <div class="product-content text-center">
              <h3><a href="hot-air-baloon-wooden-notebook" title="Hot air baloon wooden notebook">Hot air baloon wooden notebook</a></h3>
              <!--      <div class="product-rating">
                        <i class="fa fa-star-o yellow"></i>
                        <i class="fa fa-star-o yellow"></i>
                        <i class="fa fa-star-o yellow"></i>
                        <i class="fa fa-star-o"></i>
                        <i class="fa fa-star-o"></i>
                    </div>-->
              <div class="product-price">
                <span>RS. 999.00</span>
                <span class="old">RS. 1,199.00</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
  



<?php $this->load->view("bottom_application"); ?>

<link href="<?php echo theme_url(); ?>magiczoomplus/magiczoomplus.css" rel="stylesheet"  />
<link href="<?php echo theme_url(); ?>magiczoomplus/magiczoomplus-inline.css" rel="stylesheet" />
<script src="<?php echo theme_url(); ?>magiczoomplus/magiczoomplus.js" ></script>


<script>
  $( function() {
    $( "#datepicker" ).datepicker({
      changeMonth: true,
      changeYear: true
    });
  } );
  </script>
<script type="text/javascript">
$(document).ready(function(){
    $('input.timepicker').timepicker({
		dynamic: false,
    dropdown: true,
    scrollbar: true
		
	});
});

  var CartPlusMinus = $('.cart-plus-minus');
  CartPlusMinus.prepend('<div class="dec qtybutton">-</div>');
  CartPlusMinus.append('<div class="inc qtybutton">+</div>');
  $(".qtybutton").on("click", function () {
    var $button = $(this);
    var oldValue = $button.parent().find("input").val();
    oldValue = (oldValue) ? oldValue : 0;
    if ($button.text() === "+") {
      var newVal = parseFloat(oldValue) + 1;
    } else {
      // Don't allow decrementing below zero
      if (oldValue > 0) {
        var newVal = parseFloat(oldValue) - 1;
      } else {
        newVal = 1;
      }
    }
    $button.parent().find("input").val(newVal);
  });


  function add_to_cart(btn) {
    var prd = $(btn).closest('div[prd-id]');
    var prd_id = $(prd).attr('prd-id');
    $('#add_to_cat_form').find('[name=product_id]').val(prd_id);
    $('form#add_to_cat_form').submit();
  }
</script>
<script src="assets/designer/themes/default/js/magiczoomplus.js"></script>
<script>
  $( function() {
    $( "#datepicker" ).datepicker({
      changeMonth: true,
      changeYear: true
    });
  } );
  </script>
<script type="text/javascript">
$(document).ready(function(){
    $('input.timepicker').timepicker({
		dynamic: false,
    dropdown: true,
    scrollbar: true
		
	});
});

  var CartPlusMinus = $('.cart-plus-minus');
  CartPlusMinus.prepend('<div class="dec qtybutton">-</div>');
  CartPlusMinus.append('<div class="inc qtybutton">+</div>');
  $(".qtybutton").on("click", function () {
    var $button = $(this);
    var oldValue = $button.parent().find("input").val();
    oldValue = (oldValue) ? oldValue : 0;
    if ($button.text() === "+") {
      var newVal = parseFloat(oldValue) + 1;
    } else {
      // Don't allow decrementing below zero
      if (oldValue > 0) {
        var newVal = parseFloat(oldValue) - 1;
      } else {
        newVal = 1;
      }
    }
    $button.parent().find("input").val(newVal);
  });


  function add_to_cart(btn) {
    var prd = $(btn).closest('div[prd-id]');
    var prd_id = $(prd).attr('prd-id');
    $('#add_to_cat_form').find('[name=product_id]').val(prd_id);
    $('form#add_to_cat_form').submit();
  }
</script>

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
