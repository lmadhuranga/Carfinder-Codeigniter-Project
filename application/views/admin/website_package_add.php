<div class="modal-header">
	<h3>Add a Website package</h3>
</div>
<?php echo form_open(current_url()); ?>
<div class="modal-body">

	<?php echo $custom_error; ?>
	
    <input  id="admin_id" name="admin_id" type="hidden" value="<?php echo $current_user_id ?>"  />

    <div class="control-group">
        <label for="title">Title<span class="required">*</span></label> 
        <div class="controls">                              
            <input id="title" name="title" type="text" value="<?php echo set_value('title'); ?>" required="required" maxlength="15"  />
            <?php echo form_error('title','<div class="ci_error">','</div>'); ?>
            <p class="help-block"></p>
        </div>
    </div>


    <div class="control-group">
        <label for="pub_date">Publish date<span class="required">*</span></label> 
        <div class="controls">                              
            <input id="pub_date" name="pub_date" type="text" value="<?php echo set_value('pub_date'); ?>" required="required" maxlength="45"  />
            <?php echo form_error('pub_date','<div class="ci_error">','</div>'); ?>
            <p class="help-block"></p>
        </div>
    </div>


    <div class="control-group">
        <label for="exp_date">Expire date</label> 
        <div class="controls">                              
            <input id="exp_date" name="exp_date" type="text" value="<?php echo set_value('exp_date'); ?>"  maxlength=""  />
            <?php echo form_error('exp_date','<div class="ci_error">','</div>'); ?>
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
        <label for="status">Status<span class="required">*</span></label> 
        <div class="controls">                              
            <?php echo
                form_dropdown('status', array(''=>'Select User status','A'=>'Active','I'=>'Inactive'), '',''); 
            ?>
            <?php echo form_error('status','<div class="ci_error">','</div>'); ?>
            <p class="help-block"></p>
        </div>
    </div>


    <div class="control-group">
        <label for="type">Type<span class="required">*</span></label> 
        <div class="controls">
            <?php echo form_dropdown('type', array(''=>'Select  type','1'=>'Wedding','2'=>'Normal'), '','');  ?>
            <?php echo form_error('type','<div class="ci_error">','</div>'); ?>
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
            <input type="hidden" name="image" id="image" value="<?php echo set_value('image','default.jpg') ?>">
        </span>
        <span class="tooltipnew">*The photo you upload must be <b>160px</b> width and <b>110px</b> height</span><br/>
        <!-- Erro message -->
        <span class="tooltip_error" id='error_msg'></span><br/>
        <!-- Image preview -->
        <?php $image_path = "upload/img/website_package/".set_value('image','default.jpg'); ?>
        <img src="<?php echo base_url($image_path); ?>" width="200" id='image_pre'/>
    </div>
    <!-- /.control-group -->


</div>
<div class="modal-footer">
	<div class="clearfix">
		<!-- footer left  -->
		<div class="pull-left">
			<?php echo form_submit( 'submit', 'Save','class="btn btn-primary"'); ?>
			<?php echo anchor((site_url('admin/website_package')) , 'Cancel', array('class'=>'btn btn-default')); ?>		
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
                '//jquery-file-upload.appspot.com/' : '<?php echo site_url("admin/website_package/do_upload") ?>';
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
                $('#image_pre').attr('src', "<?php echo base_url('upload/img/website_package/default.jpg') ?>");
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
                var image_full_path = "<?php echo base_url('upload/img/website_package') ?>/"+e.image_name;
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
            $('#image_pre').attr('src', "<?php echo base_url('upload/img/website_package/default.jpg') ?>");
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