<?php

class Admin extends CI_Controller {

	public function index() {
		$this->load->library('form_validation');
		$query = $this -> db -> query('SELECT id, vnaam, anaam, email, is_active FROM `users`');
		$data['users'] = $query -> result_array();
		$data['jquery'] = null;
		
		
		$this -> form_validation -> set_rules('oldpassword', 'Old password', 'required');
		$this -> form_validation -> set_rules('newpassword', 'New password', 'required');
		$this -> form_validation -> set_rules('repeatpassword', 'Repeat password', 'required');
		$this -> form_validation -> set_error_delimiters('<div class="label label-important">', '</div>');

		$oldpassword = $this -> input -> post("oldpassword");
		$newpassword = $this -> input -> post("newpassword");
		$repeatpassword = $this -> input -> post("repeatpassword");

		if($oldpassword !== false){
			$data['jquery'] = '<script type="text/javascript">$(document).ready(function(){ $("#myTab a[href=#settings]").tab("show"); });</script>';
		}
		if ($this->form_validation->run()) {
			$query = $this -> db -> query('SELECT password FROM `users` WHERE is_active = "2"');
			foreach ($query->result_array() as $row) {
				if ($row['password'] == md5($oldpassword)) {
					if ($newpassword == $repeatpassword) {
						$data = array('password' => md5($newpassword));
						$this -> db -> where('is_active', '2');
						$this -> db -> update('users', $data);
					}
					
				
				}
				
				

			}
		}
		
		$this -> load -> view('header');
		$this -> load -> view('admin', $data);
		$this -> load -> view('footer');
	}

	public function approve($id) {
		$query = $this -> db -> query('SELECT vnaam, anaam, email FROM `users` WHERE id=' . $id);
		foreach ($query->result_array() as $row) {
			$email = $row['email'];
			$name = $row['vnaam'] . " " . $row['anaam'];

		}
		/*$this -> load -> library('email');
		 $this -> email -> from($email, $name);
		 $this -> email -> to($email);
		 $this -> email -> subject('PHL Exchange');
		 $this -> email -> message('Dear '.$name . ', Your account on PXL Exchange is successfully approved!');
		 $this -> email -> send();*/

		$data = array('is_active' => 1);
		$this -> db -> where('id', $id);
		$this -> db -> update('users', $data);

		redirect('admin/index');
	}

	public function refuse($id) {

		$query = $this -> db -> query('SELECT vnaam, anaam, email FROM `users` WHERE id=' . $id);
		foreach ($query->result_array() as $row) {
			$email = $row['email'];
			$name = $row['vnaam'] . " " . $row['anaam'];

		}

		$this -> db -> delete('users', array('id' => $id));
		$this -> db -> delete('user_details', array('user_id' => $id));
		$this -> db -> delete('user_internships', array('user_id' => $id));

		/*$this -> load -> library('email');
		 $this -> email -> from($email, $name);
		 $this -> email -> to($email);
		 $this -> email -> subject('PHL Exchange');
		 $this -> email -> message('Dear '.$name . ', Your account on PXL Exchange is refused or deleted!');
		 $this -> email -> send();*/

		redirect('admin/index');
	}

}
