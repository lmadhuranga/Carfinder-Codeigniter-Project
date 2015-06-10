<div class="modal-header">
	<h3>Add a Notification</h3>
</div>
<?php echo form_open(current_url()); ?>
<div class="modal-body">

	<?php echo $custom_error; ?>
	
    <div class="control-group">
        <label for="admin_id">Admin User<span class="required">*</span></label> 
        <div class="controls">                              
            <input id="admin_id" name="admin_id" type="number" value="<?php echo set_value('admin_id'); ?>" required="required" maxlength="11"  />
            <?php echo form_error('admin_id','<div class="ci_error">','</div>'); ?>
            <p class="help-block"></p>
        </div>
    </div>
    

    <div class="control-group">
        <label for="driver_id">Driver<span class="required">*</span></label> 
        <div class="controls">                              
            <input id="driver_id" name="driver_id" type="number" value="<?php echo set_value('driver_id'); ?>" required="required" maxlength="11"  />
            <?php echo form_error('driver_id','<div class="ci_error">','</div>'); ?>
            <p class="help-block"></p>
        </div>
    </div>
    

    <div class="control-group">
        <label for="messsage">Messsage<span class="required">*</span></label> 
        <div class="controls">                              
            <input id="messsage" name="messsage" type="text" value="<?php echo set_value('messsage'); ?>" required="required" maxlength="180"  />
            <?php echo form_error('messsage','<div class="ci_error">','</div>'); ?>
            <p class="help-block"></p>
        </div>
    </div>
    

    <div class="control-group">
        <label for="call_center_id">Call center<span class="required">*</span></label> 
        <div class="controls">                              
            <input id="call_center_id" name="call_center_id" type="number" value="<?php echo set_value('call_center_id'); ?>" required="required" maxlength="11"  />
            <?php echo form_error('call_center_id','<div class="ci_error">','</div>'); ?>
            <p class="help-block"></p>
        </div>
    </div>
    

    <div class="control-group">
        <label for="status">Status<span class="required">*</span></label> 
        <div class="controls">                              
            <input id="status" name="status" type="text" value="<?php echo set_value('status'); ?>" required="required" maxlength="1"  />
            <?php echo form_error('status','<div class="ci_error">','</div>'); ?>
            <p class="help-block"></p>
        </div>
    </div>
    

    <div class="control-group">
        <label for="d_reject">D reject</label> 
        <div class="controls">                              
            <input id="d_reject" name="d_reject" type="text" value="<?php echo set_value('d_reject'); ?>"  maxlength="1"  />
            <?php echo form_error('d_reject','<div class="ci_error">','</div>'); ?>
            <p class="help-block"></p>
        </div>
    </div>
    


</div>
<div class="modal-footer">
	<div class="clearfix">
		<!-- footer left  -->
		<div class="pull-left">
			<?php echo form_submit( 'submit', 'Save','class="btn btn-primary"'); ?>
			<?php echo anchor((site_url('admin/notification')) , 'Notification list', array('class'=>'btn btn-default')); ?>		
		</div>
		<!-- footer right  -->
		<div class="span4 pull-right"><?php echo anchor(site_url(), ' &copy; '. date('Y').' '.$site_name); ?></div>
	</div>
</div>
<?php echo form_close(); ?> 
<br>
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