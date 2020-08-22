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
    Route::get('/create', 'categoryController@create')->name('category.create');
    Route::get('/edit/{id}', 'categoryController@edit')->name('category.edit');
    Route::post('/update/{id}', 'categoryController@update')->name('category.update');
    Route::get('/delete/{id}', 'categoryController@delete')->name('category.delete');
    Route::get('/index', 'categoryController@index')->name('category.index');
    Route::post('/store', 'categoryController@store')->name('category.store');
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
    Route::get('/delete/{id}','productController@delete')->name('product.delete');
});

Route::prefix('/slider')->group(function () {
    Route::get('/', 'sliderController@index')->name('slider.index');
    Route::get('/create', 'sliderController@create')->name('slider.create');
    Route::post('/store', 'sliderController@store')->name('slider.store');
    Route::get('/edit/{id}', 'sliderController@edit')->name('slider.edit');
    Route::post('/update/{id}', 'sliderController@update')->name('slider.update');
    Route::get('/delete/{id}','sliderController@delete')->name('slider.delete');
});

Route::prefix('/setting')->group(function () {
    Route::get('/', 'settingController@index')->name('setting.index');
    Route::get('/create', 'settingController@create')->name('setting.create');
    // Route::post('/store', 'settingController@store')->name('setting.store');
    // Route::get('/edit/{id}', 'settingController@edit')->name('setting.edit');
    // Route::post('/update/{id}', 'settingController@update')->name('setting.update');
    // Route::get('/delete/{id}','settingController@delete')->name('setting.delete');
});
