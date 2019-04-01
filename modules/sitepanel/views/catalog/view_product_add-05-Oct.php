<?php

$this->load->view('includes/header');

$pcatID = ($this->uri->segment(4) > 0) ? $this->uri->segment(4) : "0";

$pcatID = (int) $pcatID;

//trace($catalog);

?>

<div class="page-title">

  <h2><span><?php echo $heading_title; ?></span></h2>

  <div class="buttons pull-right col-md-2">

    <a href="javascript:void(0);" onclick="$('#form').submit();" class="btn btn-primary pull-right">Save</a>

    <a href="<?php echo base_url('sitepanel/products'); ?>"  class="btn bg-red pull-left">Cancel</a>  

  </div>

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

          <div class="tab-pane active" id="tab-general">

            <?php

            $selcatID = ($this->input->post('category_id') != '') ? $this->input->post('category_id') : $pcatID;

            $selcatID = (int) $selcatID;

            ?>

            <div class="form-group">

              <label class="col-md-3 col-xs-12 control-label"><span class="required">*</span>Category</label>

              <div class="col-md-6">                                                                                                                                                        

                <select name="category_id" class="form-control">

                  <?php echo get_nested_dropdown_menu(0, $selcatID); ?>

                </select>

                <?php echo form_error('category_id'); ?>                                                    

              </div>

              <label class="pull-right">

                <span class="required">*Required Fields</span>

                <span class="required" style="display: block;">**Conditional Fields</span>

              </label>

            </div>

            <div class="form-group">

              <label class="col-md-3 col-xs-12 control-label">Choose Catalog</label>

              <div class="col-md-6">                                            

                <select name="catalog_id" class="form-control">

                  <option value="">--Select Catalog--</option>

                  <?php

                  foreach($catalog as $c=>$cval){

                    $sel = ($cval['setId'] == $this->input->get_post('catalog_id'))?'selected':'';

                    ?>

                    <option value="<?php echo $cval['setId']; ?>]" <?php echo $sel; ?>><?php echo $cval['catalog_name']; ?></option>

                    <?php

                  }

                  ?>

                </select>

                <?php echo form_error('catalog_id'); ?>

              </div>

            </div>

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



            <div class="form-group">

              <label class="col-md-3 col-xs-12 control-label"><span class="required">*</span>Base Quantity</label>

              <div class="col-md-6">                                            

                <input type="text" name="quantity" class="form-control" value="<?php echo set_value('quantity'); ?>" />

                <?php echo form_error('quantity'); ?>

              </div>

            </div>



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

            <div class="form-group">

              <label class="col-md-3 col-xs-12 control-label">Policy</label>

              <div class="col-md-6 col-xs-12">                                            

                <textarea name="products_custom_description" rows="5" cols="50" id="custom_description" ><?php echo set_value('products_custom_description'); ?></textarea> <?php echo display_ckeditor($ckeditor1); ?>

                <?php echo form_error('products_custom_description'); ?>

              </div>

            </div>           

            <div class="form-group">

              <div class="col-md-6 col-xs-12">                                                                                <input type="hidden" name="action" value="addnews" />

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

