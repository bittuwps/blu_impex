<?php

$res = $this->db->query("SELECT * FROM wl_categories WHERE status = '1' AND parent_id = '1' limit 0,10")->result_array();

$fieldType = $this->session->userdata('field_type');

$sql_enq = mysql_query("select * from tbl_admin");
$admin_res = mysql_fetch_array($sql_enq);

$this->load->library('user_agent');
if ($this->agent->is_referral()) {
    $referer = $this->agent->referrer();

}
if (isset($_POST['catsubmit'])):
    if (isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])):
        //your site secret key
        $secret = '6Lch4J0UAAAAALjAma8OpmuVvQeloj8wVe4yrv5E';
        //get verify response data
        $verifyResponse = curl('https://www.google.com/recaptcha/api/siteverify?secret=' . $secret . '&response=' . $_POST['g-recaptcha-response']); //file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $secret . '&response=' . $_POST['g-recaptcha-response']);
        $responseData = json_decode($verifyResponse);
        $qname = !empty($_POST['name']) ? $_POST['name'] : '';
        $qemail = !empty($_POST['email']) ? $_POST['email'] : '';
        $qmobile = !empty($_POST['mobile']) ? $_POST['mobile'] : '';
        $qlocation = !empty($_POST['location']) ? $_POST['location'] : '';
        $qmessage = !empty($_POST['message']) ? $_POST['message'] : '';

        if ($responseData->success):

            $sql_ens = "insert into wl_enquiry set first_name='$qname', email='$qemail', mobile_number='$qmobile', address='$qlocation', message=' $qmessage', en_url='$referer'";
            $qry = mysql_query($sql_ens);
            //contact form submission code
            
            $subject = utf8_encode('Webpulseindia.com ' . ' - ' . 'Enquiry from '.$this->admin_info->site_domain);
            $htmlContent = "
				Customer Details:
				Url: $referer
				Your Name: " . $qname . "
				Mobile: " . $qmobile . "
				Email: " . $qemail . "
				Location: " . $qlocation . "
				Message: " . $qmessage;
            // Always set content-type when sending HTML email

            $emails=array($this->admin_info->site_email,$this->admin_info->admin_email,'bittu.wps@gmail.com','webpulseindia@gmail.com');
            
            foreach($emails as $r=>$v){
                $mail_conf = array(
                    'subject' => $subject,
                    'to_email' => $v,
                    'from_email' => $this->admin_info->admin_email,
                    'from_name' => $this->config->item('site_name'),
                    'body_part' => $htmlContent,
                );
                $resp = $this->dmailer->mail_notify($mail_conf);
            }

            
            $succMsg = 'Thank you for your enquiry. Our team will contact you soon.';
            $qname = '';
            $qemail = '';
            $qlocation = '';
            $qmobile = '';
            $qmessage = '';
        else:
            $errMsg = 'Robot verification failed, please try again.';
        endif;
    else:
        $errMsg = 'Please click on the reCAPTCHA box.';
    endif;
    ?>
	  <script type="text/javascript">
	    setTimeout(function(){ $('.enqs<?php echo $_POST['prodID']; ?>').trigger('click'); }, 300);
	</script>
	<?php
else:
    $errMsg = '';
    $succMsg = '';
    $qname = '';
    $qemail = '';
    $qlocation = '';
    $qmobile = '';
    $qmessage = '';
endif;
?>

<footer class="footer">
    <div class="footer-main section">
        <div class="container">
            <div class="row">
                <div class="widgets">
                    <div class="col-xs-12 col-sm-12 col-md-3 wow fadeInDown animated" data-wow-delay=".1s">
                        <div class="widget">
                            <div class="wi-title">
                                <h4>About <span>Us</span></h4>
                            </div>
                            <div class="wi-content">
                                <p><span style="background-color:transparent; color:#fff; font-size:12pt">Blu Impex was established in the year 2016. We use the best quality of materials and modern equipment that makes use of the latest technology. This ensures that our equipment, whether </span>Automatic Pasta Making Machine<span style="background-color:transparent; color:#fff; font-size:12pt"> or </span>Direct Filling Pen Making Machine<span style="background-color:transparent; color:#fff; font-size:12pt"> are the best in the industry.</span></p>
                                <a class="read_btn fbtn" href="<?= base_url().'about-us' ?>" title="Read More">Read More</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-5">
                        <div class="widget">
                            <div class="wi-content wi-link">
                                <div class="row">
                                    <div class="col-md-5 col-xs-12 wow fadeInDown animated" data-wow-delay=".2s">
                                        <div class="wi-title">
                                            <h4>Useful <span>Links</span></h4>
                                        </div>
                                        <ul>
                                            <li><a href="<?php echo site_url(); ?>" title="Home"><i class="fa fa-caret-right"></i>
                                                    Home</a></li>
                                            <li><a href="<?php echo site_url(); ?>about-us" title="About Us"><i class="fa fa-caret-right"></i>
                                                    About Us</a></li>
                                            <li><a href="<?php echo site_url(); ?>our-products" title="Our Products"><i class="fa fa-caret-right"></i>
                                                    Our Products</a></li>
                                            <li><a href="<?php echo site_url(); ?>blog" title="Blogs"><i class="fa fa-caret-right"></i>
                                                    Blogs</a></li>
                                            <li><a href="<?php echo site_url(); ?>contact-us" title="Contact Us"><i class="fa fa-caret-right"></i>
                                                    Contact Us</a></li>
                                            <li><a href="<?= site_url().'sitemap' ?>" title="Sitemap"><i class="fa fa-caret-right"></i>
                                                    Sitemap</a></li>
                                            <li><a href="<?= site_url().'market-area' ?>" title="Sitemap"><i class="fa fa-caret-right"></i>
                                                    Market Area</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-md-7 col-xs-12 wow fadeInDown animated" data-wow-delay=".3s">
                                        <div class="wi-title">
                                            <h4>Our <span>Products</span></h4>
                                        </div>
                                        <ul>
                                            <?php
                                                foreach ($res as $val) {
                                                    ?>
                                                        <li>
                                                            <a href="<?php $val['friendly_url'];?>" title="<?php $val['category_name'];?>">
                                                                <i class="fa fa-caret-right"></i>
                                                                <?php echo $val['category_name']; ?>
                                                            </a>
                                                        </li>
                                                    <?php 
                                                }
                                            ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-4 wow fadeInDown animated" data-wow-delay=".3s">
                        <div class="widget">
                            <div class="wi-title">
                                <h4>Contact <span>Us</span></h4>
                            </div>
                            <div class="wi-content wi-news">
                                <ul class="wi-list">
                                    <li><a><i class="fa fa-home"></i> <strong><?= $this->admin_info->site_name ?></strong></a></li>
                                    <li><a><i class="fa fa-paper-plane"></i><?= $this->admin_info->address ?></li></a>
                                    <li><a><i class="fa fa-phone"></i><?=  $this->admin_info->site_phone_no ?></a></li>
                                </ul>
                            </div>
                            <div class="wi-content wi-social">
                                <ul>
                                    <li class="facebook">
                                        <a href="https://www.facebook.com/BluImpexNewDelhi/">
                                            <i class="fa normal-show fa-facebook-f"></i>
                                            <i class="fa hover-show fa-facebook-f"></i>
                                        </a>
                                    </li>
                                    <li class="youtube">
                                        <a href="https://www.youtube.com/channel/UCHG644kPnZvV6Y43G2wYKDA/feed">
                                            <i class="fa normal-show fa-youtube"></i>
                                            <i class="fa hover-show fa-youtube"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="copy">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">© <?= date('Y') ?> <?= $this->admin_info->site_name ?> All Rights Reserved.</div>
                <div class="col-lg-6">Designed & Promoted by Webpulse - <a href="http://www.webpulseindia.com" target="_blank"
                        title="Awarded Best Web Designing Company in India" style="display: inline"> Awarded Best Web
                        Designing Company in India </a></div>
            </div>
        </div>
    </div>
</footer>



<div class="modal fade" id="productID" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Enquire Now</h4>
            </div>
            <div class="modal-body">

                <form id="enqure_form" action="" method="post">
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
                    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div id="modal_enquire_details" class="image-enquire">
                                <img class="catImg" src="" alt="">
                                <h4 class="catName"></h4>
                                <p class="catDesc"></p>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <input type="hidden" name="prodID" id="catID">

                                <input type="text" placeholder="Your Name*" tabindex="101" value="" name="name"
                                    required>
                            </div>

                            <div class="form-group">
                                <input type="email" value="" tabindex="102" placeholder="Your Email*" required name="email">
                            </div>
                            <div class="form-group">
                                <input value="" placeholder="Your Mobile Number*" type="text" tabindex="103" name="mobile"
                                    onkeypress="return isNumberKey(event)" maxlength="10" required>
                            </div>
                            <div class="form-group">
                                <input type="text" placeholder="Your Location *" required="" tabindex="104" name="location"
                                    value="" id="autocomplete1" onFocus="geolocate()">
                            </div>
                            <div class="form-group">
                                <textarea id="text" name="message" tabindex="105" placeholder="Your Message*" required></textarea>
                            </div>
                            <div class="form-group" style="margin-bottom: 0;">
                                <div class="g-recaptcha" tabindex="106" data-sitekey="6Lch4J0UAAAAAN_Bt3D9DnBg_JS-1LSYnSa4vjMC"
                                    style="transform:scale(0.80);-webkit-transform:scale(0.82); transform-origin:0 0;-webkit-transform-origin:0 0;"></div>
                            </div>
                            <button name="catsubmit" class="read_btn btn-submit" type="submit" tabindex="7" id="contact-submit"
                                data-submit="...Sending">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php if (!empty($errMsg) or !empty($succMsg)){ ?>
	<script>
		$(document).ready(function(){			
            $('#prd-dtl-enq').trigger('click');			
		});
	</script>
<?php } ?>

<script>
    /* $(document).ready(function(){
        $(document).find('a').attr('href','javascript:;;');
    }); */
</script>