<?php $this->load->view('includes/header'); ?>  
<div class="page-title">                    
    <h2><span ></span><?php echo $heading_title; ?></h2>
    <div class="buttons">
        <?php echo anchor("sitepanel/swatsquad/add", "<span>Add $heading_title</span>", 'class="btn btn-primary pull-right" '); ?>
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



    <?php echo form_open("sitepanel/swatsquad/", 'id="data_form"'); ?>



                <table class="table datatable" width="100%" id="my_data">

                    <thead>
                        <tr>
                            <th width="20" style="text-align: center;">

                                <input type="checkbox" onclick="$('input:checkbox').not(this).prop('checked', this.checked);" />

                            </th>
<!--                            <th>Title/Image Name</th>-->
                            
                            <th>Image</th>
                            <th>Added By</th>
                            <th>Status</th>
                            <th>Action</th>
                            
                        </tr>
                    </thead>
                    <tbody>
    <?php
    $j=1;
    foreach ($res as $catKey => $pageVal) {
        $imgdisplay = FALSE;
        //$displayorder       = ($pageVal['sort_order']!='') ? $pageVal['sort_order']: "0";
    ?> 
        <tr>
            <td style="text-align: center;">
                <input type="checkbox" name="arr_ids[]" value="<?php echo $pageVal['swats_id']; ?>" />
            </td>
            <td>
                <?php
                    $swats_path = "swatssqaud/".$pageVal['swats_image'];
                ?>
                <a href="#" data-toggle="modal" data-target=".swatssquad_<?php echo $j;?>">View Image</a>

                <div class="modal fade swatssquad_<?php echo $j;?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel-1" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <div class="modal-body">
                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <img src="<?php echo base_url().'uploaded_files/'.$swats_path;?>" class="img-responsive img-rounded center-block" alt="">
                        </div>
                      </div>
                    </div>
                </div>
            </td>
            <td><?php echo ($pageVal['added_by'] == 1)?"Admin":"Anonymous User"; ?></td>
            <td><?php echo ($pageVal['status'] == 1) ? "Active" : "In-active"; ?></td>
            <td><a href="<?php echo base_url()."sitepanel/swatsquad/edit/".$pageVal['swats_id'];?>"><span class="btn btn-info">Edit</span></a></td>
        </tr>
        <?php
        $j++;
    }
    ?> 
                </table>
                        <table class="list" width="100%"> 
        <tr>
			<td align="left" colspan="7" style="padding:2px" height="35">
				<input name="status_action" type="submit"  value="Activate" class="button2" id="Activate" onClick="return validcheckstatus('arr_ids[]','Activate','Record','u_status_arr[]');"/>
				<input name="status_action" type="submit" class="button2" value="Deactivate" id="Deactivate"  onClick="return validcheckstatus('arr_ids[]','Deactivate','Record','u_status_arr[]');"/>             
				<input name="status_action" type="submit" class="button2" id="Delete" value="Delete"  onClick="return validcheckstatus('arr_ids[]','delete','Record');"/>
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