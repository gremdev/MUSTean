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
		return $this->db->select('status, id')
					->from('friends')
					->where('user', $this->id)
					->where('friend', $my_id->id)
					->get()->row_object();

	}

}