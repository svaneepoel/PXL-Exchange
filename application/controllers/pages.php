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
		
		$this -> load -> library('googlemaps');

		$config['center'] = '37.4419, -122.1419';
		$config['map_height'] = '200px';
		$this -> googlemaps -> initialize($config);		

		$data['map'] = $this -> googlemaps -> create_map();
		$this->load->view('header', $data);
		$this->load->view('home');
		$this->load->view('footer');
		
	}
	
	public function error_404(){
		$html = '<div style="text-align:center;"><h1 style="font-size:36pt; font-weight:normal;">Uh oh! It\'s empty here</h1><br/><p class="lead">The requested page could not be found.</p></div>';
		
		$this->load->view('header');
		$this->output->append_output($html);
		$this->load->view('footer');
	}

}
