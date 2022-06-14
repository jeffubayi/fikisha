<?php

use App\Mail\MailtrapExample;
use Illuminate\Support\Facades\Mail;

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
Auth::routes();

Route::get('/', 'HomeController@index')->name('index');

//order Route
Route::get('/orders', 'OrderController@index')->name('orders.index');
Route::get('/orders/create', 'OrderController@create')->name('orders.create');
Route::post('/orders/store', 'OrderController@store')->name('orders.store');
Route::get('/orders/edit/{id}', 'OrderController@edit')->name('orders.edit');
Route::post('/orders/update', 'OrderController@update')->name('orders.update');
Route::get('/orders/delete/{id}', 'OrderController@destroy')->name('orders.delete');


//fleet Route
Route::get('/fleets', 'FleetController@index')->name('fleets.index');
Route::get('/fleets/create', 'FleetController@create')->name('fleets.create');
Route::post('/fleets/store', 'FleetController@store')->name('fleets.store');
Route::get('/fleets/edit/{id}', 'FleetController@edit')->name('fleets.edit');
Route::post('/fleets/update', 'FleetController@update')->name('fleets.update');
Route::get('/fleets/delete/{id}', 'FleetController@destroy')->name('fleets.delete');

//customer Route
Route::get('/customer', 'CustomerController@index')->name('customer.index');
Route::get('/customer/create', 'CustomerController@create')->name('customer.create');
Route::post('/customer/store', 'CustomerController@store')->name('customer.store');
Route::get('/customer/edit/{id}', 'CustomerController@edit')->name('customers.edit');
Route::post('/customer/update', 'CustomerController@update')->name('customers.update');
Route::get('/customer/delete/{id}', 'CustomerController@destroy')->name('customers.delete');

//email notification
Route::get('/send-mail', function () {

    Mail::to('newuser@example.com')->send(new MailtrapExample());

    return 'A message has been sent to Fikisha!';

});

