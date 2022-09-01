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
			$this->load->model('QuizModel');
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
			$data['allVoteStory']= $this->UpModel->get_all_vote_story();
			$data['dataReply']= $this->ReplyModel->get_all_reply();
			$data['allStory']= $this->StoryModel->get_all_story();
			$data['allQuiz']= $this->QuizModel->get_all_quiz();
			$data['allQQuestion']= $this->QuizModel->get_all_quiz_question();
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

		//New story
		public function sendStory(){
			$story_url = substr(md5(uniqid(mt_rand(), true)), 0, 20);
			
			$initialize = $this->upload->initialize(array(
				"upload_path" => './assets/uploads/story',
				"allowed_types" => 'jpg',
				"max_size" => 5000,
				"remove_spaces" => TRUE,
				"file_name" => $story_url
			));
			$data = array(
				'id_story' => 'NULL',
				'id_user' => $this->session->userdata('userIdTrack'),
				'story_caption' => $this->input->post('story_caption'),
				'story_type' => $this->input->post('story_type'),
				'story_url' => $story_url,
				'story_option_1' => 'null',
				'story_option_2' => 'null',
				'story_interact' => $this->input->post('story_interact'),
				'datetime' => date("Y/m/d h:i:sa"),
			);
			
			if (!$this->upload->do_upload('story_url')) {
				$data['error_message'] = "Your image is too big or not jpg!";
				$this->index();
				$this->load->view('home/index', $data);
			} else {
				$this->StoryModel->uploadStory($data, 'story');
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

		//downvote a reply, story, discussion
		public function downvote(){
			$this->db->where('id_up', $this->input->post('id_up'));
			$this->db->delete('up');
			redirect('HomeCtrl');
		}

		//Upvote a story
		public function upvoteStory(){
			//Check other option vote.
			$this->db->select('*');
			$this->db->from('up');
			$condition = array(
				'id_user' => $this->session->userdata('userIdTrack'), 
				'id_context' =>  $this->input->post('id_story'),
			);
			$this->db->where($condition);
			$this->db->like('up_type', 'story', 'after');
			$userCheck = $this->db->get()->result();

			//Downvote previous vote in other option.
			if(count($userCheck) == 1){
				foreach ($userCheck as $row)
				{
					$id = $row->id_up;
				}
				$this->db->where('id_up', $id);
				$this->db->delete('up');
			}
			$data = array(
				'id_up' => 'NULL',
				'id_context' => $this->input->post('id_story'),
				'id_user' => $this->session->userdata('userIdTrack'),
				'up_type' => 'story_'.$this->input->post('opt'),
			);
			$this->UpModel->insertVote($data, 'up');
			
			redirect('HomeCtrl');
		}

		//Verify a reply
		public function verifyRep(){
			$this->db->set('reply_status', 'verified');
			$this->db->where('id_reply', $this->input->post('id_reply'));
			$this->db->update('reply');
			redirect('HomeCtrl');
		}

		//Open quiz
		public function playquiz(){
			$this->session->set_userdata('quizIdTrack', $this->input->post('id_quiz'));
			$this->session->set_userdata('quiz_numberTrack', 1);
			redirect('QuizCtrl');
		}

		//Sign out
		public function signOut(){
			$this->UserModel->offstatus('user');
		}
	}
?>
