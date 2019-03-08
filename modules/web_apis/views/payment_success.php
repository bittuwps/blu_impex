<?php $this->load->view('top_application'); ?>
<!-- main content starts here -->
<section class="thankMsg-wrap">
  <div class="thankMsg">
    <h4>Thank you! <?php echo ($status == 0) ? 'Payment Successful!' : 'Payment cancelled'; ?></h4>
    <style>.odd{text-align: right;}.even{text-align: left;}</style>
    <table class="table table-bordered table-hover">
      <tbody>
        <tr>
          <td class="odd" ><b>Name</b></td>
          <td class="even" ><?php echo $_POST['name']; ?></td>
        </tr>
        <tr>
          <td class="odd" ><b>Email</b></td>
          <td class="even" ><?php echo $_POST['email']; ?></td>
        </tr>
        <tr>
          <td class="odd" ><b>Mobile</b></td>
          <td class="even" ><?php echo $_POST['phone']; ?></td>
        </tr>
        <tr>
          <td class="odd" ><b>Amount</b></td>
          <td class="even" ><?php echo $_POST['amount']; ?></td>
        </tr>
        <tr>
          <td class="odd" ><b>Transaction Status</b></td>
          <td class="even" ><?php echo $_POST['response_message']; ?></td>
        </tr>
        <tr>
          <td class="odd" ><b>Transaction ID</b></td>
          <td class="even" ><?php echo $_POST['transaction_id']; ?></td>
        </tr>
        <tr>
          <td class="odd" ><b>Payment Method</b></td>
          <td class="even" ><?php echo $_POST['payment_method']; ?></td>
        </tr>
        <tr>
          <td class="odd" ><b>Payment DateTime</b></td>
          <td class="even" ><?php echo $_POST['payment_datetime']; ?></td>
        </tr>
      </tbody>
    </table>
    <a href="<?php echo base_url('members/myaccount'); ?>" class="btn btn-success">OK</a>
  </div>
</section>
<!-- // main content ends here -->
<?php $this->load->view("bottom_application"); ?>