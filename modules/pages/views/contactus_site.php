<?php $this->load->view('top_application'); ?>
<div class="page-content page-contact">
  <div class="row">
    <!-- Example Tabs Solid -->
    <div class="col-md-12">
      <div class="head">
        <h2 class="text-center">Contact Us</h2>

        <h4 class="text-center"> Planning a trip would you like to discuss?<br> We would like to hear from you</h4>
      </div>
      <div style="max-width:700px;margin:0px auto;padding-top:10px;padding-bottom:30px;">
        <?php
        echo validation_message();
        echo error_message();        
        ?>
        <form name="contact" method="post" action="contactus">
          <div class="col-md-12">
            <div class="col-md-6">
              <div class="form-group">
                <input type="text" name="name" value="<?php echo set_value('name'); ?>" class="form-control" id="exampleInputEmail1" placeholder="Name *">
              </div>
              <div class="form-group">
                <input type="email" name="email" value="<?php echo set_value('email'); ?>" class="form-control" id="exampleInputPassword1" placeholder="Email *">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <input type="text" name="phone" value="<?php echo set_value('phone'); ?>" class="form-control" id="exampleInputEmail1" placeholder="Phone..">
              </div>
              <div class="form-group">
                <input type="text" name="subject" value="<?php echo set_value('subject'); ?>" class="form-control" id="exampleInputPassword1" placeholder="Subject..">
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <textarea rows="5" name="message" class="form-control" placeholder="Message *"><?php echo set_value('message'); ?></textarea>
              </div>
            </div>
          </div>
          <div class="col-md-12 text-center">
            <input type="submit" class="btn btn-contact" value="Submit" />
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<section class="page-address text-center">
  <h2>Email Address</h2>
  <p><i class="fa fa-envelope"></i>hello@wetravelsolo.com</p>
  <!--h2>Contact Address</h2>
  <p><i class="fa fa-map-marker" aria-hidden="true"></i> Reference site about Lorem Ipsum, giving information on its origins </p-->
  <p><i class="fa fa-phone"></i>+91-9643625323</p>
</section>
<?php $this->load->view('bottom_application'); ?>