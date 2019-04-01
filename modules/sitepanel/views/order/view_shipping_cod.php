<?php $this->load->view('includes/header'); ?> 
<div class="page-title">                    
    <h2><span ></span><?php echo $heading_title; ?></h2>
    <a href="<?php echo base_url('sitepanel/orders')?>" class="btn btn-primary pull-right">Cancel</a>
    
    
</div>
<div class="page-content-wrap"> 
    <div class="fix"></div>
    
    <div class="row">
        
        
        <div class="col-md-12">
            <?php if($this->session->flashdata('success')){?>
        <div class="alert alert-info">
            <?php echo $this->session->flashdata('success');?>
        </div>
        <?php }?>
            <div class="panel panel-default">

                <div class="panel-body"> 
            <?php echo form_open_multipart(current_url_query_string(),'class="form-horizontal"');?>
                      <?php echo validation_message();
                 echo error_message(); ?> 
                    <div class="form-group" style="display: none">
                <label class="col-md-3 col-xs-12 control-label"><span class="required">*</span>Free COD Amount</label>
                <div class="col-md-6 col-xs-12">                                                                                                                                                        
                    <input type="hidden" name="free_cod_amt" class="form-control" value="<?php if(isset($result['free_cod_amt']) && !empty($result['free_cod_amt'])){echo set_value('free_cod_amt',$result['free_cod_amt']);}?>"/>                                                    
                </div>
            </div>
            <div class="form-group" style="display: none">
                <label class="col-md-3 col-xs-12 control-label"><span class="required">*</span> COD Amount</label>
                <div class="col-md-6 col-xs-12">                                                                                                                                                        
                    <input type="hidden" name="cod_amt" class="form-control" value="<?php if(isset($result['cod_amt']) && !empty($result['cod_amt'])){echo set_value('cod_amt',$result['cod_amt']);}?>"/>                                                    
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 col-xs-12 control-label"><span class="required">*</span>Free Shipping Amount</label>
                <div class="col-md-6 col-xs-12">                                                                                                                                                        
                    <input type="text" name="free_ship_amt" class="form-control" value="<?php if(isset($result['free_ship_amt']) && !empty($result['free_ship_amt'])){echo set_value('free_ship_amt',$result['free_ship_amt']);}?>"/>                                                    
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 col-xs-12 control-label"><span class="required">*</span> Shipping Amount</label>
                <div class="col-md-6 col-xs-12">                                                                                                                                                        
                    <input type="text" name="ship_amt" class="form-control" value="<?php if(isset($result['ship_amt']) && !empty($result['ship_amt'])){echo set_value('ship_amt',$result['ship_amt']);}?>"/>                                                    
                </div>
            </div>
            <div class="form-group">
                
                <div class="col-md-6 col-xs-12">                                                                                                                                                        
                    <input type="submit" name="sub" value="Update" class="btn bg-red pull-right" />
					<input type="hidden" name="action" value="edit" />
                    <input type="hidden" name="size_id" value="<?php if(isset($result['id']) && !empty($result['id'])){echo $result['id'];}?>">                                                  
                </div>
            </div>
            
            
           <?php echo form_close();?> 
                </div>
            </div>
        </div>
        
    </div>
    
</div>

<?php $this->load->view('includes/footer'); ?>