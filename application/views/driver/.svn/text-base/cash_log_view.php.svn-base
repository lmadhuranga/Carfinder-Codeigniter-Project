<div class="modal-header">
	<h3>View Cash log </h3>
</div>
<div class="modal-body">
	<table class="table ">
		
		<tr>
			<td><label>Vehicle</label></td>
			<td><label><?php echo $result->register_no ?></label></td>
		</tr>

		<tr>
			<td><label>Driver</label></td>
			<td><label><?php echo $result->first_name ?></label></td>
		</tr>

		<tr>
			<td><label>Journey</label></td>
			<td><label><?php echo $result->end_place ?></label></td>
		</tr>

		<tr>
			<td><label>Cash</label></td>
			<td><label><?php echo $result->cash ?></label></td>
		</tr>
	</table>
	
</div>
<div class="modal-footer" class="clearfix">
	<!-- left footer -->
	<div class="pull-left">
		<?php echo anchor((site_url('driver/cash_log'.'/edit/'.$result->cash_log_id))  , "Edit", array('class'=>'btn btn-primary')); ?>
		<?php echo anchor((site_url('driver/cash_log')) , 'Cash log list', array('class'=>'btn btn-default')); ?>
	</div>
	<!-- right footer  -->
	<div class="span4 pull-right"><?php echo anchor(site_url(), ' &copy; '. date('Y').' '.$site_name); ?></div>
</div>
