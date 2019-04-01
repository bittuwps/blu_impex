<?php $this->load->view('includes/header'); ?>

<?php
    $values_posted_back = (is_array($this->input->post())) ? TRUE : FALSE;
?>

<div class="page-title">

  	<h2><span>Edit <?php echo $heading_title; ?></span></h2>
  	<div class="buttons"><?php echo anchor("sitepanel/category/", '<span>Cancel</span>', 'class="btn btn-primary pull-right" '); ?></div>
</div>

<div class="page-content-wrap">

  <div class="row">
    <div class="col-md-12">
      	<div class="panel panel-default">
			<div class="panel-body">  
				<span class="required"><?php echo validation_errors(); ?></span>
				<?php echo form_open_multipart(current_url_query_string(), array('id' => 'catfrm', 'name' => 'catfrm', 'class' => "form-horizontal")); ?>

					<div id="tab_pinfo">
						<div class="row">
							<div class="col-md-10 col-md-offset-1">
								<?php
									//echo $catresult['category_id'];
									$default_params = array(
										'heading_element' => array(
											'field_heading' => $heading_title . " Name",
											'field_name' => "category_name",
											'field_value' => $catresult['category_name'],
											'field_placeholder' => "Your Catgeory Name",
											'exparams' => 'size="40"',
											'cat_id' => $catresult['category_id']
										),

										'url_element' => array(
											'field_heading' => "Page URL",
											'field_name' => "friendly_url",
											'field_value' => $catresult['friendly_url'],
											'field_placeholder' => "Your Page URL",
											'exparams' => 'size="40"',
										)
									);

									seo_edit_form_element($default_params);
								?>

								<!--<div class="form-group">
									<label class="col-md-3 control-label"><span class="required">*</span>Category Name in Portuguese</label>
									<div class="col-md-6">                                                                                                                                        
										<input type="text" class="form-control" name="category_name_p" value="<?php echo set_value('category_name_p', $catresult['category_name_p']); ?>"  title="category name Portuguese"/><?php echo form_error('category_name_p') ?>
									</div>
									</div>
								-->

								<!--
									<div class="form-group">
										<label class="col-md-3 control-label">Standard Dispatch Time</label>
										<div class="col-md-6">                                                                                                                                        
											<input type="text" class="form-control" name="dispatch_time" value="<?php echo set_value('dispatch_time', $catresult['dispatch_time']); ?>"  title="Dispatch Time"/><?php echo form_error('dispatch_time') ?>
										</div>
									</div>
								-->

								<!--
									div class="form-group">
										<label class="col-md-3 control-label">Coupon Code</label>
										<div class="col-md-6">                      
											<input type="text" class="form-control" name="coupon_code" value="<?php //echo set_value('coupon_code', $catresult['coupon_code']); ?>"  title="Coupon Code"/><?php //echo form_error('coupon_code') ?>
										</div>
									</div>

									<div class="form-group">
										<label class="col-md-3 control-label">Coupon Value (%)</label>
										<div class="col-md-3">                      
											<input type="text" class="form-control" name="coupon_value" value="<?php //echo set_value('coupon_value', $catresult['coupon_value']); ?>"  title="Coupon Value"/><?php //echo form_error('coupon_value') ?>
										</div>
									</div>
								-->
								
								<div class="form-group">
									<label class="col-md-3 col-xs-12 control-label">Category Short Description</label>
									<div class="col-md-9 col-xs-12">                                            
										<textarea name="category_shortdescription" rows="5" cols="50"><?php echo set_value('category_description',$catresult['category_shortdescription']); ?></textarea> 
										<?php echo form_error('category_shortdescription'); ?>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 col-xs-12 control-label">Description</label>
									<div class="col-md-9 col-xs-12">                                            
										<textarea name="category_description" rows="5" cols="50" id="cat_desc" ><?php echo set_value('category_description', $catresult['category_description']); ?></textarea> <?php echo display_ckeditor($ckeditor); ?>
										<?php echo form_error('category_description'); ?>
									</div>
								</div>
								
								<div class="form-group">
									<div class="col-md-3">
										<label class="control-label pull-right">File</label>
										<div class="clearfix"></div>
									</div>
									<div class="col-md-4">
										<input type="file" class="fileinput btn-primary" name="category_image" />
									</div>
									<div class="col-md-3">
										<?php
											if ($catresult['category_image'] != '' && file_exists(UPLOAD_DIR . "/category/" . $catresult['category_image'])) {
											?>
												<a href="#" style="display: block;" data-toggle="modal" data-target=".pop-up-1">
													<img src="<?php echo base_url() . 'uploaded_files/category/' . $catresult['category_image']; ?>" class="img img-responsive img-rounded center-block" alt="">
												</a>
													
												<?php 
													if ($this->deletePrvg === TRUE) { ?>
														<div class="form-group">
															<div class="col-md-6 col-md-offset-3">
																<input type="checkbox"  name="cat_img_delete" value="Y">
																Delete
															</div>
														</div>
														<?php 
													} 
												?>					
												<?php
											}
										?>
									</div>
								</div>

								<div class="form-group">
									<br /><br />
									<div class="col-md-12 pull-left">
										[ <?php echo $this->config->item('category.best.image.view'); ?> ]
									</div>
								</div>

								<div class="form-group">
									<div class="col-md-6 col-md-offset-3">                                                                                    <input type="submit" name="sub" class="btn bg-red pull-right" value="Update" class="button2" />
										<input type="hidden" name="action" value="editcategory" />
										<input type="hidden" name="category_id" id="pg_recid" value="<?php echo $catresult['category_id']; ?>">
									</div>
								</div>
									<!-- </div>
								</div> -->
							</div>
														
						</div>                              
					</div> 
				<?php echo form_close(); ?>                     
			</div>                                
  		</div>
	</div>

<!-- END PAGE CONTENT WRAPPER -->

<div class="modal fade pop-up-1" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel-1" aria-hidden="true">
  	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h4 class="modal-title" id="myLargeModalLabel-1">Image</h4>
			</div>
			<div class="modal-body">
				<img src="<?php echo base_url() . 'uploaded_files/category/' . $catresult['category_image']; ?>" class="img-responsive img-rounded center-block" alt="">
			</div>
		</div><!-- /.modal-content -->
  	</div><!-- /.modal-dialog -->
</div><!-- /.modal mixer image -->



<script type="text/javascript">

  	$(document).ready(function () {
		$('#catfrm').submit(function (e) {
			e.preventDefault();
			var frmObj = this;
			$('#brand_id option:eq(0),#frame_material_id option:eq(0),#frame_type_id option:eq(0)').attr('selected', false);
			frmObj.submit();
		});
  	});
</script>

<?php $this->load->view('includes/footer'); ?>