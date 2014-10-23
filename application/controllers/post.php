<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Post extends Private_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('Notification_model');
        $this->load->model('Profile_model');
        $this->load->model('Status_list_model');
    }

	public function index()
	{
		$post = $this->Status_list_model->single_post($this->uri->segment(2));
		$my_info = json_decode($this->Profile_model->check_username($this->username));
        $friends = json_decode($this->Notification_model->friendrequest());
        $data = array
            (
                'title'     => 'Post | MUSTean', 
                'view'      => 'post', 
                'count'     => count($friends),
                'friends'   => $friends,
                'info'      => $my_info,
                'post'		=> $post,
                'post_id'   => $this->uri->segment(2)
            );
        $this->load->view('template', $data);
	}

}