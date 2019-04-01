

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

<div class="content">
    <div id="content">
  <div class="breadcrumb">
      <?php echo anchor('sitepanel/dashbord','Home'); ?>&raquo; <?php echo anchor('sitepanel/products','Back To Listing'); ?> &raquo;  <?php echo $heading_title; ?>
        
      </div>
      
      <div class="box">
    <div class="heading">
      <h1><img src="<?php echo base_url(); ?>assets/sitepanel/image/category.png" alt="" /> <?php echo $heading_title; ?></h1>
      
      <div class="buttons">
       <a href="javascript:void(0);" onclick="$('#form').submit();" class="button">Save</a>
	   <a href="javascript:void(0);" onclick="history.back();" class="button">Cancel</a>  
	</div>
      
    </div>
    <div class="content">
    
        <div id="tabs" class="htabs">         
        <a href="#tab-general">General</a>         
        </div> 

    
	    
<?php //echo validation_message();?>
<?php echo error_message(); ?> 
<?php echo form_open_multipart('sitepanel/products/add/',array('id'=>'form'));?>  
         
        
		 <div id="tab-general">
         
			<table width="100%"  class="form"  cellpadding="3" cellspacing="3">
			<tr>
				<th colspan="3" align="right" >
					<span class="required">*Required Fields</span><br>
					<span class="required">**Conditional Fields</span>
				 </th>
			</tr>
			<tr>
				<th colspan="2" align="center" > </th>
			</tr>
          
            
			<?php
			$selcatID = ($this->input->post('category_id')!='') ? $this->input->post('category_id'): $pcatID;
			$selcatID = (int) $selcatID;
			?>
            <tr class="trOdd">
              <td width="23%" align="right" valign="top" ><span class="required">*</span> Category:</td>
				
				<td width="74%" align="left">
				<select name="category_id" style="width:380px;"  size="10">
				<?php echo get_nested_dropdown_menu(0,$selcatID);?>
                </select>
				<?php echo form_error('category_id');?>
                </td>
                </tr>
	   <?php
			$default_params = array(
								'heading_element' => array(
														  'field_heading'=>"Name",
														  'field_name'=>"product_name",
														  'field_placeholder'=>"Your product Name",
														  'exparams' => 'size="50"'
														),
								'url_element'  => array(
														  'field_heading'=>"Page URL",
														  'field_name'=>"friendly_url",
														  'field_placeholder'=>"Your Page URL",
														  'exparams' => 'size="50"',
														  'pre_seo_url' =>'',
														  'pre_url_tag'=>FALSE
													   )

							  );

			
			seo_add_form_element($default_params);
			?>
			<tr class="trOdd">
			<td width="38%" height="26" align="right" ><span class="required">*</span> Product Code:</td>
			<td align="left"><input type="text" name="product_code" size="50" value="<?php echo set_value('product_code');?>" />
			<?php echo form_error('product_code');?>
			</td>

			</tr> 
			<tr class="trOdd">
				<td align="right" valign="top" ><span class="required">*</span> Color:</td>
				<td  align="left">
				  <select name="color_id[]" style="width:380px;"  size="10" multiple>
				  <option value="">Select</option>
				  <?php
				  if(is_array($colors) && !empty($colors))
				  {
					foreach($colors as $val)
					{

					  echo '<option value="'.$val['color_id'].'"'.(in_array($val['color_id'],$posted_color_arr) ? ' selected="selected"' : '').'>'.$val['color_name'].'</option>';

					}
				  }
				  ?>
				  </select>
				  <?php echo form_error('color_id[]');?>
				</td>
			  </tr>
			  <tr class="trOdd">
				<td align="right" valign="top" ><span class="required">*</span> Size:</td>
				<td  align="left">
				  <select name="size_id[]" style="width:380px;"  size="10" multiple>
				  <option value="">Select</option>
				  <?php
				  if(is_array($sizes) && !empty($sizes))
				  {
					foreach($sizes as $val)
					{

					  echo '<option value="'.$val['size_id'].'"'.(in_array($val['size_id'],$posted_size_arr) ? ' selected="selected"' : '').'>'.$val['size_name'].'</option>';

					}
				  }
				  ?>
				  </select>
				  <?php echo form_error('size_id[]');?>
				</td>
			  </tr>
              <tr class="trOdd">
			  <td width="38%" height="26" align="right" >Size Chart:</td>
              <td align="left"><input type="file" name="size_chart" id="size_chart" />
                              
			  <?php echo form_error('size_chart');?>
			  </td>

			</tr>
              
      <tr class="trOdd">
			  <td width="38%" height="26" align="right" >Product Title:</td>
                          <td align="left"><input type="text" name="ptitle" id="ptitle" maxlength="100" size="50" value="<?php echo set_value('ptitle');?>" />
                              <span id="title_char" style="vertical-align: bottom;font-size: 11px;color: red;">Max Length 100 Char</span>
			  <?php echo form_error('ptitle');?>
			  </td>

			</tr>
      <tr class="trOdd">
			  <td width="38%" height="26" align="right" >Base Quantity:</td>
			  <td align="left"><input type="text" name="qty" size="25" value="<?php echo set_value('qty');?>" />
			  <?php echo form_error('qty');?>
			  </td>

			</tr>
        
			<tr class="trOdd">
			  <td width="38%" height="26" align="right" >Product Material:</td>
			  <td align="left"><input type="text" name="product_material" size="50" value="<?php echo set_value('product_material');?>" />
			  <?php echo form_error('product_material');?>
			  </td>

			</tr>
			<tr class="trOdd">
			  <td width="38%" height="26" align="right" ><span class="required">*</span> Price:</td>
			  <td width="62%" align="left">
				<input type="text" name="product_price" size="40" value="<?php echo set_value('product_price');?>">
				<?php echo form_error('product_price');?>
			  </td>
			</tr>
			<tr class="trOdd">
			  <td width="38%" height="26" align="right" ><span class="required">**</span> Discounted price:</td>
			  <td width="62%" align="left">
				<input type="text" name="product_discounted_price" size="40" value="<?php echo set_value('product_discounted_price');?>">
				<?php echo form_error('product_discounted_price');?>
			  </td>
			</tr>
			<tr class="trOdd">
			  <td width="38%" height="26" align="right" >Delivery Text:</td>
			  <td align="left"><input type="text" name="delivery_text" size="50" value="<?php echo set_value('delivery_text');?>" />
			  <?php echo form_error('delivery_text');?>
			  </td>

			</tr>  
            <tr class="trOdd">
				<td width="28%" height="26" align="right" >Alt</td>
				<td align="left">
					<input type="text" name="product_alt" value="<?php echo set_value('product_alt');?>" size="50" />
					<?php echo form_error('product_alt');?>
					<br />
				</td>
			</tr>
			<tr class="trOdd">
				<td width="28%" height="26" align="right" >Images</td>
				<td align="left">
					<a href="<?php echo base_url();?>sitepanel/upload_media?action=browse" class="upload_media">Select/Upload from the server</a><br /><br /><div class="red">(You can browse <span id="img_item_count"><?php echo $this->config->item('total_product_images');?></span> images from the server)</div><br />
					[ <?php echo $this->config->item('product.best.image.view');?> ]<br />
					<br />
					<p><b>Images Selected from server</b></p> 
					<div id="browsed_container">
					<?php
					$items_browsed = FALSE;
					$browsed_image = set_value('browsed_image');
					$actual_browsed_image = array();
					if($browsed_image!='')
					{
					  $browsed_arr  = explode(",",$browsed_image);
					  $product_img_str  = "";
					  foreach($browsed_arr as $val)
					  {
						if(file_exists(UPLOAD_DIR.'/product_images/thumb/'.$val))
						{
						  array_push($actual_browsed_image,$val);
						  $items_browsed = TRUE;
						  $product_img_str .= '<li data-src="'.$val.'"><img src="'.base_url().'uploaded_files/product_images/thumb/'.$val.'" />&nbsp;<a class="red delete_media"><img src="'.base_url().'assets/sitepanel/image/edit-cut.png"></a></li>';
						}
					  }
					  if($items_browsed === TRUE)
					  {
						echo '<ul class="image_select_list">'.$product_img_str.'</ul>';
					  }
					}
					else
					{
					  echo '<span class="red">None</span>';
					}
					?>  
					</div>
					<input type="hidden" name="browsed_image" id="browsed_image" value="<?php echo implode(",",$actual_browsed_image);?>" />
				</td>
			</tr>
			<tr class="trOdd">
				<td width="28%" height="26" align="right" >Video Type</td>
				<td align="left">
					<!--input type="radio" name="video_type" value="embed" class="video_type" <?php echo set_value('video_type')=='embed' ? 'checked="checked"' : '';?>/-->
                    <input type="radio" name="video_type" value="file" class="video_type" <?php echo set_value('video_type')=='file' ? 'checked="checked"' : '';?> />File
					<?php echo form_error('video_type');?>
					<br />
				</td>
			</tr>
			<tr class="trOdd" id="embed" style="display:<?php echo set_value('video_type')=='embed' ? 'table-row' : 'none';?>;">
				<td width="28%" height="26" align="right" ><span class="required">*</span>You Tube URL</td>
				<td align="left">
					<input type="text" name="embed_code" value="<?php echo set_value('embed_code');?>" size="50" />
					<?php echo form_error('embed_code');?>
					<br />
				</td>
			</tr>
			<tr class="trOdd" id="vfile" style="display:<?php echo set_value('video_type')=='file' ? 'table-row' : 'none';?>;">
				<td width="28%" height="26" align="right" ><span class="required">*</span>Video File</td>
				<td align="left">
					<input type="file" name="video_file" value="" size="50" />
					<?php echo form_error('video_file');?>
					<br />
				</td>
			</tr>			
			<tr class="trOdd">
			  <td width="23%" align="right" >Description:</td>
				
				<td align="left">
<textarea name="products_description" rows="5" cols="50" id="description" ><?php echo set_value('products_description');?></textarea> <?php  echo display_ckeditor($ckeditor); ?>
				<?php echo form_error('products_description');?>
				</td>
			</tr>
			<tr class="trOdd">
			  <td align="left">&nbsp;</td>
				<td align="left">&nbsp;</td>
				<td align="left">
					<input type="hidden" name="action" value="addnews" />
                    <input type="hidden" name="pcatID" value="<?php echo $pcatID;?>" />
				</td>
			</tr>
			</table>
</div>
   <?php echo form_close(); ?>
	</div>
</div>
