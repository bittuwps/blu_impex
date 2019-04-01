<?php $this->load->view("top_application"); ?>
<!-- page wapper-->
<!-- ============================================== HEADER : END ============================================== -->
<style type="text/css">
  .box-authentication input, select, textarea {margin-top: 15px;}
  .required{ color:#FF3300;}
  .validation{ color:#FF3300;}
  .success{ color:#00CC33;}
</style>
<div class="breadcrumb">
  <div class="container">
    <div class="breadcrumb-inner">
      <ul class="list-inline list-unstyled">
        <li><a href="<?php echo site_url(); ?>"><?php echo ($this->session->userdata('lang') == 'p')?$this->lang->line('read_more'):'Home';?></a></li>
        <li class='active'><?php echo ($this->session->userdata('lang') == 'p')?$this->lang->line('sign_register'):'Login / Register';?></li>
      </ul>
    </div>
    <!-- /.breadcrumb-inner -->
  </div>
  <!-- /.container -->
</div>
<!-- /.breadcrumb -->
<div class="body-content">
  <div class="container">
    <div class="sign-in-page">
      <div class="row">
        <!-- Sign-in -->
        <div class="col-md-6 col-sm-6 sign-in">
          <h4 class=""><?php echo ($this->session->userdata('lang') == 'p')?$this->lang->line('Sign'):'Sign in';?></h4>
          <?php
          //echo validation_message();
          echo error_message();
          ?>
          <p class=""><?php echo ($this->session->userdata('lang') == 'p')?$this->lang->line('welcome_to_account'):'Hello, Welcome to your account';?>.</p>
          <div class="social-sign-in outer-top-xs"> <a onclick="window.parent.location.href = '<?php echo site_url(); ?>hauth/login/Facebook';" class="facebook-sign-in" style="cursor: pointer;"><i class="fa fa-facebook"></i> <?php echo ($this->session->userdata('lang') == 'p')?$this->lang->line('sign_in_fb'):'Sign In with Facebook';?></a> <a onclick="window.parent.location.href = '<?php echo site_url(); ?>hauth/login/Google';" class="googleplus-sign-in" style="cursor: pointer;"><i class="fa fa-google-plus"></i> <?php echo ($this->session->userdata('lang') == 'p')?$this->lang->line('sign_in_google'):'Sign In With Google+';?></a> </div>
          <!--<form class="register-form outer-top-xs" role="form">-->
          <?php echo form_open('', 'name="login_frm" id="logFrm"'); ?>
          <div class="form-group">
            <label class="info-title" for="exampleInputEmail1"><?php echo ($this->session->userdata('lang') == 'p')?$this->lang->line('email'):'Email Address';?> <span>*</span></label>
            <!--<input type="email" class="form-control unicase-form-control text-input" id="exampleInputEmail1" >-->
            <input id="emmail_login" name="login_email" placeholder="Login ID/Email*" type="text" class="form-control unicase-form-control text-input">
            <?php echo form_error('login_email'); ?> </div>
          <div class="form-group">
            <label class="info-title" for="exampleInputPassword1"><?php echo ($this->session->userdata('lang') == 'p')?$this->lang->line('password'):'Password';?> <span>*</span></label>
            <!--<input type="password" class="form-control unicase-form-control text-input" id="exampleInputPassword1" >-->
            <input id="password_login" name="login_password" placeholder="Password*" type="password" class="form-control unicase-form-control text-input">
            <?php echo form_error('login_password'); ?> </div>
          <div class="radio outer-xs">
            <label>
              <!--input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
              Remember me! </label -->
              <!--<a href="<?php echo site_url('users/forgotten_password'); ?>" class="forgot-password pull-right" data-toggle="modal" data-target="#myModal">Forgot your Password?</a>-->
            <p class="forgot-password pull-right"><a href="<?php echo site_url('users/forgotten_password'); ?>"><?php echo ($this->session->userdata('lang') == 'p')?$this->lang->line('forgot_password'):'Forgot your password';?>?</a></p>
          </div>
          <!--	<button type="submit" class="btn-upper btn btn-primary checkout-page-button">Login</button>-->
          <button class="btn-upper btn btn-primary checkout-page-button" type="submit"><i class="fa fa-lock"></i> <?php echo ($this->session->userdata('lang') == 'p')?$this->lang->line('Sign'):'Sign in';?></button>
          <input type="hidden" name="action" value="login" />
          <?php echo form_close(); ?> </div>
        <!-- Sign-in -->
        <!-- create a new account -->
        <div class="col-md-6 col-sm-6 create-new-account">
          <h4 class="checkout-subtitle">Create a new account</h4>
          <p class="text title-tag-line">Create your new account.</p>
          <!-- <form class="register-form outer-top-xs" role="form">-->
          <?php echo form_open('', 'name="login_frm" id="regisFrm"'); ?>
          <div class="form-group">
            <label class="info-title" for="exampleInputEmail2"><?php echo ($this->session->userdata('lang') == 'p')?$this->lang->line('name'):'First Name';?><span>*</span></label>
            <input id="first_name" name="first_name" value="<?php echo set_value('first_name'); ?>" type="text" class="form-control" placeholder="First Name*"><?php echo form_error('first_name'); ?>
          </div>
          <div class="form-group">
            <label class="info-title" for="exampleInputEmail2"><?php echo ($this->session->userdata('lang') == 'p')?$this->lang->line('last_name'):'Last Name';?> <span>*</span></label>

            <input id="last_name" name="last_name" value="<?php echo set_value('last_name'); ?>" type="text" class="form-control" placeholder="Last Name*"><?php echo form_error('last_name'); ?>
          </div>
          
          <div class="form-group">
            <label class="info-title" for="exampleInputEmail2"><?php echo ($this->session->userdata('lang') == 'p')?$this->lang->line('gender'):'Gender';?> <span>*</span></label>
            <select id="gender" name="gender" class="form-control">
              <option value="">---Select Gender---</option>
              <option value="M">Male</option>
              <option value="F">Female</option>
            </select>
            <?php echo form_error('gender'); ?>
          </div>

          <div class="form-group">
            <label class="info-title" for="exampleInputEmail2"><?php echo ($this->session->userdata('lang') == 'p')?$this->lang->line('email'):'Email Address';?> <span>*</span></label>

            <input id="emmail_register" name="email_address" value="<?php echo set_value('email_address'); ?>" type="text" class="form-control" placeholder="Email Address*"><?php echo form_error('email_address'); ?></div>
          <div class="form-group">
            <label class="info-title" for="exampleInputEmail2"><?php echo ($this->session->userdata('lang') == 'p')?$this->lang->line('mobile_number'):'Mobile Number';?> <span>*</span></label>
            <input id="mobile_number" name="mobile_number" value="<?php echo set_value('mobile_number'); ?>" type="text" class="form-control" placeholder="Mobile Number*"><?php echo form_error('mobile_number'); ?></div>
          <div class="form-group">
            <label class="info-title" for="exampleInputEmail2"><?php echo ($this->session->userdata('lang') == 'p')?$this->lang->line('password'):'Password';?><span>*</span></label>
            <input id="password" name="password" type="password" class="form-control" placeholder="Password*"><?php echo form_error('password'); ?></div>
          <div class="form-group">
            <label class="info-title" for="exampleInputEmail2"><?php echo ($this->session->userdata('lang') == 'p')?$this->lang->line('confirm_password'):'Confirm Password';?><span>*</span></label>
            <input id="c_password" name="c_password" type="password" class="form-control" placeholder="Confirm Password*"><?php echo form_error('c_password'); ?></div>

          <input type="hidden" name="action" value="register" />
          <button class="btn-upper btn btn-primary checkout-page-button"><i class="fa fa-user"></i> <?php echo ($this->session->userdata('lang') == 'p')?$this->lang->line('create_account'):'Create an account'; ?></button>
          <?php echo form_close(); ?>
        </div>
        <!-- create a new account -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.sigin-in-->
    <!-- ============================================== BRANDS CAROUSEL ============================================== -->
    <div id="brands-carousel" class="logo-slider wow fadeInUp">
      <div class="logo-slider-inner">
        <div id="brand-slider" class="owl-carousel brand-slider custom-carousel owl-theme">
          <div class="item "><a href="#" class="image"> <img data-echo="assets/images/brands/1.jpg" src="assets/images/brands/1.jpg" alt=""> </a> </div>
          <!--/.item-->
          <div class="item"> <a href="#" class="image"> <img data-echo="assets/images/brands/2.jpg" src="assets/images/brands/2.jpg" alt=""> </a> </div>
          <!--/.item-->
          <div class="item"> <a href="#" class="image"> <img data-echo="assets/images/brands/3.jpg" src="assets/images/brands/3.jpg" alt=""> </a> </div>
          <!--/.item-->
          <div class="item"> <a href="#" class="image"> <img data-echo="assets/images/brands/4.jpg" src="assets/images/brands/4.jpg" alt=""> </a> </div>
          <!--/.item-->
          <div class="item"> <a href="#" class="image"> <img data-echo="assets/images/brands/5.jpg" src="assets/images/brands/5.jpg" alt=""> </a> </div>
          <!--/.item-->
          <div class="item"> <a href="#" class="image"> <img data-echo="assets/images/brands/6.jpg" src="assets/images/brands/6.jpg" alt=""> </a> </div>
          <!--/.item-->
          <div class="item"> <a href="#" class="image"> <img data-echo="assets/images/brands/7.jpg" src="assets/images/brands/7.jpg" alt=""> </a> </div>
          <!--/.item-->
          <div class="item"> <a href="#" class="image"> <img data-echo="assets/images/brands/8.jpg" src="assets/images/brands/8.jpg" alt=""> </a> </div>
          <!--/.item-->
          <div class="item"> <a href="#" class="image"> <img data-echo="assets/images/brands/9.jpg" src="assets/images/brands/9.jpg" alt=""> </a> </div>
          <!--/.item-->
          <div class="item"> <a href="#" class="image"> <img data-echo="assets/images/brands/10.jpg" src="assets/images/brands/10.jpg" alt=""> </a> </div>
          <!--/.item-->
          <div class="item"> <a href="#" class="image"> <img data-echo="assets/images/brands/11.jpg" src="assets/images/brands/11.jpg" alt=""> </a> </div>
          <!--/.item-->
          <div class="item"> <a href="#" class="image"> <img data-echo="assets/images/brands/12.jpg" src="assets/images/brands/12.jpg" alt=""> </a> </div>
          <!--/.item-->
        </div>
        <!-- /.owl-carousel #logo-slider -->
      </div>
      <!-- /.logo-slider-inner -->
    </div>
    <!-- /.logo-slider -->
    <!-- ============================================== BRANDS CAROUSEL : END ============================================== -->
  </div>
  <!-- /.container -->
</div>
<!-- /.body-content -->
<!-- ./page wapper-->
<?php $this->load->view("bottom_application"); ?>
