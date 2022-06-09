<?php defined('BASEPATH') OR exit('No direct script access allowed');

$active_group = 'default';
$query_builder = TRUE;

switch ($_SERVER['HTTP_HOST'])
{
	case 'localhost':
		$db['default'] = array(
			'dsn'	=> '',
			'hostname' => 'localhost',
			'username' => 'root',
			'password' => '',
			'database' => 'jigs_build',
			'dbdriver' => 'mysqli',
			'dbprefix' => '',
			'pconnect' => TRUE,
			'db_debug' => TRUE,
			'cache_on' => TRUE,
			'cachedir' => '',
			'char_set' => 'utf8',
			'dbcollat' => 'utf8_general_ci',
			'swap_pre' => '',
			'encrypt' => TRUE,
			'compress' => TRUE,
			'stricton' => TRUE,
			'failover' => array(),
			'save_queries' => TRUE
		);
	break;

	
	case 'demo.denseteklearning.com':
		$db['default'] = array(
			'dsn'	=> '',
			'hostname' => 'localhost',
			'username' => 'denseeqq_buildp',
			'password' => 'JFlr]Fuc(z+h',
			'database' => 'denseeqq_buildp',
			'dbdriver' => 'mysqli',
			'dbprefix' => '',
			'pconnect' => FALSE,
			'db_debug' => FALSE,
			'cache_on' => FALSE,
			'cachedir' => '',
			'char_set' => 'utf8',
			'dbcollat' => 'utf8_general_ci',
			'swap_pre' => '',
			'encrypt' => FALSE,
			'compress' => FALSE,
			'stricton' => FALSE,
			'failover' => array(),
			'save_queries' => TRUE
		);
	break;

	default:
		$db['default'] = array(
			'dsn'	=> '',
			'hostname' => 'localhost',
			'username' => 'root',
			'password' => '',
			'database' => 'jigs_build',
			'dbdriver' => 'mysqli',
			'dbprefix' => '',
			'pconnect' => FALSE,
			'db_debug' => FALSE,
			'cache_on' => FALSE,
			'cachedir' => '',
			'char_set' => 'utf8',
			'dbcollat' => 'utf8_general_ci',
			'swap_pre' => '',
			'encrypt' => FALSE,
			'compress' => FALSE,
			'stricton' => FALSE,
			'failover' => array(),
			'save_queries' => TRUE
		);
}

