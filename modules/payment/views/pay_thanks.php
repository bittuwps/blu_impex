<?php 
$this->load->view("top_application"); 
//trace($ordmaster);
?>
<style type="text/css">
  .text{padding: 10px 0px 0px 15px; margin-bottom: 20px; color:#090; font-weight: 700;}
  .textBig{color:#267904f5;font-size: 16px; font-weight: bold}
</style>
<div class="columns-container">
  <div class="container" id="columns">
    <div class="box-breadcrumbs col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <div class="breadcrumb clearfix">
        <a class="home" href="<?php echo site_url(); ?>" title="Return to Home"><?php echo ($this->session->userdata('lang') == 'p')?$this->lang->line('home'):'Home';?></a>
        <span class="navigation-pipe">&nbsp;</span>
        <span class="navigation_page"><?php echo ($this->session->userdata('lang') == 'p')?$this->lang->line('payment_thanks'):'Payment Thanks';?></span>
      </div>
    </div>
    <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12 ">
      
      <div class="text">
        Hey <?php echo ucwords($ordmaster['first_name']); ?>,<br /><br />
        <span class="textBig">Your Order #<?php echo $ordmaster['invoice_number'] ;?> is Confirmed!</span><br /><br />
        Thanks for Shopping! We will get back soon with more details regarding your order and its status.
      </div>
      
      <div class="block-content login-content">
        <table class="table table-bordered table-hover">
          <thead>
            <tr>
              <th><?php echo ($this->session->userdata('lang') == 'p')?$this->lang->line('product'):'Product';?></th>
              <th><?php echo ($this->session->userdata('lang') == 'p')?$this->lang->line('qty'):'Quantity';?></th>
              <th><?php echo ($this->session->userdata('lang') == 'p')?$this->lang->line('price'):'Price';?></th>
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
                <td align="right"> <?php echo display_price($val['product_price'] * $val['quantity']); ?></td>
              </tr>
              <?php
            }
            ?>
          </tbody>
          <tfoot>
            <tr>
              <td colspan="2"><strong><?php echo ($this->session->userdata('lang') == 'p')?$this->lang->line('payment_method'):'Payment Method';?>:</strong></td>
              <td align="right"><?php echo $ordmaster['payment_method']; ?></td>
            </tr>
            <?php
            if ($ordmaster['payment_method'] == 'Cash') {
              ?>
              <tr>
                <td colspan="2"><strong><?php echo ($this->session->userdata('lang') == 'p')?$this->lang->line('subtotal'):'Subtotal';?>:</strong></td>
                <td align="right"> <?php echo display_price($gTotal); ?></td>
              </tr>
              <tr>
                <td colspan="2"><strong><?php echo ($this->session->userdata('lang') == 'p')?$this->lang->line('codcharges'):'COD Changes';?>:</strong></td>
                <td align="right"> <?php echo display_price('0'); ?></td>
              </tr>
              <tr>
                <td colspan="2"><strong><?php echo ($this->session->userdata('lang') == 'p')?$this->lang->line('total'):'Total';?>:</strong></td>
                <td align="right"> <?php echo display_price($gTotal + 0); ?></td>
              </tr>
              <?php
            } else {
              ?>
              <tr>
                <td colspan="2"><strong><?php echo ($this->session->userdata('lang') == 'p')?$this->lang->line('total'):'Total';?>:</strong></td>
                <td align="right"> <?php echo display_price($gTotal); ?></td>
              </tr>
              <?php
            }
            ?>
          </tfoot>
        </table>
      </div>
    </div>
  </div>
</div>
<?php $this->load->view("bottom_application"); ?>