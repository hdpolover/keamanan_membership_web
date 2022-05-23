<?php
defined('BASEPATH') or exit('No direct script access allowed');

$route['login'] = 'home/login';
$route['logout'] = 'home/logout';

$route['home'] = 'home';
$route['member'] = 'home/member';
$route['member/edit'] = 'home/member_edit';
$route['member/(:any)/(:any)'] = 'home/decrytion/$1/$2';

$route['default_controller'] = 'home/login';
$route['404_override'] = 'utility/not_found';
$route['translate_uri_dashes'] = false;
