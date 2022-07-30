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
			$condition = $this->session->userdata('userIdTrack');
			$condition2 = array('id_user_1' == $condition OR 'id_user_2' == $condition);
			$this->db->where($condition2);
			return $data = $this->db->get()->result_array();
		}
		public function get_all_message()
		{
			$this->db->select('*');
			$this->db->from('message');
			$this->db->join('social','message.id_social = social.id_social');
			$condition = $this->session->userdata('userTrack');
			$condition2 = array('sender' == $condition OR 'receiver' == $condition);
			$this->db->where($condition2);
			$this->db->order_by('datetime','ASC');
			return $data = $this->db->get()->result_array();
		}
		public function get_all_user(){
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
		public function get_all_disc(){
			$this->db->select('*');
			$this->db->from('discussion');
			$this->db->join('user','user.id_user = discussion.id_user');
			$this->db->order_by('datetime','DESC');
			return $data = $this->db->get()->result_array();
		}
		public function get_all_reply(){
			$this->db->select('*');
			$this->db->from('reply');
			$this->db->join('user','user.id_user = reply.id_user');
			$this->db->order_by('datetime','ASC');
			return $data = $this->db->get()->result_array();
		}
		
		//reply discussion
		public function reply($data){
			$this->db->insert('reply',$data);	
			redirect('homeCtrl');
		}

		//Send message.
		public function insertMessage($data){
			$this->db->insert('message',$data);	
		}

		//Get question up & down vote
		public function get_all_vote_dis()
		{
			$this->db->select('up.id_up ,up.id_user as id_user, up.id_context');
			$this->db->from('up');
			$this->db->join('discussion','discussion.id_discussion = up.id_context');
			$this->db->join('user','user.id_user = up.id_user');
			$this->db->where('up.up_type', 'discussion');
			return $data = $this->db->get()->result_array();
		}

		//Get question up & down vote
		public function get_all_vote_rep()
		{
			$this->db->select('up.id_up ,up.id_user as id_user, up.id_context');
			$this->db->from('up');
			$this->db->join('reply','reply.id_reply = up.id_context');
			$this->db->join('user','user.id_user = up.id_user');
			$this->db->where('up.up_type', 'reply');
			return $data = $this->db->get()->result_array();
		}

		//Insert vote.
		public function insertVote($data){
			$this->db->insert('up',$data);	
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
