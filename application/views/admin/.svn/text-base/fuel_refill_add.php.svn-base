<?php $CI = get_instance(); ?>


        <div class="modal-header">
	<h3>Add a Fuel refill</h3>
</div>
<?php echo form_open(current_url()); ?>
<div class="modal-body">

	<?php echo $custom_error; ?>
	
    <div class="control-group">
        <label for="driver_id">Driver</label> 
        <div class="controls">                              
            <!-- <input id="driver_id" name="driver_id" type="number" value="<?php echo set_value('driver_id'); ?>"  maxlength="11"  /> -->
            <?php 
                $CI->load->model('driver_model');
                echo $CI->driver_model->get_as_dropdown('driver_id',set_value('driver_id'),array('driver_id','last_name'),'Driver','');
            ?>
            <?php echo form_error('driver_id','<div class="ci_error">','</div>'); ?>
            <p class="help-block"></p>
        </div>
    </div>

          <!-- vehicle_id -->
    <div class="control-group">
        <label for="vehicle_id">Vehicle <span class="required">*</span></label> 
        <div class="controls">  
            <?php 
                $CI->load->model('vehicle_model');
                echo $CI->vehicle_model->get_as_dropdown('vehicle_id',set_value('vehicle_id'),array('vehicle_id','register_no'),'Vehicle','');
            ?>
            <?php echo form_error('vehicle_id','<div class="ci_error">','</div>'); ?>
            <p class="help-block"></p>
        </div>
    </div>
    


    <div class="control-group">
        <label for="fuel_center_id">Fuel center</label> 
        <div class="controls">                              
            <!-- <input id="fuel_center_id" name="fuel_center_id" type="number" value="<?php echo set_value('fuel_center_id'); ?>"  maxlength="11"  /> -->
            <?php 
                $CI->load->model('fuel_center_model');
                echo $CI->fuel_center_model->get_as_dropdown('fuel_center_id','',array('fuel_center_id','name'),'Fuel center','');
            ?>
            <?php echo form_error('fuel_center_id','<div class="ci_error">','</div>'); ?>
            <p class="help-block"></p>
        </div>
    </div> 

    <div class="control-group">
        <label for="date">Date<span class="required">*</span></label> 
        <div class="controls">                              
            <input id="date" name="date" type="text" value="<?php echo set_value('date'); ?>" required="required" maxlength=""  />
            <?php echo form_error('date','<div class="ci_error">','</div>'); ?>
            <p class="help-block"></p>
        </div>
    </div>


    <div class="control-group">
        <label for="liter">Liter<span class="required">*</span></label> 
        <div class="controls">                              
            <input id="liter" name="liter" type="number" value="<?php echo set_value('liter'); ?>" required="required" maxlength="11"  />
            <?php echo form_error('liter','<div class="ci_error">','</div>'); ?>
            <p class="help-block"></p>
        </div>
    </div>


    <div class="control-group">
        <label for="fuel_unit_price">Fuel unit price</label> 
        <div class="controls">                              
            <input id="fuel_unit_price" name="fuel_unit_price" type="number" value="<?php echo set_value('fuel_unit_price'); ?>"  maxlength="11"  />
            <?php echo form_error('fuel_unit_price','<div class="ci_error">','</div>'); ?>
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


    <div class="control-group">
        <span class="btn btn-success fileinput-button">
            <i class="glyphicon glyphicon-plus"></i>
            <span>Select a image...</span>
            <!-- The file input field used as target for the file upload widget -->
            <input id="fileupload" type="file" name="fileupload">
            <!-- File name set in hidden field -->
            <input type="hidden" name="reciept_img" id="reciept_img" value="<?php echo set_value('reciept_img','default.jpg') ?>">
        </span>
        <span class="tooltipnew">*The photo you upload must be <b>160px</b> width and <b>110px</b> height</span><br/>
        <!-- Erro message -->
        <span class="tooltip_error" id='error_msg'></span><br/>
        <!-- Image preview -->
        <?php $image_path = "upload/img/reciept/".set_value('reciept_img','default.jpg'); ?>
        <img src="<?php echo base_url($image_path); ?>" width="200" id='image_pre'/>
    </div>
    <!-- /.control-group -->


    </div>
    <div class="modal-footer">
    	<div class="clearfix">
    		<!-- footer left  -->
    		<div class="pull-left">
    			<?php echo form_submit( 'submit', 'Save','class="btn btn-primary"'); ?>
    			<?php echo anchor((site_url('admin/fuel_refill')) , 'Fuel refill list', array('class'=>'btn btn-default')); ?>		
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
    jQuery(document).ready(function($) { 
        $('#date').datetimepicker({format:'Y-m-d H:i'}); 
    });
</script>

