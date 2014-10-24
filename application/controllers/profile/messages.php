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
		$my_info = json_decode($this->Profile_model->check_username($this->username));
	    $friends = json_decode($this->Notification_model->friendrequest());

		$data = array(
	        'title'     => 'Message | MUSTean', 
	        'view'      => 'profile/messages', 
	        'count'     => count($friends),
	        'friends'   => $friends,
	        'info'      => $my_info
	    );
	    $this->load->view('template', $data);
	}

	public function inbox()
	{
		$user_info = json_decode($this->Profile_model->check_username($this->uri->segment(2)));
		
		if (empty($user_info) == true) {
			$this->show_404();
		}
		else{
			$my_info = json_decode($this->Profile_model->check_username($this->username));
		    $friends = json_decode($this->Notification_model->friendrequest());
		    $message = $this->Profile_model->getmessageid($user_info->id);

			$data = array(
		        'title'     => 'Message | MUSTean', 
		        'view'      => 'profile/pm', 
		        'count'     => count($friends),
		        'friends'   => $friends,
		        'info'      => $my_info,
		        'user_info'	=> $user_info,
		        'message'	=> $message
		    );
		    $this->load->view('template', $data);
		}
	}

}