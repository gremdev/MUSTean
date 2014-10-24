<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Friend_button extends Private_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Friend_button_model');
	}

	public function addfriend()
	{
		echo $this->Friend_button_model->addfriend($this->uri->segment(2));
	}

	public function cancel_or_unfriend()
	{
		echo $this->Friend_button_model->cancel_or_unfriend($this->uri->segment(2));
	}

	public function accept()
	{
		echo $this->Friend_button_model->accept($this->uri->segment(2));
	}
}