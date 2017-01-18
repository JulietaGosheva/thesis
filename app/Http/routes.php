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

Route::get('/', ['middleware' => ['web'], 'uses' => 'Home@loadView']);

Route::get('/about_us', function () {
    return view('about_us.index');
})->middleware(['web']);

Route::get('/login', function () {
    return view('login.index');
})->middleware(['web']);

Route::get('/forbidden', function () {
	return view('errors.403');
});

Route::post('/login', ['middleware' => ['web'], 'uses' => 'Auth\AuthController@authenticate']);

Route::get('/registration', function () {
    return view('registration.index');
})->middleware(['web']);

Route::get('/logout', ['middleware' => ['web'], 'uses' => 'Logout@logout']);

Route::post('/order', ['middleware' => ['web', 'auth'], 'uses' => 'Orders@createOrder']);

Route::get('/users/edit', ['middleware' => ['web', 'auth', 'admin.authz'], 'uses' => 'Users@loadEditView']);
Route::get('/users/registration', function() {
	return view('users.registration');
})->middleware(['web', 'auth', 'admin.authz']);

Route::post('/users/edit', ['middleware' => ['web', 'auth'], 'uses' => 'Users@editUser']);
Route::post('/users/registration', ['middleware' => ['web'], 'uses' => 'Users@createUser']);

Route::get('/dishes/review', ['middleware' => ['web'], 'uses' => 'Dishes@loadDishView']);
Route::get('/dishes/creation', function() {
	return view('dishes.creation');
})->middleware(['web', 'auth', 'admin.authz']);

Route::get('/dishes/edit', ['middleware' => ['web', 'auth', 'admin.authz'], 'uses' => 'Dishes@loadEditDishView']);
Route::get('/dishes/edit/{id}', ['middleware' => ['web', 'auth', 'admin.authz'], 'uses' => 'Dishes@loadEditDishViewById']);
Route::get('/dishes/deletion', ['middleware' => ['web', 'auth', 'admin.authz'], 'uses' => 'Dishes@loadDishDeletionView']);

Route::post('/dishes/creation', ['middleware' => ['web', 'auth', 'admin.authz'], 'uses' => 'Dishes@createDish']);
Route::post('/dishes/edit', ['middleware' => ['web', 'auth', 'admin.authz'], 'uses' => 'Dishes@editDish']);
Route::post('/dishes/deletion', ['middleware' => ['web', 'auth', 'admin.authz'], 'uses' => 'Dishes@deleteDishById']);

Route::get('/orders', ['middleware' => ['web', 'auth', 'admin.authz'], 'uses' => 'Orders@listOrders']);

Route::group(['middleware' => ['web']], function () {
	Route::get('/cart', 'Cart@loadCartView');
	Route::post('/addtocart/{id}', 'Cart@addToCart');
	Route::post('/removefromcart/{id}', 'Cart@removeFromCart');
});
