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
// Route::get('/', function () {
// 	return 'Hello Laravel 6.7';
// });


// required dynamic params
Route::get('/name/{name}', function ($name) {
	return 'Hello '.$name;
});

// optional dynamic params
Route::get('/name/{name?}', function ($name="Guest") {
	return 'Hello '.$name;
});

//Route::redirect('/', '/home');	// (301 permenant & 302 temporary) for SEO
Route::redirect('/', '/welcome');	// (301 permenant & 302 temporary) for SEO
// Route::view('/', 'welcome', ['name' => 'Arsalan','Company' => 'DevDesign']); 

// controller
Route::get('/welcome/', 'WelcomeController@welcome');


// resource controllers for CMS

Route::prefix('admin')->middleware(['auth', 'password.confirm'])->group(function(){
	Route::view('/', 'dashboard.admin');
	Route::resource('posts', 'PostController');
	Route::resource('roles', 'RoleController');
	Route::resource('users', 'UserController')->middleware(['auth','password.confirm']);
	Route::resource('profile', 'UserProfileController');
	Route::resource('pages', 'PageController');
	Route::resource('categories', 'CategoryController');
	Route::post('upload', function() {
		
		if(request()->hasFile('file')) {
            $fileExtension = request()->File('file')->getClientOriginalExtension();
            $filename = sprintf('tiny_%s.'.$fileExtension, random_int(1, 1000));
            $Userphoto = request()->file('file')->storeAs('tiny', $filename, 'public');
        }else {
            $Userphoto = asset('storage/tiny/dummy.png');
        }


        if($Userphoto !== null) {
        	return response()->json(["location" => asset('storage/'.$Userphoto)], 200);
        }else {
        	return response()->json(["location" => "File Not Uploaded"], 200);
        }
	});
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
