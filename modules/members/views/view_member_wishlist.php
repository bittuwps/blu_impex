<?php
$this->load->view("top_application");
//$total_records=0;
?>
<div class="columns-container">
  <div class="container" id="columns">
    <!-- breadcrumb -->
    <div class="breadcrumb clearfix">
      <a class="home" href="<?php echo site_url(); ?>" title="Return to Home"><?php echo ($this->session->userdata('lang') == 'p') ? $this->lang->line('home') : 'Home'; ?></a>
      <span class="navigation-pipe">/</span>
      <span class="navigation_page"><?php echo ($this->session->userdata('lang') == 'p') ? $this->lang->line('wishlist') : 'My Wishlist'; ?></span>
    </div>
    <!-- ./breadcrumb -->
    <!-- page heading-->
    <div class="container">
      <p> 
        <?php
        validation_message();
        error_message();
        ?>
      </p>
      <h1 class="page-heading">
        <span class="page-heading-title2"><?php echo ($this->session->userdata('lang') == 'p') ? $this->lang->line('wishlist') : 'My Wishlist'; ?></span>
      </h1>
    </div>
    <!-- ../page heading-->
    <div class="page-content ">
      <div class="row">
        <div class="column col-xs-12 col-sm-3" id="left_column">
          <!-- block category -->
          <?php $this->load->view('members/left'); ?>
          <!-- ./block category  -->
        </div>
        <div class="col-xs-12 col-sm-9 member-area" >
          <?php
          if (is_array($wishlist) && !empty($wishlist)) {
            ?>
            <div class="orderdetail">
              <div class="row">
                <div class="col-xs-12 col-sm-12">
                  <strong><?php echo ($this->session->userdata('lang') == 'p') ? $this->lang->line('wishlist') : 'Wishlist'; ?> - <?php echo $total_records; ?> <?php echo ($this->session->userdata('lang') == 'p') ? $this->lang->line('items') : 'Item(s)'; ?> </strong>
                </div>
              </div>
            </div>
            <ul class="row list-wishlist">
              <?php
              foreach ($wishlist as $key => $val) {
                $prodets = $this->product_model->get_products('1', '0', array("productid" => $val['products_id']));
                //trace($prodets);
                ?>
                <li class="col-sm-3">
                  <div class="product-img">
                    <a href="<?php echo site_url($prodets[0]['friendly_url']); ?>"><img src="<?php echo get_image('product_images', $prodets[0]['media'], '80', '80', 'R'); ?>" alt="<?php echo $prodets[0]['product_name']; ?>"></a>
                  </div>
                  <h5 class="product-name">
                    <a href="<?php echo site_url($prodets[0]['friendly_url']); ?>"><?php echo $prodets[0]['product_name']; ?></a>
                  </h5>
                  <div class="button-action">
                    <a href="<?php echo site_url($prodets[0]['friendly_url']); ?>"><button style="margin-right: 42px;" class="button button-sm"><?php echo ($this->session->userdata('lang') == 'p') ? $this->lang->line('addtocart') : 'Add to Cart'; ?></button></a>
                    <a href="<?php echo site_url(); ?>members/remove_wishlist/<?php echo $val['id']; ?>"><i class="fa fa-close"></i></a>
                  </div>
                </li>
                <?php
              }
              ?>
            </ul>
            <?php
          } else {
            ?>
            <div style="min-height: 300px;">
              <div class="alert alert-danger">
                <strong><?php echo ($this->session->userdata('lang') == 'p') ? $this->lang->line('error') : 'Error'; ?>!</strong> <?php echo ($this->session->userdata('lang') == 'p') ? $this->lang->line('no_result') : 'No Record(s) found' ?>!
              </div>
            </div>
            <?php
          }
          ?>
        </div>
      </div>
    </div>
  </div>
</div>
<?php $this->load->view("bottom_application"); ?>