<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$route['admin']                                    = 'admin/dashboard';
$route['admin/login']                              = 'admin/dashboard/login';
$route['admin/logout']                             = 'admin/dashboard/logout';
$route['admin/slug']                               = 'admin/dashboard/slug';

$route['admin/([a-zA-z-_]+)/(:num)']               = 'admin/$1/index/$2';
$route['admin/([a-zA-z-_]+)/([a-zA-z-_]+)/(:num)'] = 'admin/$1/$2/$3';

$route['default_controller'] = "home";
$route['404_override'] = '';

/* End of file routes.php */
/* Location: ./application/config/routes.php */
