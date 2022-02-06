<?php 
	defined('BASEPATH') OR exit('No direct script access alowed');

	class globalModel extends CI_Model 
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
		public function posting($data){
			$this->db->insert('message',$data);	
			redirect('homeCtrl');
		}
		public function uploadDisc($data){
			$this->db->insert('discussion',$data);	
			redirect('homeCtrl');
		}
		public function get_my_discussion(){
			$this->db->select('*');
			$this->db->from('discussion');
			$this->db->where('sender', $this->session->userdata('userTrack'));
			$this->db->order_by('datetime','DESC');
			return $data = $this->db->get()->result_array();
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
			redirect('globalCtrl');
		}
		//reply message
		public function replyMessage($data){
			$this->db->insert('message',$data);	
			redirect('globalCtrl');
		}
		//reply with discussion category
		public function get_all_replyWCat(){
			$this->db->select('*');
			$this->db->from('reply');
			$this->db->join('discussion', 'reply.id_discussion = discussion.id_discussion');
			$this->db->where('reply.sender', $this->session->userdata('userTrack'));
			return $data = $this->db->get()->result_array();
		}
		//Sign out
		public function offstatus(){
			$this->db->set('status', 'offline');
			$this->db->where('username', $this->session->userdata('userTrack'));
			$this->db->update('user');
			redirect('http://localhost/Learnzia');
		}
		//New class
		public function insertClass($data, $data2){
			$this->db->insert('classroom',$data);
			$this->db->insert('relation',$data2);	
			redirect('globalCtrl');
		}
		//send invitation
		public function insertInvitation($data){			
			$this->db->insert('invitation',$data);
		}
	}
?>
