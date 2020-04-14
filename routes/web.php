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


// Cards
Route::get('cards', 'CardController@list');
Route::get('cards/{id}', 'CardController@show');

// API
Route::put('api/cards', 'CardController@create');
Route::delete('api/cards/{card_id}', 'CardController@delete');
Route::put('api/cards/{card_id}/', 'ItemController@create');
Route::post('api/item/{id}', 'ItemController@update');
Route::delete('api/item/{id}', 'ItemController@delete');

// Authentication

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');

//Routes for the professor's template pages
Route::get('registerTemplate', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('registerTemplate', 'Auth\RegisterController@register');

//Page to go to by default
Route::get('/', 'HomeController@show');

Route::get('home', 'HomeController@show');
Route::get('about', 'AboutController@show');
Route::get('FAQ', 'FAQController@show');
Route::get('wishlist', 'WishlistController@show');
Route::get('adminPage', 'AdminProfileController@show');
Route::get('cart', 'CartController@show');
Route::get('product/{id}', 'ProductController@show');
Route::get('search', 'SearchController@show');
Route::get('profile', 'ProfileController@show');
Route::get('purchase_history', 'PurchaseHistoryController@show');

//should implement things from the auth folder for these pages
Route::get('register', 'RegisterController@show');