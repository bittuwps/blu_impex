<?php
$this->load->view('project_footer');
$locations = $this->db->query("SELECt * FROM tbl_country WHERE status = '1'")->result_array();
?>

<!-- JavaScripts placed at the end of the document so the pages load faster --> 
<script type="text/javascript" src="<?php echo theme_url(); ?>js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo theme_url(); ?>js/jquery.nivo.slider.js"></script>
<script type="text/javascript" src="<?php echo theme_url(); ?>js/wow.min.js"></script>
<script type="text/javascript" src="<?php echo theme_url();?>js/owl.carousel/owl.carousel.min.js"></script>
<script type="text/javascript" src="<?php echo theme_url(); ?>js/jquery.validate.min.js"></script>
<script src="<?php echo theme_url(); ?>js/fancybox/jquery.fancybox.pack.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo theme_url(); ?>js/stec.js"></script>
<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyCYyhHAHS-58SXSyMw66_MulbmH-xHruxI&libraries=places&callback=initAutocomplete" async defer></script>
</body>
</html>