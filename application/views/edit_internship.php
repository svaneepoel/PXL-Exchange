<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&libraries=places"></script>
<script type="text/javascript">
	function initialize() {
		var mapOptions = {
			center : new google.maps.LatLng(50.930690, 5.332480),
			zoom : 10,
			mapTypeId : google.maps.MapTypeId.ROADMAP
		};
		var map = new google.maps.Map(document.getElementById('map_canvas'), mapOptions);

		var input = document.getElementById('searchTextField');
		var options = {
		};
		var autocomplete = new google.maps.places.Autocomplete(input, options);

		autocomplete.bindTo('bounds', map);

		var infowindow = new google.maps.InfoWindow();
		var marker = new google.maps.Marker({
			map : map
		});

		google.maps.event.addListener(autocomplete, 'place_changed', function() {
			infowindow.close();
			marker.setVisible(false);
			input.className = '';
			var place = autocomplete.getPlace();
			if (!place.geometry) {
				// Inform the user that the place was not found and return.
				input.className = 'notfound';
				return;
			}

			// If the place has a geometry, then present it on a map.
			if (place.geometry.viewport) {
				map.fitBounds(place.geometry.viewport);
			} else {
				map.setCenter(place.geometry.location);
				map.setZoom(17);
				// Why 17? Because it looks good.
			}
			var image = new google.maps.MarkerImage(place.icon, new google.maps.Size(71, 71), new google.maps.Point(0, 0), new google.maps.Point(17, 34), new google.maps.Size(35, 35));
			marker.setIcon(image);
			marker.setPosition(place.geometry.location);

			// CUSTOM PARTY LOCATOR
			document.getElementById('lat').value = place.geometry.location.Ya;
			document.getElementById('lng').value = place.geometry.location.Za;
			// END CUSTOM PARTY LOCATOR

			var address = '';
			if (place.address_components) {
				address = [(place.address_components[0] && place.address_components[0].short_name || ''), (place.address_components[1] && place.address_components[1].short_name || ''), (place.address_components[2] && place.address_components[2].short_name || '')].join(' ');
			}

			infowindow.setContent('<div><strong>' + place.name + '</strong><br>' + address);
			infowindow.open(map, marker);
		});

		// Sets a listener on a radio button to change the filter type on Places
		// Autocomplete.
		function setupClickListener(id, types) {
			var radioButton = document.getElementById(id);
			google.maps.event.addDomListener(radioButton, 'click', function() {
				autocomplete.setTypes(types);
			});
		}
		setupClickListener('changetype-all', []);
	}
	google.maps.event.addDomListener(window, 'load', initialize); 
</script>

<?php echo form_open('profile/internship', array(
		'class' => 'form-horizontal',
		'method' => 'post'
	));
 ?>
<fieldset>
	<div id="legend" class="">
		<legend class="">
			Edit internship details
		</legend>
	</div>
	<div class="control-group">
		<label class="control-label">Company name</label>
		<div class="controls">
			<input value="<?php echo $internship_details -> company_name; ?>" name="company_name" type="text" />
			<?php echo form_error('company_name'); ?>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label">Description</label>
		<div class="controls">
			<div class="textarea">
				<textarea name="description" class="span5" style="resize: vertical;"><?php echo $internship_details -> description; ?></textarea>												
				<?php echo form_error('description'); ?>

			</div>
		</div>
	</div>
	
	
	<div class="control-group">
		<label class="control-label">
			Location
		</label>
		<div class="controls">
			<input value="<?php echo $internship_details -> location; ?>" name="location" id="searchTextField" type="text" />
			<input type="hidden" id="lng" name="lng" />
			<input type="hidden" id="lat" name="lat" />
			<div id="map_canvas" style="margin-top:10px; height: 150px; border: width:100%; margin-right:20px;"></div>
			<?php echo form_error('location'); ?>
		</div>
	</div>

	<div class="control-group">
		<div class="controls">
			<button name="submit" type="submit" class="btn btn-success">
				Update internship details
			</button>
		</div>
	</div>

</fieldset>
<?php echo form_close(); ?>
