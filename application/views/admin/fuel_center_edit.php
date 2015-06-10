<?php $CI = get_instance(); ?>
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
        // google.maps.event.trigger(marker, 'click');    
        return marker;
    }

/*    // set form data
    function set_form_latlng(latlng) { 
        $('#lat').val(latlng.lat());
        $('#lon').val(latlng.lng());
    }*/


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
            marker = createMarker(event.latLng, "name", "<b><?php echo $result->name ?></b><br>"+event.latLng);
            google_default.set_form_latlng(event.latLng);
        });
        // set data baset location
        var set_latlng = new google.maps.LatLng(<?php echo $result->lat ?>,<?php echo $result->lon ?>),
        marker = createMarker(set_latlng, "name", "<b><?php echo $result->name ?></b><br>");

    }
    // initialize 
    google.maps.event.addDomListener(window, 'load', initialize)

</script>
<div class="modal-header">
	<h3>Edit Fuel center</h3>
</div>
<?php echo form_open(current_url()); ?>
<div class="modal-body"> 
	<div class="row">
		<div class="col-md-4">
			<!-- <h2>Fuel_center</h2> --> 
			<?php echo $custom_error; ?>

			<input type="hidden" value="<?php echo $result->fuel_center_id; ?>" id="fuel_center_id" name="fuel_center_id">

			<div class="control-group">
				<label class="control-label" for="town_id">Town<span class="required">*</span></label>                                
				<div class="controls">
					<!-- <input id="town_id" name="town_id" type="number" value="<?php echo $result->town_id ?>" required="required" maxlength="11" /> -->
					<?php 
						$CI->load->model('town_model');
						echo $CI->town_model->get_as_dropdown('town_id',$result->town_id,array('town_id','name'),'Town','');
					?>
					<?php echo form_error('town_id','<div class="ci_error">','</div>'); ?>
					<p class="help-block"></p>
				</div>
			</div>


			<div class="control-group">
				<label class="control-label" for="name">Name</label>                                
				<div class="controls">
					<input id="name" name="name" type="text" value="<?php echo $result->name ?>"  maxlength="45" />
					<?php echo form_error('name','<div class="ci_error">','</div>'); ?>
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

<!-- 
			<div class="control-group">
				<label class="control-label" for="d_reject">D reject</label>                                
				<div class="controls">
					<input id="d_reject" name="d_reject" type="text" value="<?php echo $result->d_reject ?>"  maxlength="1" />
					<?php echo form_error('d_reject','<div class="ci_error">','</div>'); ?>
					<p class="help-block"></p>
				</div>
			</div> -->


			<p><label for="note">Note</label>                                
				<textarea id="note" name="note" ><?php echo $result->note ?></textarea>
				<?php echo form_error('note','<div class="ci_error">','</div>'); ?>
			</p> 
		</div>
		<!-- /.end col-md-4 -->
		<div class="col-md-6">
			<div id="map-canvas"></div>
		</div>
		<!-- /.end col-md-6 -->
	</div>
	<!-- ./row -->
</div>
<!-- ./modal-body -->
<div class="modal-footer">
	<div class="clearfix">
		<div class="pull-left">
			<?php echo form_submit( 'submit', 'Save','class="btn btn-primary"'); ?>
			<?php echo anchor((site_url('admin/fuel_center')) , 'Fuel center list', array('class'=>'btn btn-default')); ?>
		</div>
		<div class="span4 pull-right"><?php echo anchor(site_url(), ' &copy; '. date('Y').' '.$site_name); ?></div>
	</div>
</div>
<?php echo form_close(); ?>

<script src="<?php echo base_url() ?>asset/js/jquery-1.9.1.js"></script> <!-- jquery  -->
<script src="<?php echo base_url() ?>asset/js/jqBootstrapValidation.js"></script> <!-- jqBootstrapValidation.js  -->
<script> 

$(function() {
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
}); 

</script>
