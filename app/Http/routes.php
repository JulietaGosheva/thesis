<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('home.index');
});

Route::get('/about_us', function () {
    return view('about_us.index');
});

Route::get('/login', function () {
    return view('login.index');
});

Route::get('/registration', function () {
    return view('registration.index');
});

Route::get('/users/edit', 'Users@loadEditView');
Route::get('/users/registration', function() {
	return view('users.registration');
});

Route::post('/users/edit', 'Users@editUser');
Route::post('/users/registration', 'Users@createUser');

Route::get('/dishes/view', 'Dishes@loadDishView');
Route::post('/dishes/create', 'Dishes@createDish');
Route::post('/dishes/edit', 'Dishes@editDish');
Route::post('/dishes/delete', 'Dishes@deleteDishById');

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {

});
