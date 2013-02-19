<?php

	Class Model_Blog extends CI_Model{
		
		public function get_blogs($uid, $amount = 5){
		$query = $this->db->where('user_id', $uid)->get('blog_posts', $amount);
        return $query->result();
		}
		
		public function add_blog($uid){
			$data = array(
				'user_id' => $uid,
				'title' => $this->input->post('email'),
				'content' => $this->input->post('content'),
				'create_time' => date()
			);
			
			$query = $this->db->insert('blog_posts', $data);
		}
	}