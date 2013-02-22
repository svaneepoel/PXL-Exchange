<?php

Class Model_Points extends CI_Model {

	public function get_points() {

		$query = $this -> db -> query('SELECT latitude, longitude, information FROM `points`');
		return $query -> result_array();
	}

}
