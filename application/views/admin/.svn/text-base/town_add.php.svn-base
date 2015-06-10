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
	<h3>Add a Town</h3>
</div>
<?php echo form_open(current_url()); ?>
<div class="row">
	<div class="col-md-4">
		<div class="modal-body">

			<?php echo $custom_error; ?>

			<div class="control-group">
				<label for="name">Name<span class="required">*</span></label> 
				<div class="controls">                              
					<input id="name" name="name" type="text" value="<?php echo set_value('name'); ?>" required="required" maxlength="45"  />
					<?php echo form_error('name','<div class="ci_error">','</div>'); ?>
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

		</div><!-- modal-body -->
	</div><!-- col-md-4 -->
	<div class="col-md-7">
		<div id="map-canvas"></div> 
	</div><!-- col-md-7 -->


</div><!-- /row -->

<div class="modal-footer">
	<div class="clearfix">
		<!-- footer left  -->
		<div class="pull-left">
			<?php echo form_submit( 'submit', 'Save','class="btn btn-primary"'); ?>
			<?php echo anchor((site_url('admin/town')) , 'Town list', array('class'=>'btn btn-default')); ?>		
		</div>
		<!-- footer right  -->
		<div class="span4 pull-right"><?php echo anchor(site_url(), ' &copy; '. date('Y').' '.$site_name); ?></div>
	</div>
</div>
<?php echo form_close(); ?>

<br>

 