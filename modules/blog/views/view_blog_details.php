<?php
$this->load->view("top_application");
$fieldType = $this->session->userdata('field_type');
?>
<section class="inner_header" style="background-image:url(<?php echo theme_url();?>images/blog/blog.jpg)">
<div class="container">
<div class="row">
<div class="col-lg-12 text-center">
<div class="cat_title">
<?php echo $res['article_title'];?>
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
<li><a href="<?php echo site_url();?>blog.html" title="Blog">Blog</a></li>
<li class="active"><?php echo $res['article_title'];?></li>
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
<h1>Cement Autoclave Testing Equipment Uses and Features</h1>
<div class="blog-post">
<div class="wt-post-media">
<img src="<?php echo get_image('blog', $res['article_image'], '807', '417', 'R'); ?>" alt="<?php echo $res['article_title'];?>" title="<?php echo $res['article_title'];?>">
</div>
<div class="wt-post-info">
<ul>
<li><strong><i class="fa fa-calendar-o"></i> <?php echo $res['post_date']; ?></strong> </li>
<li><a><i class="fa fa-user"></i> <?php echo $res['blog_author']; ?></a> </li>
</ul>
<div class="wt-post-text">
 <?php echo $res['article_desc']; ?>
</div>
</div>
</div>
</div>
</div>


<div class="col-md-3 col-md-pull-9">
<?php $this->load->view('pages/enquiry');?>  


<div class="left_sidebar">
<div class="left_title">Popular Post</div>
<ul>
    <?php
$recent = $this->db->query("SELECT * FROM wl_blog WHERE article_id ORDER BY rand() LIMIT 20")->result_array();

foreach ($recent as $recent) {
  //trace($val);
  ?>
<li><a href="<?php echo site_url($recent['friendly_url']); ?>" title="<?php echo $recent['article_title']; ?>"><?php echo $recent['article_title']; ?></a></li>
<?php }?>
</ul>
</div>
   
</div>
</div>
</div>
</section>

<!-- /.breadcrumb -->



<!-- ============================================================= FOOTER ============================================================= -->
<?php $this->load->view("bottom_application"); ?>
