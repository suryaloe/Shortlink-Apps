<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$pathadmurl = "__manageadm_root";
$route["___manageadm_root"] = "";
#$route[$pathadmurl."/(:any)"] = "___manageadm_root/$1";

$route[$pathadmurl] = "___manageadm_root/home/home";

$route[$pathadmurl."/login"] = "___manageadm_root/home/login";
$route[$pathadmurl."/logout"] = "___manageadm_root/home/login/logout";

$route[$pathadmurl."/profile/edit"] = "___manageadm_root/profile/edit";
$route[$pathadmurl."/profile"] = "___manageadm_root/profile/detailprofile";

$route[$pathadmurl."/link/add"] = "___manageadm_root/link/link";
$route[$pathadmurl."/link/add/ajax"] = "___manageadm_root/link/link/add";
$route[$pathadmurl."/link/list"] = "___manageadm_root/link/link/daftar";
$route[$pathadmurl."/link/report"] = "___manageadm_root/link/link/report";
$route[$pathadmurl."/link/detail/(:num)"] = "___manageadm_root/link/link/detail/$1";

$route[$pathadmurl."/report"] = "___manageadm_root/report/reportsosmed";
$route[$pathadmurl."/report/delete/(:num)"] = "___manageadm_root/report/reportsosmed/hapus/$1";

$route[$pathadmurl."/tools/ajax/(:any)"] = "___manageadm_root/tools/ajax/$1";
$route[$pathadmurl."/tools/fbgroup"] = "___manageadm_root/tools/toolsfb/fbgroup";
$route[$pathadmurl."/tools/fbgroup/delete/(:num)"] = "___manageadm_root/tools/toolsfb/fbgroupdel/$1";

$route[$pathadmurl."/admin/user/add"] = "___manageadm_root/admin_area/user/tambah";
$route[$pathadmurl."/admin/user/edit/(:num)"] = "___manageadm_root/admin_area/user/tambah/$1";
$route[$pathadmurl."/admin/user/delete/(:num)"] = "___manageadm_root/admin_area/user/delete/$1";

$route['default_controller'] = 'privatearea';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route["(:any)"] = "geturl/redirect/$1";