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

// Authentication
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register')->name('register');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');

//Create product
Route::get('admin/product/add', 'AdminProfileController@showProductCreateForm');
Route::post('admin/product/add', 'ProductController@create')->name('create_product');

//Page to go to by default + home
Route::get('/', 'HomeController@show');
Route::get('home', 'HomeController@show')->name('home');

//Cart
Route::get('cart', 'CartController@show');
Route::get('product/{id}/cart', 'CartController@add');
Route::get('cart/buy', 'CartController@buy');
Route::get('cart/remove/{id}', 'CartController@remove');

//Product
Route::get('product/{id}/buy', 'ProductController@buy');
Route::get('product/{id}', 'ProductController@show');

//Wishlist
Route::get('wishlist', 'WishlistController@show');
Route::get('wishlist/remove/{id}', 'WishlistController@remove');
Route::get('product/{id}/wishlist', 'WishlistController@add');


Route::get('search', 'SearchController@show');
Route::get('profile', 'ProfileController@show');
Route::get('purchase_history', 'PurchaseHistoryController@show');

//static pages
Route::get('about', 'AboutController@show');
Route::get('FAQ', 'FAQController@show');

//Management
Route::get('admin', 'AdminProfileController@show');
Route::get('admin/brands/delete/{id}', 'AdminProfileController@destroyBrand');
Route::post('admin/brands/add', 'AdminProfileController@createBrand')->name('create_brand');
