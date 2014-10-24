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
}