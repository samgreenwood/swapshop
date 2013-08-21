<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/


Route::group(array('prefix' => 'api'), function()
{
	Route::controller('users','Swapshop\Controllers\Api\UserController');
});

Route::group(array('before' => 'auth'), function()
{
	Route::controller('tags','Swapshop\Controllers\TagController');
	Route::controller('products','Swapshop\Controllers\ProductController');
	Route::controller('listings','Swapshop\Controllers\ListingController');
	
	Route::controller('/','Swapshop\Controllers\UserController');

});

Route::controller('/', 'Swapshop\Controllers\AuthController');
