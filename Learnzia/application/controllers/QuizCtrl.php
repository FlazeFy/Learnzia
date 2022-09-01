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
			$data['allQuiz']= $this->QuizModel->get_all_quiz();
			$data['allQQuestion']= $this->QuizModel->get_all_quiz_question();
			$data['quizNav']= $this->QuizModel->get_all_quiz_nav();
			$data['currentQuestion']= $this->QuizModel->get_current_question();
			$data['currentAnswer']= $this->QuizModel->get_current_answer();
			$data['allAnswer']= $this->QuizModel->get_all_answer();
			$this->load->view('quiz/index', $data);
		}

		public function answer(){
			if($this->input->post('opt') != null){
				//If user has answered the question.
				$this->db->select('*');
				$this->db->from('quiz_answer');
				$condition = array('id_qas' => $this->input->post('id_qas'));
				$this->db->where($condition);
				$ansCheck = $this->db->get()->result();
				if(count($ansCheck) == 1){
					//Update past answer.
					$data = array(
						'quiz_opt' => $this->input->post('opt'),
						'updated_at' => date("Y/m/d h:i:sa")
					);
					$this->QuizModel->updateAnswer($data, $this->input->post('id_qas'), 'quiz_answer');
				} else {
					//Create new answer
					$data = array(
						'id_qas' => 'NULL',
						'id_quiz' => $this->session->userdata('quizIdTrack'),
						'id_qq' => $this->session->userdata('quiz_numberTrack'),
						'id_user' => $this->session->userdata('userIdTrack'),
						'quiz_opt' => $this->input->post('opt'),
						'created_at' => date("Y/m/d h:i:sa"),
						'updated_at' => date("Y/m/d h:i:sa")
					);
					$this->QuizModel->insertAnswer($data, 'quiz_answer');
				}
			}

			//Route question number based on submit button.
			$no = $this->session->userdata('quiz_numberTrack');
			if($this->input->post('route_quiz') == 'prev'){
				$this->session->set_userdata('quiz_numberTrack', $no - 1);
			} else if($this->input->post('route_quiz') == 'next') {
				$this->session->set_userdata('quiz_numberTrack', $no + 1);
			} else if($this->input->post('route_quiz') == 'none') {
				$this->session->set_userdata('quiz_numberTrack', $this->input->post('quiz_no'));
			}
			redirect('QuizCtrl');
		}

		//Sign out
		public function signOut(){
			$this->ProfileModel->offstatus('user');
		}
	}
?>
