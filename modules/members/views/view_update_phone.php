<?php
$this->load->view("top_application");
//trace($mres);
$userType = ($mres['gender'] == 'Male') ? 'userm' : 'userf';
$dob = explode('-', $mres['dob']);
$dob = $dob[2] . '/' . $dob[1] . '/' . $dob[0];
$passionArr = explode(',', $mres['travel_passions']);
$catArr = explode(',', $mres['user_category']);
?>
<div class="page-content" >
  <div class="row">
    <div class="col-md-8 col-md-offset-2 joinup">      
      <?php
      echo validation_message('');
      echo error_message('');
      $dob = ($dob != '00/00/0000') ? $dob : '';
      ?>
      <form action="<?php echo site_url(); ?>members/updated_phone" class="modal-content" method="post">
        <div class="modal-header">
          <h4 class="modal-title" style="text-align:center">Please update your contact details, We need it for your Transnational Activities.</h4>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-lg-12 form-group">
              <div class="form-group right-inner-addon"> <i class="fa fa-phone" aria-hidden="true"></i>
                <input type="text" required pattern="(7|8|9)\d{9}" maxlength="10" title="Please Eneter Valid Phone Number!" name="phone_number" value="" class="form-control" placeholder="Phone Number"  />
              </div>
            </div>
            <div class="col-sm-12 text-center">
              <button class="btn btn-update " type="submit">Update</button>
              <button class="btn btn-common pull-right" type="button" onclick="window.location.href = '<?php echo site_url(); ?>members?phone=skip'">Skip</button>
              <input type="hidden" name="type" value="" />
              <input type="hidden" name="ref" value="<?php echo site_url(); ?>members" />
            </div>
          </div>
        </div>
      </form>
    </div>

  </div>
  <!-- End Page --> 
</div>
</div>

<!-- Modal Edit Cover Photo -->
<?php $this->load->view("bottom_application"); ?>