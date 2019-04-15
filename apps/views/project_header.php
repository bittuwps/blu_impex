<?php
	$res = $this->db->query("SELECT * FROM wl_categories WHERE status = '1' AND parent_id = '0' ORDER BY sort_order limit 0,10")->result_array();
	$catRes = $res;
	$fieldType = $this->session->userdata('field_type');
?>
<!--<link rel="stylesheet" href="<?php //echo theme_url();  ?>developers/css/proj.css">-->

<body>
	<a id="scroll-up" title="Go to Top"><i class="fa fa-angle-up"></i></a>
	<header class="header">
		<section class="top-menu">
			<div class="container">
				<div class="row">
					<div class="col-lg-5 col-sm-offset-3 col-md-offset-3 col-lg-offset-2">
						<div class="top_left">
							<ul>
								<li><a href="javascript:void()"><i class="fa fa-volume-control-phone"></i> <?= $this->admin_info->phone ?></a></li>
								<li class="hidden-xs"><a href="javascript:void()"><i class="fa fa-clock-o"></i> Mon - Sat at 8:00AM to
										9:00PM</a></li>
							</ul>
						</div>
					</div>

					<div class="col-lg-5 hidden-sm hidden-xs">
						<div class="top_right">
							<div class="col-lg-8">
								<form class="search-form hidden-xs hidden-sm" method="get" action="">
									<input class="search-input" type="text" name="keyword" placeholder="Search here..." required="">
									<button type="submit" class="btn-search"><i class="fa fa-search"></i></button>
								</form>
							</div>

							<ul>
								<li><a href="https://www.facebook.com/BluImpexNewDelhi/"><i class="fa fa-facebook"></i></a></li>
								<li><a href="https://www.youtube.com/channel/UCHG644kPnZvV6Y43G2wYKDA/feed"><i class="fa fa-youtube"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</section>
		<div class=navigation_bar>
			<div class="container">
				<div class="row">
					<div class="col-lg-3 col-md-3 col-xs-9">
						<div class="logo">
							<a href="<?php echo site_url(); ?>" title="<?= $this->admin_info->site_name ?>"><img src="<?php echo theme_url(); ?>images/logo.png"
								 alt="<?= $this->admin_info->site_name ?>" title="<?= $this->admin_info->site_name ?>"></a>
						</div>
					</div>
					<div class="col-lg-9 col-md-9">
						<div class="navigation">
							<div class="navbar"><button><i class="fa fa-bars"></i></button></div>
							<div class="menu">
								<ul class="nav">
									<li <?php if ($this->router->fetch_class() == 'home') {echo 'class="active"';}?>><a href="<?= site_url() ?>"
										 title="Home">Home</a> </li>
									
									<?php
										if (is_array($res) && !empty($res)) {
											foreach ($res as $val) {
												?>
									<li <?php if ($this->router->fetch_class() == 'category') {echo 'class="active"';}?> class="cs-submenu"><a href="javascript:;;"
										 title="<?php echo $val['category_name']; ?>">
											<?php echo $val['category_name']; ?></a>
										<ul class="cs-dropdown">
											<?php
$res_sub = $this->db->query("SELECT * FROM wl_categories WHERE status = '1' AND parent_id = '" . $val['category_id'] . "' ORDER BY sort_order")->result_array();
        foreach ($res_sub as $sval) {?>
											<li class="cs-submenu"><a href="<?= site_url($sval['friendly_url']) ?>" title="<?php echo $sval['category_name']; ?>">
													<?php echo $sval['category_name']; ?> <i class="fa fa-angle-right hidden-xs hidden-sm"></i></a>
												<ul class="cs-dropdown">
													<?php
$res_subb = $this->db->query("SELECT * FROM wl_categories WHERE status = '1' AND parent_id = '" . $sval['category_id'] . "' ORDER BY sort_order")->result_array();
            foreach ($res_subb as $ssval) {?>
													<li><a href="<?= site_url($ssval['friendly_url']) ?>">
															<?php echo $ssval['category_name']; ?></a></li>
													<?php }?>
												</ul>
											</li>
											<?php }?>
										</ul>
									</li>
									<?php
}
}
?>
									<li <?php if (cur_url() == 'about-us') {echo 'class="active"';}?>><a href="<?= site_url().'about-us' ?>" title="About Us">
											About Us</a></li>
									<li <?php if (cur_url() == 'videos') {echo 'class="active"';}?>><a href="<?= base_url('videos') ?>" title="Videos">
											Videos</a></li>
									<!--<li <?php if (cur_url() == 'our-achievements') {echo 'class="active"';}?>><a href="<?php echo site_url(); ?>our-achievements.html" title="Our Achievements">Our Achievements</a></li>-->
									<li <?php if (cur_url() == 'blog') {echo 'class="active"';}?>><a href="<?= site_url().'blog' ?>" title="Blogs">Blogs</a></li>
									<li <?php if (cur_url() == 'contact-us') {echo 'class="active"';}?>><a href="<?= site_url().'contact-us' ?>" title="Contact Us">Contact
											Us</a></li>
									<li <?php if (cur_url() == 'sitemap') {echo 'class="active"';}?>><a href="<?= site_url().'sitemap' ?>" title="Sitemap">Sitemap</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>
	</header>
	<div class="clearfix"></div>