<?php $this->load->view('includes/header'); ?> 

<div class="page-title">
  <h2><span><?php echo $heading_title; ?></span></h2>
</div>
<div class="page-content-wrap"> 
  <div class="fix"></div>
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-body">
          <?php
          echo validation_errors();
          echo form_open(current_url_query_string(), 'class="form-horizontal"');
          ?>
          <div class="form-group">
            <label class="col-md-3 col-xs-12 control-label"><span class="required">*</span>Page</label>
            <div class="col-md-9 col-xs-12">                                                      
              <p><strong><?php echo $pageresult['page_name']; ?></strong></p>                                 </div>
          </div>
<?php if ($pageresult['page_short_description'] != '') { ?>
            <div class="form-group">
              <label class="col-md-3 col-xs-12 control-label"><span class="required">*</span>Heading</label>
              <div class="col-md-9 col-xs-12">
                <textarea name="page_short_description" class="form-control"><?php echo $pageresult['page_short_description']; ?></textarea>                                                   
              </div>
            </div>
<?php } ?>
          <div class="form-group">
            <label class="col-md-3 col-xs-12 control-label"><span class="required">*</span>content</label>
            <div class="col-md-9 col-xs-12">  
              <textarea name="page_description" rows="5" class="form-control" cols="50" id="page_desc" ><?php echo $pageresult['page_description']; ?></textarea>
<?php echo display_ckeditor($ckeditor); ?>                             
            </div>
          </div>
          <!--<div class="form-group">
            <label class="col-md-3 col-xs-12 control-label"><span class="required">*</span>Content in Portuguese</label>
            <div class="col-md-9 col-xs-12">  
              <textarea name="page_description_p" rows="5" class="form-control" cols="50" id="page_desc_p" ><?php echo $pageresult['page_description_p']; ?></textarea>
<?php echo display_ckeditor($ckeditor1); ?>                             
            </div>
          </div>-->
          <div class="form-group textarea">

            <div class="col-md-6 col-xs-12">                                                                                                                                                        
              <input type="submit" name="sub" value="Update" class="btn bg-red pull-right" />
              <input type="hidden" name="id" value="<?php echo $pageresult['page_id']; ?>" />                                                    
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

    <div class="box">

      <div class="heading">

        <h1><img src="<?php echo base_url(); ?>assets/sitepanel/image/category.png" alt="" /> <?php echo $heading_title; ?></h1>

        <div class="buttons">&nbsp;</div>

      </div>

      <script type="text/javascript">function serialize_form() {
          return $('#pagingform').serialize();
        }</script> 

      <div class="content">
  <?php echo error_message(); ?>

  <?php echo form_open(current_url_query_string()); ?>  

        <table width="90%"  class="tableList" align="center">
          <tr>
            <th colspan="2" align="center" > </th>
          </tr>
          <tr class="trOdd">
            <td height="26">Page :</td>
            <td><strong><?php echo $pageresult['page_name']; ?></strong></td>
          </tr>
  <?php if ($pageresult['page_short_description'] != '') { ?>
            <tr class="trOdd">
              <td height="26">* Heading :</td>
              <td>
                <textarea name="page_short_description" rows="1" cols="80"><?php echo $pageresult['page_short_description']; ?></textarea></td>
            </tr>
    <?php
  }
  ?>	
          <tr class="trEven">
            <td width="187" height="26">Description : </td>
            <td width="648" style="f">
              <textarea name="page_description" rows="5" cols="50" id="page_desc" ><?php echo $pageresult['page_description']; ?></textarea>
  <?php echo display_ckeditor($ckeditor); ?>
            </td>
          </tr>
          <tr class="trEven">
            <td align="left">&nbsp;</td>
            <td align="left">
              <input type="submit" name="sub" value="Update" class="button2" />
              <input type="hidden" name="id" value="<?php echo $pageresult['page_id']; ?>" />

            </td>
          </tr>
        </table>
    <?php echo form_close(); ?>
      </div>
    </div>
<?php } ?>
<?php $this->load->view('includes/footer'); ?>