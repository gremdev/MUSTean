<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Friends extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Profile_model');
	}

	public function index()
	{
		echo "Friends";
	}

}