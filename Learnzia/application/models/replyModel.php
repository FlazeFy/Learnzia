<?php 
	defined('BASEPATH') OR exit('No direct script access alowed');

	class replyModel extends CI_Model 
	{
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
	}
?>
