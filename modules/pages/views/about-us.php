<?php
$this->load->view('top_application'); 
?>

<section class="inner_header" style="background-image:url('<?php echo theme_url();?>images/about/about.jpg')" alt=""
    title="">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="cat_title">
                    <?php echo $content['page_name'];?>
                </div>
                <div class="clearfix"></div>
                <div class="cat_title2">
                    Scientific & Technological Equipment Corporation.
                </div>
            </div>
        </div>
    </div>
</section>
<section class="breadcrumb_section hidden-xs">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <ul class="breadcrumb">
                    <li><a href="javascript:void()" title="Home">Home</a></li>
                    <li class="active">
                        <?php echo $content['page_name'];?>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>
<section class="cat_section">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12 col-lg-push-3 col-md-push-3">
                <div class="right_section">
                    <h1>
                        <?php echo $content['page_name'];?>
                    </h1>
                    <div class="details-image">
                        <img src="<?php echo theme_url();?>images/home/about/construction-split-img1.jpg" class="img-responsive" alt=""
                            title="">
                    </div>
                    <?php echo $content['page_description'];?>
                </div>


            </div>


            <div class="col-md-3 col-md-pull-9">
                <?php $this->load->view('enquiry'); ?>
                <?php $this->load->view('pages/left'); ?>

            </div>
        </div>
    </div>
</section>


<?php $this->load->view('bottom_application'); ?>