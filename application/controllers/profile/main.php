<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Profile_model');
	}

	public function index()
	{
		$username = $this->uri->segment(1);
		$user_info = json_decode($this->Profile_model->check_username($username));
		
		if (empty($user_info) == true) {
			$this->show_404();
		}
		else{
			if ((int)$this->logged > 0 && $username == $this->username) {
				// echo "<br/>allow edits here for the profile owner.";
				
			}
			else{
				//echo $user_info;
				// echo "View and post/comment only";	
			}
		}
	}
}