 <?php $CI = get_instance();
    $CI->load->model('admin_model');
  ?>
 <div class="modal-header">
	<h3>Payment add</h3>
</div>
<?php echo form_open(current_url()); ?>
<div class="modal-body">

    <?php echo $custom_error; ?>
    <input type="hidden" id='status' name='status' value='A'> 
    <input type="hidden" id='admin_id' name='admin_id' value='<?php echo $current_user_id; ?>'> 
    
    <div class="control-group">
        <label class="control-label" for="driver_id">Driver<span class="required">*</span></label>                                
        <div class="controls"> 
            <?php 
                $CI->load->model('driver_model');
                echo $CI->driver_model->get_as_dropdown('driver_id',set_value('driver_id'),array('driver_id','last_name'),'Driver','');
            ?>
            <?php echo form_error('driver_id','<div class="ci_error">','</div>'); ?>
            <p class="help-block"></p>
        </div>
    </div>
 

    <div class="control-group">
        <label for="cash">Cash<span class="required">*</span></label> 
        <div class="controls">                              
            <input id="cash" name="cash" type="number" value="<?php echo set_value('cash'); ?>" required="required" maxlength="11"  />
            <?php echo form_error('cash','<div class="ci_error">','</div>'); ?>
            <p class="help-block"></p>
        </div>
    </div>


    <div class="control-group">
        <label for="paid_date">Paid date<span class="required">*</span></label> 
        <div class="controls">                              
            <input id="paid_date" name="paid_date" type="text" value="<?php echo set_value('paid_date'); ?>" required="required" maxlength=""  />
            <?php echo form_error('paid_date','<div class="ci_error">','</div>'); ?>
            <p class="help-block"></p>
        </div>
    </div>



    <!-- type -->
    <div class="control-group">
        <label for="type">Type<span class=""></span></label> 
        <div class="controls">  
            <?php echo
                form_dropdown('type', array('SALARY' =>'Salary','ADVANCE' => 'Advance', 'LOAN'=>'Loan'), set_value('type'),''); 
            ?>
            <?php echo form_error('type','<div class="ci_error">','</div>'); ?>
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
			<?php echo anchor((site_url('admin/salary')) , 'Salary list', array('class'=>'btn btn-default')); ?>		
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
        $('#paid_date').datetimepicker({   format:'Y-m-d H:i'});
         
    });
</script>