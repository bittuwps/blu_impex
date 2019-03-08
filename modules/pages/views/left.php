<div class="left_sidebar">
  	<div class="left_title">Our Products</div> 
  	<ul>
    	<?php
    		$left = $this->db->query("SELECT * FROM wl_categories WHERE status = '1' AND parent_id = '1' ORDER BY sort_order limit 0,10")->result_array();
    		foreach ($left as $result) {
      			?>
					<li>
						<a href="<?php echo site_url($result['friendly_url']); ?>" title="<?php echo $result['category_name']; ?>">
							<?php echo $result['category_name']; ?>
						</a>
					</li>
				<?php 
			} 
		?>
  	</ul>
</div>
