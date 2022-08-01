<?php 
	defined('BASEPATH') OR exit('No direct script access alowed');

	class messageModel extends CI_Model 
	{
		public function get_all_message()
		{
			$this->db->select('*');
			$this->db->from('message');
			$this->db->join('social','message.id_social = social.id_social');
			$condition = $this->session->userdata('userIdTrack');
			$condition2 = array('id_user' == $condition OR 'receiver' == $condition);
			$this->db->where($condition2);
			$this->db->order_by('datetime','ASC');
			return $data = $this->db->get()->result_array();
		}
		public function posting($data){
			$this->db->insert('message',$data);	
			redirect('homeCtrl');
		}
		//Send message.
		public function insertMessage($data){
			$this->db->insert('message',$data);	
		}
		//Insert channel message
		public function insertMainMsg($data){
			$this->db->insert('classforummessage',$data);	
			redirect('classCtrl');
		}
	}
?>
