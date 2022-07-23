<?php
	defined('BASEPATH') OR exit('No direct script access alowed');

	class loginCtrl extends CI_Controller {
		function __construct(){
			parent::__construct();
		}
		 
		public function index(){
			$data = [];
			$this->load->view('landing/index', $data);
		}
		public function checkUser(){
			$username = $this->input->post('username');
			$password = $this->input->post('password');

			$data = array(
				'username' => $username,
				'password' => $password
			);
			
			//Acc validation.
			$this->db->select('*');
			$this->db->from('user');
			$condition = array('username' => $username, 'password' => $password);
			$this->db->where($condition);
			$userCheck = $this->db->get()->result();
			if(count($userCheck) == 1){
				$this->db->set('status', 'online');
				$this->db->where('username', $data['username']);
				$this->db->update('user');
				foreach ($userCheck as $row)
				{
					$id = $row->id_user;
				}
				$this->session->set_userdata('userIdTrack',$id);
				$this->session->set_userdata('userTrack',$username);	
				$this->session->set_userdata('lastLogin', date("Y/m/d h:i:sa"));
				redirect('homeCtrl');
			}else{
				$data['error_message'] = "Username or Password Incorrect!";
				$this->index();
				$this->load->view('landing/index', $data);
			}
		}

		
		public function createAcc(){
			$condition = $this->input->post('username');
			$initialize = $this->upload->initialize(array(
				"upload_path" => './assets/uploads',
				"allowed_types" => 'jpg',
				"max_size" => 5000,
				"remove_spaces" => TRUE,
				"file_name" => 'user_' . $condition
			));
			$data = array(
				'username' => $this->input->post('username'),
				'password' => $this->input->post('password'),
				'fullname' => $this->input->post('fullname'),
				'email' => $this->input->post('email'),
				'password' => $this->input->post('password'),
				'description' => $this->input->post('description'),
				'country' => $this->input->post('country'),
				'datejoin' => date("Y/m/d"),
				'status' => 'online'
			);

			//Acc validation.
			$this->db->select('*');
			$this->db->from('user');
			$condition = array('username' => $this->input->post('username'));
			$this->db->where($condition);
			$userCheck = $this->db->get()->result();
			if(count($userCheck) == 0){
				if (!$this->upload->do_upload('uploadImage')) {
					$error = array('error' => $this->upload->display_errors());
					$data['error_message'] = "Error! your profile image is to big or not jpg";
					$this->index();
					$this->load->view('loginView', $data);
				} else {
					$this->db->insert('user',$data);
					$this->session->set_userdata('userTrack',$username);	
					$this->session->set_userdata('lastLogin', date("Y/m/d h:i:sa"));
					redirect('homeCtrl');
				}
			} else {
				$data['error_message'] = "Username already been taken";
				$this->index();
				$this->load->view('landing/index', $data);
			}
			
		}
	}
?>
