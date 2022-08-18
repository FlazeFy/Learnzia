<?php
	defined('BASEPATH') OR exit('No direct script access alowed');

	class ClassCtrl extends CI_Controller {
		function __construct(){
			parent::__construct();
			$this->load->model('ClassModel');
			$this->load->model('UserModel');
			$this->load->model('DiscussionModel');
			$this->load->model('ChannelModel');
			$this->load->model('MessageModel');
			$this->load->model('SocialModel');
			$this->load->model('RelationModel');
			$this->load->model('ClassModel');
		}	 
		public function index(){
			$data = [];
			$data['allUser']= $this->UserModel->get_data_user();
			$data['dataMessage']= $this->MessageModel->get_all_message();
			$data['contacts']= $this->SocialModel->get_only_contact();
			$data['listChannel']= $this->ChannelModel->get_list_channel();
			$data['listClass']= $this->ClassModel->get_list_class();
			$data['listRel']= $this->RelationModel->get_list_relation();
			$data['myRel']= $this->RelationModel->get_my_relation();
			$data['listActivity']= $this->ClassModel->get_list_activity();
			$data['dataClassForumMsg']= $this->ClassModel->get_all_classForumMessage();
			$this->load->view('class/index', $data);
		}
		
		//Navigate channel
		public function selectChannel()
		{
			$id = $this->input->post('id_channel');

			$this->session->set_userdata('channelTrack',$id);
			redirect('ClassCtrl');	
		}

		//Create class's channel
		public function createChannel(){
			//Check available channel's name
			$this->db->select('*');
			$this->db->from('channel');
			$this->db->where('channel_name', $this->input->post('channel_name'));
			$channelCheck = $this->db->get()->result();

			if((count($channelCheck) == 0)&&($this->input->post('channel_name') != "Manage Channel")&&($this->input->post('channel_name') != "Main")){
				//Channel's table data.
				$data = array(
					'id_channel' => 'NULL',
					'id_classroom' => $this->session->userdata('classIdTrack'),
					'id_user' => $this->session->userdata('userIdTrack'),
					'channel_name' => $this->input->post('channel_name'),
					'channel_description' => $this->input->post('channel_description'),
					'datetime' => date("Y/m/d h:i:sa")
				);
				
				$this->ClassModel->insertChannel($data, 'channel');

				//Class activity
				$data2 = array(
					'id_activity' => 'NULL',
					'id_user' => $this->session->userdata('userIdTrack'),
					'id_classroom' => $this->session->userdata('classIdTrack'),
					'context' => $this->session->userdata('userTrack')." created a new channel called ".$this->input->post('channel_name'),
					'datetime' => date("Y/m/d h:i:sa")
				);

				$this->ClassModel->insertActivity($data2, 'classroom-activity');

				//Result.
				$data['success_message'] = "Successfully created '".$this->input->post('channel_name')."' channel";
				$this->index();
				$this->load->view('classView', $data);	
			} else {
				$data['error_message'] = "Channel's name already been taken!";
				$this->index();
				$this->load->view('classView', $data);	
			}
		}

		//Send chat in channel
		public function sendMainChat(){
			if($this->input->post('imageSwitchMain') == 'on'){
				$date = date("Ymdhis");
				$username = $this->session->userdata('userTrack');
				$classname = $this->session->userdata('classTrack');
				$channel = $this->session->userdata('channelTrack');
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
				'id_user' => $this->session->userdata('userIdTrack'),
				'text' => $this->input->post('messagetext'),
				'id_classroom' => $this->session->userdata('classIdTrack'),
				'id_channel' => $this->session->userdata('channelTrack'),
				'imageURL' => $imageURL,
				'datetime' => date("Y/m/d h:i:sa")
			);
			
			if($this->input->post('imageSwitchMain') == 'on'){
				if (!$this->upload->do_upload('uploadImageMainChat')) {
					$error = array('error' => $this->upload->display_errors());
					$data['error_message'] = "Error! your image is to big or not jpg";
					redirect('ClassCtrl');
				} else {
					$this->MessageModel->insertMainMsg($data, 'classforummessage');
				}
			} else {
				$this->MessageModel->insertMainMsg($data, 'classforummessage');
			}
		}

		//Delete channel
		public function deleteChannel(){
			$id_channel = $this->input->post('id_channel');
			$channel_name = $this->input->post('channel_name');

			$this->db->select('*');
			$this->db->from('channel');
			$condition = array('channel_name' => $channel_name, 'id_channel' => $id_channel);
			$this->db->where($condition);
			$channelCheck = $this->db->get()->result();
			if(count($channelCheck) != 0){
				//Delete channel
				$this->db->where('id_channel', $id_channel);
				$this->db->delete('channel');

				//Delete channel's message
				$this->db->where('id_channel', $id_channel);
				$this->db->delete('classforummessage');

				//Class activity
				$data2 = array(
					'id_activity' => 'NULL',
					'id_user' => $this->session->userdata('userIdTrack'),
					'id_classroom' => $this->session->userdata('classIdTrack'),
					'context' => $this->session->userdata('userTrack')." deleted ".$channel_name." channel",
					'datetime' => date("Y/m/d h:i:sa")
				);

				$this->ClassModel->insertActivity($data2, 'classroom-activity');

				//Result.
				$data['success_message'] = "Successfully deleted '".$channel_name."' channel";
				$this->index();
				$this->load->view('classView', $data);	
			} else {
				$data['error_message'] = "Delete failed. Please input same channel name!";
				$this->index();
				$this->load->view('classView', $data);	
			}
		}

		//Edit channel
		public function editChannel(){
			$channel_name = $this->input->post('channel_name');

			$data = [
				"channel_name" => $channel_name,
				"channel_description" => $this->input->post('channel_description'),
			];

			$this->ChannelModel->updateChannel($data, 'channel');

			//Class activity
			$data2 = array(
				'id_activity' => 'NULL',
				'id_user' => $this->session->userdata('userIdTrack'),
				'id_classroom' => $this->session->userdata('classIdTrack'),
				'context' => $this->session->userdata('userTrack')." has changed ".$channel_name." channel's profile",
				'datetime' => date("Y/m/d h:i:sa")
			);

			$this->ClassModel->insertActivity($data2, 'classroom-activity');

			//Result.
			$data['success_message'] = "Successfully update '".$channel_name." channel";
			$this->index();
			$this->load->view('classView', $data);
		}

		//Update class profile
		public function updateClassData(){
			$classname = $this->input->post('classname');
			$data = [
				"classname" => $classname,
				"category" => $this->input->post('category'),
				"description" => $this->input->post('description'),
				"type" => $this->input->post('type'),
			];

			$this->ClassModel->updateClass($data, 'classroom');
			$this->session->set_userdata('classTrack', $classname);

			//Class activity
			$data2 = array(
				'id_activity' => 'NULL',
				'id_user' => $this->session->userdata('userIdTrack'),
				'id_classroom' => $this->session->userdata('classIdTrack'),
				'context' => $this->session->userdata('userTrack')." has changed ".$classname." profile",
				'datetime' => date("Y/m/d h:i:sa")
			);

			$this->ClassModel->insertActivity($data2, 'classroom-activity');

			//Result.
			$data['success_message'] = "Successfully update ".$classname." class";
			$this->index();
			$this->load->view('classView', $data);
		}

		//Sign out
		public function signOut(){
			$this->ClassModel->offstatus('user');
		}
	}
?>
