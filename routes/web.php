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


//Page to go to by default + home
Route::get('/', 'HomeController@show');
Route::get('home', 'HomeController@show')->name('home');

//Cart
Route::get('cart', 'CartController@show');
Route::get('product/{id}/cart', 'CartController@add');
Route::get('cart/buy', 'CartController@buy');
Route::delete('cart/delete/{id}', 'CartController@delete');
Route::put('cart/increment/{id}', 'CartController@increment');
Route::put('cart/decrement/{id}', 'CartController@decrement');


//Purchase
Route::get('purchase/{id}', 'PurchaseController@show');
Route::get('purchase_history', 'PurchaseHistoryController@show');

//Product
Route::get('product/{id}/buy', 'ProductController@buy');
Route::get('product/{id}', 'ProductController@show');
Route::put('product/{id}/add_review', 'ProductController@addReview');

//Wishlist
Route::delete('wishlist/delete/{id}', 'WishlistController@delete');
Route::get('product/{id}/wishlist', 'WishlistController@add');
Route::get('wishlist', 'WishlistController@show');

//Search
Route::get('search', 'SearchController@show');
Route::get('search/{brandName}', 'SearchController@show'); //should return the search page with the brand name checkbox ticked
Route::get('brands', 'BrandController@show');
Route::post('search/filter', 'SearchController@filterResults');

//Profile
Route::get('profile', 'ProfileController@show')->name('profile');
Route::post('profile','ProfileController@profileUpdate')->name('profile.update');

//static pages
Route::get('about', 'AboutController@show');
Route::get('FAQ', 'FAQController@show');

//--------------------------------------------Management------------------------------------
//Delete stuff
Route::get('admin', 'AdminProfileController@show');
Route::delete('admin/brands/delete/{id}', 'AdminProfileController@destroyBrand');
Route::delete('admin/cpu/delete/{id}', 'AdminProfileController@destroyCPU');
Route::delete('admin/ram/delete/{id}', 'AdminProfileController@destroyRAM');
Route::get('admin/water/delete/{id}', 'AdminProfileController@destroyWater');
Route::get('admin/os/delete/{id}', 'AdminProfileController@destroyOS');
Route::get('admin/gpu/delete/{id}', 'AdminProfileController@destroyGPU');
Route::get('admin/screensize/delete/{id}', 'AdminProfileController@destroyScreenSize');
Route::get('admin/weight/delete/{id}', 'AdminProfileController@destroyWeight');
Route::get('admin/storage/delete/{id}', 'AdminProfileController@destroyStorage');
Route::get('admin/battery/delete/{id}', 'AdminProfileController@destroyBattery');
Route::get('admin/screenres/delete/{id}', 'AdminProfileController@destroyScreenRes');
Route::get('admin/cam/delete/{id}', 'AdminProfileController@destroyCam');
Route::get('admin/finger/delete/{id}', 'AdminProfileController@destroyFinger');

//Create stuff
Route::post('admin/brands/add', 'AdminProfileController@createBrand')->name('create_brand');
Route::post('admin/cpu/add', 'AdminProfileController@createCPU');
Route::post('admin/ram/add', 'AdminProfileController@createRAM')->name('create_ram');
Route::post('admin/water/add', 'AdminProfileController@createWater')->name('create_water');
Route::post('admin/os/add', 'AdminProfileController@createOS')->name('create_os');
Route::post('admin/gpu/add', 'AdminProfileController@createGPU')->name('create_gpu');
Route::post('admin/screensize/add', 'AdminProfileController@createScreenSize')->name('create_screensize');
Route::post('admin/weight/add', 'AdminProfileController@createWeight')->name('create_weight');
Route::post('admin/storage/add', 'AdminProfileController@createStorage')->name('create_storage');
Route::post('admin/battery/add', 'AdminProfileController@createBattery')->name('create_battery');
Route::post('admin/screenres/add', 'AdminProfileController@createScreenRes')->name('create_screenres');
Route::post('admin/cam/add', 'AdminProfileController@createCam')->name('create_cam');
Route::post('admin/finger/add', 'AdminProfileController@createFinger')->name('create_finger');

//Manage product
Route::get('admin/product/add', 'AdminProfileController@showProductCreateForm');
Route::post('admin/product/add', 'ProductController@create')->name('create_product');
Route::delete('admin/product/delete/{id}', 'ProductController@delete');
Route::post('admin/product/update/{id}', 'ProductController@update');

//Manage users
Route::post('admin/users/promote/{id}', 'UserController@promote');
Route::post('admin/users/demote/{id}', 'UserController@demote');

//Manage Orders
Route::post('admin/orders/update/{id}', 'PurchaseController@update');

//Manage static pages
Route::post('admin/faq/add', 'FAQController@create')->name('create_faq');
Route::delete('admin/faq/delete/{id}', 'FAQController@delete');
Route::post('admin/faq/update/{id}', 'FAQController@update');

