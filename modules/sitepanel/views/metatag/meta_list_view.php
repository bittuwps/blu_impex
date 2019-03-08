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
	   if( is_array($pagelist) && !empty($pagelist) ) {
	?>
     
	 <?php echo form_open("sitepanel/meta/",'id="myform"');?>
	  <table class="table datatable" id="my_data">
     
        <thead>
          <tr>
            <th>URL</th>
			<th>Meta Details</th>
           <th>Action</th>
          </tr>
        </thead>
		
        <tbody>
          <?php 
			foreach($pagelist as $catKey=>$pageVal)
			{ 	
			
		   ?> 
          <tr>
           
            <td><?php echo base_url().$pageVal['page_url'];?></td>
			 <td>
			 <p> <strong> Title       : </strong> <?php echo $pageVal['meta_title'];?> </p>
             <p> <strong> Keyword     : </strong> <?php echo$pageVal['meta_keyword'];?> </p>
             <p> <strong> Description : </strong> <?php echo $pageVal['meta_description'];?></p>
            </td>      
           <td><?php echo anchor("sitepanel/meta/edit/$pageVal[meta_id]/".query_string(),'<span>Edit</span>', 'class="btn btn-info"'); ?></td>
          </tr>
          <?php
		   }		  
		  ?> 
               
        </tbody>
      </table>
	<?php echo form_close();
	 }else{
	    echo "<center><strong> No record(s) found !</strong></center>" ;
	 }
	?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('includes/footer'); ?>