<?php

	$this->load->view("top_application"); 

	$fieldType = $this->session->userdata('field_type');

?>

<section class="inner_header" style="background-image:url(designer/images/blog/blog.jpg)" alt="" title="">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 text-center">
				<div class="cat_title">
					Blog
				</div>
				<div class="clearfix"></div>
				<div class="cat_title2">
					Scientific & Technological Equipment Corporation.
				</div>
			</div>
		</div>
	</div>
</section>

<section class="breadcrumb_section hidden-xs">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<ul class="breadcrumb">
					<li>
						<a href="<?php echo site_url(); ?>" title="Return to Home">
							<?php echo ($this->session->userdata('lang') == 'p')?$this->lang->line('home'):'Home';?>
						</a>
					</li>
					<li class='active'>
						<?php echo ($this->session->userdata('lang') == 'p')?$this->lang->line('blog'):'Blog';?>
					</li>
				</ul>
			</div>
		</div>
	</div>
</section>

<!-- /.breadcrumb -->

<section class="cat_section">

	<div class="container">
		<div class="row">
			<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12 col-lg-push-3 col-md-push-3">
				<div class="right_section">
					<h1>Blog</h1>
					<?php 
						if (is_array($res) && !empty($res)) {
            				foreach ($res as $key => $val) {
              				?>

								<div class="blog-post">
									<div class="wt-post-media">
										<a href="javascript:void(0)">
											<img src="<?php echo get_image('blog', $val['article_image'], '960', '400', 'R'); ?>"
												alt="<?php echo $val['article_title'];?>" title="<?php echo $val['article_title'];?>">
										</a>
									</div>
									<div class="wt-post-info">
										<ul>
											<li>
												<strong><i class="fa fa-calendar-o"></i>
												<?php echo $val['post_date']; ?></strong>
											</li>
											<li>
												<a href="<?php echo site_url($val['friendly_url']); ?>">
												<i class="fa fa-user"></i> By
												<?php echo $val['blog_author']; ?></a>
											</li>
										</ul>
										<div class="wt-post-text">
											<h3>
												<a href="<?php echo site_url($val['friendly_url']); ?>">
													<?php echo $val['article_title'];?>
												</a>
											</h3>
											<p>
												<?php echo $val['short_desc'];?>
											</p>
										</div>
										<a href="<?php echo site_url($val['friendly_url']); ?>" class="read_more cat_btn">Read More</a>
									</div>
								</div>

							<?php 
							}
						}
					?>
				</div>
			</div>

			<div class="col-md-3 col-md-pull-9">
				<?php $this->load->view('pages/enquiry');?>
				<?php $this->load->view('pages/left');?>
			</div>
		</div>
	</div>
</section>

<!-- ============================================================= FOOTER ============================================================= -->

<?php $this->load->view("bottom_application"); ?>