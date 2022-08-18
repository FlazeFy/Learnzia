<?php 
	defined('BASEPATH') OR exit('No direct script access alowed');

	class SocialModel extends CI_Model 
	{
		public function get_only_contact()
		{
			$this->db->select('');
			$this->db->from('social');
			//$this->db->join('user','user.id_user = social.id_user');
			$condition = $this->session->userdata('userIdTrack');
			$condition2 = array('id_user_1' == $condition OR 'id_user_2' == $condition);
			$this->db->where($condition2);
			return $data = $this->db->get()->result_array();
		}
	}
?>
