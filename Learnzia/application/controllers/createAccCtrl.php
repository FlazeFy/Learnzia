<?php
	defined('BASEPATH') OR exit('No direct script access alowed');

	class createAccCtrl extends CI_Controller {
		function __construct(){
			parent::__construct();
			$this->load->model('createAccModel');
		}
		 
		public function index(){
			$data = [];
			$this->load->view('createAccView', $data);
		}
		public function checkUser(){
			$condition = $this->input->post('username');
			$initialize = $this->upload->initialize(array(
				"upload_path" => './assets/uploads',
				"allowed_types" => 'jpg',
				"max_size" => 1000,
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
				'country' => $this->input->post('country')
			);
			if (!$this->upload->do_upload('uploadImage')) {
				$error = array('error' => $this->upload->display_errors());
				redirect('createAccCtrl');
			} else {
				$this->createAccModel->new($data, 'user');
			}
		}
	}
?>
