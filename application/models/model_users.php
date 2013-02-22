<?php

Class Model_users extends CI_Model {

	/**
	 * Check if the entered login data was correct
	 *
	 * Returns the ID if the credentials were correct
	 */
	public function can_log_in() {
		$this -> db -> where('email', $this -> input -> post('email'));
		$this -> db -> where('password', md5($this -> input -> post('password')));
		$this -> db -> where('is_active', 1);
		$query = $this -> db -> get('users');
		if ($query -> num_rows() == 1) {
			return $query -> row() -> id;
		} else {
			return false;
		}
	}

	/**
	 * Add user to database
	 *
	 * Returns the ID is user was created succesfully
	 */
	public function add_user() {
		// Add records in user table
		$data = array(
			'anaam' => $this -> input -> post('anaam'),
			'vnaam' => $this -> input -> post('vnaam'),
			'email' => $this -> input -> post('email'),
			'password' => md5($this -> input -> post('password')),
			'is_active' => 0
		);
		$query = $this -> db -> insert('users', $data);

		// If success return the user id, otherwise false
		if ($query) {
			$id = $this -> db -> insert_id();
			// Generate user_details and user_internships so users can change their details later
			$this -> db -> insert('user_details', array('user_id' => $id));
			$this -> db -> insert('user_internships', array('user_id' => $id));
			return $id;
		} else {
			return false;
		}
	}

	/**
	 * Returns the ID which belongs to an email in the database
	 */
	public function get_id_by_email($email) {
		return $this -> db -> where('email', $email) -> get('users') -> row() -> id;
	}

	/**
	 * Returns the row with user details
	 */
	public function get_user_details($uid) {
		return $this -> db -> where('user_id', $uid) -> get('user_details') -> row();
	}

	/**
	 * Gets the row with user data
	 */
	public function get_user($uid) {
		return $this -> db -> where('id', $uid) -> get('users') -> row();
	}

	/**
	 * Gets the row with internship info
	 */
	public function get_internship($uid) {
		return $this -> db -> where('user_id', $uid) -> get('user_internships') -> row();
	}

}
