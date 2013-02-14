<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {

	public function Main(){
		parent::__construct();
		parse_str( $_SERVER['QUERY_STRING'], $_REQUEST );
		//$CI = & get_instance();
        //$CI->config->load("facebook",TRUE);
        $this->config->load('facebook', TRUE);
		$fbConfig = $this->config->item('facebook');
		$this->load->library('Facebook', $fbConfig);
		
		$this->load->helper('url');
        //$config = $CI->config->item('facebook');
        //$this->load->library('Facebook', $config);
	}
	
	public function logout(){
		session_destroy();
	}
	
	public function login(){
	}

	public function index(){
	
	//Test
		// Try to get the user's id on Facebook
		$userId = $this->facebook->getUser();
		// If user is not yet authenticated, the id will be zero
		var_dump($userId);
		if($userId == 0){
			// Generate a login url
			echo "Uitgelogd";
			$data['url'] = $this->facebook->getLoginUrl(array('scope'=>'email')); 
			$this->load->view('main_index', $data);
		} else {
			// Get user's data and print it
			echo "Ingelogd";	
			$data['url'] = $this->facebook->getLogoutUrl(array('next'=>base_url('main/logout')));
			$user = $this->facebook->api('/me');
			$this->load->view('main_index', $data);
		}
	}

}

?>