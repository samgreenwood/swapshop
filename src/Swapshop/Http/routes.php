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

Route::group(array('namespace' => 'Swapshop\Http\Controllers'), function () {

    Route::group(['prefix' => 'api'], function () {
        Route::get('/tags', ['as' => 'api.tags.index', 'uses' => 'Api\TagController@getIndex']);
    });

    Route::group(array('before' => 'auth'), function () {
        Route::group(array('before' => 'admin'), function () {
            Route::get('tags', array('as' => 'tags.index', 'uses' => 'TagController@getIndex'));
            Route::get('tags/create', array('as' => 'tags.create', 'uses' => 'TagController@getCreate'));
            Route::post('tags', array('as' => 'tags.store', 'uses' => 'TagController@postStore'));
            Route::get('tags/{id}/edit', array('as' => 'tags.edit', 'uses' => 'TagController@getEdit'))->where('id', '[0-9]+');
            Route::put('tags/{id}', array('as' => 'tags.update', 'uses' => 'TagController@putUpdate'))->where('id', '[0-9]+');
            Route::get('tags/{id}/delete', array('as' => 'tags.delete', 'uses' => 'TagController@getDelete'))->where('id', '[0-9]+');
            Route::delete('tags/{id}', array('as' => 'tags.destroy', 'uses' => 'TagController@deleteDelete'))->where('id', '[0-9]+');

            Route::get('products/{id}/edit', array('as' => 'products.edit', 'uses' => 'ProductController@getEdit'))->where('id', '[0-9]+');
            Route::put('products/{id}/edit', array('as' => 'products.update', 'uses' => 'ProductController@putUpdate'))->where('id', '[0-9]+');
            Route::get('products/{id}/delete', array('as' => 'products.delete', 'uses' => 'ProductController@getDelete'))->where('id', '[0-9]+');
            Route::delete('products/{id}', array('as' => 'products.destroy', 'uses' => 'ProductController@deleteDelete'))->where('id', '[0-9]+');
        });

        Route::group(array('before' => 'listing-owner'), function () {
            Route::get('listings/{id}/edit', array('as' => 'listings.edit', 'uses' => 'ListingController@getEdit'))->where('id', '[0-9]+');
            Route::put('listings/{id}', array('as' => 'listings.update', 'uses' => 'ListingController@putUpdate'))->where('id', '[0-9]+');
        });

        Route::get('products', array('as' => 'products.index', 'uses' => 'ProductController@getIndex'));
        Route::get('products/create', array('as' => 'products.create', 'uses' => 'ProductController@getCreate'));
        Route::post('products', array('as' => 'products.store', 'uses' => 'ProductController@postStore'));
        Route::get('products/{id}', array('as' => 'products.show', 'uses' => 'ProductController@getShow'))->where('id', '[0-9]+');
        Route::get('products/{slug}', array('as' => 'tag.products', 'uses' => 'ProductController@getTag'));

        Route::get('listings/create', array('as' => 'listings.create', 'uses' => 'ListingController@getCreate'));
        Route::post('listings', array('as' => 'listings.store', 'uses' => 'ListingController@postStore'));
        Route::get('listings/{id}/show', array('as' => 'listings.show', 'uses' => 'ListingController@getShow'))->where('id', '[0-9]+');
        Route::get('listings/{slug?}', array('as' => 'product.listings', 'uses' => 'ListingController@getIndex'));

        Route::get('purchase/{listingid}', array('as' => 'listings.purchase', 'uses' => 'PurchaseController@getPurchase'))->where('listingid', '[0-9]+');
        Route::post('purchase/{listingid}', array('as' => 'listings.purchase.post', 'uses' => 'PurchaseController@postPurchase'))->where('listingid', '[0-9]+');

        Route::get('dashboard', array('as' => 'dashboard', 'uses' => 'DashboardController@getIndex'));
        Route::get('my-swapshop', array('as' => 'my-swapshop', 'uses' => 'DashboardController@getMySwapshop'));

        Route::post('search', array('as' => 'search', 'uses' => 'SearchController@postIndex'));
    });

    Route::get('/', function () {
        return \Redirect::route('dashboard');
    });


    Route::get('/login', array('as' => 'login_path', 'uses' => 'AuthController@getLogin'));
    Route::post('/login', array('as' => 'login', 'uses' => 'AuthController@postLogin'));
    Route::get('/logout', array('as' => 'logout', 'uses' => 'AuthController@getLogout'));
});