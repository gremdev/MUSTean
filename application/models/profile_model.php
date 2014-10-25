<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile_model extends CI_Model {

	public function check_username($username)
	{
		$info =  $this->db->select('id, username, fullname, profile_pic, about, email, address, birthday, about, course, year')
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

	public function getmessageid($friend)
	{
		$message_id = $this->db->select('id')->from('convo')->where('user', $this->id)->where('friend', $friend)->get()->row_object();
		if (!empty($message_id->id) == true) {
			return $message_id;
		}
		else{
			return $this->db->select('id')->from('convo')->where('user', $friend)->where('friend', $this->id)->get()->row_object();
		}
	}

	public function edit_profile($data)
	{
		$check_pass = $this->db->select('id')
							->from('user_info')
							->where('username', $this->username)
							->where('password', md5($data['password']))
							->get()->row_object();
		if (!empty($check_pass) == true) {
			unset($data['password']);
			unset($data['profile']);
			$this->db->where('username', $this->username);
			$this->db->update('user_info', $data);
			header("location:".base_url($this->username."/edit/?success"));
		}
		else{
			header("location:".base_url($this->username."/edit/?invalid_pass_profile"));
		}
	}

	public function change_pass($data)
	{
		$check_pass = $this->db->select('id')->from('user_info')->where('username', $this->username)->where('password', md5($data['oldpassword']))->get()->row_object();
		if (!empty($check_pass) == true && $data['password'] == $data['confirm']) {
			unset($data['changepass']);
			$this->db->where('username',$this->username);
			$this->db->update('user_info', array("password"=>md5($data['password'])));
			header("location:".base_url($this->username."/edit/?success"));
		}
		else{
			header("location:".base_url($this->username."/edit/?invalid_pass_data"));
		}
	}

	public function upload($data)
	{
		$this->db->where('username', $this->username);
		$this->db->update('user_info', array('profile_pic' => 'public/uploads/'.$data));
	}

}