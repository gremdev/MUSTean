<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends Public_Controller
{
    public function index()
    {
		$this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'required|md5');
		$this->form_validation->set_error_delimiters('<span class="label label-danger">', '</span>');     

        if ($this->form_validation->run() == FALSE)
		{
			$data = array('title' => 'Login to MUSTean Community', 'view' => 'public/login');
        	$this->load->view('template', $data);
		}
		else
		{
			$this->load->model('Login_model');
			$check = $this->Login_model->login($_POST);
			if ((int)$check > 0) {
				$user_data = array(
	                   'username'  => $_POST['username'],
	                   'id'		   => $check['id'],
	                   'logged_in' => TRUE
	               );
				$this->session->set_userdata($user_data);
				header("location:".base_url());
			}
			else{
				$data = array('title' => 'Login to MUSTean Community', 'view' => 'public/login', 'error' => true);
        		$this->load->view('template', $data);
			}
			
		}
    }
}