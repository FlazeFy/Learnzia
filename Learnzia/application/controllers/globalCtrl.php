<?php
	defined('BASEPATH') OR exit('No direct script access alowed');

	class globalCtrl extends CI_Controller {
		function __construct(){
			parent::__construct();
			$this->load->model('globalModel');
		}	 
		public function index(){
			$data = [];
			$data['dataUser']= $this->globalModel->get_data_user();
			$data['dataMessage']= $this->globalModel->get_all_message();
			$data['dataDiscussion']= $this->globalModel->get_my_discussion();
			$data['contacts']= $this->globalModel->get_only_contact();
			$data['listUser']= $this->globalModel->get_list_user();
			$data['listClass']= $this->globalModel->get_list_class();
			$data['listRel']= $this->globalModel->get_list_relation();
			$data['discHistory']= $this->globalModel->get_all_history();
			$data['discMath']= $this->globalModel->get_all_math();
			$data['dataReply']= $this->globalModel->get_all_reply();
			$data['dataReplyWCat']= $this->globalModel->get_all_replyWCat();
			$this->load->view('globalView', $data);
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
			$this->globalModel->posting($data, 'message');
			redirect('globalCtrl');
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
			$this->globalModel->uploadDisc($data, 'discussion');
			redirect('globalCtrl');
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
					$this->globalModel->reply($data, 'reply');
				}
			} else {
				$this->globalModel->reply($data, 'reply');
			}
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
			$this->globalModel->replyMessage($data, 'message');
			redirect('globalCtrl');
		}
		//New class
		public function newClass(){
			if($this->input->post('typeSwitch') == 'on'){
				$type = 'private';
			} else {
				$type = 'public';
			}
		
			if($this->input->post('imageSwitchC') == 'on'){
				$date = date("Ymdhis");
				$username = $this->session->userdata('userTrack');
				$imageURL = $username. '' .$date;
			} else {
				$imageURL = 'null';
			}
			$initialize = $this->upload->initialize(array(
				"upload_path" => './assets/uploads/classroom',
				"allowed_types" => 'jpg',
				"max_size" => 2000,
				"remove_spaces" => TRUE,
				"file_name" => 'classroom_' . $imageURL
			));
			$data = array(
				'id_classroom' => 'NULL',
				'classname' => $this->input->post('classname'),
				'category' => $this->input->post('category'),
				'description' => $this->input->post('description'),
				'type' => $type,
				'date' => date("Y/m/d"),
				'imageURL' => $imageURL
			);
			$data2 = array(
				'id_relation' => 'NULL',
				'username' => $this->session->userdata('userTrack'),
				'classname' => $this->input->post('classname'),	
				'typeRelation' => 'founder'
			);
			
			if($this->input->post('imageSwitchC') == 'on'){
				if (!$this->upload->do_upload('uploadClassProfil')) {
					$error = array('error' => $this->upload->display_errors());
					$data['error_message'] = "Error! your image is to big or not jpg";
					redirect('globalCtrl');
				} else {
					$this->globalModel->insertClass($data, $data2);
				}
			} else {
				$this->globalModel->insertClass($data, $data2);
			}
		}

		//Sign out
		public function signOut(){
			$this->globalModel->offstatus('user');
		}
	}
?>
