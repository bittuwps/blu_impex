<?php 
$this->load->view('includes/header'); 
$id = $this->uri->segment(4);
$article = get_db_field_value('wl_blog', 'article_title', "WHERE article_id = '".$id."'");
?>
<!-- PAGE TITLE -->
<div class="page-title">                    
  <h2><span ></span><?php echo $heading_title; ?> (<?php echo $article;?>)</h2>
    </div>
    <!--END PAGE TITLE -->

    <!--PAGE CONTENT WRAPPER -->
    <div class = "page-content-wrap">
    <div class = "fix"></div>
    <div class = "row">

    <div class = "col-md-12">
    <?php if ($this->session->flashdata('success')) {
      ?>
      <div class="alert alert-info">
      <?php echo $this->session->flashdata('success'); ?>
      </div>
<?php } ?>

    <!-- START DEFAULT DATATABLE -->
    <div class="panel panel-default">
      <div class="panel-body">
        <div class="table-responsive">

          <?php
          if (is_array($res) && !empty($res)) {
            echo form_open(current_url_query_string(), 'id="data_form"');
            ?>

            <table class="table datatable" width="100%" id="my_data">
              <thead>
                <tr>
                  <td><input type="checkbox" onclick="$('input[name*=\'arr_ids\']').attr('checked', this.checked);" /></td>
                  <td><strong>Name</strong></td>
                  <td><strong>Review</strong></td>
                  <td><strong>Posted</strong></td>
                  <td><strong>Status</strong></td>
                </tr>
              </thead>
              <tbody>
                <?php
                $atts = array(
                    'width' => '740',
                    'height' => '600',
                    'scrollbars' => 'yes',
                    'status' => 'yes',
                    'resizable' => 'yes',
                    'screenx' => '0',
                    'screeny' => '0'
                );
                foreach ($res as $catKey => $val) {
                  //trace($val);
                  ?> 
                  <tr>
                    <td><input type="checkbox" name="arr_ids[]" value="<?php echo $val['comment_id']; ?>" /></td>
                    <td>
    <?php echo $val['mem_name']; ?><br />
    <?php echo $val['mem_email']; ?>
                    </td>
                    <td><?php echo $val['comment']; ?></td>
                    <td nowrap><?php echo date("M d,Y", strtotime($val['post_date'])); ?></td>
                    <td><?php echo $val['status'] == '1' ? 'Active' : 'Inactive'; ?>
                    </td>
                  </tr>
                  <?php
                }
                ?> 
              </tbody>
            </table>

            <table class="list" width="100%">
              <tr>
                <td align="left" colspan="11" style="padding:2px" height="35">


                  <input name="status_action" type="submit"  value="Activate" class="button2" id="Activate" onClick="return validcheckstatus('arr_ids[]', 'Activate', 'Record', 'u_status_arr[]');"/>

                  <input name="status_action" type="submit" class="button2" value="Deactivate" id="Deactivate"  onClick="return validcheckstatus('arr_ids[]', 'Deactivate', 'Record', 'u_status_arr[]');"/>

                  <input name="status_action" type="submit" class="button2" id="Delete" value="Delete"  onClick="return validcheckstatus('arr_ids[]', 'delete', 'Record');"/> 


                </td>
              </tr>
            </table>
            <?php
            echo form_close();
          } else {
            echo "<center><strong> No record(s) found !</strong></center>";
          }
          ?>
        </div>
      </div>
    </div>
</div>
</div>
</div>

<script type="text/javascript">
  function onclickgroup() {
    if (validcheckstatus('arr_ids[]', 'set', 'record', 'u_status_arr[]')) {
      $('#data_form').submit();
    }
  }
</script>

<?php $this->load->view('includes/footer'); ?>