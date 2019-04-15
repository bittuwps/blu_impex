<?php $this->load->view('top_application'); ?>


<!-- breadcrumb -->
<div class="breadcrumb-holder white-bg">
  <div class="container">
    <div class="breadcrumbs">
      <ul>
        <li><a href="<?php echo site_url(); ?>">Home</a></li>
        <li><?php echo $title; ?></li>
      </ul>
    </div>
  </div>
</div>
<!-- Breadcrumb -->

<!-- Main Content -->
<main class="main-content">

  <!-- Contant Holder -->
  <div class="tc-padding">
    <div class="container">
      <!-- Address Columns -->
      <div class="tc-padding-bottom">
        <div class="row">
          <div class="sec-heading">
            <h3><?php echo $title; ?></h3>
          </div>
        </div>
      </div>
      <!-- Address Columns -->     

      <!-- Form -->
      <div class="form-holder">
        <!-- Sending Form -->
        <?php echo $terms; ?>
        <!-- Sending Form -->

      </div>
      <!-- Form -->

    </div>
  </div>
  <!-- Contant Holder -->

</main>
<!-- Main Content -->
<?php $this->load->view('bottom_application'); ?>