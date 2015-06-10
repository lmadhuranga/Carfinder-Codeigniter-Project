<?php $CI = get_instance(); ?>
<div class="modal-header">
	<h3>Add a Admin user</h3>
</div>
<?php echo form_open(current_url()); ?>
<div class="modal-body">

	<?php echo $custom_error; ?>
	

    <div class="control-group">
        <label for="user_name">User name<span class="required">*</span></label> 
        <div class="controls">                              
            <input id="user_name" name="user_name" type="text" value="<?php echo set_value('user_name'); ?>" required="required" maxlength="25"  />
            <?php echo form_error('user_name','<div class="ci_error">','</div>'); ?>
            <p class="help-block"></p>
        </div>
    </div>


    <div class="control-group">
        <label for="first_name">First name<span class="required">*</span></label> 
        <div class="controls">                              
            <input id="first_name" name="first_name" type="text" value="<?php echo set_value('first_name'); ?>" required="required" maxlength="25"  />
            <?php echo form_error('first_name','<div class="ci_error">','</div>'); ?>
            <p class="help-block"></p>
        </div>
    </div>


    <div class="control-group">
        <label for="last_name">Last name<span class="required">*</span></label> 
        <div class="controls">                              
            <input id="last_name" name="last_name" type="text" value="<?php echo set_value('last_name'); ?>" required="required" maxlength="25"  />
            <?php echo form_error('last_name','<div class="ci_error">','</div>'); ?>
            <p class="help-block"></p>
        </div>
    </div>


    <div class="control-group">
        <label for="email">Email<span class="required">*</span></label> 
        <div class="controls">                              
            <input id="email" name="email" type="email" class="form-control" value="<?php echo set_value('email'); ?>" required="required" maxlength="45"  />
            <?php echo form_error('email','<div class="ci_error">','</div>'); ?>
            <p class="help-block"></p>
        </div>
    </div>


    <div class="control-group">
        <label for="mobile_no">Mobile no<span class="required">*</span></label> 
        <div class="controls">                              
            <input id="mobile_no" name="mobile_no" type="number" value="<?php echo set_value('mobile_no'); ?>" required="required" maxlength="11"  />
            <?php echo form_error('mobile_no','<div class="ci_error">','</div>'); ?>
            <p class="help-block"></p>
        </div>
    </div>


    <div class="control-group">
        <label for="adress_1">Adress 1<span class="required">*</span></label> 
        <div class="controls">                              
            <input id="adress_1" name="adress_1" type="text" value="<?php echo set_value('adress_1'); ?>" required="required" maxlength="25"  />
            <?php echo form_error('adress_1','<div class="ci_error">','</div>'); ?>
            <p class="help-block"></p>
        </div>
    </div>

    <div class="control-group">
        <label for="town_id">Nearest Town<span class="required">*</span></label> 
        <div class="controls">                              
            <!-- <input id="town_id" name="town_id" type="number" value="<?php echo set_value('town_id'); ?>" required="required" maxlength="11"  /> -->
            <?php 
                $CI->load->model('town_model');
                echo $CI->town_model->get_as_dropdown('town_id','',array('town_id','name'),'Town','');
            ?>
            <?php echo form_error('town_id','<div class="ci_error">','</div>'); ?>
            <p class="help-block"></p>
        </div>
    </div>


    <div class="control-group">
        <label for="adress_street">Adress street<span class="required">*</span></label> 
        <div class="controls">                              
            <input id="adress_street" name="adress_street" type="text" value="<?php echo set_value('adress_street'); ?>" required="required" maxlength="25"  />
            <?php echo form_error('adress_street','<div class="ci_error">','</div>'); ?>
            <p class="help-block"></p>
        </div>
    </div>


    <div class="control-group">
        <label for="status">Status<span class="required">*</span></label> 
        <div class="controls">                              
            <!-- <input id="status" name="status" type="text" value="<?php echo set_value('status'); ?>" required="required" maxlength="10"  /> -->
            <?php echo
                            form_dropdown('status', array(''=>'Select User status','A'=>'Active','I'=>'Inactive'), '',''); 
            ?>
            <?php echo form_error('status','<div class="ci_error">','</div>'); ?>
            <p class="help-block"></p>
        </div>
    </div>


    <div class="control-group">
        <label for="auth">Auth<span class="required">*</span></label> 
        <div class="controls">                              
            <input id="auth" name="auth" type="text" value="<?php echo set_value('auth'); ?>" required="required" maxlength="200"  />
            <?php echo form_error('auth','<div class="ci_error">','</div>'); ?>
            <p class="help-block"></p>
        </div>
    </div>


    <div class="control-group">
        <label for="user_password">User password<span class="required">*</span></label> 
        <div class="controls">                              
            <input id="user_password" name="user_password" type="password" value="<?php echo set_value('user_password'); ?>" required="required" maxlength="250"  />
            <?php echo form_error('user_password','<div class="ci_error">','</div>'); ?>
            <p class="help-block"></p>
        </div>
    </div>


<!--     <div class="control-group">
    <label for="user_type">User type</label> 
    <div class="controls">                              
        <input id="user_type" name="user_type" type="text" value="<?php echo set_value('user_type'); ?>"  maxlength="1"  />
        
        <?php echo form_error('user_type','<div class="ci_error">','</div>'); ?>
        <p class="help-block"></p>
    </div>
</div> -->

    <div class="control-group">
        <span class="btn btn-success fileinput-button">
            <i class="glyphicon glyphicon-plus"></i>
            <span>Select a image...</span>
            <!-- The file input field used as target for the file upload widget -->
            <input id="fileupload" type="file" name="fileupload">
            <!-- File name set in hidden field -->
            <input type="hidden" name="image" id="image" value="<?php echo set_value('image','default.jpg') ?>" />
        </span>
        <span class="tooltipnew">*The photo you upload must be <b>160px</b> width and <b>110px</b> height</span><br/>
        <!-- Erro message -->
        <span class="tooltip_error" id='error_msg'></span><br/>
        <!-- Image preview -->
        <?php $image_path = 'upload/img/admin/'.set_value('image','default.jpg'); ?>
        <img src="<?php echo base_url($image_path); ?>" width="200" id='image_pre'/>
    </div>
    <!-- /.control-group -->



</div>
<div class="modal-footer">
	<div class="clearfix">
		<!-- footer left  -->
		<div class="pull-left">
			<?php echo form_submit( 'submit', 'Save','class="btn btn-primary"'); ?>
			<?php echo anchor((site_url('admin/admin')) , 'Admin list', array('class'=>'btn btn-default')); ?>		
		</div>
		<!-- footer right  -->
		<div class="span4 pull-right"><?php echo anchor(site_url(), ' &copy; '. date('Y').' '.$site_name); ?></div>
	</div>
</div>
<?php echo form_close(); ?> 
<br> 


<!-- Ajax File uploader -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url('asset/css/jquery.fileupload.blueimp.css') ?>">
<script src="<?php echo base_url('asset/js/jquery.fileupload.blueimp.js') ?>"></script>
<!-- 
<script src="<?php echo base_url('asset/js/jquery.iframe-transport.js') ?>"></script> 
<script src='http://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js'>    </script>
 -->
<script>
$(function () {
    
    // Change this to the location of your server-side upload handler:
    var url = window.location.hostname === 'blueimp.github.io' ?
                '//jquery-file-upload.appspot.com/' : '<?php echo site_url("admin/admin/do_upload") ?>';
    $('#fileupload').fileupload({
        url: url,
        autoUpload:true,
        dataType: 'json',
        success:function(e, data) {
            // check error occur
            if(e.status==='error'){
                // set codeigniter validation error
                $("#error_msg").append().html('<div class="alert alert-danger">'+e.ci_error+'.</div>');
                // remove the image name in hidden field
                $('#image').val('');
                // set no image
                $('#image_pre').attr('src', "<?php echo base_url('upload/img/admin/default.jpg') ?>");
                // show message 4 sec and slide up
                $("#error_msg .alert").delay( 4000 ).slideUp( 500,function()
                {
                    // remove the error message
                    $("#error_msg").html('');
                });
            }
            else
            {
                // remove error masage 
                $('#error_msg').html('');
                // set the renamed img name in hidden field
                $('#image').val(e.image_name);
                // set image in preview section
                var image_full_path = "<?php echo base_url('upload/img/admin') ?>/"+e.image_name;
                $('#image_pre').attr('src', image_full_path);
            }
        },
        done: function (e, data) {
            $.each(data.result.files, function (index, file) {
                $('<p/>').text(file.name).appendTo('#fileupload');
            });
        },
        progressall: function (e, data) {
            // var progress = parseInt(data.loaded / data.total * 100, 10);
            // $('#progress .progress-bar').css(
            //     'width',
            //     progress + '%'
            // );
        },
        error:function(e,data) {
            console.log(e);
            // set codeigniter validation error
            $("#error_msg").append().html('<div class="alert alert-danger">Your file is not uploaded.</div>');
            $("#error_msg .alert").slideDown('slow');
            // remove the image name in hidden field
            $('#image').val('');
            // set no image
            $('#image_pre').attr('src', "<?php echo base_url('upload/img/admin/default.jpg') ?>");
            // show message 4 sec and slide up
            $("#error_msg .alert").delay( 4000 ).slideUp( 500,function()
            {
                // remove the error message
                $("#error_msg").html('');
            });
        }

    })
// .prop('disabled', !$.support.fileInput)
//         .parent().addClass($.support.fileInput ? undefined : 'disabled');
});

</script>