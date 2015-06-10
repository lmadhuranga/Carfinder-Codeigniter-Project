<?php $CI = get_instance(); ?>

<div class="modal-header">
	<h3>Edit Hotel</h3>
</div>
<?php echo form_open(current_url()); ?>
<div class="modal-body">

	<!-- <h2>Hotel</h2> -->


	<?php echo $custom_error; ?>

  <input type="hidden" value="<?php echo $result->hotel_id; ?>" id="hotel_id" name="hotel_id">
  
  <div class="control-group">
    <label class="control-label" for="name">Name</label>                                
    <div class="controls">
        <input id="name" name="name" type="text" value="<?php echo $result->name ?>"  maxlength="45" />
        <?php echo form_error('name','<div class="ci_error">','</div>'); ?>
        <p class="help-block"></p>
    </div>
</div>


<div class="control-group">
    <label class="control-label" for="address">Address<span class="required">*</span></label>                                
    <div class="controls">
        <input id="address" name="address" type="text" value="<?php echo $result->address ?>" required="required" maxlength="100" />
        <?php echo form_error('address','<div class="ci_error">','</div>'); ?>
        <p class="help-block"></p>
    </div>
</div>


<div class="control-group">
    <label class="control-label" for="driver_id">Driver</label>                                
    <div class="controls">
        <!-- <input id="driver_id" name="driver_id" type="number" value="<?php echo $result->driver_id ?>"  maxlength="11" /> -->
        <?php 
            $CI->load->model('driver_model');
            echo $CI->driver_model->get_as_dropdown('driver_id',$result->driver_id,array('driver_id','last_name'),'Driver','');
        ?>
        <?php echo form_error('driver_id','<div class="ci_error">','</div>'); ?>
        <p class="help-block"></p>
    </div>
</div>


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
    <label class="control-label" for="lat">Lat</label>                                
    <div class="controls">
        <input readonly id="lat" name="lat" type="text" value="<?php echo $result->lat ?>"  maxlength="15" />
        <?php echo form_error('lat','<div class="ci_error">','</div>'); ?>
        <p class="help-block"></p>
    </div>
</div>


<div class="control-group">
    <label class="control-label" for="lon">Lon</label>                                
    <div class="controls">
        <input readonly id="lon" name="lon" type="text" value="<?php echo $result->lon ?>"  maxlength="15" />
        <?php echo form_error('lon','<div class="ci_error">','</div>'); ?>
        <p class="help-block"></p>
    </div>
</div>


<div class="control-group">
    <label for="rating">Rating<p class="rating">1 - 10</p></label> 
    <div class="controls">
        <input id="rating" name="rating" type="text" value="<?php echo $result->rating ?>"  maxlength="1" />
        <?php echo form_error('rating','<div class="ci_error">','</div>'); ?>
        <p class="help-block"></p>
    </div>
</div>


<div class="control-group">
    <label class="control-label" for="room_available">Room available</label>                                
    <div class="controls">
        <input id="room_available" name="room_available" type="text" value="<?php echo $result->room_available ?>"  maxlength="1" />
        <?php echo form_error('room_available','<div class="ci_error">','</div>'); ?>
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



</div>
<div class="modal-footer">
  <div class="clearfix">
     <div class="pull-left">
        <?php echo form_submit( 'submit', 'Save','class="btn btn-primary"'); ?>
        <?php echo anchor((site_url('driver/hotel')) , 'Hotel list', array('class'=>'btn btn-default')); ?>
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
