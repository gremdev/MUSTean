<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile_model extends CI_Model {

	public function check_username($username)
	{
		$info =  $this->db->select('id, username, fullname, profile_pic, about')
              ->from('user_info')
              ->where('username', $username)
              ->get()->row_object();
        return json_encode($info);
	}

	public function is_friend($username)
	{
		$my_id = $this->db->select('id')
						->from('user_info')
						->where('username', $username)
						->get()->row_object();
		$friend_stat = $this->db->select('status')
					->from('friends')
					->where('user', $this->id)
					->where('friend', $my_id->id)
					->get()->row_object();
		if ($friend_stat == NULL) {
			return "0";
		}
		else{
			return $friend_stat->status;
		}

	}

}