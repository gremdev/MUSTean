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

	public function check_if_liked($id)
	{
		$status_id = $this->db->select('id')
				->from('posts')
				->where('id', $id)
				->get()->result();

		if (count($status_id) == 1)
		{

			$is_liked = $this->db->select('id')
				->from('likes')
				->where('user_id', $this->id)
				->where('post_id', $id)
				->get()->result();
			return count($is_liked);
			
		}
		else
		{
			return 'error! post not found..';
		}

	}

	public function like($id)
	{
		$test = $this->db->select('user_id')
				->from('posts')
				->where('id', $id)
				->get()->result();

		if ($test[0]->user_id == $this->id) {
			$data = array(
			   'post_id' => $id,
			   'user_id' => $this->id,
			   'notif'	 => '1',
			   'date'	 => date("Y-m-d H:i:s")
			);

			$this->db->insert('likes', $data); 
		}
		else{
			$data = array(
			   'post_id' => $id,
			   'user_id' => $this->id,
			   'date'	=> date("Y-m-d H:i:s")
			);

			$this->db->insert('likes', $data); 
		}
		
		return "success, liked";
	}

	public function unlike($id)
	{
		$this->db->delete('likes', array('post_id' => $id, 'user_id' => $this->id));
		return "success, unliked"; 
	}
}