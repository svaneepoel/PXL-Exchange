<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->view('header');
		$this->load->view('login');
		$this->load->view('footer');
	}
	
	public function login_validation(){
	}
}

