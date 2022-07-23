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
			$data['allUser']= $this->homeModel->get_all_user();
			$data['discHistory']= $this->homeModel->get_all_history();
			$data['discMath']= $this->homeModel->get_all_math();
			$data['dataReply']= $this->homeModel->get_all_reply();
			$this->load->view('homeView', $data);
		}

		//New discussion
		public function sendDisc(){
			if($this->input->post('imageSwitch') == 'on'){
				$switch = 'yes';
				$date = date("Ymdhis");
				$username = $this->session->userdata('userTrack');
				$imageURL = $username. '' .$date;
			} else {
				$switch = 'no'; 
				$imageURL = 'null';
			}
			$initialize = $this->upload->initialize(array(
				"upload_path" => './assets/uploads',
				"allowed_types" => 'jpg',
				"max_size" => 2000,
				"remove_spaces" => TRUE,
				"file_name" => 'discussion_' . $imageURL
			));
			$data = array(
				'id_discussion' => 'NULL',
				'sender' => $this->session->userdata('userTrack'),
				'category' => $this->input->post('category'),
				'subject' => $this->input->post('subject'),
				'question' => $this->input->post('question'),
				'datetime' => date("Y/m/d h:i:sa"),
				'image' => $switch,
				'imageURL' => $imageURL
			);
			
			if($this->input->post('imageSwitch') == 'on'){
				if (!$this->upload->do_upload('uploadImage')) {
					$error = array('error' => $this->upload->display_errors());
					$data['error_message'] = "Error! your image is to big or not jpg";
					redirect('homeCtrl');
				} else {
					$this->homeModel->uploadDisc($data, 'discussion');
				}
			} else {
				$this->homeModel->uploadDisc($data, 'discussion');
			} 
		}

		//Reply discussion
		public function sendReply(){
			if($this->input->post('imageSwitchR') == 'on'){
				$switch = 'yes';
				$date = date("Ymdhis");
				$username = $this->session->userdata('userTrack');
				$imageURL = $username. '' .$date;
			} else {
				$switch = 'no'; 
				$imageURL = 'null';
			}
			$initialize = $this->upload->initialize(array(
				"upload_path" => './assets/uploads/reply',
				"allowed_types" => 'jpg',
				"max_size" => 2000,
				"remove_spaces" => TRUE,
				"file_name" => 'reply_' . $imageURL
			));
			$data = array(
				'id_reply' => 'NULL',
				'id_discussion' => $this->input->post('id_discussion'),
				'sender' => $this->session->userdata('userTrack'),
				'replytext' => $this->input->post('replytext'),
				'datetime' => date("Y/m/d h:i:sa"),
				'image' => $switch,
				'imageURL' => $imageURL
			);
			
			if($this->input->post('imageSwitchR') == 'on'){
				if (!$this->upload->do_upload('uploadImageR')) {
					$error = array('error' => $this->upload->display_errors());
					$data['error_message'] = "Error! your image is to big or not jpg";
					redirect('homeCtrl');
				} else {
					$this->homeModel->reply($data, 'reply');
				}
			} else {
				$this->homeModel->reply($data, 'reply');
			}
		}

		//Send message
		public function sendRMessage(){
			if($this->input->post('imageSwitchMsg') == 'on'){
				$imageURL = substr(md5(uniqid(mt_rand(), true)), 0, 30);
			} else {
				$imageURL = 'null';
			}

			$initialize = $this->upload->initialize(array(
				"upload_path" => './assets/uploads/message',
				"allowed_types" => 'jpg',
				"max_size" => 5000,
				"remove_spaces" => TRUE,
				"file_name" => 'message_'.$imageURL
			));

			$data = array(
				'id_message' => 'NULL',
				'id_social' => $this->input->post('id_social'),
				'id_user_sender' => $this->session->userdata('userIdTrack'),
				'message' => $this->input->post('message'),
				'imageURL' => $imageURL,
				'datetime' => date("Y/m/d h:i:sa")
			);
			
			if($this->input->post('imageSwitchMsg') == 'on'){
				if (!$this->upload->do_upload('uploadImageMsg')) {
					$data['error_message'] = "Your image is to big or not jpg";
					$this->index();
					$this->load->view('homeView', $data);
				} else {
					$this->homeModel->insertMessage($data, 'message');
				}
			} else {
				$this->homeModel->insertMessage($data, 'message');
			}
		}

		//Sign out
		public function signOut(){
			$this->homeModel->offstatus('user');
		}
	}
?>
