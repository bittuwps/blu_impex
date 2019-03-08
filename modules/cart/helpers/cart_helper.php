<?php
if (!defined('BASEPATH'))
  exit('No direct script access allowed');

if (!function_exists('CI')) {

  function CI() {
    if (!function_exists('get_instance'))
      return FALSE;
    $CI = & get_instance();
    return $CI;
  }

}

function invoice_content($ordmaster, $orddetail, $dlink = '') {
  $ci = CI();
  $curr_symbol = display_symbol();
  $grandTotal = $ordmaster['total_amount'] + $ordmaster['shipping_amount'] + $ordmaster['cod_amount'];
  $admin_email = get_site_email();
  ?>
  <div class="mt15">
    <div class="inv_box2"> <img src="<?php echo theme_url(); ?>images/logo.png" class="img_responsive" alt=""></div>
    <div class="inv_box1 mt5">
      <p>
        <b>Product</b><br>
        <?php echo nl2br($admin_email->address); ?><br>
        <span class="pt3">Email Us : <b class="red"><a href="#"><?php echo $admin_email->admin_email; ?></a></b></span> Phone : <?php echo $admin_email->phone; ?> 
      </p>
    </div>
    <div class="cb pb10"></div>

    <div class="inv_box3">
      <div class="b fs16 lht-20 bb mb10">Order Summary</div>
      <div class="mt5 lht-20 fs12">
        <b>Invoce No. : <?php echo $ordmaster['invoice_number']; ?></b><br>
        Dated : <?php echo getDateFormat($ordmaster['order_received_date'], 2); ?>
      </div>
      <div class="mt10 fs12 lht-20">
        Subtotal Amount : <?php echo display_price($ordmaster['total_amount']); ?><br>
        Shipping Charge  : <?php echo display_price($ordmaster['shipping_amount']); ?><br>
        <?php
        if ($ordmaster['cod_amount'] > 0) {
          ?>
          COD Charge  : <?php echo display_price($ordmaster['cod_amount']); ?><br>
          <?php
        }
        ?>
        <b class="fs13 lht-30 red">Total Payable Amount : <?php echo display_price($grandTotal); ?> </b>
      </div>
    </div>
    <div class="cb"></div>

    <h3 class="mt20 b bb1 pb5">Book Details</h3>
    <div class="p15 white bg-black ttu fs14 cont_4_address mob_hider b">
      <div class="sec1">S. No.</div>
      <div class="sec2">Book</div>
      <div class="sec3">Amount</div>
      <div class="cb"></div>
    </div>
    <?php
    $i = 1;
    $subtotal = '';
    $total = '';
    //trace($orddetail);
    if (is_array($orddetail) && !empty($orddetail)) {
      foreach ($orddetail as $val) {
        $sql = $ci->db->query("select * from wl_products_media where products_id='" . $val['products_id'] . "'")->row_array();
        if (is_array($sql) && !empty($sql)) {
          $img = $sql['media'];
        } else {
          $img = '';
        }
        $subtotal = ( $val['quantity'] * $val['product_price']);
        $total += $subtotal;
        //trace($val);
        ?> 
        <div class="p15 bb cont_4_address mt15">
          <div class="sec1"><strong>S. No.</strong> <?php echo $i; ?>.</div>
          <div class="sec2">
            <p class="fs16 b"><b class="fl thm_cont mr10"><img src="<?php echo get_image('products', $img, '100', '80', 'R'); ?>" alt="" width="100" height="82"></b><?php echo $val['product_name']; ?>t</p>

            <p class="black fs15 mt2">Price: <b class="gray1 through normal"><span class="WebRupee">Rs.</span>50.00</b> <b class="red"><?php echo display_price($val['product_price']); ?></b></p>
            <div class="cb"></div>
          </div>
          <div class="sec3 b"> <strong>Amount :</strong> <?php echo display_price($subtotal); ?> </div>
          <div class="cb"></div>
        </div>
        <!-- list 1 -->
        <?php
        $i++;
      }
    }

    if ($dlink == '') {
      ?>
      <div class="cb bb1"></div>
      <p class="mob_hider ac"><a href="<?php echo base_url(); ?>cart/print_invoice/<?php echo $ordmaster['order_id']; ?>" class="invoice1 btn2 radius-20b" style="padding:0 30px">Print Invoice</a></p>
      <?php
    } else {
      ?>
      <br /><br />
      <div style="text-align:right; font:bold 14px/18px Arial, Helvetica, sans-serif; color:#333; padding:0 20px 15px 0">Sub Total : <?php echo display_price($grandTotal); ?></div>
      <?php
    }
    ?>
  </div>   
  <?php
}

function invoice_content_print($ordmaster, $orddetail) {
  $ci = CI();
  $ci->load->helper('words');
  $curr_symbol = display_symbol();
  $grandTotal = $ordmaster['total_amount'];
  $wordsAmount = getStringOfAmount($grandTotal);
  $wordsAmount .= ' Only';
  ?>
  <table width="1024" border="0" cellpadding="0" cellspacing="0" style="padding:10px;">
    <tr>
      <td colspan="2" style="text-align: center;">
        <h1 style="text-align: center; font-size: 24px; padding-bottom: 30px; font-family: arial; font-weight: bold;">Order Details/Bill Of Supply/Cash Memo</h1>
      </td>
    </tr>
    <tr>
      <td style="padding-bottom: 30px;"><img src="<?php echo theme_url(); ?>images/logo.png" ></td>
      <td style="text-align: right;">
        <h1 style="margin: 0px; font-family: arial; padding: 5px 0px; width: 100%; text-align: right; font-weight:bold; font-size: 20px;">Ship To,</h1>
        <h2 style="margin: 0px; font-family: arial;  padding: 5px 0px; width: 100%; text-align: right; font-weight:bold; font-size: 16px;"> Billing Address:</h2>


        <h6 style="margin: 0px; font-family: arial; font-size: 16px; font-weight: normal; padding: 5px 0px;"><?php echo $ordmaster['billing_name']; ?></h6>
        <p style="margin: 0px; font-family: arial; font-size: 16px; font-weight: normal; padding: 5px 0px;"><?php echo $ordmaster['billing_address']; ?>, <?php echo $ordmaster['billing_city']; ?></p>
        <p style="margin: 0px; font-family: arial; font-size: 16px; font-weight: normal; padding: 5px 0px;"><?php echo $ordmaster['billing_state']; /* ?> - <?php echo $ordmaster['billing_zipcode']; ?>, <?php */ echo $ordmaster['billing_country']; ?></p>	
        <h2 style="margin: 0px; font-family: arial;  padding: 5px 0px; width: 100%; text-align: right; font-weight:bold; font-size: 16px;"> ID Card, DIRE No: <span style="margin: 0px; font-family: arial; font-size: 16px; font-weight: normal; padding: 5px 0px;"><?php echo $ordmaster['idcard_no']; ?></span></h2>
        <?php
        if ($ordmaster['pickup_point']) {
          ?>
          <h2 style="margin: 0px; font-family: arial;  padding: 5px 0px; width: 100%; text-align: right; font-weight:bold; font-size: 16px;"> Pickup Point: <span style="margin: 0px; font-family: arial; font-size: 16px; font-weight: normal; padding: 5px 0px;"><?php echo $ordmaster['pickup_point']; ?></span></h2>
          <?php
        }
        ?>
      </td>
    </tr>
    <tr>
      <td colspan="2">
        <h1 style="margin: 0px; font-family: arial; padding: 5px 0px; width: 100%; text-align: left; font-weight:bold; font-size: 20px;">Sold By:</h1>
        <p style="margin: 0px; font-family: arial; font-size: 16px; font-weight: normal; padding: 5px 0px;">Asiana</p>
        <p style="margin: 0px; font-family: arial; font-size: 16px; font-weight: normal; padding: 5px 0px;">Big HK Sale, Hong Kong</p>
        <!--<p style="margin: 0px; font-family: arial; font-size: 16px; font-weight: normal; padding: 5px 0px; padding-bottom: 40px;">Maputo, Mozambique</p>	</td>-->
    </tr>
    
    <!--tr>
      <td colspan="2" style="text-align: left;">
        <h1 style="margin: 0px; font-family: arial; font-size: 16px; font-weight: normal; padding: 5px 0px;"><b style="font-weight: bold; font-family: arial; font-size: 18px; margin-right:10px;">Pan No:</b> AHUPA1680K</h1>
        <h2 style="margin: 0px; font-family: arial; font-size: 16px; font-weight: normal; padding: 5px 0px;"><b style="font-weight: bold; font-family: arial; font-size: 18px; margin-right:10px;">GST Registration No:</b> 07AHUPA1680K1Z2</h2>	</td>
    </tr-->

    <tr>
      <td style="text-align: left;">
        
      </td>
      <td style="text-align: right;">
        <h2 style="margin: 0px; font-family: arial; font-size: 16px; font-weight: normal; padding: 5px 0px;"><b style="font-weight: bold; font-family: arial;">Order Number : </b> <?php echo $ordmaster['invoice_number']; ?></h2>
        <h2 style="margin: 0px; font-family: arial; font-size: 16px; font-weight: normal; padding: 5px 0px; padding-bottom: 40px;"><b style="font-weight: bold; font-family: arial;">Order Date:</b> <?php echo getDateFormat($ordmaster['order_received_date'], 3); ?>	</td>
    </tr>
    <tr>
      <td colspan="2">
        <table width="100%" border="1" cellspacing="0" cellpadding="0" style="margin: 0px; text-align: center;">
          <tr style="background: #ddd">
            <td style="border:1px solid #222; font-weight: bold; font-family: arial; font-size: 14px; padding: 10px;">SI.No</td>
            <td style="border:1px solid #222; font-weight: bold; font-family: arial; font-size: 14px; padding: 10px;">Description</td>
            <td style="border:1px solid #222; font-weight: bold; font-family: arial; font-size: 14px; padding: 10px;">Unit Price </td>
            <td style="border:1px solid #222; font-weight: bold; font-family: arial; font-size: 14px; padding: 10px;">Quantity</td>
            <td style="border:1px solid #222; font-weight: bold; font-family: arial; font-size: 14px; padding: 10px;">Net Amount</td>
            <!--td style="border:1px solid #222; font-weight: bold; font-family: arial; font-size: 14px; padding: 10px;">Tax Rate</td>
            <td style="border:1px solid #222; font-weight: bold; font-family: arial; font-size: 14px; padding: 10px;">Tax Type</td>
            <td style="border:1px solid #222; font-weight: bold; font-family: arial; font-size: 14px; padding: 10px;">Tex Amount</td-->
            <td style="border:1px solid #222; font-weight: bold; font-family: arial; font-size: 14px; padding: 10px;">Total Amount</td>
          </tr>

          <?php
          $i = 1;
          $subtotal = '';
          $total = '';
          $toatlTax = "";
          //trace($orddetail);
          if (is_array($orddetail) && !empty($orddetail)) {
            foreach ($orddetail as $val) {
              $sql = $ci->db->query("select * from wl_products_media where products_id='" . $val['products_id'] . "'")->row_array();
              if (is_array($sql) && !empty($sql)) {
                $img = $sql['media'];
              } else {
                $img = '';
              }
              $toatlTax += $ordmaster['vat_amount'];
              $subtotal = ( $val['quantity'] * $val['product_price']);
              $total += $subtotal;
              //trace($val);
              ?>

              <tr>
                <td><?php echo $i; ?></td>
                <td style="padding: 10px; font-family: arial; font-size: 14px;"><?php echo $val['product_name']; ?></td>
                <td style="padding: 10px; font-size: 14px; font-family: arial;"><?php echo display_price($val['product_price']); ?></td>
                <td style="padding: 10px; font-size: 14px; font-family: arial;"><?php echo $val['quantity']; ?></td>
                <td style="padding: 10px; font-size: 14px; font-family: arial;"><?php echo display_price($val['product_price'] * $val['quantity']); ?></td>
                <!--td style="padding: 10px; font-size: 14px; font-family: arial;">14% <br> <br> 14%</td>
                <td style="padding: 10px; font-size: 14px; font-family: arial;">CGST <br> <br>CGST </td>
                <td style="padding: 10px; font-size: 14px; font-family: arial;">Rs.76.56 <br> <br> Rs.76.56 </td-->
                <td style="padding: 10px; font-size: 14px; font-family: arial;"><?php echo display_price($subtotal); ?></td>
              </tr>
              <!-- list 1 -->
              <?php
              $i++;
            }
          }
          ?>
          <tr>
            <td colspan="5" style="padding: 10px; text-align: left; font-weight: bold; font-family: arial;">Total :</td>
            <td style="background: #ddd; font-weight: bold; font-family: arial; padding: 10px; font-size: 14px;"><?php echo display_price($grandTotal); ?></td>
          </tr>
          <tr style="text-align: left; padding: 10px;">
            <td colspan="6"><h1 style="font-size: 18px; font-family: arial; margin: 0px; font-weight:bold; text-align: left;padding: 5px 0px; padding-left: 10px;">Amount in Words:</h1>
              <h2 style="font-size: 18px; margin: 0px; font-family: arial;  font-weight:bold; text-align: left; padding: 5px 0px; padding-left: 10px;"><?php echo $wordsAmount; ?></h2>	</td>
          </tr>
          <tr>
            <td colspan="9" style="padding-right: 10px;">
              <p style="font-size: 16px; font-family: arial; font-weight: bold; text-align: right; margin: 0px; padding: 5px 0px;">For Asiana:</p>
              <div style="width: 300px; background: #ddd; height: 60px; float: right;"></div>
              <div style="clear: both;">
                <p style="font-size: 16px; font-family: arial; font-weight: bold; text-align: right; margin: 0px; padding: 5px 0px;">Authorized Signatory</p>
            </td>
          </tr>
        </table>
      </td>
    </tr>
    <tr><td colspan="2" align="right"><a id="print" href="javascript:void(0);" onclick="document.getElementById('print').style.visibility = 'hidden'; print();">Print Order</a></td></tr>
  </table>
  <?php
}
