<?php $this->load->view('includes/header'); ?> 


<!-- PAGE CONTENT WRAPPER -->
<div class="page-content-wrap">

  <?= get_flash() ?>

  <!-- START WIDGETS -->                    
  <div class="row">
    <div class="col-md-3">
      <div class="widget widget-default widget-item-icon" onclick="location.href = '<?php echo base_url('sitepanel/members'); ?>';">
        <div class="widget-item-left">
          <span class="fa fa-user"></span>
        </div>                             
        <div class="widget-data">
          <div class="widget-int num-count"><?php echo $total_member; ?></div>
          <div class="widget-title">Registred Members</div>
          <!--                                    <div class="widget-subtitle">In your mailbox</div>-->
        </div>      
        <div class="widget-controls">                                
          <a href="#" class="widget-control-right widget-remove" data-toggle="tooltip" data-placement="top" title="Remove Widget"><span class="fa fa-times"></span></a>
        </div>
      </div>           
    </div>
    <div class="col-md-3">
      <div class="widget widget-default widget-item-icon" onclick="location.href = '<?php echo base_url('sitepanel/category') ?>';">
        <div class="widget-item-left">
          <span class="fa fa-sitemap"></span>
        </div>
        <div class="widget-data">
          <div class="widget-int num-count"><?php echo $total_categories; ?></div>
          <div class="widget-title">Total Categories</div>
          <!--                                    <div class="widget-subtitle">On your website</div>-->
        </div>
        <div class="widget-controls">                                
          <a href="#" class="widget-control-right widget-remove" data-toggle="tooltip" data-placement="top" title="Remove Widget"><span class="fa fa-times"></span></a>
        </div>                            
      </div>                            
    </div>
    <div class="col-md-3">
      <div class="widget widget-default widget-item-icon" onclick="location.href = '<?php echo base_url('sitepanel/products') ?>';">
        <div class="widget-item-left">
          <span class="fa fa-cubes"></span>
        </div>
        <div class="widget-data">
          <div class="widget-int num-count"><?php echo $total_product; ?></div>
          <div class="widget-title">Total Products</div>
          <!--                                    <div class="widget-subtitle">On your website</div>-->
        </div>
        <div class="widget-controls">                                
          <a href="#" class="widget-control-right widget-remove" data-toggle="tooltip" data-placement="top" title="Remove Widget"><span class="fa fa-times"></span></a>
        </div>                            
      </div>                            
    </div>
    <div class="col-md-3 pull-right">

      <!-- START WIDGET CLOCK -->
      <div class="widget widget-danger widget-padding-sm">
        <div class="widget-big-int plugin-clock">00:00</div>                            
        <div class="widget-subtitle plugin-date">Loading...</div>
        <div class="widget-controls">                                
          <a href="#" class="widget-control-right widget-remove" data-toggle="tooltip" data-placement="left" title="Remove Widget"><span class="fa fa-times"></span></a>
        </div>                            
        <div class="widget-buttons widget-c3">
          <div class="col">
            <a href="#"><span class="fa fa-clock-o"></span></a>
          </div>
          <div class="col">
            <a href="#"><span class="fa fa-bell"></span></a>
          </div>
          <div class="col">
            <a href="#"><span class="fa fa-calendar"></span></a>
          </div>
        </div>                            
      </div>                        
      <!-- END WIDGET CLOCK -->

    </div>
  </div>
  <!-- END WIDGETS -->                    

  <div class="row" style="margin-top:-70px">

    <div class="col-md-6 col-md-offset-3 text-center">
      <i class="fa fa-dashboard fa-4x"></i>
    </div>
    <div class="col-md-6 col-md-offset-3 text-center">
      <img src="<?php echo theme_url() ?>images/logo.png" class="logo" alt="Dmagine">
    </div>
  </div>



  <!-- START DASHBOARD CHART -->

  <!-- END DASHBOARD CHART -->

</div>
<!-- END PAGE CONTENT WRAPPER -->                                

<?php $this->load->view('includes/footer'); ?>