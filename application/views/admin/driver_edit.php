<div class="modal-header">
	<h3>Edit Driver</h3>
</div>
<?php echo form_open(current_url()); ?>
<div class="modal-body">

	<!-- <h2>Driver</h2> -->


	<?php echo $custom_error; ?> 

  <input type="hidden" value="<?php echo $result->driver_id; ?>" id="driver_id" name="driver_id">

  <div class="control-group">
    <label class="control-label" for="user_name">User name<span class="required">*</span></label>                                
    <div class="controls">
        <input id="user_name" name="user_name" type="text" value="<?php echo $result->user_name ?>" required="required" maxlength="20" />
        <?php echo form_error('user_name','<div class="ci_error">','</div>'); ?>
        <p class="help-block"></p>
    </div>
</div>


<div class="control-group">
    <label class="control-label" for="first_name">First name<span class="required">*</span></label>                                
    <div class="controls">
        <input id="first_name" name="first_name" type="text" value="<?php echo $result->first_name ?>" required="required" maxlength="50" />
        <?php echo form_error('first_name','<div class="ci_error">','</div>'); ?>
        <p class="help-block"></p>
    </div>
</div>


<div class="control-group">
    <label class="control-label" for="last_name">Last name<span class="required">*</span></label>                                
    <div class="controls">
        <input id="last_name" name="last_name" type="text" value="<?php echo $result->last_name ?>" required="required" maxlength="50" />
        <?php echo form_error('last_name','<div class="ci_error">','</div>'); ?>
        <p class="help-block"></p>
    </div>
</div>


<div class="control-group">
    <label class="control-label" for="address_1">Address 1<span class="required">*</span></label>                                
    <div class="controls">
        <input id="address_1" name="address_1" type="text" value="<?php echo $result->address_1 ?>" required="required" maxlength="100" />
        <?php echo form_error('address_1','<div class="ci_error">','</div>'); ?>
        <p class="help-block"></p>
    </div>
</div>


<div class="control-group">
    <label class="control-label" for="address_2">Address 2</label>                                
    <div class="controls">
        <input id="address_2" name="address_2" type="text" value="<?php echo $result->address_2 ?>"  maxlength="100" />
        <?php echo form_error('address_2','<div class="ci_error">','</div>'); ?>
        <p class="help-block"></p>
    </div>
</div>


<div class="control-group">
    <label class="control-label" for="nic">Nic<span class="required">*</span></label>                                
    <div class="controls">
        <input id="nic" class="nic" name="nic" type="text" value="<?php echo $result->nic ?>" required="required" maxlength="11" />
        <?php echo form_error('nic','<div class="ci_error">','</div>'); ?>
        <p class="help-block"></p>
    </div>
</div>


<div class="control-group">
    <label class="control-label" for="licen_no">License no<span class="required">*</span></label>                                
    <div class="controls">
        <input id="licen_no" name="licen_no" type="text" value="<?php echo $result->licen_no ?>" required="required" maxlength="20" />
        <?php echo form_error('licen_no','<div class="ci_error">','</div>'); ?>
        <p class="help-block"></p>
    </div>
</div>

<div class="control-group">
    <label class="control-label" for="license_type">License type<span class="required">*</span></label>                                
    <div class="controls">
        <?php echo
            form_dropdown('license_type', array(''=>'Select license type','LITE'=>'Lite','HEAVY'=>'Heavy'), $result->license_type,''); 
        ?>
        <?php echo form_error('license_type','<div class="ci_error">','</div>'); ?>
        <p class="help-block"></p>
    </div>
</div>
 


<div class="control-group">
    <label class="control-label" for="m_tel">Mobile tel<span class="required">*</span></label>                                
    <div class="controls">
        <input id="m_tel" name="m_tel" type="text" value="<?php echo $result->m_tel ?>" required="required" maxlength="20" />
        <?php echo form_error('m_tel','<div class="ci_error">','</div>'); ?>
        <p class="help-block"></p>
    </div>
</div>


<div class="control-group">
    <label class="control-label" for="h_tel">Home tel<span class="required">*</span></label>                                
    <div class="controls">
        <input id="h_tel" name="h_tel" type="text" value="<?php echo $result->h_tel ?>" required="required" maxlength="20" />
        <?php echo form_error('h_tel','<div class="ci_error">','</div>'); ?>
        <p class="help-block"></p>
    </div>
</div>

<!-- 
<div class="control-group">
    <label class="control-label" for="auth_code">Auth code<span class="required">*</span></label>                                
    <div class="controls">
        <input id="auth_code" name="auth_code" type="text" value="<?php echo $result->auth_code ?>" required="required" maxlength="200" />
        <?php echo form_error('auth_code','<div class="ci_error">','</div>'); ?>
        <p class="help-block"></p>
    </div>
</div> -->


<div class="control-group">
    <label class="control-label" for="status">Status<span class="required">*</span></label>                                
    <div class="controls">
        <!-- <input id="status" name="status" type="text" value="<?php echo $result->status ?>" required="required" maxlength="1" /> -->
        <?php echo
        form_dropdown('status', array(''=>'Select Vehicle status','A'=>'Active','I'=>'Inactive'), $result->status,''); 
        ?>
        <?php echo form_error('status','<div class="ci_error">','</div>'); ?>
        <p class="help-block"></p>
    </div>
</div>
 
<div class="control-group">
    <label class="control-label" for="dob">Birth day</label>                                
    <div class="controls">
        <input id="dob" name="dob" type="text" value="<?php echo $result->dob ?>"  maxlength="" />
        <?php echo form_error('dob','<div class="ci_error">','</div>'); ?>
        <p class="help-block"></p>
    </div>
</div> 

<div class="control-group">
    <label class="control-label" for="leave_date">Leave date</label>                                
    <div class="controls">
        <input id="leave_date" name="leave_date" type="text" value="<?php echo $result->leave_date ?>"  maxlength="" />
        <?php echo form_error('leave_date','<div class="ci_error">','</div>'); ?>
        <p class="help-block"></p>
    </div>
</div>


 

<div class="control-group">
    <label class="control-label" for="licen_expire_date">Licen expire date</label>                                
    <div class="controls">
        <input id="licen_expire_date" name="licen_expire_date" type="text" value="<?php echo $result->licen_expire_date ?>"  maxlength="" />
        <?php echo form_error('licen_expire_date','<div class="ci_error">','</div>'); ?>
        <p class="help-block"></p>
    </div>
</div> 

<div class="control-group">
    <span class="btn btn-success fileinput-button">
        <i class="glyphicon glyphicon-plus"></i>
        <span>Select a image...</span>
        <!-- The file input field used as target for the file upload widget -->
        <input id="fileupload" type="file" name="fileupload">
        <!-- File name set in hidden field -->
        <input type="hidden" name="image" id="image" value="<?php echo $result->image ?>">
    </span>
    <span class="tooltipnew">*The photo you upload must be <b>160px</b> width and <b>110px</b> height</span><br/>
    <!-- Erro message -->
    <span class="tooltip_error" id='error_msg'></span><br/>
    <!-- Image preview -->
    <?php $image_path = 'upload/img/driver/'.$result->image; ?>
    <img src="<?php echo base_url($image_path); ?>" width="200" id='image_pre'/>
</div>
<!-- /.control-group -->


</div>
<div class="modal-footer">
  <div class="clearfix">
   <div class="pull-left">
    <?php echo form_submit( 'submit', 'Save','class="btn btn-primary"'); ?>
    <?php echo anchor((site_url('admin/driver')) , 'Driver list', array('class'=>'btn btn-default')); ?>
</div>
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
                '//jquery-file-upload.appspot.com/' : '<?php echo site_url("admin/driver/do_upload") ?>';
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
                $('#image_pre').attr('src', "<?php echo base_url('upload/img/driver/default.jpg') ?>");
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
                var image_full_path = "<?php echo base_url('upload/img/driver') ?>/"+e.image_name;
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
            $('#image_pre').attr('src', "<?php echo base_url('upload/img/driver/default.jpg') ?>");
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
<link href="<?php echo base_url('asset/css/jquery.datetimepicker.css') ?>" rel="stylesheet">
<script src="<?php echo base_url('asset/js/jquery.datetimepicker.js') ?>"></script>
<script>
    jQuery(document).ready(function($)
    {
        $('#dob').datetimepicker({ timepicker:false, format:'Y-m-d'});
        $('#leave_date').datetimepicker({ format:'Y-m-d H:i'});
        $('#licen_expire_date').datetimepicker({ timepicker:false,format:'Y-m-d'});
        
    });
</script>
 

