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
		$this -> load -> model('model_points');
		$this -> load -> model('model_users');
		
		// BEGIN Alle markers toevoegen vanuit de database
		$this -> load -> library('googlemaps');
		$config['center'] = '50.503887, 4.469936';
		$config['zoom'] = '1';
		$config['cluster'] = TRUE;
		$config['map_height'] = '200px';
		$this -> googlemaps -> initialize($config);

		foreach ($this -> model_points ->get_points() as $row) {
			$latitude = $row['latitude'];
			$longitude = $row['longitude'];
			$marker = array();
			$marker['position'] = $latitude . " , " . $longitude;
			$marker['animation'] = 'DROP';
			$marker['infowindow_content'] = "<strong>".$row['company_name']."</strong><br/>Posted by <a href=". base_url() ."profile/view/".$row['id'].">".$row['vnaam']." ".$row['anaam']."</a>";
			$this -> googlemaps -> add_marker($marker);
		}

		$data['map'] = $this -> googlemaps -> create_map();
		// END Alle markers toevoegen vanuit de database
		
		// BEGIN laatste 3 personen selecteren
		$data['users'] = $this -> model_users -> get_latestusers();
		//END laatste 3  personen selecteren
		
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

	public function error_restricted() {
		$html = '<div style="text-align:center;"><h1 style="font-size:36pt; font-weight:normal;">Uh oh! Access denied</h1><br/><p class="lead">You\'re not allowed to access this page.</p></div>';
		$this -> load -> view('header');
		$this -> output -> append_output($html);
		$this -> load -> view('footer');
	}

}
