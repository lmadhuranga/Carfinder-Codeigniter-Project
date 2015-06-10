<style>
	.brand_img>img{
		height: 100px;
	}
</style>
<div class="modal-header">
	<h3>View Brand </h3>
</div>
<div class="modal-body">
	<div class="row">
		<div class="col-md-4">
	        <div class="brand_img">
	            <img src="<?php echo(base_url('upload/img/brand/'.$result->image)); ?>" alt="<?php echo $result->name ?>">
	           
	        </div>
		</div>
		<div class="col-md-4">
			<p>
            	<label>Brand Name</label>:<h5><?php echo $result->name ?></h5>
            </p>
		</div>
        <!-- /.end brand_img -->
    </div>
    <!-- /.end row -->
 



</div>  <!-- /.modal-body -->
<div class="modal-footer" class="clearfix">
	<!-- left footer -->
	<div class="pull-left">
		<?php echo anchor((site_url('admin/brand'.'/edit/'.$result->brand_id))  , "Edit", array('class'=>'btn btn-primary')); ?>
		<?php echo anchor((site_url('admin/brand')) , 'Brand list', array('class'=>'btn btn-default')); ?>
	</div>
	<!-- right footer  -->
	<div class="span4 pull-right"><?php echo anchor(site_url(), ' &copy; '. date('Y').' '.$site_name); ?></div>
</div>
