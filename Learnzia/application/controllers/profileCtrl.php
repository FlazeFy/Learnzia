<?php
	defined('BASEPATH') OR exit('No direct script access alowed');

	class profileCtrl extends CI_Controller {
		function __construct(){
			parent::__construct();
			$this->load->model('profileModel');
		}	 
		public function index(){
			$data = [];
			$data['dataUser']= $this->profileModel->get_data_user();
			$data['dataMessage']= $this->profileModel->get_all_message();
			$data['dataDiscussion']= $this->profileModel->get_my_discussion();
			$data['contacts']= $this->profileModel->get_only_contact();
			$data['listUser']= $this->profileModel->get_list_user();
			$data['discHistory']= $this->profileModel->get_all_history();
			$data['discMath']= $this->profileModel->get_all_math();
			$data['dataReply']= $this->profileModel->get_all_reply();
			$this->load->view('profileView', $data);
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
			$this->profileModel->posting($data, 'message');
			redirect('profileCtrl');
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
			$this->profileModel->uploadDisc($data, 'discussion');
			redirect('profileCtrl');
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
			$this->profileModel->reply($data, 'reply');
			redirect('profileCtrl');
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
			$this->profileModel->replyMessage($data, 'message');
			redirect('profileCtrl');
		}

		//Sign out
		public function signOut(){
			$this->profileModel->offstatus('user');
		}
	}
?>
