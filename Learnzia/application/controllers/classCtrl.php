<?php
	defined('BASEPATH') OR exit('No direct script access alowed');

	class classCtrl extends CI_Controller {
		function __construct(){
			parent::__construct();
			$this->load->model('classModel');
		}	 
		public function index(){
			$data = [];
			$data['dataUser']= $this->classModel->get_data_user();
			$data['dataMessage']= $this->classModel->get_all_message();
			$data['dataDiscussion']= $this->classModel->get_my_discussion();
			$data['contacts']= $this->classModel->get_only_contact();
			$data['listUser']= $this->classModel->get_list_user();
			$data['listClass']= $this->classModel->get_list_class();
			$data['listRel']= $this->classModel->get_list_relation();
			$data['discHistory']= $this->classModel->get_all_history();
			$data['discMath']= $this->classModel->get_all_math();
			$data['dataClassForumMsg']= $this->classModel->get_all_classForumMessage();
			$data['dataReply']= $this->classModel->get_all_reply();
			$data['dataReplyWCat']= $this->classModel->get_all_replyWCat();
			$this->load->view('classView', $data);
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
			$this->classModel->posting($data, 'message');
			redirect('classCtrl');
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
					$this->classModel->reply($data, 'reply');
				}
			} else {
				$this->classModel->reply($data, 'reply');
			}
		}
		//Send reply message
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
					redirect('classCtrl');
				} else {
					$this->classModel->replyMessage($data, 'message');
				}
			} else {
				$this->classModel->replyMessage($data, 'message');
			}
		}
		//Send Invitation
		public function sendInvitation(){
			$data = array(
				'id_invitation' => 'NULL',
				'sender' => $this->session->userdata('userTrack'),
				'receiver' => $this->input->post('receiver'),
				'type' => $this->input->post('typeInvitation'),
				'datetime' => date("Y/m/d h:i:sa")
			);
			$this->db->select('*');
			$this->db->from('relation');
			$this->db->where('classname', $this->input->post('typeInvitation'));
			$this->db->where('username', $this->input->post('receiver'));
			$userCheck = $this->db->get()->result();
			if(count($userCheck) == 0){
				$this->classModel->insertInvitation($data, 'invitation');
				$data['success_messageInvitation1'] =  $this->input->post('receiver');
				$this->index();
				$this->load->view('classView', $data);
			} else {
				$data['error_messageInvitation1'] =  $this->input->post('receiver');
				$this->index();
				$this->load->view('classView', $data);
			}
		}
		//Send chat in main channel
		public function sendMainChat(){
			if($this->input->post('imageSwitchMain') == 'on'){
				$date = date("Ymdhis");
				$username = $this->session->userdata('userTrack');
				$classname = $this->session->userdata('classTrack');
				$channel = $this->input->post('channel');
				$imageURL = $username. '' .$classname. '' .$channel. '' .$date;
			} else {
				$imageURL = 'null';
			}
			$initialize = $this->upload->initialize(array(
				"upload_path" => './assets/uploads/channel',
				"allowed_types" => 'jpg',
				"max_size" => 2000,
				"remove_spaces" => TRUE,
				"file_name" => 'main_' . $imageURL
			));
			$data = array(
				'id_message' => 'NULL',
				'sender' => $this->session->userdata('userTrack'),
				'text' => $this->input->post('messagetext'),
				'classname' => $this->session->userdata('classTrack'),
				'channel' => $this->input->post('channel'),
				'imageURL' => $imageURL,
				'datetime' => date("Y/m/d h:i:sa")
			);
			
			if($this->input->post('imageSwitchMain') == 'on'){
				if (!$this->upload->do_upload('uploadImageMainChat')) {
					$error = array('error' => $this->upload->display_errors());
					$data['error_message'] = "Error! your image is to big or not jpg";
					redirect('classCtrl');
				} else {
					$this->classModel->insertMainMsg($data, 'classforummessage');
				}
			} else {
				$this->classModel->insertMainMsg($data, 'classforummessage');
			}
		}

		//Sign out
		public function signOut(){
			$this->classModel->offstatus('user');
		}
	}
?>
