<?php
	$this->load->view('top_application');
	$fieldType = $this->session->userdata('field_type');
	$mediaRes = $media_res;
	$overall_rating_product = product_overall_rating($res['products_id'], 'product');
	error_message('alert');
?>
<link rel="stylesheet" type="text/css" href="<?php echo theme_url(); ?>css/xzoom.css">


	<!-- <div class="inner-img-bg"> 
		<img src="<?php echo theme_url(); ?>img/slider/inner-bg.jpg" title="Product Details" alt="Product Details">
		<div class="inner-breadcrum">
			<ul>
			<li><a href="<?php echo site_url(); ?>" title="Home">Home</a></li>/
			<li>Product Details</li>
			</ul>
		</div>
	</div> -->
	<div class="clearfix"></div>
	<!-- ======inner-pages========-->

	<div class="inner-pages-section" style="margin-top: 20px;">
		<div class="container">
			<div class="row">
				<div class="col-sm-6 col-md-7"> 
					<div class="details-zoom-product">                    
						<div class="app-figure" id="zoom-fig">
							<a id="Zoom-1" class="MagicZoom" title="Show your product in stunning detail with Magic Zoom Plus." href="<?php echo get_image('product_images', $res['media'], '', '', 'R'); ?>" data-options="zoomWidth:500px; zoomHeight:500px">        
								<img src="<?php echo get_image('product_images', $res['media'], '493', '493', 'R'); ?>?scale.height=400"  alt=""/>
							</a>
							<div class="selectors">
								<?php foreach ($mediaRes as $mkey => $mval) { ?>  
									<a data-zoom-id="Zoom-1" href="<?php echo get_image('product_images', $mval['media'], '', '', 'R'); ?>" data-image="<?php echo get_image('product_images', $mval['media'], '493', '493', 'R'); ?>?scale.height=400">
										<img srcset="<?php echo get_image('product_images', $mval['media'], '80', '155', 'R'); ?>?scale.width=112 2x" src="<?php echo get_image('product_images', $mval['media'], '80', '155', 'R'); ?>?scale.width=56"/>
									</a>
								<?php } ?>           
							</div>            
						</div>        
					</div> 
				</div> 


				<div class="col-sm-6 col-md-5">          
					<div class="product-details-content ml-70">
						<h2><?= $res['product_name'] ?></h2>
					</div>
					<div class="row">
						<div class="col-md-12">
							<p><?= $res['products_description'] ?></p>
						</div>
					</div>
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

<div class="related_product">
  	<div class="container">
		<div class="related_product text-center">
			<h2>Related Products</h2>
		</div>

		<div class="row">
			<?php
				foreach($related as $k=>$r){
					?>
						<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
							<div class="product_box_1">
								<a href="<?php echo site_url($r['friendly_url']); ?>" title="<?php echo $r['product_name']; ?> <?= subdomain_name() ?>">
									<div class="image3">
										<?php $img=$this->db->select('media')->from('wl_products_media')->where(['products_id'=>$r['products_id']])->get()->first_row(); ?>
										<img src="<?php echo get_image('products', @$img->media, '350', '300', 'R'); ?>" title="<?php echo $r['product_name']; ?> <?= subdomain_name() ?>" alt="<?php echo $r['product_name']; ?> <?= subdomain_name() ?>" class="img-responsive mycatimg_<?php echo $r['products_id'];?>" />
									</div>
								</a>

								<div class="product_describe">
									<h3 style="margin-bottom: 0px;">
										<a href="<?php echo site_url($r['friendly_url']); ?>" title="<?php echo $r['product_name']; ?> <?= subdomain_name() ?>"><?php echo $r['product_name']; ?></a>
									</h3>

									<a class="read_more more_btn" href="<?php echo site_url($r['friendly_url']); ?>" title="<?php echo $r['product_name']; ?> <?= subdomain_name() ?>">Read More</a>
									<?php 
										$modal_data=array('id'=>$r['products_id'], 'name'=>$r['product_name'], 'desc'=>str_short(strip_tags($r['products_description']),250));
									?>
									<a href="javascript:;;" class="read_more more_btn enqs<?php echo $r['products_id'];?>" data-target="#productID" title="<?php echo $r['product_name'];?> <?= subdomain_name() ?>" onclick="$('#catID').val('<?php echo $r['products_id'];?>');
										$('.catName').html('<?php echo $r['product_name'];?>');
										$('.catImg').attr('src',$('.mycatimg_<?php echo $r['products_id'];?> ').attr('src'));
										$('.catDesc').html(`<?php echo strip_tags($r['products_description']);?>`);"
										data-toggle="modal" data-target="#productID" >Enquire Now
									</a>

								</div>

							</div>
						</div>
					<?php
				}
			?>
		</div>
  	</div>
</div>
  



<?php $this->load->view("bottom_application"); ?>

<link href="<?php echo theme_url(); ?>magiczoomplus/magiczoomplus.css" rel="stylesheet"  />
<link href="<?php echo theme_url(); ?>magiczoomplus/magiczoomplus-inline.css" rel="stylesheet" />
<script src="<?php echo theme_url(); ?>magiczoomplus/magiczoomplus.js" ></script>


<script>
	$(function () {
		$("#datepicker").datepicker({
			changeMonth: true,
			changeYear: true
		});
	}); <
	/script> <
	script type = "text/javascript" >
		$(document).ready(function () {
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
	} <
	/script> <
	script src = "assets/designer/themes/default/js/magiczoomplus.js" > < /script> <
		script >
		$(function () {
			$("#datepicker").datepicker({
				changeMonth: true,
				changeYear: true
			});
		}); <
	/script> <
	script type = "text/javascript" >
		$(document).ready(function () {
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
		$.post("<?php echo base_url('products/post_review'); ?>", {
			email: $("#email").val(),
			name: $("#name").val(),
			rating: $('#ads_rating').val(),
			reviews: $("#comment").val(),
			products_id: '<?php echo $res['products_id']; ?>'
		}, function (data) {
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
