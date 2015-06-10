<div class="modal-header">
	<h3>View Hotel </h3>
</div>
<div class="modal-body">
	<table class="table ">
		
        <tr>
            <td><label>Name</label></td>
            <td><label><?php echo $result->name ?></label></td>
        </tr>

        <tr>
            <td><label>Address</label></td>
            <td><label><?php echo $result->address ?></label></td>
        </tr>

        <tr>
            <td><label>Driver</label></td>
            <td><label><?php echo $result->driver_name ?></label></td>
        </tr>

        <tr>
            <td><label>Town</label></td>
            <td><label><?php echo $result->town_name ?></label></td>
        </tr>

        <tr>
            <td><label>Lat</label></td>
            <td><label><?php echo $result->lat ?></label></td>
        </tr>

        <tr>
            <td><label>Lon</label></td>
            <td><label><?php echo $result->lon ?></label></td>
        </tr>

        <tr>
            <td><label>Rating</label></td>
            <td><label><?php echo $result->rating ?></label></td>
        </tr>

        <tr>
            <td><label>Room available</label></td>
            <td><label><?php echo $result->room_available ?></label></td>
        </tr>

        <tr>
            <td><label>Note</label></td>
            <td><label><?php echo $result->note ?></label></td>
        </tr>
    </table>
    
</div>
<div class="modal-footer" class="clearfix">
	<!-- left footer -->
	<div class="pull-left">
		<?php echo anchor((site_url('driver/hotel'.'/edit/'.$result->hotel_id))  , "Edit", array('class'=>'btn btn-primary')); ?>
		<?php echo anchor((site_url('driver/hotel')) , 'Hotel list', array('class'=>'btn btn-default')); ?>
	</div>
	<!-- right footer  -->
	<div class="span4 pull-right"><?php echo anchor(site_url(), ' &copy; '. date('Y').' '.$site_name); ?></div>
</div>
