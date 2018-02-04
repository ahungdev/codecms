<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$route['admin'] = "admin/dashboard";
$route['admin/login'] = "admin/dashboard/login";
$route['admin/logout'] = "admin/dashboard/logout";

$route['admin/posts'] = "admin/posts";

$route['default_controller'] = "home";
$route['404_override'] = '';

/* End of file routes.php */
/* Location: ./application/config/routes.php */