<div class="modal-header">
	<h3>View Salary </h3>
</div>
<div class="modal-body">
	<table class="table ">
		
        <tr>
            <td><label>Driver </label></td>
            <td><label><?php echo $result->driver_name ?></label></td>
        </tr>

        <tr>
            <td><label>Cash</label></td>
            <td><label><?php echo $result->cash ?></label></td>
        </tr>

        <tr>
            <td><label>Paid date</label></td>
            <td><label><?php echo $result->paid_date ?></label></td>
        </tr>

        <tr>
            <td><label>Salary type</label></td>
            <td><label><?php echo  status_manager($result->type); ?></label></td>
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
		<?php echo anchor((site_url('driver/salary'.'/edit/'.$result->salary_id))  , "Edit", array('class'=>'btn btn-primary')); ?>
		<?php echo anchor((site_url('driver/salary')) , 'Salary list', array('class'=>'btn btn-default')); ?>
	</div>
	<!-- right footer  -->
	<div class="span4 pull-right"><?php echo anchor(site_url(), ' &copy; '. date('Y').' '.$site_name); ?></div>
</div>
