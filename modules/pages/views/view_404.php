<!DOCTYPE html>
<html>
  <head>
    <title>Error : 404 Page not found</title>
    <link rel="stylesheet" href="<?php echo site_url(); ?>404/css/style.css">
    <link href='//fonts.googleapis.com/css?family=Josefin+Sans:400,100,100italic,300,300italic,400italic,600,600italic,700,700italic' rel='stylesheet' type='text/css'>

    <!-- For-Mobile-Apps-and-Meta-Tags -->
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <!-- //For-Mobile-Apps-and-Meta-Tags -->
    <script src="<?php echo site_url(); ?>404/js/jquery-1.11.1.min.js"></script> 
  </head>
  <body>
    <div class="main">
      <div class="agile">
        <div class="agileits_main_grid">
          <div class="agileits_main_grid_left">
            <h1><san style="color:#fff">mercadomoz.com</san></h1>
          </div>
          <div class="agileits_main_grid_right" style="display: inline;">
            <div class="menu">
              <span class="menu-icon"><a href="#"><img src="<?php echo site_url(); ?>404/images/menu-icon.png" alt=""></a></span>	
              <ul class="nav1">
                <li><a href="<?php echo site_url(); ?>">Home</a></li>
                <li><a href="<?php echo site_url('aboutus'); ?>">About</a></li>
                <li><a href="<?php echo site_url('products'); ?>">Products</a></li>
                <li><a href="<?php echo site_url('contactus'); ?>">Contact</a></li>
              </ul> 	
              <!-- script-for-menu -->
              <script>
                $("span.menu-icon").click(function () {
                  $("ul.nav1").slideToggle(300, function () {
                    // Animation complete.
                  });
                });
              </script>
              <!-- /script-for-menu -->
            </div>
          </div>
          <div class="clear"> </div>
        </div>
        <div class="w3l">
          <div class="text">
            <h1>PAGE NOT FOUND</h1>	

            <p>You have been tricked into click on a link that can not be found. Please check the url or go to <a href="<?php echo site_url(); ?>">main page</a> and see if you can locate what you are looking for</p>
          </div>
          <div class="image">
            <img src="<?php echo site_url(); ?>404/images/smile.png">
          </div>
          <div class="clear"></div>
        </div>

        <div class="wthree">
          <div class="back">
            <a href="<?php echo site_url(); ?>">Back to home</a>
          </div>
          <div class="social-icons w3agile">
            <ul>
              <li>Follow us on :</li>
              <li><a href="#" class="facebook"><img src="<?php echo site_url(); ?>404/images/fb.png" title="facebook" alt="facebook"></a></li>
              <li><a href="#" class="twitter"><img src="<?php echo site_url(); ?>404/images/tw.png" title="twitter" alt="twitter"></a></li>
              <li><a href="#" class="googleplus"><img src="<?php echo site_url(); ?>404/images/gp.png" title="googleplus" alt="googleplus"></a></li>
              <div class="clear"></div>
            </ul>	
          </div>
          <div class="clear"></div>
        </div>
      </div>
    </div>
  </body>
</html>