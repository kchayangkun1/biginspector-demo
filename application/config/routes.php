<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'home';

$route['portfolio/(:num)'] = 'portfolio/page/$1';
$route['portfolio/(:num)/(:num)'] = 'portfolio/page/$1/$1';
$route['portfolio-detail/(:num)'] = 'portfolio/detail/$1';
// $route['gallery'] = 'gallery/page';
// $route['gallery/(:num)'] = 'gallery/page/$1';
// $route['gallery-detail/(:num)'] = 'gallery/detail/$1';

$route['404_override'] = 'Error';

$route['translate_uri_dashes'] = FALSE;
