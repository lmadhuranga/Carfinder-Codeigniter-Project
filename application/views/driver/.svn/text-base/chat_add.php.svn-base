<div class="modal-header">
	<h3>Add a Chat</h3>
</div>
<?php echo form_open(current_url()); ?>
<div class="modal-body">

	<?php echo $custom_error; ?>
	
    <div class="control-group">
        <label for="admin_id">Admin</label> 
        <div class="controls">                              
            <input id="admin_id" name="admin_id" type="number" value="<?php echo set_value('admin_id'); ?>"  maxlength="11"  />
            <?php echo form_error('admin_id','<div class="ci_error">','</div>'); ?>
            <p class="help-block"></p>
        </div>
    </div>


    <div class="control-group">
        <label for="driver_id">Driver</label> 
        <div class="controls">                              
            <input id="driver_id" name="driver_id" type="number" value="<?php echo set_value('driver_id'); ?>"  maxlength="11"  />
            <?php echo form_error('driver_id','<div class="ci_error">','</div>'); ?>
            <p class="help-block"></p>
        </div>
    </div>


   <!-- Massage -->
    <div class="control-group">
        <label for="massage">Massage<span class=""></span></label> 
        <div class="controls">
             <textarea  id="massage" name="massage"   style="width:100%"><?php echo set_value('massage'); ?></textarea>
            <?php echo form_error('massage','<div class="ci_error">','</div>'); ?>
            <p class="help-block"></p>
        </div>
    </div>


    <div class="control-group">
        <label class="control-label" for="status">Status<span class="required">*</span></label>                                
        <div class="controls">
            <?php echo
                form_dropdown('status', array(''=>'Select User status','A'=>'Active','I'=>'Inactive'),set_value('status','A'),''); 
            ?>
            <?php echo form_error('status','<div class="ci_error">','</div>'); ?>
            <p class="help-block"></p>
        </div>
    </div>


    <div class="control-group">
        <label for="read">Read</label> 
        <div class="controls">                              
            <input id="read" name="read" type="text" value="<?php echo set_value('read'); ?>"  maxlength="1"  />
            <?php echo form_error('read','<div class="ci_error">','</div>'); ?>
            <p class="help-block"></p>
        </div>
    </div>



</div>
<div class="modal-footer">
	<div class="clearfix">
		<!-- footer left  -->
		<div class="pull-left">
			<?php echo form_submit( 'submit', 'Save','class="btn btn-primary"'); ?>
			<?php echo anchor((site_url('admin/chat')) , 'Chat list', array('class'=>'btn btn-default')); ?>		
		</div>
		<!-- footer right  -->
		<div class="span4 pull-right"><?php echo anchor(site_url(), ' &copy; '. date('Y').' '.$site_name); ?></div>
	</div>
</div>
<?php echo form_close(); ?> 
<br> 