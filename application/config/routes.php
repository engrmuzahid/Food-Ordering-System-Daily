<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'Site';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

//admin route
$route['login'] = 'Login';
$route['dashboard'] = 'Admin';
$route['dashboard/settings'] = 'Admin/website_settings';
$route['dashboard/checkout'] = 'Admin/checkout_settings';
$route['dashboard/order_filter'] = 'Admin/order_filter';
$route['dashboard/edit_checkout/(.*)'] = 'Admin/edit_checkout/$1';
$route['dashboard/view_checkout/(.*)'] = 'Admin/view_checkout/$1';
$route['dashboard/delivery_address'] = 'Admin/delivery_address';
$route['dashboard/profile'] = 'Admin/admin_profile';
$route['dashboard/password-change'] = 'Admin/password_change_form';
//Package Route
$route['dashboard/add_package'] = 'Package';
$route['dashboard/delete_package/(.*)'] = 'Package/delete_package/$1';
$route['dashboard/edit_package/(.*)'] = 'Package/edit_package/$1';
$route['dashboard/package_list'] = 'Package/get_package_list';
//Item Route
$route['dashboard/add_item'] = 'Item';
$route['dashboard/delete_item/(.*)'] = 'Item/delete_item/$1';
$route['dashboard/edit_item/(.*)'] = 'Item/edit_item/$1';
$route['dashboard/item_list'] = 'Item/get_item_list';
//Item_option Route
$route['dashboard/add_item_option/(.*)'] = 'Item_option/index/$1';
$route['dashboard/delete_item_option/(.*)'] = 'Item_option/delete_item_option/$1';
$route['dashboard/edit_item_option/(.*)'] = 'Item_option/edit_item_option/$1';
$route['dashboard/item_option_list'] = 'Item_option/get_item_option_list';
$route['dashboard/item_option2_list/(.*)'] = 'Item_option/get_item_option2_list/$1';
//Work Slider 
$route['dashboard/add_work_slider'] = 'Work_slider';
$route['dashboard/delete_work_slider/(.*)'] = 'Work_slider/delete_work_slider/$1';
$route['dashboard/edit_work_slider/(.*)'] = 'Work_slider/edit_work_slider/$1';
$route['dashboard/work_slider_list'] = 'Work_slider/get_work_slider_list';
//Daily_package_system
$route['dashboard/add_daily_package']='Daily_package';
$route['dashboard/delete_daily_package/(.*)']='Daily_package/delete_daily_package/$1';
$route['dashboard/edit_daily_package/(.*)'] = 'Daily_package/edit_daily_package/$1';
$route['dashboard/daily_package_list'] = 'Daily_package/get_daily_package';
//Delivery_address
$route['dashboard/add_delivery_address'] = 'Delivery_address';
$route['dashboard/delete_delivery_address/(.*)'] = 'Delivery_address/delete_delivery_address/$1';
$route['dashboard/edit_delivery_address/(.*)'] = 'Delivery_address/edit_delivery_address/$1';
$route['dashboard/delivery_address_list'] = 'Delivery_address/get_delivery_address_list';
//User
$route['dashboard/add_users'] = 'Users';
$route['dashboard/delete_users/(.*)'] = 'Users/delete_users/$1';
$route['dashboard/edit_users/(.*)'] = 'Users/edit_users/$1';
$route['dashboard/users_list'] = 'Users/users_list';

