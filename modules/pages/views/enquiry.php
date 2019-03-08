<?php
$sql_enq = mysql_query("select * from tbl_admin");
$admin_res = mysql_fetch_array($sql_enq);
$this->load->library('user_agent');
if ($this->agent->is_referral()) {
    $referer = $this->agent->referrer();

}
if (isset($_POST['submit'])):
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
            
            $subject = utf8_encode('Webpulseindia.com ' . ' - ' . 'Enquiry from '.$this->admin_info->site_domain);
            $htmlContent = "
				Customer Details:
				Url: $referer
				Your Name: " . $name . "
				Mobile: " . $mobile . "
				Email: " . $email . "
				Location: " . $location . "
				Message: " . $message;


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
<div class="left_sidebar">
    <div class="left_title">Quick Contact</div>

    <form role="form" name="contact-form" class="contact-form" method="post" id="quick_contact" novalidate="novalidate"
        action="">
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
        <div class="form-group">
            <input placeholder="Your Name *" class="form-control" type="text" tabindex="1" name="name" id="name" value=""
                required="" pattern="[a-z A-Z]+">
        </div>
        <div class="form-group">
            <input placeholder="Your Email ID*" class="form-control" type="email" tabindex="2" name="email" id="email"
                value="" required="">
        </div>
        <div class="form-group">
            <input placeholder="Your Phone No*" class="form-control" type="tel" maxlength="20" minilength="10" tabindex="3"
                name="mobile" id="mobile" value="" required="">
        </div>
        <div class="form-group">
            <input placeholder="Your Location*" class="form-control" type="text" tabindex="4" name="location" id="autocomplete"
                onFocus="geolocate()" value="" required="">
        </div>
        <div class="form-group">
            <textarea placeholder="Your Message*" class="form-control" required="" tabindex="5" name="message" id="message"></textarea>
        </div>
        <div class="form-group" style="margin-bottom:0">
            <div class="g-recaptcha" tabindex="6" data-sitekey="6Ld6kyMUAAAAAGGDDCH1wyrn7E1__Rj6_ORCaK2k" style="transform:scale(0.80);-webkit-transform:scale(0.82);transform-origin:0 0;-webkit-transform-origin:0 0"
                tabindex="7"></div>
        </div>
        <button name="submit" class="read_btn btn-submit" type="submit" tabindex="7" id="contact-submit" data-submit="...Sending">Submit</button>
    </form>

</div>