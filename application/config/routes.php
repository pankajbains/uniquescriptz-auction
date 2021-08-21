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
$route['default_controller'] = 'frontend_home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

/*-- for homepage and cms routes--*/

$route['home/(:any)'] = 'frontend_home/$1';

$route['cms/(:any)'] = 'frontend_home/cms/$1';

/*-- for login and register routes--*/

$route['account/(:any)'] = 'frontend_account/$1';

$route['account/(:any)/(:any)'] = 'frontend_account/$1/$2';

$route['account/(:any)/(:any)/(:any)'] = 'frontend_account/$1/$2/$3';

$route['paygateway/(:any)/(:any)/(:any)'] = 'frontend_account/paygateway/$1/$2/$3';
$route['stripe-payment/(:any)/(:any)/(:any)'] = 'frontend_account/stripe_payment/$1/$2/$3';

/*-- for user area routes--*/
$route['user/(:any)'] = 'frontend_users_account/$1';

$route['auction/(:any)/(:any)'] = 'frontend_users_auctions/$1/$2';

$route['auction/(:any)'] = 'frontend_users_auctions/$1';

/*-- for auctions lists routes--*/

$route['category/(:any)'] = 'frontend_auctions/category/$1';

$route['product/latestbids/(:any)/(:any)'] = 'frontend_auctions/latestbids/$1/$2';

$route['product/related/(:any)'] = 'frontend_auctions/related/$1';

$route['product/(:any)/(:any)'] = 'frontend_auctions/product/$1/$2';

$route['product/(:any)'] = 'frontend_auctions/$1';

$route['set-currency'] = 'frontend_account/set_currency';
$route['change-currency/(:any)'] = 'frontend_account/change_currency/$1';
//$route['(:any)'] = 'frontend_home/$1';

//$route['cms'] = 'frontend_home/cms'; 

$route['backend_admin_users/(:any)'] = 'backend_admin_users/$1';

$route['manage-auction'] = 'admin';
$route['manage-auction/(:any)'] = '$1';
$route['manage-auction/(:any)/(:any)'] = '$1/$2';