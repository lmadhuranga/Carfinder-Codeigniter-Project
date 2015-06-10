<?php $CI = get_instance(); ?>
<div class="modal-header">
	<h3>Edit Chat</h3>
</div>
<?php echo form_open(current_url()); ?>
<div class="modal-body">

	<!-- <h2>Chat</h2> -->


	<?php echo $custom_error; ?>

  <input type="hidden" value="<?php echo $result->chat_id; ?>" id="chat_id" name="chat_id">

   <div class="control-group">
        <label for="admin_id">Admin user<span class="required">*</span></label> 
        <div class="controls">
            <?php 
                $CI->load->model('admin_model');
                echo $CI->admin_model->get_as_dropdown('admin_id',$result->admin_id,array('admin_id','first_name'),'Admin user','');
            ?>
            <?php echo form_error('admin_id','<div class="ci_error">','</div>'); ?>
            <p class="help-block"></p>
        </div>
    </div>


   <div class="control-group">
        <label for="driver_id">Driver<span class="required">*</span></label> 
        <div class="controls">
            <?php 
                $CI->load->model('driver_model');
                echo $CI->driver_model->get_as_dropdown('driver_id',$result->driver_id,array('driver_id','first_name'),'driver user','');
            ?>
            <?php echo form_error('driver_id','<div class="ci_error">','</div>'); ?>
            <p class="help-block"></p>
        </div>
    </div>


   <!-- Massage -->
    <div class="control-group">
        <label for="massage">Massage<span class=""></span></label> 
        <div class="controls">
             <textarea  id="massage" name="massage"   style="width:100%"><?php echo $result->massage; ?></textarea>
            <?php echo form_error('massage','<div class="ci_error">','</div>'); ?>
            <p class="help-block"></p>
        </div>
    </div> 

    <div class="control-group">
        <label class="control-label" for="status">Status<span class="required">*</span></label>                                
        <div class="controls">
            <?php echo
                form_dropdown('status', array(''=>'Select User status','A'=>'Active','I'=>'Inactive'),$result->status,''); 
            ?>
            <?php echo form_error('status','<div class="ci_error">','</div>'); ?>
            <p class="help-block"></p>
        </div>
    </div>


<!-- <div class="control-group">
    <label class="control-label" for="read">Read</label>                                
    <div class="controls">
        <input id="read" name="read" type="text" value="<?php echo $result->read ?>"  maxlength="1" />
        <?php echo form_error('read','<div class="ci_error">','</div>'); ?>
        <p class="help-block"></p>
    </div>
</div> -->


</div>
    <div class="modal-footer">
      <div class="clearfix">
         <div class="pull-left">
            <?php echo form_submit( 'submit', 'Save','class="btn btn-primary"'); ?>
            <?php echo anchor((site_url('admin/chat')) , 'Chat list', array('class'=>'btn btn-default')); ?>
        </div>
        <div class="span4 pull-right"><?php echo anchor(site_url(), ' &copy; '. date('Y').' '.$site_name); ?></div>
    </div>
</div>
<?php echo form_close(); ?>
