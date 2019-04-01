<?php $this->load->view('includes/header'); ?>

<div class="page-content-wrap">                

    <div class="row">
        <div class="col-md-12">

            <!-- START DEFAULT DATATABLE -->
            <div class="panel panel-default">
                <div class="panel-heading">
                                    <h3 class="panel-title"><?php echo $heading_title; ?></h3>
                                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table">
                            <?php
if(is_array($res) && !empty($res))
{
  $res = $res[0];
?>
                            <thead>
                                                <tr>
                                                    <th>Add Date</th>
                                                    <th>Product Name</th>
                                                    <th>Product Code</th>
                                                    <th>Category</th>
                                                    <th>Price</th>
                                                    <th>Description</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><?php echo $res['product_added_date'];?></td>
                                                    <td><?php echo $res['product_name'];?></td>
                                                    <td><?php echo $res['product_code'];?></td>
                                                    <td><?php 
	$catlinks = explode(',',$res['category_links']);
	$res_category = $this->db->select('category_name,category_id')->from('wl_categories')->where_in('category_id',$catlinks)->get()->result_array();
	if(is_array($res_category) && !empty($res_category))
	{
	  $sptr_cat = '';
	  foreach($res_category as $val)
	  {
		echo $sptr_cat.$val['category_name'];
		$sptr_cat = " -> ";
	  }
	}
	?></td>
                                                    <td><?php
	  if($res['product_discounted_price']=='0.00')
	  {
	  ?>
		<span style="color: #b00;"><?php echo display_price($res['product_price']);?></span>
	  <?php
	  }
	  else
	  {
	  ?>
		<span style="text-decoration: line-through;"><?php echo display_price($res['product_price']);?></span><br> 
		<span style="color: #b00;"><?php echo display_price($res['product_discounted_price']);?></span>
	  <?php
	  }
	  ?></td>
                                                   
                                                    <td><?php echo $res['products_description'];?></td>
                                                    <td><?php echo $res['status']==1? "Active": "In-active";?></td>
                                                    
                                                </tr>
                                                <?php
}
else
{
?>
  <tr>
	<td>No record(s) found!</td>
</tr>
<?php
}
?>
                                            </tbody>
                        </table>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('includes/footer');?>