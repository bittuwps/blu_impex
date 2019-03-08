<?php
	$this->load->view("top_application");
	$QryStringArr = array();  // To store all Query Variables so to move to other view;
	$QryStringArr = array_unique($QryStringArr);
	if (isset($this->meta_info['entity_id']) && $this->meta_info['entity_id'] != '') {
		$QryStringArr['category_id'] = $this->meta_info['entity_id'];
	}
	if ($this->input->get_post('keyword') != '') {
		$QryStringArr['keyword'] = $this->input->get_post('keyword');
	}
	if ($this->input->get_post('sort') != '') {
		$QryStringArr['sort'] = $this->input->get_post('sort');
	}
	$resleft=is_array($resleft) ? $resleft : array();
	$resleft = array_reverse($resleft);
?>

<section class="breadcrumb_section hidden-xs">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<ul class="breadcrumb">
					<li><a href="<?php echo site_url();?>" title="Home">Home</a></li>
					<li class="active">
						<?php echo $heading_title;?>
					</li>
				</ul>
			</div>
		</div>
	</div>
</section>
<section class="cat_section">
	<div class="container">
		<div class="row">
			<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12 col-lg-push-3 col-md-push-3">
				<div class="right_section">
					<h1>
						<?php echo $heading_title;?>
					</h1>
					<div class="details-image">
						<a href="javascript:void()" class="enqs<?php echo $maincat[0]['category_id'];?>" data-toggle="modal" data-target="#productID" title="<?php echo $heading_title;?>" 
							onclick="
								$('#catID').val('<?php echo $maincat[0]['category_id'];?>');
                      			$('.catName').html('<?php echo $maincat[0]['category_name'];?>');
            					$('.catDesc').html('<?php echo $maincat[0]['category_shortdescription'];?>');
            					$('.catImg').attr('src',$('.mycatimg_<?php echo $maincat[0]['category_id'];?> ').attr('src'));"
						>
							<?php if($maincat[0]['category_id']=='1') { ?>
								
								<img src="<?php echo get_image('category', $maincat[0]['category_image'], '400', '400', 'R'); ?>" alt="<?php echo $heading_title.subdomain_name(); ?>"
									title="<?php echo $heading_title.subdomain_name(); ?>" class="img-responsive mycatimg_<?php echo $maincat[0]['category_id'];?>">
							<?php } else {?>
								<img src="<?php echo get_image('category', $maincat[0]['category_image'], '400', '400', 'R'); ?>" alt="<?php echo $heading_title.subdomain_name(); ?> <?= subdomain_name() ?>" title="<?php echo $heading_title;?> <?= subdomain_name() ?>" class="img-responsive mycatimg_<?php echo $maincat[0]['category_id'];?>">
							<?php }?>

							<button class="details_en">Enquire Now</button>
						</a>
					</div>
					<?php echo $maincat[0]['category_description'];?>
				</div>
				<?php
        			if (is_array($res) && !empty($res)) {
						foreach ($res as $kl => $lval) {
							?>
							<div class="cat_items">
								<div class="col-sm-4 col-xs-12">
									<div class="product">
										<a href="<?php echo site_url($lval['friendly_url']); ?>" title="">
											<div class="image1">
												<img src="<?php echo get_image('category', $lval['category_image'], '360', '328', 'R'); ?>" title="<?php echo $lval['category_name'].subdomain_name(); ?>"
												alt="<?php echo $lval['category_name']; ?> <?= subdomain_name() ?>" class="img-responsive mycatimg_<?php echo $lval['category_id'];?>">
											</div>
										</a>
									</div>
								</div>
								<div class="col-sm-8 col-xs-12">
									<div class="right-content">
										<h3><a href="<?php echo site_url($lval['friendly_url']); ?>" title="<?php echo $lval['category_name']; ?>">
												<?php echo $lval['category_name']; ?></a></h3>
										<div class="blue-line1"></div>
										<p>
											<?php echo $lval['category_shortdescription']; ?>
										</p>
										<a href="<?php echo site_url($lval['friendly_url']); ?>" class="read_more cat_btn" title="">Read More <i class="fa fa-long-arrow-right fa-1x"></i></a>
										<a class="read_more cat_btn enqs<?php echo $lval['category_id'];?>" href="javascript:void()" data-toggle="modal"
											data-target="#productID" title="Enquire Now" 
											onclick="$('#catID').val('<?php echo $lval['category_id'];?>');
												$('.catName').html('<?php echo $lval['category_name'];?>');
												$('.catDesc').html('<?php echo $lval['category_shortdescription'];?>');
												$('.catImg').attr('src',$('.mycatimg_<?php echo $lval['category_id'];?> ').attr('src'));"
										>	
											Enquire Now
										</a>
									</div>
								</div>
							</div>
							<?php
						} 
					}
                ?>
			</div>
			<div class="col-md-3 col-md-pull-9">
				<?php $this->load->view('pages/enquiry'); ?>
				<?php $this->load->view('pages/left'); ?>

			</div>
		</div>
	</div>
</section>



<?php $this->load->view("bottom_application"); ?>