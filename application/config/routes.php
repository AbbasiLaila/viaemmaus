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

$route['default_controller'] = 'front';

$route['home'] = 'front';

/*About Us*/
$route['admin/about/(:any)'] = 'admin/page/$1';
$route['admin/why_us/edit/(:any)'] = 'admin/edit_why_us/$1';

/*Services*/
$route['admin/services'] = 'services';
$route['admin/services/add'] = 'services/add';
$route['admin/services/edit/(:any)'] = 'services/edit/$1';
$route['admin/services/delete/(:any)'] = 'services/delete/$1';
$route['admin/services/highlights'] = 'services/highlights';


/*Tours*/
$route['admin/tours'] = 'tours';
$route['admin/tours/add'] = 'tours/add';
$route['admin/tours/edit/(:any)'] = 'tours/edit/$1';
$route['admin/tours/delete/(:any)'] = 'tours/delete/$1';
$route['admin/tour/(:any)'] = 'tours/view/$1';
$route['admin/tour/program/add/(:any)'] = 'tours/add_day/$1';
$route['admin/tour/program/edit/(:any)'] = 'tours/edit_day/$1';
$route['admin/tours/delete_day/(:any)'] = 'tours/delete_day/$1';
$route['admin/tours/deleteDayImage/(:any)'] = 'tours/delete_dayimg/$1';
$route['admin/tours/deleteAllDayImages/(:any)'] = 'tours/deleteAllDayImages/$1';
$route['admin/tours/deleteDayVideo/(:any)'] = 'tours/delete_dayvideo/$1';
$route['admin/tours/deleteAllDayVideos/(:any)'] = 'tours/deleteAllDayVideos/$1';
/*Tour old images*/
$route['admin/tour/gallery/add/(:any)'] = 'tours/add_image/$1';
$route['admin/tour/gallery/edit/(:any)'] = 'tours/edit_image/$1';
$route['admin/tours/delete_img/(:any)'] = 'tours/delete_img/$1';


/*Pages*/

$route['admin/privacy'] = 'admin/page/privacy';
$route['admin/terms'] = 'admin/page/terms';


/*Gallery Albums*/
$route['admin/gallery'] = 'gallery';
$route['admin/gallery/albums/add'] = 'gallery/add_album';
$route['admin/gallery/albums/edit/(:any)'] = 'gallery/edit_album/$1';
$route['admin/gallery/albums/delete/(:any)'] = 'gallery/delete_album/$1';

/*Gallery Albums Images*/

$route['admin/gallery/images'] = 'gallery/images';
$route['admin/gallery/images/add'] = 'gallery/add_image';
$route['admin/gallery/images/edit/(:any)'] = 'gallery/edit_image/$1';
$route['admin/gallery/images/delete/(:any)'] = 'gallery/delete_image/$1';


/*Files*/
$route['admin/files'] = 'files';
$route['admin/files/add'] = 'files/add';

/*Users*/
$route['admin/users'] = 'admin/users';
$route['admin/users/add'] = 'auth/create_user';
$route['admin/users/edit/(:any)'] = 'auth/edit_user/$1';


$route['language/spanish'] = "front/language";
$route['language/english'] = "front/language";

$route['404_override'] = 'front/show_404';

$route['translate_uri_dashes'] = FALSE;

