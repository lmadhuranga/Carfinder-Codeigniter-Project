<?php $CI = get_instance(); ?>
 <div class="modal-header">
	<h3>Edit Journey</h3>
</div>
<?php echo form_open(current_url()); ?>
<div class="modal-body">

	<!-- <h2>Journey</h2> -->


	<?php echo $custom_error; ?>

  <input type="hidden" value="<?php echo $result->journey_id; ?>" id="journey_id" name="journey_id">

  <div class="control-group">
    <label class="control-label" for="start_time">Start time<span class="required">*</span></label>                                
    <div class="controls">
        <input id="start_time" name="start_time" type="text" value="<?php echo $result->start_time ?>" required="required" maxlength="" />
        <?php echo form_error('start_time','<div class="ci_error">','</div>'); ?>
        <p class="help-block"></p>
    </div>
</div>


<div class="control-group">
    <label class="control-label" for="end_time">End time</label>                                
    <div class="controls">
        <input id="end_time" name="end_time" type="text" value="<?php echo $result->end_time ?>"  maxlength="" />
        <?php echo form_error('end_time','<div class="ci_error">','</div>'); ?>
        <p class="help-block"></p>
    </div>
</div>


<div class="control-group">
    <label class="control-label" for="start_place">Start place<span class="required">*</span></label>                                
    <div class="controls">
        <input id="start_place" name="start_place" type="text" value="<?php echo $result->start_place ?>" required="required" maxlength="45" />
        <?php echo form_error('start_place','<div class="ci_error">','</div>'); ?>
        <p class="help-block"></p>
    </div>
</div>


<div class="control-group">
    <label class="control-label" for="end_place">End place</label>                                
    <div class="controls">
        <input id="end_place" name="end_place" type="text" value="<?php echo $result->end_place ?>"  maxlength="45" />
        <?php echo form_error('end_place','<div class="ci_error">','</div>'); ?>
        <p class="help-block"></p>
    </div>
</div>



    <div class="control-group">
        <label class="control-label" for="vehicle_id">Vehicle<span class="required">*</span></label>                                
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
        <label class="control-label" for="driver_id">Driver<span class="required">*</span></label>                                
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
        <label class="control-label" for="start_town_id">Nearest Start town<span class="required">*</span></label>                                
        <div class="controls">
            <?php 
                $CI->load->model('town_model');
                echo $CI->town_model->get_as_dropdown('start_town_id',$result->start_town_id,array('town_id','name'),'Town','');
            ?>
            <?php echo form_error('start_town_id','<div class="ci_error">','</div>'); ?>
            <p class="help-block"></p>
        </div>
    </div>


    <div class="control-group">
        <label class="control-label" for="end_town_id">Nearest end town<span class="required">*</span></label>                                
        <div class="controls">
            <?php 
                $CI->load->model('town_model');
                echo $CI->town_model->get_as_dropdown('end_town_id',$result->end_town_id,array('town_id','name'),'Town','');
            ?>
            <?php echo form_error('end_town_id','<div class="ci_error">','</div>'); ?>
            <p class="help-block"></p>
        </div>
    </div>


    <div class="control-group">
        <label for="km">Traveled distanse (Km)</label> 
        <div class="controls">                              
            <input id="km" name="km" type="number" value="<?php echo $result->km; ?>"  maxlength="11"  />
            <?php echo form_error('km','<div class="ci_error">','</div>'); ?>
            <p class="help-block"></p>
        </div>
    </div>



<div class="control-group">
    <label class="control-label" for="pasenger_count">Passenger count</label>                                
    <div class="controls">
        <input id="pasenger_count" name="pasenger_count" type="number" value="<?php echo $result->pasenger_count ?>"  maxlength="11" />
        <?php echo form_error('pasenger_count','<div class="ci_error">','</div>'); ?>
        <p class="help-block"></p>
    </div>
</div>


<div class="control-group">
    <label class="control-label" for="cash">Cash</label>                                
    <div class="controls">
        <input id="cash" name="cash" type="number" value="<?php echo $result->cash ?>"  maxlength="11" />
        <?php echo form_error('cash','<div class="ci_error">','</div>'); ?>
        <p class="help-block"></p>
    </div>
</div>


    <div class="control-group">
        <label for="meter_value">Meter km</label> 
        <div class="controls">                              
            <input id="meter_value" name="meter_value" type="number" value="<?php echo $result->meter_value; ?>"  maxlength="11"  />
            <?php echo form_error('meter_value','<div class="ci_error">','</div>'); ?>
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


<!-- <div class="control-group">
    <label class="control-label" for="start_lat">Start lat</label>                                
    <div class="controls">
        <input id="start_lat" name="start_lat" type="text" value="<?php echo $result->start_lat ?>"  maxlength="45" />
        <?php echo form_error('start_lat','<div class="ci_error">','</div>'); ?>
        <p class="help-block"></p>
    </div>
</div>


<div class="control-group">
    <label class="control-label" for="start_lon">Start lon</label>                                
    <div class="controls">
        <input id="start_lon" name="start_lon" type="text" value="<?php echo $result->start_lon ?>"  maxlength="45" />
        <?php echo form_error('start_lon','<div class="ci_error">','</div>'); ?>
        <p class="help-block"></p>
    </div>
</div>


<div class="control-group">
    <label class="control-label" for="end_lat">End lat</label>                                
    <div class="controls">
        <input id="end_lat" name="end_lat" type="text" value="<?php echo $result->end_lat ?>"  maxlength="45" />
        <?php echo form_error('end_lat','<div class="ci_error">','</div>'); ?>
        <p class="help-block"></p>
    </div>
</div>


<div class="control-group">
    <label class="control-label" for="end_lon">End lon</label>                                
    <div class="controls">
        <input id="end_lon" name="end_lon" type="text" value="<?php echo $result->end_lon ?>"  maxlength="45" />
        <?php echo form_error('end_lon','<div class="ci_error">','</div>'); ?>
        <p class="help-block"></p>
    </div>
</div> -->


</div>
<div class="modal-footer">
  <div class="clearfix">
     <div class="pull-left">
        <?php echo form_submit( 'submit', 'Save','class="btn btn-primary"'); ?>
        <?php echo anchor((site_url('driver/journey')) , 'Journey list', array('class'=>'btn btn-default')); ?>
    </div>
    <div class="span4 pull-right"><?php echo anchor(site_url(), ' &copy; '. date('Y').' '.$site_name); ?></div>
</div>
</div>
<?php echo form_close(); ?>
