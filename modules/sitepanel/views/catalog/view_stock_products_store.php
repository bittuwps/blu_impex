<?php $this->load->view('includes/face_header'); ?>
<div class="page-title">
  <h3><span><?php echo $heading_title; ?></span></h3>
</div>
<div class="page-content-wrap">
  <div class="row">
    <div class="col-md-12">
      <?php 
      if ($this->session->flashdata('success')) { ?>
        <div class="alert alert-info">
          <?php echo $this->session->flashdata('success'); ?>
        </div>
        <?php
      }
      ?>
      <div class="panel panel-default">
        <div class="panel-body">
          <?php echo form_open("sitepanel/products/view_stocks_store/" . $this->uri->segment(4), 'id="myform"'); ?> 
          <table class="table datatable" id="my_data">
            <thead>
            <td width="150"><strong>Store</strong></td>
            <td width="225"><strong>Quantity</strong></td>
            <td width="225"><strong>Product Price</strong></td>
            <td width="225"><strong>Discounted Price</strong></td>
            </thead>
            <?php
            $loop_ctr = 0;
            foreach ($res_store as $key1 => $val1) {
            $store_name = get_db_field_value("wl_store", "store_name", "where  setId=" . $val1);
              ?>
              <tr>
                <td>
                  <select name="store[]" class="form-control" style="width:95%;">
                    <option value="<?php echo $val1; ?>" selected><?php echo $store_name; ?></option>
                  </select>
                </td>
                <td>
                  <input type="text" name="quantity[]" class="form-control" value="<?php if (isset($matrix_arr_db[$val1])) { echo $matrix_arr_db[$val1]['quantity'];}?>" />
                  <?php
                  if (array_key_exists($loop_ctr, $post_err['quantity'])) {
                    echo '<div class="required">' . $post_err['quantity'][$loop_ctr] . '</div>';
                  }
                  ?>
                </td>
                <td>
                  <input type="text" name="product_price[]" class="form-control" value="<?php if (isset($matrix_arr_db[$val1])) { echo $matrix_arr_db[$val1]['product_price'];}?>" />
                  <?php
                  if (array_key_exists($loop_ctr, $post_err['product_price'])) {
                    echo '<div class="required">' . $post_err['product_price'][$loop_ctr] . '</div>';
                  }
                  ?>
                </td>
                <td>
                  <input type="text" name="product_discounted_price[]" class="form-control" value="<?php if (isset($matrix_arr_db[$val1])) { echo $matrix_arr_db[$val1]['product_discounted_price'];}?>" />
                  <?php
                  if (array_key_exists($loop_ctr, $post_err['product_discounted_price'])) {
                    echo '<div class="required">' . $post_err['product_discounted_price'][$loop_ctr] . '</div>';
                  }
                  ?>
                </td>
                <?php
              }
              ?>
            <div class="form-group pull-right">
              <div class="col-md-6">
                <input type="submit" name="sub" value="Save" class="btn btn-primary" />
                <input type="hidden" name="ref_id" value="<?php echo $this->uri->segment(4); ?>" />
              </div>
            </div>
          </table>
          <?php
          echo form_close();
          ?>
        </div>
      </div>
    </div>
  </div>
</div>
</body>
</html>