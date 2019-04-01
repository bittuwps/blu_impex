<?php
$this->load->view('includes/face_header');
echo form_open('');
echo error_message();
?>
<table width="100%" border="0" cellspacing="4" cellpadding="0" class="grey">
  <tr valign="top" >
    <td colspan="4" align="right" >
      <table width="100%"  border="0" cellspacing="2" cellpadding="2">
        <tr><td align="center" colspan="2">&nbsp;</td></tr>
        <tr align="left" bgcolor="#1588BB" class="white">
          <td colspan="2" bgcolor="#CCCCCC" ><strong> Update Tracking Details (Order No : <?php echo $result['invoice_number']; ?>) : </strong></td>
        </tr>
        <tr><td align="center" colspan="2">&nbsp;</td></tr>
        <tr valign="top" >
          <td width="40%" align="left" ><strong>  Tracking Code : </strong></td>
          <td width="60%" align="left" >
            <input type="text" name="tracking_code" value="<?php echo set_value('tracking_code', $result['tracking_code']); ?>" class="form-control" style="width: 75%;"><?php echo form_error('tracking_code'); ?>
          </td>
        </tr>
        <tr valign="top" >
          <td width="40%" align="left" ><strong>  Courier Partner : </strong></td>
          <td width="60%" align="left" >
            <input type="text" name="courier_partner" value="<?php echo set_value('courier_partner', $result['courier_partner']); ?>" class="form-control" style="width: 75%;"><?php echo form_error('courier_partner'); ?>
          </td>
        </tr>
        <tr valign="top" >
          <td width="40%" align="left" ><strong>  Expected Delivery Date : </strong></td>
          <td width="60%" align="left" >
            <input type="date" name="expected_delivery_date" value="<?php echo set_value('expected_delivery_date', $result['expected_delivery_date']); ?>" class="form-control" style="width: 75%;"><?php echo form_error('expected_delivery_date'); ?>
          </td>
        </tr>
        <tr valign="top" >
          <td width="40%" align="left" ><strong>Add Tracking Details : </strong></td>
          <td width="60%" align="left" >
            <textarea name="tracking_text" class="form-control" style="width: 75%;"><?php echo set_value('tracking_text', $result['tracking_text']); ?></textarea><?php echo form_error('tracking_text'); ?>
          </td>
        </tr>
        <tr><td align="center" colspan="2">&nbsp;</td></tr>
        <tr>
          <td align="center" colspan="2"><input type="submit" name="action" value="Update" /></td>
        </tr>
      </table>
    </td>
  </tr>
  <tr align="left" valign="top" bgcolor="#FFFFFF" >
    <td colspan="4" ><span class="b white"><strong> </strong></span></td>
  </tr>
</table>
<?php echo form_close(); ?>  
</body>
</html>