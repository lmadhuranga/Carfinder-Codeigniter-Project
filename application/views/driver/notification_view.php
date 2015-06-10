<div class="modal-header">
	<h3>View Notification </h3>
</div>
<div class="modal-body">
	<table class="table ">
		
        <tr>
            <td><label>Admin User</label></td>
            <td><label><?php echo $result->admin_name ?></label></td>
        </tr>

        <tr>
            <td><label>Driver</label></td>
            <td><label><?php echo $result->driver_name ?></label></td>
        </tr>

        <tr>
            <td><label>Messsage</label></td>
            <td><label><?php echo $result->messsage ?></label></td>
        </tr>

        <tr>
            <td><label>Call center</label></td>
            <td><label><?php echo $result->call_center_id ?></label></td>
        </tr>

        <tr>
            <td><label>Status</label></td>
            <td><label><?php echo status_manager($result->status); ?></label></td>
        </tr>
        <!-- 
        <tr>
            <td><label>D reject</label></td>
            <td><label><?php echo $result->d_reject ?></label></td>
        </tr> -->
    </table>

</div>
<div class="modal-footer" class="clearfix">
	<!-- left footer -->
	<div class="pull-left">
		<?php echo anchor((site_url('driver/notification'.'/edit/'.$result->notification_id))  , "Edit", array('class'=>'btn btn-primary')); ?>
		<?php echo anchor((site_url('driver/notification')) , 'Notification list', array('class'=>'btn btn-default')); ?>
	</div>
	<!-- right footer  -->
	<div class="span4 pull-right"><?php echo anchor(site_url(), ' &copy; '. date('Y').' '.$site_name); ?></div>
</div>
