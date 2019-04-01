<?php $this->load->view('includes/header'); ?>  

<div class="page-title">                    
    <h2><span ></span><?php echo $heading_title; ?></h2>
    <div class="buttons">
        <a href="<?php echo base_url('sitepanel/swatsquad'); ?>" class="btn btn-primary pull-right">Cancel</a>  
    </div>
</div>   
<div class="page-content-wrap">                

    <div class="row">

        <div class="col-md-12">
            <div class="panel panle-default">
                <div class="panel-body">

                    <?php echo form_open_multipart("sitepanel/swatsquad/edit", 'class="form-horizontal"'); ?> 


                    <div class="form-group">
                        <label class="col-md-3 col-xs-12 control-label">Description</label>
                        <div class="col-md-6 col-xs-12">                                                                                                                                                        
                            <textarea name="swats_desc" class="form-control" cols="20" rows="10"><?php echo set_value('swats_desc',$res['swats_desc']);?></textarea>                                                    
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 col-xs-12 control-label">Blog Image:</label>
                        <div class="col-md-6 col-xs-12">                                                                                            
<?php
if ($res['swats_image'] != "") {
    $j = 1;
    $swats_path = "swatssqaud/" . $res['swats_image'];
    ?>
                                <a href="#" data-toggle="modal" data-target=".swatssquad_<?php echo $j;?>">View Image</a>
                                <div class="modal fade swatssquad_<?php echo $j;?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel-1" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <div class="modal-body">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
                        <img src="<?php echo base_url().'uploaded_files/'.$swats_path;?>" class="img-responsive img-rounded center-block" alt="">
                        </div>
                      </div>
                    </div>
                </div>
    <?php
}
?>
                            <input type="hidden" name="action" value="addnews" />
                        </div>
                    </div>
                    <div class="form-group">

                        <div class="col-md-6 col-xs-12">                                                                                             <button type="submit" name="sbmt_image" value="sbmt_image" class="btn bg-red pull-right" >Edit</button>
                            <input type="hidden" name="swats_id" value="<?php echo $res['swats_id'];?>" />                                                           
                            <input type="hidden" name="action" value="edit" />                                                           

                        </div>
                    </div>

<?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('includes/footer'); ?>