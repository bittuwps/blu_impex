<!DOCTYPE html>
<html lang="en" class="body-full-height">
    
<!-- Mirrored from aqvatarius.com/themes/atlant/html/pages-login-website-light.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 05 Nov 2016 12:25:10 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>        
        <!-- META SECTION -->
        <title><?php echo $heading_title;?></title>            
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        
        <link rel="icon" href="favicon.ico" type="image/x-icon" />
        <!-- END META SECTION -->
        
        <!-- CSS INCLUDE -->        
        <link rel="stylesheet" type="text/css" id="theme" href="<?php echo base_url('assets/sitepanel_new/css/theme-default.css')?>"/>
        <!-- EOF CSS INCLUDE -->                                     
    </head>
    <body>
        
        <div class="login-container lightmode">
        
            <div class="login-box animated fadeInDown">
                <div class="login-logo"></div>
                <div class="login-body">
                    <div class="login-title"><strong>Log In</strong> to your account</div>
                    <div class="login-title"><?php  echo error_message();?></div>
                   <?php 
                    $atts = array(
                        'width'      => '650',
                        'height'     => '400',
                        'scrollbars' => 'yes',
                        'status'     => 'yes',
                        'resizable'  => 'yes',
                        'screenx'    => '0',
                        'screeny'    => '0'
                      );
                   ?>
                    <?php echo form_open('sitepanel/auth','class="form-horizontal"'); ?>
                    <div class="form-group">
                        <div class="col-md-12">
                            <?php echo form_error('username');?>
                            <input type="text" class="form-control" value="<?php echo set_value('username');?>" name="username" placeholder="Username"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <?php echo form_error('password');?>
                            <input type="password" class="form-control" value="<?php echo set_value('password');?>" name="password" placeholder="Password"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6">
                            <!--<a href="#" class="btn btn-link btn-block">Forgot your password?</a>-->
                            <?php echo anchor_popup('sitepanel/forgotten_password/','Forgot Password?',$atts);?>
                        </div>
                        <div class="col-md-6">
                            <input type="hidden" value="login" name="action"> 
                            <!--<input type="submit" name="sss" value="Login"  class="button2" />-->
                            <button type="submit" name="sss" class="btn btn-info btn-block" value="Login">Log In</button>
                        </div>
                    </div>
                    <?php echo form_close();?>
                </div>
            </div>
            
        </div>
    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','../../../../www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-36783416-1', 'auto');
        ga('send', 'pageview');
    </script>        
    <!-- Yandex.Metrika counter -->
    <script type="text/javascript">
        (function (d, w, c) {
            (w[c] = w[c] || []).push(function() {
                try {
                    w.yaCounter25836617 = new Ya.Metrika({
                        id:25836617,
                        clickmap:true,
                        trackLinks:true,
                        accurateTrackBounce:true,
                        webvisor:true
                    });
                } catch(e) { }
            });

            var n = d.getElementsByTagName("script")[0],
                s = d.createElement("script"),
                f = function () { n.parentNode.insertBefore(s, n); };
            s.type = "text/javascript";
            s.async = true;
            s.src = "../../../../mc.yandex.ru/metrika/watch.js";

            if (w.opera == "[object Opera]") {
                d.addEventListener("DOMContentLoaded", f, false);
            } else { f(); }
        })(document, window, "yandex_metrika_callbacks");
    </script>
    <noscript><div><img src="https://mc.yandex.ru/watch/25836617" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
    <!-- /Yandex.Metrika counter -->    
    </body>

<!-- Mirrored from aqvatarius.com/themes/atlant/html/pages-login-website-light.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 05 Nov 2016 12:25:10 GMT -->
</html>