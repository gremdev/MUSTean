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
					->get()->result_object();
	}

	public function single_post($post_id)
	{
		return $this->db->select('a.id, a.body, a.date_posted, a.photo, b.username, b.fullname, b.profile_pic')
						->from('posts as a')
						->join('user_info as b', 'b.id = a.user_id')
						->where('a.id', $post_id)
						->get()->row_object();
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

	public function profile($username)
	{
		$profile = $this->db->select('a.id, a.fullname, a.username, a.profile_pic, b.id, b.body, b.date_posted, b.photo')
							->from('user_info as a')
							->join('posts as b', 'b.user_id = a.id')
							->where('a.username', $username)
							->order_by('b.date_posted', 'desc')
							->get()->result_object();
					return json_encode($profile);
	}

	public function friend($username)
	{
		$my = $this->db->select('id')
						   ->from('user_info')
						   ->where('username', $username)
						   ->get()->row_object();
		$friends = $this->db->select('friend, username, fullname, profile_pic')
							->from('friends')
							->join('user_info', 'user_info.id = friend')
							->where('user', $my->id)
							->where('status', '1')
							->where('friend !=', $my->id)
							->get()->result_object();
		return json_encode($friends);
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

	public function getcomments($id)
	{
		$comments = $this->db->select('a.comment, a.notif, a.date, b.username, b.fullname, b.profile_pic')
							 ->from('comments as a')
							 ->join('user_info as b', 'b.id = a.user_id')
							 ->where('a.post_id', $id)
							 ->order_by('date', 'asc')
							 ->get()->result_array();
							 return json_encode($comments);
	}
	public function newcomment($comment, $post_id)
	{
		$data = array('comment' => $comment, 'post_id' => $post_id, 'date' => date("Y-m-d H:i:s"), 'user_id' => $this->id);
		$this->db->insert('comments', $data);
	}

	public function getpms($message_id)
	{
		$msg_data = $this->db->select('message, date, fullname, profile_pic, username')
							->from('messages')
							->join('user_info', 'user_info.id = messages.user || user_info.id = messages.friend')
							->where('convo_id', $message_id)
							->order_by('date', 'ASC')
							->get()->result_object();
		$test = $this->db->select('id')->from('convo')->where('user', $this->id)->get()->row_object();
		if (!empty($test->id) == true) {
			$this->db->where('id', $message_id);
			$this->db->update('convo', array('notif_1' => '0'));
		}
		else{
			$this->db->where('id', $message_id);
			$this->db->update('convo', array('notif_2' => '0'));
		}
		return json_encode($msg_data);
	}

	public function newpm($pm, $message_id)
	{
		$test = $this->db->select('id')->from('convo')->where('user', $this->id)->get()->row_object();
		if (!empty($test->id) == true) {
			$this->db->insert('messages', array('user' => $this->id, 'message' => $pm, 'date' => date("Y-m-d H:i:s"), 'convo_id' => $message_id));
			$this->db->where('id', $message_id);
			$this->db->update('convo', array('notif_1' => '1'));	
		}
		else{
			$this->db->insert('messages', array('friend' => $this->id, 'message' => $pm, 'date' => date("Y-m-d H:i:s"), 'convo_id' => $message_id));
			$this->db->where('id', $message_id);
			$this->db->update('convo', array('notif_2' => '1'));
		}
	}

	public function users()
	{
		$users = $this->db->select('username')
						->from('user_info')
						->get()->result_object();
						return $users;
	}
}