<div class="modal-header">
	<h3>View Fuel refill </h3>
</div>
<div class="modal-body">
	<table class="table ">
		
        <tr>
            <td><label>Driver</label></td>
            <td><label><?php echo $result->driver_name ?></label></td>
        </tr>

        <tr>
            <td><label>Fuel center</label></td>
            <td><label><?php echo $result->fuel_center_name ?></label></td>
        </tr>

        <tr>
            <td><label>Register no</label></td>
            <td><label><?php echo anchor('driver/vehicle/view'.$result->vehicle_id, $result->register_no); ?></label></td>
        </tr>

        <tr>
            <td><label>Note</label></td>
            <td><label><?php echo $result->note ?></label></td>
        </tr>

        <tr>
            <td><label>Date</label></td>
            <td><label><?php echo $result->date ?></label></td>
        </tr>

        <tr>
            <td><label>Liter</label></td>
            <td><label><?php echo $result->liter ?></label></td>
        </tr>

        <tr>
            <td><label>Fuel unit price</label></td>
            <td><label><?php echo $result->fuel_unit_price ?></label></td>
        </tr>

        <tr>
            <td><label>Reciept img</label></td>
            <td><label><?php echo $result->reciept_img ?></label></td>
        </tr>
    </table>

</div>
<div class="modal-footer" class="clearfix">
	<!-- left footer -->
	<div class="pull-left">
		<?php echo anchor((site_url('driver/fuel_refill'.'/edit/'.$result->fuel_refill_id))  , "Edit", array('class'=>'btn btn-primary')); ?>
		<?php echo anchor((site_url('driver/fuel_refill')) , 'Fuel refill list', array('class'=>'btn btn-default')); ?>
	</div>
	<!-- right footer  -->
	<div class="span4 pull-right"><?php echo anchor(site_url(), ' &copy; '. date('Y').' '.$site_name); ?></div>
</div>
