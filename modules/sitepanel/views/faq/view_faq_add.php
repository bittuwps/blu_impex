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
          <?php echo validation_message(); ?>
          <?php echo form_open_multipart("sitepanel/faq/add/", 'class="form-horizontal"'); ?> 
          <div class="form-group">
            <label class="col-md-3 col-xs-12 control-label"><span class="required">*</span>Question</label>
            <div class="col-md-9 col-xs-12">
              <input type="text" name="faq_question" class="form-control" value="<?php echo set_value('faq_question'); ?>" />                                                    
            </div>
          </div>
          <!--<div class="form-group">
            <label class="col-md-3 col-xs-12 control-label"><span class="required">*</span>Question In Portuguese</label>
            <div class="col-md-9 col-xs-12">
              <input type="text" name="faq_question_p" class="form-control" value="<?php echo set_value('faq_question_p'); ?>" />                                                    
            </div>
          </div>-->
          
          
          <div class="form-group">
            <label class="col-md-3 col-xs-12 control-label"><span class="required">*</span>Answer</label>
            <div class="col-md-9 col-xs-12">
              <textarea name="faq_answer" rows="5" class="form-control" cols="50" id="faq_answer" ><?php echo set_value('faq_answer'); ?></textarea>
              <?php echo display_ckeditor($ckeditor); ?>                                                                                                               
            </div>
          </div>
          <!--<div class="form-group">
            <label class="col-md-3 col-xs-12 control-label"><span class="required">*</span>Answer in Portuguese</label>
            <div class="col-md-9 col-xs-12">
              <textarea name="faq_answer_p" rows="5" class="form-control" cols="50" id="faq_answer" ><?php echo set_value('faq_answer_p'); ?></textarea>
              <?php echo display_ckeditor($ckeditor1); ?>                                                                                                               
            </div>
          </div>-->
          <div class="form-group">

            <div class="col-md-9 col-xs-12">                                                                                              <input type="submit" name="sub" value="Post" class="btn bg-red pull-right" />                                                                                                            
            </div>
          </div>
          <?php echo form_close(); ?>
        </div>
      </div>
    </div>
  </div>
</div>
<?php if (1 == 2) { ?>
  <div id="content">

    <div class="breadcrumb">

      <?php echo anchor('sitepanel/dashbord', 'Home'); ?>
      &raquo; <?php echo anchor('sitepanel/faq', 'Back To Listing'); ?> &raquo;  <?php echo $heading_title; ?> 

    </div>      

    <div class="box">

      <div class="heading">

        <h1><img src="<?php echo base_url(); ?>assets/sitepanel/image/category.png" alt="" /> <?php echo $heading_title; ?></h1>

        <div class="buttons">&nbsp;</div>

      </div>


      <div class="content">


        <?php echo validation_message(); ?>
        <?php echo error_message(); ?>

        <?php echo form_open_multipart('sitepanel/faq/add/'); ?>  

        <table width="90%"  class="tableList" align="center">
          <tr>
            <th colspan="2" align="center" > </th>
          </tr>
          <tr class="trOdd">
            <td height="26">* <span class="left">Question</span>:</td>
            <td><input type="text" name="faq_question" size="40" value="<?php echo set_value('faq_question'); ?>"></td>
          </tr>
          <tr class="trEven">
            <td width="197" height="26">Answer : </td>
            <td width="667" style="f">
              <textarea name="faq_answer" rows="5" cols="50" id="faq_answer" ><?php echo set_value('faq_answer'); ?></textarea>
              <?php echo display_ckeditor($ckeditor); ?>
            </td>
          </tr>
          <tr class="trOdd">
            <td align="left">&nbsp;</td>
            <td align="left">
              <input type="submit" name="sub" value="Add" class="button2" />
              <input type="hidden" name="action" value="addnews" />
            </td>
          </tr>
        </table>
        <?php echo form_close(); ?>
      </div>
    </div>
  <?php } ?>
  <?php $this->load->view('includes/footer'); ?>