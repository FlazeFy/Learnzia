<?php 
	defined('BASEPATH') OR exit('No direct script access alowed');

	class UpModel extends CI_Model 
	{
		//Get question up & down vote
		public function get_all_vote_dis()
		{
			$this->db->select('up.id_up ,up.id_user as id_user, up.id_context');
			$this->db->from('up');
			$this->db->join('discussion','discussion.id_discussion = up.id_context');
			$this->db->join('user','user.id_user = up.id_user');
			$this->db->where('up.up_type', 'discussion');
			return $data = $this->db->get()->result_array();
		}

		//Get reply up & down vote
		public function get_all_vote_rep()
		{
			$this->db->select('up.id_up ,up.id_user as id_user, up.id_context');
			$this->db->from('up');
			$this->db->join('reply','reply.id_reply = up.id_context');
			$this->db->join('user','user.id_user = up.id_user');
			$this->db->where('up.up_type', 'reply');
			return $data = $this->db->get()->result_array();
		}

		//Get story up & down vote
		public function get_all_vote_story()
		{
			$this->db->select('up.id_up ,up.id_user as id_user, up.id_context, up.up_type');
			$this->db->from('up');
			$this->db->join('story','story.id_story = up.id_context');
			$this->db->join('user','user.id_user = up.id_user');
			$this->db->where('up.up_type', 'story_1');
			$this->db->or_where('up.up_type', 'story_2');
			return $data = $this->db->get()->result_array();
		}

		//Insert vote.
		public function insertVote($data){
			$this->db->insert('up',$data);	
		}
	}
?>
