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

        public function get_all_quiz_question(){
			$this->db->select('*');
			$this->db->from('quiz_question');
			$this->db->order_by('id_quiz','ASC');
			return $data = $this->db->get()->result_array();
		}
	}
?>
