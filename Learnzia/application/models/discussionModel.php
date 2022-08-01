<?php 
	defined('BASEPATH') OR exit('No direct script access alowed');

	class discussionModel extends CI_Model 
	{
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
		public function get_my_discussion(){
			$this->db->select('*');
			$this->db->from('discussion');
			$this->db->where('id_user', $this->session->userdata('userIdTrack'));
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
	}
?>
