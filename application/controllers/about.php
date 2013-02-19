<?php

class About extends CI_Controller {
	public function view($page = 'about') {
		$this -> load -> view('header');
		$this -> load -> view('about');
		$this -> load -> view('footer');

		/*if ((isset($_POST['name']) && isset($_POST['email']) && isset($_POST['message']))){
		 echo $_POST['name'];
		 //echo $this -> input -> post("name");

		 }*/

		if (isset($_POST['submit'])) {
			$this->load->library('email');
			$email = $this -> input -> post("emailadres");
			$name = $this -> input -> post("naam");
			$message = $this -> input -> post("bericht");
			
			$this -> email -> from($email, $name);
			$this -> email -> to('svaneepoel@gmail.com');
			if (isset($_POST['copyemail'])) {
				$this -> email -> cc($email);
			}

			$this -> email -> subject('Contactform PHL Exchange');
			$this -> email -> message($name .' sent you the following email: '.$message);

			$this -> email -> send();

			//echo $this -> email -> print_debugger();
		}
	}

}
