<?php $this->load->view("top_application"); ?>

<div class="columns-container">
  <div class="container" id="columns">
    <!-- breadcrumb -->
    <div class="breadcrumb clearfix">
      <a class="home" href="<?php echo site_url(); ?>" title="Return to Home">Home</a>
      <span class="navigation-pipe">&nbsp;</span>
      <span class="navigation_page">Forgot Password</span>
    </div>
    <div class="container">
      <h1 class="page-heading">
        <span class="page-heading-title2">Forgot Password</span>
      </h1>
    </div>
    <!-- ./breadcrumb -->

    <!--div class="page-content page-order">
      <ul class="step">
        <li ><span>01. Summary</span></li>
        <li class="current-step"><span>02. Sign in</span></li>
        <li><span>03. Shipping Address</span></li>
        <li><span>04. Review Order</span></li>
        <li><span>05. Payment</span></li>
      </ul>
    </div-->
    <!-- page heading-->
    <!-- ../page heading-->
    <div class="page-content">
      <div class="row">
        <?php 
        echo validation_message();
        echo error_message(); 
        ?>
        <div class="col-sm-6 col-md-offset-3">
          <div class="box-authentication">
            <?php echo form_open('', ''); ?>
            <label for="emmail_login">Email address<span style="color: red;">*</span></label>
            <input tabindex="1" type="email" placeholder="Enter your email address*" name="email" id="email" value="" required="required" class="form-control" />            
            <button class="button" type="submit"><i class="fa fa-lock"></i> Reset Password</button>
            <input type="hidden" name="forgotme" value="reset" />
            <?php echo form_close(); ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php $this->load->view("bottom_application"); ?>