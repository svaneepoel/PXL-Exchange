<?php

class Discover extends CI_Controller {

	public function index() {
		$center = $this->input->post("test");
		if(!$center){
			$center = 'Belgium';
		}
		
		$this -> load -> library('googlemaps');
		$config['center'] = $center;
		//$config['zoom'] = 'auto';
		$config['cluster'] = TRUE;
		$config['places'] = TRUE;
		$config['placesAutocompleteInputID'] = 'myPlaceTextBox';
		$config['placesAutocompleteBoundsMap'] = TRUE;
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
		$this -> load -> view('header', array('no_div'=>true));
		$this -> load -> view('discover', $data);
		$this -> load -> view('footer', array('no_div'=>true));

	}
	
	public function addmarkers($page = 'home') {
		$this -> load -> library('googlemaps');
		$config['zoom'] = '3';
		$config['cluster'] = TRUE;
		$config['center'] = "Belgium";
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
		$this -> load -> view('header', array('no_div'=>true));
		$this -> load -> view('discover', $data);
		$this -> load -> view('footer',array('no_div'=>true));
		}

}
