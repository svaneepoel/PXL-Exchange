<?php

Class Model_home extends CI_Model {

	
	

	public function get_points() {
		return $query = $this -> db -> query('SELECT latitude, longitude, information FROM `points`');
	}

}
