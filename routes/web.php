<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Auth::routes(['register' => false]);

Route::get('user/login', 'FrontendController@login')->name('login.form');
Route::post('user/login', 'FrontendController@loginSubmit')->name('login.submit');
Route::get('user/logout', 'FrontendController@logout')->name('user.logout');

Route::get('user/register', 'FrontendController@register')->name('register.form');
Route::post('user/register', 'FrontendController@registerSubmit')->name('register.submit');
// Reset password
Route::post('password-reset', 'FrontendController@showResetForm')->name('password.reset');
// Socialite
Route::get('login/{provider}/', 'Auth\LoginController@redirect')->name('login.redirect');
Route::get('login/{provider}/callback/', 'Auth\LoginController@Callback')->name('login.callback');

// Frontend Routes
Route::get('/', 'FrontendController@home')->name('home');
Route::get('/home', 'FrontendController@index');
Route::get('/about-us', 'FrontendController@aboutUs')->name('about-us');
Route::get('/contact', 'FrontendController@contact')->name('contact');
Route::post('/contact/message', 'MessageController@store')->name('contact.store');
Route::get('product-detail/{slug}', 'FrontendController@productDetail')->name('product-detail');
Route::post('/product/search', 'FrontendController@productSearch')->name('product.search');
Route::get('/product-cat/{slug}', 'FrontendController@productCat')->name('product-cat');
Route::get('/product-sub-cat/{slug}/{sub_slug}', 'FrontendController@productSubCat')->name('product-sub-cat');
Route::get('/product-brand/{slug}', 'FrontendController@productBrand')->name('product-brand');