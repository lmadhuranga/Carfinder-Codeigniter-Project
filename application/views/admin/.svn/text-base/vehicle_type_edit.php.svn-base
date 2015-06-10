<div class="modal-header">
	<h3>Edit Vehicle type</h3>
</div>
<?php echo form_open(current_url()); ?>
<div class="modal-body">

	<!-- <h2>Vehicle_type</h2> -->


	<?php echo $custom_error; ?>

	<input type="hidden" value="<?php echo $result->vehicle_type_id; ?>" id="vehicle_type_id" name="vehicle_type_id">
	
	<div class="control-group">
		<label class="control-label" for="type">Type<span class="required">*</span></label>                                
		<div class="controls">
			<input id="type" name="type" type="text" value="<?php echo $result->type ?>" required="required" maxlength="10" />
			<?php echo form_error('type','<div class="ci_error">','</div>'); ?>
			<p class="help-block"></p>
		</div>
	</div>
	

</div>
<div class="modal-footer">
	<div class="clearfix">
		<div class="pull-left">
			<?php echo form_submit( 'submit', 'Save','class="btn btn-primary"'); ?>
			<?php echo anchor((site_url('admin/vehicle_type')) , 'Vehicle type list', array('class'=>'btn btn-default')); ?>
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
