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
			$this->load->model('relationModel');
			$this->load->model('upModel');
			$this->load->model('classModel');
		}	 
		public function index(){
			$data = [];
			$data['dataUser']= $this->userModel->get_data_user();
			$data['dataInvitation']= $this->invitationModel->get_my_invitation();
			$data['dataMessage']= $this->messageModel->get_all_message();
			$data['contacts']= $this->socialModel->get_only_contact();
			$data['allUser']= $this->userModel->get_all_user();
			$data['listClass']= $this->classModel->get_list_class();
			$data['listRel']= $this->relationModel->get_list_relation();
			$data['allDisc']= $this->discussionModel->get_all_disc();
			$data['myReply']= $this->replyModel->get_my_reply();
			$data['allVoteDis']= $this->upModel->get_all_vote_dis();
			$data['allVoteRep']= $this->upModel->get_all_vote_rep();
			$data['dataReply']= $this->replyModel->get_all_reply();
			$data['myDiscussion']= $this->discussionModel->get_my_discussion();
			$this->load->view('profile/index', $data);
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
			$data = [
				"fullname" => $this->input->post('fullname'),
				"description" => $this->input->post('description'),
				"password" => $this->input->post('password'),
			];
			$this->userModel->update_user($data, 'user');
			$data['success_message'] = "Account has been updated"; 
			$this->index();
			$this->load->view('profile/index', $data);
		}

		//Sign out
		public function signOut(){
			$this->profileModel->offstatus('user');
		}
	}
?>
