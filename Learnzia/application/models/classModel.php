<?php 
	defined('BASEPATH') OR exit('No direct script access alowed');

	class classModel extends CI_Model 
	{
		public function get_data_user(){
			$this->db->select('*');
			$this->db->from('user');
			$condition = $this->session->userdata('userTrack');
			$this->db->where('username',$condition);
			return $data = $this->db->get()->result_array();
		}
		public function get_only_contact()
		{
			$this->db->select('');
			$this->db->from('social');
			$condition = $this->session->userdata('userTrack');
			$condition2 = array('username1' == $condition OR 'username2' == $condition);
			$this->db->where($condition2);
			//$this->db->group_by('username1','username2');
			//$this->db->limit(1);
			return $data = $this->db->get()->result_array();
		}
		public function get_all_message()
		{
			$this->db->select('*');
			$this->db->from('message');
			$condition = $this->session->userdata('userTrack');
			$condition2 = array('sender' == $condition OR 'receiver' == $condition);
			$this->db->where($condition2);
			$this->db->order_by('datetime','ASC');
			return $data = $this->db->get()->result_array();
		}
		public function get_list_channel()
		{
			$this->db->select('*');
			$this->db->from('channel');
			$this->db->where('id_classroom', $this->session->userdata("classIdTrack"));
			$this->db->order_by('datetime','ASC');
			return $data = $this->db->get()->result_array();
		}
		//For searching
		public function get_list_user(){
			$data = $this->db->get('user');
			return $data->result_array();
		}
		public function get_list_class(){
			$data = $this->db->get('classroom');
			return $data->result_array();
		}
		public function get_list_relation()
		{
			$data = $this->db->get('relation');
			return $data->result_array();
		}
		public function get_all_classForumMessage()
		{
			$data = $this->db->get('classforummessage');
			return $data->result_array();
		}
		public function posting($data){
			$this->db->insert('message',$data);	
			redirect('homeCtrl');
		}
		//reply message
		public function replyMessage($data){
			$this->db->insert('message',$data);	
			redirect('classCtrl');
		}
		//Sign out
		public function offstatus(){
			$this->db->set('status', 'offline');
			$this->db->where('username', $this->session->userdata('userTrack'));
			$this->db->update('user');
			redirect('http://localhost/Learnzia');
		}
		//reply discussion
		public function insertMainMsg($data){
			$this->db->insert('classforummessage',$data);	
			redirect('classCtrl');
		}

		//Create channel
		public function insertChannel($data){			
			$this->db->insert('channel',$data);
		}
		//Create classroom activity
		public function insertActivity($data2){			
			$this->db->insert('classroom-activity',$data2);
		}
	}
?>
