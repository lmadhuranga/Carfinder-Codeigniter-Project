<div class="modal-header">
	<h3>View Today vehicle driver </h3>
</div>
<div class="modal-body">
	<table class="table ">
		
        <tr>
            <td><label>Vehicle  </label></td>
            <td><label><?php echo anchor('admin/vehicle/view/'.$result->vehicle_id, $result->register_no); ?></label></td>
        </tr>

        <tr>
            <td><label>Driver</label></td>
            <td><label><?php echo anchor('admin/driver/view/'.$result->driver_id, $result->driver_name); ?></label></td>
        </tr>

        <tr>
            <td><label>Note</label></td>
            <td><label><?php echo $result->note ?></label></td>
        </tr>

        <tr>
            <td><label>Start time</label></td>
            <td><label><?php echo $result->start_time ?></label></td>
        </tr>

        <tr>
            <td><label>End time</label></td>
            <td><label><?php echo $result->end_time ?></label></td>
        </tr>
    </table>

</div>
<div class="modal-footer" class="clearfix">
	<!-- left footer -->
	<div class="pull-left">
		<?php echo anchor((site_url('admin/today_vehicle_driver'.'/edit/'.$result->today_vehicle_driver_id))  , "Edit", array('class'=>'btn btn-primary')); ?>
		<?php echo anchor((site_url('admin/today_vehicle_driver')) , 'Today vehicle driver list', array('class'=>'btn btn-default')); ?>
	</div>
	<!-- right footer  -->
	<div class="span4 pull-right"><?php echo anchor(site_url(), ' &copy; '. date('Y').' '.$site_name); ?></div>
</div>
