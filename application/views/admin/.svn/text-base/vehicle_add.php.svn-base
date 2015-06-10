<?php $CI = get_instance(); ?>
 <div class="modal-header">
    <h3>Add a Vehicle</h3>
</div>
<?php echo form_open(current_url()); ?>
<!-- .modal-body -->
<div class="modal-body">

    <?php echo $custom_error; ?>
    
    <div class="control-group">
        <label for="register_no">Register no<span class="required">*</span></label> 
        <div class="controls">                              
            <input id="register_no" name="register_no" type="text" value="<?php echo set_value('register_no'); ?>" required="required" maxlength="15"  />
            <?php echo form_error('register_no','<div class="ci_error">','</div>'); ?>
            <p class="help-block"></p>
        </div>
    </div>

    <!-- corlro picker -->
    <div class="control-group">
        <label class="control-label" for="color">Color<span class=" "> </span></label>                                
        <div class="controls">
            <input id="color" name="color" type="text" value="<?php echo set_value('color') ?>"  maxlength="10" />
            <?php echo form_error('color','<div class="ci_error">','</div>'); ?>
            <p class="help-block"></p>
        </div>
    </div>


    <div class="control-group">
        <label for="tank_liter">Tank liter</label> 
        <div class="controls">                              
            <input id="tank_liter" name="tank_liter" type="number" value="<?php echo set_value('tank_liter'); ?>" required="required"  maxlength="3" maxvalue='1000'  />
            <?php echo form_error('tank_liter','<div class="ci_error">','</div>'); ?>
            <p class="help-block"></p>
        </div>
    </div>


    <div class="control-group">
        <label for="brand_id">Brand<span class="required">*</span></label> 
        <div class="controls">                              
            <!-- <input id="brand_id" name="brand_id" type="dropdown" value="<?php echo set_value('brand_id'); ?>" required="required" maxlength="11"  /> -->
            <?php 
                $CI->load->model('brand_model');
                echo $CI->brand_model->get_as_dropdown('brand_id',set_value('brand_id'),array('brand_id','name'),'Brand','');
            ?>
            <?php echo form_error('brand_id','<div class="ci_error">','</div>'); ?>
            <p class="help-block"></p>
        </div>
    </div>


    <div class="control-group">
        <label for="vehicle_type_id">Vehicle type<span class="required">*</span></label> 
        <div class="controls">                              
            <!-- <input id="vehicle_type_id" name="vehicle_type_id" type="dropdown" value="<?php echo set_value('vehicle_type_id'); ?>" required="required" maxlength="11"  /> -->
            <?php 
                $CI->load->model('vehicle_type_model');
                echo $CI->vehicle_type_model->get_as_dropdown('vehicle_type_id',set_value('vehicle_type_id'),array('vehicle_type_id','type'),'Vehicle Type','');
            ?>
            <?php echo form_error('vehicle_type_id','<div class="ci_error">','</div>'); ?>
            <p class="help-block"></p>
        </div>
    </div>
 
 
    <div class="control-group">
        <label for="starting_km">Starting km</label> 
        <div class="controls">                              
            <input id="starting_km" name="starting_km" type="number" value="<?php echo set_value('starting_km'); ?>" required='required'  maxlength="3" maxvalue='1000'  />
            <?php echo form_error('starting_km','<div class="ci_error">','</div>'); ?>
            <p class="help-block"></p>
        </div>
    </div> 

    <div class="control-group">
        <label for="maintain_km">Next Maintain km</label> 
        <div class="controls">                              
            <input id="maintain_km" name="maintain_km" type="number" value="<?php echo set_value('maintain_km'); ?>" required="required" maxlength="3" maxvalue='1000'  />
            <?php echo form_error('maintain_km','<div class="ci_error">','</div>'); ?>
            <p class="help-block"></p>
        </div>
    </div>

    <!-- 
        <div class="control-group">
            <label for="auth">Auth<span class="required">*</span></label> 
            <div class="controls">                              
                <input id="auth" name="auth" type="text" value="<?php echo set_value('auth'); ?>" required="required" maxlength="200"  />
                <?php echo form_error('auth','<div class="ci_error">','</div>'); ?>
                <p class="help-block"></p>
            </div>
        </div> -->


    <div class="control-group">
        <label for="status">Status</label> 
        <div class="controls">                              
            <!-- <input id="status" name="status" type="dropdown" value="<?php echo set_value('status'); ?>"  maxlength="1"  /> -->
            <?php echo
                form_dropdown('status', array(''=>'Select Vehicle status','A'=>'Active','I'=>'Inactive'), set_value('status'),''); 
            ?>
            <?php echo form_error('status','<div class="ci_error">','</div>'); ?>
            <p class="help-block"></p>
        </div>
    </div>


    <div class="control-group">
        <label for="fuel_type_id">Fuel type<span class="required">*</span></label> 
        <div class="controls">                              
            <!-- <input id="fuel_type_id" name="fuel_type_id" type="dropdown" value="<?php echo set_value('fuel_type_id'); ?>" required="required" maxlength="1"  /> -->
            <?php 
                $CI->load->model('fuel_type_model');
                echo $CI->fuel_type_model->get_as_dropdown('fuel_type_id',set_value('fuel_type_id'),array('fuel_type_id','name'),'Fuel Type','');
            ?>
            <?php echo form_error('fuel_type_id','<div class="ci_error">','</div>'); ?>
            <p class="help-block"></p>
        </div>
    </div>

    <!-- image upload -->
<!--     <div class="control-group">
        <label for="image">Image<span class="required">*</span></label> 
        <div class="controls">                              
            <input id="image" name="image" type="file" value="" required="required" maxlength="100"  />
            <?php echo form_error('image','<div class="ci_error">','</div>'); ?>
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
            <input type="hidden" name="image" id="image" value="<?php echo set_value('image','default.jpg') ?>">
        </span>
        <span class="tooltipnew">*The photo you upload must be <b>160px</b> width and <b>110px</b> height</span><br/>
        <!-- Erro message -->
        <span class="tooltip_error" id='error_msg'></span><br/>
        <!-- Image preview -->
        <?php $image_path = 'upload/img/vehicle/default.jpg'; ?>
        <img src="<?php echo base_url($image_path); ?>" width="200" id='image_pre'/>
    </div>
    <?php echo form_error('image','<div class="ci_error">','</div>'); ?>
    <!-- /.control-group -->


 
</div><!-- /.modal-body -->
<div class="modal-footer">
    <div class="clearfix">
        <!-- footer left  -->
        <div class="pull-left">
            <?php echo form_submit( 'submit', 'Save','class="btn btn-primary"'); ?>
            <?php echo anchor((site_url('admin/vehicle')) , 'Vehicle list', array('class'=>'btn btn-default')); ?>      
        </div>
        <!-- footer right  -->
        <div class="span4 pull-right"><?php echo anchor(site_url(), ' &copy; '. date('Y').' '.$site_name); ?></div>
    </div>
</div>
<?php echo form_close(); ?> 
<br>
<!--  <script src="<?php echo base_url() ?>asset/js/jqBootstrapValidation.js"></script> --> <!-- jqBootstrapValidation.js  -->
<script> 

/*$(function() {
    // prettyPrint();
    $("input,textarea,select").jqBootstrapValidation(
    {
        preventSubmit: true,
        submitError: function($form, event, errors) {
        // Here I do nothing, but you could do something like display
        // the error messages to the user, log, etc.
  },
  submitSuccess: function($form, event) {
     alert("OK");
            // event.preventDefault();
        },
        filter: function() {
            return $(this).is(":visible");
        }
    });
    $("a[data-toggle=\"tab\"]").click(function(e) {
        e.preventDefault();
        $(this).tab("show");
    });
}); */

</script>
 

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
                '//jquery-file-upload.appspot.com/' : '<?php echo site_url("admin/vehicle/do_upload") ?>';
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
                $('#image_pre').attr('src', "<?php echo base_url('upload/img/vehicle/default.jpg') ?>");
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
                var image_full_path = "<?php echo base_url('upload/img/vehicle') ?>/"+e.image_name;
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
            $('#image_pre').attr('src', "<?php echo base_url('upload/img/vehicle/default.jpg') ?>");
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
 


<!-- /////////// color picker ////////////-->

<link rel="stylesheet" href="<?php echo base_url('asset/css/spectrum.css') ?>">
<script src="<?php echo base_url('asset/js/spectrum.js') ?>"></script>  

<script type="text/javascript">

 

    $("#color").spectrum({
        color: "#ECC",
        // flat: true,
        // showInput: true,
        className: "full-spectrum",
        showInitial: true,
        showPalette: true,
        // showSelectionPalette: true,
        maxPaletteSize: 10,
        preferredFormat: "hex",
        localStorageKey: "spectrum.demo",
        move: function (color) {
                // console.log(color);
                // alert('move')
        },
        show: function (color) {
            console.log(color.color);
            // alert('show')
        },
        beforeShow: function () {
            // console.log(event);
            // alert('beforeShow')
        },
        hide: function () {
            // console.log(event);
            // alert('hide')
        },
        change: function(event) {
            // console.log(event);
            // alert('change')
        },
        palette: [
            ["rgb(0, 0, 0)", "rgb(67, 67, 67)", "rgb(102, 102, 102)",
            "rgb(204, 204, 204)", "rgb(217, 217, 217)","rgb(255, 255, 255)"],
            ["rgb(152, 0, 0)", "rgb(255, 0, 0)", "rgb(255, 153, 0)", "rgb(255, 255, 0)", "rgb(0, 255, 0)",
            "rgb(0, 255, 255)", "rgb(74, 134, 232)", "rgb(0, 0, 255)", "rgb(153, 0, 255)", "rgb(255, 0, 255)"], 
            ["rgb(230, 184, 175)", "rgb(244, 204, 204)", "rgb(252, 229, 205)", "rgb(255, 242, 204)", "rgb(217, 234, 211)", 
            "rgb(208, 224, 227)", "rgb(201, 218, 248)", "rgb(207, 226, 243)", "rgb(217, 210, 233)", "rgb(234, 209, 220)", 
            "rgb(221, 126, 107)", "rgb(234, 153, 153)", "rgb(249, 203, 156)", "rgb(255, 229, 153)", "rgb(182, 215, 168)", 
            "rgb(162, 196, 201)", "rgb(164, 194, 244)", "rgb(159, 197, 232)", "rgb(180, 167, 214)", "rgb(213, 166, 189)", 
            "rgb(204, 65, 37)", "rgb(224, 102, 102)", "rgb(246, 178, 107)", "rgb(255, 217, 102)", "rgb(147, 196, 125)", 
            "rgb(118, 165, 175)", "rgb(109, 158, 235)", "rgb(111, 168, 220)", "rgb(142, 124, 195)", "rgb(194, 123, 160)",
            "rgb(166, 28, 0)", "rgb(204, 0, 0)", "rgb(230, 145, 56)", "rgb(241, 194, 50)", "rgb(106, 168, 79)",
            "rgb(69, 129, 142)", "rgb(60, 120, 216)", "rgb(61, 133, 198)", "rgb(103, 78, 167)", "rgb(166, 77, 121)",
            "rgb(91, 15, 0)", "rgb(102, 0, 0)", "rgb(120, 63, 4)", "rgb(127, 96, 0)", "rgb(39, 78, 19)", 
            "rgb(12, 52, 61)", "rgb(28, 69, 135)", "rgb(7, 55, 99)", "rgb(32, 18, 77)", "rgb(76, 17, 48)"]
        ]
    });

</script>

<!-- jquery valiation -->
