<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Friends extends Private_Controller {

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
		
		if (empty($user_info) == true) {
			$this->show_404();
		}
		else{
			if ((int)$this->logged > 0 && $username == $this->username) {
				$my_info = json_decode($this->Profile_model->check_username($this->username));
	            $friends = json_decode($this->Notification_model->friendrequest());
	            $data = array
	                (
	                    'title'     => 'Profile | MUSTean', 
	                    'view'      => 'profile/friends', 
	                    'count'     => count($friends),
	                    'friends'   => $friends,
	                    'info'      => $my_info

	                );
	            $this->load->view('template', $data);
				
			}
			else{
				$is_friend = $this->Profile_model->is_friend($username);
				$my_info = json_decode($this->Profile_model->check_username($username));
	            $friends = json_decode($this->Notification_model->friendrequest());
	            $data = array
	                (
	                    'title'     => 'Profile | MUSTean', 
	                    'view'      => 'profile/friend_friends', 
	                    'count'     => count($friends),
	                    'friends'   => $friends,
	                    'info'      => $my_info,
	                    'friend_but'=> $is_friend

	                );
	            $this->load->view('template', $data);	
			}
		}
	}
}