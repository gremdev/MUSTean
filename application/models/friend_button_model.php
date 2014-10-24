<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Friend_button_model extends CI_Model {

	public function addfriend($username)
	{
		$id = $this->db->select('id')->from('user_info')->where('username', $username)->get()->row_object();

			$this->db->insert('friends', array('user' => $this->id, 'friend' => $id->id));
			$this->db->insert('friends', array('user' => $id->id, 'friend' => $this->id, 'status' => '3'));
			return "ok";
	}

	public function cancel_or_unfriend($username)
	{
		$id = $this->db->select('id')->from('user_info')->where('username', $username)->get()->row_object();

			$this->db->delete('friends', array('user' => $this->id, 'friend' => $id->id));
			$this->db->delete('friends', array('user' => $id->id, 'friend' => $this->id));
			return "ok";
	}

	public function accept($username)
	{
		$id = $this->db->select('id')->from('user_info')->where('username', $username)->get()->row_object();

			$this->db->update('friends', array('status' => '1'), array('user' => $this->id, 'friend' => $id->id));
			$this->db->update('friends', array('status' => '1'), array('user' => $id->id, 'friend' => $this->id));
			return "ok";
	}
}