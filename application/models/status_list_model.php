<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Status_list_model extends CI_Model
{
	public function newsfeed()
	{
		return $this->db->select('b.id, b.body, b.date_posted, b.photo, c.username, c.fullname, c.profile_pic')
					->from('friends as a')
					->join('posts as b', 'b.user_id = a.friend')
					->join('user_info as c', 'c.id = a.friend')
					->where('a.user', $this->id)
					->where('status', '1')
					->order_by('date_posted', 'desc')
					->limit(10)
					->get()->result_object();

		// $data = $this->db->select('a.friend, b.id, b.body, b.date_posted, b.photo, c.username, c.fullname, c.profile_pic')
		// 			->from('friends as a')
		// 			->join('posts as b', 'b.user_id = a.friend')
		// 			->join('user_info as c', 'c.id = a.friend')
		// 			->where('a.user', $this->id)
		// 			->where('status', '1')
		// 			->order_by('date_posted', 'desc')
		// 			->limit(10)
		// 			->get()->result_array();
		// return json_encode($data);
	}

	public function like_counter($post_id)
	{
			return $this->db->select('*')
				->from('likes')
				->where('post_id', $post_id)
				->get()->result_array();
	}

	public function comment_counter($post_id)
	{
			return $this->db->select('*')
				->from('comments')
				->where('post_id', $post_id)
				->get()->result_array();
	}

	public function profile()
	{

	}
}