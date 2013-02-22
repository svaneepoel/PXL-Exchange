<?php

Class Model_Points extends CI_Model {

	public function get_points() {

		$query = $this -> db -> query('SELECT p.latitude, p.longitude, p.company_name, u.id, u.vnaam, u.anaam FROM user_internships p, users u WHERE p.user_id = u.id');
		return $query -> result_array();
	}

}
