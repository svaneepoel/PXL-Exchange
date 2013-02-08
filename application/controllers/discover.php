<?php

class Discover extends CI_Controller {

	public function view($page = 'home') {

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
	}

}
