<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Blog extends Private_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Notification_model');
		$this->load->model('Profile_model');
	}

	public function index()
	{
		$user_info = json_decode($this->Profile_model->check_username($this->username));

				$my_info = json_decode($this->Profile_model->check_username($this->username));
	            $friends = json_decode($this->Notification_model->friendrequest());
            	$personal_msg = json_decode($this->Notification_model->personal_msg());
	            $data = array
	                (
	                    'title'     => 'Blog | MUSTean', 
	                    'view'      => 'blog/public', 
	                    'count'     => count($friends),
	                    'friends'   => $friends,
	                    'info'      => $my_info,
                    'pm_msg'    => $personal_msg

	                );
	            $this->load->view('template', $data);
	}

}