<?php $this->load->view("top_application"); ?>
<!-- breadcrumb -->
<div class="breadcrumb-holder white-bg">
  <div class="container">
    <div class="breadcrumbs">
      <ul>
        <li><a href="<?php echo site_url(); ?>">Home</a></li>
        <li>How to download</li>
      </ul>
    </div>
  </div>
</div>
<!-- Breadcrumb -->
<main class="main-content">

  <div class="product-grid-holder tc-padding">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="head">
            <h2 class="text-center"><span style="border-bottom:1px solid #252525;"><?php echo $content['page_name']; ?></span></h2>
          </div>
          <div class="row1">
            <?php echo $content['page_description']; ?>   
          </div>
        </div>
      </div>
    </div>
  </div>
</main>
<?php $this->load->view("bottom_application"); ?>