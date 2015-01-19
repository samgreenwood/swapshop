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


Route::group(array('before' => 'auth'), function()
{
    Route::group(array('before' => 'admin'), function()
    {
        Route::get('tags', array('as' => 'tags.index', 'uses' => 'Swapshop\Controllers\TagController@getIndex'));
        Route::get('tags/create', array('as' => 'tags.create', 'uses' => 'Swapshop\Controllers\TagController@getCreate'));
        Route::post('tags', array('as' => 'tags.store', 'uses' => 'Swapshop\Controllers\TagController@postStore'));
        Route::get('tags/{id}/edit', array('as' => 'tags.edit', 'uses' => 'Swapshop\Controllers\TagController@getEdit'))->where('id', '[0-9]+');
        Route::put('tags/{id}', array('as' => 'tags.update', 'uses' => 'Swapshop\Controllers\TagController@putUpdate'))->where('id', '[0-9]+');
        Route::get('tags/{id}/delete', array('as' => 'tags.delete', 'uses' => 'Swapshop\Controllers\TagController@getDelete'))->where('id', '[0-9]+');
        Route::delete('tags/{id}', array('as' => 'tags.destroy', 'uses' => 'Swapshop\Controllers\TagController@deleteDelete'))->where('id', '[0-9]+');

        Route::get('products/{id}/edit', array('as' => 'products.edit', 'uses' => 'Swapshop\Controllers\ProductController@getEdit'))->where('id', '[0-9]+');
        Route::put('products/{id}/edit', array('as' => 'products.update', 'uses' => 'Swapshop\Controllers\ProductController@putUpdate'))->where('id', '[0-9]+');
        Route::get('products/{id}/delete', array('as' => 'products.delete', 'uses' => 'Swapshop\Controllers\ProductController@getDelete'))->where('id', '[0-9]+');
        Route::delete('products/{id}', array('as' => 'products.destroy', 'uses' => 'Swapshop\Controllers\ProductController@deleteDelete'))->where('id', '[0-9]+');
    });
   
    Route::group(array('before' => 'listing-owner'), function()
    {
        Route::get('listings/{id}/edit', array('as' => 'listings.edit', 'uses' => 'Swapshop\Controllers\ListingController@getEdit'))->where('id', '[0-9]+');
        Route::put('listings/{id}', array('as' => 'listings.update', 'uses' => 'Swapshop\Controllers\ListingController@putUpdate'))->where('id', '[0-9]+');
    });

    Route::get('products', array('as' => 'products.index', 'uses' => 'Swapshop\Controllers\ProductController@getIndex'));
    Route::get('products/create', array('as' => 'products.create', 'uses' => 'Swapshop\Controllers\ProductController@getCreate'));
    Route::post('products', array('as' => 'products.store', 'uses' => 'Swapshop\Controllers\ProductController@postStore'));
    Route::get('products/{id}', array('as' => 'products.show', 'uses' => 'Swapshop\Controllers\ProductController@getShow'))->where('id', '[0-9]+');
    Route::get('products/{slug}', array('as' => 'tag.products', 'uses' => 'Swapshop\Controllers\ProductController@getTag'));

    Route::get('listings/create', array('as' => 'listings.create', 'uses' => 'Swapshop\Controllers\ListingController@getCreate'));
    Route::post('listings', array('as' => 'listings.store', 'uses' => 'Swapshop\Controllers\ListingController@postStore'));
    Route::get('listings/{id}/show', array('as' => 'listings.show', 'uses' => 'Swapshop\Controllers\ListingController@getShow'))->where('id', '[0-9]+');
    Route::get('listings/{slug?}', array('as' => 'product.listings', 'uses' => 'Swapshop\Controllers\ListingController@getIndex'));

    Route::get('purchase/{listingid}', array('as' => 'listings.purchase', 'uses' => 'Swapshop\Controllers\PurchaseController@getPurchase'))->where('listingid', '[0-9]+');
    Route::post('purchase/{listingid}', array('as' => 'listings.purchase.post', 'uses' => 'Swapshop\Controllers\PurchaseController@postPurchase'))->where('listingid', '[0-9]+');
    
    Route::get('dashboard', array('as' => 'dashboard', 'uses' => 'Swapshop\Controllers\DashboardController@getIndex'));
    Route::get('my-swapshop', array('as' => 'my-swapshop', 'uses' => 'Swapshop\Controllers\DashboardController@getMySwapshop'));

    Route::post('search', array('as' => 'search', 'uses' => 'Swapshop\Controllers\SearchController@postIndex'));
});

Route::get('/', function() {
    return \Redirect::route('dashboard');
});

Route::get('/login', array('as' => 'login_path', 'uses' => 'Swapshop\Controllers\AuthController@getLogin'));
Route::post('/login', array('as' => 'login', 'uses' => 'Swapshop\Controllers\AuthController@postLogin'));
Route::get('/logout', array('as' => 'logout', 'uses' => 'Swapshop\Controllers\AuthController@getLogout'));
