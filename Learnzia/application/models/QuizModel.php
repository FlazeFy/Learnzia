<?php 
	defined('BASEPATH') OR exit('No direct script access alowed');

	class QuizModel extends CI_Model 
	{
		public function get_all_quiz(){
			$this->db->select('*');
			$this->db->from('quiz');
			$this->db->join('user','user.id_user = quiz.id_user');
            // $this->db->where('quiz.closed_at', '>', date('Y-m-d'));
			$this->db->order_by('created_at','ASC');
			return $data = $this->db->get()->result_array();
		}

		public function get_current_answer(){
			$this->db->select('*');
			$this->db->from('quiz_answer');
            $this->db->where('id_quiz', $this->session->userdata('quizIdTrack'));
			$this->db->where('id_qq', $this->session->userdata('quiz_numberTrack'));
			return $data = $this->db->get()->result_array();
		}

		public function get_all_answer(){
			$this->db->select('*');
			$this->db->from('quiz_answer');
            $this->db->where('id_quiz', $this->session->userdata('quizIdTrack'));
			return $data = $this->db->get()->result_array();
		}

        public function get_all_quiz_question(){
			$this->db->select('*');
			$this->db->from('quiz_question');
			$this->db->order_by('quiz_question.quiz_no','ASC');
			return $data = $this->db->get()->result_array();
		}

		public function get_all_quiz_nav(){
			$this->db->select('*');
			$this->db->from('quiz_question');
			$this->db->join('quiz_answer','quiz_answer.id_qq = quiz_question.id_qq', 'left outer');
			$this->db->order_by('quiz_question.quiz_no','ASC');
			return $data = $this->db->get()->result_array();
		}

		public function get_current_question(){
			if($this->session->userdata('quiz_numberTrack') == null){
				$number = 1;
			} else {
				$number = $this->session->userdata('quiz_numberTrack');
			}
			$this->db->select('*');
			$this->db->from('quiz_question');
			$this->db->where('quiz_no', $number);
			$this->db->where('id_quiz', $this->session->userdata('quizIdTrack'));
			return $data = $this->db->get()->result_array();
		}

		//answer question
		public function insertAnswer($data){
			$this->db->insert('quiz_answer', $data);	
		}

		public function updateAnswer($data, $id){
			$this->db->where('id_qas', $id);
			$this->db->update('quiz_answer', $data);	
		}
	}
?>
