<?php 
	defined('BASEPATH') OR exit('No direct script access alowed');

	class InvitationModel extends CI_Model 
	{
		//Get friend and class invitation.
		public function get_my_invitation(){
			$this->db->select('*');
			$this->db->from('invitation');
			$this->db->where('id_user_receiver', $this->session->userdata('userIdTrack'));
			$this->db->order_by('datetime','DESC');
			return $data = $this->db->get()->result_array();
		}
		public function deleteInvitation($id){
			$this->db->where('id_invitation', $id);
			$this->db->delete('invitation');
			redirect('ProfileCtrl');
		}
		//accept invitation
		public function acceptInvitation($data, $id){
			$this->db->where('id_invitation', $id);
			$this->db->delete('invitation');

			$this->db->insert('relation',$data);
		}
		//send invitation
		public function insertInvitation($data){			
			$this->db->insert('invitation',$data);
		}
	}
?>
