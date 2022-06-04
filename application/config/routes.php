<?php
defined('BASEPATH') or exit('No direct script access allowed');

$route['home'] = 'home';
$route['daftar-member'] = 'home/member';
$route['member/(:any)/(:any)'] = 'home/decrytion/$1/$2';


$route['login'] = 'authentication';
$route['logout'] = 'authentication/logout';
$route['register'] = 'authentication/register';

$route['default_controller'] = 'authentication';
$route['404_override'] = 'utility/not_found';
$route['translate_uri_dashes'] = false;
