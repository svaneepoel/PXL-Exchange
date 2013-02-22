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

		$posts = $this -> model_blog -> get_blogs($uid);

		foreach ($posts as $row) {
			$html .= "<h2>$row->title</h3><p>$row->content</p>";
		}

		$details = $this -> model_users -> get_user_details($uid);
		$user = $this -> model_users -> get_user($uid);
		$internship = $this -> model_users -> get_internship($uid);

		$this -> load -> view('header');
		$this -> load -> view('profile', array(
			'blog' => $html,
			'details' => $details,
			'user' => $user,
			'internship' => $internship
		));
		$this -> load -> view('footer');

	}

	public function edit() {
		$this -> load -> view('header');
		$this -> load -> view('edit_profile');
		$this -> load -> view('footer');
	}

	public function picture() {
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
				$this -> db -> where('user_id', $this -> session -> userdata('user_id')) -> update('user_details', array('picture' => $data['file_name']));
			}
		}
		$this -> load -> view('edit_profile_picture');
		$this -> load -> view('footer');
	}

}
?>
