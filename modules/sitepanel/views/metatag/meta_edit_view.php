<?php $this->load->view('includes/header'); ?>

<div class="page-title">                    
    <h2><span ></span><?php echo $heading_title; ?></h2>
    <div class="buttons">
	   <a href="javascript:void(0);" onclick="history.back();" class="btn btn-primary pull-right">Cancel</a>  
	</div>
</div>
<div class="page-content-wrap">                

    <div class="row">
        
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
            <?php echo validation_message();?>
            <?php echo error_message(); ?>  
    
	<?php echo form_open_multipart(current_url_query_string(),'class="form-horizontal"');?> 
            
            <div class="form-group">
                <label class="col-md-4 col-xs-12 control-label"><span class="required">*</span>URL</label>
                <div class="col-md-4 col-xs-12">                                                                                          <p><strong><?php echo base_url().$res['page_url'];?></strong></p>                                                    
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 col-xs-12 control-label"><span class="required">*</span>Title</label>
                <div class="col-md-4 col-xs-12">     
                    <textarea class="form-control" name="meta_title" rows="5" cols="80" id="title" ><?php echo set_value('meta_title',$res['meta_title']);?></textarea>
                </div>
            </div>
            
            <div class="form-group">
                <label class="col-md-4 col-xs-12 control-label"><span class="required">*</span>Keywords</label>
                <div class="col-md-4 col-xs-12"> 
                <textarea class="form-control" name="meta_keyword" rows="5" cols="80" id="keyword" ><?php echo set_value('meta_keyword',$res['meta_keyword']);?></textarea>
                </div> 
            </div>
            
            <div class="form-group">
                <label class="col-md-4 col-xs-12 control-label"><span class="required">*</span>Description</label>
                <div class="col-md-4 col-xs-12"> 
                <textarea class="form-control" name="meta_description" rows="5" cols="80" id="description" ><?php echo set_value('meta_description',$res['meta_description']);?></textarea>
                </div> 
            </div>
            
            <div class="form-group">
                <div class="col-md-8">
                    <input type="submit" name="sub" value="Save" class="btn bg-red pull-right" />
                    <input type="hidden" name="meta_id" value="<?php echo $res['meta_id'];?>"  />
               </div>
            </div>
                    <?php echo form_close();?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('includes/footer'); ?>