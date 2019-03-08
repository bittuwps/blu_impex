<?php $this->load->view('top_application'); ?>
<div class="contact-area main-container pad-60">
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
              <strong>Bul Order</strong>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <h1>Bulk Order</h1>
    
    <div class="row" style="margin:10px;">
      <div class="col-md-8 col-md-offset-2">
        <div class="contact-form-page">
          <h2>Bulk Order Form</h2>
          <style type="text/css">
            .label {width:100px;text-align:right;float:left;padding-right:10px;font-weight:bold;}
            #contact-form label.error, .output {color:#FB3A3A;font-weight:bold;}
            .rc-anchor-light {
              background: #f9f9f9;
              border: 1px solid #d3d3d3;
              color: #000;
              width: 83%!important;
            }

            .g-recaptcha{width:265px!important;}
            .rc-anchor-normal {
              height: 74px;
              width: 255px!important;
            }
            .rc-anchor-normal .rc-anchor-content {
              height: 74px;
              width: 180px!important;
            }
            .rc-anchor-logo-portrait {
              margin: 10px 0 0 0px!important;
              width: 58px;
              -webkit-user-select: none;
              -moz-user-select: none;
              -ms-user-select: none;
            }
            .rc-anchor-normal .rc-anchor-pt {
              margin: 4px 13px 0 0;
              padding-right: 2px;
              position: absolute;
              right: 0;
              text-align: left;
              width: 35%!important;
            }
          </style>
          <div class="form-contact">
            <?php
            error_message();
            validation_message();
            ?>  
            <form role="form" name="contact-form" method="post" id="contact-form" novalidate="novalidate" action="" >
              <div class="row">
                <div class="col-md-12 col-sm-4 col-xs-12">
                  <select name="product" class="common-input">
                    <option value="">--Select Product--</option>
                    <?php
                    foreach($products as $key=>$val){
                      ?>
                    <option value="<?php echo $val['products_id']; ?>"><?php echo ucwords(strtolower($val['product_name'])); ?></option>
                      <?php
                    }
                    ?>
                  </select>
                </div>
                <div class="col-md-6 col-sm-4 col-xs-12">
                  <input type="text" placeholder="Name" tabindex="1" name="name" id="name" value="" required pattern="[a-z A-Z]+" >
                </div>
                <div class="col-md-6 col-sm-4 col-xs-12">
                  <input type="email" tabindex="2" name="email" id="email" value="" placeholder="Email" required pattern="[a-z A-Z]+" >
                </div>
                <div class="col-md-6 col-sm-4 col-xs-12">
                  <input type="tel" tabindex="3" placeholder="Phone Number" maxlength="20" minilength="10" name="phone" id="phone" value="" required pattern="" >
                </div>
                <div class="col-md-6 col-sm-4 col-xs-12">
                  <?php echo CountrySelectBox(array("name" => "country", 'current_selected_val' => set_value('country'), "format" => 'class="common-input" required')); ?>
                </div>
                <div class="col-md-12 col-sm-12 col-xs-12">
                  <textarea rows="5" placeholder="Type your message here..." cols="40" required tabindex="5" name="message" id="message" ></textarea>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                </div>

                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input name="submit" tabindex="7" type="submit" tabindex="5" id="contact-submit" data-submit="...Sending" value="Submit">
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php $this->load->view('bottom_application'); ?>