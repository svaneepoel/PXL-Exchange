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
	
	public function signup(){
		$this->load->view('signup');
	}
		
	public function members(){
		if($this->session->userdata('is_logged_in')){
		$this->load->view('members');
	} else {
		redirect('login/restricted');
		}
	}
	
	public function restricted(){
		$this->load->view('restricted');
		}
	
	public function login_validation(){
		
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('email', 'Email', 'required|trim|xss_clean|callback_validate_credentials');
		$this->form_validation->set_rules('password', 'Password', 'required|md5|trim');

		if($this->form_validation->run()){
			$data = array(
				'email' => $this->input->post('email'),
				'is_logged_in' => 1
			);

			$this->session->set_userdata($data);
			redirect('login/members');
			} else {
			$this->load->view('login');
		}
	}
	
	public function signup_validation(){
	
	$this->load->library('form_validation');
	
	$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[users.email]');
	$this->form_validation->set_rules('password', 'Password', 'required|trim');
	$this->form_validation->set_rules('cpassword', 'Confirm Password', 'required|trim|matches[password]');
	
	$this->form_validation->set_message('is_unique', "That email address already exists.");
	
	if ($this->form_validation->run()){
		//generate random key + send user an email with an activation link + add them to temp_users db
		//key
		$key=md5(uniqid());
		
		$this->load->library('email', array('mailtype'=>'html'));
		$this->Load->model('model_users');
		
		$this->email->from('signup@phl.be', "PHL Exchange");
		$this->email->to($this->input->post('email'));
		$this->email->subject('Confirm your account at PHL Exchange');
		
		$message = "<p> Thank you for signing up. </p>";
		$message .= "<p><a href='".base_url()."login/register_user/$key' > Click Here </a> to confirm your account</p>";
		
		$this->email->message($message);
		if($this->model_users->add_temp_user($key)){
			if($this->email->send()){
				echo "The email has been sent";
				} else echo "The email failed";
			} else echo "User not added to database";
			
			//add users to database after they subscribed.
			
		} else {
	
			$this->load->view('signup');
		}
	}
	public function validate_credentials(){
	
		$this->load->model('model_users');
		
		if($this->model_users->can_log_in()){
			return true;
		} else {
		
			$this -> form_validation->set_message('validate_credentials', 'Incorrect username/password');
			return false;
		}
	}
	
	public function logout(){
		$this->session->sess_destroy();
		redirect('login/login');
		}
}


