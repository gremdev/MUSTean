<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Signup_model extends CI_Model
{
	public function signup($data)
	{
		$this->db->insert('user_info', $data); 
		$user_id = $this->db->select('id')
				->from('user_info')
				->where('username', $data['username'])
				->get()->row_object();
		$friend_data = array('user' => $user_id->id, 'friend' => $user_id->id, 'status' => '1');
		$this->db->insert('friends', $friend_data);
	}
}