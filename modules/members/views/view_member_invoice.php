<?php $this->load->view("top_application"); ?>
<!-- Main Content -->
<main class="main-content">
  <div class="breadcrumb-holder white-bg">
    <div class="container">
      <div class="breadcrumbs">
        <ul>
          <li><a href="#">Home</a></li>
          <li>Order Details</li>
        </ul>
      </div>
    </div>
  </div>
  <section class="stepsWrapper">
    <div class="container">
      <div class="maxwidth800">
        <div class="sec-heading">
          <h3>Order Details</h3>
        </div>
        <table class="table table-bordered table-hover">
          <thead>
            <tr>
              <th>Product</th>
              <th>Quantity</th>
              <th>Price</th>
            </tr>
          </thead>
          <tbody>

            <?php
            $gTotal = 0;
            foreach ($orddetail as $key => $val) {
              $gTotal += $val['product_price'];
              //trace($val);
              ?>
              <tr>
                <td>
                  <p><?php echo $val['product_name']; ?></p>
                  <?php
                  if ($ordmaster['payment_status'] == 'Paid') {
                    $productFile = get_db_field_value('wl_products', 'product_file', "WHERE products_id='" . $val['products_id'] . "'");
                    ?>
                    <p class="terms">Download: <a href="<?php echo site_url(); ?>uploaded_files/product_images/document/<?php echo $productFile; ?>">TB-<?php echo $val['product_code']; ?></a></p>
                    <?php
                  }
                  ?>

                </td>
                <td><?php echo $val['quantity']; ?></td>
                <td><i class="fa fa-rupee"></i> <?php echo $val['product_price']; ?></td>
              </tr>
              <?php
            }
            ?>
          </tbody>
          <tfoot>
            <!--tr>
              <td colspan="2"><strong>Subtotal:</strong></td>
              <td>200.00</td>
            </tr-->
            <tr>
              <td colspan="2"><strong>Payment Method:</strong></td>
              <td>Paypal</td>
            </tr>
            <tr>
              <td colspan="2"><strong>Total:</strong></td>
              <td><i class="fa fa-rupee"></i> <?php echo $gTotal; ?></td>
            </tr>
          </tfoot>
        </table>
      </div>

    </div>

  </section>

</main>
<!-- Main Content -->
<?php $this->load->view("bottom_application"); ?>