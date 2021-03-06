<?php

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

Route::get('logout', 'Auth\LoginController@logout');
Auth::routes();

// Route::get('/home', 'HomeController@index')->name('dashboard');

Route::group(['middleware' => ['auth', 'admin', 'operator']], function () {
});

Route::group(['middleware' => ['auth', 'admin']], function () {
	Route::group(['prefix' => 'admin', 'as' => 'admin'], function () {
		Route::get('/', 'AdminController@index')->name('');
		Route::group(['prefix' => 'config', 'as' => '.config'], function () {
			Route::get('/', 'ConfigController@index')->name('.index');
			Route::get('/edit/{id}', 'ConfigController@edit')->name('.edit');
			Route::post('/update/{id}', 'ConfigController@update')->name('.update');
		});
		Route::group(['prefix' => 'about', 'as' => '.about'], function () {
			Route::get('/', 'AboutController@index')->name('.index');
			Route::get('/create', 'AboutController@create')->name('.create');
			Route::post('/store', 'AboutController@store')->name('.store');
			Route::get('/edit/{id}', 'AboutController@edit')->name('.edit');
			Route::post('/update/{id}', 'AboutController@update')->name('.update');
			Route::get('/destroy/{id}', 'AboutController@destroy')->name('.destroy');
		});
		Route::group(['prefix' => 'project', 'as' => '.project', 'namespace' => 'Backend'], function () {
			Route::get('/', 'ProjectController@index')->name('.index');
			Route::get('/create', 'ProjectController@create')->name('.create');
			Route::post('/store', 'ProjectController@store')->name('.store');
			Route::get('/edit/{id}', 'ProjectController@edit')->name('.edit');
			Route::post('/update/{id}', 'ProjectController@update')->name('.update');
			Route::get('/destroy/{id}', 'ProjectController@destroy')->name('.destroy');
		});
		Route::group(['prefix' => 'galery', 'as' => '.galery'], function () {
			Route::get('/', 'GaleryController@index')->name('.index');
			Route::get('/create', 'GaleryController@create')->name('.create');
			Route::post('/store', 'GaleryController@store')->name('.store');
			Route::get('/edit/{id}', 'GaleryController@edit')->name('.edit');
			Route::post('/update/{id}', 'GaleryController@update')->name('.update');
			Route::get('/destroy/{id}', 'GaleryController@destroy')->name('.destroy');
		});
		Route::group(['prefix' => 'slider', 'as' => '.slider'], function () {
			Route::get('/', 'SliderController@index')->name('.index');
			Route::get('/create', 'SliderController@create')->name('.create');
			Route::post('/store', 'SliderController@store')->name('.store');
			Route::get('/edit/{id}', 'SliderController@edit')->name('.edit');
			Route::post('/update/{id}', 'SliderController@update')->name('.update');
			Route::get('/destroy/{id}', 'SliderController@destroy')->name('.destroy');
		});
		Route::group(['prefix' => 'user', 'as' => '.user'], function () {
			Route::get('/', 'UserController@index')->name('.index');
			Route::get('/create', 'UserController@create')->name('.create');
			Route::post('/store', 'UserController@store')->name('.store');
			Route::get('/verif/{id}', 'UserController@verif')->name('.verif');
		});
		Route::group(['prefix' => 'project-detail', 'as' => '.project-detail'], function () {
			Route::get('/', 'ProjectDetailController@index')->name('.index');
			Route::get('/create', 'ProjectDetailController@create')->name('.create');
			Route::post('/store', 'ProjectDetailController@store')->name('.store');
			Route::get('/edit/{id}', 'ProjectDetailController@edit')->name('.edit');
			Route::post('/update/{id}', 'ProjectDetailController@update')->name('.update');
			Route::get('/destroy/{id}', 'ProjectDetailController@destroy')->name('.destroy');
		});
		Route::group(['prefix' => 'fasilitas', 'as' => '.fasilitas', 'namespace' => 'Backend'], function () {
			Route::get('/', 'FasilitasController@index')->name('.index');
			Route::get('/create', 'FasilitasController@create')->name('.create');
			Route::post('/store', 'FasilitasController@store')->name('.store');
			Route::get('/edit/{id}', 'FasilitasController@edit')->name('.edit');
			Route::post('/update/{id}', 'FasilitasController@update')->name('.update');
			Route::get('/destroy/{id}', 'FasilitasController@destroy')->name('.destroy');
		});
		Route::group(['prefix' => 'progres', 'as' => '.progres', 'namespace' => 'Backend'], function () {
			Route::get('/', 'ProgresController@index')->name('.index');
			Route::get('/create', 'ProgresController@create')->name('.create');
			Route::post('/store', 'ProgresController@store')->name('.store');
			Route::get('/edit/{id}', 'ProgresController@edit')->name('.edit');
			Route::post('/update/{id}', 'ProgresController@update')->name('.update');
			Route::get('/destroy/{id}', 'ProgresController@destroy')->name('.destroy');
		});
	});
});

Route::get('/', 'FrontController@index')->name('home');
Route::get('/about', 'FrontController@about')->name('about');
Route::get('/project', 'FrontController@project')->name('project');
Route::get('/progres', 'FrontController@progres')->name('progres');
Route::get('/galery', 'FrontController@galery')->name('galery');
Route::get('/contact', 'FrontController@contact')->name('contact');
Route::get('/project/{name}', 'FrontController@projectDetail')->name('projectDetail');
Route::get('/progres/{name}', 'FrontController@progresDetail')->name('progresDetail');
Route::get('/image/{slug}/{type}', 'FrontController@image')->name('image');
Route::get('/image/{slug}/{type}/{id}', 'FrontController@image')->name('image_id');

Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('config:clear');
    $exitCode = Artisan::call('config:cache');
    return 'DONE'; //Return anything
});