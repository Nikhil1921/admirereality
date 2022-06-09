<?php defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'home';

$route['404_override'] = 'home/error_404';
$route['translate_uri_dashes'] = TRUE;

$route['forgot-password'] = 'login/forgot';
$route['signup'] = 'login/signup';
$route['send-otp'] = 'login/send_otp';
$route['check-otp'] = 'login/check_otp';
$route['complete-signup'] = 'login/complete_signup';
$route['forgot-password'] = 'login/forgot';
$route['new-password'] = 'login/new_password';
$route['logout'] = 'login/logout';
$route['panel/logout'] = 'login/logout';
$route['panel/my-profile'] = 'panel/home/profile';
$route['panel/change-password'] = 'panel/home/change_password';
$route['panel/change-image'] = 'panel/home/change_image';

$route['dashboard'] = 'panel';
$route['panel/dashboard'] = 'panel';


$route['about'] = 'home/about';
$route['gallery'] = 'home/gallery';
$route['contact'] = 'home/contact';
$route['residential-property/(:any)/(:any)'] = 'home/residential_property/$1/$2';
$route['commercial-property/(:any)/(:any)'] = 'home/commercial_property/$1/$2';
$route['commercial-properties'] = 'home/commercial_properties';
$route['residential-properties'] = 'home/residential_properties';
$route['get-city'] = 'home/get_city';
$route['get-featured'] = 'home/get_featured';