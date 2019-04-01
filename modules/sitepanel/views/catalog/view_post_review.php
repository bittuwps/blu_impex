<?php $this->load->view('includes/header'); ?>
<div class="page-title">
    <h2><span><?php echo $heading_title; ?></span></h2>
    <div class="buttons">
	   <a href="javascript:void(0);" onclick="history.back();" class="btn btn-primary pull-right">Cancel</a>  
	</div>
</div>


<div style="clear:both;"></div>
<div style="background-Color:#F8EA4A;margin:5px;padding:5px;">
    <h3><span>Product Name: </span><?php echo $pres['product_name'];?></h3>
  </div>
<div style="clear:both;"></div>
<div class="page-content-wrap">

    <div class="row">
        
        <div class="col-md-12">
            <div class="panel panel-default">

                <div class="panel-body">                                                                                                        
                    
                    <?php echo form_open(current_url_query_string(), 'class="form-horizontal"'); ?>  
                        <div class="row">
                            <div class="form-group">
                                    <label class="col-md-3 control-label"><span class="required">*</span>Name</label>
                                    <div class="col-md-6">                                                                                                                                        
                                        <input type="text" name="author"  class="form-control" value="<?php echo set_value('author','Admin');?>">
	<?php echo form_error('author');?>
                                    </div>
                                </div>
                            <div class="form-group">
                                    <label class="col-md-3 control-label">Email</label>
                                    <div class="col-md-6">                                                                                                                                        
                                        <input type="text" name="author_email" class="form-control" value="<?php echo set_value('author_email');?>">
	<?php echo form_error('author_email');?>
                                    </div>
                                </div>
                            
                            <div class="form-group">
                                <label class="col-md-3 control-label"><span class="required">*</span>Rating</label>
                                    <div class="col-md-6">                                                                                                                                        
                                        <?php
	$rating_opts = $this->config->item('rating_opts');
	$max_star = 5;
	for($ix=1;$ix<=$max_star;$ix++)
	{
	  $rating_title = $rating_opts[$ix];

	  $nostar = $max_star - $ix;
	?>
                                        <input type="radio" name="ads_rating"  value="<?php echo $ix;?>" <?php echo set_value('ads_rating')==$ix ? 'checked="checked"' : '';?> title="<?php echo $rating_title;?>">
	  <?php
	  for($jx=1;$jx<=$ix;$jx++)
	  {
	  ?>
		<img alt="" src="<?php echo theme_url();?>images/sb1.png" title="<?php echo $rating_title;?>">
	  <?php
	  }
	  for($jx=1;$jx<=$nostar;$jx++)
	  {
	  ?>
		<img alt="" src="<?php echo theme_url();?>images/sb2.png" title="<?php echo $rating_title;?>">
	  <?php
	  }
	  ?>
	<?php
	}
	?>
	<?php echo form_error('ads_rating');?>
                                    </div>
                                </div>
                            <div class="form-group">
                                    <label class="col-md-3 control-label"><span class="required">*</span>Review</label>
                                    <div class="col-md-6">                                                                                                                                        
                                        <textarea name="comment" class="form-control" rows="5" cols="50" id="comment" > <?php echo set_value('comment');?></textarea>
	<?php echo form_error('comment');?>
                                    </div>
                                </div>
                            <div class="form-group">
                                    <div class="col-md-6">                                                                                                                                        
                                        <input type="submit" name="sub" value="Add" class="btn bg-red pull-right" />
	<input type="hidden" name="action" value="add" />
                                    </div>
                                </div>
                            </div>
<?php echo form_close();?>
                    </div>
                </div>
            </div>
        </div>
    </div>

                        
<?php $this->load->view('includes/footer'); ?>