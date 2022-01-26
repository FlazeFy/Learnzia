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
			$data['dataDiscussion']= $this->homeModel->get_all_discussion();
			$data['contacts']= $this->homeModel->get_only_contact();
			$data['listUser']= $this->homeModel->get_list_user();
			$data['discHistory']= $this->homeModel->get_all_history();
			$data['discMath']= $this->homeModel->get_all_math();
			$data['dataReply']= $this->homeModel->get_all_reply();
			$this->load->view('homeView', $data);
		}
		//Send new message
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
		//Reply discussion
		public function sendReply(){
			$data = array(
				'id_reply' => 'NULL',
				'id_discussion' => $this->input->post('id_discussion'),
				'sender' => $this->session->userdata('userTrack'),
				'replytext' => $this->input->post('replytext'),
				'datetime' => date("Y/m/d h:i:sa")
			);
			$this->homeModel->reply($data, 'reply');
			redirect('homeCtrl');
		}
		//Send reply message
		public function sendRMessage(){
			$data = array(
				'id_message' => 'NULL',
				'sender' => $this->session->userdata('userTrack'),
				'receiver' => $this->input->post('receiver'),
				'message' => $this->input->post('replyMessage'),
				'datetime' => date("Y/m/d h:i:sa")
			);
			$this->homeModel->replyMessage($data, 'message');
			redirect('homeCtrl');
		}

		//Sign out
		public function signOut(){
			$this->homeModel->offstatus('user');
		}
	}
?>
