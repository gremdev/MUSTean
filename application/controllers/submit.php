<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Submit extends Private_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Submit_model');
	}

	public function index()
	{
		$this->show_404();
	}

	public function post()
	{
		if ($_POST) 
		{
			$config['upload_path'] 		= "./public/uploads/";
			$config['allowed_types'] 	= 'gif|jpg|png';
			$config['encrypt_name']		=	TRUE;
			 
			$this->load->library('upload', $config);
			 
			if (!$this->upload->do_upload() && !empty($_POST['body']) == TRUE)
			{	
				// post status only

				$post_data = array(
					'body'			=>	$_POST['body'],
					'date_posted' 	=> date("Y-m-d H:i:s"),
					'user_id'		=> $this->id
					);

				$this->Submit_model->status($post_data);
				header("location:" . $_POST['url']);

			}
			elseif ($this->upload->do_upload() && !empty($_POST['body']) == FALSE) 
			{	
				// post image only

				$data = array('upload_data' => $this->upload->data());

				$post_data = array(
					'photo' => $data['upload_data']['file_name'], 
					'date_posted' => date("Y-m-d H:i:s"),
					'user_id'		=> $this->id
					);

				$this->Submit_model->status($post_data);
				header("location:" . $_POST['url']);

			}
			elseif ($this->upload->do_upload() && !empty($_POST['body']) == TRUE) 
			{	
				// post status and image
				
				$data = array('upload_data' => $this->upload->data());

				$post_data = array(
					'body'	=>	$_POST['body'],
					'photo' => $data['upload_data']['file_name'], 
					'date_posted' => date("Y-m-d H:i:s"),
					'user_id'		=> $this->id
					);

				$this->Submit_model->status($post_data);
				header("location:" . $_POST['url']);

			}
			else
			{
				// empty post status/image
				header("location:" . $_POST['url'] . "?error_post");
			}
		}
	}
}