<?php $CI = get_instance(); ?>
<div class="modal-header">
	<h3>Add a Website booking</h3>
</div>
<?php echo form_open(current_url()); ?>
<div class="modal-body">

	<?php echo $custom_error; ?>
	
    <div class="control-group">
        <label class="control-label" for="title">Title<span class="required">*</span></label>                                
        <div class="controls">
            <!-- <input id="title" name="title" type="text" value="<?php echo $result->title ?>" required="required" maxlength="10" /> -->
            <?php echo
                form_dropdown('title', array(''=>'Select title','Mr'=>'Mr','Miss'=>'Miss','Mis'=>'Mis'), set_value('title'),''); 
            ?>
            <?php echo form_error('title','<div class="ci_error">','</div>'); ?>
            <p class="help-block"></p>
        </div>
    </div>


    <div class="control-group">
        <label for="first_name">First name<span class="required">*</span></label>
        <div class="controls">                              
            <input id="first_name" name="first_name" type="text" value="<?php echo set_value('first_name'); ?>"  maxlength="45"  required="required"/>
            <?php echo form_error('first_name','<div class="ci_error">','</div>'); ?>
            <p class="help-block"></p>
        </div>
    </div>


    <div class="control-group">
        <label for="last_name">Last name</label> 
        <div class="controls">                              
            <input id="last_name" name="last_name" type="text" value="<?php echo set_value('last_name'); ?>"  maxlength="45"  />
            <?php echo form_error('last_name','<div class="ci_error">','</div>'); ?>
            <p class="help-block"></p>
        </div>
    </div>


    <div class="control-group">
        <label for="town_id">Pick Nearest Town<span class="required">*</span></label> 
        <div class="controls">
            <?php 
                $CI->load->model('town_model');
                echo $CI->town_model->get_as_dropdown('town_id','',array('town_id','name'),'Town','');
            ?>
            <?php echo form_error('town_id','<div class="ci_error">','</div>'); ?>
            <p class="help-block"></p>
        </div>
    </div>


    <div class="control-group">
       <label for="address_1">From<span class=""></span></label> 
        <div class="controls">
             <textarea  id="address_1" name="address_1"   style="width:100%"><?php echo set_value('address_1'); ?></textarea>
            <?php echo form_error('address_1','<div class="ci_error">','</div>'); ?>
            <p class="help-block"></p>
        </div>
    </div> 


    <div class="control-group">
       <label for="address_2">To<span class=""></span></label> 
        <div class="controls">
             <textarea  id="address_2" name="address_2"   style="width:100%"><?php echo set_value('address_2'); ?></textarea>
            <?php echo form_error('address_2','<div class="ci_error">','</div>'); ?>
            <p class="help-block"></p>
        </div>
    </div> 


    <div class="control-group">
        <label for="request_date">Request date<span class="required">*</span></label>
        <div class="controls">                              
            <input id="request_date" name="request_date" type="text" value="<?php echo set_value('request_date'); ?>"  maxlength=""  required="required"/>
            <?php echo form_error('request_date','<div class="ci_error">','</div>'); ?>
            <p class="help-block"></p>
        </div>
    </div>


    <div class="control-group">
        <label for="request_time">Request time<span class="required">*</span></label>
        <div class="controls">                              
            <input id="request_time" name="request_time" type="text" value="<?php echo set_value('request_time'); ?>"  maxlength=""   />
            <?php echo form_error('request_time','<div class="ci_error">','</div>'); ?>
            <p class="help-block"></p>
        </div>
    </div>


    <div class="control-group">
        <label for="m_tel">Telephone no<span class="required">*</span></label>
        <div class="controls">                              
            <input id="m_tel" name="m_tel" type="text" value="<?php echo set_value('m_tel'); ?>"  maxlength="15"  required="required"/>
            <?php echo form_error('m_tel','<div class="ci_error">','</div>'); ?>
            <p class="help-block"></p>
        </div>
    </div>

    <div class="control-group">
        <label for="email">Email</label> 
        <div class="controls">                              
            <input id="email" name="email" type="email" class="form-control" value="<?php echo set_value('email'); ?>"  maxlength="45"  />
            <?php echo form_error('email','<div class="ci_error">','</div>'); ?>
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
		<!-- footer left  -->
		<div class="pull-left">
			<?php echo form_submit( 'submit', 'Save','class="btn btn-primary"'); ?>
			<?php echo anchor((site_url('admin/website_booking')) , 'Website booking list', array('class'=>'btn btn-default')); ?>		
		</div>
		<!-- footer right  -->
		<div class="span4 pull-right"><?php echo anchor(site_url(), ' &copy; '. date('Y').' '.$site_name); ?></div>
	</div>
</div>
<?php echo form_close(); ?> 
<br> 

<link href="<?php echo base_url('asset/css/jquery.datetimepicker.css') ?>" rel="stylesheet">
<script src="<?php echo base_url('asset/js/jquery.datetimepicker.js') ?>"></script>
<script>
    jQuery(document).ready(function($) { 
        
        $('#request_date').datetimepicker({ timepicker:false,format:'Y-m-d'});
        $('#request_time').datetimepicker({ datepicker:false,format:'H:i'});
         
    });
</script>