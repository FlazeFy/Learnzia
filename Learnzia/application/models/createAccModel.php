<?php 
	defined('BASEPATH') OR exit('No direct script access alowed');

	class createAccModel extends CI_Model 
	{
		function new($data)
		{
			$username = $this->input->post('username');

			//Acc validation.
			$this->db->select('*');
			$this->db->from('user');
			$condition = array('username' => $this->input->post('username'));
			$this->db->where($condition);
			$userCheck = $this->db->get()->result();
			if(count($userCheck) == 0){
				$this->db->insert('user',$data);
				$this->session->set_userdata('userTrack',$username);	
				$this->session->set_userdata('lastLogin', date("Y/m/d h:i:sa"));
				redirect('homeCtrl');
			}else{
				$data['error_message'] = "Username or password incorrect!";
				$this->load->view('createAccView', $data);
			}
		}	
	}
?>
