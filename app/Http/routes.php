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

Route::post('/order', ['middleware' => ['web'], 'uses' => 'Orders@createOrder']);

Route::get('/users/edit', 'Users@loadEditView');
Route::get('/users/registration', function() {
	return view('users.registration');
});

Route::post('/users/edit', 'Users@editUser');
Route::post('/users/registration', 'Users@createUser');

Route::get('/dishes/review', 'Dishes@loadDishView');
Route::get('/dishes/creation', function() {
	return view('dishes.creation');
});
Route::get('/dishes/edit', 'Dishes@loadEditDishView');
Route::get('/dishes/edit/{id}', 'Dishes@loadEditDishViewById');
Route::get('/dishes/deletion', 'Dishes@loadDishDeletionView');

Route::post('/dishes/creation', 'Dishes@createDish');
Route::post('/dishes/edit', 'Dishes@editDish');
Route::post('/dishes/deletion', 'Dishes@deleteDishById');

Route::group(['middleware' => ['web']], function () {
	Route::get('/cart', 'Cart@loadCartView');
	Route::post('/addtocart/{id}', 'Cart@addToCart');
	Route::post('/removefromcart/{id}', 'Cart@removeFromCart');
});

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
