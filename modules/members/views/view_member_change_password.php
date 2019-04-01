<?php $this->load->view("top_application"); ?>
<div class="columns-container">
  <div class="container" id="columns">
    <!-- breadcrumb -->
    <div class="breadcrumb clearfix">
      <a class="home" href="<?php echo site_url(); ?>" title="Return to Home"><?php echo ($this->session->userdata('lang') == 'p')?$this->lang->line('home'):'Home';?></a>
      <span class="navigation-pipe">&nbsp;</span>
      <span class="navigation_page"><?php echo ($this->session->userdata('lang') == 'p')?$this->lang->line('chage_password'):'Change Password'?></span>
    </div>
    <!-- ./breadcrumb -->
    <!-- page heading-->
    <div class="container">
      <h1 class="page-heading">
        <span class="page-heading-title2"><?php echo ($this->session->userdata('lang') == 'p')?$this->lang->line('change_password'):'Change Password';?> </span>
      </h1>
    </div>
    <!-- ../page heading-->
    <div class="page-content ">
      <div class="row">
        <div class="column col-xs-12 col-sm-3" id="left_column">
          <!-- block category -->
          <?php $this->load->view('members/left'); ?>
          <!-- ./block category  -->
        </div>
        <div class="col-xs-12 col-sm-9 member-area" >
          <div class="row">
            <div class="col-sm-12">
              <?php
              echo form_open();
              validation_message();
              error_message();
              ?>
              <div class="box-authentication">
                <h3><?php echo ($this->session->userdata('lang') == 'p')?$this->lang->line('change_password'):'Change Password';?></h3>
                <label><?php echo ($this->session->userdata('lang') == 'p')?$this->lang->line('current_password'):'Enter Your Current Password';?> *</label>
                <input id="designation" class="form-control" tabindex="1" placeholder="" name="old_password" type="password" required="">
                <label><?php echo ($this->session->userdata('lang') == 'p')?$this->lang->line('new_password'):'Choose a New Password';?> *</label>
                <input id="designation" class="form-control" tabindex="2" placeholder="" name="new_password" type="password" required="">		
                <label><?php echo ($this->session->userdata('lang') == 'p')?$this->lang->line('confirm_new_password'):'Confirm Your New Password';?> *</label>
                <input id="designation" class="form-control" tabindex="3" placeholder="" name="confirm_password" type="password" required="">
                <button class="button"><?php echo ($this->session->userdata('lang') == 'p')?$this->lang->line('save_changes'):'Save Changes';?></button>
              </div>
              <?php echo form_close(); ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php $this->load->view("bottom_application"); ?>