<?php

Class Model_users extends CI_Model {

	// Inloggen van de gebruiker, indien gelukt wordt het user_id  teruggegeven
	public function can_log_in() {
		$this -> db -> where('email', $this -> input -> post('email'));
		$this -> db -> where('password', md5($this -> input -> post('password')));
		$query = $this -> db -> get('users');
		if ($query -> num_rows() == 1) {
			return $query->row()->id;
		} else {
			return false;
		}
	}
	
	public function get_id_by_email($email){
		return $this->db->where('email', $email)->get('users')->row()->id;
	}

	public function add_temp_users($key) {
		$data = array(	'anaam' => $this -> input -> post('anaam'),
						'vnaam' => $this -> input -> post('vnaam'),
						'email' => $this -> input -> post('email'), 
						'password' => md5($this -> input -> post('password')), 
						'key' => $key
						);

		$query = $this -> db -> insert('temp_users', $data);

		if ($query) {
			return true;
		} else {
			return false;
		}
	}

	public function is_valid_key($key) {
		$this -> db -> where('key', $key);
		$query = $this -> db -> get('temp_users');

		if ($query -> num_rows() == 1) {
			return true;
		} else {
			return false;
		}
	}

	public function add_user($key) {
		//alle temp users ophalen

		$this -> db -> where('key', $key);
		$temp_users = $this -> db -> get('temp_users');

		if ($temp_users) {
			$row = $temp_users -> row();
			//alle values in query zitten in row en zijn op te vragen

			$data = array(	'anaam' => $row -> anaam,
							'vnaam' => $row -> vnaam,
							'email' => $row -> email, 
							'password' => $row -> password,
							);

			$did_add_user = $this -> db -> insert('users', $data);
		}

		if ($did_add_user) {
			$this -> db -> where('key', $key);
			$this -> db -> delete('temp_users');
			
			$this->db->insert('user_details', array('user_id'=>$did_add_user));
			$this->db->insert('user_internships', array('user_id'=>$did_add_user));
			
			return $data['email'];
		} else {
			return false;
		}
	}
	
	public function get_user_details($uid){
		return $this->db->where('user_id', $uid)->get('user_details')->row();
	}
	
	public function get_user($uid){
		return $this->db->where('id', $uid)->get('users')->row();
	}
	
	public function get_internship($uid){
		return $this->db->where('user_id', $uid)->get('user_internships')->row();
	}

}
