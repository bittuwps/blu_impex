<?php
    $this->load->view('top_application');
?>
<div class="clearfix"></div>


<section class="breadcrumb_section hidden-xs">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<ul class="breadcrumb">
					<li><a href="javascript:void()" title="Home">Home</a></li>
					<li class="active">
						<?php echo $content['page_name']; ?>
					</li>
				</ul>
			</div>
		</div>
	</div>
</section>

<div class="inner-pages-section">
    <div class="container" style="margin-top: 25px; margin-bottom: 25px;">
        <div class="row">
            <?php foreach($videos as $k=>$r){ ?>
                <div class="col-xs-12 col-sm-4 col-md-4">
                    <iframe width="100%" height="250px"
                        src="<?= $r['link'] ?>">
                    </iframe>
                </div>
            <?php } ?> 
        </div>
    </div>
</div>
<?php $this->load->view('bottom_application'); ?>