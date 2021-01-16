<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'home/home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['home'] = 'home/home';
$route['new_app'] = "home/new_app";
$route['manage_app'] = "home/manage_app";
$route['new_category'] = "home/new_category";
$route['manage_category'] = "home/manage_category";
$route['new_home_slider'] = "home/new_home_slider";
$route['manage_home_slider'] = "home/manage_home_slider";
$route['new_trending_banner'] = "home/new_trending_banner";
$route['manage_trending_banner'] = "home/manage_trending_banner";
$route['manage_category_ajax'] = "home/manage_category_ajax";
$route['update_category_ajax'] = "home/update_category_ajax";
$route['enable_disable_category_ajax'] = "home/enable_disable_category_ajax";
$route['common_delete_ajax'] = "home/common_delete_ajax";
$route['manage_home_slider_ajax'] = "home/manage_home_slider_ajax";
$route['update_home_slider_ajax'] = "home/update_home_slider_ajax";
$route['change_image_ajax'] = "home/change_image_ajax";