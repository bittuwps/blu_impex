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
            <div class="panel panle-default">
                <div class="panel-body">
            <?php
            
           
                echo validation_errors();
                echo form_open_multipart("sitepanel/discount_coupan/add",'class="form-horizontal"');?> 
            <div class="form-group">
                <label class="col-md-3 col-xs-12 control-label"><span class="required">*</span>Coupan Name</label>
                <div class="col-md-6 col-xs-12">                                                                                                                                                        
                    <input type="text" name="cpn_name" class="form-control" value="<?php echo set_value('cpn_name');?>">                                                    
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 col-xs-12 control-label"><span class="required">*</span>Coupan Type</label>
                <div class="col-md-6 col-xs-12">                                                                                                <select class="form-control" name="cpn_type">
                                        <option value="">-Select Coupan Type-</option>
                                        <option value="0">Fixed</option>
                                        <option value="1">Percentage</option>
                                    </select>                                                        
                                                                        
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 col-xs-12 control-label"><span class="required">*</span>Coupan Price</label>
                <div class="col-md-6 col-xs-12">                                                                                                                                                        
                    <input type="text" name="cpn_rate" class="form-control" value="<?php echo set_value('cpn_rate');?>">                                                    
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 col-xs-12 control-label"><span class="required">*</span>Minimum amount for coupan apply</label>
                <div class="col-md-6 col-xs-12">                                                                                                                                                        
                    <input type="text" name="minimum_amount_for_coupan_apply" class="form-control" value="<?php echo set_value('minimum_amount_for_coupan_apply');?>">                                                    
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 col-xs-12 control-label"><span class="required">*</span>Coupan Code</label>
                <div class="col-md-6 col-xs-12">                                                                                                                                                        
                    <input type="text" name="cpn_code" class="form-control" value="<?php echo set_value('cpn_code');?>">                                                    
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label">Date Range</label>
                <div class="col-md-5">
                    <div class="input-group">
                        <input type="text" name="start_date" id="dp-1" class="form-control datepicker" />
                        <span class="input-group-addon add-on"> - </span>
                        <input type="text" name="end_date" id="dp-2" class="form-control datepicker" />
                    </div>
                </div>
            </div>
            <div class="form-group">
                
                <div class="col-md-6 col-xs-12">                                                                                             <button type="submit" name="sbmt_cpn" value="sbmt_cpn" class="btn bg-red pull-right" >Add</button>
					<input type="hidden" name="action" value="add" />                                                           
                                                                        
                </div>
            </div>
		
	<?php echo form_close(); ?>
                </div>
            </div>
	</div>
</div>
</div>

<?php $this->load->view('includes/footer'); ?>