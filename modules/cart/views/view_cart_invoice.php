<?php $this->load->view("top_application"); ?>
<!-- Main Content -->
<main class="main-content">
  <div class="breadcrumb-holder white-bg">
    <div class="container">
      <div class="breadcrumbs">
        <ul>
          <li><a href="<?php echo site_url(); ?>">Home</a></li>
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
            //trace($ordmaster);
            $gTotal = 0;
            foreach ($orddetail as $key => $val) {
              $gTotal += $val['product_price'] * $val['quantity'];
              //trace($val);
              ?>
              <tr>
                <td>
                  <p><?php echo $val['product_name']; ?></p>
                </td>
                <td><?php echo $val['quantity']; ?></td>
                <td><i class="fa fa-dollar"></i> <?php echo $val['product_price'] * $val['quantity']; ?></td>
              </tr>
              <?php
            }
            ?>
          </tbody>
          <tfoot>
            <tr>
              <td colspan="2"><strong>Payment Method:</strong></td>
              <td><?php echo $ordmaster['payment_method']; ?></td>
            </tr>
            <?php
            if ($ordmaster['payment_method'] == 'Cash') {
              ?>
              <tr>
                <td colspan="2"><strong>Subtotal:</strong></td>
                <td><i class="fa fa-rupee"> <?php echo $gTotal; ?></td>
              </tr>
              <tr>
                <td colspan="2"><strong>COD Changes :</strong></td>
                <td><i class="fa fa-rupee"> 50</td>
              </tr>
              <tr>
                <td colspan="2"><strong>Total:</strong></td>
                <td><i class="fa fa-rupee"></i> <?php echo $gTotal + 50; ?></td>
              </tr>
              <?php
            } else {
              ?>
              <tr>
                <td colspan="2"><strong>Total:</strong></td>
                <td><i class="fa fa-rupee"></i> <?php echo $gTotal; ?></td>
              </tr>
              <?php
            }
            ?>


          </tfoot>
        </table>
      </div>

    </div>

  </section>

</main>
<!-- Main Content -->
<?php $this->load->view("bottom_application"); ?>