<?php

class Login extends CI_Controller {

	/**
	 * Login page
	 */
	public function index() {
		$this -> load -> helper('form');
		$this -> load -> library('form_validation');
		$this -> load -> view('header');
		$this -> load -> view('login');
		$this -> load -> view('footer');
	}

	/**
	 * Signup page
	 */
	public function signup() {
		$this -> load -> view('header');
		$this -> load -> view('signup');
		$this -> load -> view('footer');
	}

	/**
	 * Validation of the login page
	 */
	public function login_validation() {
		$this -> load -> library('form_validation');

		$this -> form_validation -> set_rules('email', 'Email', 'required|trim|xss_clean|callback_validate_credentials');
		$this -> form_validation -> set_rules('password', 'Password', 'required|md5|trim');

		if ($this -> form_validation -> run()) {
			$data = array(
				'email' => $this -> input -> post('email'),
				'is_logged_in' => 1
			);

			$this -> session -> set_userdata($data);
			redirect('profile');
		} else {
			$this -> load -> view('header');
			$this -> load -> view('login');
			$this -> load -> view('footer');
		}
	}

	/**
	 * Validation of the signup page
	 */
	public function signup_validation() {
		$this -> load -> view('header');
		$this -> load -> library('form_validation');
		$this -> load -> model('model_users');

		$this -> form_validation -> set_rules('vnaam', 'First name', 'required|trim');
		$this -> form_validation -> set_rules('anaam', 'First name', 'required|trim');
		$this -> form_validation -> set_rules('email', 'Email', 'required|trim|valid_email|is_unique[users.email]');
		$this -> form_validation -> set_rules('password', 'Password', 'required|trim');
		$this -> form_validation -> set_rules('cpassword', 'Confirm Password', 'required|trim|matches[password]');
		$this -> form_validation -> set_message('is_unique', "That email address already exists.");

		if ($this -> form_validation -> run()) {
			$uid = $this -> model_users -> add_user();
			if ($uid !== false) {
				$this -> output -> append_output("<div class='alert alert-success'>Thank you for signing up, you'll receive an email when your account has been enabled.</div>");
			} else
				$this -> output -> append_output("<div class='alert alert-error'>Something went wrong while creating your user account.</div>");
		} else {

			$this -> load -> view('signup');
		}
		$this -> load -> view('footer');
	}

	/**
	 * Check if the credentials are correct
	 */
	public function validate_credentials() {
		$this -> load -> model('model_users');
		$result = $this -> model_users -> can_log_in();
		if ($result !== FALSE) {
			$this -> session -> set_userdata('user_id', $result);
			return true;
		} else {
			$this -> form_validation -> set_message('validate_credentials', 'Incorrect username/password, or your account hasn\'t been enabled yet.');
			return false;
		}
	}

	/**
	 * Login with Facebook
	 */
	public function facebook() {
		parse_str($_SERVER['QUERY_STRING'], $_REQUEST);
		$this -> config -> load('facebook', TRUE);
		$fbConfig = $this -> config -> item('facebook');
		$this -> load -> library('Facebook', $fbConfig);

		// Request uid from Facebook
		$userId = $this -> facebook -> getUser();

		// If userId equals zero, the user didn't connect to our Facebook application or he isn't logged in.
		// We'll redirect them to Facebook to authenticate
		if ($userId == 0) {
			$url = $this -> facebook -> getLoginUrl(array('scope' => 'email'));
			redirect($url);
		} else {
			// This will get the user details
			$user = $this -> facebook -> api('/me');
			$email = $user['email'];
			$this -> load -> model('model_users');

			// Use our model function to check if the email matches with an existing user in our database.
			// If so, login the user and set the session. At the end redirect them to the profile page
			$result = $this -> model_users -> login_by_facebook($email);
			if ($result !== FALSE) {
				$data = array(
					'email' => $this -> input -> post('email'),
					'is_logged_in' => 1,
					'user_id' => $result
				);
				$this -> session -> set_userdata($data);
				redirect('profile');
			} else {
				$this -> load -> view('header');
				$this -> output -> append_output('<div class="alert alert-error">Your Facebook email is\'nt connected to an account in our database or your account isn\'t enabled yet. Login failed.</div>');
				$this -> load -> view('login');
				$this -> load -> view('footer');
			}
		}
	}

	/**
	 * Logout function
	 *
	 * Destroys the session
	 */
	public function logout() {
		$this -> session -> sess_destroy();
		redirect('page/home');
	}

}
