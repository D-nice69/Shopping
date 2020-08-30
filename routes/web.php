<?php

use App\Category;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/home', function () {
    return view('index');
});
Route::get('/', function () {
    return view('index');
});
Route::get('/Homepage', function () {
    return view('home');
});
Route::prefix('categories')->group(function () {
    Route::get('/', 'categoryController@index')
        ->name('category.index')
        ->middleware('can:category-list');
    Route::get('/create', 'categoryController@create')
        ->name('category.create')
        ->middleware('can:category-add');
    Route::post('/store', 'categoryController@store')
        ->name('category.store');
    Route::get('/edit/{id}', 'categoryController@edit')
        ->name('category.edit')
        ->middleware('can:category-edit');
    Route::post('/update/{id}', 'categoryController@update')
        ->name('category.update');
    Route::get('/delete/{id}', 'categoryController@delete')
        ->name('category.delete')
        ->middleware('can:category-delete');
});

Route::prefix('/menus')->group(function () {
    Route::get('/', 'menuController@index')->name('menu.index');
    Route::get('/create', 'menuController@create')->name('menu.create');
    Route::post('/store', 'menuController@store')->name('menu.store');
    Route::get('/edit/{id}', 'menuController@edit')->name('menu.edit');
    Route::post('/update/{id}', 'menuController@update')->name('menu.update');
    Route::get('/delete/{id}', 'menuController@delete')->name('menu.delete');
});

Route::prefix('admin')->group(function () {
    Route::get('/', 'AdminController@LoginAdmin')->name('Admin.login');
    Route::post('/', 'AdminController@PostLoginAdmin')->name('Admin.postLogin');
});

Route::prefix('/products')->group(function () {
    Route::get('/', 'productController@index')->name('product.index');
    Route::get('/create', 'productController@create')->name('product.create');
    Route::post('/store', 'productController@store')->name('product.store');
    Route::get('/edit/{id}', 'productController@edit')->name('product.edit');
    Route::post('/update/{id}', 'productController@update')->name('product.update');
    Route::get('/delete/{id}', 'productController@delete')->name('product.delete');
});

Route::prefix('/slider')->group(function () {
    Route::get('/', 'sliderController@index')->name('slider.index');
    Route::get('/create', 'sliderController@create')->name('slider.create');
    Route::post('/store', 'sliderController@store')->name('slider.store');
    Route::get('/edit/{id}', 'sliderController@edit')->name('slider.edit');
    Route::post('/update/{id}', 'sliderController@update')->name('slider.update');
    Route::get('/delete/{id}', 'sliderController@delete')->name('slider.delete');
});

Route::prefix('/setting')->group(function () {
    Route::get('/', 'settingController@index')->name('setting.index');
    Route::get('/create', 'settingController@create')->name('setting.create');
    Route::post('/store', 'settingController@store')->name('setting.store');
    Route::get('/edit/{id}', 'settingController@edit')->name('setting.edit');
    Route::post('/update/{id}', 'settingController@update')->name('setting.update');
    Route::get('/delete/{id}', 'settingController@delete')->name('setting.delete');
});

Route::prefix('/users')->group(function () {
    Route::get('/', 'adminUserController@index')->name('users.index');
    Route::get('/create', 'adminUserController@create')->name('users.create');
    Route::post('/store', 'adminUserController@store')->name('users.store');
    Route::get('/edit/{id}', 'adminUserController@edit')->name('users.edit');
    Route::post('/update/{id}', 'adminUserController@update')->name('users.update');
    Route::get('/delete/{id}', 'adminUserController@delete')->name('users.delete');
});

Route::prefix('/role')->group(function () {
    Route::get('/', 'AdminRoleController@index')->name('role.index');
    Route::get('/create', 'AdminRoleController@create')->name('role.create');
    Route::post('/store', 'AdminRoleController@store')->name('role.store');
    Route::get('/edit/{id}', 'AdminRoleController@edit')->name('role.edit');
    Route::post('/update/{id}', 'AdminRoleController@update')->name('role.update');
    Route::get('/delete/{id}', 'AdminRoleController@delete')->name('role.delete');
});

Route::prefix('/permission')->group(function () {
    Route::get('/', 'AdminPermissionController@index')->name('permission.index');
    Route::get('/create', 'AdminPermissionController@create')->name('permission.create');
    Route::post('/store', 'AdminPermissionController@store')->name('permission.store');
    // Route::get('/edit/{id}', 'AdminPermissionController@edit')->name('permission.edit');
    // Route::post('/update/{id}', 'AdminPermissionController@update')->name('permission.update');
    // Route::get('/delete/{id}', 'AdminPermissionController@delete')->name('permission.delete');
});
