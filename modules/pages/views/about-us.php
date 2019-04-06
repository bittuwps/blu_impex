<?php
$this->load->view('top_application');
?>

<section class="inner_header" style="background-image:url('<?php echo theme_url(); ?>images/about/about.jpg')" alt=""
	title="">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 text-center">
				<div class="cat_title">
					<?php echo $content['page_name']; ?>
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
					<li><a href="javascript:void()" title="Home">Home</a></li>
					<li class="active">
						<?php echo $content['page_name']; ?>
					</li>
				</ul>
			</div>
		</div>
	</div>
</section>
<section class="featured-section">
	<div class="container">
		<div class="auto-container">
			<div class="row clearfix">

				<!--Content Column-->
				<div class="content-column col-md-12 col-sm-12 col-xs-12">
					<div class="inner-column">
						<div class="sec-title">
							<div class="title">Welcome to</div>
							<h2><span class="theme_color">Blue</span> Impex</h2>
						</div>
						<div class="col-md-5 col-sm-12 hidden-xs pull-right" style="">
							<div class="row">
								<div class="inner-column">
									<div class="video-box">
										<figure class="image">
											<img src="<?=theme_url()?>images/ab.jpg" alt="">
										</figure>
									</div>
								</div>
							</div>
						</div>

						<div class="text">
							<?= $content['page_description'] ?>
							<h2>Basic Information</h2>
							<table class="table table-striped table-dark" width="1095" height="179">
								<tbody>
									<tr>
										<td>1</td>
										<td>CEO</td>
										<td><span>---------</span></td>
									</tr>
									<tr>
										<td>2</td>
										<td>Company Name</td>
										<td><span>Blue Impex</span></td>
									</tr>
									<tr>
										<td>3</td>
										<td>Year of Establishment</td>
										<td><span>0000</span></td>
									</tr>
									<tr>
										<td>4</td>
										<td>Experience</td>
										<td>-----</td>
									</tr>
									<tr>
										<td>5</td>
										<td>Nature of Business</td>
										<td><span>---------- </span></td>
									</tr>
									<tr>
										<td>6</td>
										<td>Turnover</td>
										<td>-----------</td>
									</tr>
									<tr>
										<td>7</td>
										<td>Email Id</td>
										<td><span>---------</span></td>
									</tr>
									<tr>
										<td>8</td>
										<td>GST No</td>
										<td><span>-----</span></td>
									</tr>
								</tbody>
							</table>
						</div>
						<!-- <a href="" class="theme-btn btn-style-four">Contact Us</a>-->
					</div>
				</div>

				<!--Video Column-->


			</div>
		</div>
	</div>
</section>

<div class="clearfix"></div>
<div class="process-boxed">
	<div class="container">
		<div class="row clearfix">

			<!--Process Block-->
			<div class="process-block col-lg-3 col-md-3 col-sm-6 col-xs-12">
				<div class="inner-box">
					<div class="upper-box">
						<div class="icon-box">
							<span class="icon "><img src="<?=theme_url()?>images/all-brands-js.png"></span>
							<div class="block-number">1</div>
						</div>
					</div>
					<div class="lower-box">
						<h4><a href="#">All Brands</a></h4>
					</div>
				</div>
			</div>

			<!--Process Block-->
			<div class="process-block col-lg-3 col-md-3  col-sm-6 col-xs-12">
				<div class="inner-box">
					<div class="upper-box">
						<div class="icon-box">
							<span class="icon "><img src="<?=theme_url()?>images/free-support-js.png"></span>
							<div class="block-number">2</div>
						</div>
					</div>
					<div class="lower-box">
						<h4><a href="#">Free Support</a></h4>
					</div>
				</div>
			</div>

			<!--Process Block-->
			<div class="process-block col-lg-3 col-md-3  col-sm-6 col-xs-12">
				<div class="inner-box">
					<div class="upper-box">
						<div class="icon-box">
							<span class="icon "><img src="<?=theme_url()?>images/dealership-js.png"></span>
							<div class="block-number">3</div>
						</div>
					</div>
					<div class="lower-box">
						<h4><a href="#">Dealership</a></h4>
					</div>
				</div>
			</div>

			<!--Process Block-->
			<div class="process-block col-lg-3 col-md-3  col-sm-6 col-xs-12">
				<div class="inner-box">
					<div class="upper-box">
						<div class="icon-box">
							<span class="icon "><img src="<?=theme_url()?>images/afordable-js.png"></span>
							<div class="block-number">4</div>
						</div>
					</div>
					<div class="lower-box">
						<h4><a href="#">Affordable</a></h4>
					</div>
				</div>
			</div>


		</div>

	</div>
</div>


<?php $this->load->view('bottom_application');?>