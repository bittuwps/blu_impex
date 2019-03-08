<?php

$res = $this->db->query("SELECT * FROM wl_categories WHERE status = '1' AND parent_id = '0' ORDER BY sort_order limit 0,10")->result_array();

$catRes = $res;

$fieldType = $this->session->userdata('field_type');

?>

<link rel="stylesheet" href="<?php echo theme_url(); ?>developers/css/proj.css">

<body class="cnt-home">

  <header class="header-style-1">

    <div class="top-bar animate-dropdown">

      <div class="container">

        <div class="header-top-inner">

          <div class="cnt-account">

            <ul class="list-unstyled">

              <!--li><a href="<?php //echo site_url('home/set_currency/3');   ?>" <?php //echo ($this->session->userdata('currency_id') == 3)?'style="font-weight:bold;color:#0f6cb2;"':'';   ?>>Price in MT</a></li>

              <li><a href="<?php //echo site_url('home/set_currency/1');   ?>" <?php //echo ($this->session->userdata('currency_id') == 1)?'style="font-weight:bold;color:#0f6cb2;"':'';   ?>>Price in $</a></li-->

            <?php /*?>  <li><a href="javascript:void(0);" data-toggle="modal" data-target="#myModal1"><i class="fa fa-map-marker"></i> <?php echo ($this->session->userdata('lang') == 'p') ? $this->lang->line('choose_location') : 'Choose Location'; ?></a></li><?php */?>

              <?php

              if ($this->session->userdata('lang') == 'p') {

                ?>

               <?php /*?> <li><a href="<?php echo site_url('home/set_language/e'); ?>" title="English"><img src="<?php echo theme_url(); ?>images/eng_fl.jpg" width="24" height="18"></a></li><?php */?>

                <?php

              } else {

                ?>

            <?php /*?><li><a href="<?php echo site_url('home/set_language/p'); ?>" title="Portuguese"><img src="<?php echo theme_url(); ?>images/port.gif" width="24" height="18"></a></li><?php */?>

                <?php

              }

              if ($this->session->userdata('user_id') > 0) {

                ?>

                <li><a href="<?php echo site_url('members'); ?>"><?php echo ($this->session->userdata('lang') == 'p') ? $this->lang->line('Welcome') : 'Welcome'; ?> <?php echo $this->session->userdata('first_name'); ?></a></li>

                <li><a href="<?php echo site_url('members'); ?>"><i class="icon fa fa-user"></i><?php echo ($this->session->userdata('lang') == 'p') ? $this->lang->line('Myaccount') : 'My Account'; ?></a></li>

                <li><a href="<?php echo site_url('users/logout'); ?>"><i class="icon fa fa-sign-out"></i><?php echo ($this->session->userdata('lang') == 'p') ? $this->lang->line('Logout') : 'Logout'; ?></a></li>

                <?php

              } else {

                ?>

                <li><a href="<?php echo site_url('members'); ?>"><i class="icon fa fa-user"></i><?php echo ($this->session->userdata('lang') == 'p') ? $this->lang->line('Myaccount') : 'My Account'; ?></a></li>

                <li><a href="#"><i class="icon fa fa-heart"></i><?php echo ($this->session->userdata('lang') == 'p') ? $this->lang->line('Wishlist') : 'Wishlist'; ?></a></li>

                <li><a href="<?php echo site_url('register'); ?>"><i class="icon fa fa-lock"></i><?php echo ($this->session->userdata('lang') == 'p') ? $this->lang->line('sign_register') : 'Sign In/Register'; ?></a></li>

                <?php

              }

              ?>

            </ul>

          </div>

          <!-- /.cnt-account -->



          <div class="cnt-block">



            <ul class="list-unstyled list-inline">



              <!--<li class="dropdown dropdown-small"> <a href="#" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown"><span class="value">HK </span></a> </li>-->



              <!--<li class="dropdown dropdown-small"> <a href="#" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown"><span class="value">Portuguese </span><b class="caret"></b></a>



                <ul class="dropdown-menu">



                  <li><a href="#">Portuguese</a></li>



                  <li><a href="#">English</a></li>



                </ul>



              </li>-->



            </ul>



            <!-- /.list-unstyled -->



          </div>



          <!-- /.cnt-cart -->



          <div class="clearfix"></div>



        </div>



        <!-- /.header-top-inner -->



      </div>



      <!-- /.container -->



    </div>



    <!-- /.header-top -->



    <!-- ============================================== TOP MENU : END ============================================== -->



    <div class="main-header">



      <div class="container">



        <div class="row">



          <div class="col-xs-12 col-sm-12 col-md-3 logo-holder">



            <!-- ============================================================= LOGO ============================================================= -->



            <div class="logo"> <a href="<?php echo site_url(); ?>"> <img src="<?php echo theme_url(); ?>images/logo.png" alt="MAG International" title="MAG International"> </a> </div>



            <!-- /.logo -->



            <!-- ============================================================= LOGO : END ============================================================= -->



          </div>



          <!-- /.logo-holder -->



          <div class="col-xs-12 col-sm-12 col-md-7 top-search-holder">



            <!-- /.contact-row -->



            <!-- ============================================================= SEARCH AREA ============================================================= -->



            <div class="search-area">



              <form action="<?php echo site_url('products'); ?>" method="post">



                <div class="control-group">



                  <ul class="categories-filter animate-dropdown">



                    <li class="dropdown"> <a class="dropdown-toggle"  data-toggle="dropdown" href=""><?php echo ($this->session->userdata('lang') == 'p') ? $this->lang->line('categories') : 'Categories'; ?> <b class="caret"></b></a>



                      <ul class="dropdown-menu" role="menu" >



                        <?php

                        foreach ($catRes as $result) {

                          ?>

                          <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo site_url($result['friendly_url']); ?>">- <?php echo ($result['category_name' . $fieldType]) ? $result['category_name' . $fieldType] : $result['category_name']; ?></a></li>



                          <?php

                        }

                        ?>



                      </ul>



                    </li>



                  </ul>



                  <input class="search-field" name="search_keyword" placeholder="Search here..." />



                  <a class="search-button" href="<?php echo site_url('products'); ?>" ></a> </div>



              </form>



            </div>



            <!-- /.search-area -->



            <!-- ============================================================= SEARCH AREA : END ============================================================= -->



          </div>



          <!-- /.top-search-holder -->



          <div class="col-xs-12 col-sm-12 col-md-2 animate-dropdown top-cart-row">



            <!-- ============================================================= SHOPPING CART DROPDOWN ============================================================= -->

            <div class="dropdown dropdown-cart"> <a href="#" class="dropdown-toggle lnk-cart" data-toggle="dropdown">

                <div class="items-cart-inner">

                  <div class="basket"> <i class="glyphicon glyphicon-shopping-cart"></i> </div>

                  <div class="basket-item-count"><span class="count"><?php echo count($this->cart->contents()); ?></span></div>

                  <div class="total-price-basket"> <span class="lbl"><?php //$this->lang->line('cart') 

                        echo ($this->session->userdata('lang') == 'p') ? '' : 'cart';

                        ?> -</span> <span class="total-price"> <span class="value" style="font-size:11px;"><?php $cprice = (int) $this->cart->total();

                      echo display_price($cprice);

                        ?></span> </span> </div>

                </div>

              </a>

              <?php

              if (count($this->cart->contents()) > 0) {

                ?>



                <ul class="dropdown-menu">



                  <li>



                    <div class="cart-item product-summary">



                      <?php

                      $cart = $this->cart->contents();



                      $totalAmount = $pprice = 0;



                      foreach ($cart as $items) {



                        //trace($items);



                        $pprice = $items['price'] * $items['qty'];



                        $totalAmount += $pprice;



                        $img = get_db_field_value("wl_products_media", "media", "WHERE products_id='" . $items['pid'] . "'");

                        ?>



                        <div class="row">



                          <div class="col-xs-4">



                            <div class="image"> <a href="<?php echo site_url($items['name']); ?>"><img src="<?php echo get_image('product_images', $img, '100', '122', 'R'); ?>" alt=""></a> </div>



                          </div>



                          <div class="col-xs-7">



                            <h3 class="name"><a href="<?php echo site_url($items['name']); ?>"><?php echo $items['origname']; ?></a></h3>



                            <div class="price"><?php echo display_price($pprice); ?></div>



                          </div>



                          <div class="col-xs-1 action"> <a href="<?php echo site_url(); ?>cart/remove_item/<?php echo $items['rowid']; ?>"><i class="fa fa-trash"></i></a> </div>



                        </div>



                        <?php

                      }

                      ?>



                    </div>



                    <!-- /.cart-item -->



                    <div class="clearfix"></div>



                    <hr>



                    <div class="clearfix cart-total">



                      <div class="pull-right"> <span class="text"><?php echo ($this->session->userdata('lang') == 'p') ? $this->lang->line('subtotal') : 'Sub Total'; ?> :</span><span class='price'><?php echo display_price($totalAmount); ?></span> </div>



                      <div class="clearfix"></div>



                      <a href="<?php echo site_url('cart'); ?>" class="btn btn-upper btn-primary btn-block m-t-20"><?php echo ($this->session->userdata('lang') == 'p') ? $this->lang->line('checkout') : 'Checkout'; ?></a> </div>



                    <!-- /.cart-total-->



                  </li>



                </ul>



                <?php

              }

              ?>



              <!-- /.dropdown-menu-->



            </div>



            <!-- /.dropdown-cart -->



            <!-- ============================================================= SHOPPING CART DROPDOWN : END============================================================= -->



          </div>



          <!-- /.top-cart-row -->



        </div>



        <!-- /.row -->



      </div>



      <!-- /.container -->



    </div>



    <!-- /.main-header -->



    <!-- ============================================== NAVBAR ============================================== -->



    <div class="header-nav animate-dropdown">



      <div class="container">



        <div class="yamm navbar navbar-default" role="navigation">



          <div class="navbar-header">



            <button data-target="#mc-horizontal-menu-collapse" data-toggle="collapse" class="navbar-toggle collapsed" type="button"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>



          </div>



          <div class="nav-bg-class">



            <div class="navbar-collapse collapse" id="mc-horizontal-menu-collapse">



              <div class="nav-outer">



                <ul class="nav navbar-nav">



                  <li class="<?php echo ($this->router->fetch_class() == 'home') ? 'active' : ''; ?> dropdown yamm-fw"> <a href="<?php echo site_url(); ?>" data-hover="dropdown" ><?php echo ($this->session->userdata('lang') == 'p') ? $this->lang->line('home') : 'Home'; ?></a> </li>







                  <?php

                  if (is_array($res) && !empty($res)) {



                    foreach ($res as $val) {



                      $resSub = $this->db->query("SELECT * FROM wl_categories WHERE status = '1' AND parent_id = '" . $val['category_id'] . "' ORDER BY sort_order limit 0,3")->result_array();



                      //trace($val);



                      $cat = $this->uri->segment(1);

                      ?>



                                          <li class="dropdown mega-menu <?php echo (strtolower($cat) == strtolower($val['friendly_url'])) ? 'active' : ''; ?>"> <a href="<?php echo site_url($val['friendly_url']); ?>" data-hover="dropdown" class="dropdown-toggle" ><?php echo ($val['category_name' . $fieldType]) ? $val['category_name' . $fieldType] : $val['category_name']; ?><!--<span class="menu-label hot-menu hidden-xs">hot</span> --></a>



                        <?php

                        if (is_array($resSub) && !empty($resSub)) {

                          ?>



                          <ul class="dropdown-menu container">



                            <li>



                              <div class="yamm-content">



                                <div class="row">



                                  <?php

                                  foreach ($resSub as $sval) {



                                    $resSub1 = $this->db->query("SELECT * FROM wl_categories WHERE status = '1' AND parent_id = '" . $sval['category_id'] . "' limit 0,5")->result_array();

                                    ?>



                                    <div class="col-xs-12 col-sm-12 col-md-2 col-menu">



                                      <h2 class="title"><a href="<?php echo site_url($sval['friendly_url']); ?>"><?php echo ($sval['category_name' . $fieldType]) ? $sval['category_name' . $fieldType] : $sval['category_name']; ?></a></h2>



                                      <ul class="links">



                                        <?php

                                        foreach ($resSub1 as $pval) {

                                          ?>



                                          <li><a href="<?php echo site_url($pval['friendly_url']); ?>"><?php echo ($pval['category_name' . $fieldType]) ? $pval['category_name' . $fieldType] : $pval['category_name']; ?></a></li>



                                          <?php

                                        }

                                        ?>



                                      </ul>



                                    </div>



                                    <?php

                                  }

                                  $filename = UPLOAD_DIR.'/category/'.$sval['category_image'];

                                  if ($sval['category_image']!= '' && file_exists($filename)) {

                                    ?>

                                    <div class="col-xs-12 col-sm-12 col-md-6 col-menu custom-banner"> <a href="<?php echo site_url($sval['friendly_url']); ?>"><img alt="" src="<?php echo get_image('category', $sval['category_image'], '535', '250', 'R'); ?>"></a> 

                                    </div>

                                    <?php

                                  }

                                  ?>



                                </div>



                              </div>



                            </li>



                          </ul>







                          <?php

                        }

                        ?>



                      </li>



                      <?php

                    }

                  }

                  ?>















                </ul>



                <!-- /.navbar-nav -->



                <div class="clearfix"></div>



              </div>



              <!-- /.nav-outer -->



            </div>



            <!-- /.navbar-collapse -->



          </div>



          <!-- /.nav-bg-class -->



        </div>



        <!-- /.navbar-default -->



      </div>



      <!-- /.container-class -->



    </div>



    <!-- /.header-nav -->



    <!-- ============================================== NAVBAR : END ============================================== -->



  </header>