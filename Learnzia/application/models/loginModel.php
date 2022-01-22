<?php 
	defined('BASEPATH') OR exit('No direct script access alowed');

	class loginModel extends CI_Model 
	{
		function validator($data)
		{
			$username = $this->input->post('username');
			$password = $this->input->post('password');

			//Acc validation.
			$this->db->select('*');
			$this->db->from('user');
			$condition = array('username' => $data['username'], 'password' => $data['password']);
			$this->db->where($condition);
			$userCheck = $this->db->get()->result();
			if(count($userCheck) == 1){
				$this->session->set_userdata('userTrack',$username);	
				$this->session->set_userdata('lastLogin', date("Y/m/d h:i:sa"));
				redirect('homeCtrl');
			}else{
				$data['error_message'] = "Username or Password Incorrect!";
				$this->load->view('loginView', $data);
			}
		}	
	}
?>
