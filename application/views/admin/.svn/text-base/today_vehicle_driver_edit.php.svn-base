<?php $CI = get_instance(); ?>
<div class="modal-header">
	<h3>Edit Today vehicle driver</h3>
</div>
<?php echo form_open(current_url()); ?>
<div class="modal-body">

	<!-- <h2>Today_vehicle_driver</h2> -->


	<?php echo $custom_error; ?>

	<input type="hidden" value="<?php echo $result->today_vehicle_driver_id; ?>" id="today_vehicle_driver_id" name="today_vehicle_driver_id">

		
    <!-- vehicle_id -->
    <div class="control-group">
        <label for="vehicle_id">Vehicle <span class="required">*</span></label> 
        <div class="controls">  
            <?php 
                $CI->load->model('vehicle_model');
                echo $CI->vehicle_model->get_as_dropdown('vehicle_id',$result->vehicle_id,array('vehicle_id','register_no'),'Vehicle','');
            ?>
            <?php echo form_error('vehicle_id','<div class="ci_error">','</div>'); ?>
            <p class="help-block"></p>
        </div>
    </div>


    <div class="control-group">
        <label for="driver_id">Driver<span class="required">*</span></label> 
        <div class="controls">
            <?php 
                $CI->load->model('driver_model');
                echo $CI->driver_model->get_as_dropdown('driver_id',$result->driver_id,array('driver_id','last_name'),'Driver','');
            ?>
            <?php echo form_error('driver_id','<div class="ci_error">','</div>'); ?>
            <p class="help-block"></p>
        </div>
    </div>

 
    <div class="control-group">
        <label for="note">Note<span class=""></span></label> 
        <div class="controls">
             <textarea  id="note" name="note"   style="width:100%"><?php echo $result->note; ?></textarea>
            <?php echo form_error('note','<div class="ci_error">','</div>'); ?>
            <p class="help-block"></p>
        </div>
    </div>


    <div class="control-group">
        <label for="start_time">Start time</label> 
        <div class="controls">                              
            <input id="start_time" name="start_time" type="text" value="<?php echo $result->start_time ?>"  maxlength=""  />
            <?php echo form_error('start_time','<div class="ci_error">','</div>'); ?>
            <p class="help-block"></p>
        </div>
    </div>


    <div class="control-group">
        <label for="end_time">End time</label> 
        <div class="controls">                              
            <input id="end_time" name="end_time" type="text" value="<?php echo $result->end_time ?>"  maxlength=""  />
            <?php echo form_error('end_time','<div class="ci_error">','</div>'); ?>
            <p class="help-block"></p>
        </div>
    </div>



</div>
<div class="modal-footer">
	<div class="clearfix">
		<div class="pull-left">
			<?php echo form_submit( 'submit', 'Save','class="btn btn-primary"'); ?>
			<?php echo anchor((site_url('admin/today_vehicle_driver')) , 'Today vehicle driver list', array('class'=>'btn btn-default')); ?>
		</div>
		<div class="span4 pull-right"><?php echo anchor(site_url(), ' &copy; '. date('Y').' '.$site_name); ?></div>
	</div>
</div>
<?php echo form_close(); ?>

<link href="<?php echo base_url('asset/css/jquery.datetimepicker.css') ?>" rel="stylesheet">
<script src="<?php echo base_url('asset/js/jquery.datetimepicker.js') ?>"></script>

<link href="<?php echo base_url('asset/css/jquery.datetimepicker.css') ?>" rel="stylesheet">
<script src="<?php echo base_url('asset/js/jquery.datetimepicker.js') ?>"></script>
<script>
    jQuery(document).ready(function($) { 
        $('#start_time').datetimepicker({ format:'Y-m-d H:i'});
        $('#end_time').datetimepicker({ format:'Y-m-d H:i'}); 
    });
</script>