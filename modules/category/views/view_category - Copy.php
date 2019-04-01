<?php
$this->load->view("top_application");
$QryStringArr = array();  // To store all Query Variables so to move to other view;
$QryStringArr = array_unique($QryStringArr);
if (isset($this->meta_info['entity_id']) && $this->meta_info['entity_id'] != '') {
  $QryStringArr['category_id'] = $this->meta_info['entity_id'];
}
if ($this->input->get_post('keyword') != '') {
  $QryStringArr['keyword'] = $this->input->get_post('keyword');
}
if ($this->input->get_post('sort') != '') {
  $QryStringArr['sort'] = $this->input->get_post('sort');
}

$resleft = array_reverse($resleft);
?>
<div class="columns-container">
  <div class="container" id="columns">
    <!-- row -->
    <div class="row">
      <!-- Left colunm -->
      <div class="column col-xs-12 col-sm-3" id="left_column">
        <?php
        if (is_array($resleft) && !empty($resleft)) {
          ?>
          <!-- block category -->
          <div class="block left-module">
            <p class="title_block">Product types</p>
            <div class="block_content">
              <!-- layered -->
              <div class="layered layered-category">
                <div class="layered-content">
                  <ul class="tree-menu">
                    <?php
                    foreach ($resleft as $kl => $lval) {
                      ?>
                      <li <?php echo ($this->meta_info['entity_id'] == $lval['category_id']) ? 'class="active"' : ''; ?>><span></span><a href="<?php echo site_url($lval['friendly_url']); ?>"><?php echo $lval['category_name']; ?></a></li>
                      <?php
                    }
                    ?>
                  </ul>
                </div>
              </div>
              <!-- ./layered -->
            </div>
          </div>
          <!-- ./block category  -->
          <?php
        }

        if (is_array($proRes) && !empty($proRes)) {
          ?>

          <!-- left silide -->
          <div class="col-left-slide left-module">
            <ul class="owl-carousel owl-style2" data-loop="true" data-nav = "false" data-margin = "30" data-autoplayTimeout="1000" data-autoplayHoverPause = "true" data-items="1" data-autoplay="true">
              <?php
              foreach ($proRes as $pk => $pageVal) {
                ?>
              <li><a href="<?php echo site_url($pageVal['friendly_url']); ?>"><img src="<?php echo get_image('product-images',$pageVal['media'],'268','328','R'); ?>" alt="slide-left"></a></li>
                <?php
              }
              ?>
            </ul>
          </div>
          <!--./left silde-->

          <?php
        }


        if (is_array($testimonial) && !empty($testimonial)) {
          ?>
          <!-- Testimonials -->
          <div class="block left-module">
            <p class="title_block">Testimonials</p>
            <div class="block_content">
              <ul class="testimonials owl-carousel" data-loop="true" data-nav = "false" data-margin = "30" data-autoplayTimeout="1000" data-autoplay="true" data-autoplayHoverPause = "true" data-items="1">
                <?php
                foreach ($testimonial as $tk => $tVal) {
                  ?>
                  <li>
                    <div class="client-mane"><?php echo $tVal['poster_name']; ?></div>
                    <div class="client-avarta">
                      <img src="<?php echo get_image('testimonial', $tVal['testimonial_image'], '110', '110', 'R'); ?>" alt="client-avarta">
                    </div>
                    <div class="testimonial"><?php echo $tVal['testimonial_description']; ?></div>
                  </li>
                  <?php
                }
                ?>
              </ul>
            </div>
          </div>
          <!-- ./Testimonials -->
          <?php
        }
        ?>
      </div>
      <!-- ./left colunm -->

      <!-- Center colunm-->
      <div class="center_column col-xs-12 col-sm-9" id="center_column">
        <!-- breadcrumb -->
        <div class="breadcrumb clearfix">
          <a class="home" href="#" title="Return to Home">Home</a>
          <span class="navigation-pipe">&nbsp;</span>
          <span class="navigation_page"><?php echo $heading_title; ?></span>
        </div>
        <!-- ./breadcrumb -->
        <?php
        if (is_array($res) && !empty($res)) {
          ?>
          <!-- view-product-list-->
          <div id="view-product-list" class="view-product-list">
            <h1 class="page-heading">
              <span class="page-heading-title"><?php echo $heading_title; ?></span>
            </h1>
            <!-- PRODUCT LIST -->
            <ul class="row product-list grid" id="prodListingContainer">
              <?php
              foreach ($res as $val) {
                //trace($val);
                $link_url = base_url() . $val['friendly_url'];
                $catCount = count_category(" AND parent_id = '" . $val['category_id'] . "' ");
                $proCount = count_products(" AND category_id = '" . $val['category_id'] . "' ");
                if ($proCount > 0) {
                  $count = $proCount;
                } else {
                  $count = $catCount;
                }
                ?>
                <li class="col-sx-12 col-sm-4 listpager">
                  <div class="product-container">
                    <div class="left-block">
                      <a href="<?php echo $link_url; ?>">
                        <img class="img-responsive" alt="product" src="<?php echo get_image('category', $val['category_image'], '268', '328', 'R'); ?>" />
                      </a>  
                    </div>
                    <div class="right-block">
                      <h5 class="product-name"><a href="<?php echo $link_url; ?>"><strong><?php echo $val['category_name']; ?></strong></a></h5>
                      <p style="min-height: 40px;"><?php echo $val['category_description']; ?></p>
                    </div>
                  </div>
                </li>
                <?php
              }
              ?>
            </ul>
            <!-- ./PRODUCT LIST -->
          </div>
          <div style="text-align: center !important;">
            <div id="loadingdiv" style="display: none;">
              <img src="<?php echo theme_url(); ?>images/loading.gif" />
            </div>
          </div>
          <!-- ./view-product-list-->

          <?php
        } else {
          ?>
          <div class="alert alert-danger" role="alert" style="margin-top: 70px !important;">
            <strong>Oh snap!</strong> No records(s) found.
          </div>
          <?php
        }
        ?>
      </div>
      <!-- ./ Center colunm -->
    </div>
    <!-- ./row-->
  </div>
</div>
<script type="text/javascript">
  var page = 1;
  var triggeredPaging = 0;

  $(window).scroll(function () {
    $('#loadingdiv').hide();
    var scrollTop = $(window).scrollTop();
    var scrollBottom = (scrollTop + $(window).height());
    var containerTop = $('#prodListingContainer').offset().top;
    var containerHeight = $('#prodListingContainer').height();
    var containerBottom = Math.floor(containerTop + containerHeight);
    var scrollBuffer = 0;
    if ((containerBottom - scrollBuffer) <= scrollBottom) {
      page = $('.listpager').length;
      var queryString = '?stOffSet=' + page;
<?php
if (count($QryStringArr)) {
  foreach ($QryStringArr as $qrykey => $qryval) {
    ?>
          queryString += "&<?php echo $qrykey; ?>=<?php echo $qryval; ?>";
    <?php
  }
}
?>
      var actual_count = <?php echo $total_rows; ?>;

      if (!triggeredPaging && page < actual_count) {
        triggeredPaging = 1;
        $.ajax({
          type: "POST",
          url: "<?php echo base_url(); ?>category/ajax_load_category_view" + queryString,
          error: function (res) {
            //alert('Error');
            triggeredPaging = 0;
            $('#loadingdiv').hide();
            //console.log(arguments);
          },
          beforeSend: function (jqXHR, settings) {
            $('#loadingdiv').show();

          },
          success: function (res) {
            $('#loadingdiv').hide();
            $("#prodListingContainer").append(res);
            triggeredPaging = 0;
            //console.log(res);
            $('.listpager').fadeTo(1000, 0.5, function () {
              $(this).fadeTo(1000, 1.0);
            });
          }
        });
      }
    }
  });
</script>
<?php $this->load->view("bottom_application"); ?>