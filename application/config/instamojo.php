<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* instamojo payment API v1 library for CodeIgniter
*
* @license Creative Commons Attribution 3.0 <http://creativecommons.org/licenses/by/3.0/>
* @version 1.0
* @author Rajeev bbqq <https://github.com/rajeevbbqq>
* @copyright Copyright (c) 2018, Rajeev bbqq
*/

/*
|--------------------------------------------------------------------------
| Mode
|--------------------------------------------------------------------------
|
| $config['mojo_mode'] = 'sandbox'; for testing
| $config['mojo_mode'] = 'live'   ; for production
|
*/


$config['mojo_mode']  = 'sandbox' ;


/*
|--------------------------------------------------------------------------
| API_KEY
|--------------------------------------------------------------------------
| API_KEY are different for test and production !
| $config['mojo_apikey'] = '650f7eed3d900273d6fafd635a';
|
*/

$config['mojo_apikey'] = 'cae7ba04588e437d9e745be6892e55d2' ;


/*
|--------------------------------------------------------------------------
| AUTH_TOKEN
|--------------------------------------------------------------------------
| AUTH_TOKEN are different for test and production !
| $config['mojo_token'] = '650f7eed3d900273d6fafd635a';
|
*/


$config['mojo_token']  = '3f14f3bc03c7be9ff54ac6ea1ba4a2fc' ;


/*
|--------------------------------------------------------------------------
| REDIRECT_URL
|--------------------------------------------------------------------------
| Set redirect url !
| $config['mojo_url'] = 'https://github.com/Instamojo/instamojo-php';
|
*/

$config['mojo_url'] = "http://" . $_SERVER['HTTP_HOST'] . '/atoz/transaction';


/*
|--------------------------------------------------------------------------
| DATABASE
|--------------------------------------------------------------------------
| Creates a 'mojo' table and store all orders, if set to true
|
*/

$config['mojo_db']  = false ;


/*
|--------------------------------------------------------------------------
| TABE NAME
|--------------------------------------------------------------------------
| Creates table if $config['mojo_db']  = true ;
|
*/

$config['mojo_table']  = 'table_name' ;


/* End of file instamojo.php */
/* Location: ./application/config/instamojo.php */
