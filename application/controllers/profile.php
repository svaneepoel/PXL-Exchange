<?php

class Profile extends CI_Controller {

	public function view($uid) {

		// Alle blogposts krijgen
		$this->load->model('model_blog');
		
		$posts = $this->model_blog->get_blogs($uid);
		
		foreach($posts as $row){
			echo "<h2>$row->title</h3><p>$row->content</p>";
		}
		

	}

}
?>
