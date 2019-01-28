<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
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

$route['default_controller'] = "frontend/index";
$route['404_override'] = '';

/*
 * End Frontend
 */
$route['dang-nhap-thanh-vien'] = "auth/felogin";
$route['dang-ky-thanh-vien'] = "auth/register";
$route['quen-mat-khau'] = "auth/forgot";
$route['thoat'] = "auth/logout";
$route['thay-doi-mat-khau'] = "frontend/profile/changepassword";
$route['thong-tin-ca-nhan'] = "frontend/profile";
$route['dang-ky-khoa-hoc'] = "frontend/profile/course";
$route['hoc-truc-tuyen/(:any)'] = "frontend/profile/course_detail/$1";
$route['thac-mac-bai-hoc'] = "frontend/profile/question";

/*
 * Backend
 */
$route['backend'] = "backend/index";
/* End of file routes.php */
/* Location: ./application/config/routes.php */