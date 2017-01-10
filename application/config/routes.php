<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


// Department

$route['department'] = "Department_controller"; 
$route['department/add'] = 'Department_controller/add_department'; 
$route['department/add_view'] = 'Department_controller/add_department_view'; 
$route['department/edit/(\d+)'] = 'Department_controller/update_department_view/$1'; 
$route['department/delete/(\d+)'] = 'Department_controller/delete_department/$1';


// Category

$route['category'] = "Category_controller"; 
$route['category/add'] = 'Category_controller/add_category'; 
$route['category/add_view'] = 'Category_controller/add_category_view'; 
$route['category/edit/(\d+)'] = 'Category_controller/update_category_view/$1'; 
$route['category/delete/(\d+)'] = 'Category_controller/delete_category/$1';

// Complaint

$route['complaint'] = "Complaint_controller"; 
$route['complaint/add'] = 'Complaint_controller/add_complaint'; 
$route['complaint/add_view'] = 'Complaint_controller/add_complaint_view'; 
$route['complaint/edit/(\d+)'] = 'Complaint_controller/update_complaint_view/$1'; 
$route['complaint/delete/(\d+)'] = 'Complaint_controller/delete_complaint/$1';
