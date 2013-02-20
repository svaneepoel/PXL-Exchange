<?php

class Profile extends CI_Controller {

	public function view($uid) {
		$html = '';
	
		// Alle blogposts krijgen
		$this->load->model('model_blog');
		$this->load->model('model_users');
		
		$posts = $this->model_blog->get_blogs($uid);
		
		foreach($posts as $row){
			$html .= "<h2>$row->title</h3><p>$row->content</p>";
		}
		
		$details = $this->model_users->get_user_details($uid);
		$user = $this->model_users->get_user($uid);
		$internship = $this->model_users->get_internship($uid);
		
		$this -> load -> view('header');
		$this->load->view('profile', array('blog'=>$html, 'details'=>$details, 'user'=>$user, 'internship' => $internship));
		$this -> load -> view('footer');

	}

}
?>
