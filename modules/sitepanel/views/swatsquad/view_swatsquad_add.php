<?php $this->load->view('includes/header'); ?>  

 <div class="page-title">                    
    <h2><span ></span><?php echo $heading_title; ?></h2>
    <div class="buttons">
	   <a href="<?php echo base_url('sitepanel/swatsquad');?>" class="btn btn-primary pull-right">Cancel</a>  
	</div>
</div>   
<div class="page-content-wrap">                

    <div class="row">
        
        <div class="col-md-12">
            <div class="panel panle-default">
                <div class="panel-body">
                    <span class="required">
                        <?php 
                            if($this->session->userdata('swats_error'))
                            {
                                print_r($this->session->userdata('swats_error'));
                                $this->session->unset_userdata('swats_error');
                            }
                            ?>
                    </span>
            <?php
            
           
                
                echo form_open_multipart("sitepanel/swatsquad/add",'class="form-horizontal"');?> 
            
            <div class="form-group">
                <label class="col-md-3 col-xs-12 control-label"><span class="required">*</span>Upload Image</label>
                <div class="col-md-6 col-xs-12">                                                                                                                                                        
                    <input type="file" name="images[]" multiple accept="image/*">                                                    
                </div>
            </div>
            <div class="form-group">
                
                <div class="col-md-6 col-xs-12">                                                                                             <button type="submit" name="sbmt_image" value="sbmt_image" class="btn bg-red pull-right" >Add</button>
					<input type="hidden" name="action" value="add" />                                                           
                                                                        
                </div>
            </div>
		
	<?php echo form_close(); ?>
                </div>
            </div>
	</div>
</div>
</div>
<script>
            $(function(){
                //Datepicker
                $('#dp-1').datepicker();
                $('#dp-2').datepicker();
                //$('#dp-4').datepicker({startView: 1});                
                //End Datepicker
            });
        </script>
<?php 

$this->load->view('includes/footer'); ?>