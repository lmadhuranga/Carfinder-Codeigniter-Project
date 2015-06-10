<div class="modal-header">
	<h3>View Vehicle status </h3>
</div>
<div class="modal-body">
	<table class="table ">
		
		<tr>
			<td><label>Status</label></td>
			<td><label><?php echo  status_manager($result->status);?></label></td>
		</tr>

		<tr>
			<td><label>Image</label></td>
			<td>
				<img src="<?php echo base_url('upload/img/vehicle_status/'.image_set_value($result->image,'default.png')) ?>" alt="<?php echo $result->status ?>" class="img-rounded img-responsive" width="64px">
			</td>
		</tr>
	</table>
    
	
</div>
<div class="modal-footer" class="clearfix">
	<!-- left footer -->
	<div class="pull-left">
		<?php echo anchor((site_url('admin/vehicle_status'.'/edit/'.$result->vehicle_status_id))  , "Edit", array('class'=>'btn btn-primary')); ?>
		<?php echo anchor((site_url('admin/vehicle_status')) , 'Vehicle status list', array('class'=>'btn btn-default')); ?>
	</div>
	<!-- right footer  -->
	<div class="span4 pull-right"><?php echo anchor(site_url(), ' &copy; '. date('Y').' '.$site_name); ?></div>
</div>
