<?php $this->load->view('includes/header'); ?>

<div class="page-title">
	<h2>
		<span></span>
		<?php echo $heading_title; ?>
	</h2>
</div>

<div class="page-content-wrap">

	<div class="fix"></div>

	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-body">
					<?= get_flash() ?>
					<?php echo form_open('sitepanel/setting/edit/', 'class="form-horizontal" id="admin-setting" method="post"'); ?>
						<div class="form-group">
							<label class="col-md-4 col-xs-12 control-label"><span class="required">*</span>E-Mail</label>
							<div class="col-md-4 col-xs-12">
								<input type="text" class="form-control" name="admin_email" value="<?= set_value('admin_email', $admin_info['admin_email']); ?>"  />
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 col-xs-12 control-label"><span class="required">*</span>Phone No.</label>
							<div class="col-md-4 col-xs-12">
								<input type="text" class="form-control"  name="phone" value="<?= set_value('phone', $admin_info['phone']); ?>"  />
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 col-xs-12 control-label"><span class="required">*</span>Address</label>
							<div class="col-md-4 col-xs-12">
								<input type="text" name="address" class="form-control" value="<?php echo set_value('address', $admin_info['address']); ?>" />
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 col-xs-12 control-label"><span class="required">*</span>Site Name</label>
							<div class="col-md-4 col-xs-12">
								<input type="text" class="form-control" name="site_name" value="<?= set_value('site_name', $admin_info['site_name']); ?>" />
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 col-xs-12 control-label"><span class="required">*</span>Site Url</label>
							<div class="col-md-4 col-xs-12">
								<input type="text" class="form-control" name="site_url" value="<?= set_value('site_url', $admin_info['site_url']); ?>" />
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 col-xs-12 control-label"><span class="required">*</span>Site Phone Number</label>
							<div class="col-md-4 col-xs-12">
								<input type="text" class="form-control" name="site_phone_no" value="<?= set_value('site_phone_no', $admin_info['site_phone_no']); ?>" />
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 col-xs-12 control-label"><span class="required">*</span>Site Email</label>
							<div class="col-md-4 col-xs-12">
								<input type="text" class="form-control" name="site_email" value="<?= set_value('site_email', $admin_info['site_email']); ?>" />
							</div>
						</div>


						<div class="form-group">
							<div class="col-md-8">
								<input type="submit" class="btn bg-red pull-right" value="Update Info" />
							</div>
						</div>
					<?php echo form_close(); ?>
				</div>
			</div>
		</div>
	</div>
</div>
<?= show_err('#admin-setting',@$errs); ?>
<?php $this->load->view('includes/footer'); ?>