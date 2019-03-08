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
			<?= get_flash() ?>

			<div class="panel panel-default">
				<div class="panel-body">
					<?php echo form_open('sitepanel/setting/change_pass/', 'class="form-horizontal" method="post" id="change_pass_form" '); ?>
						<div class="form-group">
							<label class="col-md-4 col-xs-12 control-label">
								<span class="required">*</span>Old Password
							</label>
							<div class="col-md-4 col-xs-12">
								<input type="password" name="old_pass" class="form-control" />
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 col-xs-12 control-label"><span class="required">*</span>New Password</label>
							<div class="col-md-4 col-xs-12">
								<input type="password" name="new_pass" class="form-control" />
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 col-xs-12 control-label"><span class="required">*</span>Confirm Password</label>
							<div class="col-md-4 col-xs-12">
								<input type="password" name="confirm_password" class="form-control" />
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
<?= show_err('#change_pass_form', @$errs) ?>
<?php $this->load->view('includes/footer'); ?>