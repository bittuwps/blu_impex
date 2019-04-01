<?php $this->load->view('includes/header'); ?>

<div class="page-title">
	<h2><span>
		<?php echo $heading_title; ?></span></h2>
	<div class="buttons">
		<?php echo anchor("sitepanel/category/", '<span><i class="fa fa-remove"></i> Cancel</span>', 'class="btn bg-red pull-right" '); ?>
	</div>
</div>

<!-- PAGE CONTENT WRAPPER -->

<div class="page-content-wrap">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-body">
					<span class="required">
						<?php echo validation_errors(); ?>
					</span>

					<?php echo form_open_multipart("sitepanel/category/add/" . $parent_id, 'class="form-horizontal"'); ?>
					<div id="tab_pinfo">
						<div class="row">
							<div class="col-md-10 col-md-offset-1">
								<?php
									$default_params = array(
										'heading_element' => array(
											'field_heading' => "Name",
											'field_name' => "category_name",
											'field_placeholder' => "Your Catgeory Name",
											'exparams' => 'size="40"'
										),

										'url_element' => array(
											'field_heading' => "Page URL",
											'field_name' => "friendly_url",
											'field_placeholder' => "Your Page URL",
											'exparams' => 'size="40"',
											'pre_seo_url' => '',
											'pre_url_tag' => FALSE
										)
									);

									if (is_array($parentData)) {
										$pre_seo_url = base_url() . $parentData['friendly_url'] . "/";
										$default_params['url_element']['pre_seo_url'] = $pre_seo_url;
										$default_params['url_element']['pre_url_tag'] = TRUE;
										$default_params['url_element']['exparams'] = 'size="30"';
									}
									seo_add_form_element($default_params);
								?>
								<!--
									<div class="form-group">
										<label class="col-md-3 control-label"><span class="required">*</span>Category Name in Portuguese</label>
										<div class="col-md-6">                                                                                                                                        
											<input type="text" class="form-control" name="category_name_p" value="<?php echo set_value('category_name_p'); ?>"  title="category name Portuguese"/><?php echo form_error('category_name_p') ?>
										</div>
									</div>
								-->
								<!--<div class="form-group">
										<label class="col-md-3 control-label">Standard Dispatch Time</label>
										<div class="col-md-6">
											<input type="text" class="form-control" name="dispatch_time" value="<?php echo set_value('dispatch_time'); ?>"  title="Dispatch Time"/><?php echo form_error('dispatch_time') ?>
										</div>
									</div>
								-->
								<!--
									div class="form-group">
										<label class="col-md-3 control-label">Coupon Code</label>
										<div class="col-md-6">                      
											<input type="text" class="form-control" name="coupon_code" value="<?php //echo set_value('coupon_code');  ?>"  title="Coupon Code"/><?php //echo form_error('coupon_code')  ?>
										</div>
									</div>

									<div class="form-group">
										<label class="col-md-3 control-label">Coupon Value (%)</label>
										<div class="col-md-3">                      
											<input type="text" class="form-control" name="coupon_value" value="<?php //echo set_value('coupon_value');  ?>"  title="Coupon Value"/><?php //echo form_error('coupon_value')  ?>
										</div>
									</div
								-->

								<div class="form-group">
									<label class="col-md-3 col-xs-12 control-label">Category Short Description</label>
									<div class="col-md-9 col-xs-12">
										<textarea name="category_shortdescription" rows="5" cols="50"><?php echo set_value('category_description'); ?></textarea>
										<?php echo form_error('category_shortdescription'); ?>
									</div>
								</div>

								<div class="form-group">
									<label class="col-md-3 col-xs-12 control-label">Description</label>
									<div class="col-md-9 col-xs-12">
										<textarea name="category_description" rows="5" cols="50" id="cat_desc"><?php echo set_value('category_description'); ?></textarea>
										<?php echo display_ckeditor($ckeditor); ?>
										<?php echo form_error('category_description'); ?>
									</div>
								</div>

								<div class="form-group">
									<label class="col-md-3 control-label">File</label>
									<div class="col-md-9">
										<input type="file" class="fileinput btn-primary" name="category_image" title="Browse file" />
										<br /><br />
										[ <?php echo $this->config->item('category.best.image.view'); ?> ]
									</div>
								</div>

								<div class="form-group">
									<label class="col-md-3 control-label"></label>
									<div class="col-md-9">
										<input type="submit" name="sub" class="btn bg-red pull-right" value="Add" class="button2" />
										<input type="hidden" name="action" value="addcategory" />
										<?php
											if (is_array($parentData)) {
												?>
												<input type="hidden" name="parent_id" value="<?php echo $parentData['category_id']; ?>" />
												<?php
											}
										?>
									</div>
								</div>
							</div>
						</div>
					</div>
				<?php echo form_close(); ?>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- END PAGE CONTENT WRAPPER -->

<?php $this->load->view('includes/footer'); ?>