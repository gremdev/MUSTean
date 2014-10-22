<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Submit_model extends CI_Model
{
	public function status($data)
	{
		$this->db->insert('posts', $data);
	}
}