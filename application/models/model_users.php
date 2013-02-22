<?php

Class Model_users extends CI_Model {

	private $id;

	/**
	 * Sets user id so the get functions can retrieve the right information
	 */
	public function set_id($id) {
		$this -> id = $id;
	}

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
	 * Check if the FB email matches with an user in the database
	 */
	public function login_by_facebook($email) {
		$this->db->where('email', $email);
		$this->db->where('is_active', 1);
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
	 * Add user to database, get data from FB account
	 *
	 * Returns the ID is user was created succesfully
	 */
	public function add_user_facebook($data) {
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
	 * Updates user details
	 */
	public function update_user_details() {
		$data = array(
			'hobbies' => $this -> input -> post('hobbies'),
			'education' => $this -> input -> post('education'),
			'facebook' => $this -> input -> post('facebook'),
			'twitter' => $this -> input -> post('twitter')
		);

		$query = $this -> db -> where('user_id', $this -> id) -> update('user_details', $data);

		if ($query)
			return true;
		else
			return false;
	}

	/**
	 * Updates internship (company) details
	 */
	public function update_internship_details() {
		$data = array(
			'company_name' => $this -> input -> post('company_name'),
			'location' => $this -> input -> post('location'),
			'latitude' => $this -> input -> post('latitude'),
			'longitude' => $this -> input -> post('longitude'),
			'description' => $this -> input -> post('description')
		);

		$query = $this -> db -> where('user_id', $this -> id) -> update('user_internships', $data);

		if ($query)
			return true;
		else
			return false;
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
	public function get_user_details() {
		return $this -> db -> where('user_id', $this -> id) -> get('user_details') -> row();
	}

	/**
	 * Gets the row with user data
	 */
	public function get_user() {
		return $this -> db -> where('id', $this -> id) -> get('users') -> row();
	}

	/**
	 * Gets the row with internship info
	 */
	public function get_internship() {
		return $this -> db -> where('user_id', $this -> id) -> get('user_internships') -> row();
	}

	public function get_latestusers() {
		$query = $this -> db -> query('SELECT u.id id, u.vnaam vnaam, u.anaam anaam, ud.picture picture FROM users u, user_details ud WHERE ud.user_id =u.id AND u.is_active = 1  ORDER BY id DESC LIMIT 3');
		return $query -> result_array();
	}

	public function get_userlist() {
		$query = $this -> db -> query('SELECT id, vnaam, anaam, email, is_active FROM `users`');
		return $query -> result_array();
	}

	public function get_adminpw() {
		$query = $this -> db -> query('SELECT password FROM `users` WHERE is_active = "2"');
		return $query -> result_array();
	}

	public function set_adminpw($data) {
		$this -> db -> where('is_active', '2');
		$this -> db -> update('users', $data);
	}

	public function get_approve($id) {
		$query = $this -> db -> query('SELECT vnaam, anaam, email FROM `users` WHERE id=' . $id);
		return $query -> result_array();
	}

	public function set_approve($data, $id) {
		$data = array('is_active' => 1);
		$this -> db -> where('id', $id);
		$this -> db -> update('users', $data);
	}

	public function get_refuse($id) {
		$query = $this -> db -> query('SELECT vnaam, anaam, email FROM `users` WHERE id=' . $id);
		return $query -> result_array();
	}

	public function set_refuse($id) {
		$this -> db -> delete('users', array('id' => $id));
		$this -> db -> delete('user_details', array('user_id' => $id));
		$this -> db -> delete('user_internships', array('user_id' => $id));
	}

	public function get_countusers() {
		return $this -> db -> count_all_results('users');
	}

	public function get_countapprovedusers() {
		$this -> db -> where('is_active', '1');
		$this -> db -> or_where('is_active', '2');

		$this -> db -> from('users');
		return $this -> db -> count_all_results();
	}

	public function set_profilepicture($var1, $var2) {
		$this -> db -> where('user_id', $var1) -> update('user_details', $var2);
	}

}
