<?php
	defined('BASEPATH') OR exit('No direct script access alowed');

	class GlobalCtrl extends CI_Controller {
		function __construct(){
			parent::__construct();
			$this->load->model('UserModel');
			$this->load->model('DiscussionModel');
			$this->load->model('MessageModel');
			$this->load->model('ReplyModel');
			$this->load->model('SocialModel');
			$this->load->model('UpModel');
			$this->load->model('ClassModel');
			$this->load->model('RelationModel');
		}	 

		public function index(){
			$data = [];
			$data['dataUser']= $this->UserModel->get_data_user();
			$data['dataMessage']= $this->MessageModel->get_all_message();
			$data['allDisc']= $this->DiscussionModel->get_all_disc();
			$data['contacts']= $this->SocialModel->get_only_contact();
			$data['allUser']= $this->UserModel->get_all_user();
			$data['listClass']= $this->ClassModel->get_list_class();
			$data['listRel']= $this->RelationModel->get_list_relation();
			$data['dataReply']= $this->ReplyModel->get_all_reply();
			$data['content']= $this->browseContent();
			//$data['dataReplyWCat']= $this->globalModel->get_all_replyWCat();
			$this->load->view('global/index', $data);
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
					$this->load->view('global/index', $data);
				} else {
					$this->ReplyModel->reply($data, 'reply');
				}
			} else {
				$this->ReplyModel->reply($data, 'reply');
			}
		}

		public function browseContent(){
			return $data = $this->db->query('SELECT 
					discussion.id_discussion as id,
					discussion.id_user as id_user,
					discussion.datetime as created_at,
					discussion.category as category,
					discussion.subject as description,
					discussion.question as body,
					discussion.discussion_image as image_url,
					user.username as username,
					user.imageURL as image_user,
					1 as cat 
				FROM discussion JOIN user ON user.id_user = discussion.id_user 
				UNION SELECT classroom.id_classroom as id,
					null as id_user,
					classroom.date as created_at,
					classroom.category as category,	
					classroom.description as description,
					classroom.type as body,
					classroom.imageURL as image_url,
					classroom.classname as username,
					null as image_user,
					2 as cat FROM classroom');
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
					$this->load->view('global/index', $data);
				} else {
					$this->MessageModel->insertMessage($data, 'message');
				}
			} else {
				$this->MessageModel->insertMessage($data, 'message');
			}
			redirect('GlobalCtrl');
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
			redirect('GlobalCtrl');
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
			redirect('GlobalCtrl');
		}

		//downvote a discussion
		public function downvoteDis(){
			$this->db->where('id_up', $this->input->post('id_up'));
			$this->db->delete('up');
			redirect('GlobalCtrl');
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
			redirect('GlobalCtrl');
		}

		//downvote a reply
		public function downvoteRep(){
			$this->db->where('id_up', $this->input->post('id_up'));
			$this->db->delete('up');
			redirect('GlobalCtrl');
		}

		//Verify a reply
		public function verifyRep(){
			$this->db->set('reply_status', 'verified');
			$this->db->where('id_reply', $this->input->post('id_reply'));
			$this->db->update('reply');
			redirect('GlobalCtrl');
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
					$data['error_message'] = "Your image is to big or not jpg";
					$this->index();
					$this->load->view('home/index', $data);
				} else {
					$this->ClassModel->insertClass($data, $data2);
				}
			} else {
				$this->ClassModel->insertClass($data, $data2);
			}
		}

		//Send Invitation
		public function sendInvitation(){
			$data = array(
				'id_invitation' => 'NULL',
				'id_user_sender' => $this->session->userdata('userIdTrack'),
				'id_user_receiver' => $this->input->post('receiverId'),
				'type' => $this->input->post('typeInvitation'),
				'datetime' => date("Y/m/d h:i:sa")
			);

			$this->db->select('*');
			$this->db->from('relation');
			$this->db->where('classname', $this->input->post('typeInvitation'));
			$this->db->where('username', $this->input->post('receiverId'));
			$userCheck = $this->db->get()->result();

			if(count($userCheck) == 0){
				$this->ClassModel->insertInvitation($data, 'invitation');
				$data['success_message'] = "Invitation has been sended";
				$this->index();
				$this->load->view('global/index', $data);
			} else {
				$data['error_message'] =  "This user already been invited";
				$this->index();
				$this->load->view('global/index', $data);
			}
		}

		//Open class.
		public function openClass(){
			$this->db->select('id_classroom');
			$this->db->from('classroom');
			$this->db->where('classname', $this->input->post('visitClass'));
			$query = $this->db->get();

			foreach ($query->result() as $row)
			{
				$id = $row->id_classroom;
			}

			$this->session->set_userdata('classTrack', $this->input->post('visitClass'));
			$this->session->set_userdata('classIdTrack', $id);
			$this->session->set_userdata('channelTrack', 0);
			redirect("ClassCtrl");
		}

		//Sign out
		public function signOut(){
			$this->UserModel->offstatus('user');
		}
	}
?>
