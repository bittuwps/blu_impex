<?php $this->load->view("includes/header");?>
<div class="page-title">
    <h2><span><?php echo $heading_title;?></span></h2>
    <a href="javascript:void(0);" onclick="history.back();" class="btn btn-primary pull-right">Cancel</a>
</div>
<div class="page-content-wrap"> 
    <div class="fix"></div>

    <div class="row">
        
        <div class="col-md-12">
            
            <div class="panel panel-default">
                <div class="panel-body">
                    <?php echo form_open_multipart("sitepanel/location/state_edit/".$id,'class="form-horizontal"'); ?>
                    <div class="form-group">
                        <label class="col-md-3 col-xs-12 control-label"><span class="required">*</span>Country</label>
                        <div class="col-md-6">                                                                                                                                                        
                            <select name="country_id" class="form-control" id="country">
                                <?php if($country){?>
                                <?php foreach($country as $cnt){
                                    if ($cnt['id'] == $row_data->country_id){
                                        $sel ="selected";
                                    }else{
                                        $sel="";
                                    }
                                    ?>
                                <option value="<?php echo $cnt['id'];?>" <?php echo $sel;?>><?php echo $cnt['country_name'];?></option>
                                <?php }}?>
                            </select>                                                    
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 col-xs-12 control-label"><span class="required">*</span>State</label>
                        <div class="col-md-6">                                                                                                                                                        
                            <input type="text" class="form-control" name="state" value="<?php echo $row_data->title;?>">                                                    
                        </div>
                    </div>
                    <div class="form-group">
                        
                        <div class="col-md-9">                                                                                                                                                        
                            <input type="submit" class="btn bg-red pull-right" name="update" value="Submit">                                                    
                        </div>
                    </div>
                    <?php echo form_close();?>
                </div>
            </div>
        </div>
    </div>
</div>


<?php $this->load->view('includes/footer');?>