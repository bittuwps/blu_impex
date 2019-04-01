<?php $this->load->view("top_application"); ?>
<div class="clearfix"></div>

<div class="main-content">
    <section class="sub-property">
        <div class="container">
            <div class="main-property">

                <div class="row">
                    <div class="col-sm-12">
                        <h3><span>SUBMIT YOUR PROPERTY</span></h3>
                    </div>
                    <div class=" maxwidth-lg">
                        <div class="property-content ">

                            <div class=" side-body">
                                <div>
                                    <!-- Nav tabs -->
                                    <ul class="nav nav-tabs" role="tablist">
                                        <li role="presentation" class="active border-r8"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Rent</a></li>
                                        <li role="presentation" class="border-r8"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">PG/Hostel</a></li>
                                        <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Flatmate</a></li>

                                    </ul>
                                    <!-- Tab panes -->

                                    <!-- Messages -->
                                    <div class="error_message_head" style="margin-left: 50px; width: 100%; display: none;">
                                        <p class="red b">Required Fields*</p>
                                        <div class="error_message validation_msg">
                                        </div>
                                    </div>

                                    <div class="success_message_head" style="margin-left: 50px; width: 100%; display: none;">
                                        <div class="success_message success">
                                        </div>
                                    </div>
                                    <!-- Message End here -->

                                    <div class="tab-content">
                                        <div role="tabpanel" class="tab-pane active" id="home">
                                            <form class="form-horizontal submit_property" id="form_rent">
                                                <div class="form-group">
                                                    <div class="col-sm-6">
                                                        <select class="form-control" name="rent_city" id="rent_city">
                                                            <option value="">Select City</option>
                                                            <?php echo city_options('collection', ''); ?>
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-6" id="rent_div">
                                                        <input type="text" class="form-control autocomplete" name="locality_rent" placeholder="Locality" id="locality_rent" />
                                                        <input type="hidden" class="cityLat" name="cityLat_rent" value="" />
                                                        <input type="hidden" class="cityLng" name="cityLng_rent" value="" />
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-6">
                                                        <input type="text" name="email_rent" id="email_rent" class="form-control" id="inputEmail3" placeholder="Email">
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <input type="text" name="phone_rent" id="phone_rent" class="form-control" id="inputEmail3" placeholder="Contact No.">
                                                    </div>
                                                </div>  
                                                <div class="form-group">
                                                    <div class="col-sm-6">
                                                        <input type="text" class="form-control" name="address_rent" id="rent_address" placeholder="Full Address">
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <select class="form-control" name="bhk_type_rent" id="bhk_type_rent">
                                                            <option value="">Select BHK Type</option>
                                                            <?php
                                                            foreach ($bhk_array as $key => $val) {
                                                              ?>
                                                              <option value="<?php echo $key; ?>"><?php echo $val; ?></option>
                                                              <?php
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="col-sm-8">
                                                        <button type="submit" class="btn button-search btn-width-md" id="btn_rent" >Submit</button>
                                                        <input type="hidden" name="property_type" value="1" />
                                                    </div>
                                                </div>
                                            </form>
                                        </div>

                                        <div role="tabpanel" class="tab-pane" id="profile">            
                                            <form class="form-horizontal submit_property" id="form_pg">
                                                <div class="form-group">
                                                    <div class="col-sm-6">
                                                        <select class="form-control" name="pg_city" id="pg_city">
                                                            <option value="">Select City</option>
                                                            <?php echo city_options('collection', ''); ?>
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-6"  id="pg_div">
                                                        <input type="text" class="form-control autocomplete" name="locality_pg" id="locality_pg" placeholder="Locality">
                                                        <input type="hidden" class="cityLat" name="cityLat_pg" value="" />
                                                        <input type="hidden" class="cityLng" name="cityLng_pg" value="" />
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-6">
                                                        <input type="text" name="email_pg" id="email_pg" class="form-control" id="email_pg" placeholder="Email">
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <input type="text" name="phone_pg" id="phone_pg" class="form-control" id="phone_pg" placeholder="Contact No.">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-6">
                                                        <input type="text" name="address_pg" class="form-control" id="address_pg" placeholder="Full Address">
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <select class="form-control" name="available_for" id="available_for">
                                                            <option value="">Available for</option>
                                                            <option value="Male">Male</option>
                                                            <option value="male">Female</option>

                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="col-sm-8">
                                                        <button type="submit" class="btn button-search btn-width-md">Submit</button>
                                                        <input type="hidden" name="property_type" value="2" />
                                                    </div>
                                                </div>
                                            </form>
                                        </div>


                                        <div role="tabpanel" class="tab-pane" id="messages">
                                            <form class="form-horizontal submit_property" id="form_flatmate">
                                                <div class="form-group">
                                                    <div class="col-sm-6">
                                                        <select class="form-control" name="city_flat" id="city_flat">
                                                            <option value="">Select City</option>
                                                            <?php echo city_options('collection', ''); ?>
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-6"  id="flat_div">
                                                        <input type="text" class="form-control autocomplete" id="locality_flat" name="locality_flat" placeholder="Locality">
                                                        <input type="hidden" class="cityLat" name="cityLat_flat" value="" />
                                                        <input type="hidden" class="cityLng" name="cityLng_flat" value="" />
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-6">
                                                        <input type="text" name="email_flat" id="email_pg" class="form-control" id="email_flat" placeholder="Email">
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <input type="text" name="phone_flat" id="phone_pg" class="form-control" id="phone_flat" placeholder="Contact No.">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-6">
                                                        <input type="text" name="address_flat" class="form-control" id="address_flat" placeholder="Full Address">
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <select class="form-control" name="available_for_flat" id="available_for_flat">
                                                            <option value="">Select BHK Type</option>
                                                            <?php
                                                            foreach ($bhk_array as $key => $val) {
                                                              ?>
                                                              <option value="<?php echo $key; ?>"><?php echo $val; ?></option>
                                                              <?php
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="col-sm-8">
                                                        <button type="submit" class="btn button-search btn-width-md">Submit</button>
                                                        <!--button type="button" class="btn button-search btn-width-md submit_flat" data-toggle="modal" data-target="#myModal">Submit</button-->
                                                        <input type="hidden" name="property_type" value="3" />
                                                    </div>
                                                </div>
                                            </form>
                                        </div>

                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <section class="why_choose">
        <div class="container">
            <div class="maxwidth-xl">
                <div class="row">
                    <h3 class="text-center">Why Choose Us</h3> 

                    <div class="col-sm-6">
                        <div class="media">
                            <div class="media-left">
                                <a href="#">
                                    <img class="media-object" src="<?php echo theme_url(); ?>image/real-estate.png" alt="...">
                                </a>
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading">Media heading</h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repudiandae, numquam!</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="media">
                            <div class="media-left">
                                <a href="#">
                                    <img class="media-object" src="<?php echo theme_url(); ?>image/real-estate.png" alt="...">
                                </a>
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading">Media heading</h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repudiandae, numquam!</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="media">
                            <div class="media-left">
                                <a href="#">
                                    <img class="media-object" src="<?php echo theme_url(); ?>image/real-estate.png" alt="...">
                                </a>
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading">Media heading</h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repudiandae, numquam!</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="media">
                            <div class="media-left">
                                <a href="#">
                                    <img class="media-object" src="<?php echo theme_url(); ?>image/real-estate.png" alt="...">
                                </a>
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading">Media heading</h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repudiandae, numquam!</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>

    </section>
    <section class="property-process">
        <div class="container">
            <h3 class="text-center">Property Listing Process</h3>
            <div class="maxwidth-xl">
                <div class="row">


                    <div class="zigzag">


                        <div class="col-lg-12">


                            <article class="pull-right" >
                                <div class="media">

                                    <div class="media-body">
                                        <h4 class="media-heading"><span>1.</span> Locate </h4>
                                        <p>Locate which Local you would like to spend your day at ensure there's space!  </p>
                                    </div>
                                    <div class="media-right">
                                        <a href="#">
                                            <img alt="" src="<?php echo theme_url(); ?>image/01.png">
                                        </a>
                                    </div>
                                </div>


                                <div class="zigzagline"></div>
                            </article>
                        </div>
                        <div class="col-lg-12 wow fadeInLeft" data-wow-duration="2s">
                            <article class="pull-left">
                                <div class="media ">
                                    <div class="media-left">
                                        <a href="#">
                                            <img alt="" src="<?php echo theme_url(); ?>image/02.png" >
                                        </a>
                                    </div>
                                    <div class="media-body">
                                        <h4 class="media-heading"><span>2.</span> Upon arrival..   </h4>
                                        <p>Enter your mobile number on the Kiosk after which you will recieve a text/email with instructions on joining the wifi.</p>
                                    </div>

                                </div>

                                <div class="zigzagline-inverse"></div>
                            </article>

                        </div>
                        <div class="col-lg-12 wow fadeInRight" data-wow-duration="2s">
                            <article class=" pull-right" >
                                <div class="media">

                                    <div class="media-body">
                                        <h4 class="media-heading"><span>3.</span> Find a spot   </h4>
                                        <p>Once checked in, find a seat and we'll take care of the rest. Help yourself to the free refreshments and amenities to keep you fueled for the day.</p>
                                    </div>
                                    <div class="media-right">
                                        <a href="#">
                                            <img alt="" src="<?php echo theme_url(); ?>image/03.png" >
                                        </a>
                                    </div>
                                </div>


                            </article>
                        </div>


                    </div>
                </div>
            </div>

        </div>
    </section>
    <section class="faq">
        <div class="container">
            <div class="row ">
                <h3 class="text-center">FAQ</h3>

                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingOne">
                            <h4 class="panel-title">
                                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    <i class="more-less glyphicon glyphicon-chevron-up"></i>
                                    Why do I need a verified account to use Propertymate.in services?
                                </a>
                            </h4>
                        </div>
                        <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                            <div class="panel-body">
                                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                            </div>
                        </div>
                    </div>

                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingTwo">
                            <h4 class="panel-title">
                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    <i class="more-less glyphicon glyphicon-chevron-down"></i>
                                    How long does it take for email verification?
                                </a>
                            </h4>
                        </div>
                        <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                            <div class="panel-body">
                                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                            </div>
                        </div>
                    </div>

                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingThree">
                            <h4 class="panel-title">
                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    <i class="more-less glyphicon glyphicon-chevron-down"></i>
                                    How long does it take for mobile number verification?
                                </a>
                            </h4>
                        </div>
                        <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                            <div class="panel-body">
                                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                            </div>
                        </div>

                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="heading4">
                            <h4 class="panel-title">
                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse4" aria-expanded="false" aria-controls="collapse4">
                                    <i class="more-less glyphicon glyphicon-chevron-down"></i>
                                    How will I know if my account is verified?
                                </a>
                            </h4>
                        </div>
                        <div id="collapse4" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading4">
                            <div class="panel-body">
                                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                            </div>
                        </div>

                    </div>
                </div><!-- panel-group -->
            </div>
        </div>
    </section>
    <div class="verify-otp">
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">

                    <div class="modal-body">

                        <div class="wizard">
                            <div class="wizard-inner">
                                <div class="clearfix">

                                    <form role="form" class="side-body " id="submit_slot">
                                        <ul class="nav nav-tabs" role="tablist">

                                            <li role="presentation" class="active">
                                                <a href="#step1" data-toggle="tab" aria-controls="step1" role="tab" title="Step 1">
                                                    <span class="round-tab">
                                                        1
                                                    </span>
                                                </a>
                                            </li>

                                            <li role="presentation" class="disabled">
                                                <a href="#step2" data-toggle="tab" aria-controls="step2" role="tab" title="Step 2">
                                                    <span class="round-tab">
                                                        2
                                                    </span>
                                                </a>
                                            </li>
                                            <li role="presentation" class="disabled">
                                                <a href="#step3" data-toggle="tab" aria-controls="step3" role="tab" title="Step 3">
                                                    <span class="round-tab">
                                                        3
                                                    </span>
                                                </a>
                                            </li>

                                        </ul>
                                        <div class="tab-content">
                                            <div class="tab-pane active text-center" role="tabpanel" id="step1">
                                                <div class="col-sm-9 myDiv">
                                                    <h4 class="text-center">Verify Mobile Number</h4>
                                                    <hr>
                                                    <div class="main-body">

                                                        <p>We have sent a One Time Password (OTP) to</p>
                                                        <p><strong id="sent_to_mobile"></strong></p>

                                                        <div class="form-group">
                                                            <div class="col-sm-12">
                                                                <input type="text" class="form-control" placeholder="Enter OTP" id="user_otp">
                                                                <input type="hidden" name="sent_otp_id" id="sent_otp_id" >
                                                            </div>

                                                        </div>
                                                        <div class="clearfix"></div>

                                                        <ul class="list-inline text-center">
                                                            <li>
                                                                <button type="button" class="btn button-search btn-width-md" id="verify_otp" >Verify </button>
                                                                <button type="button" class="btn button-search btn-width-md next-step" style="display: none;" id="verify_otp_next" >Next </button>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="col-sm-3 ">
                                                    <div class="main-body">
                                                        <div class="right-part text-center">
                                                            <img src="<?php echo theme_url(); ?>image/logo-circle.png" alt="">
                                                        </div>
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam laboriosam quibusdam nam minima eveniet! Voluptate dolores molestias possimus. Explicabo, ducimus!</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane" role="tabpanel" id="step2">
                                                <div class="col-sm-9 myDiv">
                                                    <h4 class="text-center">Schedule Property Visit</h4>
                                                    <hr>
                                                    <div class="main-body">
                                                        <p>we can visit you</p>
                                                        <div class="user-info-block">
                                                            <ul class="navigation">
                                                                <li class="active">
                                                                    <a data-toggle="tab" href="#information">
                                                                        Today<br><span class="tab-span" id="today_date" name="today"></span> <span><i class="fa fa-check" aria-hidden="true"></i></span>
                                                                       
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a data-toggle="tab" href="#settings">
                                                                        Tomorrow<br><span class="tab-span" id="tommorow_date" name="tomorrow"></span> <span><i class="fa fa-check" aria-hidden="true"></i></span>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a data-toggle="tab" href="#email">
                                                                        <span id="week_day"> 
                                                                        </span><br> <span class="tab-span " id="third_date" name="third_d"></span> <span><i class="fa fa-check" aria-hidden="true"></i></span>
                                                                    </a>
                                                                </li>

                                                            </ul>
                                                            <div class="user-body">
                                                                <div class="tab-content">
                                                                    <div id="information" class="tab-pane active">
                                                                        <p>Time of Visit</p>

                                                                        <div class="col-sm-3 paddside2">
                                                                            <ul class="nav-sidebar" role="tablist">
                                                                                <li role="presentation" class="active" id="get_today_morning"><a href="#first" aria-controls="home" role="tab" data-toggle="tab">Morning <span class="small-line">No slots Available</span></a>
                                                                                </li>
                                                                                <li role="presentation" id="get_today_noon"><a href="#second" aria-controls="profile" role="tab" data-toggle="tab">Afternoon <span class="small-line">No slots Available</span></a> </li>
                                                                                <li role="presentation" id="get_today_evening" ><a href="#third" aria-controls="messages" role="tab" data-toggle="tab">Evening <span class="small-line">No slots Available</span></a> </li>
                                                                            </ul>
                                                                        </div>
                                                                        <div class="col-sm-9 paddside2 border-all">
                                                                            <div class="tab-content" >
                                                                                <div role="tabpanel" class="tab-pane fade text-center active in" id="first">
                                                                                </div>


                                                                                <div role="tabpanel" class="tab-pane fade" id="second">

                                                                                </div>
                                                                                <div role="tabpanel" class="tab-pane fade" id="third">

                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="clearfix"></div>
                                                                    </div>
                                                                    <div id="settings" class="tab-pane">
                                                                        <p>Time of Visit</p>

                                                                        <div class="col-sm-3 paddside2">
                                                                            <ul class="nav-sidebar" role="tablist">
                                                                                <li role="presentation" class="active">
                                                                                    <a href="#first1" aria-controls="home" role="tab" data-toggle="tab" id="get_tomorrow_morning">Morning <span class="small-line">No slots Available</span></a>
                                                                                </li>
                                                                                <li role="presentation"><a href="#second1" aria-controls="profile" role="tab" data-toggle="tab" id="get_tomorrow_noon">Afternoon <span class="small-line">No slots Available</span></a> </li>
                                                                                <li role="presentation"><a href="#third1" aria-controls="messages" role="tab" data-toggle="tab" id="get_tomorrow_evening">Evening <span class="small-line">No slots Available</span></a> </li>
                                                                            </ul>
                                                                        </div>
                                                                        <div class="col-sm-9 paddside2 border-all">
                                                                            <div class="tab-content">
                                                                                <div role="tabpanel" class="tab-pane fade active in text-center" id="first1">

                                                                                </div>
                                                                                <div role="tabpanel" class="tab-pane fade" id="second1">

                                                                                </div>
                                                                                <div role="tabpanel" class="tab-pane fade" id="third1">

                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="clearfix"></div>
                                                                    </div>
                                                                    <div id="email" class="tab-pane">
                                                                        <p>Time of Visit</p>

                                                                        <div class="col-sm-3 paddside2">
                                                                            <ul class="nav-sidebar" role="tablist">
                                                                                <li role="presentation" class="active"><a href="#first2" aria-controls="home" role="tab" data-toggle="tab" id="get_third_morning">Morning <span class="small-line">No slots Available</span></a>
                                                                                </li>
                                                                                <li role="presentation"><a href="#second2" aria-controls="profile" role="tab" data-toggle="tab" id="get_third_noon">Afternoon <span class="small-line">No slots Available</span></a> </li>
                                                                                <li role="presentation" id="get_third_evening"><a href="#third2" aria-controls="messages" role="tab" data-toggle="tab">Evening <span class="small-line">No slots Available</span></a> </li>
                                                                            </ul>
                                                                        </div>
                                                                        <div class="col-sm-9 paddside2 border-all">
                                                                            <div class="tab-content">
                                                                                <div role="tabpanel" class="tab-pane fade active in text-center" id="first2">

                                                                                </div>
                                                                                <div role="tabpanel" class="tab-pane fade" id="second2">

                                                                                </div>
                                                                                <div role="tabpanel" class="tab-pane fade" id="third2">

                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="clearfix"></div>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="clearfix bottom-part">
                                                            <p class="pull-left">Can't find a slot ? <a href="#">Request a call back</a></p>
                                                            <ul class="list-inline pull-right">
                                                                <li>
                                                                    <button type="button" class="btn button-search btn-width-md prev-step">Previous</button>
                                                                </li>
                                                                <li>
                                                                    <button type="submit" class="btn button-search-line btn-width-md next-step">Book <span>Friday at 9.00 a.m</span> </button>
                                                                </li>
                                                            </ul>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="main-body">
                                                        <div class="right-part text-center">
                                                            <img src="<?php echo theme_url(); ?>image/logo-circle.png" alt="">

                                                        </div>
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut sapiente earum magnam quae dolor soluta sunt quibusdam minima natus consequuntur.</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane" role="tabpanel" id="step3">
                                                <div class="col-sm-9 ">
                                                    <div class="myDiv">
                                                        <h4 class="text-center">Thank You</h4>
                                                        <hr>
                                                        <div class="main-body text-center">

                                                            <p>We will call you soon to schedule a visit for data collection</p>
                                                            <div class="tanku">
                                                                <div class="col-sm-4">
                                                                    <img src="<?php echo theme_url(); ?>image/real-estate.png" alt="">
                                                                    <p>Property visit has been scheduled</p>
                                                                </div>
                                                                <div class="col-sm-4">
                                                                    <img src="<?php echo theme_url(); ?>image/house.png" alt="">
                                                                    <p>Property visit has been scheduled</p>
                                                                </div>
                                                                <div class="col-sm-4">
                                                                    <img src="<?php echo theme_url(); ?>image/real-estate.png" alt="">
                                                                    <p>Property visit has been scheduled</p>
                                                                </div>
                                                                <div class="clearfix"></div>
                                                            </div>

                                                            <ul class="list-inline text-center">
                                                                <li>
                                                                    <button type="button" class="btn button-search btn-width-md next-step">List another property</button>
                                                                </li>
                                                            </ul>

                                                        </div>
                                                    </div>
                                                    <p class="support">You can also email us at <a href="">support@gmail.com</a></p> 
                                                </div>
                                                <div class="col-sm-3 ">
                                                    <div class="main-body">
                                                        <div class="right-part text-center">
                                                            <img src="<?php echo theme_url(); ?>image/logo-circle.png" alt="">
                                                        </div>
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores enim, alias nesciunt provident aliquam eaque? Iusto, asperiores aut tempore! Assumenda.</p>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="clearfix"></div>
                                        </div>
                                        
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <?php $this->load->view("bottom_application"); ?>

    <script type="text/javascript">
      //Submit property
      $('.submit_property').submit(function (event) {
          event.preventDefault();
          var formData = new FormData(jQuery(this)[0]);
          jQuery.ajax({
              url: "<?php echo site_url(); ?>pages/submit_property_api",
              type: "POST",
              data: formData,
              async: false,
              success: function (msg) {
                  obj = jQuery.parseJSON(msg);
                  if (obj.success == true) {
                      $('#sent_otp_id').val(obj.sent_otp_id);
                      $('#sent_to_mobile').html(obj.mobile_number);
                      $('#today_date').html(obj.todays_date);
                      $('#tommorow_date').html(obj.tomorrows_date);
                      $('#third_date').html(obj.thirds_date);
                      $('#week_day').html(obj.week_days);
                      $('#week_day').val(obj.week_days);
                      $('#myModal').modal('show');
                  } else {
                      jQuery('.error_message_head').show(0);
                      jQuery('.error_message').html(obj.error);
                  }

                  setTimeout(function () {
                      jQuery('.error_message').html('');
                      jQuery('.error_message_head').hide(0);
                  }, 5000);
              },
              cache: false,
              contentType: false,
              processData: false
          });

      });




      $('#submit_slot').submit(function (event) {
          //alert("here");
          event.preventDefault();
          var formData = new FormData(jQuery(this)[0]);
          //alert(formData);
          jQuery.ajax({
              url: "<?php echo site_url(); ?>pages/submit_slot_api",
              type: "POST",
              data: formData,
              async: false,
              success: function (msg) {
                  obj = jQuery.parseJSON(msg);
                  if (obj.success == true) {
                      $('#sent_otp_id').val(obj.sent_otp_id);

                  } else {
                      jQuery('.error_message_head').show(0);
                      jQuery('.error_message').html(obj.error);
                  }

                  setTimeout(function () {
                      jQuery('.error_message').html('');
                      jQuery('.error_message_head').hide(0);
                  }, 5000);
              },
              cache: false,
              contentType: false,
              processData: false
          });

      });

      //End

      //Map
      $(window).load(function () {
          initialize();
      })

      function initialize() {
          var autocomplete = {};
          var autocompletesWraps = ['rent_div', 'pg_div', 'flat_div'];
          var source_div_form = {
          };
          var destination_div_form = {
          };
          $.each(autocompletesWraps, function (index, name) {
              if ($('#' + name).length == 0) {
                  return;
              }
              autocomplete[name] = new google.maps.places.Autocomplete($('#' + name + ' .autocomplete')[0], {types: ['geocode']});
              google.maps.event.addListener(autocomplete[name], 'place_changed', function () {
                  var place = autocomplete[name].getPlace();
                  var latit = place.geometry.location.lat();
                  var lngti = place.geometry.location.lng();
                  $('#' + name).children('.cityLat').val(latit);
                  $('#' + name).children('.cityLng').val(lngti);
              });
          });
      }
    </script>
<!--    <script type="text/javascript">
      $(document).ready(function () {
          $('#verify_otp').click(function () {
              sent_otp_id = $('#sent_otp_id').val();
              user_otp = $('#user_otp').val();
              $.post('<?php echo base_url('/pages/verify_otp'); ?>',
                      {
                          sent_otp_id: sent_otp_id,
                          user_otp: user_otp
                      },
                      function (data, status) {
                          if (data == 'success') {
                              alert('success');
                              $('#verify_otp').hide();
                              $('#verify_otp_next').show();
                          } else if (data == 'failed') {
                              alert('Incorrect OTP');
                          } else {
                              alert('something went wrong.please try again.');
                          }
                      });
          });
      });
    </script>-->

    <script>
      $(document).ready(function () {
          $("#verify_otp_next,#today_date,#get_today_morning").click(function () {
              $.ajax({
                  type: "POST",
                  url: "<?php echo site_url(); ?>pages/get_today_date",
                  success: function (data) {
                      $('#first').html(data);
                  }
              });
          });
          $("#get_today_noon").click(function () {
              $.ajax({
                  type: "POST",
                  url: "<?php echo site_url(); ?>pages/get_today_noon",
                  success: function (data) {
                      $('#second').html(data);
                  }
              });
          });
          $("#get_today_evening").click(function () {
              $.ajax({
                  type: "POST",
                  url: "<?php echo site_url(); ?>pages/get_today_evening",
                  success: function (data) {
                      $('#third').html(data);
                  }
              });
          });
          $("#get_tomorrow_morning").click(function () {
              $.ajax({
                  type: "POST",
                  url: "<?php echo site_url(); ?>pages/get_tomorrow_date",
                  success: function (data) {
                      $('#first1').html(data);
                  }
              });
          });
          $("#get_tomorrow_noon").click(function () {
              $.ajax({
                  type: "POST",
                  url: "<?php echo site_url(); ?>pages/get_tomorrow_noon",
                  success: function (data) {
                      $('#second1').html(data);
                  }
              });
          });
          $("#get_tomorrow_evening").click(function () {
              $.ajax({
                  type: "POST",
                  url: "<?php echo site_url(); ?>pages/get_tomorrow_evening",
                  success: function (data) {
                      $('#third1').html(data);
                  }
              });
          });
          $("#get_third_morning").click(function () {
              $.ajax({
                  type: "POST",
                  url: "<?php echo site_url(); ?>pages/get_third_date",
                  success: function (data) {
                      $('#first2').html(data);
                  }
              });
          });
          $("#get_third_noon").click(function () {
              $.ajax({
                  type: "POST",
                  url: "<?php echo site_url(); ?>pages/get_third_noon",
                  success: function (data) {
                      $('#second2').html(data);
                  }
              });
          });
          $("#get_third_evening").click(function () {
              $.ajax({
                  type: "POST",
                  url: "<?php echo site_url(); ?>pages/get_third_evening",
                  success: function (data) {
                      $('#third2').html(data);
                  }
              });
          });
      });
    </script>
    <script>
      $(document).ready(function () {
          $("#tommorow_date").click(function () {
              $.ajax({
                  type: "POST",
                  url: "<?php echo site_url(); ?>pages/get_tomorrow_date",
                  success: function (data) {
                      $('#first1,#second1,#third1').html(data);

                  }
              });
          });
      });
    </script>
    <script>
      $(document).ready(function () {
          $('#third_date').click(function () {
              $.ajax({
                  type: "POST",
                  url: "<?php echo site_url(); ?>pages/get_third_date",
                  success: function (data) {
                      $('#first2,#second2,#third2').html(data);
                  }
              });
          });
      });
    </script>


    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=places&key=AIzaSyAJXNyxl3nY8GC2UgHuthoGx7cEFITm50Y"></script>