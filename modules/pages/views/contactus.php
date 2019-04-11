<?php $this->load->view('top_application');
$sql_enq = mysql_query("select * from tbl_admin");
$admin_res = mysql_fetch_array($sql_enq);
$this->load->library('user_agent');
if ($this->agent->is_referral()) {
    $referer = $this->agent->referrer();

}
if (isset($_POST['submitt'])):
    if (isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])):
        //your site secret key
        $secret = '6Ld6kyMUAAAAAAalCQJwBUo9X2SIRs6jVIkYKg2A';
        //get verify response data
        $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $secret . '&response=' . $_POST['g-recaptcha-response']);
        $responseData = json_decode($verifyResponse);
        $name = !empty($_POST['name']) ? $_POST['name'] : '';
        $email = !empty($_POST['email']) ? $_POST['email'] : '';
        $mobile = !empty($_POST['mobile']) ? $_POST['mobile'] : '';
        $location = !empty($_POST['location']) ? $_POST['location'] : '';
        $message = !empty($_POST['message']) ? $_POST['message'] : '';

        if ($responseData->success):

            $sql_ens = "insert into wl_enquiry set first_name='$name', email='$email', mobile_number='$mobile', address='$location', message=' $message', en_url='$referer'";
            $qry = mysql_query($sql_ens);
            //contact form submission code
            //$to='webpulse.mr@gmail.com';
            $subject = utf8_encode('Webpulseindia.com ' . ' - ' . 'Enquiry from '.$this->admin_info->site_domain);
            $htmlContent = "
                Customer Details:
                Url: $referer
                Your Name: " . $name . "
                Mobile: " . $mobile . "
                Email: " . $email . "
                Location: " . $location . "
                Message: " . $message;
            // Always set content-type when sending HTML email

            $emails=array($this->admin_info->site_email,$this->admin_info->admin_email,'bittu.wps@gmail.com');
            
            foreach($emails as $r=>$v){
                $mail_conf = array(
                    'subject' => $subject,
                    'to_email' => $v,
                    'from_email' => $this->admin_info->admin_email,
                    'from_name' => $this->config->item('site_name'),
                    'body_part' => $htmlContent,
                );
                $this->dmailer->mail_notify($mail_conf);
            }
            
            $succMsg = 'Thank you for your enquiry. Our team will contact you soon.';
            $name = '';
            $email = '';
            $location = '';
            $mobile = '';
            $message = '';
        else:
            $errMsg = 'Robot verification failed, please try again.';
        endif;
    else:
        $errMsg = 'Please click on the reCAPTCHA box.';
    endif;
else:
    $errMsg = '';
    $succMsg = '';
    $name = '';
    $email = '';
    $location = '';
    $mobile = '';
    $message = '';
endif;
?>
<!-- ============================================== HEADER : END ============================================== -->

<section class="inner_header" style="background-image:url(<?php echo theme_url(); ?>images/contact/contact.jpg)" alt=""
    title="">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="cat_title">
                    <?php echo $title; ?>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</section>
<section class="breadcrumb_section hidden-xs">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <ul class="breadcrumb">
                    <li><a href="<?php echo site_url(); ?>" title="Home">Home</a></li>
                    <li class="active">
                        <?php echo $title; ?>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>
<section class="contact_section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-7 col-lg-7">
                <div class="office-ifno-inner">
                    <h3>Blu Impex</h3>
                    <!--                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem accusantium rem voluptatem explicabo praesentium modi! Magni architecto rem amet voluptatem voluptas debitis quos explicabo, illum ratione laudantium, eveniet quia quo.</p>-->
                </div>


                <div class="office-addess-inner">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="single-address">
                                <h4>Head Quarter</h4>
                                <div class="cont-icon"><i class="fa fa-map-marker"></i></div>
                                <ul class="list-unstyled mb-0">
                                    <li>O-57, Near Metro Pillar No:230, West Patel Nagar, New Delhi Nearest Metro Station Shadipur</li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="single-address">
                                <h4>Hyderabad Branch</h4>
                                <div class="cont-icon"><i class="fa fa-map-marker"></i></div>
                                <ul class="list-unstyled mb-0">
                                    <li>Blu Impex, B-16, Laxmi Complex, Erragada, Hyderabad</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="single-address">
                                <h4>Kolkata Branch</h4>
                                <div class="cont-icon"><i class="fa fa-map-marker"></i></div>
                                <ul class="list-unstyled mb-0">
                                    <li>Blu Impex, 75,Metcafe Street, Ganesh Chandra Avenue, Kolkata</li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="single-address">
                                <h4>Chennai Branch</h4>
                                <div class="cont-icon"><i class="fa fa-map-marker"></i></div>
                                <ul class="list-unstyled mb-0">
                                    <li>Blu Impex, D-40, Lorry Terminus, Madhavaram, Chennai</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <hr class="hr" />
                    <div class="row">
                        <div class="col-md-6">
                            <div class="single-address">
                                <h4>Contact Person</h4>
                                <div class="cont-icon"><i class="fa fa-user"></i></div>
                                <ul class="list-unstyled mb-0">
                                    <li>S Krishna Mohan Janapa Reddy (Properitor)</li>
                                    <li></li>
                                </ul>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="single-address">
                                <h4>Website</h4>
                                <div class="cont-icon"><i class="fa fa-globe"></i></div>
                                <ul class="list-unstyled mb-0">
                                    <li>www.bluimpex.in</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-5 col-lg-5">
                <div class="office-ifno-inner">
                    <h3>Enquire Now</h3>

                </div>
                <div class="row">


                    <form role="form" name="contact-form" class="contact-form" method="post" id="quick_contact"
                        novalidate="novalidate" action="">
                        <script src="https://www.google.com/recaptcha/api.js" async defer></script>
                        <?php if (!empty($errMsg)): ?>
                        <div class="alert alert-danger">
                            <?php echo $errMsg; ?>
                        </div>
                        <?php endif;?>
                        <?php if (!empty($succMsg)): ?>
                        <div class="alert alert-success">
                            <?php echo $succMsg; ?>
                        </div>
                        <?php endif;?>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="form-group">
                                <input placeholder="Your Name *" class="form-control" type="text" tabindex="1" name="name"
                                    id="name" value="" required="" pattern="[a-z A-Z]+">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="form-group">
                                <input placeholder="Your Email ID*" class="form-control" type="email" tabindex="2" name="email"
                                    id="email" value="" required="">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="form-group">
                                <input placeholder="Your Phone No*" class="form-control" type="tel" maxlength="20"
                                    minilength="10" tabindex="3" name="mobile" id="mobile" value="" required="">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="form-group">
                                <input placeholder="Your Location*" class="form-control" type="text" tabindex="4" name="location"
                                    id="autocomplete" onFocus="geolocate()" value="" required="">
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="form-group">
                                <textarea placeholder="Your Message*" class="form-control" required="" tabindex="5"
                                    name="message" id="message"></textarea>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="form-group" style="margin-bottom:0">
                                <div class="g-recaptcha" tabindex="6" data-sitekey="6Ld6kyMUAAAAAGGDDCH1wyrn7E1__Rj6_ORCaK2k"
                                    style="transform:scale(0.80);-webkit-transform:scale(0.82);transform-origin:0 0;-webkit-transform-origin:0 0"
                                    tabindex="7"></div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="form-group">
                                <button name="submitt" class="read_btn btn-submit" type="submit" tabindex="7" id="contact-submit"
                                    data-submit="...Sending">Submit</button></div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</section>
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3501.2965618426733!2d77.15743091441801!3d28.65083768241063!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390d03889506a223%3A0x4ca66b5a5be67c7b!2sBlu+Impex+%7C+Pen+making+machine+Delhi+%7C+Noodle+making+machine!5e0!3m2!1sen!2sin!4v1554877498198!5m2!1sen!2sin" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
<!-- ============================================================= FOOTER ============================================================= -->
<?php $this->load->view('bottom_application');?>