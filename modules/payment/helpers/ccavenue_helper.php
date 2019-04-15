<?php

function ccavenueForm($order_res) {

  define('PAYPAL_SANDBOX', FALSE);
  $CI = & get_instance();
  //trace($order_res);
  $amount = $order_res['total_amount'];
  $orderid = $order_res['order_id'];
  $order_no = $order_res['invoice_number'];
  $merchant_id = '128143';
  $working_key = '1C0D0A190E0681DE7056195CDDC0264B'; //Shared by CCAVENUES
  $access_code = 'AVEO69EC83BU38OEUB'; //Shared by CCAVENUES
  $curr = 'INR';
  $redirect_url = site_url('payment/paydone/' . $orderid);
  $cancel_url = site_url('payment/paycancel/' . $orderid);

  $merchant_data = 'merchant_id=' . $merchant_id . '&amount=' . $amount . '&order_id=' . $orderid . '&redirect_url=' . $redirect_url . '&cancel_url=' . $cancel_url . '&billing_name=' . $order_res['billing_name'] . '&billing_address=' . $order_res['billing_address'] . '&billing_country=' . $order_res['billing_country'] . '&billing_state=' . $order_res['billing_state'] . '&billing_city=' . $order_res['billing_city'] . '&billing_zip=' . $order_res['billing_zipcode'] . '&billing_tel=' . $order_res['billing_phone'] . '&billing_email=' . $order_res['email'] . '&delivery_cust_name=' . $order_res['shipping_name'] . '&delivery_cust_address=' . $order_res['shipping_address'] . '&delivery_cust_country=' . $order_res['shipping_country'] . '&delivery_cust_state=' . $order_res['shipping_state'] . '&delivery_cust_city=' . $order_res['shipping_city'] . '&delivery_zip_code=' . $order_res['shipping_zipcode'] . '&delivery_cust_tel=' . $order_res['shipping_phone'] . '&currency=' . $curr;

  $encrypted_data = encrypt($merchant_data, $working_key); // Method for encrypting the data.
  ?>
  <body style="margin:0px;">    
    <div style="text-align:left; font-size: 22px; font-weight:bold;  background-color:#f9f9f9; border:#efefef; padding:20px;">
      <?php echo $CI->config->item('site_name'); ?>
    </div>
    <table style="width: 100%;">
      <tr>
        <td width="100%" align="center">
          <div style="font-family: Arial; font-size: 16px; text-align: center; margin-top: 170px; background-color:#f9f9f9; border:#efefef; padding:20px; font-weight:bold; width:500px;"> 
            <?php echo "We are just transfering you to the Paypal in few seconds"; ?><br />  <br />
            <div style="width: 200px; margin-left:180px; text-align: left;  font-family: Arial; font-size: 22px; color:#090;">
              Please wait <span id="loading_please_wait"></span>
            </div> 
          </div> 
        </td>
      </tr>
      <tr>     
        <td width="100%" align="center">
        </td>
      </tr>
    </table>

    <form method="post" name="customerData" id="customerData" action="https://secure.ccavenue.com/transaction/transaction.do?command=initiateTransaction"> 
      <?php
      echo "<input type=hidden name=encRequest value=$encrypted_data>";
      echo "<input type=hidden name=access_code value=$access_code>";
      ?>
    </form>

    <script type="text/javascript">
      customerData.submit();//submit form
      i = -1;
      intvalid = setInterval(function () {
        append_dot('loading_please_wait', i++);
      }, 100);
      function append_dot(span_id, i) {
        span = document.getElementById(span_id);
        dots = "";
        for (j = 0; j <= i; j++)
        {
          dots += ".";
        }
        span.innerHTML = dots;
        num_dots = (span.innerHTML).length;
        if (parseInt(num_dots) >= 8)
        {
          clearInterval(intvalid);
          i = -1;
          intvalid = setInterval(function () {
            append_dot('loading_please_wait', i++);
          }, 100);
        }
      }
    </script>
    <?php
    die();
  }
  ?>