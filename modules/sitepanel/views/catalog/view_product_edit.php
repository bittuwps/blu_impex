<?php
$this->load->view('includes/header');
$pcatID = ($this->uri->segment(4) > 0) ? $this->uri->segment(4) : "0";
$pcatID = (int) $pcatID;
?>

<div class="page-title">
  <h2><span><?php echo $heading_title; ?></span></h2>
  <div class="buttons pull-right col-md-2">
    <a href="javascript:void(0);" onclick="$('#form').submit();" class="btn btn-primary pull-right">Save</a>
    <a href="javascript:void(0);" onclick="history.back();" class="btn bg-red pull-left">Cancel</a>  
  </div>
</div>

<div class="page-content-wrap">
  <div class="row">
    <div class="col-md-12">
      <?php echo form_open_multipart(current_url_query_string(), array('id' => 'form', 'class' => "form-horizontal")); ?>
      <div class="panel panel-default tabs">                            
        <ul class="nav nav-tabs" role="tablist">
          <li class="active"><a href="#tab-general" role="tab" data-toggle="tab">Product Details</a></li>
        </ul>
        <div class="panel-body tab-content">
          <div class="tab-pane active" id="tab-general">
            <?php echo validation_errors(); ?>   
            <?php
            $selcatID = ($this->input->post('category_id') != '') ? $this->input->post('category_id') : $pcatID;
            $selcatID = (int) $selcatID;
            ?>

            <div class="form-group">
              <label class="col-md-3 col-xs-12 control-label"><span class="required">*</span>Category</label>
              <div class="col-md-6">                                                                                                                                                        
                <select name="category_id[]" multiple class="form-control">
                  <?php echo get_nested_dropdown_menu(0, $res['category_id']); ?>
                </select>
                <?php echo form_error('category_id'); ?>                                                    
              </div>

              <label class="pull-right">
                <span class="required">*Required Fields</span>
                <span class="required" style="display: block;">**Conditional Fields</span>
              </label>

            </div>
            <!--<div class="form-group">
              <label class="col-md-3 col-xs-12 control-label"><span class="required">*</span>Stores</label>
              <div class="col-md-6">
                <div class="row" style="max-height: 150px; overflow-y: scroll; border: 1px solid #e1e1e1; padding: 5px;">
                  <div class="col-md-12">
                    <?php
                    $posted_color_arr = explode(',', $res['store_id']);
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
            <!--div class="form-group">
              <label class="col-md-3 col-xs-12 control-label">Choose Catalog</label>
              <div class="col-md-6">                                            
                <select name="catalog_id" class="form-control">
                  <option value="">--Select Catalog--</option>
            <?php
            /*
              foreach($catalog as $c=>$cval){
              $sel = ($cval['setId'] == $res['catalog_id'])?'selected':'';
              ?>
              <option value="<?php echo $cval['setId']; ?>]" <?php echo $sel; ?>><?php echo $cval['catalog_name']; ?></option>
              <?php
              }
             * 
             */
            ?>
                </select>
            <?php //echo form_error('catalog_id'); ?>
              </div>
            </div-->

            <?php
            $default_params = array(
                'heading_element' => array(
                    'field_heading' => $heading_title . " Name",
                    'field_name' => "product_name",
                    'field_value' => $res['product_name'],
                    'field_placeholder' => "Your product Name",
                    'exparams' => 'class="form-control"',
                ),
                'url_element' => array(
                    'field_heading' => "Page URL",
                    'field_name' => "friendly_url",
                    'field_value' => $res['friendly_url'],
                    'field_placeholder' => "Your Page URL",
                    'exparams' => 'class="form-control"',
                )
            );
            seo_edit_form_element($default_params);
            ?>

            <div class="form-group">
              <label class="col-md-3 col-xs-12 control-label"><span class="required">*</span>Product Code</label>
              <div class="col-md-6">                                            
                <input type="text" name="product_code" class="form-control" value="<?php echo set_value('product_code', $res['product_code']); ?>" />
                <?php echo form_error('product_code'); ?>
              </div>
            </div>
            <!--<div class="form-group">
              <label class="col-md-3 col-xs-12 control-label"><span class="required">*</span>Product Name in Portuguese</label>
              <div class="col-md-6">
                <input type="text" name="product_name_p" class="form-control" value="<?php echo set_value('product_name_p',$res['product_name_p']); ?>" />
                <?php echo form_error('product_name_p'); ?>
              </div>
            </div>-->

            <div class="form-group">
              <label class="col-md-3 col-xs-12 control-label"><span class="required">*</span>Base Quantity</label>
              <div class="col-md-6">                                            
                <input type="text" name="quantity" class="form-control" value="<?php echo set_value('quantity', $res['product_qty']); ?>" />
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
              $colArr = explode(',', $res['color_ids']);
              if (is_array($colors) && !empty($colors)) {
              foreach ($colors as $val) {
              $sel = (in_array($val['color_id'], $colArr)) ? 'selected' : '';
              echo '<option value="' . $val['color_id'] . '"' . $sel . '>' . $val['color_name'] . '</option>';
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
              $szArr = explode(',', $res['size_ids']);

              if (is_array($sizes) && !empty($sizes)) {
              foreach ($sizes as $val) {
              $sel = (in_array($val['size_id'], $szArr)) ? 'selected' : '';
              echo '<option value="' . $val['size_id'] . '"' . $sel . '>' . $val['size_name'] . '</option>';
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
              <!--div class="form-group" style="display:none;" id="select_swatch">
              <label class="col-md-3 col-xs-12 control-label"><span class="required">*</span>Swatch</label>
              <div class="col-md-6">

              <select name="swatch_id[]" class="form-control" style="width:380px;"  size="10" multiple>
              <option value="">Select</option>
              <?php
              if (is_array($swatches) && !empty($swatches)) {
              foreach ($swatches as $val) {

              echo '<option value="' . $val['swatch_id'] . '"' . (in_array($val['swatch_id'], $posted_swatch_arr) ? ' selected="selected"' : '') . '>' . $val['swatch_name'] . '</option>';
              }
              }
              ?>
              </select>
              <?php //echo form_error('swatch_id[]'); ?>

              </div>
              </div-->
             * 
             */
            if (is_array($attributes) && !empty($attributes)) {
              $attributeArray = json_decode($res['products_attributes']);
              $attr = $this->config->item('attributeArray');
              foreach ($attributes as $aval) {
                $required = ($aval['is_product_mandatory'] == '1') ? 'required' : '';
                if ($attr[$aval['type']] != 'TextBox' && $attr[$aval['type']] != 'TextArea') {
                  $lables = $this->db->query("SELECT * FROM wl_attributes_lable WHERE parent_id = '" . $aval['id'] . "'AND status = '1'")->result_array();
                  if ($aval['type'] == 'multi select') {
                    $ttl = url_title($aval['name']);
                    $attrAr = (array) $attributeArray->$ttl;
                    ?>
                    <div class="form-group">
                      <label class="col-md-3 col-xs-12 control-label"><?php echo ($required) ? '<span class="required">*</span>' : ""; ?><?php echo $aval['name']; ?></label>
                      <div class="col-md-6 col-xs-12"> 
                        <select class="form-control" multiple="multiple" name="attribute[<?php echo url_title($aval['name']); ?>][]" size="3" <?php echo $required; ?>>
                          <?php
                          foreach ($lables as $lval) {
                            $sel = (in_array($lval['name'], $attrAr)) ? 'selected' : '';
                            ?>
                            <option value="<?php echo $lval['name']; ?>" <?php echo $sel; ?> /><?php echo $lval['name']; ?></option>
                          <?php }
                          ?>
                          ?>
                        </select>
                      </div>
                    </div>
                    <?php
                  } elseif ($aval['type'] == 'select') {
                    $ttl = url_title($aval['name']);
                    if(isset($attributeArray->$ttl)){
                    $attrAr = (array) $attributeArray->$ttl;
                    }else{
                      $attrAr=array();
                    }
                    ?>
                    <div class="form-group">
                      <label class="col-md-3 col-xs-12 control-label"><?php echo ($required) ? '<span class="required">*</span>' : ""; ?><?php echo $aval['name']; ?></label>
                      <div class="col-md-6 col-xs-12">
                        <select class="form-control" name="attribute[<?php echo url_title($aval['name']); ?>]" size="3" <?php echo $required; ?>>
                          <?php
                          foreach ($lables as $lval) {
                            $sel = (in_array($lval['name'], $attrAr)) ? 'selected' : '';
                            ?>
                            <option value="<?php echo $lval['name']; ?>" <?php echo $sel; ?> /><?php echo $lval['name']; ?></option>
                            <?php
                          }
                          ?>
                        </select>
                      </div>
                    </div>
                    <?php
                  } elseif ($aval['type'] == 'radio button') {
                    $ttl = url_title($aval['name']);
                    $attrAr = (array) $attributeArray->$ttl;
                    ?>
                    <div class="form-group">
                      <label class="col-md-3 col-xs-12 control-label"><?php echo ($required) ? '<span class="required">*</span>' : ""; ?><?php echo $aval['name']; ?></label>
                      <div class="col-md-6 col-xs-12">
                        <?php
                        foreach ($lables as $lval) {
                          $sel = (array_key_exists(url_title($lval['name']), $attrAr)) ? 'checked' : '';
                          ?>
                          <input type="radio" name="attribute[<?php echo url_title($aval['name']); ?>][<?php echo url_title($lval['name']); ?>]" value="1" <?php echo $sel; ?> /><?php echo ucwords($lval['name']); ?>&nbsp;
                          <?php
                        }
                        ?>
                      </div>
                    </div>
                    <?php
                  } elseif ($aval['type'] == 'checkbox') {
                    $ttl = url_title($aval['name']);
                    $attrAr = (array) $attributeArray->$ttl;
                    ?>
                    <div class="form-group">
                      <label class="col-md-3 col-xs-12 control-label"><?php echo ($required) ? '<span class="required">*</span>' : ""; ?><?php echo $aval['name']; ?></label>
                      <div class="col-md-6 col-xs-12">
                        <?php
                        foreach ($lables as $lval) {
                          $sel = (array_key_exists(url_title($lval['name']), $attrAr)) ? 'checked' : '';
                          ?>
                          <input type="checkbox" name="attribute[<?php echo url_title($aval['name']); ?>][<?php echo url_title($lval['name']); ?>]" value="1" <?php echo $sel; ?> /><?php echo ucwords($lval['name']); ?>&nbsp;
                          <?php
                        }
                        ?>
                      </div>
                    </div>
                    <?php
                  }
                } else {
                  if ($aval['type'] == 'textbox') {
                    $ttl = url_title($aval['name']);
                    $attrArval = $attributeArray->$ttl
                    ?>
                    <div class="form-group">
                      <label class="col-md-3 col-xs-12 control-label"><?php echo ($required) ? '<span class="required">*</span>' : ""; ?><?php echo $aval['name']; ?></label>
                      <div class="col-md-6 col-xs-12">
                        <input class="form-control" value="<?php echo $attrArval; ?>" type="text" name="attribute[<?php echo url_title($aval['name']); ?>]" <?php echo $required; ?>>
                      </div>
                    </div>

                    <?php
                  } elseif ($aval['type'] == 'textarea') {
                    $ttl = url_title($aval['name']);
                    $attrArval = $attributeArray->$ttl
                    ?>
                    <div class="form-group">
                      <label class="col-md-3 col-xs-12 control-label"><?php echo ($required) ? '<span class="required">*</span>' : ""; ?><?php echo $aval['name']; ?></label>
                      <div class="col-md-6 col-xs-12">
                        <textarea class="form-control" name="attribute[<?php echo url_title($aval['name']); ?>]" <?php echo $required; ?>><?php echo $attrArval; ?></textarea>
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
                <input type="text" name="product_price" class="form-control" value="<?php echo set_value('product_price', formatNumber($res['product_price'], 2)); ?>" />
                <?php echo form_error('product_price'); ?>
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-3 col-xs-12 control-label"><span class="required">**</span>Selling Price</label>
              <div class="col-md-6 col-xs-12">                                            
                <input type="text" name="product_discounted_price" class="form-control" value="<?php echo set_value('product_discounted_price', $res['product_discounted_price']); ?>" />
                <?php echo form_error('product_discounted_price'); ?>
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-3 col-xs-12 control-label">Alt</label>
              <div class="col-md-6 col-xs-12">                                            
                <input type="text" name="product_alt" class="form-control" value="<?php echo set_value('product_alt', $res['product_alt']); ?>" />
                <?php echo form_error('product_alt'); ?>
              </div>
            </div>

            <div class="form-group">
              <!-- Button trigger modal -->
              <a href="<?php echo base_url(); ?>sitepanel/upload_media?action=browse" class="upload_media">
              </a>
            </div>

            <div class="form-group">
              <label class="col-md-3 col-xs-12 control-label">Images</label>
              <div class="col-md-6 col-xs-12">                                            
                <a href="<?php echo base_url(); ?>sitepanel/upload_media?action=browse" class="upload_media">Select/Upload from the server</a><br /><br /><div class="red">(You can browse <span id="img_item_count"></span> images from the server)</div><br />
                [ <?php echo $this->config->item('product.best.image.view'); ?> ]
                <br /><br />
                <div id="db_image_container">
                  <?php
                  $j = 0;
                  $db_image = 0;
                  for ($i = 1; $i <= $this->config->item('total_product_images'); $i++) {
                    $media_id = @$res_photo_media[$j]['id'];
                    $product_img = @$res_photo_media[$j]['media'];
                    $product_path = "products/" . $product_img;
                    $product_img_auto_id = @$res_photo_media[$j]['id'];
                    if ($product_img != '' && file_exists(UPLOAD_DIR . "/" . $product_path)) {
                      $db_image++;
                      echo '<div style="float:left;padding-left:5px;" id="db_imglist_' . $media_id . '"><a href="' . base_url() . 'uploaded_files/products/' . $product_img . '" class="dg2"><img src="' . base_url() . 'uploaded_files/products/' . $product_img . '" width="100" height="100" /></a>&nbsp;<a class="red delete_db_media" data-src="' . $media_id . '"><img src="' . base_url() . 'assets/sitepanel/image/edit-cut.png"></a></div>';
                    }
                    $j++;
                  }
                  ?>
                </div>
                <div style="clear:both;"></div>
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
                      echo '<ul class="image_select_list">' . $product_img_str . '</ul>';
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
                <textarea name="products_description" rows="5" cols="50" id="description" ><?php echo set_value('products_description', $res['products_description']); ?></textarea> <?php echo display_ckeditor($ckeditor); ?>
                <?php echo form_error('products_description'); ?>
              </div>
            </div>
            <!--<div class="form-group">
              <label class="col-md-3 col-xs-12 control-label">Description In Portuguese</label>
              <div class="col-md-6 col-xs-12">                                            
                <textarea name="products_description_p" rows="5" cols="50" id="description_p" ><?php echo set_value('products_description_p',$res['products_description_p']); ?></textarea> <?php echo display_ckeditor($ckeditor2); ?>
                <?php echo form_error('products_description_p'); ?>
              </div>
            </div>-->
            
            <div class="form-group">
              <label class="col-md-3 col-xs-12 control-label">Policy</label>
              <div class="col-md-6 col-xs-12">                                            
                <textarea name="products_custom_description" rows="5" cols="50" id="products_tech_description" ><?php echo set_value('products_custom_description', $res['products_custom_description']); ?></textarea> <?php echo display_ckeditor($ckeditor1); ?>
                <?php echo form_error('custom_description'); ?>
              </div>
            </div>
            <!--<div class="form-group">
              <label class="col-md-3 col-xs-12 control-label">Policy in Portuguese</label>
              <div class="col-md-6 col-xs-12">                                            
                <textarea name="products_custom_description_p" rows="5" cols="50" id="custom_description_p" ><?php echo set_value('products_custom_description_p',$res['products_custom_description_p']); ?></textarea> <?php echo display_ckeditor($ckeditor3); ?>
                <?php echo form_error('products_custom_description_p'); ?>
              </div>
            </div>-->
            <div class="form-group">
              <div class="col-md-6 col-xs-12">
                <input type="hidden" name="products_id" value="<?php echo $res['products_id']; ?>">
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php echo form_close(); ?>
    </div>
  </div>
</div>
<?php
$total_product_images = $this->config->item('total_product_images');
$total_db_limit = $total_product_images - $db_image;
$total_db_limit = $total_db_limit < 0 ? 0 : $total_db_limit;
echo $db_image;
?>
<?php $this->load->view('includes/footer'); ?>
<script type="text/javascript">
  var total_db_limit = '<?php echo $total_db_limit; ?>';
  $('#img_item_count').html((total_db_limit == 0 ? 'none' : total_db_limit));
  $('#product_exclude_images_ids').val('');
  function delete_product_images(img_id) {
    img_id = img_id.toString();
    exclude_ids1 = $('#product_exclude_images_ids').val();
    exclude_ids1_arr = exclude_ids1 == '' ? Array() : exclude_ids1.split(',');
    if ($.inArray(img_id, exclude_ids1_arr) == -1) {
      exclude_ids1_arr.push(img_id);
    }
    exclude_ids1 = exclude_ids1_arr.join(',');
    $('#product_exclude_images_ids').val(exclude_ids1);
    $('#product_image' + img_id).remove();
    $('#del_img_link_' + img_id).remove();
    alert($('#product_exclude_images_ids').val());

  }
  $(document).ready(function () {
    $('.delete_db_media').click(function (e) {
      e.preventDefault();
      var crfm = confirm('Are you sure you want to delete this');
      if (crfm) {
        $('.buttons').hide();
        media_id = $(this).attr('data-src');
        $.post('<?php echo base_url(); ?>sitepanel/products/delete_media', {id: media_id}, function (data) {
          if (data == 'success') {
            $('#db_imglist_' + media_id).remove();

            total_db_limit = parseInt(total_db_limit) + 1;
            $('#img_item_count').html(total_db_limit);

            $('.buttons').show();
          }
        });
      }
    });
  });
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
