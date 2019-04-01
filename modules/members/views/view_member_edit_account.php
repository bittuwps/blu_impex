<?php $this->load->view("top_application"); ?>

<style>.box-inputfeilds input, textarea, select{margin-top: 5px;}</style>

<div class="columns-container">



  <div class="container" id="columns">



    <!-- breadcrumb -->



    <div class="breadcrumb clearfix">



      <a class="home" href="#" title="Return to Home"><?php echo ($this->session->userdata('lang') == 'p') ? $this->lang->line('home') : 'Home'; ?></a>



      <span class="navigation-pipe">/</span>



      <span class="navigation_page"><?php echo ($this->session->userdata('lang') == 'p') ? $this->lang->line('edit_profile') : 'Edit Profile'; ?></span>



    </div>



    <!-- ./breadcrumb -->



    <!-- page heading-->



    <h2 class="page-heading">



      <span class="page-heading-title2"><?php echo ($this->session->userdata('lang') == 'p') ? $this->lang->line('edit_profile') : 'Edit Profile'; ?></span>



    </h2>





    <!-- ../page heading-->



    <div class="page-content row">

      <div class="column col-xs-12 col-sm-3" id="left_column">

        <!-- block category -->

        <?php $this->load->view('members/left'); ?>

        <!-- ./block category  -->

      </div>







      <div class="col-xs-12 col-sm-9 member-area" >





        <div class="box-inputfeilds">

          <?php
          echo form_open('', 'class="row"');

          error_message();
          ?>

          <div class="row">  

            <div class="col-sm-6">

              <h3><?php echo ($this->session->userdata('lang') == 'p') ? $this->lang->line('shipping_address') : 'Shipping Address'; ?></h3>

              <div class="cb40"></div>



              <input type="text" name="ship_name" placeholder="Full Name*"  value="<?php echo $mres1['name']; ?>" class="form-control" required/>

              <input type="tel" pattern="[1-9]{1}[0-9]{8}" maxlength="10" name="ship_mobile" placeholder="Mobile Number*" value="<?php echo $mres1['mobile']; ?>" class="form-control" required/>

              <textarea name="ship_address" cols="1"  placeholder="Address Details*" rows="3"  class="form-control" required><?php echo $mres1['address']; ?></textarea>

              <input type="text" name="ship_lmark" value="<?php echo $mres1['landmark']; ?>" placeholder="Landmark" class="form-control" />

              <input type="text" name="ship_city" value="<?php echo $mres1['city']; ?>" placeholder="City*" class="form-control" required/>

              <input type="text" name="ship_pin" value="<?php echo $mres1['zipcode']; ?>" placeholder="Pincode*" class="form-control" required/>

              <input type="text" name="ship_state" placeholder="State*" value="<?php echo $mres1['state']; ?>" class="form-control" required/>

              <?php echo CountrySelectBox(array("name" => "ship_country", 'current_selected_val' => $mres1['country'], "format" => 'class="form-control" required')); ?> 

              <button class="button"><?php echo ($this->session->userdata('lang') == 'p') ? $this->lang->line('go_back') : 'Go Back'; ?></button>

            </div>         

            <div class="col-sm-6">

              <h3><?php echo ($this->session->userdata('lang') == 'p') ? $this->lang->line('billing_address') : 'Billing Address'; ?></h3>

              <div class="checkbox-same">

                <input id="check_add" class="" name="check_add" onClick="Check_Bill_Ship(this.form);" value="Y" onClick="" type="checkbox"> <?php echo ($this->session->userdata('lang') == 'p') ? $this->lang->line('same_as_shipping') : 'Same as Shipping address'; ?> 

              </div>

              <input type="text" name="bil_name" placeholder="Full Name*"  value="<?php echo $mres1['bil_name']; ?>" class="form-control" required/>

              <input type="tel" pattern="[1-9]{1}[0-9]{9}" maxlength="10" name="bil_mobile" value="<?php echo $mres1['bil_mobile']; ?>" placeholder="Mobile Number*" class="form-control" required/>

              <textarea name="bil_address" cols="1" placeholder="Address Details*" rows="3" class="form-control unicase-form-control" required><?php echo $mres1['bil_address']; ?></textarea>

              <input type="text" name="bil_lmark" value="<?php echo $mres1['bil_landmark']; ?>" placeholder="Landmark" class="form-control"/>

              <input type="text" name="bil_city" value="<?php echo $mres1['bil_city']; ?>" placeholder="City*" class="form-control" required/>

              <input type="text" name="bil_pin" value="<?php echo $mres1['bil_zipcode']; ?>" placeholder="Pincode*" class="form-control" required/>

              <input type="text" name="bil_state" value="<?php echo $mres1['bil_state']; ?>" placeholder="State*" class="form-control" required/>

              <?php echo CountrySelectBox(array("name" => "bil_country", 'current_selected_val' => $mres1['bil_country'], "format" => 'class="form-control unicase-form-control text-input" required')); ?>

              <button class="button pull-right"><?php echo ($this->session->userdata('lang') == 'p') ? $this->lang->line('continue') : 'Continue'; ?></button>

            </div>

          </div>

          <?php echo form_close(); ?>

        </div>

      </div>

    </div>

  </div>

</div>



<script type="text/javascript">

  function Check_Bill_Ship(chk) {



    if (chk.check_add.checked == 1) {

      //chk.bmtitle.value = chk.mtitle.value;

      chk.bil_name.value = chk.ship_name.value;

      chk.bil_mobile.value = chk.ship_mobile.value;

      chk.bil_address.value = chk.ship_address.value;

      chk.bil_lmark.value = chk.ship_lmark.value;

      chk.bil_city.value = chk.ship_city.value;

      chk.bil_pin.value = chk.ship_pin.value;

      chk.bil_state.value = chk.ship_state.value;

      chk.bil_country.value = chk.ship_country.options[chk.ship_country.selectedIndex].value;

    }

    if (chk.check_add.checked == 0) {

      //chk.bmtitle.value = '';

      chk.bil_name.value = '';

      chk.bil_mobile.value = '';

      chk.bil_address.value = '';

      chk.bil_lmark.value = '';

      chk.bil_city.value = '';

      chk.bil_pin.value = '';

      chk.bil_state.value = '';

      chk.bil_country.value = chk.ship_country.options[0].value;

    }

  }

</script>

<?php $this->load->view("bottom_application"); ?>