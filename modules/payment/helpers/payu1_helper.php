<?php

function payuForm($order_res) {

  define('PAYU_SANDBOX', FALSE);
  $CI = & get_instance();
  $SALT = 'g981e7Vz';
  $key = 'b0Z5A9';
  //trsaction key
  if (empty($posted['txnid'])) {
    // Generate random transaction id
    $txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
  } else {
    $txnid = $posted['txnid'];
  }

  //Hash
  // Hash Sequence
  $hash = '';
  $hashSequence = "key|txnid|amount|productinfo|firstname|email|udf1|udf2|udf3|udf4|udf5|udf6|udf7|udf8|udf9|udf10";
  if (empty($posted['hash']) && sizeof($posted) > 0) {
    if (empty($posted['key']) || empty($posted['txnid']) || empty($posted['amount']) || empty($posted['firstname']) || empty($posted['email']) || empty($posted['phone']) || empty($posted['productinfo']) || empty($posted['surl']) || empty($posted['furl'])){
      $formError = 1;
    } 
    else {
      $hashVarsSeq = explode('|', $hashSequence);
      $hash_string = '';
      foreach ($hashVarsSeq as $hash_var) {
        $hash_string .= isset($posted[$hash_var]) ? $posted[$hash_var] : '';
        $hash_string .= '|';
      }
      $hash_string .= $SALT;
      $hash = hash('sha512', $hash_string);

    }
  }
  
  if (PAYU_SANDBOX)
    $payuWeb = 'https://test.payu.in/_payment'; // TEST SANDBOX
  else
    $payuWeb = 'https://secure.payu.in/_payment';
    ?>
    <body style="margin:0px;">    
      <div style="text-align:left; font-size: 22px; font-weight:bold;  background-color:#f9f9f9; border:#efefef; padding:20px;">
      <?php echo $CI->config->item('site_name'); ?>
      </div>
      <table style="width: 100%;">
        <tr>
          <td width="100%" align="center">
            <div style="font-family: Arial; font-size: 16px; text-align: center; margin-top: 170px; background-color:#f9f9f9; border:#efefef; padding:20px; font-weight:bold; width:500px;">
              <?php echo "We are just transfering you to the PayU in few seconds"; ?><br />  <br />
              <div style="width: 200px; margin-left:180px; text-align: left;  font-family: Arial; font-size: 22px; color:#090;">
                Please wait <span id="loading_please_wait"></span>
              </div> 
            </div> 
          </td>
        </tr>
        <tr>     
          <td width="100%" align="center"></td>
        </tr>
      </table>
      <form action='<?php echo $payuWeb; ?>' method='post' name="form1" id="form1">
        <input type="hidden" name="key" value="b0Z5A9" />
        <input type="text" name="hash" value = "<?php echo $hash; ?>" />
        <input type="hidden" name="txnid" value="<?php echo $txnid; ?>" />
        
        <input type="hidden" name="firstname" value="<?php echo $this->input->post('firstname'); ?>" />
        <input type="hidden" name="lastname" value="<?php echo $this->input->post('lastname'); ?>" />        
        <input type="hidden" name="phone" value="<?php echo $this->input->post('phone'); ?>" />
        
        <!--
        // Redirecting URLs for accepting Status of Payment
        -->
        <input type="hidden" name="surl" value="<?php echo base_url(); ?>payment/order_success/paypal/<?php echo md5($orderid); ?>" />
        <input type="hidden" name="curl" value="<?php echo base_url(); ?>payment/order_cancle/paypal/<?php echo md5($orderid); ?>" />
        <input type="hidden" name="furl" value="<?php echo base_url(); ?>payment/order_cancle/paypal/<?php echo md5($orderid); ?>" />
        <!--
        // End here
        -->
        
        <input type="hidden" name="productinfo" value="<?php echo $this->input->post('productinfo'); ?>" />
        <input type="hidden" name="amount" value="<?php echo $this->input->post('amount'); ?>" />
        <input type="hidden" name="email" value="<?php echo $this->input->post('email'); ?>" />
        
        <!--
        // Non mandatory fields
        -->
        <input name="address1" value="<?php echo (empty($posted['address1'])) ? '' : $posted['address1']; ?>" />
        <input name="address2" value="<?php echo (empty($posted['address2'])) ? '' : $posted['address2']; ?>" />
        <input name="city" value="<?php echo (empty($posted['city'])) ? '' : $posted['city']; ?>" />
        <input name="state" value="<?php echo (empty($posted['state'])) ? '' : $posted['state']; ?>" />
        <input name="country" value="<?php echo (empty($posted['country'])) ? '' : $posted['country']; ?>" />
        <input name="zipcode" value="<?php echo (empty($posted['zipcode'])) ? '' : $posted['zipcode']; ?>" />
        
        <input name="udf1" value="<?php echo (empty($posted['udf1'])) ? '' : $posted['udf1']; ?>" />
        <input name="udf2" value="<?php echo (empty($posted['udf2'])) ? '' : $posted['udf2']; ?>" />
        <input name="udf3" value="<?php echo (empty($posted['udf3'])) ? '' : $posted['udf3']; ?>" />
        <input name="udf4" value="<?php echo (empty($posted['udf4'])) ? '' : $posted['udf4']; ?>" />
        <input name="udf5" value="<?php echo (empty($posted['udf5'])) ? '' : $posted['udf5']; ?>" />
        <input name="pg" value="<?php echo (empty($posted['pg'])) ? '' : $posted['pg']; ?>" />
        
        <input type= "submit" value="submit">
      </form>
      
      <script type="text/javascript">
        i = -1;
        intvalid = setInterval(function () {
          append_dot('loading_please_wait', i++);
        }, 100);

        function append_dot(span_id, i){
          span = document.getElementById(span_id);
          dots = "";
          for (j = 0; j <= i; j++){
            dots += ".";
          }
          span.innerHTML = dots;
          num_dots = (span.innerHTML).length;
          if (parseInt(num_dots) >= 8){
            clearInterval(intvalid);
            i = -1;
            intvalid = setInterval(function () {
              append_dot('loading_please_wait', i++);
            }, 100);
          }
        }
        
        //Submit form
        form1.submit();
      </script>
    </body>  
    <?php
    die();
  }
  ?>