<?php 
	defined('BASEPATH') OR exit('No direct script access alowed');

	class classModel extends CI_Model 
	{
		public function get_list_class(){
			$data = $this->db->get('classroom');
			return $data->result_array();
		}
		
		public function get_list_activity()
		{
			$this->db->select('*');
			$this->db->from('classroom-activity');
			$this->db->join('user','user.id_user = classroom-activity.id_user');
			$this->db->where('id_classroom', $this->session->userdata("classIdTrack"));
			$this->db->order_by('datetime','DESC');
			return $data = $this->db->get()->result_array();
		}
		
		public function get_all_classForumMessage()
		{
			$this->db->select('*');
			$this->db->from('classforummessage');
			$this->db->join('user','user.id_user = classforummessage.id_user');
			$this->db->where('id_classroom', $this->session->userdata("classIdTrack"));
			$this->db->where('id_channel', $this->session->userdata("channelTrack"));
			$this->db->order_by('datetime','ASC');
			return $data = $this->db->get()->result_array();
		}

		//Create classroom activity
		public function insertActivity($data2){			
			$this->db->insert('classroom-activity',$data2);
		}

		//New class
		public function insertClass($data, $data2){
			$this->db->insert('classroom',$data);
			$this->db->insert('relation',$data2);	
			redirect('globalCtrl');
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
