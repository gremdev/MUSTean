<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Notification_model');
        $this->load->model('Profile_model');
    }

	public function index()
	{
        if ((int)$this->logged > 0)
        {
            $my_info = json_decode($this->Profile_model->check_username($this->username));
            $friends = json_decode($this->Notification_model->friendrequest());
            $data = array
                (
                    'title'     => 'Welcome to MUSTean Community', 
                    'view'      => 'newsfeed', 
                    'count'     => count($friends),
                    'friends'   => $friends,
                    'info'      => $my_info

                );
            $this->load->view('template', $data);
        }
        else
        {
            $data = array('title' => 'Welcome to MUSTean Community', 'view' => 'public/index');
            $this->load->view('template', $data);
        }
	}

}