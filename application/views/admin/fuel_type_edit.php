<div class="modal-header">
	<h3>Edit Fuel type</h3>
</div>
<?php echo form_open(current_url()); ?>
<div class="modal-body">

	<!-- <h2>Fuel_type</h2> -->


	<?php echo $custom_error; ?>

	<input type="hidden" value="<?php echo $result->fuel_type_id; ?>" id="fuel_type_id" name="fuel_type_id">
	
	<div class="control-group">
		<label class="control-label" for="name">Name<span class="required">*</span></label>                                
		<div class="controls">
			<input id="name" name="name" type="text" value="<?php echo $result->name ?>" required="required" maxlength="45" />
			<?php echo form_error('name','<div class="ci_error">','</div>'); ?>
			<p class="help-block"></p>
		</div>
	</div>
	

</div>
<div class="modal-footer">
	<div class="clearfix">
		<div class="pull-left">
			<?php echo form_submit( 'submit', 'Save','class="btn btn-primary"'); ?>
			<?php echo anchor((site_url('admin/fuel_type')) , 'Fuel type list', array('class'=>'btn btn-default')); ?>
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
