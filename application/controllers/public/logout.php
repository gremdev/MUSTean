<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Logout extends Public_Controller
{
    public function index()
    {
        $this->session->sess_destroy();
		header("location:".base_url());
    }
}