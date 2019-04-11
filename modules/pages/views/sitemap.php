<?php 

$this->load->view('top_application');

$cat_res = $this->db->query("SELECT *, ( SELECT COUNT(category_id) FROM wl_categories AS b WHERE b.parent_id=a.category_id ) AS total_subcategories FROM (`wl_categories` as a) WHERE `status` !='2' AND parent_id = '0' AND status='1' ORDER BY `sort_order` asc LIMIT 15 ")->result_array();

?>

	

<section class="inner_header" style="background-image:url(<?php echo theme_url();?>images/sitemap/sitemap.jpg)">

<div class="container">

<div class="row">

<div class="col-lg-12 text-center">

<div class="cat_title">

Sitemap

</div>

<div class="clearfix"></div>


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

<li class="active"><?php echo $title;?></li>

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

<h1><?php echo $title;?></h1>

<ul class="sitemap">

<li><a href="<?php echo site_url();?>" title="Home">Home</a> </li>

<li><a href="<?php echo site_url();?>about-us.html" title="About Us"> About Us</a></li>

<?php

foreach($cat_res as $val)

{?>

<li><a href="<?php echo site_url($val['friendly_url']);?>" title="<?php echo $val['category_name'];?>"><?php echo $val['category_name'];?></a> 

<ul>

    <?php

 $res_sub  = $this->db->query("SELECT * FROM wl_categories WHERE status = '1' AND parent_id = '" . $val['category_id'] . "' ORDER BY sort_order")->result_array(); 

       foreach($res_sub as $sval) 

       {?>

<li><a href="<?php echo site_url($sval['friendly_url']);?>" title="<?php echo $sval['category_name'];?>"><?php echo $sval['category_name'];?></a>

<ul>

    <?php

 $res_subsub  = $this->db->query("SELECT * FROM wl_categories WHERE status = '1' AND parent_id = '" . $sval['category_id'] . "' ORDER BY sort_order")->result_array(); 

       foreach($res_subsub as $ssval) 

       {?>

<li><a href="<?php echo site_url($ssval['friendly_url']);?>"><?php echo $ssval['category_name'];?></a></li><?php }?>

</ul>

</li>

    <?php }?>

</ul>

</li>

<?php }?>

<li><a href="<?php echo site_url();?>our-achievements.html" title="Our Achievements">Our Achievements</a></li>

<li><a href="javascript:void()" title="Blog">Blog</a></li>

<li><a href="<?php echo site_url();?>contact-us.html" title="Contact Us">Contact Us</a></li>

<li><a href="<?php echo site_url();?>sitemap.html" title="Sitemap">Sitemap</a></li>

</ul>

</div>





</div>





<div class="col-md-3 col-md-pull-9">

<?php $this->load->view('enquiry');?>

<?php $this->load->view('left');?> 

</div>

</div>

</div>

</section>



<?php $this->load->view('bottom_application'); ?>