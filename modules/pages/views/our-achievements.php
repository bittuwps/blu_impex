<?php
$this->load->view('top_application'); 
?>

<section class="inner_header" style="background-image:url(<?php echo theme_url();?>images/achievements/our-achievements.jpg)">
<div class="container">
<div class="row">
<div class="col-lg-12 text-center">
<div class="cat_title">
<?php echo $content['page_name'];?>
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
<li><a href="<?php echo site_url();?>" title="Home">Home</a></li>
<li class="active"><?php echo $content['page_name'];?></li>
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
<h1><?php echo $content['page_name'];?></h1>
<?php echo $content['page_description'];?>


<div class="row">
<div class="col-lg-6 col-md-6">
<div class="product_box_1">
<a class="fancybox" data-fancybox-group="gallery" href="designer/images/about/certificate.jpg">
<div class="image08">
<img class="img-responsive" width="100%" src="designer/images/about/certificate.jpg" alt="Global Excellence Award 2018">
</div>
<h2 class="text-center">Certificate of Registration</h2>
</a>
</div>
</div>

<div class="col-lg-6 col-md-6">
<div class="product_box_1">
<a class="fancybox" data-fancybox-group="gallery" href="designer/images/about/certificate.jpg">
<div class="image08">
<img class="img-responsive" width="100%" src="designer/images/about/certificate.jpg" alt="Global Excellence Award 2018">
</div>
<h2 class="text-center">Certificate of Registration</h2>
</a>
</div>
</div>


</div>
                    
                    

</div>


</div>


<div class="col-md-3 col-md-pull-9">
<?php $this->load->view('enquiry'); ?> 
<?php $this->load->view('pages/left'); ?>     
</div>
</div>
</div>
</section>


<?php $this->load->view('bottom_application'); ?>
