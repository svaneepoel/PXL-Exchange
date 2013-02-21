<?php

class Poi extends CI_Controller {

	public function index() {
		$this -> load -> library('googlemaps');

		$config['center'] = '37.4419, -122.1419';
		$config['zoom'] = 'auto';
		$config['onclick'] = 'createMarker({ map: map, position:event.latLng });';
		$this -> googlemaps -> initialize($config);

		$marker = array();
		$marker['position'] = '37.429, -122.1419';
		$marker['draggable'] = true;
		
		$marker['ondragend'] = 'updateDatabase(event.latLng.lat(), event.latLng.lng());';
		$this -> googlemaps -> add_marker($marker);

		$data['map'] = $this -> googlemaps -> create_map();

		$this -> load -> view('poi', $data);

	}
	public function update() {
	}

}
