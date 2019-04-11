<?php
	$this->load->view('top_application');
	$fieldType = $this->session->userdata('field_type');
?>

<?php
	$cats = $this->db->query("SELECT * FROM wl_categories WHERE status = '1' AND parent_id = '0' ORDER BY sort_order limit 0,10")->result_array();
	foreach($cats as $k=>$r){
		$cats[$k]['s_cat']=$this->db->query("SELECT * FROM wl_categories WHERE status = '1' AND parent_id = '".$r['category_id']."' ORDER BY sort_order limit 0,10")->result_array();
		foreach($cats[$k]['s_cat'] as $s_k=>$s_r){
			$cats[$k]['s_cat'][$s_k]['s_cat']=$this->db->query("SELECT * FROM wl_categories WHERE status = '1' AND parent_id = '".$s_r['category_id']."' ORDER BY sort_order limit 0,10")->result_array();
		}
	}
?>

<section class="preview-2">
	<div id="home_slider" class="slides nivoSlider">
		<?php foreach($banner as $ban_image){
			?>
				<img src="<?php echo get_image('banner', $ban_image['banner_image'], '1600', '600', 'R'); ?>" alt="<?php echo $ban_image['ban_title'];?>" />
			<?php 
			} 
		?>
	</div>
</section>

<section class="fetures">

	<div class="container">

		<div class="row">

			<div class="col-sm-3 col-md-3 col-lg-3 wow fadeInLeft animated" data-wow-delay=".1s">

				<div class="wcu-item">

					<div class="c-item wcu-item-inner">

						<i class="fa fa-building"></i>

						<div class="feture_title">Warehousing and Packaging</div>

						<p><?= $this->admin_info->site_name ?></p>

					</div>

				</div>

			</div>



			<div class="col-sm-3 col-md-3 col-lg-3 wow fadeInDown animated" data-wow-delay=".2s">

				<div class="wcu-item">

					<div class="wcu-item-inner">

						<i class="fa fa-database"></i>

						<div class="feture_title">Vendor Base</div>

						<p>Relationships with The Best Vendors</p>

					</div>

				</div>

			</div>

			<div class="col-sm-3 col-md-3 col-lg-3 wow fadeInDown animated" data-wow-delay=".3s">

				<div class="wcu-item">

					<div class="wcu-item-inner">

						<i class="fa fa-thumbs-up"></i>

						<div class="feture_title">Quality Assurance</div>

						<p>High Priority to Quality Products </p>

					</div>

				</div>

			</div>

			<div class="col-sm-3 col-md-3 col-lg-3 wow fadeInRight animated" data-wow-delay=".4s">

				<div class="wcu-item">

					<div class="wcu-item-inner">

						<i class="fa fa-search"></i>

						<div class="feture_title">Research & Development</div>

						<p>Build a Loyal Base of Customers</p>

					</div>

				</div>

			</div>

		</div>

	</div>

</section>

<section id="about" class="about_us no-padding">



	<div class="half-section">

		<div class="container-fluid">

			<div class="row">

				<div class="col-md-6 no-padding wow fadeInLeft animated" data-wow-delay=".2s">

					<div class="about-image hover-effect">

						<img alt="" src="<?php echo theme_url(); ?>images/home/about/non-woven-bag-making-machine.jpg" class="equalheight" alt="<?= $this->admin_info->site_name ?>"

						 title="<?= $this->admin_info->site_name ?>">

					</div>

				</div>

				<div class="col-md-6 sm-padding-50px-tb wow fadeInRight animated" data-wow-delay=".3s">

					<div class="split-box text-center center-block equalheight" style="height: 451.984px;">

						<div class="about-box">

							<h1>Welcome to <span><?= $this->admin_info->site_name ?></span></h1>

							<?php echo $home_res[0]['page_description'];?>

							<a href="<?= site_url().'about-us' ?>" class="read_more" title="Read More">Read More</a>

						</div>

					</div>

				</div>

			</div>

		</div>

	</div>

	<div class="half-section">

		<div class="container-fluid">

			<div class="row">

				<div class="col-md-6 no-padding pull-right sm-float-none wow fadeInRight animated" data-wow-delay=".4s">

					<div class="about-image hover-effect">

						<img alt="" src="<?php echo theme_url(); ?>images/home/about/blu-impex-home.jpg" class="equalheight" alt="<?= $this->admin_info->site_name ?>"

						 title="<?= $this->admin_info->site_name ?>">

					</div>

				</div>

				<div class="col-md-6 sm-padding-50px-tb wow fadeInLeft animated" data-wow-delay=".5s">

					<div class="split-box text-center center-block equalheight" style="height: 470.984px;">

						<div class="about-box">

							<h1>Why <span>Us?</span></h1>

							<p><span style="font-size: 11pt;"><strong>Quality- Our Foundation</strong></span></p>
							<p><span style="font-weight: 400; font-size: 11pt;">We have stabilized ourselves as an outstanding name in the sphere of modern process technologies equipment &amp; plant. In order to keep pace with modern technology and the fast-moving tech world, we have strengthened our work strategies and have brought the best machines in the vast Indian and overseas markets. </span></p>
							<p><span style="font-size: 11pt;"><strong>Machines, Manufactured by Trained Professionals</strong></span></p>
							<p><span style="font-weight: 400; font-size: 11pt;">The offered products are manufactured by our trained professionals using high-quality raw materials and advanced technology in line with set industry standards. These products are known for their features like perfect finish, low maintenance, easy to operate, excellent functionality, and long working life. </span></p>
							<p><span style="font-size: 11pt;"><strong>Available in Umtpeen Choices</strong></span></p>
							<p><span style="font-weight: 400; font-size: 11pt;">The machines are available in a myriad of specifications from which our clients can choose as per their requirements. Our offered products are stringently checked by our quality connoisseurs against different quality parameters. The entire work is supervised by our team members who have rich knowledge and wide exposure in the domain.</span></p>

						</div>

					</div>

				</div>

			</div>

		</div>

	</div>

</section>



<section class="popular_section">
	<div class="container">
		<div class="row">
			<div class="col-12 wow fadeInLeft animated" data-wow-delay=".1s">
				<div class="title text-center">
					<h2>Our <span>Products</span></h2>
				</div>
			</div>

			<div class="col-12">

				<div id="service_item">
					<?php 
					foreach ($new_pro as $result)
					{?>

					<div class="item wow fadeInDown animated" data-wow-delay=".2s">
						<div class="product-box common-cart-box">
							<div class="product-img common-cart-img">
								<div class="image13">
									<a href="<?= site_url($result['friendly_url']);?>" title="<?php echo $result['category_name'];?>">
										<img src="<?php echo get_image('category', $result['category_image'], '300', '300', 'R'); ?>" alt="<?php echo $result['category_name'];?>" title="<?php echo $result['category_name'].subdomain_name();?>">
									</a>
								</div>

							</div>

							<div class="product-info common-cart-info text-center">
								<h2><a class="cart-name" href="<?= site_url($result['friendly_url']);?>" title="<?php echo $result['category_name'].subdomain_name();?>">
										<?php echo $result['category_name'];?> </a></h2>

								<a class="read_btn" href="<?= site_url($result['friendly_url']);?>" title="<?php echo $result['category_name'].subdomain_name();?>">View
									More</a>
							</div>
						</div>
					</div>
					<?php }?>

				</div>
			</div>
		</div>
	</div>
</section>

<section class="popular_section">
	<div class="container">
		<div class="row">
			<div class="col-12 wow fadeInLeft animated" data-wow-delay=".1s">
				<div class="title text-center">
					<h2>Our <span>Product's Videos</span></h2>
				</div>
			</div>

			<div class="col-12">

				<div id="service_item">
					<?php 
					$videos = $this->db->select('*')->from('wl_videos')->where(['status'=>'1'])->limit(12)->get()->result_array();
					foreach ($videos as $r)
					{?>
					<div class="item wow fadeInDown animated col-md-3 p-0" data-wow-delay=".2s">
						<div class="product-box common-cart-box">
							<div class="product-img common-cart-img">
								<div class="image13">
									<iframe width="100%" height="250px"
										src="<?= $r['link'] ?>">
									</iframe>
								</div>

							</div>

							<div class="product-info common-cart-info text-center">
								<h2><a class="cart-name" href="<?= base_url() ?>" title="<?php echo $r['title'];?>">
										<?php echo $r['title'];?> </a></h2>

								<a class="read_btn" href="<?= base_url('videos') ?>" title="<?php echo $r['title'];?>">View
									More</a>
							</div>
						</div>
					</div>



					<?php }?>

				</div>
			</div>
		</div>
	</div>
</section>





<section class="request_call">

	<div class="container">

		<div class="row">

			<div class="col-lg-6  col-md-6 hidden-xs wow fadeInLeft animated animated" data-wow-delay=".2s">

				<img class="ming" src="<?php echo theme_url(); ?>images/home/player-img.png">

			</div>

			<div class="col-lg-6 col-md-6">

				<div class="red-sec-heading wow fadeInRight animated animated" data-wow-delay=".3s">

					<h3>REQUEST A <span>CALL BACK</span></h3>

					<p>If you need to speak to us about a query fill in the form below and we will call you back within the same

						working day.</p>

					<?php $this->load->view('pages/form');?>

				</div>

			</div>

		</div>

	</div>

</section>



<!--<div class="certificate">

				<div class="container">

					<div class="row">

						<div class="col-md-5 wow fadeInLeft animated animated" data-wow-delay=".1s">

							<div class="certificate_img">

								<img src="<?php echo theme_url(); ?>images/home/certificate.jpg" class="img-responsive" alt="certificate">

								

							</div>

						</div>

						<div class="col-md-7">

						<div class="wow fadeInRight animated animated" data-wow-delay=".2s">

							<div class="section-title-md">

								<h2>RECOGNIZED <span>QUALITY</span></h2>

							</div>

							<p>We persistently follow nationally and internationally recognized quality standards and technical specifications. At our quality department, we have all the requisite tools, equipments, and technologies to help us ascertain the quality of our products.</p>

							<p>We take utmost care and ensure that our production process right from checking of raw materials to final shipment of our consignments confirm to industrial standards and norms.</p>

							</div>

							<div class="recognized_quality wow fadeInRight animated animated" data-wow-delay=".3s">

								<div class="recognized_thumb">

									<img src="designer/images/home/marketing-research.jpg" class="img-responsive" alt="">

								</div>

								<div class="recognized_dec">

									<h4>MARKETING <span>RESEARCH</span></h4>

										<p>It is a long established fact that a reader will be distracted by the readable content of a page when using Lorem Ipsum is that it has a more-or-less normal distribution of letters.</p>

								</div>

							</div>

							

							<div class="recognized_quality wow fadeInRight animated animated" data-wow-delay=".4s">

								<div class="recognized_thumb">

									<img src="designer/images/home/environment-&-efficiency.jpg" class="img-responsive" alt="">

								</div>

								<div class="recognized_dec">

									<h4>ENVIRONMENT & <span>EFFICIENCY</span></h4>

										<p>It is a long established fact that a reader will be distracted by the readable content of a page when using Lorem Ipsum is that it has a more-or-less normal distribution of letters.</p>

								</div>

							</div>

							

							

						</div>

					</div>

				</div>

			</div>-->

<div class="blog-area pt-120 pb-90">

	<div class="container">

		<div class="section-info text-center wow fadeInDown animated" data-wow-delay=".1s">

			<h2>Latest <span>Blog</span></h2>

		</div>

		<div class="row">

			<?php 

				foreach ($blog as $blogs){

					?>

					<div class="col-md-4 col-sm-6 wow fadeInDown animated" data-wow-delay=".2s">

						<div class="blog-wrapper mb-30">

							<div class="blog-img">

								<a href="javascript:void()"><img src="<?php echo get_image('blog', $blogs['article_image'], '669', '446', 'R'); ?>"

									alt="<?php echo $blogs['article_title'];?>" title="<?php echo $blogs['article_title'];?>"></a>

							</div>

							<div class="blog-contents">

								<div class="blog-title">

									<h3><a href="javascript:void()">

											<?php echo $blogs['article_title'];?></a></h3>

									<p>

										<?php echo $blogs['short_desc'];?>

									</p>

								</div>

								<div class="blog-date">

									<span class="comment"><i class="fa fa-clock-o"></i>

										<?php echo $blogs['post_date']; ?></span>

									<a href="<?= $blogs['friendly_url'] ?>" class="read_btn pull-right">Read More</a>

								</div>

							</div>

						</div>

					</div>

					<?php 

				}

			?>

		</div>

	</div>

</div>

<?php $this->load->view('bottom_application'); ?>