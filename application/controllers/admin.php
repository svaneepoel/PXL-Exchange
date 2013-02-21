<?php

class Admin extends CI_Controller {

	public function index() {

		/*echo "<table class='table .table-striped'>";
		 $query = $this -> db -> query('SELECT id, vnaam, anaam, email, is_active FROM `users`');
		 foreach ($query->result_array() as $row) {
		 if ($row['is_active'] == 0) {
		 echo "<tr class='error'>";
		 } else {
		 echo "<tr class='success'>";
		 }
		 echo "<td>";
		 echo $row['id'];
		 echo "</td><td>";
		 echo $row['vnaam'];
		 echo " ";
		 echo $row['anaam'];
		 echo "</td><td>";
		 echo $row['email'];
		 echo "</td>";
		 if ($row['is_active'] == 0) {
		 echo "<td>";
		 echo "<a class='btn btn-small btn-warning' href='http://localhost/exchange/admin/approve/" . $row['id'] . "'?>Approve!</a>";
		 echo "</td>";
		 } else {
		 echo "<td>Reeds toegevoegd</td>";
		 }
		 echo "</tr>";
		 }

		 echo "</table>";*/
		$this -> load -> view('header');
		$oldpassword = $this -> input -> post("oldpassword");
		$newpassword = $this -> input -> post("newpassword");
		$repeatpassword = $this -> input -> post("repeatpassword");
		if (isset($oldpassword) && isset($newpassword) && isset($repeatpassword)) {
			$query = $this -> db -> query('SELECT password FROM `users` WHERE vnaam = "Stef"');
			foreach ($query->result_array() as $row) {
				if ($row['password'] == md5($oldpassword)) {
					if ($newpassword == $repeatpassword) {
						$data = array('password' => md5($newpassword));
						$this -> db -> where('vnaam', 'Stef');
						$this -> db -> update('users', $data);
					}
				}

			}
		}
		$this -> load -> view('admin');
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

		$this -> load -> view('header');
		$this -> output -> append_output("<center><div class='alert alert-success'>The user with name " . $name . " is successfully approved!</div><center>");
		$this -> load -> view('admin');
		$this -> load -> view('footer');
	}

}
