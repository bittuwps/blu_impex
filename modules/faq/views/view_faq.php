<?php 
$this->load->view('top_application'); 
$fieldType = $this->session->userdata('field_type');
?>
<div class="breadcrumb">
  <div class="container">
    <div class="breadcrumb-inner">
      <ul class="list-inline list-unstyled">
        <li><a href="<?php echo site_url(); ?>" title="Return to Home"><?php echo ($this->session->userdata('lang') == 'p') ? $this->lang->line('home') : 'Home'; ?></a></li>
        <li class='active'><?php echo ($this->session->userdata('lang') == 'p') ? $this->lang->line('faq') : 'FAQ'; ?></li>
      </ul>
    </div>
    <!-- /.breadcrumb-inner -->
  </div>
  <!-- /.container -->
</div>
<!-- /.breadcrumb -->
<div class="body-content">
  <div class="container">
    <div class="checkout-box faq-page">
      <div class="row">
        <div class="col-md-12">
          <h2 class="heading-title"><?php echo ($this->session->userdata('lang') == 'p') ? $this->lang->line('Frequently_Asked_Questions') : 'Frequently Asked Questions'; ?></h2>
          <!--span class="title-tag">Last Updated on September 21, 2017</span-->
          <div class="panel-group checkout-steps" id="accordion">
            <!-- checkout-step-01  -->
            <?php
            $cntr = 1;
            foreach ($res as $faq) {
              ?>
              <div class="panel panel-default checkout-step-01">
                <!-- panel-heading -->
                <div class="panel-heading">
                  <h4 class="unicase-checkout-title"> <a data-toggle="collapse" class="" data-parent="#accordion<?php echo $cntr; ?>" href="#collapseOne<?php echo $cntr; ?>">
                      <span><?php echo $cntr; ?></span><?php echo $faq['faq_question'.$fieldType]; ?> </a> </h4>
                </div>
                <!-- panel-heading -->
                <div id="collapseOne<?php echo $cntr; ?>" class="panel-collapse collapse in<?php echo $cntr; ?>">
                  <!-- panel-body  -->
                  <div class="panel-body"><p><?php echo $faq['faq_answer'.$fieldType]; ?></p></div>
                  <!-- panel-body  -->
                </div>
                <!-- row -->
              </div>
              <?php
              $cntr++;
            }
            ?>
            <!-- checkout-step-01  -->
          </div>
          <!-- /.checkout-steps -->
        </div>
      </div>
      <!-- /.row -->
    </div>
    <!-- /.checkout-box -->
    <!-- ============================================== BRANDS CAROUSEL ============================================== -->
    <?php getBrand(); ?>
    <!-- /.logo-slider -->
    <!-- ============================================== BRANDS CAROUSEL : END ============================================== -->
  </div>
  <!-- /.container -->
</div>
<!-- /.body-content -->
<!-- ============================================================= FOOTER ============================================================= -->
<?php $this->load->view("bottom_application"); ?>
