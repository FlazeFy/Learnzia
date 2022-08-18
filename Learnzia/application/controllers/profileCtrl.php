<?php
	defined('BASEPATH') OR exit('No direct script access alowed');

	class ProfileCtrl extends CI_Controller {
		function __construct(){
			parent::__construct();
			$this->load->model('UserModel');
			$this->load->model('DiscussionModel');
			$this->load->model('InvitationModel');
			$this->load->model('MessageModel');
			$this->load->model('ReplyModel');
			$this->load->model('SocialModel');
			$this->load->model('RelationModel');
			$this->load->model('UpModel');
			$this->load->model('ClassModel');
		}	 
		public function index(){
			$data = [];
			$data['dataUser']= $this->UserModel->get_data_user();
			$data['dataInvitation']= $this->InvitationModel->get_my_invitation();
			$data['dataMessage']= $this->MessageModel->get_all_message();
			$data['contacts']= $this->SocialModel->get_only_contact();
			$data['allUser']= $this->UserModel->get_all_user();
			$data['listClass']= $this->ClassModel->get_list_class();
			$data['listRel']= $this->RelationModel->get_list_relation();
			$data['allDisc']= $this->DiscussionModel->get_all_disc();
			$data['myReply']= $this->ReplyModel->get_my_reply();
			$data['allVoteDis']= $this->UpModel->get_all_vote_dis();
			$data['allVoteRep']= $this->UpModel->get_all_vote_rep();
			$data['dataReply']= $this->ReplyModel->get_all_reply();
			$data['myDiscussion']= $this->DiscussionModel->get_my_discussion();
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
					$this->ProfileModel->reply($data, 'reply');
				}
			} else {
				$this->ProfileModel->reply($data, 'reply');
			}
		}

		//Reject Invitation.
		public function rejectInvit(){
			$id = $this->input->post('id_invitation');
			$this->ProfileModel->deleteInvitation($id, 'invitation');
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
			$this->ProfileModel->acceptInvitation($data, $id);
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
			$this->UserModel->update_user($data, 'user');
			$data['success_message'] = "Account has been updated"; 
			$this->index();
			$this->load->view('profile/index', $data);
		}

		//Sign out
		public function signOut(){
			$this->ProfileModel->offstatus('user');
		}
	}
?>
