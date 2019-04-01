<?php
	$this->load->view('top_application');
	$cat_res = $this->db->query("SELECT *, ( SELECT COUNT(category_id) FROM wl_categories AS b WHERE b.parent_id=a.category_id ) AS total_subcategories FROM (`wl_categories` as a) WHERE `status` !='2' AND parent_id = '0' AND status='1' ORDER BY `sort_order` asc LIMIT 15 ")->result_array();
?>
<div class="mob_hider"></div>
<!-- HEADER ENDS -->

<section class="breadcrumb_section hidden-xs">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<ul class="breadcrumb">
					<li><a href="<?php echo site_url(); ?>">
							<?php echo ($this->session->userdata('lang') == 'p')?$this->lang->line('home'):'Home';?>
						</a></li>
					<li class="active"><?php echo ($this->session->userdata('lang') == 'p')?$this->lang->line('contactus'):'Market Area';?></li>
				</ul>
			</div>
		</div>
	</div>
</section>
<section class="market_area">
    <div class="container">
			<h1>Market Area</h1>
			<h2>Indian States</h2>
			<ul class="market-list">
				<?php
      				foreach ($state as $rows) {
        				?>
							<li>
								<a href="<?php echo site_url($rows['temp_title']); ?>">
								<?php echo $rows['title']; ?></a></li>
						<?php
      				}
      			?>
			</ul>


<h3>Indian Cities</h3>
			<ul class="market_city">				
				<?php
        			foreach ($state as $rows) {
         	 			$city = $this->db->query("SELECT id, state_id, title, temp_title, status FROM tbl_city WHERE status ='1' AND state_id = '" . $rows['id'] . "'")->result_array();
          				?>
          				
						<li>
							<h3 class="mt25"> <?php echo $rows['title']; ?> </h3>

							<ul class="market-list">
								<?php
									foreach ($city as $rows_city) {
										?>
											<li><a href="<?php echo site_url($rows_city['temp_title']); ?>">
											<?php echo $rows_city['title']; ?></a></li>
										<?php
									}
								?>
								<div class="cb"></div>
							</ul>
						</li>
						<?php
					}
				?>
			</ul>			
		</div>
	</section>

<section class="wrapper pt15  bt1 mid_banner_cont">
	<?php getBrand(); ?>
</section>
<!--content section-->
<?php $this->load->view('bottom_application'); ?>