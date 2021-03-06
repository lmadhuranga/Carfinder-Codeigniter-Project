<?php $CI = get_instance(); ?>

<div class="modal-header">
	<h3>Edit Notification</h3>
</div>
<?php echo form_open(current_url()); ?>
<div class="modal-body">

	<!-- <h2>Notification</h2> -->


	<?php echo $custom_error; ?>

  <input type="hidden" value="<?php echo $result->notification_id; ?>" id="notification_id" name="notification_id">

  <div class="control-group">
    <label class="control-label" for="admin_id">Admin User<span class="required">*</span></label>                                
    <div class="controls">
        <input id="admin_id" name="admin_id" type="number" value="<?php echo $result->admin_id ?>" required="required" maxlength="11" />
        <?php echo form_error('admin_id','<div class="ci_error">','</div>'); ?>
        <p class="help-block"></p>
    </div>
</div>


<div class="control-group">
    <label class="control-label" for="driver_id">Driver<span class="required">*</span></label>                                
    <div class="controls">
        <input id="driver_id" name="driver_id" type="number" value="<?php echo $result->driver_id ?>" required="required" maxlength="11" />
        <?php echo form_error('driver_id','<div class="ci_error">','</div>'); ?>
        <p class="help-block"></p>
    </div>
</div>


<div class="control-group">
    <label class="control-label" for="messsage">Messsage<span class="required">*</span></label>                                
    <div class="controls">
        <input id="messsage" name="messsage" type="text" value="<?php echo $result->messsage ?>" required="required" maxlength="180" />
        <?php echo form_error('messsage','<div class="ci_error">','</div>'); ?>
        <p class="help-block"></p>
    </div>
</div>


<div class="control-group">
    <label class="control-label" for="call_center_id">Call center<span class="required">*</span></label>                                
    <div class="controls">
        <input id="call_center_id" name="call_center_id" type="number" value="<?php echo $result->call_center_id ?>" required="required" maxlength="11" />
        <?php echo form_error('call_center_id','<div class="ci_error">','</div>'); ?>
        <p class="help-block"></p>
    </div>
</div>


<div class="control-group">
    <label class="control-label" for="status">Status<span class="required">*</span></label>                                
    <div class="controls">
        <!-- <input id="status" name="status" type="text" value="<?php echo $result->status ?>" required="required" maxlength="1" /> -->
        <?php echo
            form_dropdown('status', array(''=>'Select User status','A'=>'Active','I'=>'Inactive'),$result->status,''); 
        ?>
        <?php echo form_error('status','<div class="ci_error">','</div>'); ?>
        <p class="help-block"></p>
    </div>
</div>


<div class="control-group">
    <label class="control-label" for="d_reject">D reject</label>                                
    <div class="controls">
        <input id="d_reject" name="d_reject" type="text" value="<?php echo $result->d_reject ?>"  maxlength="1" />
        <?php echo form_error('d_reject','<div class="ci_error">','</div>'); ?>
        <p class="help-block"></p>
    </div>
</div>


</div>
<div class="modal-footer">
  <div class="clearfix">
     <div class="pull-left">
        <?php echo form_submit( 'submit', 'Save','class="btn btn-primary"'); ?>
        <?php echo anchor((site_url('admin/notification')) , 'Notification list', array('class'=>'btn btn-default')); ?>
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
