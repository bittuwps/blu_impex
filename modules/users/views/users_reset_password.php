<?php $this->load->view("top_application"); ?>

<div class="columns-container">
  <div class="container" id="columns">
    <!-- breadcrumb -->
    <div class="breadcrumb clearfix">
      <a class="home" href="<?php echo site_url(); ?>" title="Return to Home">Home</a>
      <span class="navigation-pipe">&nbsp;</span>
      <span class="navigation_page">Reset Password</span>
    </div>
    <div class="container">
      <h1 class="page-heading">
        <span class="page-heading-title2">Reset Password</span>
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
            
            <label for="emmail_login">New Password<span style="color: red;">*</span></label>
            <input tabindex="1" type="password" placeholder="New Password*" name="new_password" id="new_password" value="" required="required" class="form-control" />
            
            <label for="emmail_login">Confirm Password<span style="color: red;">*</span></label>
            <input tabindex="1" type="password" placeholder="Confirm Password*" name="confirm_password" id="confirm_password" value="" required="required" class="form-control" />
            <button class="button" type="submit"><i class="fa fa-lock"></i> Reset Password</button>
            <input type="hidden" name="forgotme" value="reset" />
            <?php echo form_close(); ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="about-area main-container pad-60">
  <div class="container">
    <div class="row">
      <div class="box-breadcrumbs col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="breadcrumbs">
          <ul>
            <li class="home">
              <a title="Go to Home Page" href="<?php echo site_url(); ?>">Home</a>
              <span>|</span>
            </li>
            <li class="product">
              <strong>Reset Password</strong>
            </li>
          </ul>
        </div>
      </div>
      <div class="col-md-6 col-md-offset-3 col-sm-12 col-xs-12 contact-page">
        <div class="login-content">				
          <div class="col2-left-layout">
            <div class="member-area">
              <h2 class="heading-title">Reset Password</h2>
              <div class="form-contact">
                <?php
                echo form_open();
                validation_message();
                error_message();
                ?>                
                <label>Choose a New Password *</label>
                <div id="a3" style="display:none">
                  <label>Choose a New Password</label>
                </div>      
                <input id="designation" class="rf ui-autocomplete-input" onblur="nhid( & #39; a3 & #39; ); desig();" onfocus="javascript:ntt( & #39; q3 & #39; , & #39; a3 & #39; );" tabindex="4" placeholder="" name="new_password" type="password" required="">		
                <label>Confirm Your New Password *</label>
                <div id="a4" style="display:none">
                  <label>Confirm Your New Password</label>
                </div>
                <input id="designation" class=" rf ui-autocomplete-input" onblur="nhid( & #39; a4 & #39; ); desig();" onfocus="javascript:ntt( & #39; q3 & #39; , & #39; a4 & #39; );" tabindex="4" placeholder="" name="confirm_password" type="password" required="">
                <div class="company-detail-tr">
                  <div class="company-detail-left"></div>
                  <input type="hidden" name="action_product" value="save">  
                  <input name="submit" type="submit" class="login-sub" id="submit" value="Save Changes">
                </div>
                <?php echo form_close(); ?>
              </div>
            </div>
          </div>
          <div class="cb20"></div>
        </div>
      </div>
    </div>
  </div>
</div>


<?php $this->load->view("bottom_application"); ?>