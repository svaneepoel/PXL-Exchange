<?php

class Pages extends CI_Controller {

	public function about() {
		$_SESSION['menukey'] = 'info';
		$this -> load -> library('form_validation');

		$this -> form_validation -> set_rules('name', 'Name', 'trim|required');
		$this -> form_validation -> set_rules('email', 'Email', 'trim|required|valid_email');
		$this -> form_validation -> set_rules('message', 'Message', 'required');
		$this -> form_validation -> set_error_delimiters('<div class="label label-important">', '</div>');

		if ($this -> form_validation -> run() == FALSE) {
			$this -> load -> view('header');
			$this -> load -> view('about');
			$this -> load -> view('footer');
		} else {
			$this -> load -> view('header');
			$this -> output -> append_output("<div class='alert alert-success'>We'll contact you as soon as possible!</div>");
			$this -> load -> view('about');
			$this -> load -> view('footer');

			$this -> load -> library('email');
			$email = $this -> input -> post("email");
			$name = $this -> input -> post("name");
			$message = $this -> input -> post("message");

			$this -> email -> from($email, $name);
			$this -> email -> to('svaneepoel@gmail.com');
			if (isset($_POST['copyemail'])) {
				$this -> email -> cc($email);
			}
			$this -> email -> subject('Contactform PHL Exchange');
			$this -> email -> message($name . ' sent you the following email: ' . $message);
			$this -> email -> send();

		}
	}

	public function home() {
		$_SESSION['menukey'] = 'home';
		// BEGIN Random personen selecteren

		$query2 = $this -> db -> query("SELECT vnaam FROM `users` ORDER BY RAND() LIMIT 0,4;");
		$row = $query2 -> row();
		$vnaam = $row -> vnaam;
		$data['person1'] = $vnaam;

		/*$count = $this -> db -> count_all('users');
		 $random = rand(7, 15);
		 $query = $this -> db -> query('SELECT vnaam FROM `users` WHERE id =' . $random);*/

		//echo $items[array_rand($items)];

		//$row = $query -> row();
		//echo $row -> vnaam;

		//END Random personen selecteren
		$this -> load -> library('googlemaps');

		$config['center'] = '37.4419, -122.1419';
		$config['map_height'] = '200px';
		$this -> googlemaps -> initialize($config);

		$data['map'] = $this -> googlemaps -> create_map();
		$this -> load -> view('header', $data);
		$this -> load -> view('home');
		$this -> load -> view('footer');

	}

	public function error_404() {
		$html = '<div style="text-align:center;"><h1 style="font-size:36pt; font-weight:normal;">Uh oh! It\'s empty here</h1><br/><p class="lead">The requested page could not be found.</p></div>';

		$this -> load -> view('header');
		$this -> output -> append_output($html);
		$this -> load -> view('footer');
	}

}
