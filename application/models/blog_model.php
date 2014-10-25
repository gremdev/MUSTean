<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Blog_model extends CI_Model {

	public function newpost($data)
	{
		$data['date'] = date("Y-m-d H:i:s");
		$data['blogger'] = $this->id;
		$this->db->insert('blog', $data);

		header("location:" . base_url()."blog/new/?success");
	}

	public function posts()
	{
		$posts = $this->db->select('a.id, a.title, a.date, a.body, b.fullname, b.username')
						->from('blog as a')
						->join('user_info as b', 'b.id = a.blogger')
						->get()->result_object();
						return json_encode($posts);
	}

	public function singlepost($id)
	{
		$post = $this->db->select('a.title, a.date, a.body, b.fullname, b.username')
						->from('blog as a')
						->join('user_info as b', 'b.id = a.blogger')
						->where('a.id', $id)
						->get()->row_object();
						return json_encode($post);
	}

}