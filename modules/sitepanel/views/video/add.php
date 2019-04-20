<?php $this->load->view('includes/header'); ?>  
 <div id="content">
  
  <div class="breadcrumb">
  
      <?php echo anchor('sitepanel/dashbord','Home'); ?>
 &raquo; <?php echo anchor('sitepanel/videos','Back To Listing'); ?> &raquo;  <?php echo $heading_title; ?>
             
   </div>      
       
 <div class="box">
 
    <div class="page-title">
        <h2><?php echo $heading_title; ?></h2>
        <div class="buttons pull-right col-md-2">
            <a href="javascript:void(0);" onclick="$('#form').submit();" class="btn btn-primary pull-right">Save</a>
            <a href="https://www.satyamani.org/sitepanel/videos" class="btn bg-red pull-left">Cancel</a>
        </div>
        <div class="clearfix"> </div>
    </div>
          
	<div class="content">
		<?php 
			validation_message();
			error_message();
		?>

		<?php echo form_open('', 'id="form" enctype="multipart/form-data"');?>  

			<table width="90%"  class="tableList" align="center">
				<tr>
					<th colspan="2" align="center" > </th>
				</tr>
				<tr class="trOdd">
					<td> Video Title : <span class="required">*</span></td>
					<td>
						<input type="text" 
							name="title" class="form-control" required
							value="<?= set_value('title', $dtl['title']) ?>"
						/>
					</td>
				</tr>
				<tr class="trOdd">
					<td style="padding-top:10px;"> Video Link (youtube) : <span class="required">*</span></td>
					<td style="padding-top:10px;">
						<input type="text" 
							name="link" class="form-control" required
							value="<?= set_value('link', $dtl['link']) ?>"
						/>
					</td>
				</tr>

				<tr class="trOdd">
					<td style="padding-top:10px;"> Image Thumbnail : <span class="required">*</span></td>
					<td style="padding-top:10px;">
						<input type="file" name="thumb_img" class="form-control" required />
						<?php if(!empty($dtl['thumb_img'])){ ?>
							<img src="<?= get_image('video_thumb',$dtl['thumb_img'],150,100) ?>" class="img" width="100px" height="100px;" />
						<?php } ?>
					</td>
				</tr>
			</table>
		<?php echo form_close(); ?>
	</div>
</div>
<?php $this->load->view('includes/footer'); ?>