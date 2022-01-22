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
		public function get_all_message()
		{
			$this->db->select('*');
			$this->db->from('message');
			$condition = $this->session->userdata('userTrack');
			$this->db->where('sender',$condition);
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
		public function uploadDisc($data){
			$this->db->insert('discussion',$data);	
			redirect('homeCtrl');
		}
		public function get_all_disc(){
			$data = $this->db->get('discussion');
			return $data->result_array();
		}
	}
?>
