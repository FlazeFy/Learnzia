<?php
	defined('BASEPATH') OR exit('No direct script access alowed');

	class HomeCtrl extends CI_Controller {
		function __construct(){
			parent::__construct();
			$this->load->model('UserModel');
			$this->load->model('DiscussionModel');
			$this->load->model('MessageModel');
			$this->load->model('ReplyModel');
			$this->load->model('SocialModel');
			$this->load->model('UpModel');
			$this->load->model('StoryModel');
		}	 
		public function index(){
			$data = [];
			$data['dataUser']= $this->UserModel->get_data_user();
			$data['dataMessage']= $this->MessageModel->get_all_message();
			$data['contacts']= $this->SocialModel->get_only_contact();
			$data['allUser']= $this->UserModel->get_all_user();
			$data['allDisc']= $this->DiscussionModel->get_all_disc();
			$data['allVoteDis']= $this->UpModel->get_all_vote_dis();
			$data['allVoteRep']= $this->UpModel->get_all_vote_rep();
			$data['dataReply']= $this->ReplyModel->get_all_reply();
			$data['allStory']= $this->StoryModel->get_all_story();
			$this->load->view('home/index', $data);
		}

		//New discussion
		public function sendDisc(){
			if($this->input->post('imageSwitch') == 'on'){
				$date = date("Ymdhis");
				$username = $this->session->userdata('userTrack');
				$imageURL = substr(md5(uniqid(mt_rand(), true)), 0, 30);
			} else {
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
				'id_user' => $this->session->userdata('userIdTrack'),
				'category' => $this->input->post('category'),
				'subject' => $this->input->post('subject'),
				'question' => $this->input->post('question'),
				'datetime' => date("Y/m/d h:i:sa"),
				'discussion_image' => $imageURL
			);
			
			if($this->input->post('imageSwitch') == 'on'){
				if (!$this->upload->do_upload('uploadImage')) {
					$data['error_message'] = "Your image is too big or not jpg!";
					$this->index();
					$this->load->view('home/index', $data);
				} else {
					$this->DiscussionModel->uploadDisc($data, 'discussion');
				}
			} else {
				$this->DiscussionModel->uploadDisc($data, 'discussion');
			} 
		}

		//Reply discussion
		public function sendReply(){
			if($this->input->post('imageSwitchR') == 'on'){
				$date = date("Ymdhis");
				$username = $this->session->userdata('userTrack');
				$imageURL = substr(md5(uniqid(mt_rand(), true)), 0, 30);
			} else {
				$imageURL = 'null';
			}
			$initialize = $this->upload->initialize(array(
				"upload_path" => './assets/uploads/reply',
				"allowed_types" => 'jpg',
				"max_size" => 5000,
				"remove_spaces" => TRUE,
				"file_name" => 'reply_' . $imageURL
			));
			$data = array(
				'id_reply' => 'NULL',
				'id_discussion' => $this->input->post('id_discussion'),
				'id_user' => $this->session->userdata('userIdTrack'),
				'replytext' => $this->input->post('replytext'),
				'datetime' => date("Y/m/d h:i:sa"),
				'reply_image' => $imageURL,
				'reply_status' => 'null'
			);
			
			if($this->input->post('imageSwitchR') == 'on'){
				if (!$this->upload->do_upload('uploadImageR')) {
					$data['error_message'] = "Your image is too big or not jpg!";
					$this->index();
					$this->load->view('home/index', $data);
				} else {
					$this->ReplyModel->reply($data, 'reply');
				}
			} else {
				$this->ReplyModel->reply($data, 'reply');
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
				'message_image' => $imageURL,
				'datetime' => date("Y/m/d h:i:sa")
			);
			
			if($this->input->post('imageSwitchMsg') == 'on'){
				if (!$this->upload->do_upload('uploadImageMsg')) {
					$data['error_message'] = "Your image is to big or not jpg";
					$this->index();
					$this->load->view('home/index', $data);
				} else {
					$this->MessageModel->insertMessage($data, 'message');
				}
			} else {
				$this->MessageModel->insertMessage($data, 'message');
			}
			redirect('HomeCtrl');
		}

		//Share discussion
		public function shareDisc(){
			$contact = $this->input->post('id_social[]');		
			for($i = 0; $i < count($contact); $i++){	
				$data = array(
					'id_message' => 'NULL',
					'id_social' => $contact[$i],
					'id_user_sender' => $this->session->userdata('userIdTrack'),
					'message' => $this->input->post('id_discussion'),
					'message_image' => 'discussion',
					'datetime' => date("Y/m/d h:i:sa")
				);
				$this->MessageModel->insertMessage($data, 'message');
			}
			redirect('HomeCtrl');
		}

		//Share story
		public function shareStory(){
			$contact = $this->input->post('id_social[]');		
			for($i = 0; $i < count($contact); $i++){	
				$data = array(
					'id_message' => 'NULL',
					'id_social' => $contact[$i],
					'id_user_sender' => $this->session->userdata('userIdTrack'),
					'message' => $this->input->post('id_story'),
					'message_image' => 'story',
					'datetime' => date("Y/m/d h:i:sa")
				);
				$this->MessageModel->insertMessage($data, 'message');
			}
			redirect('HomeCtrl');
		}

		//Share reply
		public function shareRep(){
			$contact = $this->input->post('id_social[]');		
			for($i = 0; $i < count($contact); $i++){	
				$data = array(
					'id_message' => 'NULL',
					'id_social' => $contact[$i],
					'id_user_sender' => $this->session->userdata('userIdTrack'),
					'message' => $this->input->post('id_reply'),
					'message_image' => 'reply',
					'datetime' => date("Y/m/d h:i:sa")
				);
				$this->MessageModel->insertMessage($data, 'message');
			}
			redirect('HomeCtrl');
		}

		//Upvote a discussion
		public function upvoteDis(){
			$data = array(
				'id_up' => 'NULL',
				'id_context' => $this->input->post('id_discussion'),
				'id_user' => $this->session->userdata('userIdTrack'),
				'up_type' => 'discussion',
			);
			$this->UpModel->insertVote($data, 'up');
			redirect('HomeCtrl');
		}

		//downvote a discussion
		public function downvoteDis(){
			$this->db->where('id_up', $this->input->post('id_up'));
			$this->db->delete('up');
			redirect('HomeCtrl');
		}

		//Upvote a reply
		public function upvoteRep(){
			$data = array(
				'id_up' => 'NULL',
				'id_context' => $this->input->post('id_discussion'),
				'id_user' => $this->session->userdata('userIdTrack'),
				'up_type' => 'reply',
			);
			$this->UpModel->insertVote($data, 'up');
			redirect('HomeCtrl');
		}

		//downvote a reply
		public function downvoteRep(){
			$this->db->where('id_up', $this->input->post('id_up'));
			$this->db->delete('up');
			redirect('HomeCtrl');
		}

		//Verify a reply
		public function verifyRep(){
			$this->db->set('reply_status', 'verified');
			$this->db->where('id_reply', $this->input->post('id_reply'));
			$this->db->update('reply');
			redirect('HomeCtrl');
		}

		//Sign out
		public function signOut(){
			$this->UserModel->offstatus('user');
		}
	}
?>
