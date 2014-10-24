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
            if (isset($_GET['search'])) {
                header("location:".base_url().$_GET['search']);
            }
            $my_info = json_decode($this->Profile_model->check_username($this->username));
            $friends = json_decode($this->Notification_model->friendrequest());
            $personal_msg = json_decode($this->Notification_model->personal_msg());
            $data = array
                (
                    'title'     => 'Newsfeed | MUSTean', 
                    'view'      => 'newsfeed', 
                    'count'     => count($friends),
                    'friends'   => $friends,
                    'pm_msg'    => $personal_msg,
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