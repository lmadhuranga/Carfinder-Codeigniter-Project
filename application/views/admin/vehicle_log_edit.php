<?php $CI = get_instance(); ?>
<!-- google map -->
<style type="text/css">
html { height: 100% }
body { height: 100%; margin: 0; padding: 0 }
#map-canvas { height: 288px; }
</style>
 
<script src="<?php echo base_url() ?>asset/js/google.setting.js"></script> <!-- google default settings  -->
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

/*    // set form data
    function set_form_latlng(latlng) { 
        $('#lat').val(latlng.lat());
        $('#lon').val(latlng.lng());
    }
*/

    function initialize() {
        // create the map
        var myOptions = {
            zoom: google_default.df_city_zoom,
            center: new google.maps.LatLng(<?php echo $result->lat ?>,<?php echo $result->lon ?>),
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
            marker = createMarker(event.latLng, "name", "<b>ddd</b><br>"+event.latLng);
            google_default.set_form_latlng(event.latLng);
        });
        // set data baset location
        var set_latlng = new google.maps.LatLng(<?php echo $result->lat ?>,<?php echo $result->lon ?>),
        marker = createMarker(set_latlng, "name", "<b>ddd</b><br>");

    }
    // initialize 
    google.maps.event.addDomListener(window, 'load', initialize)

</script>

<div class="modal-header">
	<h3>Edit Vehicle log</h3>
</div>
<?php echo form_open(current_url()); ?>
<div class="modal-body">

	<!-- <h2>Vehicle_log</h2> -->
    <div class="row">
        <div class="col-md-12">
            <div id="map-canvas"></div>
        </div>
    </div>
    <hr>
	<?php echo $custom_error; ?>

    <input type="hidden" value="<?php echo $result->vehicle_log_id; ?>" id="vehicle_log_id" name="vehicle_log_id">
    <div class="row">
        <div class="col-md-8">
        
            <div class="control-group">
                <label class="control-label" for="vehicle_id">Vehicle</label>                                
                <div class="controls">
                    <?php 
                        $CI->load->model('vehicle_model');
                        echo $CI->vehicle_model->get_as_dropdown('vehicle_id',$result->vehicle_id ,array('vehicle_id','register_no'),'vehicle','');
                    ?>
                    <?php echo form_error('vehicle_id','<div class="ci_error">','</div>'); ?>
                    <p class="help-block"></p>
                </div>
            </div>


            <div class="control-group">
                <label class="control-label" for="driver_id">Driver</label>                                
                <div class="controls">
                    <?php 
                        $CI->load->model('driver_model');
                        echo $CI->driver_model->get_as_dropdown('driver_id',$result->driver_id ,array('driver_id','first_name'),'Driver','');
                    ?>
                    <?php echo form_error('driver_id','<div class="ci_error">','</div>'); ?>
                    <p class="help-block"></p>
                </div>
            </div>

            <div class="control-group">
                <label for="town_id">Nearest Town<span class="required">*</span></label> 
                <div class="controls"> 
                    <?php 
                        $CI->load->model('town_model');
                        echo $CI->town_model->get_as_dropdown('town_id',$result->town_id,array('town_id','name'),'Town','');
                    ?>
                    <?php echo form_error('town_id','<div class="ci_error">','</div>'); ?>
                    <p class="help-block"></p>
                </div>
            </div>



            <div class="control-group">
                <label class="control-label" for="vehicle_status_id">Vehicle status</label>                                
                <div class="controls">
                    <?php 
                        $CI->load->model('vehicle_status_model');
                        echo $CI->vehicle_status_model->get_as_dropdown('vehicle_status_id',$result->vehicle_status_id ,array('vehicle_status_id','status'),'Vehicle status','');
                    ?>
                    <?php echo form_error('vehicle_status_id','<div class="ci_error">','</div>'); ?>
                    <p class="help-block"></p>
                </div>
            </div>


            <div class="control-group">
                <label class="control-label" for="lat">Lat</label>                                
                <div class="controls">
                    <input readonly id="lat" name="lat" type="text" value="<?php echo $result->lat ?>"  maxlength="15" />
                    <?php echo form_error('lat','<div class="ci_error">','</div>'); ?>
                    <p class="help-block"></p>
                </div>
            </div>


            <div class="control-group">
                <label class="control-label" for="lon">Lon</label>                                
                <div class="controls">
                    <input readonly id="lon" name="lon" type="text" value="<?php echo $result->lon ?>"  maxlength="15" />
                    <?php echo form_error('lon','<div class="ci_error">','</div>'); ?>
                    <p class="help-block"></p>
                </div>
            </div>
        </div> <!--  col-md-4 -->
    </div>



    </div>
    <div class="modal-footer">
        <div class="clearfix">
            <div class="pull-left">
                <?php echo form_submit( 'submit', 'Save','class="btn btn-primary"'); ?>
                <?php echo anchor((site_url('admin/vehicle_log')) , 'Vehicle log list', array('class'=>'btn btn-default')); ?>
            </div>
            <div class="span4 pull-right"><?php echo anchor(site_url(), ' &copy; '. date('Y').' '.$site_name); ?></div>
        </div>
    </div>
<?php echo form_close(); ?> 