<?php

Class Model_Config extends CI_Model {

	public function get_about() {
		$query = $this -> db -> query('SELECT about FROM `config` where id = 0');
		$row = $query -> row();
		return $row -> about;
	}

	public function set_about($abouttext) {

		$data = array('about' => $abouttext );
		$this -> db -> where('id', '0');
		$this -> db -> update('config', $data);
	}

}
