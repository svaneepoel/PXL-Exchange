<?php

class Pages extends CI_Controller {

	public function view($page = 'home') {

		$this -> load -> library('googlemaps');

		$config['center'] = '37.4419, -122.1419';
		$config['zoom'] = 'auto';
		$config['cluster'] = TRUE;
		$this -> googlemaps -> initialize($config);

		$marker = array();
		$marker['position'] = '37.429, -122.1419';
		$marker['title'] = "Dit is een test";
		$marker['cursor'] = base_url() . 'assets/Lion1.cur';
		$marker['icon'] = 'http://yovogan.free.fr/memes/problem.jpg';
		$this -> googlemaps -> add_marker($marker);

		

		$data['map'] = $this -> googlemaps -> create_map();

		$this -> load -> view('header');
		$this -> load -> view('maps', $data);
		$this -> load -> view('footer');
	}
	
	public function home(){
		$this->load->view('header');
		$this->load->view('home');
		$this->load->view('footer');
		
	}

}
