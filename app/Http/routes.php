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

Route::post('/login', 'Auth\AuthController@authenticate');

Route::get('/registration', function () {
    return view('registration.index');
});

Route::get('/logout', 'Logout@logout');

Route::post('/order', ['middleware' => ['web', 'auth'], 'uses' => 'Orders@createOrder']);

Route::get('/users/edit', ['middleware' => ['web', 'auth'], 'uses' => 'Users@loadEditView']);
Route::get('/users/registration', function() {
	return view('users.registration');
});

Route::post('/users/edit', ['middleware' => ['web', 'auth'], 'uses' => 'Users@editUser']);
Route::post('/users/registration', 'Users@createUser');

Route::get('/dishes/review', 'Dishes@loadDishView');
Route::get('/dishes/creation', function() {
	return view('dishes.creation');
})->middleware('web', 'auth');

Route::get('/dishes/edit', ['middleware' => ['web', 'auth'], 'uses' => 'Dishes@loadEditDishView']);
Route::get('/dishes/edit/{id}', ['middleware' => ['web', 'auth'], 'uses' => 'Dishes@loadEditDishViewById']);
Route::get('/dishes/deletion', ['middleware' => ['web', 'auth'], 'uses' => 'Dishes@loadDishDeletionView']);

Route::post('/dishes/creation', ['middleware' => ['web', 'auth'], 'uses' => 'Dishes@createDish']);
Route::post('/dishes/edit', ['middleware' => ['web', 'auth'], 'uses' => 'Dishes@editDish']);
Route::post('/dishes/deletion', ['middleware' => ['web', 'auth'], 'uses' => 'Dishes@deleteDishById']);

Route::group(['middleware' => ['web']], function () {
	Route::get('/cart', 'Cart@loadCartView');
	Route::post('/addtocart/{id}', 'Cart@addToCart');
	Route::post('/removefromcart/{id}', 'Cart@removeFromCart');
});
