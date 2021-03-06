<?php

class Profile extends CI_Controller {
	public function index() {
		$uid = $this -> session -> userdata('user_id');
		if (!$uid) {
			redirect("pages/home");
		} else {
			redirect("profile/view/$uid");
		}
	}

	public function view($uid) {
		$html = '';

		// Alle blogposts krijgen
		$this -> load -> model('model_blog');
		$this -> load -> model('model_users');
		$this -> model_users -> set_id($uid);

		$posts = $this -> model_blog -> get_blogs($uid,5);

		foreach ($posts as $row) {
			$html .= "<h2>$row->title</h3><span style='font-size:9pt;'>Added on $row->create_time</span><p>$row->content</p>";
			if($uid == $this->session->userdata('user_id')){
				$url = base_url() . "blog/delete/$row->id/p";
				$html .= "<a class='btn btn-small btn-danger' href='$url'>Delete post</a>";
			}
		}

		$details = $this -> model_users -> get_user_details();
		$user = $this -> model_users -> get_user();
		$internship = $this -> model_users -> get_internship();

		$this -> load -> view('header');
		$this -> load -> view('profile', array('blog' => $html, 'details' => $details, 'user' => $user, 'internship' => $internship));
		$this -> load -> view('footer');

	}

	public function edit() {
		$this -> load -> view('header');
		$this -> load -> library('form_validation');
		$this -> load -> model('model_users');
		$this -> model_users -> set_id($this -> session -> userdata('user_id'));

		$this -> form_validation -> set_rules('hobbies', 'Message', 'required');
		$this -> form_validation -> set_rules('education', 'Education', 'required');
		$this -> form_validation -> set_error_delimiters('<div class="label label-important">', '</div>');

		if ($this -> form_validation -> run()) {
			$this -> model_users -> update_user_details();
			$this -> output -> append_output("<div class='alert alert-success'>Your profile has been updated</div>");
		}
		$this -> load -> view('edit_profile', array('user_details' => $this -> model_users -> get_user_details()));
		$this -> load -> view('footer');
	}

	public function internship() {
		$this -> load -> view('header');
		$this -> load -> library('form_validation');
		$this -> load -> library('googlemaps');
		$this -> load -> model('model_users');
		$this -> model_users -> set_id($this -> session -> userdata('user_id'));

		$this -> form_validation -> set_rules('company_name', 'Company name', 'required|trim');
		$this -> form_validation -> set_rules('description', 'Description', 'required');
		$this -> form_validation -> set_rules('location', 'Location', 'required');
		$this -> form_validation -> set_error_delimiters('<div class="label label-important">', '</div>');

		if ($this -> form_validation -> run()) {
			$this -> model_users -> update_internship_details();
			$this -> output -> append_output("<div class='alert alert-success'>Your internship details have been updated</div>");
		}
		$data['internship_details'] = $this -> model_users -> get_internship(); 
		$this -> load -> view('edit_internship', $data);
		$this -> load -> view('footer');
	}

	public function picture() {
		$this -> load -> model('model_users');
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size'] = '2048';
		$config['max_width'] = '1024';
		$config['max_height'] = '768';
		$config['encrypt_name'] = TRUE;

		$this -> load -> library('upload', $config);
		$this -> load -> library('form_validation');

		$this -> load -> view('header');

		if (!empty($_FILES)) {
			if (!$this -> upload -> do_upload()) {
				$this -> output -> append_output($this -> upload -> display_errors('<div class="alert alert-error">', '</div>'));
			} else {
				// Melding weergeven en profielpagina toevoegen in DB
				$this -> output -> append_output('<div class="alert alert-success">Your profile picture has been edited.</div>');
				$data = $this -> upload -> data();
				
				$var1 = $this -> session -> userdata('user_id');
				$var2 = array('picture' => $data['file_name']);
				$this -> model_users ->set_profilepicture($var1,$var2);
				
			}
		}
		$this -> load -> view('edit_profile_picture');
		$this -> load -> view('footer');
	}

}
?>
