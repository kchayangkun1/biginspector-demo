<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'home';
$route['product'] = 'product/page';
$route['product/(:num)'] = 'product/page/$1';
$route['product-detail/(:num)'] = 'product/detail/$1';
$route['404_override'] = 'Error';

$route['translate_uri_dashes'] = FALSE;
