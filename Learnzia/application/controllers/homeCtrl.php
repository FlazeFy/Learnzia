<?php
	defined('BASEPATH') OR exit('No direct script access alowed');

	class homeCtrl extends CI_Controller {
		function __construct(){
			parent::__construct();
			$this->load->model('userModel');
			$this->load->model('discussionModel');
			$this->load->model('messageModel');
			$this->load->model('replyModel');
			$this->load->model('socialModel');
			$this->load->model('upModel');
		}	 
		public function index(){
			$data = [];
			$data['dataUser']= $this->userModel->get_data_user();
			$data['dataMessage']= $this->messageModel->get_all_message();
			$data['contacts']= $this->socialModel->get_only_contact();
			$data['allUser']= $this->userModel->get_all_user();
			$data['allDisc']= $this->discussionModel->get_all_disc();
			$data['allVoteDis']= $this->upModel->get_all_vote_dis();
			$data['allVoteRep']= $this->upModel->get_all_vote_rep();
			$data['dataReply']= $this->replyModel->get_all_reply();
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
					$this->discussionModel->uploadDisc($data, 'discussion');
				}
			} else {
				$this->discussionModel->uploadDisc($data, 'discussion');
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
					$this->replyModel->reply($data, 'reply');
				}
			} else {
				$this->replyModel->reply($data, 'reply');
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
					$this->messageModel->insertMessage($data, 'message');
				}
			} else {
				$this->messageModel->insertMessage($data, 'message');
			}
			redirect('homeCtrl');
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
				$this->messageModel->insertMessage($data, 'message');
			}
			redirect('homeCtrl');
		}

		//Upvote a discussion
		public function upvoteDis(){
			$data = array(
				'id_up' => 'NULL',
				'id_context' => $this->input->post('id_discussion'),
				'id_user' => $this->session->userdata('userIdTrack'),
				'up_type' => 'discussion',
			);
			$this->upModel->insertVote($data, 'up');
			redirect('homeCtrl');
		}

		//downvote a discussion
		public function downvoteDis(){
			$this->db->where('id_up', $this->input->post('id_up'));
			$this->db->delete('up');
			redirect('homeCtrl');
		}

		//Upvote a reply
		public function upvoteRep(){
			$data = array(
				'id_up' => 'NULL',
				'id_context' => $this->input->post('id_discussion'),
				'id_user' => $this->session->userdata('userIdTrack'),
				'up_type' => 'reply',
			);
			$this->upModel->insertVote($data, 'up');
			redirect('homeCtrl');
		}

		//downvote a reply
		public function downvoteRep(){
			$this->db->where('id_up', $this->input->post('id_up'));
			$this->db->delete('up');
			redirect('homeCtrl');
		}

		//Verify a reply
		public function verifyRep(){
			$this->db->set('reply_status', 'verified');
			$this->db->where('id_reply', $this->input->post('id_reply'));
			$this->db->update('reply');
			redirect('homeCtrl');
		}

		//Sign out
		public function signOut(){
			$this->userModel->offstatus('user');
		}
	}
?>
