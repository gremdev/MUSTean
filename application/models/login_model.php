<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login_model extends CI_Model
{
	public function login($data)
	{
		return $this->db->select('id')
				->from('user_info')
				->where('username', $data['username'])
				->where('password', $data['password'])
				->get()->row_array();
	}
}