<?php
$res = $this->db->query("SELECT * FROM wl_categories WHERE status = '1' AND parent_id = '0' limit 0,10")->result_array();
$fieldType = $this->session->userdata('field_type');
?>

<footer id="footer" class="footer color-bg">
  <div class="footer-bottom">
    <div class="container">
      <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-3">
          <div class="module-heading">
            <h4 class="module-title"><?php echo ($this->session->userdata('lang') == 'p') ? $this->lang->line('contactus') : 'Contact Us'; ?></h4>
          </div>
          <!-- /.module-heading -->
          <div class="module-body">
            <ul class="toggle-footer" style="">
              <li class="media">
                <div class="pull-left"> <span class="icon fa-stack fa-lg"> <i class="fa fa-map-marker fa-stack-1x fa-inverse"></i> </span> </div>
                <div class="media-body">
                  <p>Street No. 3,BE 183 1st floor, Hari Nagar, New Delhi-110064

</p>
                </div>
              </li>
              <!--<li class="media">
                <div class="pull-left"> <span class="icon fa-stack fa-lg"> <i class="fa fa-mobile fa-stack-1x fa-inverse"></i> </span> </div>
                <div class="media-body">
                  <p>
                    (+91) 1234567890<br />


                  </p>
                </div>
              </li>-->
              <li class="media">
                <div class="pull-left"> <span class="icon fa-stack fa-lg"> <i class="fa fa-envelope fa-stack-1x fa-inverse"></i> </span> </div>
                <div class="media-body"> <span><a href="mailto:maginternational03@gmail.com">maginternational03@gmail.com</a></span> </div>
              </li>
            </ul>
			
          </div>
		  </br>
		  <div class="social">

        <ul class="link">

          <li class="fb pull-left"><a target="_blank" rel="nofollow" href="#" title="Facebook"></a></li>

          <li class="tw pull-left"><a target="_blank" rel="nofollow" href="#" title="Twitter"></a></li>

          <li class="googleplus pull-left"><a target="_blank" rel="nofollow" href="#" title="GooglePlus"></a></li>
        
          <li class="youtube pull-left"><a target="_blank" rel="nofollow" href="#" title="Youtube"></a></li>
		  
		  <li class="instagram pull-left"><a target="_blank" rel="nofollow" href="#" title="Instagram"></a></li>

        </ul>

      </div>
          <!-- /.module-body -->
        </div>
        <!-- /.col -->
        <div class="col-xs-12 col-sm-6 col-md-3">
          <div class="module-heading">
            <h4 class="module-title"><?php echo ($this->session->userdata('lang') == 'p') ? $this->lang->line('categories') : 'Categories'; ?></h4>
          </div>
          <!-- /.module-heading -->
          <div class="module-body">
            <ul class='list-unstyled'>
              <?php
              if (is_array($res) && !empty($res)) {
                $slmenu = 1;
                foreach ($res as $key => $val) {
                  $catsRes = $this->db->query("SELECT category_id, category_name, category_image, friendly_url FROM wl_categories WHERE status = '1' AND parent_id = '" . $val['category_id'] . "' ORDER BY home_menu")->result_array();
                  ?>
                  <li><a href="<?php echo site_url($val['friendly_url']); ?>" title="<?php echo $val['category_name' . $fieldType]; ?>"><?php echo ($val['category_name' . $fieldType])?$val['category_name' . $fieldType]:$val['category_name']; ?></a></li>
                  <?php
                }
              }
              ?>
            </ul>
          </div>
          <!-- /.module-body -->
        </div>
        <!-- /.col -->
        <div class="col-xs-12 col-sm-6 col-md-3">
          <div class="module-heading">
            <h4 class="module-title"><?php echo ($this->session->userdata('lang') == 'p') ? $this->lang->line('Compnay') : 'Company'; ?></h4>
          </div>
          <!-- /.module-heading -->
          <div class="module-body">
            <ul class='list-unstyled'>
              <li class="first"><a title="About us" href="<?php echo site_url('about-us'); ?>"><?php echo ($this->session->userdata('lang') == 'p') ? $this->lang->line('aboutus') : 'About Us'; ?></a></li>
              <li><a title="Blog" href="<?php echo site_url('blog'); ?>"><?php echo ($this->session->userdata('lang') == 'p') ? $this->lang->line('blog') : 'Blog'; ?></a></li>
              <li><a title="FAQ" href="<?php echo site_url('faq'); ?>"><?php echo ($this->session->userdata('lang') == 'p') ? $this->lang->line('faq') : 'FAQ'; ?></a></li>
              <li><a title="Contact Us" href="<?php echo site_url('contact-us'); ?>"><?php echo ($this->session->userdata('lang') == 'p') ? $this->lang->line('contactus') : 'Contact Us'; ?></a></li>
            </ul>
          </div>
          <!-- /.module-body -->
        </div>
        <!-- /.col -->
        <div class="col-xs-12 col-sm-6 col-md-3">
          <div class="module-heading">
            <h4 class="module-title"><?php echo ($this->session->userdata('lang') == 'p') ? $this->lang->line('whyus') : 'Why Choose Us'; ?></h4>
          </div>
          <!-- /.module-heading -->
          <div class="module-body">
            <ul class='list-unstyled'>
              <li class="first"><a href="<?php echo site_url('return-refund-and-cancellation-policy'); ?>"><?php echo ($this->session->userdata('lang') == 'p') ? $this->lang->line('returnPolicy') : 'Return, Refund and Cancellation Policy'; ?></a></li>
              <li><a href="<?php echo site_url('members'); ?>"><?php echo ($this->session->userdata('lang') == 'p') ? $this->lang->line('cancelOrder') : 'Cancel Order'; ?></a></li>
              <li><a href="<?php echo site_url('members'); ?>"><?php echo ($this->session->userdata('lang') == 'p') ? $this->lang->line('trackOrder') : 'Track Order'; ?></a></li>
              <!--              <li><a href="#" title="">Shipping Policy</a></li>

              <li><a href="#" title="">Terms Of Use</a></li>-->
              <li><a href="<?php echo site_url('terms-conditions'); ?>"><?php echo ($this->session->userdata('lang') == 'p') ? $this->lang->line('term&conditions') : 'Terms & Conditions'; ?></a></li>
              <li class=" last"><a href="<?php echo site_url('privacy-policy'); ?>"><?php echo ($this->session->userdata('lang') == 'p') ? $this->lang->line('privacyPolicy') : 'Privacy Policy'; ?></a></li>
            </ul>
          </div>
          <!-- /.module-body -->
        </div>
      </div>
    </div>
  </div>
  <div class="copyright-bar">

    <div class="container">
     
<div class="row">
<div class="col-xs-12 col-sm-9">
<p class="copyright">Copyright &copy; 2018 |&nbsp;<a href="#">MAG International&nbsp;</a>All Rights Reserved. Designed and Promoted by Webpulse -&nbsp;<a target="_blank" href="https://www.webpulseindia.com/" title="Web Designing Company">Web Designing Company</a></p>
</div>

      <div class="col-xs-12 col-sm-3 no-padding">

        <div class="clearfix payment-methods">

          <ul>

           <li><img src="<?php echo theme_url(); ?>images/payments/1.png" alt=""></li>
            <!--<li><img src="<?php echo theme_url(); ?>images/payments/2.png" alt=""></li>-->
            <li><img src="<?php echo theme_url(); ?>images/payments/3.png" alt=""></li>
            <li><img src="<?php echo theme_url(); ?>images/payments/4.png" alt=""></li>

           <!-- <li><img src="assets/images/payments/5.png" alt=""></li>-->

          </ul>

        </div>

        <!-- /.payment-methods --> 

      </div>

    </div>
	</div>

  </div>
</footer>