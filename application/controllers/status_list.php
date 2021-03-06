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

	public function profile_gen()
	{
		$profile = $this->Status_list_model->profile($this->uri->segment(3));
		echo $profile;
	}

	public function friend_gen()
	{
		$friend = $this->Status_list_model->friend($this->uri->segment(3));
		echo $friend;
	}

	// public function like()
	// {
	// 	$check = $this->Status_list_model->check_if_liked($this->uri->segment(3));

	// 	if ($check == 0)
	// 	{
	// 		$like = $this->Status_list_model->like($this->uri->segment(3));
	// 		var_dump($like);
	// 	}
	// 	elseif($check > 0)
	// 	{
	// 		$unlike = $this->Status_list_model->unlike($this->uri->segment(3));
	// 		echo $unlike;
	// 	}
	// 	else
	// 	{
	// 		echo "error";
	// 	}
	// }
	// 
	public function users()
	{
		$names = $this->Status_list_model->users();

		$arr = array();
		foreach ($names as $name => $test)
		{
			array_push($arr,$test->username);
		}
		echo json_encode($arr);
	}

	public function comment_gen()
	{
		$comment = $this->Status_list_model->getcomments($this->uri->segment(3));
		echo $comment;
	}

	public function comment_new()
	{
		if (!empty(implode("", $_POST)) == true) {
			$this->Status_list_model->newcomment(implode("", $_POST), $this->uri->segment(3));
		}
	}

	public function pm_gen()
	{
		$pm = $this->Status_list_model->getpms($this->uri->segment(3));
		echo $pm;
	}

	public function pm_new()
	{
		if (!empty(implode("", $_POST)) == true) {
			echo $this->Status_list_model->newpm(implode("", $_POST), $this->uri->segment(3));
		}
	}

}