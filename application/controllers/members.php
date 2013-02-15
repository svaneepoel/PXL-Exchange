<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Members extends CI_Controller {

	public function index()
	{
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->view('header');
		$this->load->view('members');
		$this->load->view('footer');
	}
	
	
}

?>