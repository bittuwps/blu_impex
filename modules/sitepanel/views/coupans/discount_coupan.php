<?php $this->load->view('includes/header'); ?>  
<div class="page-title">                    
    <h2><span ></span><?php echo $heading_title; ?></h2>
    <div class="buttons">
        <?php echo anchor("sitepanel/discount_coupan/add", "<span>Add $heading_title</span>", 'class="btn btn-primary pull-right" '); ?>
    </div>
</div> 
<div class="page-content-wrap">                

    <div class="row">
        <div class="col-md-12">
            <?php if($this->session->flashdata('success')){?>
            <div class="alert alert-info">
                <?php echo $this->session->flashdata('success');?>
            </div>
            <?php }?>

            <!-- START DEFAULT DATATABLE -->
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="table-responsive">            

            <?php
            if (is_array($res) && !empty($res)) {
            //echo '<pre>';
            //print_r($res);
            //die();
                ?>



    <?php echo form_open("sitepanel/discount_coupan/", 'id="data_form"'); ?>



                <table class="table datatable" width="100%" id="my_data">

                    <thead>
                        <tr>
                            <th width="20" style="text-align: center;">

                                <input type="checkbox" onclick="$('input:checkbox').not(this).prop('checked', this.checked);" />

                            </th>
                            <th>Title/Coupon Name</th>
                            <th>Coupon Code</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Status</th>   
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
    <?php
    foreach ($res as $catKey => $pageVal) {
        $imgdisplay = FALSE;
        //$displayorder       = ($pageVal['sort_order']!='') ? $pageVal['sort_order']: "0";
    ?> 
        <tr>
            <td style="text-align: center;">
                <input type="checkbox" name="arr_ids[]" value="<?php echo $pageVal['cpn_id']; ?>" />
            </td>
            <td>
        <?php echo $pageVal['cpn_name']; ?>
            </td>
            <td>
                <?php echo $pageVal['cpn_code']; ?>
            </td>
            <td>
                <?php echo date('d-M-Y',strtotime($pageVal['cpn_start_date'])); ?>
            </td>
            <td>
                <?php echo date('d-M-Y',strtotime($pageVal['cpn_end_date'])); ?>
            </td>
            <td><?php echo ($pageVal['status'] == 1) ? "Active" : "In-active"; ?></td>
            <td>
                <?php echo anchor("sitepanel/discount_coupan/edit/$pageVal[cpn_id]/" . query_string(), '<span>Edit</span>','class="btn btn-info"'); ?> 
            </td>
        </tr>
        <?php
    }
    ?> 
                </table>
                        <table class="list" width="100%"> 
        <tr>
            <td align="left" colspan="6" style="padding:2px" height="35">
                <input name="status_action" type="submit" class="button2" value="Deactivate" id="Deactivate"  onClick="return validcheckstatus('arr_ids[]', 'Deactivate', 'Record', 'u_status_arr[]');"/>
            </td>
        </tr>
      </table>
    <?php
    echo form_close();
} else {
    echo "<center><strong> No Record(s) Found !</strong></center>";
}
?> 
        </div>

    </div>
            </div>
        </div>
    </div>
</div>

            <?php $this->load->view('includes/footer'); ?>