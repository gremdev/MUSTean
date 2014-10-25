<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Edit extends Private_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Notification_model');
		$this->load->model('Profile_model');
	}

	public function index()
	{
		$username = $this->uri->segment(1);

		if ($this->username == $username)
		{
			$my_info = json_decode($this->Profile_model->check_username($this->username));
		    $friends = json_decode($this->Notification_model->friendrequest());
            $personal_msg = json_decode($this->Notification_model->personal_msg());

			$data = array(
		        'title'     => 'Message | MUSTean', 
		        'view'      => 'profile/edit', 
		        'count'     => count($friends),
		        'friends'   => $friends,
		        'info'      => $my_info,
                'pm_msg'    => $personal_msg
		    );
		    $this->load->view('template', $data);

		    if (isset($_POST['profile'])) {
		    	$this->Profile_model->edit_profile($_POST);
		    }
		    if (isset($_POST['changepass'])) {
		    	$this->Profile_model->change_pass($_POST);
		    }
		    if (isset($_POST['changepp'])) {
		    	unset($_POST['changepp']);
		    	$config['upload_path'] 		= "./public/uploads/";
				$config['allowed_types'] 	= 'gif|jpg|png';
				$config['encrypt_name']		=	TRUE;
				 
				$this->load->library('upload', $config);

				if ( ! $this->upload->do_upload())
				{
					header("location:".base_url($this->username."/edit/?upload_failure"));
				}
				else
				{
					$data = array('upload_data' => $this->upload->data());
					$this->Profile_model->upload($data['upload_data']['file_name']);
					header("location:".base_url($this->username."/edit/?upload_success"));
				}
		    }
		}
		else
		{
			header("location:" . base_url($username));
		}
	}

}