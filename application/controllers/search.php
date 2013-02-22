<?php

class search extends CI_Controller {

	public function index() {
		$this -> load -> helper('form');
		$this -> load -> view('header');
		$this -> load -> view('search');
		$this -> load -> view('footer');
	}
}