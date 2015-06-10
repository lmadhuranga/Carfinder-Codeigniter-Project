<?php $CI = get_instance(); ?>

<!-- google map -->
<style type="text/css">
html { height: 100% }
body { height: 100%; margin: 0; padding: 0 }
#map-canvas { height: 288px; }
</style>
<script src="<?php echo base_url() ?>asset/js/google.setting.js"></script> <!-- google map default settings -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAWhbMzbzbPkroxqoqE1moK0RzJJPUcmf4">
</script>
<script type="text/javascript">
    // console.log(google_default.df_city_lon);
    // center: new google.maps.LatLng(google_default.df_city_lat,google_default.df_city_lon),

        // global "map" variable
        var map = null;
        var marker = null;
        // infowindow intialize
        var infowindow = new google.maps.InfoWindow(
        { 
            size: new google.maps.Size(550,200)
        });

        // A function to create the marker and set up the event window function 
        function createMarker(latlng, name, html) {
            var contentString = html;
            // create marker
            var marker = new google.maps.Marker({
                position: latlng,
                map: map,
                zIndex: Math.round(latlng.lat()*-100000)<<5
            });
            // capture the marker click event
            google.maps.event.addListener(marker, 'click', function() {
                // sey infowindow
                infowindow.setContent(contentString); 
                infowindow.open(map,marker);
            });
            // set marketer as clicked
            // google.maps.event.trigger(marker, 'click');    
            return marker;
        }
/*
        // set form data
        function set_form_latlng(latlng) { 
            $('#lat').val(latlng.lat());
            $('#lon').val(latlng.lng());
        }
*/

        function initialize() {
            // create the map
            var myOptions = {
                zoom: google_default.df_city_zoom,
                center: new google.maps.LatLng(google_default.df_city_lat,google_default.df_city_lon),
                mapTypeControl: true,
                mapTypeControlOptions: {style: google.maps.MapTypeControlStyle.DROPDOWN_MENU},
                navigationControl: google_default.df_navigationControl,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            }
            // create map
            map = new google.maps.Map(document.getElementById("map-canvas"), myOptions);
            // remove infowindow
            google.maps.event.addListener(map, 'click', function() {
                infowindow.close();
            });
            // capture the map click event
            google.maps.event.addListener(map, 'click', function(event) {
                //call function to create marker
                if (marker) {
                    marker.setMap(null);
                    marker = null;
                }
                // call marker creater
                marker = createMarker(event.latLng, "name", "<b>Location</b><br>"+event.latLng);
                google_default.set_form_latlng(event.latLng);
            });

        }
        // initialize 
        google.maps.event.addDomListener(window, 'load', initialize)

</script>
<div class="modal-header">
	<h3>Add a Hotel</h3>
</div>
<?php echo form_open(current_url()); ?>
<div class="modal-body">
    <div class="row">
    	<div class="col-md-4">
            <?php echo $custom_error; ?>  
            <div class="control-group">
                <label for="name">Name<span class="required">*</span></label> 
                <div class="controls">                              
                    <input id="name" name="name" type="text" value="<?php echo set_value('name'); ?>"  required maxlength="45"  />
                    <?php echo form_error('name','<div class="ci_error">','</div>'); ?>
                    <p class="help-block"></p>
                </div>
            </div>


            <div class="control-group">
                <label for="address">Address<span class="required">*</span></label> 
                <div class="controls">                              
                    <input id="address" name="address" type="text" value="<?php echo set_value('address'); ?>" required="required" maxlength="100"  />
                    <?php echo form_error('address','<div class="ci_error">','</div>'); ?>
                    <p class="help-block"></p>
                </div>
            </div>


            <div class="control-group">
                <label for="driver_id">Driver</label> 
                <div class="controls">                              
                    <!-- <input id="driver_id" name="driver_id" type="number" value="<?php echo set_value('driver_id'); ?>"  maxlength="11"  /> -->
                    <?php 
                        $CI->load->model('driver_model');
                        echo $CI->driver_model->get_as_dropdown('driver_id','',array('driver_id','last_name'),'Driver','');
                    ?>
                    <?php echo form_error('driver_id','<div class="ci_error">','</div>'); ?>
                    <p class="help-block"></p>
                </div>
            </div>


            <div class="control-group">
                <label for="town_id">Town</label> 
                <div class="controls">                              
                    <!-- <input id="town_id" name="town_id" type="number" value="<?php echo set_value('town_id'); ?>"  maxlength="11"  /> -->
                    <?php 
                        $CI->load->model('town_model');
                        echo $CI->town_model->get_as_dropdown('town_id','',array('town_id','name'),'Town','');
                    ?>
                    <?php echo form_error('town_id','<div class="ci_error">','</div>'); ?>
                    <p class="help-block"></p>
                </div>
            </div>


            <div class="control-group">
                <label for="lat">Lat</label> 
                <div class="controls">                              
                    <input readonly id="lat" name="lat" type="text" value="<?php echo set_value('lat'); ?>"  maxlength="15"  />
                    <?php echo form_error('lat','<div class="ci_error">','</div>'); ?>
                    <p class="help-block"></p>
                </div>
            </div>


            <div class="control-group">
                <label for="lon">Lon</label> 
                <div class="controls">                              
                    <input readonly id="lon" name="lon" type="text" value="<?php echo set_value('lon'); ?>"  maxlength="15"  />
                    <?php echo form_error('lon','<div class="ci_error">','</div>'); ?>
                    <p class="help-block"></p>
                </div>
            </div>


            <div class="control-group">
                <label for="rating">Rating</label> 
                <div class="controls">                              
                    <input id="rating" name="rating" type="text" value="<?php echo set_value('rating'); ?>"  maxlength="1"  />
                    <?php echo form_error('rating','<div class="ci_error">','</div>'); ?>
                    <p class="help-block"></p>
                </div>
            </div>


            <div class="control-group">
                <label for="room_available">Room available</label> 
                <div class="controls">                              
                    <input id="room_available" name="room_available" type="text" value="<?php echo set_value('room_available'); ?>"  maxlength="1"  />
                    <?php echo form_error('room_available','<div class="ci_error">','</div>'); ?>
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
                    <input type="hidden" name="image" id="image" value="<?php echo set_value('image',' ') ?>">
                </span>
                <span class="tooltipnew">*The photo you upload must be <b>160px</b> width and <b>110px</b> height</span><br/>
                <!-- Erro message -->
                <span class="tooltip_error" id='error_msg'></span><br/>
                <!-- Image preview -->
                <?php $image_path = 'upload/img/hotel/default.jpg'; ?>
                <img src="<?php echo base_url($image_path); ?>" width="200" id='image_pre'/>
            </div>
            <!-- /.control-group -->


        </div>
        <!-- /.end col-md-4 --> 
        <div class="col-md-7">
            <div id="map-canvas"></div>
        </div>
        <!-- /.end col-md-7 --> 
    </div>
    <!-- /.end row -->
</div>
<!-- ./modal-body -->
<div class="modal-footer">
	<div class="clearfix">
		<!-- footer left  -->
		<div class="pull-left">
			<?php echo form_submit( 'submit', 'Save','class="btn btn-primary"'); ?>
			<?php echo anchor((site_url('admin/hotel')) , 'Hotel list', array('class'=>'btn btn-default')); ?>		
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
                '//jquery-file-upload.appspot.com/' : '<?php echo site_url("admin/hotel/do_upload") ?>';
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
                $('#image_pre').attr('src', "<?php echo base_url('upload/img/hotel/default.jpg') ?>");
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
                var image_full_path = "<?php echo base_url('upload/img/hotel') ?>/"+e.image_name;
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
            $('#image_pre').attr('src', "<?php echo base_url('upload/img/hotel/default.jpg') ?>");
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

  <!--  <script src="<?php echo base_url() ?>asset/js/jqBootstrapValidation.js"></script> --> <!-- jqBootstrapValidation.js  -->
<script> 

// $(function() {
// 	// prettyPrint();
// 	$("input,textarea,select").jqBootstrapValidation(
// 	{
// 		preventSubmit: true,
// 		submitError: function($form, event, errors) {
// 		// Here I do nothing, but you could do something like display
// 		// the error messages to the user, log, etc.
//   },
//   submitSuccess: function($form, event) {
//    alert("OK");
// 			// event.preventDefault();
// 		},
// 		filter: function() {
// 			return $(this).is(":visible");
// 		}
// 	});
// 	$("a[data-toggle=\"tab\"]").click(function(e) {
// 		e.preventDefault();
// 		$(this).tab("show");
// 	});
// }); 

</script>



