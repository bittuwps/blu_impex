<?php $this->load->view('includes/header'); ?>
<!-- PAGE TITLE -->
<div class="page-title">
	<h2><span></span>
		<?php echo $heading_title; ?>
	</h2>
	<div class="buttons">
		<?php echo anchor("sitepanel/category/add/$parent_id", "<span><i class='fa fa-plus'></i>Add $heading_title</span>", 'class="btn btn-primary pull-right" '); ?>
	</div>
</div>

<!-- END PAGE TITLE -->

<!-- PAGE CONTENT WRAPPER -->
<div class="page-content-wrap">

	<div class="row">
		<div class="col-md-12">
			<?php
     			error_message();
      			validation_message();
	      	?>
			<!-- START DEFAULT DATATABLE -->
			<div class="panel panel-default">
				<div class="pane-heading">
					<form>
						<div class="row" style="margin: 10px 0;">
							<div class="col-md-6">
								<input type="text" class="form-control" placeholder="Enter name" value="<?= set_g('keyword') ?>" name="keyword" />
							</div>
							<button class="btn btn-info">Search</button>
						</div>
					</form>
				</div>
				<div class="panel-body">
					<div class="table-responsive">
						<?php
							if (is_array($res) && !empty($res)) {
  								echo form_open("sitepanel/category/", 'id="data_form"');
							?>
							<table class="table datatable" id="my_data">
							<?php
								$atts = array(
									'width' => '650',
									'height' => '400',
									'scrollbars' => 'yes',
									'status' => 'yes',
									'resizable' => 'yes',
									'screenx' => '0',
									'screeny' => '0'
								);
              				?>

							<thead>
								<tr>
									<th width="31" style="text-align: center;">
										<input type="checkbox" onclick="$('input:checkbox').not(this).prop('checked', this.checked);" /></th>
									<th>Name</th>
									<th>Image</th>
									<!-- <th>Display Order</td>-->
									<th>Status</th>
									<th>Action</th>
								</tr>
							</thead>

							<tbody>
								<?php
  									foreach ($res as $catKey => $pageVal) {
    									$imgdisplay = FALSE;
    									$displayorder = ($pageVal['sort_order'] != '') ? $pageVal['sort_order'] : "0";
									    $total_subcategory = $pageVal['total_subcategories'];
									    $condtion_product = "AND category_id='" . $pageVal['category_id'] . "'";
									    $total_products = count_products($condtion_product);
							    ?>
								<tr>
									<td>
										<?php
						                    if ($pageVal['category_id'] > 1) {
				                      			?>
													<input type="checkbox" name="arr_ids[]" value="<?php echo $pageVal['category_id']; ?>" />
												<?php
                    						}
					                   ?>
										<input type="hidden" name="category_count" value="Y" />
										<input type="hidden" name="product_count" value="Y" />
									</td>
									<td>



										<?php echo $pageVal['category_name']; ?>



										<?php

                        /*



                          if ($total_subcategory > 0) {



                          echo "<br><br>" . anchor("sitepanel/category/index/" . $pageVal['category_id'], 'Subcategory [' . $total_subcategory . ']', 'class="refSection" ');



                          } elseif ($total_products > 0) {



                          echo "<br><br>" . anchor("sitepanel/products/index/" . $pageVal['category_id'], 'Products [' . $total_products . ']', 'class="refSection" ');



                          } else {



                          echo "<br><br>" . anchor("sitepanel/category/index/" . $pageVal['category_id'], 'Subcategory [' . $total_subcategory . ']', 'class="refSection" ');







                          echo " | " . anchor("sitepanel/products/index/" . $pageVal['category_id'], 'Products [' . $total_products . ']', 'class="refSection" ');



                          } */







                        echo "<br><br>" . anchor("sitepanel/category/index/" . $pageVal['category_id'], 'Subcategory [' . $total_subcategory . ']', 'class="refSection" ');







                        echo " | " . anchor("sitepanel/products/index/" . $pageVal['category_id'], 'Products [' . $total_products . ']', 'class="refSection" ');







                        if ($parent_id > 0) {



                          if ($pageVal['home_menu'] == '0') {



                            //echo " | " . anchor("sitepanel/category/index/?set_home_category=" . $pageVal['category_id'], 'Set As Home Menu', 'class="refSection" ');

                          } else {



                            //echo " | " . anchor("sitepanel/category/index/?unset_home_category=" . $pageVal['category_id'], 'Unset As Home Menu', 'class="refSection" ');

                          }

                        }

                        ?>



									</td>



									<td><img src="<?php echo get_image('category', $pageVal['category_image'], 75, 75, 'AR'); ?>" </td> <!--<td>

										<input type="text" name="ord[<?php echo $pageVal['category_id'];  ?>]" value="<?php echo $displayorder;  ?>"
										 size="5" />

									</td>-->



									<td>
										<?php echo ($pageVal['status'] == 1) ? "Active" : "In-active"; ?>
									</td>



									<td>



										<?php echo anchor("sitepanel/category/edit/$pageVal[category_id]", "<span><i class='icon-edit'></i>Edit</span>", 'class="btn btn-info" '); ?>











									</td>







								</tr>



								<?php } ?>



							</tbody>



						</table>



						<table class="list" width="100%">



							<tr>



								<td align="left" style="padding:5px">



									<input name="status_action" type="submit" value="Activate" class="button2" id="Activate" onClick="return validcheckstatus('arr_ids[]', 'Activate', 'Record', 'u_status_arr[]');" />







									<input name="status_action" type="submit" class="button2" value="Deactivate" id="Deactivate" onClick="return validcheckstatus('arr_ids[]', 'Deactivate', 'Record', 'u_status_arr[]');" />







									<input name="status_action" type="submit" class="button2" id="Delete" value="Delete" onClick="return validcheckstatus('arr_ids[]', 'delete', 'Record');" />



									<input name="update_order" type="submit" value="Update Order" class="button2" />



								</td>



							</tr>



							</tbody>



						</table>







						<?php echo form_close(); ?>







						<?php } else { ?>



						<center><strong>
								<?php echo "No Record(s) Found!" ?></strong></center>



						<?php } ?>



					</div>



				</div>



			</div>



			<!-- END DEFAULT DATATABLE -->



		</div>



	</div>







</div>



<!-- PAGE CONTENT WRAPPER -->



<?php $this->load->view('includes/footer'); ?>