<?php $this->load->view("includes/header"); ?>

<div class="page-title">
    <h2><span><?php echo $heading_title;?></span></h2>
    <a href="javascript:void(0);" onclick="history.back();" class="btn btn-primary pull-right">Cancel</a>
</div>

<div class="page-content-wrap">
    
    

    <div class="row">
        <?php echo validation_message('alert'); ?>
        
        <div class="col-md-12">
            

            <div class="panel panel-default">

                <div class="panel-body">                                                                                                        

                    <?php echo form_open('sitepanel/enquiry/send_reply/'.$this->uri->segment(4), 'class="form-horizontal"'); ?>  
                   
                        <div class="row">
                            <div class="form-group">
                                <label class="col-md-3 control-label"><span class="required">*</span>Subject</label>
                                <div class="col-md-6">    
                                    <input type="text" name="subject" class="form-control" id="textfield"  value="<?php echo set_value('subject');?>" />     
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label"><span class="required">*</span>Message</label>
                                <div class="col-md-6"> 
                                    <textarea name="message" id="textarea" class="form-control" cols="45" rows="5"><?php echo set_value('message');?></textarea>
                                         
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6"> 
                                    <input type="submit" class="btn bg-red pull-right" name="button" id="button" value="Submit" />
                                </div>
                            </div>
                        </div>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
                           
<?php if(1==2){ echo form_open('sitepanel/enquiry/send_reply/'.$this->uri->segment(4)); ?>
<table width="100%" align="center" cellpadding="0" cellspacing="0">
        
<tr><td colspan="2" align="left">

<?php echo validation_message();?>
 <?php echo error_message(); ?>
</td>
  </tr>
  <tr>
    <td  style="padding:10px;"><strong>Subject* : </strong></td>
    <td   style="padding:10px;">
      <label>
        <input type="text" name="subject" id="textfield"  value="<?php echo set_value('subject');?>" />
      </label>
   </td>
  </tr>
  <tr>
    <td style="padding:10px;"><strong>Message* : </strong></td>
    <td style="padding:10px;">
      <label>
        <textarea name="message" id="textarea" cols="45" rows="5"><?php echo set_value('message');?></textarea>
      </label>
  </td>
  </tr>
  <tr>
    <td style="padding:10px;">&nbsp;</td>
    <td style="padding:10px;">
      <label>
        <input type="submit" name="button" id="button" value="Submit" />
      </label>
  </td>
  </tr>
</table>
<?php echo form_close(); }?>
<?php $this->load->view("includes/footer"); ?>

