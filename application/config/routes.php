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

$route['default_controller'] = 'a3';
$route['user/comment/(:num)'] = 'user/comment';
$route['user/char_points/(:any)'] = 'user/char_points';
$route['user/merc_points/(:num)'] = 'user/merc_points';
$route['admin/news_edit/(:num)'] = 'admin/news_edit';
$route['admin/news_del/(:num)'] = 'admin/news_del';
$route['admin/download_edit/(:num)'] = 'admin/download_edit';
$route['admin/download_del/(:num)'] = 'admin/download_del';
$route['admin/event_edit/(:num)'] = 'admin/event_edit';
$route['admin/event_del/(:num)'] = 'admin/event_del';
$route['admin/unban/(:any)/(:any)'] = 'admin/unban';
$route['404_override'] = 'a3/page_missing';


/* End of file routes.php */
/* Location: ./application/config/routes.php */