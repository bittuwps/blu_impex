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
          <?php echo form_open_multipart(current_url_query_string(), 'class="form-horizontal"'); ?>           <div class="form-group">
            <label class="col-md-3 col-xs-12 control-label"><span class="required">*</span>Question</label>
            <div class="col-md-9 col-xs-12">
              <input type="text" name="faq_question" class="form-control" value="<?php echo set_value('faq_question', $res['faq_question']); ?>" />                                                    
            </div>
          </div>
          <!--<div class="form-group">
            <label class="col-md-3 col-xs-12 control-label"><span class="required">*</span>Question In Portuguese</label>
            <div class="col-md-9 col-xs-12">
              <input type="text" name="faq_question_p" class="form-control" value="<?php echo set_value('faq_question_p',$res['faq_question_p']); ?>" />                                                    
            </div>
          </div>-->
          
          <div class="form-group">
            <label class="col-md-3 col-xs-12 control-label"><span class="required">*</span>Answer</label>
            <div class="col-md-9 col-xs-12">
              <textarea name="faq_answer" rows="5" class="form-control" cols="50" id="faq_answer" ><?php echo set_value('faq_answer', $res['faq_answer']); ?></textarea>
              <?php echo display_ckeditor($ckeditor); ?>
            </div>
          </div>
          <!--<div class="form-group">
            <label class="col-md-3 col-xs-12 control-label"><span class="required">*</span>Answer in Portuguese</label>
            <div class="col-md-9 col-xs-12">
              <textarea name="faq_answer_p" rows="5" class="form-control" cols="50" id="faq_answer" ><?php echo set_value('faq_answer_p',$res['faq_answer_p']); ?></textarea>
              <?php echo display_ckeditor($ckeditor1); ?>            
            </div>
          </div>-->
          
          
          <div class="form-group">
            <div class="col-md-9 col-xs-12">
              <input type="submit" name="sub" value="Edit" class="btn bg-red pull-right" />                        </div>
          </div>
          <?php echo form_close(); ?>
        </div>
      </div>
    </div>
  </div>
</div>

<?php $this->load->view('includes/footer'); ?>