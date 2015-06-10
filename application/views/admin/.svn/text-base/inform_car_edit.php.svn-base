<?php $CI = get_instance(); ?>
<div class="modal-header">
	<h3>Edit Inform car</h3>
</div>
<?php echo form_open(current_url()); ?>
<div class="modal-body">

	<!-- <h2>Inform_car</h2> -->


	<?php echo $custom_error; ?>

  <input type="hidden" value="<?php echo $result->inform_car_id; ?>" id="inform_car_id" name="inform_car_id">

    
    <div class="control-group">
        <label class="control-label" for="title">Title<span class="required">*</span></label>                                
        <div class="controls"> 
            <?php echo
                form_dropdown('title', array(''=>'Select title','Mr'=>'Mr','Miss'=>'Miss','Mis'=>'Mis'), $result->title,''); 
            ?>
            <?php echo form_error('title','<div class="ci_error">','</div>'); ?>
            <p class="help-block"></p>
        </div>
    </div>


    <div class="control-group">
        <label class="control-label" for="first_name">First name<span class="required">*</span></label>                                
        <div class="controls">
            <input id="first_name" name="first_name" type="text" value="<?php echo $result->first_name ?>" required="required" maxlength="45" />
            <?php echo form_error('first_name','<div class="ci_error">','</div>'); ?>
            <p class="help-block"></p>
        </div>
    </div>


    <div class="control-group">
        <label class="control-label" for="last_name">Last name</label>                                
        <div class="controls">
            <input id="last_name" name="last_name" type="text" value="<?php echo $result->last_name ?>"  maxlength="45" />
            <?php echo form_error('last_name','<div class="ci_error">','</div>'); ?>
            <p class="help-block"></p>
        </div>
    </div>



    <div class="control-group">
        <label for="town_id">Pick Nearest Town<span class="required">*</span></label> 
        <div class="controls">
            <?php 
                $CI->load->model('town_model');
                echo $CI->town_model->get_as_dropdown('town_id',$result->town_id,array('town_id','name'),'Town','');
            ?>
            <?php echo form_error('town_id','<div class="ci_error">','</div>'); ?>
            <p class="help-block"></p>
        </div>
    </div>



    <div class="control-group">
       <label for="address_1">From Address<span class="required">*</span></label> 
        <div class="controls">
             <textarea  id="address_1" name="address_1"   style="width:100%"><?php echo $result->address_1; ?></textarea>
            <?php echo form_error('address_1','<div class="ci_error">','</div>'); ?>
            <p class="help-block"></p>
        </div>
    </div> 


    <div class="control-group">
       <label for="address_2">To Address<span class=""></span></label> 
        <div class="controls">
             <textarea  id="address_2" name="address_2"   style="width:100%"><?php echo $result->address_2; ?></textarea>
            <?php echo form_error('address_2','<div class="ci_error">','</div>'); ?>
            <p class="help-block"></p>
        </div>
    </div> 


    <div class="control-group">
        <label class="control-label" for="m_tel">Telephone<span class="required">*</span></label>                                
        <div class="controls">
            <input id="m_tel" name="m_tel" type="text" value="<?php echo $result->m_tel ?>" required="required" maxlength="15" />
            <?php echo form_error('m_tel','<div class="ci_error">','</div>'); ?>
            <p class="help-block"></p>
        </div>
    </div>


    <div class="control-group">
        <label class="control-label" for="request_date">Request date<span class="required">*</span></label>                                
        <div class="controls">
            <input id="request_date" name="request_date" type="text" value="<?php echo $result->request_date ?>" required="required" maxlength="" />
            <?php echo form_error('request_date','<div class="ci_error">','</div>'); ?>
            <p class="help-block"></p>
        </div>
    </div>


    <div class="control-group">
        <label class="control-label" for="request_time">Request time<span class="required">*</span></label>                                
        <div class="controls">
            <input id="request_time" name="request_time" type="text" value="<?php echo $result->request_time ?>" required="required" maxlength="" />
            <?php echo form_error('request_time','<div class="ci_error">','</div>'); ?>
            <p class="help-block"></p>
        </div>
    </div>



    <div class="control-group">
        <label for="status">Status</label> 
        <div class="controls">                              
            <?php 
                echo form_dropdown('status', array(''=>'Select Status','SV'=>'Send vehicle'), $result->status,''); 
            ?>
            <?php echo form_error('status','<div class="ci_error">','</div>'); ?>
            <p class="help-block"></p>
        </div>
    </div> 


    <div class="control-group">
        <label for="admin_id">Add by admin user<span class="required">*</span></label> 
        <div class="controls">
            <?php 
                $CI->load->model('admin_model');
                echo $CI->admin_model->get_as_dropdown('admin_id',$result->admin_id,array('admin_id','last_name'),'Admin user','');
            ?>
            <?php echo form_error('admin_id','<div class="ci_error">','</div>'); ?>
            <p class="help-block"></p>
        </div>
    </div>


    <div class="control-group">
        <label for="driver_id">Send driver<span class="required">*</span></label> 
        <div class="controls">
            <?php 
                $CI->load->model('driver_model');
                echo $CI->driver_model->get_as_dropdown('driver_id',$result->driver_id,array('driver_id','last_name'),'Driver','');
            ?>
            <?php echo form_error('driver_id','<div class="ci_error">','</div>'); ?>
            <p class="help-block"></p>
        </div>
    </div>

    <?php if ($website_booking_id!=''): ?>
        <div class="control-group">
            <label class="control-label" for="website_booking_id">Website booking </label>                                
            <div class="controls">
                <input id="website_booking_id" name="website_booking_id" type="number" value="<?php echo $result->website_booking_id ?>"  maxlength="11" />
                <a href="<?php echo(site_url('admin/website_booking/view/'.$result->website_booking_id)); ?>">visit link</a>
                <?php echo form_error('website_booking_id','<div class="ci_error">','</div>'); ?>
                <p class="help-block"></p>
            </div>
        </div>
    <?php endif ?>


    <div class="control-group">
       <label for="admin_note">Admin Note<span class=""></span></label> 
        <div class="controls">
             <textarea  id="admin_note" name="admin_note"   style="width:100%"><?php echo $result->admin_note; ?></textarea>
            <?php echo form_error('admin_note','<div class="ci_error">','</div>'); ?>
            <p class="help-block"></p>
        </div>
    </div> 


    </div>
    <div class="modal-footer">
      <div class="clearfix">
         <div class="pull-left">
            <?php echo form_submit( 'submit', 'Save','class="btn btn-primary"'); ?>
            <?php echo anchor((site_url('admin/inform_car')) , 'Inform car list', array('class'=>'btn btn-default')); ?>
        </div>
        <div class="span4 pull-right"><?php echo anchor(site_url(), ' &copy; '. date('Y').' '.$site_name); ?></div>
    </div>
</div>
<?php echo form_close(); ?> 

<link href="<?php echo base_url('asset/css/jquery.datetimepicker.css') ?>" rel="stylesheet">
<script src="<?php echo base_url('asset/js/jquery.datetimepicker.js') ?>"></script>
<script>
    jQuery(document).ready(function($) { 
        $('#request_date').datetimepicker({ timepicker:false, format:'Y-m-d'});
        $('#request_time').datetimepicker({ datepicker:false,format:'H:i'});
        
    });
</script>