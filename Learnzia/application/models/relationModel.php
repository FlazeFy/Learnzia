<?php 
	defined('BASEPATH') OR exit('No direct script access alowed');

	class RelationModel extends CI_Model 
	{
		public function get_list_relation()
		{
			$this->db->select('*');
			$this->db->from('relation');
			$this->db->join('user','user.id_user = relation.id_user');
			$this->db->join('classroom','classroom.id_classroom = relation.id_classroom');
			return $data = $this->db->get()->result_array();
		}

		public function get_my_relation()
		{
			$this->db->select('*');
			$this->db->from('relation');
			$this->db->join('user','user.id_user = relation.id_user');
			$this->db->join('classroom','classroom.id_classroom = relation.id_classroom');
			$this->db->where('relation.id_classroom', $this->session->userdata("classIdTrack"));
			$this->db->where('relation.id_user', $this->session->userdata("userIdTrack"));
			return $data = $this->db->get()->result_array();
		}
	}
?>
