<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['default_controller']    = "public/main";

$route['login']                 = "public/login";
$route['logout']                = "public/logout";
$route['signup']                = "public/signup";

$route['submit/post']			= "submit/post";

$route['status_list/newsfeed_gen']		= "status_list/newsfeed_gen";
$route['status_list/like/:any']				= "status_list/like";
$route['status_list/profile_gen']		= "status_list/profile_gen";

$route[':any/edit']				= "profile/edit";
$route[':any/friends']			= "profile/friends";
$route[':any/messages']			= "profile/messages";
$route[':any/photos']			= "profile/photos";
$route[':any/:any']				= "profile/error";
$route[':any']					= "profile/main";

$route['404_override'] 			= "";

/* End of file routes.php */
/* Location: ./application/config/routes.php */