<?php $this->load->view('includes/face_header'); ?>
<table width="100%"  border="0" cellspacing="5" cellpadding="5" class="list">
<thead>
<tr >
	<td colspan="3" height="30"><?php echo $heading_title; ?></td>
</tr>
</thead>
</table>
<div class="breadcrumb">
  <?php echo anchor('sitepanel/product_reviews?ref_id='.$res['entity_id'],'Back To Listing'); ?> &raquo;  <?php echo $heading_title; ?>
</div>
<div style="clear:both;"></div>
<?php
if(is_array($pres) && !empty($pres))
{
  $pres = $pres[0];
?>
<div style="background-Color:#F8EA4A;margin:5px;padding:5px;">
 <?php echo $pres['product_name'];?><br /><br />
</div>
<div style="clear:both;"></div>
<?php
}
?>

<?php echo form_open(current_url_query_string());?>
<table width="90%"  class="form"  cellpadding="3" cellspacing="3">
<tr>
<th colspan="2" align="right" >
  <span class="required">*Required Fields</span><br>
</th>
</tr>
<tr>
  <th colspan="2" align="center" > </th>
</tr>
<tr class="trOdd">
  <td width="28%" height="26" align="right" ><span class="required">*</span> Name</td>
  <td width="72%" align="left">
	<input type="text" name="author" size="40" value="<?php echo set_value('author',$res['author']);?>">
	<?php echo form_error('author');?>
  </td>
</tr>
<tr class="trOdd">
  <td width="28%" height="26" align="right" >Email</td>
  <td width="72%" align="left">
	<input type="text" name="author_email" size="40" value="<?php echo set_value('author_email',$res['author_email']);?>">
	<?php echo form_error('author_email');?>
  </td>
</tr>
<tr class="trOdd">
  <td width="28%" height="26" align="right" >Rating</td>
  <td width="72%" align="left">
	<?php
	$rating_opts = $this->config->item('rating_opts');
	$max_star = 5;
	for($ix=1;$ix<=$max_star;$ix++)
	{
	  $rating_title = $rating_opts[$ix];

	  $nostar = $max_star - $ix;
	?>
	  <input type="radio" name="ads_rating"  value="<?php echo $ix;?>" <?php echo set_value('ads_rating',$res['ads_rating'])==$ix ? 'checked="checked"' : '';?> title="<?php echo $rating_title;?>">
	  <?php
	  for($jx=1;$jx<=$ix;$jx++)
	  {
	  ?>
		<img alt="" src="<?php echo theme_url();?>images/star-yel.png" title="<?php echo $rating_title;?>">
	  <?php
	  }
	  for($jx=1;$jx<=$nostar;$jx++)
	  {
	  ?>
		<img alt="" src="<?php echo theme_url();?>images/star-grey.png" title="<?php echo $rating_title;?>">
	  <?php
	  }
	  ?>
	<?php
	}
	?>
	<?php echo form_error('ads_rating');?>
  </td>
</tr>
<tr class="trOdd">
  <td width="28%" height="26" align="right" ><span class="required">*</span> Review</td>
  <td width="72%" align="left">
	<textarea name="comment" rows="5" cols="50" id="comment" > <?php echo set_value('comment',$res['text']);?></textarea>
	<?php echo form_error('comment');?>
  </td>
</tr>

<tr class="trOdd">
  <td align="left">&nbsp;</td>
  <td align="left">
	<input type="submit" name="sub" value="Update" class="button2" />
	<input type="hidden" name="action" value="add" />
  </td>
</tr>
</table>
<?php echo form_close();?>
</body>
</html>