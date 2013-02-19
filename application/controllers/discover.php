<?php

class Discover extends CI_Controller {

	/*public function view($page = 'home') {

	 $this -> load -> library('googlemaps');

	 $config['center'] = '37.4419, -122.1419';
	 $config['zoom'] = 'auto';
	 $config['cluster'] = TRUE;

	 $this -> googlemaps -> initialize($config);

	 $marker = array();
	 $marker['position'] = '37.429, -122.1419';
	 $marker['title'] = "Dit is een test";
	 $this -> googlemaps -> add_marker($marker);

	 $data['map'] = $this -> googlemaps -> create_map();

	 $this -> load -> view('header');
	 $this -> load -> view('discover', $data);
	 $this -> load -> view('footer');
	 }*/

	public function view($page = 'home') {

		$this -> load -> library('googlemaps');

		$config['center'] = $this -> input -> post("test");
		$config['zoom'] = 'auto';
		$config['cluster'] = TRUE;
		$config['places'] = TRUE;
		$config['placesAutocompleteInputID'] = 'myPlaceTextBox';
		$config['placesAutocompleteBoundsMap'] = TRUE;
		$this -> googlemaps -> initialize($config);

		

		$data['map'] = $this -> googlemaps -> create_map();
		$this -> load -> view('header');
		$this -> load -> view('discover', $data);
		$this -> load -> view('footer');

	}
	
	public function addmarkers($page = 'home') {
		$this -> load -> library('googlemaps');
		$config['zoom'] = '3';
		$config['cluster'] = TRUE;
		$config['center'] = "belgium";
		$this -> googlemaps -> initialize($config);
		
		// BEGIN MARKERS - Alle markers uit database halen en toevoegen aan de kaart
		$query = $this -> db -> query('SELECT latitude, longitude, information FROM `points`');
		foreach ($query->result_array() as $row) {
			$latitude = $row['latitude'];
			$longitude = $row['longitude'];
			$marker = array();
			$marker['position'] = $latitude . " , " . $longitude;
			$marker['draggable'] = TRUE;
			$marker['animation'] = 'DROP';
			$marker['infowindow_content'] = $row['information'];
			$this -> googlemaps -> add_marker($marker);
		}
		// END MARKERS
		$data['map'] = $this -> googlemaps -> create_map();
		$this -> load -> view('header');
		$this -> load -> view('discover', $data);
		$this -> load -> view('footer');
		}

}
