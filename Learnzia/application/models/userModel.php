<?php 
	defined('BASEPATH') OR exit('No direct script access alowed');

	class UserModel extends CI_Model 
	{
		public function get_data_user(){
			$this->db->select('*');
			$this->db->from('user');
			$condition = $this->session->userdata('userTrack');
			$this->db->where('username',$condition);
			return $data = $this->db->get()->result_array();
		}
		public function get_all_user(){
			$data = $this->db->get('user');
			return $data->result_array();
		}
		public function update_user($data){
			$id = $this->input->post('id_user');
			$this->db->where('id_user', $id);
			$this->db->update('user', $data);
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
