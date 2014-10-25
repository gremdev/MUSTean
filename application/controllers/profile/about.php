<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class About extends Private_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Notification_model');
		$this->load->model('Profile_model');
	}

	public function index()
	{
		$username = $this->uri->segment(1);
		$user_info = json_decode($this->Profile_model->check_username($username));

				$my_info = json_decode($this->Profile_model->check_username($username));
	            $friends = json_decode($this->Notification_model->friendrequest());
            	$personal_msg = json_decode($this->Notification_model->personal_msg());
	            $data = array
	                (
	                    'title'     => 'Friends | MUSTean', 
	                    'view'      => 'profile/about', 
	                    'count'     => count($friends),
	                    'friends'   => $friends,
	                    'info'      => $my_info,
                    'pm_msg'    => $personal_msg

	                );
	            $this->load->view('template', $data);
	}

}