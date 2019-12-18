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

// Route::get('/', function () {
//     return view('welcome');
// });

// started
Route::get('/home', function () {
	return 'Hello Laravel 6.7';
});
Route::get('/', function () {
	return 'Hello Laravel 6.7';
});


// required dynamic params
Route::get('/name/{name}', function ($name) {
	return 'Hello '.$name;
});

// optional dynamic params
Route::get('/name/{name?}', function ($name="Guest") {
	return 'Hello '.$name;
});

//Route::redirect('/', '/home');	//(301 permenant & 302 temporary) for SEO
//Route::view('/', 'welcome', ['name' => 'Arsalan','Company' => 'DevDesign']); 

// controller
Route::get('/welcome/', 'WelcomeController@welcome');


// resource controller
Route::resource('post', 'PostController');


















