<?php

	Class Model_Blog extends CI_Model{
		
		/**
		 * Get blogs
		 * 
		 * Gets a specific amount of blog entries of an user
		 */
		public function get_blogs($uid, $amount = false){
		$this->db->where('user_id', $uid);
		if(is_int($amount)){
			$this->db->limit($amount);
		}
		$this->db->order_by('create_time', 'desc');
		$query = $this->db->get('blog_posts', $amount);
        return $query->result();
		}
		
		/**
		 * Add a blog entry
		 */
		public function add_blog(){
			$data = array(
				'user_id' => $this->session->userdata('user_id'),
				'title' => $this->input->post('title'),
				'content' => $this->input->post('content'),
				'create_time' => $now = date("Y-m-d H:i:s")
			);
			
			$query = $this->db->insert('blog_posts', $data);
		}
		
		/**
		 * Deletes a blog 
		 */
		public function delete_blog($id){
			$blogs = $this->db->where('id', $id)->where('user_id', $this->session->userdata('user_id'))->get('blog_posts');
			if($blogs->num_rows == 1){			
			$this->db->delete('blog_posts', array('id'=>$id));
				return true;	
			} else {
				return false;
			}
		}
	}