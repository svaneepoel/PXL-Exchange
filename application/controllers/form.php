<?php

class Form extends CI_Controller {

	function index() {

		$this -> load -> helper(array('form', 'url'));

		$this -> load -> library('form_validation');

		$this -> form_validation -> set_rules('name', 'Name', 'trim|required|min_length[5]|max_length[12]');
		$this -> form_validation -> set_rules('email', 'Email', 'trim|required|valid_email');
		$this -> form_validation -> set_rules('message', 'Message', 'required');
		$this -> form_validation -> set_error_delimiters('<div class="label label-important">', '</div>');
		
		if ($this -> form_validation -> run() == FALSE) {
			$this -> load -> view('header');
			$this -> load -> view('about');
			$this -> load -> view('footer');
		} else {
			$this -> load -> view('formsuccess');
		}
	}

}
?>