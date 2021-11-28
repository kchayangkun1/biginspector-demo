<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'home';
$route['gallery'] = 'gallery/page';
$route['gallery/(:num)'] = 'gallery/page/$1';
$route['gallery-detail/(:num)'] = 'gallery/detail/$1';


$route['article'] = 'article/page/';
$route['article/(:num)'] = 'article/page/$1';
$route['article-detaill/(:num)'] = 'article/detail/$1';


$route['404_override'] = 'Error';

$route['translate_uri_dashes'] = FALSE;
