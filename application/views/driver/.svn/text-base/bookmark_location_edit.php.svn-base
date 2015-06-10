<?php $CI = get_instance(); ?>
<div class="modal-header">
	<h3>Edit Bookmark location</h3>
</div>
<?php echo form_open(current_url()); ?>
<div class="modal-body">

	<!-- <h2>Bookmark_location</h2> -->


	<?php echo $custom_error; ?>

  <input type="hidden" value="<?php echo $result->bookmark_location_id; ?>" id="bookmark_location_id" name="bookmark_location_id">
    <input type="hidden" id="driver_id" name='driver_id' value="<?php echo $current_user_id; ?>">


<div class="control-group">
    <label class="control-label" for="town_id">Town</label>                                
    <div class="controls">
        <!-- <input id="town_id" name="town_id" type="number" value="<?php echo $result->town_id ?>"  maxlength="11" /> -->
        <?php 
            $CI->load->model('town_model');
            echo $CI->town_model->get_as_dropdown('town_id',$result->town_id,array('town_id','name'),'Town','');
        ?>
        <?php echo form_error('town_id','<div class="ci_error">','</div>'); ?>
        <p class="help-block"></p>
    </div>
</div>


<div class="control-group">
    <label class="control-label" for="name">Name<span class="required">*</span></label>                                
    <div class="controls">
        <input id="name" name="name" type="text" value="<?php echo $result->name ?>" required="required" maxlength="20" />
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
    <label class="control-label" for="priority">Priority</label>                                
    <div class="controls">
        <input id="priority" name="priority" type="number" value="<?php echo $result->priority ?>"  maxlength="11" />
        <?php echo form_error('priority','<div class="ci_error">','</div>'); ?>
        <p class="help-block"></p>
    </div>
</div>


<div class="control-group">
    <label class="control-label" for="lat">Lat</label>                                
    <div class="controls">
        <input readonly id="lat" name="lat" type="text" value="<?php echo $result->lat ?>"  maxlength="" />
        <?php echo form_error('lat','<div class="ci_error">','</div>'); ?>
        <p class="help-block"></p>
    </div>
</div>


<div class="control-group">
    <label class="control-label" for="lon">Lon</label>                                
    <div class="controls">
        <input readonly id="lon" name="lon" type="text" value="<?php echo $result->lon ?>"  maxlength="" />
        <?php echo form_error('lon','<div class="ci_error">','</div>'); ?>
        <p class="help-block"></p>
    </div>
</div>
 
    <div class="control-group">
        <label for="status">Status<span class="required">*</span></label> 
        <div class="controls">
            <?php echo
                form_dropdown('status', array(''=>'Status','A'=>'Active','D'=>'Delete'), $result->status,''); 
            ?>
            <?php echo form_error('status','<div class="ci_error">','</div>'); ?>
            <p class="help-block"></p>
        </div>
    </div>


</div>
<div class="modal-footer">
  <div class="clearfix">
     <div class="pull-left">
        <?php echo form_submit( 'submit', 'Save','class="btn btn-primary"'); ?>
        <?php echo anchor((site_url('driver/bookmark_location')) , 'Bookmark location list', array('class'=>'btn btn-default')); ?>
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
