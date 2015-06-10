<!-- google map -->
<style type="text/css">
html { height: 100% }
body { height: 100%; margin: 0; padding: 0 }
#map-canvas { height: 288px; }
</style>
<script src="<?php echo base_url() ?>asset/js/jquery-1.9.1.js"></script> <!-- jquery  -->
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
            google.maps.event.trigger(marker, 'click');    
            return marker;
        }
 

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
            // google.maps.event.addListener(map, 'click', function() {
            //     infowindow.close();
            // });
            // // capture the map click event
            // google.maps.event.addListener(map, 'click', function(event) {
            //     //call function to create marker
            //     if (marker) {
            //         marker.setMap(null);
            //         marker = null;
            //     }
            //     // call marker creater
            //     marker = createMarker(event.latLng, "name", "<b><?php // echo $result->name ?></b><br>"+event.latLng);
            //     // set_form_latlng(event.latLng)
            // });
            // set data baset location
            var set_latlng = new google.maps.LatLng(<?php echo $result->lat ?>,<?php echo $result->lon ?>),
            marker = createMarker(set_latlng, "name", "<b><?php echo $result->register_no ?></b><br>");

        }
        // initialize 
        google.maps.event.addDomListener(window, 'load', initialize)

</script>
<div class="modal-header">
	<h3>View Vehicle log </h3>
</div>
<div class="modal-body">
    <div class="row">
        <div id="map-canvas"></div>
    </div>
    
	<table class="table ">
		
        <tr>
            <td><label>Vehicle</label></td>
            <td><label><?php echo anchor(site_url('admin/vehicle/view/'.$result->vehicle_id), $result->register_no); ?></label></td>
        </tr>

        <tr>
            <td><label>Driver</label></td>
            <td><label><?php echo anchor(site_url('admin/driver/view/'.$result->driver_id), $result->driver_name); ?></label></td>
        </tr>


        <tr>
            <td><label>Nearest Town</label></td>
            <td><label><?php echo anchor(site_url('admin/town/view/'.$result->town_id), $result->town_name); ?></label></td>
        </tr>

        <tr>
            <td><label>Vehicle status</label></td>
            <td><label><?php echo anchor(site_url('admin/vehicle_status'), $result->vehicle_status); ?></label></td>
        </tr>

        <tr>
            <td><label>Lat</label></td>
            <td><label><?php echo $result->lat ?></label></td>
        </tr>

        <tr>
            <td><label>Lon</label></td>
            <td><label><?php echo $result->lon ?></label></td>
        </tr>
    </table>

</div>
<div class="modal-footer" class="clearfix">
	<!-- left footer -->
	<div class="pull-left">
		<?php echo anchor((site_url('admin/vehicle_log'.'/edit/'.$result->vehicle_log_id))  , "Edit", array('class'=>'btn btn-primary')); ?>
		<?php echo anchor((site_url('admin/vehicle_log')) , 'Vehicle log list', array('class'=>'btn btn-default')); ?>
	</div>
	<!-- right footer  -->
	<div class="span4 pull-right"><?php echo anchor(site_url(), ' &copy; '. date('Y').' '.$site_name); ?></div>
</div>
