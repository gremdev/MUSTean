<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Edit extends Private_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Profile_model');
	}

	public function index()
	{
		$username = $this->uri->segment(1);

		if ($this->username == $username)
		{
			echo "Edit";
		}
		else
		{
			header("location:" . base_url($username));
		}
	}

}