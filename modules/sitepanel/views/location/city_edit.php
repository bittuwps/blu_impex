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
                    <?php echo form_open_multipart("sitepanel/location/city_edit/".$res->id,'class="form-horizontal"'); ?>
                    <div class="form-group">
                        <label class="col-md-3 col-xs-12 control-label"><span class="required">*</span>Country</label>
                        <div class="col-md-6">                                                                                                                                                        
                            <select name="country_id" class="form-control" id="country">
                                <?php if($country){?>
                                <?php foreach($country as $cnt){
                                    if($cnt['id']==$res->country_id){
                                        $sel = "selected";
                                    }else{
                                        $sel = "";
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
                            <select name="state_id" class="form-control" id="state">
                                <?php if($states){?>
                                <?php foreach($states as $state){
                                    if($state['id']==$res->state_id){
                                        $sel = "selected";
                                    }else{
                                        $sel = "";
                                    }
                                ?>
                                <option value="<?php echo $state['id']?>" <?php echo $sel;?>><?php echo $state['title'];?></option>
                                <?php }}?>
                            </select>                                                    
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 col-xs-12 control-label"><span class="required">*</span>City</label>
                        <div class="col-md-6">                                                                                                                                                        
                            <input type="text" class="form-control" name="city" id="city" value="<?php echo set_value('city',$res->title);?>">                                                   
                        </div>
                    </div>
                    <div class="form-group">
                        
                        <div class="col-md-9">                                                                                                                                                        
                            <input type="submit" class="btn bg-red pull-right" name="update" value="Update">                                                    
                        </div>
                    </div>
                    <?php echo form_close();?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('includes/footer');?>
<script>

    $(document).ready(function(){
       
       $("#country").change(function(){
           var country = $("#country").val();
           
           $.ajax({
                url:'<?php echo base_url('sitepanel/location/ajax_state');?>',
                type:'post',
                data:({'country_id':country}),
                success:function(data){
                    
                        $("#state").html(data);
                
                
            }
           });
       });
    });

</script>

