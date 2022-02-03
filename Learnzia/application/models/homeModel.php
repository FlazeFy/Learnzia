<?php 
	defined('BASEPATH') OR exit('No direct script access alowed');

	class homeModel extends CI_Model 
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
		public function get_list_user(){
			$data = $this->db->get('user');
			return $data->result_array();
		}
		public function posting($data){
			$this->db->insert('message',$data);	
			redirect('homeCtrl');
		}
		//Post discussion
		public function uploadDisc($data){
			$this->db->insert('discussion',$data);	
			redirect('homeCtrl');
		}
		public function get_all_discussion(){
			$data = $this->db->get('discussion');
			return $data->result_array();
		}
		public function get_all_history(){
			$this->db->select('*');
			$this->db->from('discussion');
			$this->db->where('category', 'history');
			$this->db->order_by('datetime','DESC');
			return $data = $this->db->get()->result_array();
		}
		public function get_all_math(){
			$this->db->select('*');
			$this->db->from('discussion');
			$this->db->where('category', 'math');
			$this->db->order_by('datetime','DESC');
			return $data = $this->db->get()->result_array();
		}
		public function get_all_reply(){
			$this->db->select('*');
			$this->db->from('reply');
			$this->db->order_by('datetime','ASC');
			return $data = $this->db->get()->result_array();
		}
		//reply discussion
		public function reply($data){
			$this->db->insert('reply',$data);	
			redirect('homeCtrl');
		}
		//reply message
		public function replyMessage($data){
			$this->db->insert('message',$data);	
			redirect('homeCtrl');
		}

		//Sign out
		public function offstatus(){
			$this->db->set('status', 'offline');
			$this->db->where('username', $this->session->userdata('userTrack'));
			$this->db->update('user');
			redirect('http://localhost/Learnzia');
		}
	}
?>
