<?php $this->load->view("top_application"); ?>
<!-- page wapper-->
<style type="text/css">
  .box-authentication input, select, textarea {margin-top: 15px;}
</style>
<div class="columns-container">
  <div class="container" id="columns">
    <!-- breadcrumb -->
    <div class="breadcrumb clearfix">
      <a class="home" href="<?php echo site_url(); ?>" title="Return to Home">Home</a>
      <span class="navigation-pipe">&nbsp;</span>
      <span class="navigation_page">Login / Register</span>
    </div>
    <div class="container">
      <h1 class="page-heading">
        <span class="page-heading-title2">Login / Register</span>
      </h1>
    </div>
    <!-- ./breadcrumb -->
    <!-- ../page heading-->
    <div class="page-content">
      <div class="row">
        <?php
        //echo validation_message();
        echo error_message();
        ?>
        <div class="col-sm-6">
          <div class="box-authentication">
            <h3>Create an account</h3>
            <?php echo form_open('', 'name="login_frm" id="regisFrm"'); ?>
            <input id="first_name" name="first_name" value="<?php echo set_value('first_name'); ?>" type="text" class="form-control" placeholder="First Name*"><?php echo form_error('first_name'); ?>

            <input id="last_name" name="last_name" value="<?php echo set_value('last_name'); ?>" type="text" class="form-control" placeholder="Last Name*"><?php echo form_error('last_name'); ?>

            <input id="emmail_register" name="email_address" value="<?php echo set_value('email_address'); ?>" type="text" class="form-control" placeholder="Email Address*"><?php echo form_error('email_address'); ?>

            <input id="mobile_number" name="mobile_number" value="<?php echo set_value('mobile_number'); ?>" type="text" class="form-control" placeholder="Mobile Number*"><?php echo form_error('mobile_number'); ?>

            <input id="password" name="password" type="password" class="form-control" placeholder="Password*"><?php echo form_error('password'); ?>

            <input id="c_password" name="c_password" type="password" class="form-control" placeholder="Confirm Password*"><?php echo form_error('c_password'); ?>

            <input type="hidden" name="action" value="register" />
            <button class="button"><i class="fa fa-user"></i> Create an account</button>
            <?php echo form_close(); ?>
          </div>
        </div>

        <div class="col-sm-6">
          <div class="box-authentication">
            <h3>Already registered?</h3>
            <?php echo form_open('', 'name="login_frm" id="logFrm"'); ?>
            <input id="emmail_login" name="login_email" placeholder="Login ID/Email*" type="text" class="form-control"><?php echo form_error('login_email'); ?>

            <input id="password_login" name="login_password" placeholder="Password*" type="password" class="form-control"><?php echo form_error('login_password'); ?>

            <p class="forgot-pass"><a href="<?php echo site_url('users/forgotten_password'); ?>">Forgot your password?</a></p>
            <button class="button" type="submit"><i class="fa fa-lock"></i> Sign in</button>
            <input type="hidden" name="action" value="login" />
            <?php echo form_close(); ?>

            <div class="connect-with-wrapper"> 
              <h3>Or Connect With</h3>
              <p style="margin-top:15px;">
                <button class="fbLogin btn-login-social" onclick="window.parent.location.href = '<?php echo site_url(); ?>hauth/login/Facebook';"> <img src="<?php echo theme_url(); ?>images/fb_icon.png" height="20" width="20" alt="fb Logo"> <span>&nbsp;Facebook</span> </button>
              </p>
              <p style="margin-top:15px;">
                <button class="gpLogin btn-login-social" onclick="window.parent.location.href = '<?php echo site_url(); ?>hauth/login/Google';"> <img src="<?php echo theme_url(); ?>images/google_icon.png" height="20" width="20" alt="G+ Logo"> <span>&nbsp;Google</span> </button>
              </p>  
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- ./page wapper-->
<?php $this->load->view("bottom_application"); ?>