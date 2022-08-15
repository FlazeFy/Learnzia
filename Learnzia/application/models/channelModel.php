<?php 
	defined('BASEPATH') OR exit('No direct script access alowed');

	class channelModel extends CI_Model 
	{
		public function get_list_channel()
		{
			$this->db->select('*');
			$this->db->from('channel');
			$this->db->where('id_classroom', $this->session->userdata("classIdTrack"));
			$this->db->order_by('datetime','ASC');
			return $data = $this->db->get()->result_array();
		}
		//Create channel
		public function insertChannel($data){			
			$this->db->insert('channel',$data);
		}

		//Change user data.
		function updateChannel($data)
		{
			$id = $this->input->post('id_channel');
			$this->db->where('id_channel', $id);
			$this->db->update('channel', $data);
		}	

		//Change class data
		function updateClass($data)
		{
			$id = $this->input->post('id_classroom');
			$this->db->where('id_classroom', $id);
			$this->db->update('classroom', $data);
		}
	}
?>
