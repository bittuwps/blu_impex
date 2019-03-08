<?php
//$hide_jquery=true;
$this->load->view('includes/header');

$pcatID = ($this->uri->segment(4) > 0) ? $this->uri->segment(4) : "0";

$pcatID = (int) $pcatID;

//trace($catalog);

?>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/select2/css/select2.min.css">
<!-- <script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/select2/js/select2.min.js"></script>
 -->

<div class="page-title">

  <h2><span><?php echo $heading_title; ?></span></h2>

  <div class="buttons pull-right col-md-2">

    <a href="javascript:void(0);" onclick="$('#form').submit();" class="btn btn-primary pull-right">Save</a>

    <a href="<?php echo base_url('sitepanel/products'); ?>"  class="btn bg-red pull-left">Cancel</a>    </div>

</div>



<div class="page-content-wrap">

  <div class="row">

    <div class="col-md-12">

      <?php echo form_open_multipart('sitepanel/products/add/', array('id' => 'form', 'class' => "form-horizontal")); ?>

      <div class="panel panel-default tabs">

        <ul class="nav nav-tabs" role="tablist">

          <li class="active"><a href="#tab-general" role="tab" data-toggle="tab">Product Details</a></li>

        </ul>

        <div class="panel-body tab-content">
			<?= validation_errors(); ?>
          <div class="tab-pane active" id="tab-general">

            <?php

            $selcatID = ($this->input->post('category_id') != '') ? $this->input->post('category_id') : $pcatID;

            $selcatID = (int) $selcatID;

            ?>

            <div class="form-group">

              <label class="col-md-3 col-xs-12 control-label"><span class="required">*</span>Category</label>

              <div class="col-md-6">                                                                                <select name="category_id[]" class="form-control" multiple size="7">

				<!-- <select name="category_links" id="cat_list" > -->
                  	<?php echo get_nested_dropdown_menu(0, $selcatID); ?>
                </select>

                <?php echo form_error('category_id'); ?>                                                        </div>

              <label class="pull-right">

                <span class="required">*Required Fields</span>

                <span class="required" style="display: block;">**Conditional Fields</span>

              </label>

            </div>

            <!--<div class="form-group">

              <label class="col-md-3 col-xs-12 control-label"><span class="required">*</span>Store</label>

              <div class="col-md-6">

                <div class="row" style="max-height: 150px; overflow-y: scroll; border: 1px solid #e1e1e1; padding: 5px;">

                  <div class="col-md-12">

                    <?php

                    $posted_color_arr = array();

                    if ($this->input->post('store_id')) {

                      $posted_color_arr = $this->input->post('store_id');

                    }

                    if (is_array($store) && !empty($store)) {

                      foreach ($store as $val) {

                        ?>

                        <div class="col-md-4 col-lg-4 col-sm-4 col-xs-6">

                          <input type="checkbox" name="store_id[]" value="<?php echo $val['setId']; ?>" <?php echo (in_array($val['setId'], $posted_color_arr)) ? ' checked' : ''; ?>  /> <?php echo $val['store_name']; ?>

                        </div>

                        <?php

                      }

                    }

                    ?>

                  </div>

                </div>

                <?php echo form_error('store_id[]'); ?>

              </div>

            </div>-->



            <?php

            $default_params = array(

                'heading_element' => array(

                    'field_heading' => "Name",

                    'field_name' => "product_name",

                    'field_placeholder' => "Your product Name",

                    'exparams' => 'size="50"'

                ),

                'url_element' => array(

                    'field_heading' => "Page URL",

                    'field_name' => "friendly_url",

                    'field_placeholder' => "Your Page URL",

                    'exparams' => 'size="50"',

                    'pre_seo_url' => '',

                    'pre_url_tag' => FALSE

                )

            );



            seo_add_form_element($default_params);

            ?>



            <div class="form-group">

              <label class="col-md-3 col-xs-12 control-label"><span class="required">*</span>Product Code</label>

              <div class="col-md-6">

                <input type="text" name="product_code" class="form-control" value="<?php echo set_value('product_code'); ?>" />

                <?php echo form_error('product_code'); ?>

              </div>

            </div>            

            <!--<div class="form-group">

              <label class="col-md-3 col-xs-12 control-label"><span class="required">*</span>Product Name in Portuguese</label>

              <div class="col-md-6">

                <input type="text" name="product_name_p" class="form-control" value="<?php echo set_value('product_name_p'); ?>" />

                <?php echo form_error('product_name_p'); ?>

              </div>

            </div>-->



            <div class="form-group">

              <label class="col-md-3 col-xs-12 control-label"><span class="required">*</span>Base Quantity</label>

              <div class="col-md-6">                                            

                <input type="text" name="quantity" class="form-control" value="<?php echo set_value('quantity'); ?>" />

                <?php echo form_error('quantity'); ?>

              </div>

            </div>

            <?php

            /*

              <div class="form-group">



              <label class="col-md-3 col-xs-12 control-label"><span class="required">*</span>Color</label>



              <div class="col-md-6">



              <select name="color_id[]" class="form-control" style="width:380px;"  size="10" multiple>



              <option value="">Select</option>



              <?php



              if($this->input->post('color_id')){



              $posted_color_arr = $this->input->post('color_id');



              }



              else{



              $posted_color_arr = array();



              }



              if (is_array($colors) && !empty($colors)) {



              foreach ($colors as $val) {



              echo '<option value="' . $val['color_id'] . '"' . (in_array($val['color_id'], $posted_color_arr) ? ' selected="selected"' : '') . '>' . $val['color_name'] . '</option>';



              }



              }



              ?>



              </select>



              <?php echo form_error('color_id[]'); ?>



              </div>



              </div>







              <div class="form-group">



              <label class="col-md-3 col-xs-12 control-label"><span class="required">*</span>Size</label>



              <div class="col-md-6">



              <select name="size_id[]" class="form-control" style="width:380px;"  size="10" multiple>



              <option value="">Select</option>



              <?php



              if($this->input->post('size_id')){



              $posted_size_arr = $this->input->post('size_id[]');



              }



              else{



              $posted_size_arr = array();



              }



              if (is_array($sizes) && !empty($sizes)) {



              foreach ($sizes as $val) {



              echo '<option value="' . $val['size_id'] . '"' . (in_array($val['size_id'], $posted_size_arr) ? ' selected="selected"' : '') . '>' . $val['size_name'] . '</option>';



              }



              }



              ?>



              </select>



              <?php echo form_error('size_id[]'); ?>



              </div>



              </div>

              <div class="form-group">

              <label class="col-md-3 col-xs-12 control-label">Size Chart</label>

              <div class="col-md-6">

              <input type="file" name="size_chart"  id="size_chart" />

              <?php echo form_error('size_chart'); ?>

              </div>

              </div>

             * 

             */

            if (is_array($attributes) && !empty($attributes)) {

              $attr = $this->config->item('attributeArray');

              foreach ($attributes as $aval) {

                $required = ($aval['is_product_mandatory'] == '1') ? 'required' : '';

                if ($attr[$aval['type']] != 'TextBox' && $attr[$aval['type']] != 'TextArea') {

                  $lables = $this->db->query("SELECT * FROM wl_attributes_lable WHERE parent_id = '" . $aval['id'] . "'AND status = '1'")->result_array();

                  if ($aval['type'] == 'multi select') {

                    ?>

                    <div class="form-group">

                      <label class="col-md-3 col-xs-12 control-label"><?php echo ($required) ? '<span class="required">*</span>' : ""; ?><?php echo $aval['name']; ?></label>

                      <div class="col-md-6 col-xs-12"> 

                        <select class="form-control" multiple="multiple" name="attribute[<?php echo url_title($aval['name']); ?>][]" size="3" <?php echo $required; ?>>

                          <?php

                          foreach ($lables as $lval) {

                            ?>

                            <option value="<?php echo $lval['name']; ?>" /><?php echo $lval['name']; ?></option>

                          <?php }

                          ?>

                          ?>

                        </select>

                      </div>

                    </div>

                    <?php

                  } elseif ($aval['type'] == 'select') {

                    ?>

                    <div class="form-group">

                      <label class="col-md-3 col-xs-12 control-label"><?php echo ($required) ? '<span class="required">*</span>' : ""; ?><?php echo $aval['name']; ?></label>

                      <div class="col-md-6 col-xs-12">

                        <select class="form-control" name="attribute[<?php echo url_title($aval['name']); ?>]" size="3" <?php echo $required; ?>>

                          <?php

                          foreach ($lables as $lval) {

                            ?>

                            <option value="<?php echo $lval['name']; ?>" /><?php echo $lval['name']; ?></option>

                            <?php

                          }

                          ?>

                        </select>

                      </div>

                    </div>

                    <?php

                  } elseif ($aval['type'] == 'radio button') {

                    ?>

                    <div class="form-group">

                      <label class="col-md-3 col-xs-12 control-label"><?php echo ($required) ? '<span class="required">*</span>' : ""; ?><?php echo $aval['name']; ?></label>

                      <div class="col-md-6 col-xs-12">

                        <?php

                        foreach ($lables as $lval) {

                          ?>

                          <input type="radio" name="attribute[<?php echo url_title($aval['name']); ?>][<?php echo url_title($lval['name']); ?>]" value="1" /><?php echo ucwords($lval['name']); ?>&nbsp;

                          <?php

                        }

                        ?>

                      </div>

                    </div>

                    <?php

                  } elseif ($aval['type'] == 'checkbox') {

                    ?>

                    <div class="form-group">

                      <label class="col-md-3 col-xs-12 control-label"><?php echo ($required) ? '<span class="required">*</span>' : ""; ?><?php echo $aval['name']; ?></label>

                      <div class="col-md-6 col-xs-12">

                        <?php

                        foreach ($lables as $lval) {

                          ?>

                          <input type="checkbox" name="attribute[<?php echo url_title($aval['name']); ?>][<?php echo url_title($lval['name']); ?>]" value="1" /><?php echo ucwords($lval['name']); ?>&nbsp;

                          <?php

                        }

                        ?>

                      </div>

                    </div>

                    <?php

                  }

                } else {

                  if ($aval['type'] == 'textbox') {

                    ?>

                    <div class="form-group">

                      <label class="col-md-3 col-xs-12 control-label"><?php echo ($required) ? '<span class="required">*</span>' : ""; ?><?php echo $aval['name']; ?></label>

                      <div class="col-md-6 col-xs-12">

                        <input class="form-control" type="text" name="attribute[<?php echo url_title($aval['name']); ?>]" <?php echo $required; ?>>

                      </div>

                    </div>



                    <?php

                  } elseif ($aval['type'] == 'textarea') {

                    ?>

                    <div class="form-group">

                      <label class="col-md-3 col-xs-12 control-label"><?php echo ($required) ? '<span class="required">*</span>' : ""; ?><?php echo $aval['name']; ?></label>

                      <div class="col-md-6 col-xs-12">

                        <textarea class="form-control" name="attribute[<?php echo url_title($aval['name']); ?>]" <?php echo $required; ?>></textarea>

                      </div>

                    </div>

                    <?php

                  }

                }

              }

            }

            ?>



            <div class="form-group">

              <label class="col-md-3 col-xs-12 control-label"><span class="required">*</span>MRP</label>

              <div class="col-md-6 col-xs-12">                                            

                <input type="text" name="product_price" class="form-control" value="<?php echo set_value('product_price'); ?>" />

                <?php echo form_error('product_price'); ?>

              </div>

            </div>

            <div class="form-group">

              <label class="col-md-3 col-xs-12 control-label"><span class="required">**</span>Selling Price</label>

              <div class="col-md-6 col-xs-12">                                            

                <input type="text" name="product_discounted_price" class="form-control" value="<?php echo set_value('product_discounted_price'); ?>" />

                <?php echo form_error('product_discounted_price'); ?>

              </div>

            </div>

            <div class="form-group">

              <label class="col-md-3 col-xs-12 control-label">Alt</label>

              <div class="col-md-6 col-xs-12">                                            

                <input type="text" name="product_alt" class="form-control" value="<?php echo set_value('product_alt'); ?>" />

                <?php echo form_error('product_alt'); ?>

              </div>

            </div>

            <div class="form-group">

              <label class="col-md-3 col-xs-12 control-label">Images</label>

              <div class="col-md-6 col-xs-12">                                            

                <a href="<?php echo base_url(); ?>sitepanel/upload_media?action=browse" class="upload_media">Select/Upload from the server</a><br /><br /><div class="red">(You can browse <span id="img_item_count"><?php echo $this->config->item('total_product_images'); ?></span> images from the server)</div><br />

                [ <?php echo $this->config->item('product.best.image.view'); ?> ]<br />

                <br />

                <p><b>Images Selected from server</b></p> 

                <div id="browsed_container">

                  <?php

                  $items_browsed = FALSE;

                  $browsed_image = set_value('browsed_image');

                  $actual_browsed_image = array();

                  if ($browsed_image != '') {

                    $browsed_arr = explode(",", $browsed_image);

                    $product_img_str = "";

                    foreach ($browsed_arr as $val) {

                      if (file_exists(UPLOAD_DIR . '/product_images/thumb/' . $val)) {

                        array_push($actual_browsed_image, $val);

                        $items_browsed = TRUE;

                        $product_img_str .= '<li data-src="' . $val . '"><img src="' . base_url() . 'uploaded_files/product_images/thumb/' . $val . '" />&nbsp;<a class="red delete_media"><img src="' . base_url() . 'assets/sitepanel/image/edit-cut.png"></a></li>';

                      }

                    }

                    if ($items_browsed === TRUE) {

                      echo '<ul class="image_select_list list-inline" style="display:inline;list-style:none;">' . $product_img_str . '</ul>';

                    }

                  } else {

                    echo '<span class="red">None</span>';

                  }

                  ?>  

                </div>

                <input type="hidden" name="browsed_image" id="browsed_image" value="<?php echo implode(",", $actual_browsed_image); ?>" /> 

              </div>

            </div>            

            <div class="form-group">

              <label class="col-md-3 col-xs-12 control-label">Description</label>

              <div class="col-md-6 col-xs-12">                                            

                <textarea name="products_description" rows="5" cols="50" id="description" ><?php echo set_value('products_description'); ?></textarea> <?php echo display_ckeditor($ckeditor); ?>

                <?php echo form_error('products_description'); ?>

              </div>

            </div>

            <!--<div class="form-group">

              <label class="col-md-3 col-xs-12 control-label">Description In Portuguese</label>

              <div class="col-md-6 col-xs-12">                                            

                <textarea name="products_description_p" rows="5" cols="50" id="description_p" ><?php echo set_value('products_description_p'); ?></textarea> <?php echo display_ckeditor($ckeditor2); ?>

                <?php echo form_error('products_description_p'); ?>

              </div>

            </div>-->

            <div class="form-group">

              <label class="col-md-3 col-xs-12 control-label">Policy</label>

              <div class="col-md-6 col-xs-12">                                            

                <textarea name="products_custom_description" rows="5" cols="50" id="custom_description" ><?php echo set_value('products_custom_description'); ?></textarea> <?php echo display_ckeditor($ckeditor1); ?>

                <?php echo form_error('products_custom_description'); ?>

              </div>

            </div>

            <!--<div class="form-group">

              <label class="col-md-3 col-xs-12 control-label">Policy in Portuguese</label>

              <div class="col-md-6 col-xs-12">                                            

                <textarea name="products_custom_description_p" rows="5" cols="50" id="custom_description_p" ><?php echo set_value('products_custom_description_p'); ?></textarea> <?php echo display_ckeditor($ckeditor3); ?>

                <?php echo form_error('products_custom_description_p'); ?>

              </div>

            </div>-->

            

            <div class="form-group">

              <div class="col-md-6 col-xs-12">

                <input type="hidden" name="action" value="addnews" />

                <input type="hidden" name="pcatID" value="<?php echo $pcatID; ?>" />

              </div>

            </div>           

          </div>

        </div>

      </div>

      <?php echo form_close(); ?>

    </div>

  </div>

</div>
<script>
	$(document).ready(function(){
		/* $('select').select2({
			placeholder: "Select Categories",
			maximumSelectionSize: 1,
		}); */
	});
	
</script>
<?php $this->load->view('includes/footer'); ?>

<script type="text/javascript">

  var total_db_limit = '<?php echo $this->config->item('total_product_images'); ?>';

</script>

<link rel="stylesheet" type="text/css" href="<?php echo resource_url(); ?>fancybox/jquery.fancybox.css" />

<script src="<?php echo resource_url(); ?>fancybox/jquery.fancybox.pack.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/sitepanel_new/js/uploader.js"></script> 

    <script type="text/javascript" src="<?php echo base_url(); ?>assets/sitepanel_new/js/jquery/jquery-3.1.1.min.js"></script>
 
<script>

  $.noConflict();

  jQuery(document).ready(function () {

    jQuery("#ptitle").keyup(function () {

      var x = jQuery(this).val().length;

      var y = 100 - x;

      jQuery('#title_char').html('Max Length ' + y + ' Char');

    });

    $('.upload_media').fancybox({'width': 720, 'height': 390, 'autoScale': false, 'transitionIn': 'fade', 'transitionOut': 'fade', 'type': 'iframe'});

    $(".dg2").fancybox({'type': 'image', 'titlePosition': 'over'});

});

</script>

