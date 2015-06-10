<?php $CI = get_instance(); ?>
<div class="modal-header">
	<h3>Edit Cash log</h3>
</div>
<?php echo form_open(current_url()); ?>
<div class="modal-body">

	<!-- <h2>Cash_log</h2> -->


	<?php echo $custom_error; ?>

	<input type="hidden" value="<?php echo $result->cash_log_id; ?>" id="cash_log_id" name="cash_log_id">

	<div class="control-group">
		<label class="control-label" for="vehicle_id">Vehicle<span class="required">*</span></label>                                
		<div class="controls">
			<!-- <input id="vehicle_id" name="vehicle_id" type="number" value="<?php echo $result->vehicle_id ?>" required="required" maxlength="11" /> -->
			<?php 
			    $CI->load->model('vehicle_model');
			    echo $CI->vehicle_model->get_as_dropdown('vehicle_id',$result->vehicle_id,array('vehicle_id','register_no'),'Vehicle','');
			?>
			<?php echo form_error('vehicle_id','<div class="ci_error">','</div>'); ?>
			<p class="help-block"></p>
		</div>
	</div>


	<div class="control-group">
		<label class="control-label" for="driver_id">Driver<span class="required">*</span></label>                                
		<div class="controls">
			<!-- <input id="driver_id" name="driver_id" type="number" value="<?php echo $result->driver_id ?>" required="required" maxlength="11" /> -->
			<?php 
	            $CI->load->model('driver_model');
	            echo $CI->driver_model->get_as_dropdown('driver_id',$result->driver_id,array('driver_id','last_name'),'Driver','');
	        ?>
			<?php echo form_error('driver_id','<div class="ci_error">','</div>'); ?>
			<p class="help-block"></p>
		</div>
	</div>


	<div class="control-group">
		<label class="control-label" for="journey_id">Journey<span class="required">*</span></label>                                
		<div class="controls">
			<!-- <input id="journey_id" name="journey_id" type="number" value="<?php echo $result->journey_id ?>" required="required" maxlength="11" /> -->
			<?php 
	            $CI->load->model('journey_model');
	            echo $CI->journey_model->get_as_dropdown('journey_id',$result->journey_id,array('journey_id','end_place'),'Journey','');
	        ?>
			<?php echo form_error('journey_id','<div class="ci_error">','</div>'); ?>
			<p class="help-block"></p>
		</div>
	</div>

	<div class="control-group">
		<label class="control-label" for="cash">Cash<span class="required">*</span></label>                                
		<div class="controls">
			<input id="cash" name="cash" type="number" value="<?php echo $result->cash ?>" required="required" maxlength="11" />
			<?php echo form_error('cash','<div class="ci_error">','</div>'); ?>
			<p class="help-block"></p>
		</div>
	</div>


</div>
<div class="modal-footer">
	<div class="clearfix">
		<div class="pull-left">
			<?php echo form_submit( 'submit', 'Save','class="btn btn-primary"'); ?>
			<?php echo anchor((site_url('driver/cash_log')) , 'Cash log list', array('class'=>'btn btn-default')); ?>
		</div>
		<div class="span4 pull-right"><?php echo anchor(site_url(), ' &copy; '. date('Y').' '.$site_name); ?></div>
	</div>
</div>
<?php echo form_close(); ?>

<script src="<?php echo base_url() ?>asset/js/jquery-1.9.1.js"></script> <!-- jquery  -->
<script src="<?php echo base_url() ?>asset/js/jqBootstrapValidation.js"></script> <!-- jqBootstrapValidation.js  -->
<script> 

$(function() {
	// prettyPrint();
	$("input,textarea,select").jqBootstrapValidation(
	{
		preventSubmit: true,
		submitError: function($form, event, errors) {
		// Here I do nothing, but you could do something like display
		// the error messages to the user, log, etc.
	},
	submitSuccess: function($form, event) {
		alert("OK");
			// event.preventDefault();
		},
		filter: function() {
			return $(this).is(":visible");
		}
	});
	$("a[data-toggle=\"tab\"]").click(function(e) {
		e.preventDefault();
		$(this).tab("show");
	});
}); 

</script>
