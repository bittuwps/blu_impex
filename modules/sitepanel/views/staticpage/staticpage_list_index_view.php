<?php $this->load->view('includes/header'); ?>

<div class="page-title">
    <h2><span><?php echo $heading_title;?></span></h2>
</div>
<div class="page-content-wrap">
    <div class="fix"></div>

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
   
    if( is_array($pagelist) && !empty($pagelist) )
	{
    echo form_open("sitepanel/staticpages/",'id="data_form" ');?>
   
  
      <table class="table datatable" width="100%" id="my_data">
      
          <thead>
            <tr>
              <th>Page Name </th>
              <th>Details</th>        
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
          
           
          <?php
		 
		  	foreach($pagelist as $val)
			{ 
			
          ?>
            <tr>
             
              
              <td><?php echo $val['page_name'];?></td>    
              
            
              <td>
                  <a href="#" data-toggle="modal" data-target=".banner_<?php echo $val['page_id'];?>">
 View Description
</a>
            <div class="modal fade banner_<?php echo $val['page_id'];?>" tabindex="-1" role="dialog" aria-labelledby="description" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">

                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                      <h4 class="modal-title" id="description">Description</h4>
                    </div>
                    <div class="modal-body">
                        <?php echo $val['page_description'];?>
                    </div>
                  </div>
                </div>
            </div>           
              </td>
              
              <td>     <?php echo anchor("sitepanel/staticpages/edit/$val[page_id]/".query_string(),'<span>Edit</span>', 'class="btn btn-info"'); ?> 
              </td>
            </tr>
            
            <?php
			}
		
		  ?>
               
        </tbody>
        	     
        </table>
    <?php echo form_close();
	 }?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('includes/footer'); ?>