<!DOCTYPE html>
<?php
$sitepanel_menu_array = lang('top_menu_list');
$sitepanel_menu_icon_array = lang('top_menu_icon');
//trace(lang('top_menu_icon'));die();
//trace($title);die();
?>
<html xmlns="http://www.w3.org/1999/xhtml" dir="#" lang="#" xml:lang="#">

  <!-- Mirrored from aqvatarius.com/themes/atlant/html/ by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 05 Nov 2016 12:13:24 GMT -->
  <!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
  <head>  
    <script type="text/javascript">var _siteRoot = 'index.html', _root = 'index.html';</script>
    <script type="text/javascript" > var site_url = '<?php echo site_url(); ?>';</script>
    <script type="text/javascript" > var theme_url = '<?php echo theme_url(); ?>';</script>
    <script type="text/javascript" > var resource_url = '<?php echo resource_url(); ?>';</script>
    <!-- META SECTION -->
    <title><?php echo $heading_title ?></title>            
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="icon" href="<?php echo base_url('title_logo.ico') ?>" type="image/x-icon" />
    <!-- END META SECTION -->
    <!-- CSS INCLUDE --> 
    <!-----------------Old Files------------------>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/developers'); ?>/css/proj.css" />
    
      <script type="text/javascript" src="<?php echo base_url('assets/sitepanel_new');  ?>/js/plugins/jquery/jquery.min.js"></script>
    
    <!--<script type="text/javascript" src="<?php //echo base_url('assets/sitepanel_new');  ?>/js/plugins/jquery/jquery-ui.min.js"></script>
    <script type="text/javascript" src="<?php //echo base_url('assets/sitepanel_new');  ?>/js/jquery/ui/jquery-ui-1.8.16.custom.min.js"></script>
    <link type="text/css" href="<?php //echo base_url('assets/sitepanel_new');  ?>/js/jquery/ui/themes/ui-lightness/jquery-ui-1.8.16.custom.css" rel="stylesheet" />-->
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/sitepanel_new/js/common.js"></script>

    
    <!------ -----Olod files Ends Here-------------->        
    <link rel="stylesheet" type="text/css" id="theme" href="<?php echo base_url('assets/sitepanel_new') ?>/css/theme-default.css"/>
    <link rel="stylesheet" type="text/css" id="theme" href="<?php echo base_url('assets/sitepanel_new') ?>/css/custom.css"/>
    <!-- EOF CSS INCLUDE -->                   
  </head>
  <body>
    <!-- START PAGE CONTAINER -->
    <div class="page-container" id="container">

      <!-- START PAGE SIDEBAR -->
      <div class="page-sidebar" id="header">
        <!-- START X-NAVIGATION -->
        <ul class="x-navigation" id="menu">
          <li class="logo-image text-center" >
            <a id="admin_logo" href="<?php echo base_url(); ?>"><?= $this->admin_info->site_name ?></a>
            <a href="#" class="x-navigation-control"></a>
          </li>
          <li class="xn-title">Navigation</li>
          <?php createMenu($sitepanel_menu_array, $sitepanel_menu_icon_array); ?>
        </ul>
        <!-- END X-NAVIGATION -->
      </div>

      <div class="page-content">
        <div class="content-frame">
          <!-- START X-NAVIGATION VERTICAL -->
          <ul class="x-navigation x-navigation-horizontal x-navigation-panel">
            <!-- TOGGLE NAVIGATION -->
            <!--                    <li class="xn-icon-button">
                                    <a href="#" class="x-navigation-minimize"><span class="fa fa-dedent"></span></a>
                                </li>-->
            <!-- END TOGGLE NAVIGATION -->

            <!-- POWER OFF -->
            <li class="xn-icon-button pull-right last">
              <a href="#"><span class="fa fa-power-off"></span></a>
              <ul class="xn-drop-left animated zoomIn">
                <li><a href="<?php echo base_url('sitepanel/logout'); ?>" ><span class="fa fa-sign-out"></span> Sign Out</a></li>
              </ul>                        
            </li> 
            <!-- END POWER OFF -->                    
          </ul>
          <!-- END X-NAVIGATION VERTICAL -->                     

          <!-- START BREADCRUMB -->
          <ul class="breadcrumb">
            <li><?php echo anchor('sitepanel/dashbord', 'Home'); ?></li>                    
            <li class="active"><?php echo $heading_title; ?></li>
          </ul>
          <!-- END BREADCRUMB --> 