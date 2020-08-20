<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/' ,'IndextController@getindex');
Route::get('loginn','Auth\LoginController@getLogin');
Route::post('loginn','Auth\LoginController@postLogin');
Route::post('register','Auth\RegisterController@postRegister');
Route::get('register','Auth\RegisterController@getRegister');
Route::get('logout','Auth\LogoutController@getLogout');
Route::get('product/{id}','ProductController@getproduct');
Route::get('category/{id}','CategoryController@getcategory');

Route::get('addcart/{id}','CartController@addcart')->name('addcart');
Route::get('showcart','CartController@showcart')->name('showcart');
Route::get('delete/{id}','CartController@deletecart')->name('deletecart');
Route::get('update','CartController@updatecart');

Route::get('addwishlist/{id}','WishController@addwishlist')->name('addwishlist');
Route::get('showwishlist','WishController@showwishlist');
Route::get('delete/{id}','WishController@deletewishlist');

Route::any('search/', 'SearchController@search');

Route::get('admin/','Admin\AdminController@getadmin');
Route::get('admin/category','Admin\CategoriesController@getcategory');
Route::get('admin/category/edit/{id}','Admin\CategoriesController@editcategory');
Route::post('admin/category/edit/{id}','Admin\CategoriesController@posteditcategory');
Route::get('admin/category/delete/{id}','Admin\CategoriesController@deletecategory');
Route::get('admin/user','Admin\UserController@getuser');
Route::get('admin/user/delete/{id}','Admin\UserController@deleteuser');
Route::get('admin/user/edit/{id}','Admin\UserController@edituser');
Route::post('admin/user/edit/{id}','Admin\UserController@postedituser');
Route::get('admin/bill','Admin\BillController@getbill');

Route::get('checkout','DetailController@get');
Route::post('checkout','DetailController@post');

Route::get('profile','UserProfileController@get');
Route::get('profile/historybill','UserProfileController@getbill');

Route::get('facebook', 'Auth\SocialController@redirectToProvider');
Route::get('facebook/callback', 'Auth\SocialController@handleProviderCallback');
Route::get('google', 'Auth\SocialController@redirect');
Route::get('google/callback', 'Auth\SocialController@callback');
