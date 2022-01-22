<?php
	defined('BASEPATH') OR exit('No direct script access alowed');

	class homeCtrl extends CI_Controller {
		function __construct(){
			parent::__construct();
			$this->load->model('homeModel');
		}	 
		public function index(){
			$data = [];
			$data['dataUser']= $this->homeModel->get_data_user();
			$data['dataMessage']= $this->homeModel->get_all_message();
			$data['listUser']= $this->homeModel->get_list_user();
			$data['dataDisc']= $this->homeModel->get_all_disc();
			$this->load->view('homeView', $data);
		}
		public function sendMessage(){
			$data = array(
				'id_message' => 'NULL',
				'sender' => $this->session->userdata('userTrack'),
				'receiver' => $this->input->post('receiver'),
				'message' => $this->input->post('message'),
				'datetime' => date("Y/m/d h:i:sa")
			);
			$this->homeModel->posting($data, 'message');
			redirect('homeCtrl');
		}
		public function sendDisc(){
			$data = array(
				'id_discussion' => 'NULL',
				'sender' => $this->session->userdata('userTrack'),
				'category' => $this->input->post('category'),
				'subject' => $this->input->post('subject'),
				'question' => $this->input->post('question'),
				'datetime' => date("Y/m/d h:i:sa")
			);
			$this->homeModel->uploadDisc($data, 'discussion');
			redirect('homeCtrl');
		}
	}
?>
