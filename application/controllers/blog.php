<?php

class Blog extends CI_Controller {
	
	public function view($uid){
		
	}
	
	public function create(){
		if($this->session->userdata('is_logged_in')!=1){
			redirect('pages/error_restricted');
		}
		
		$this->load->library('form_validation');
		$this->load->model('model_blog');
		
		$this -> form_validation -> set_rules('title', 'Title', 'trim|required');
		$this -> form_validation -> set_rules('content', 'Content', 'trim|required|min_length[30]');
		$this -> form_validation -> set_error_delimiters('<div class="label label-important">', '</div>');

		
		if ($this -> form_validation -> run()) {
			$this->model_blog->add_blog();
			redirect('profile');
		}
		
		$this->load->view('header');
		$this->load->view('addblog');
		$this->load->view('footer');
	}
	
	public function delete($id, $p = false){
		$this->load->model('model_blog');
		$result = $this->model_blog->delete_blog($id);
		
		if(!$p){
			redirect('blog');
		} else {
			redirect('profile');
		}
	}
	
	
}


?>	