<?php

class Search extends CI_Controller {

	public function index() {
		$this -> load -> model('model_users');
		$this -> load -> model('model_points');
		$this -> load -> library('form_validation');
		//if ($this -> form_validation -> run()) {
			
		/*$searchword = $this->input->post("search");
			echo $searchword;
		foreach ($this -> model_users -> get_searchusers($searchword) as $row) {
				
			$vnaam = $row['vnaam'];
			$anaam = $row['anaam'];
			echo $vnaam;
		}
		//}*/
		
		$this -> load -> helper('form');
		$this -> load -> view('header');
		$this -> load -> view('search');
		$this -> load -> view('footer');
	}
}