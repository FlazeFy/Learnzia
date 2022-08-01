<?php
	defined('BASEPATH') OR exit('No direct script access alowed');

	class profileCtrl extends CI_Controller {
		function __construct(){
			parent::__construct();
			$this->load->model('userModel');
			$this->load->model('discussionModel');
			$this->load->model('invitationModel');
			$this->load->model('messageModel');
			$this->load->model('replyModel');
			$this->load->model('socialModel');
			$this->load->model('upModel');
			$this->load->model('classModel');
		}	 
		public function index(){
			$data = [];
			$data['dataUser']= $this->userModel->get_data_user();
			$data['dataMessage']= $this->messageModel->get_all_message();
			$data['dataDiscussion']= $this->discussionModel->get_my_discussion();
			$data['dataInvitation']= $this->invitationModel->get_my_invitation();
			$data['contacts']= $this->socialModel->get_only_contact();
			$data['listUser']= $this->userModel->get_all_user();
			$data['listClass']= $this->classModel->get_list_class();
			$data['listRel']= $this->classModel->get_list_relation();
			$data['discHistory']= $this->discussionModel->get_all_history();
			$data['discMath']= $this->discussionModel->get_all_math();
			$data['dataReply']= $this->replyModel->get_all_reply();
			$this->load->view('profile/index', $data);
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

		//Send discussion
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
					$this->profileModel->reply($data, 'reply');
				}
			} else {
				$this->profileModel->reply($data, 'reply');
			}
		}

		//Send reply message.
		public function sendRMessage(){
			if($this->input->post('imageSwitchMsg') == 'on'){
				$date = date("Ymdhis");
				$username = $this->session->userdata('userTrack');
				$imageURL = $username. '' .$date;
			} else {
				$imageURL = 'null';
			}
			$initialize = $this->upload->initialize(array(
				"upload_path" => './assets/uploads/message',
				"allowed_types" => 'jpg',
				"max_size" => 2000,
				"remove_spaces" => TRUE,
				"file_name" => 'message_' . $imageURL
			));
			$data = array(
				'id_message' => 'NULL',
				'sender' => $this->session->userdata('userTrack'),
				'receiver' => $this->input->post('receiver'),
				'message' => $this->input->post('replyMessage'),
				'imageURL' => $imageURL,
				'datetime' => date("Y/m/d h:i:sa")
			);
			
			if($this->input->post('imageSwitchMsg') == 'on'){
				if (!$this->upload->do_upload('uploadImageMsg')) {
					$error = array('error' => $this->upload->display_errors());
					$data['error_message'] = "Error! your image is to big or not jpg";
					redirect('profileCtrl');
				} else {
					$this->profileModel->replyMessage($data, 'message');
				}
			} else {
				$this->profileModel->replyMessage($data, 'message');
			}
		}

		//Reject Invitation.
		public function rejectInvit(){
			$id = $this->input->post('id_invitation');
			$this->profileModel->deleteInvitation($id, 'invitation');
		}

		//Accept Invitation.
		public function accInvit(){
			$data = array(
				'id_relation' => 'NULL',
				'username' => $this->session->userdata('userTrack'),
				'classname' => $this->input->post('classname'),
				'typeRelation' => 'member'
			);
			$id = $this->input->post('id_invitation');
			$this->profileModel->acceptInvitation($data, $id);
			$data['success_join'] =  $this->input->post('classname');
			$this->index();
			$this->load->view('profile/index', $data);
		}

		//Update profile.
		public function updateProfile(){
			
		}

		//Sign out
		public function signOut(){
			$this->profileModel->offstatus('user');
		}
	}
?>
