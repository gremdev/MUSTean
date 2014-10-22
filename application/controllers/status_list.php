<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Status_list extends Private_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Status_list_model');
	}

	public function newsfeed_gen()
	{
		$posts = $this->Status_list_model->newsfeed();
		$postArray = array();

		foreach ($posts as $post) {
			$like = count($this->Status_list_model->like_counter($post->id));
			$comment = count($this->Status_list_model->comment_counter($post->id));
			$temp = array(
					'id' 			=> $post->id, 
					'body'			=> $post->body, 
					'date_posted' 	=> $post->date_posted,
					'photo' 		=> $post->photo,  
					'username' 		=> $post->username,
					'fullname' 		=> $post->fullname, 
					'profile_pic' 	=> $post->profile_pic,
					'like' 			=> $like, 
					'comment' 		=> $comment
				);	
				array_push($postArray , $temp);
		}
		echo json_encode($postArray);
	}

	public function profile_gen($username = FALSE)
	{

	}

	public function like()
	{
		$check = $this->Status_list_model->check_if_liked($this->uri->segment(3));

		if ($check == 0)
		{
			$like = $this->Status_list_model->like($this->uri->segment(3));
			var_dump($like);
		}
		elseif($check > 0)
		{
			$unlike = $this->Status_list_model->unlike($this->uri->segment(3));
			echo $unlike;
		}
		else
		{
			echo "error";
		}
	}

}