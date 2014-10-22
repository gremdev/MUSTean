<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Signup extends Public_Controller
{
    public function index()
    {
    	$this->form_validation->set_rules('fullname', 'Fullname', 'trim|required|min_length[5]|max_length[50]|xss_clean');
    	$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[5]|max_length[12]|xss_clean|is_unique[user_info.username]|is_unique[reserve.reserve_word]|alpha_numeric');
		$this->form_validation->set_rules('password', 'Password', 'min_lenght[5]|max_length[50]|required|md5');
		$this->form_validation->set_rules('email', 'Email Address', 'trim|required|valid_email|is_unique[user_info.email]');
		$this->form_validation->set_rules('birthday', 'Birthday', 'required');
		$this->form_validation->set_rules('address', 'Address', 'trim|required|min_length[5]|max_length[255]|xss_clean');
		$this->form_validation->set_error_delimiters('<span class="label label-danger">', '</span>');

        if ($this->form_validation->run() == FALSE)
		{
			$data = array('title' => 'Signup to MUSTean Community', 'view' => 'public/signup');
        	$this->load->view('template', $data);
		}
		else
		{
			$this->load->model('Signup_model');
			$this->Signup_model->signup($_POST);
			$data = array('title' => 'Signup to MUSTean Community', 'view' => 'public/success');
        	$this->load->view('template', $data);
		}
    }

}