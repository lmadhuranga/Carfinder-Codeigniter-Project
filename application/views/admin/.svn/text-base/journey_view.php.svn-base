<?php $CI = get_instance(); ?>
<?php 
    // load model
    $CI->load->model('driver_model');
    $CI->load->model('vehicle_model');
    $CI->load->model('town_model'); 
?> 
<div class="modal-header">
	<h3>View Journey </h3>
</div>
<div class="modal-body">
	<table class="table ">
		
        <tr>
            <td><label>Start time</label></td>
            <td><label><?php echo $result->start_time ?></label></td>
        </tr>

        <tr>
            <td><label>End time</label></td>
            <td><label><?php echo $result->end_time ?></label></td>
        </tr>

        <tr>
            <td><label>Start place</label></td>
            <td><label><?php echo $result->start_place ?></label></td>
        </tr>

        <tr>
            <td><label>End place</label></td>
            <td><label><?php echo  !empty($result->end_place)?$result->end_place:'none'; ?></label></td>
        </tr>

        <tr>
            <?php $vehicle_data = $CI->vehicle_model->get(array('register_no'), $result->vehicle_id, true, 1) ?>
            <td><label>Vehicle </label></td>
            <td><label><?php echo anchor('admin/vehicle/view/'.$result->vehicle_id, $vehicle_data->register_no); ?></label></td>
        </tr>

        <tr>
            <?php $driver_data = $CI->driver_model->get(array('first_name','last_name'), $result->driver_id, true, 1) ?>
            <td><label>Driver </label></td>
            <td><label><?php echo anchor('admin/driver/view/'.$result->driver_id, $driver_data->first_name); ?></label></td>
        </tr>
        <tr>
            <?php $town_data = $CI->town_model->get(array('name'), $result->start_town_id, true, 1) ?>
            <td><label>Nearest started town</label></td>
            <td><label><?php echo anchor('admin/town/view/'.$result->start_town_id, $town_data->name); ?></label></td>
        </tr>
 

        <?php if ($result->end_town_id!=0): ?>        
             <tr>
                <?php $town_data = $CI->town_model->get(array('name'), $result->end_town_id, true, 1) ?>
                <td><label>Nearest ended town</label></td>
                <td><label><?php echo anchor('admin/town/view/'.$result->end_town_id, $town_data->name); ?></label></td>
            </tr>
        <?php else: ?>
            <td><label>Nearest ended town</label></td>
            <td><label>none</label></td> 
        <?php endif ?>



        <tr>
            <td><label>Traveled distances (Km)</label></td>
            <td><label><?php echo  !empty($result->km)?$result->km.' Km':'none'; ?> </label></td>
        </tr>

        <tr>
            <td><label>Passenger count</label></td>
            <td><label><?php echo  !empty($result->pasenger_count)?$result->pasenger_count:'none'; ?></label></td>
        </tr>

        <tr>
            <td><label>Cash</label></td>
            <td><label><?php echo  !empty($result->cash)?$result->cash:'none'; ?></label></td>
        </tr>

        <tr>
            <td><label>Meter value</label></td>
            <td><label><?php echo $result->meter_value; ?></label></td>
        </tr>

        <tr>
            <td><label>Note</label></td>
            <td><label><?php echo  !empty($result->note)?$result->note:'none'; ?></label></td>
        </tr>

<!--         <tr>
    <td><label>Start lat</label></td>
    <td><label><?php echo  !empty($result->start_lat)?$result->start_lat:'none'; ?></label></td>
</tr>

<tr>
    <td><label>Start lon</label></td>
    <td><label><?php echo  !empty($result->start_lon)?$result->start_lon:'none'; ?></label></td>
</tr>

<tr>
    <td><label>End lat</label></td>
    <td><label><?php echo  !empty($result->end_lat)?$result->end_lat:'none'; ?></label></td>
</tr>

<tr>
    <td><label>End lon</label></td>
    <td><label><?php echo  !empty($result->end_lon)?$result->end_lon:'none'; ?></label></td>
</tr> -->
    </table>

</div>
<div class="modal-footer" class="clearfix">
	<!-- left footer -->
	<div class="pull-left">
		<?php echo anchor((site_url('admin/journey'.'/edit/'.$result->journey_id))  , "Edit", array('class'=>'btn btn-primary')); ?>
		<?php echo anchor((site_url('admin/journey')) , 'Journey list', array('class'=>'btn btn-default')); ?>
	</div>
	<!-- right footer  -->
	<div class="span4 pull-right"><?php echo anchor(site_url(), ' &copy; '. date('Y').' '.$site_name); ?></div>
</div>
