<div class="modal-header">
	<h3>Add a Website news</h3>
</div>
<?php echo form_open(current_url()); ?>
<div class="modal-body">

	<?php echo $custom_error; ?>

	<div class="control-group">
		<label for="title">Title<span class="required">*</span></label> 
		<div class="controls">                              
			<input id="title" name="title" type="text" value="<?php echo set_value('title'); ?>" required="required" maxlength="30"  />
			<?php echo form_error('title','<div class="ci_error">','</div>'); ?>
			<p class="help-block"></p>
		</div>
	</div>
	
	<div class="control-group">
		<label for="content">Content<span class="required">*</span></label> 
		<div class="controls">
			 <textarea  id="content" name="content"   style="width:100%"><?php echo set_value('content'); ?></textarea>
			<?php echo form_error('content','<div class="ci_error">','</div>'); ?>
			<p class="help-block"></p>
		</div>
	</div>
	

	<div class="control-group">
		<label for="pub_date">Pub date<span class="required">*</span></label> 
		<div class="controls">                              
			<input id="pub_date" name="pub_date" type="text" value="<?php echo set_value('pub_date'); ?>" required="required" maxlength="45"  />
			<?php echo form_error('pub_date','<div class="ci_error">','</div>'); ?>
			<p class="help-block"></p>
		</div>
	</div>
	

	<div class="control-group">
		<label for="status">Status<span class="required">*</span></label> 
		<div class="controls">                              
			<!-- <input id="status" name="status" type="text" value="<?php echo set_value('status'); ?>" required="required" maxlength="1"  /> -->
			<?php echo form_dropdown('status', array(''=>'Select User status','A'=>'Active','I'=>'Inactive'), '','');  ?>
			<?php echo form_error('status','<div class="ci_error">','</div>'); ?>
			<p class="help-block"></p>
		</div>
	</div>
	

	<div class="control-group">
		<label for="exp_date">Exp date</label> 
		<div class="controls">                              
			<input id="exp_date" name="exp_date" type="text" value="<?php echo set_value('exp_date'); ?>"  maxlength=""  />
			<?php echo form_error('exp_date','<div class="ci_error">','</div>'); ?>
			<p class="help-block"></p>
		</div>
	</div>
	


</div>
<div class="modal-footer">
	<div class="clearfix">
		<!-- footer left  -->
		<div class="pull-left">
			<?php echo form_submit( 'submit', 'Save','class="btn btn-primary"'); ?>
			<?php echo anchor((site_url('admin/website_news')) , 'Website news list', array('class'=>'btn btn-default')); ?>		
		</div>
		<!-- footer right  -->
		<div class="span4 pull-right"><?php echo anchor(site_url(), ' &copy; '. date('Y').' '.$site_name); ?></div>
	</div>
</div>
<?php echo form_close(); ?> 
<br>
<!-- 
<script src="<?php echo base_url() ?>asset/js/jquery-1.9.1.js"></script> --> <!-- jquery  -->


<!-- load tinymce -->
<script src="<?php echo base_url('asset/js/plugins/tinymce/tinymce.min.js') ?>"></script>
<script type="text/javascript">
tinymce.init({
    selector: "textarea",
    plugins: [
        "advlist autolink lists link image charmap print preview anchor",
        "searchreplace visualblocks code fullscreen",
        "insertdatetime media table contextmenu  "
    ],
    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
});
</script>
 

<link href="<?php echo base_url('asset/css/jquery.datetimepicker.css') ?>" rel="stylesheet">
<script src="<?php echo base_url('asset/js/jquery.datetimepicker.js') ?>"></script>
<script>
    jQuery(document).ready(function($) { 
        $('#pub_date').datetimepicker({ timepicker:false, format:'Y-m-d'});
        $('#exp_date').datetimepicker({ timepicker:false, format:'Y-m-d'});
         
    });
</script>