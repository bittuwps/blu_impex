<?php
$this->load->view("top_application");
?>
<link rel="stylesheet" href="<?php echo site_url(); ?>assets/developers/css/proj.css">
<section class="dashboard-home">
  <?php $this->load->view("inner_header"); ?>
  <div class="clearfix dashboard-row">
    <?php $this->load->view("sidebar"); ?>
    <div class="col-sm-9">
      <div class="col-selector dboard-content">
        <h3 class="term-heading">Refer And Earnings</h3>
        <section class="myedits-wrap">
          <ol class="breadcrumb unbreadcrumbs" style="padding-left: 15px;">
            <li> <a href="dashboard.php">Dashboard</a> </li>
            <li class="active">Refer and Earn</li>
          </ol>
          <div class="referrals">
            <div role="tabpanel">
              <!-- Nav tabs -->
              <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active">
                  <a href="#refer" aria-controls="refer" role="tab" data-toggle="tab">Refer</a>
                </li>
                <li role="presentation">
                  <a href="#earnings" aria-controls="earnings" role="tab" data-toggle="tab">Earnings</a>
                </li>
              </ul>

              <!-- Tab panes -->
              <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="refer">
                  <div class="refer-data">
                    <h3 class="text-center"><?php echo strtoupper($mres['my_ref_code']); ?></h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi quae mollitia nihil nesciunt qui et consectetur, sunt, sequi deleniti consequatur?</p>
                    <a href="javascript:void(0);" class="logout">Your Referal Link</a>
                    <input type="text" class="form-control" style="width: 128% !important;" value="<?php echo site_url(); ?>?action=register&my_ref_code=<?php echo $mres['my_ref_code']; ?>">
                  </div>
                </div>
                <div role="tabpanel" class="tab-pane" id="earnings">
                  <div class="refer-data">
                    <h3 class="text-center">Total Refer Earning is : <span><?php echo $ref_val*count($earning); ?></span></h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi quae mollitia nihil nesciunt qui et consectetur, sunt, sequi deleniti consequatur?</p>


                  </div>
                  <table class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>Sr. No.</th>
                        <th>Name</th>
                        <th>Email ID</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      if (is_array($earning) && !empty($earning)) {
                        $sl=1;
                        foreach ($earning as $k => $v) {
                          ?>
                          <tr>
                            <td>1.</td>
                            <td><?php echo $v['first_name']; ?></td>
                            <td><?php echo $v['email']; ?></td>
                          </tr>
                          <?php
                          $sl++;
                        }
                      } else {
                        ?>
                        <tr>
                          <td colspan="3">
                            <div style="text-align:center; color:red;">No Result Found!</div>
                          </td>
                        </tr>
                        <?php
                      }
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
    </div>
  </div>
</section>
<?php $this->load->view("bottom_application"); ?>