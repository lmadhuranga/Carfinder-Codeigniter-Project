<?php $CI = get_instance(); ?>
<title><?php echo $meta_title ?></title>
<!-- google map -->
<style type="text/css">
html { height: 100% }
body { height: 100%; margin: 0; padding: 0 }
#map-canvas { height: 50%; }
</style>
<!--  -->
<script src="<?php echo base_url('asset/js/jquery-1.9.1.js') ?>"></script> <!-- jquery  -->

<link rel="stylesheet" href="<?php echo base_url('asset/css/bootstrap.css') ?>">
<script src="<?php echo base_url('asset/js/google.setting.js') ?>"></script> <!-- google default settings  -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAWhbMzbzbPkroxqoqE1moK0RzJJPUcmf4">
</script>
<script type="text/javascript">
    // console.log(google_default.df_city_lon);
    // center: new google.maps.LatLng(google_default.df_city_lat,google_default.df_city_lon),

        // global "map" variable
        var map = null;
        var marker = null;
        // icon folder locaiton
        var iconBase = '<?php echo(base_url("upload/img/vehicle_status")); ?>';
 

        // infowindow intialize
        var infowindow = new google.maps.InfoWindow(
        { 
            size: new google.maps.Size(550,200)
        });

        // A function to create the marker and set up the event window function 
        function createMarker(latlng, name, html, other) {
            var contentString = html;
            // create marker
            var marker = new google.maps.Marker({
                position: new google.maps.LatLng(latlng.lat, latlng.lon),
                icon: other.icon,
                map: map,
                //zIndex: Math.round(latlng.lat()*-100000)<<5
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
                center: new google.maps.LatLng(google_default.df_city_lat, google_default.df_city_lon),
                mapTypeControl: true,
                mapTypeControlOptions: {style: google.maps.MapTypeControlStyle.DROPDOWN_MENU},
                navigationControl: google_default.df_navigationControl,
                mapTypeId: google.maps.MapTypeId.ROADMAP
 
            }
            
            // create map
            map = new google.maps.Map(document.getElementById("map-canvas"), myOptions);

            // get data base locaitons
            vehicle_details = '<?php echo json_encode($result); ?>';
            // convert to json object
            vehicle_details = $.parseJSON(vehicle_details);
            // formaitng to map object
            for (var i = vehicle_details.length - 1; i >= 0; i--) {
                // set lat lon
                latlon = {lat:vehicle_details[i].lat, lon:vehicle_details[i].lon}
                // set location name set
                name = vehicle_details[i].register_no;
                // set html content
                html = 'V no :<a href="<?php echo(site_url('admin/vehicle/view')); ?>/'+vehicle_details[i].vehicle_id+'">'+vehicle_details[i].register_no+'</a>'+
                '<br><small>Driver : <a href="<?php echo(site_url('admin/driver/view')); ?>/'+vehicle_details[i].driver_id+'">'+vehicle_details[i].driver_name+'</a></small>';
                // set icon ,
                other = {
                    icon:iconBase+'/'+vehicle_details[i].vehicle_status_image
                } 
                // create markers 
                createMarker(latlon,name,html,other);
            };
  
        }
        // initialize 
        google.maps.event.addDomListener(window, 'load', initialize)

</script>

<div class="row">
    <div id="map-canvas"></div>
</div>
 
<div class="container">
    <hr>
    <h4>Vehicle status description</h4>
    <div class="row">
       <div class="status_decription_legend">
           <?php  
               // tabel generateor
                $CI->load->library('table');
                $tmpl = array ( 'table_open'  => '<table id="status_decription_table" class="table table-hover table-bordered" width="100%">' );
                $CI->table->set_template($tmpl);

                $CI->table->set_heading(array('#', 'Vehicle', 'Driver','Status'));
                foreach ($result as $key => $value) {
                    // add row
                    $CI->table->add_row(array(++$key, anchor(site_url('admin/vehicle/view'.$value['vehicle_id']), $value['register_no'], ''),
                                             anchor(site_url('admin/driver/view'.$value['driver_id']),$value['driver_name'], '')
                                             , $value['vehicle_status'])); 
                } 
                echo $CI->table->generate(); 
            ?>
       </div>
    </div> <!-- row -->
    
    <?php echo anchor((site_url('admin/dashboard')) , 'Home', array('class'=>'btn btn-default')); ?>
</div> <!-- container -->

 