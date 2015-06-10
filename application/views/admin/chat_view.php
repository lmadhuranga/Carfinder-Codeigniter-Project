<div class="modal-header">
	<h3>View Chat </h3>
</div>
<div class="modal-body">
	<table class="table ">
		
        <tr>
            <td><label>Admin</label></td>
            <td><label><?php echo anchor(('admin/admin/view/'.$result->admin_id), $result->admin_name); ?></label></td>
        </tr>

        <tr>
            <td><label>Driver</label></td>
            <td><label><?php echo anchor('admin/driver/view/'.$result->driver_id, $result->driver_name); ?></label></td>
        </tr>

        <tr>
            <td><label>Massage</label></td>
            <td><pre><?php echo $result->massage ?></pre></td>
        </tr>

        <tr>
            <?php $status_array =array(''=>'Select User status','A'=>'Active','I'=>'Inactive'); ?>
            <td><label>Status</label></td>
            <td><label><?php echo $status_array[$result->status] ?></label></td>
        </tr>
<!-- 
        <tr>
            <td><label>Read</label></td>
            <td><label><?php echo $result->read ?></label></td>
        </tr> -->
    </table>

</div>
<div class="modal-footer" class="clearfix">
	<!-- left footer -->
	<div class="pull-left">
		<?php echo anchor((site_url('admin/chat'.'/edit/'.$result->chat_id))  , "Edit", array('class'=>'btn btn-primary')); ?>
		<?php echo anchor((site_url('admin/chat')) , 'Chat list', array('class'=>'btn btn-default')); ?>
	</div>
	<!-- right footer  -->
	<div class="span4 pull-right"><?php echo anchor(site_url(), ' &copy; '. date('Y').' '.$site_name); ?></div>
</div>
