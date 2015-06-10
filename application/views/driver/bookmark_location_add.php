<?php $CI = get_instance(); ?>
<div class="modal-header">
	<h3>Add a Bookmark location</h3>
</div>
<?php echo form_open(current_url()); ?>
<div class="modal-body">

	<?php echo $custom_error; ?>
	
    <input type="hidden" id="driver_id" name='driver_id' value="<?php echo $current_user_id; ?>">


    <div class="control-group">
        <label for="town_id">Town</label> 
        <div class="controls">                              
            <!-- <input id="town_id" name="town_id" type="number" value="<?php echo set_value('town_id'); ?>"  maxlength="11"  /> -->
            <?php 
                $CI->load->model('town_model');
                echo $CI->town_model->get_as_dropdown('town_id','',array('town_id','name'),'Town','');
            ?>
            <?php echo form_error('town_id','<div class="ci_error">','</div>'); ?>
            <p class="help-block"></p>
        </div>
    </div>


    <div class="control-group">
        <label for="name">Name<span class="required">*</span></label> 
        <div class="controls">                              
            <input id="name" name="name" type="text" value="<?php echo set_value('name'); ?>" required="required" maxlength="20"  />
            <?php echo form_error('name','<div class="ci_error">','</div>'); ?>
            <p class="help-block"></p>
        </div>
    </div>

   <div class="control-group">
        <label for="note">Note<span class=""></span></label> 
        <div class="controls">
             <textarea  id="note" name="note"   style="width:100%"><?php echo set_value('note'); ?></textarea>
            <?php echo form_error('note','<div class="ci_error">','</div>'); ?>
            <p class="help-block"></p>
        </div>
    </div> 



    <div class="control-group">
        <label for="priority">Priority</label> 
        <div class="controls">                              
            <input id="priority" name="priority" type="number" value="<?php echo set_value('priority'); ?>"  maxlength="11"  />
            <?php echo form_error('priority','<div class="ci_error">','</div>'); ?>
            <p class="help-block"></p>
        </div>
    </div>


    <div class="control-group">
        <label for="lat">Lat</label> 
        <div class="controls">                              
            <input readonly id="lat" name="lat" type="text" value="<?php echo set_value('lat'); ?>"  maxlength=""  />
            <?php echo form_error('lat','<div class="ci_error">','</div>'); ?>
            <p class="help-block"></p>
        </div>
    </div>


    <div class="control-group">
        <label for="lon">Lon</label> 
        <div class="controls">                              
            <input readonly id="lon" name="lon" type="text" value="<?php echo set_value('lon'); ?>"  maxlength=""  />
            <?php echo form_error('lon','<div class="ci_error">','</div>'); ?>
            <p class="help-block"></p>
        </div>
    </div>


    <div class="control-group">
        <label for="status">Status<span class="required">*</span></label> 
        <div class="controls">
            <?php echo
                form_dropdown('status', array(''=>'Status','A'=>'Active','D'=>'Delete'), set_value('status'),''); 
            ?>
            <?php echo form_error('status','<div class="ci_error">','</div>'); ?>
            <p class="help-block"></p>
        </div>
    </div>



</div>
<div class="modal-footer">
	<div class="clearfix">
		<!-- footer left  -->
		<div class="pull-left">
			<?php echo form_submit( 'submit', 'Save','class="btn btn-primary"'); ?>
			<?php echo anchor((site_url('driver/bookmark_location')) , 'Bookmark location list', array('class'=>'btn btn-default')); ?>		
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