<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Messages extends Private_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Notification_model');
		$this->load->model('Profile_model');
	}

	public function index()
	{
		$username = $this->uri->segment(1);

		if ($this->username == $username)
		{
				$my_info = json_decode($this->Profile_model->check_username($this->username));
	            $friends = json_decode($this->Notification_model->friendrequest());
	            $data = array
	                (
	                    'title'     => 'Message | MUSTean', 
	                    'view'      => 'profile/messages', 
	                    'count'     => count($friends),
	                    'friends'   => $friends,
	                    'info'      => $my_info

	                );
	            $this->load->view('template', $data);
				
		}
		else
		{
			header("location:" . base_url($username));
		}
	}

}