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
			$data['contacts']= $this->classModel->get_only_contact();
			$data['listUser']= $this->classModel->get_list_user();
			$data['listChannel']= $this->classModel->get_list_channel();
			$data['listClass']= $this->classModel->get_list_class();
			$data['listRel']= $this->classModel->get_list_relation();
			$data['myRel']= $this->classModel->get_my_relation();
			$data['listActivity']= $this->classModel->get_list_activity();
			$data['dataClassForumMsg']= $this->classModel->get_all_classForumMessage();
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
		
		//Navigate channel
		public function selectChannel()
		{
			$id = $this->input->post('id_channel');

			$this->session->set_userdata('channelTrack',$id);
			redirect('classCtrl');	
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
				
				$this->classModel->insertChannel($data, 'channel');

				//Class activity
				$data2 = array(
					'id_activity' => 'NULL',
					'id_user' => $this->session->userdata('userIdTrack'),
					'id_classroom' => $this->session->userdata('classIdTrack'),
					'context' => $this->session->userdata('userTrack')." created a new channel called ".$this->input->post('channel_name'),
					'datetime' => date("Y/m/d h:i:sa")
				);

				$this->classModel->insertActivity($data2, 'classroom-activity');

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
					redirect('classCtrl');
				} else {
					$this->classModel->insertMainMsg($data, 'classforummessage');
				}
			} else {
				$this->classModel->insertMainMsg($data, 'classforummessage');
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

				$this->classModel->insertActivity($data2, 'classroom-activity');

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

			$this->classModel->updateChannel($data, 'channel');

			//Class activity
			$data2 = array(
				'id_activity' => 'NULL',
				'id_user' => $this->session->userdata('userIdTrack'),
				'id_classroom' => $this->session->userdata('classIdTrack'),
				'context' => $this->session->userdata('userTrack')." has changed ".$channel_name." channel's profile",
				'datetime' => date("Y/m/d h:i:sa")
			);

			$this->classModel->insertActivity($data2, 'classroom-activity');

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

			$this->classModel->updateClass($data, 'classroom');
			$this->session->set_userdata('classTrack', $classname);

			//Class activity
			$data2 = array(
				'id_activity' => 'NULL',
				'id_user' => $this->session->userdata('userIdTrack'),
				'id_classroom' => $this->session->userdata('classIdTrack'),
				'context' => $this->session->userdata('userTrack')." has changed ".$classname." profile",
				'datetime' => date("Y/m/d h:i:sa")
			);

			$this->classModel->insertActivity($data2, 'classroom-activity');

			//Result.
			$data['success_message'] = "Successfully update ".$classname." class";
			$this->index();
			$this->load->view('classView', $data);
		}

		//Sign out
		public function signOut(){
			$this->classModel->offstatus('user');
		}
	}
?>
