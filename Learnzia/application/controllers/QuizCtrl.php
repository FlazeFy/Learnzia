<?php
	defined('BASEPATH') OR exit('No direct script access alowed');

	class QuizCtrl extends CI_Controller {
		function __construct(){
			parent::__construct();
			$this->load->model('UserModel');
			$this->load->model('QuizModel');
		}	 
		public function index(){
			$data = [];
			$data['dataUser']= $this->UserModel->get_data_user();
			$data['allQQuestion']= $this->QuizModel->get_all_quiz_question();
			$data['currentQuestion']= $this->QuizModel->get_current_question();
			$this->load->view('quiz/index', $data);
		}

		//Sign out
		public function signOut(){
			$this->ProfileModel->offstatus('user');
		}
	}
?>
