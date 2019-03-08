<?php
$this->load->view('top_application'); 
$fieldType = $this->session->userdata('field_type');
?>

<div class="breadcrumb">
  <div class="container">
    <div class="breadcrumb-inner">
      <ul class="list-inline list-unstyled">
        <li><a href="<?php echo site_url(); ?>" title="Return to Home"><?php echo ($this->session->userdata('lang') == 'p')?$this->lang->line('home'):'Home';?></a></li>
        <li class='active'><?php echo ($this->session->userdata('lang') == 'p')?$this->lang->line(seo_url_title('About Us')):'About Us'; ?></li>
      </ul>
    </div>
    <!-- /.breadcrumb-inner -->
  </div>
  <!-- /.container -->
</div>
<!-- /.breadcrumb -->
<div class="body-content">
  <div class="container">
    <div class="terms-conditions-page">
      <div class="row">
        <div class="col-md-12 terms-conditions">
          <h2 class="heading-title"><?php echo ($this->session->userdata('lang') == 'p')?$this->lang->line(seo_url_title('About Us')):'About Us'; ?></h2>
		  
          <div class=""><?php echo $content['page_description'.$fieldType]; ?> </div>
        </div>
      </div>
      <!-- /.row -->
    </div>
    <!-- /.sigin-in-->
    <!-- ============================================== BRANDS CAROUSEL ============================================== -->
     <?php getBrand(); ?>
    <!-- /.logo-slider -->
    <!-- ============================================== BRANDS CAROUSEL : END ============================================== -->
  </div>
  <!-- /.container -->
</div>
<!-- /.body-content -->
<!-- ============================================================= FOOTER ============================================================= -->

<?php $this->load->view('bottom_application'); ?>