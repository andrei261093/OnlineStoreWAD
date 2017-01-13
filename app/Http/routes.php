<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', [
    'uses' => 'productController@getIndex',
    'as' => 'product.index'
]);


Route::group(['prefix' => 'user'], function () {

    Route::get('/signup', [
        'uses' => 'UserController@getSignup',

        'as' => 'user.signup',
        'middleware' => 'guest'
    ]);

    Route::post('/signup', [
        'uses' => 'UserController@postSignup',
        'as' => 'user.postsignup',
        'middleware' => 'guest'
    ]);

    Route::get('/signin', [
        'uses' => 'UserController@getSignin',
        'as' => 'user.signin',
        'middleware' => 'guest'
    ]);

    Route::post('/signin', [
        'uses' => 'UserController@postSignin',
        'as' => 'user.signin',
        'middleware' => 'guest'
    ]);

    Route::get('/profile', [
        'uses' => 'UserController@getProfile',
        'as' => 'user.profile',
        'middleware' => 'auth'
    ]);

    Route::get('/logout', [
        'uses' => 'UserController@getLogout',
        'as' => 'user.logout',
        'middleware' => 'auth'
    ]);

});


Route::get('/tv', [
    'uses' => 'productController@getTVProducts',
    'as' => 'product.tv'
]);

Route::get('/category/{id}', [
    'uses' => 'productController@getCatProducts',
    'as' => 'product.id'
]);

Route::get('/add-to-cart/{id}', [
    'uses' => 'productController@getAddToCart',
    'as' => 'product.addToCart'
]);

Route::get('/reduceByOne{id}', [
    'uses' => 'productController@getReduceByOne',
    'as' => 'reduce'
]);
Route::get('/removeItem {id}', [
    'uses' => 'productController@getRemoveItem',
    'as' => 'remove'
]);

Route::get('/shopping-cart', [
    'uses' => 'productController@getShoppingCart',
    'as' => 'product.shoppingCart'
]);

Route::get('/checkout', [
    'uses' => 'productController@getCheckout',
    'as' => 'checkout'
]);

Route::post('/checkout', [
    'uses' => 'productController@postckeckout',
    'as' => 'checkout'
]);

Route::get('/autocomplete', [
    'uses' => 'SearchController@autocomplete',
    'as' => 'autocomplete'
]);