<div class="block left-module">
  <p class="title_block"><?php echo ($this->session->userdata('lang') == 'p')?$this->lang->line('Myaccount'):'My Account';?></p>
  <div class="block_content2">
    <!-- layered -->
    <div class="layered layered-category">
      <div class="layered-content">
        <ul class="tree-menu">
          <li <?php echo ($this->router->fetch_method() == 'index') ? 'class="active"' : ''; ?>> 
            <a href="<?php echo site_url('members'); ?>"><i class="fa fa-angle-right" aria-hidden="true"></i> <?php echo ($this->session->userdata('lang') == 'p')?$this->lang->line('orders'):'Orders';?></a> </li>
          <li <?php echo ($this->router->fetch_method() == 'edit_account') ? 'class="active"' : ''; ?>>
            <a href="<?php echo site_url('members/edit_account'); ?>"><i class="fa fa-angle-right" aria-hidden="true"></i> <?php echo ($this->session->userdata('lang') == 'p')?$this->lang->line('edit_profile'):'Edit Profile';?></a></li>
          <li <?php echo ($this->router->fetch_method() == 'mywishlist') ? 'class="active"' : ''; ?>>
            <a href="<?php echo site_url('members/mywishlist'); ?>"> <i class="fa fa-angle-right" aria-hidden="true"></i> <?php echo ($this->session->userdata('lang') == 'p')?$this->lang->line('wishlist'):'Wishlist';?></a></li>
          <li <?php echo ($this->router->fetch_method() == 'change_password') ? 'class="active"' : ''; ?>>
            <a href="<?php echo site_url('members/change_password'); ?>"><i class="fa fa-angle-right" aria-hidden="true"></i> <?php echo ($this->session->userdata('lang') == 'p')?$this->lang->line('change_password'):'Change Password';?> </a></li>
          <li>
            <a href="<?php echo site_url('users/logout'); ?>"><i class="fa fa-angle-right" aria-hidden="true"></i> <?php echo ($this->session->userdata('lang') == 'p')?$this->lang->line('Logout'):'Logout';?></a></li>
        </ul>
      </div>
    </div>
    <!-- ./layered -->
  </div>
</div>