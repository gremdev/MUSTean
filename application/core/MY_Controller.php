<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{
    // Fetch Session data
    protected $logged;
    public $id;
    public $username;

    function __construct()
    {
        parent::__construct();
        $this->logged = $this->session->userdata('logged_in');
        $this->id = $this->session->userdata('id');
        $this->username = $this->session->userdata('username');

    }

    protected function show_404()
    {
        $data = array(
            'title'     =>      'Page not Found',
            'view'      =>      '404'
        );
        $this->load->view('template', $data);
    }

}

class Public_Controller extends MY_Controller
{
    /*
    * Checks if the user is currently logged in.
    * Available only for public pages like the login, logout and signup.
    */
    function __construct()
    {
        parent::__construct();

        if((int) $this->logged > 0)
        {
            header("location:".base_url());
        }
    }
}

class Private_Controller extends MY_Controller
{
    /*
    * Checks if the user is currently logged in.
    * Available only for private pages like the login, logout and signup.
    */
    function __construct()
    {
        parent::__construct();

        if(!(int) $this->logged > 0)
        {
            header("location:".base_url('login'));
        }
    }
}