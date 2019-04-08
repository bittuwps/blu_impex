<?php



	$this->load->view("top_application");



	$fieldType = $this->session->userdata('field_type');

	$QryStringArr = array();  // To store all Query Variables so to move to other view;

	$QryStringArr = array_unique($QryStringArr);

	if (isset($this->meta_info['entity_id']) && $this->meta_info['entity_id'] != '') {

		$QryStringArr['category_id'] = $this->meta_info['entity_id'];

	}



	if ($this->input->get_post('size') != '') {

		$QryStringArr['size'] = implode(',', $this->input->get_post('size'));

	}

	

	if ($this->input->get_post('categoryId') != '') {

		$QryStringArr['categoryId'] = implode(',', $this->input->get_post('categoryId'));

	}

	

	if ($this->input->get_post('price') != '') {

		$QryStringArr['price'] = $this->input->get_post('price');

	}



	if ($this->input->get_post('color') != '') {

		$QryStringArr['color'] = implode(',', $this->input->get_post('color'));

	}



	if ($this->input->get_post('keyword') != '') {

		$QryStringArr['keyword'] = $this->input->get_post('keyword');

	}



	if ($this->input->get_post('product_for') != '') {

		$QryStringArr['product_for'] = $this->input->get_post('product_for');

	}

	if ($this->input->get_post('sort') != '') {

		$QryStringArr['sort'] = $this->input->get_post('sort');

	}

	

	if (is_array($cat_res) && !empty($cat_res)) {

		$mainImage = $cat_res['category_image'];

		$category_description=$cat_res['category_description'];

	} else {

		$mainImage = 'login/inner-bg.jpg';

	}

//trace($catleftRes);

?>

<section class="breadcrumb_section hidden-xs">

	<div class="container">

		<div class="row">

			<div class="col-lg-12">

				<ul class="breadcrumb">

					<li><a href="javascript:void()" title="Home">Home</a></li>

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

						<a href="" class="enqs<?php echo $cat_res['category_id'];?>" onclick="

							$('#catID').val('<?php echo $cat_res['category_id'];?>');

							$('.catName').html('<?php echo $cat_res['category_name'];?>');

							$('.catImg').attr('src',$('.mycatimg_<?php echo $cat_res['category_id'];?> ').attr('src'));

							$('.catDesc').html(`<?php echo strip_tags($cat_res['category_shortdescription']);?>`);"

						 data-toggle="modal" data-target="#productID" title="<?php echo $heading_title;?> <?= subdomain_name() ?>">

							<img src="<?php echo get_image('category', $mainImage, '400', '400', 'R'); ?>" title="<?php echo $heading_title;?> <?= subdomain_name() ?>"

							 alt="<?php echo $heading_title;?> <?= subdomain_name() ?>" class="img-responsive mycatimg_<?php echo $cat_res['category_id'];?>">

							<button class="details_en">Enquire Now</button>

						</a>

					</div>

					<?php echo $category_description;?>

				</div>

				

				<?php

					$prds = $this->db->query("SELECT * FROM wl_products WHERE status = '1' AND FIND_IN_SET(".$cat_res['category_id'].",category_links)")->result_array();

					if($prds){

						?>	

							<div class="more_product">

								<h4>Products </h4>

							</div>

							<?php
								foreach($prds as $k=>$r){
									?>
									<div class="col-lg-4">

										<div class="product_box_1">
											<a href="<?php echo site_url($r['friendly_url']); ?>" title="<?php echo $r['product_name']; ?> <?= subdomain_name() ?>">
												<div class="image3">
													<?php $img=$this->db->select('media')->from('wl_products_media')->where(['products_id'=>$r['products_id']])->get()->first_row(); ?>
													<img src="<?php echo get_image('products', @$img->media, '400', '400', 'R'); ?>" title="<?php echo $r['product_name']; ?> <?= subdomain_name() ?>" alt="<?php echo $r['product_name']; ?> <?= subdomain_name() ?>" class="img-responsive mycatimg_<?php echo $r['products_id'];?>" />
												</div>
											</a>

											<div class="product_describe">
												<h3>
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
							<?php
						}

				?>

			

			<script>

				function set_modal_data(data){

					$('#catID').val(data.id);

					$('.catName').html(data.name);

					$('.catImg').attr('src',$('.mycatimg_'+data.id).attr('src'));

					$('.catDesc').html(`data.desc`);

				}

				

			</script>



				<div class="more_product">

					<h4>You May Also Like These: </h4>

				</div>

				<div class="row">



					<?php

    					$cat_like = $this->db->query("SELECT * FROM wl_categories WHERE status = '1' AND parent_id = '$cat_res[parent_id]' AND category_id!= $cat_res[category_id] ORDER BY sort_order")->result_array();

    					foreach ($cat_like as $result) {

						  

						  ?>

							<div class="col-lg-4">

								<div class="product_box_1">

									<a href="<?php echo site_url($result['friendly_url']); ?>" title="<?php echo $result['category_name']; ?> <?= subdomain_name() ?>">

										<div class="image3">

											<img src="<?php echo get_image('category', $result['category_image'], '400', '400', 'R'); ?>" title="<?php echo $result['category_name']; ?> <?= subdomain_name() ?>"

											alt="<?php echo $result['category_name']; ?> <?= subdomain_name() ?>" class="img-responsive mycatimg_<?php echo $result['category_id'];?>">

										</div>

									</a>

									<div class="product_describe">

										<h3><a href="<?php echo site_url($result['friendly_url']); ?>" title="<?php echo $result['category_name']; ?> <?= subdomain_name() ?>">

												<?php echo $result['category_name']; ?></a></h3>

										<a class="read_more more_btn" href="<?php echo site_url($result['friendly_url']); ?>" title="<?php echo $result['category_name']; ?> <?= subdomain_name() ?>">Read

											More</a>

										<a class="read_more more_btn enqs<?php echo $result['category_id'];?>" href="javascript:void()" data-toggle="modal"

										data-target="#productID" title="<?php echo $result['category_name'];?> <?= subdomain_name() ?>" onclick="$('#catID').val('<?php echo $result['category_id'];?>');

											$('.catName').html('<?php echo $result['category_name'];?>');

											$('.catDesc').html(`<?php echo $result['category_shortdescription'];?>`);

											$('.catImg').attr('src',$('.mycatimg_<?php echo $result['category_id'];?> ').attr('src'));"

										data-toggle="modal" data-target="#productID" title="<?php echo $result['category_name'];?> <?= subdomain_name() ?>">Enquire

											Now</a>

									</div>



								</div>

							</div>

							<?php 

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







<?php $this->load->view("bottom_application"); ?>