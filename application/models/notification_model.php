<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Notification_model extends CI_Model
{
	public function friendrequest()
	{
		$request = $this->db->select('a.friend, b.username, b.fullname')
			->from('friends as a')
			->join('user_info as b', 'b.id = a.friend')
			->where('user', $this->id)
			->where('status', '3')
			->get()->result_array();

		return json_encode($request);
	}

	public function personal_msg()
	{
		$pm = $this->db->select('username, fullname')
					->from('convo')
					->join('user_info', 'user_info.id = friend')
					->where('user', $this->id)
					->where('notif_1', '1')
					->get()->result_object();
		if (!empty($pm) == true) {
			return json_encode($pm);
		}
		else{
			$pm = $this->db->select('username, fullname')
					->from('convo')
					->join('user_info', 'user_info.id = user')
					->where('friend', $this->id)
					->where('notif_2', '1')
					->get()->result_object();
			return json_encode($pm);
		}
	}
}