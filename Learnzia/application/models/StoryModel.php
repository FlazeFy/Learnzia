<?php 
	defined('BASEPATH') OR exit('No direct script access alowed');

	class StoryModel extends CI_Model 
	{
		public function get_all_story()
		{
			$this->db->select('');
			$this->db->from('story');
			$this->db->join('user','user.id_user = story.id_user');
			$this->db->order_by('story.datetime','DESC');
			return $data = $this->db->get()->result_array();
		}
	}
?>
