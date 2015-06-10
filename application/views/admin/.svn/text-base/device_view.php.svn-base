<style>
    .device_img>img{ 
        margin-bottom: 9px; 
    }
</style>
<div class="modal-header">
	<h3>View Device </h3>
</div>
<div class="modal-body">
	<table class="table ">
		<div class="col-sm-2 col-md-2 device_img"> 
            <img src="<?php echo(base_url('upload/img/device/'.$result->image)); ?>" alt="Device" class="img-rounded" width="200px" >
        </div>
        <tr>
            <td><label>Vehicle </label></td>
            <!-- <td><label><?php echo $result->vehicle_id ?></label></td> -->
            <td><label><?php echo $result->register_no ?></label></td>
        </tr>

        <tr>
            <td><label>Status</label></td>
            <td><label><?php echo  status_manager($result->status);?></label></td>
        </tr>

        <tr>
            <td><label>Authenticate code</label></td>
            <td><label><?php echo $result->authenticate_code ?></label></td>
        </tr>

        <tr>
            <td><label>Device expire date</label></td>
            <td><label><?php echo $result->device_expire_date ?></label></td>
        </tr>

        <tr>
            <td><label>Imei</label></td>
            <td><label><?php echo $result->imei ?></label></td>
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
		<?php echo anchor((site_url('admin/device'.'/edit/'.$result->device_id))  , "Edit", array('class'=>'btn btn-primary')); ?>
		<?php echo anchor((site_url('admin/device')) , 'Cancel', array('class'=>'btn btn-default')); ?>
	</div>
	<!-- right footer  -->
	<div class="span4 pull-right"><?php echo anchor(site_url(), ' &copy; '. date('Y').' '.$site_name); ?></div>
</div>
