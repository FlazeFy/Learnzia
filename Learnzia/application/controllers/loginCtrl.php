<?php
	defined('BASEPATH') OR exit('No direct script access alowed');

	class loginCtrl extends CI_Controller {
		function __construct(){
			parent::__construct();
			$this->load->model('loginModel');
		}
		 
		public function index(){
			$data = [];
			$this->load->view('loginView', $data);
		}
		public function checkUser(){
			$data = array(
				'username' => $this->input->post('username'),
				'password' => $this->input->post('password')
			);
			$this->loginModel->validator($data, 'user');
		}
	}
?>
