<section class="wrapper-lg">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-4">
                    <h3>Contact data</h3>
                    <div class="well">
                        <p><i class="fa fa-map-marker"></i> No 230/1, Kahanawita, Dehiowita</p>
                        <p><i class="fa fa-phone"></i> +94 71 83 53 571</p>
                        <p><i class="fa fa-envelope"></i> senadheerataxi@gmail.com</p>
                        <hr>
                        <p>
                            <!-- logo in footer -->
                            <ul class="social-networks">
                                <li><a class="btn btn-twitter" href="#link"><i class="fa fa-fw fa-twitter"></i></a></li>
                                <li><a class="btn btn-facebook" href="https://www.facebook.com/senadheerataxi/"><i class="fa fa-fw fa-facebook"></i></a></li>
                                <li><a class="btn btn-google-plus" href="#link"><i class="fa fa-fw fa-google-plus"></i></a></li>
                                <!-- <li><a class="btn btn-linkedin" href="#link"><i class="fa fa-fw fa-linkedin"></i></a></li> -->
                                <!-- <li><a class="btn btn-youtube" href="#link"><i class="fa fa-fw fa-youtube"></i></a></li> -->
                            </ul>
                        </p>
                    </div><!-- /.well -->
                </div><!-- /.col -->
                <!-- Contact us form -->
                <div class="col-sm-12 col-md-4">
                    <h3>Contact by email</h3>
                    <form role="form" action="<?php echo site_url('home/send_email') ?>">
                        <div class="form-group">
                            <label for="exmaple-contact-email" name='email'>Email address</label>
                            <input type="email" class="form-control" class="form-control" id="exmaple-contact-email" placeholder="Enter email">
                        </div>
                        <div class="form-group">
                            <label for="example-contact-name">Name</label>
                            <input type="text" class="form-control"  name='name' id="example-contact-name" placeholder="Your name">
                        </div>
                        <div class="form-group">
                            <label for="example-contact-message">Message</label>
                            <textarea id="example-contact-message"  name='massage' class="form-control" rows="5"></textarea>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox"> Send me a copy
                            </label>
                        </div>
                        <button type="submit" class="btn btn-primary">Send Message</button>
                    </form>
                </div><!-- /.col -->
                <div class="col-sm-12 col-md-4">
                    <h3>Find us on the map</h3>
                    <div class="padding-sm widget-dashed">
                        <div class="embed-wrapper">
                            <div width="425px" height="350px" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"  id="map_contactus"></div>
                        </div>
                    </div>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </section>

<script src="<?php echo base_url('asset/js/jquery-1.9.1.js')?>"></script> <!-- google map default settings -->
<script>
    jQuery(document).ready(function($) {
        $('#map_contactus').css({
            height: '300px'
        });
    });
</script>
    <script src="<?php echo base_url('asset/js/google.setting.js')?>"></script> <!-- google map default settings -->
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
                center: new google.maps.LatLng(6.9667097,80.278844),
                mapTypeControl: true,
                mapTypeControlOptions: {style: google.maps.MapTypeControlStyle.DROPDOWN_MENU},
                navigationControl: google_default.df_navigationControl,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            }
            // create map
            map = new google.maps.Map(document.getElementById("map_contactus"), myOptions);
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
                // marker = createMarker(event.latLng, "name", "Dehiowita");
                // google_default.set_form_latlng(event.latLng);
            });
            // set data baset location
            var set_latlng = new google.maps.LatLng(6.9667097,80.278844),
            marker = createMarker(set_latlng, "name", "Dehiowita");

        }
        // initialize 
        google.maps.event.addDomListener(window, 'load', initialize)

</script>
