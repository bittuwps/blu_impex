<?php
$mp = get_db_field_value("wl_users", "profile_picture", "WHERE customers_id='" . $this->session->userdata('user_id') . "'");
?>
<div class="col-sm-3">
  <div class="col-selector">
    <div class="dboard-main">
      <img src="<?php echo get_image('profile', $mp, '70', '70', 'R'); ?>" class="img-circle user-img">
      <p class="logged-user">Hello, <?php echo $this->session->userdata('name'); ?></p>
      <a href="<?php echo site_url(); ?>members/edit_account" class="editProfile"><i class="fa fa-edit"></i></a>
      <ul class="dboard-list dboard-navs">
        <li><a href="<?php echo site_url(); ?>members/myaccount" <?php echo ($this->router->fetch_method() == 'index' || $this->router->fetch_method() == 'myaccount') ? 'class="current"' : ''; ?>>Our Services</a></li>
        <li><a <?php echo ($this->router->fetch_method() == 'myedits') ? 'class="current"' : ''; ?> href="<?php echo base_url(); ?>members/myedits">My Edits</a></li>
        <li><a <?php echo ($this->router->fetch_method() == 'mycart') ? 'class="current"' : ''; ?> href="<?php echo site_url(); ?>members/mycart">My Cart</a></li>
      </ul>
      <ul class="dboard-list dboard-ext">
        <li><a href="<?php echo site_url(); ?>tips">Tips</a></li>
        <li><a href="<?php echo site_url(); ?>members/refer" >Refer</a></li>
        <li><a href="<?php echo site_url(); ?>members/refer">My Earnings</a></li>
      </ul>
    </div>
  </div>
</div>