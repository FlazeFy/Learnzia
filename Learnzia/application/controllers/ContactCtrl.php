<?php
	defined('BASEPATH') OR exit('No direct script access alowed');

	class ContactCtrl extends CI_Controller {
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
			$data['dataReply']= $this->ReplyModel->get_all_reply();
			$data['allStory']= $this->StoryModel->get_all_story();
			$this->load->view('contact/index', $data);
		}

		//Get selected contact profile
		public function getSelectedCntc()
		{
			return $data = $this->db->query('SELECT 
					user.id_user as id,
					user.username,
					user.status,
					user.imageURL
				FROM social JOIN user ON user.id_user = social.id_user_1 
				UNION SELECT
					user.id_user as id,
					user.username,
					user.status,
					user.imageURL
					FROM social JOIN user ON user.id_user = social.id_user_2');

			echo json_encode($data);
			exit;	
		}

		//Get message by selected contact
		public function getSelectedMsg()
		{
			$this->db->select('*');
			$this->db->from('message');
			$this->db->where('id_social', $this->session->userdata('set_id_social'));
			$this->db->order_by('datetime','ASC');
			$data = $this->db->get()->result_array();

			echo json_encode($data);
			exit;	
		}

		//Open chat by contact
		public function selectContact()
		{
			$id = $this->input->post('id_social');

			$this->session->set_userdata('set_id_social', $id);
			redirect('ContactCtrl');	
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
				'id_social' => $this->session->userdata('set_id_social'),
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
			redirect('ContactCtrl');
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
			redirect('ContactCtrl');
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
			redirect('ContactCtrl');
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
			redirect('ContactCtrl');
		}

		//Sign out
		public function signOut(){
			$this->UserModel->offstatus('user');
		}
	}
?>
