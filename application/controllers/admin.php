<?php

class Admin extends CI_Controller {

	public function index() {
		$this -> load -> model('model_users');

		$this -> load -> library('form_validation');
		$data['countusers'] = $this -> model_users -> get_countusers();
		$data['countapprovedusers'] = $this -> model_users -> get_countapprovedusers();
		$data['users'] = $this -> model_users -> get_userlist();
		$data['jquery'] = null;

		$this -> form_validation -> set_rules('oldpassword', 'Old password', 'required');
		$this -> form_validation -> set_rules('newpassword', 'New password', 'required');
		$this -> form_validation -> set_rules('repeatpassword', 'Repeat password', 'required');
		$this -> form_validation -> set_error_delimiters('<div class="label label-important">', '</div>');

		$oldpassword = $this -> input -> post("oldpassword");
		$newpassword = $this -> input -> post("newpassword");
		$repeatpassword = $this -> input -> post("repeatpassword");

		if ($oldpassword !== false) {
			$data['jquery'] = '<script type="text/javascript">$(document).ready(function(){ $("#myTab a[href=#settings]").tab("show"); });</script>';
		}
		if ($this -> form_validation -> run()) {

			foreach ($this -> model_users ->get_adminpw() as $row) {
				if ($row['password'] == md5($oldpassword)) {
					if ($newpassword == $repeatpassword) {
						$data = array('password' => md5($newpassword));

						$this -> model_users -> set_adminpw($data);
					}
				}
			}
		}
		$this -> load -> view('header');
		$this -> load -> view('admin', $data);
		$this -> load -> view('footer');
	}

	public function approve($id) {
		$this -> load -> model('model_users');
		foreach ($this -> model_users ->get_approve($id) as $row) {
			$email = $row['email'];
			$name = $row['vnaam'] . " " . $row['anaam'];
		}
		/*$this -> load -> library('email');
		 $this -> email -> from('admin@phl.be', 'PXL Exchange');
		 $this -> email -> to($email);
		 $this -> email -> subject('PHL Exchange account approved!');
		 $this -> email -> message('Dear '.$name . ', Your account on PXL Exchange is successfully approved!');
		 $this -> email -> send();*/

		$this -> model_users -> set_approve($data, $id);
		redirect('admin/index');
	}

	public function refuse($id) {
		$this -> load -> model('model_users');
		foreach ($this -> model_users ->get_refuse($id) as $row) {
			$email = $row['email'];
			$name = $row['vnaam'] . " " . $row['anaam'];
		}
		$this -> model_users -> set_refuse($id);

		/*$this -> load -> library('email');
		 $this -> email -> from('admin@phl.be', 'PXL Exchange');
		 $this -> email -> to($email);
		 $this -> email -> subject('PHL Exchange account refused or deleted');
		 $this -> email -> message('Dear '.$name . ', Your account on PXL Exchange is refused or deleted!');
		 $this -> email -> send();*/

		redirect('admin/index');
	}

}
