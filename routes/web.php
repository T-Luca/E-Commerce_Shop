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

Route::get('/', function () {
    return view('welcome');
});
/*Route::get('/admin', function () {
    return view('layouts.admin');
});*/

Route::get('/', [
    'uses' => 'ProductController@getIndex',
    'as' => 'product.index'

]);

//search products
Route::post ( '/search', 'SearchController@search' );

//details product
Route::resource('shop', 'ProductController', ['only' => ['show']]);

Route::get('/shopping-cart', [
    'uses' => 'CartController@getCart',
    'as' => 'product.shoppingCart'
]);

Route::get('/add-to-cart/{id}', [
    'uses' => 'CartController@getAddToCart',
    'as' => 'product.addToCart'
]);

Route::get('/reduce/{id}', [
    'uses' => 'CartController@getReduceByOne',
    'as' => 'product.reduceByOne'
]);


Route::group(['prefix' => 'user'], function () {
   /* Route::group(['middleware' => 'guest'], function () {
        Route::get('/signup', [
            'uses' => 'UserController@getSignup',
            'as' => 'user.signup'
        ]);
        Route::post('/signup', [
            'uses' => 'UserController@postSignup',
            'as' => 'user.signup'
        ]);
        Route::get('/signin', [
            'uses' => 'UserController@getSignin',
            'as' => 'user.signin'
        ]);
        Route::post('/signin', [
            'uses' => 'UserController@postSignin',
            'as' => 'user.signin'
        ]);
    });*/

    Route::group(['middleware' => 'auth'], function () {
        Route::get('/logout', [
            'uses' => 'UserController@getLogout',
            'as' => 'user.logout'
        ]);
    });
});

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']], function()
{
    Route::get('/', function () {
        return view('layouts.admin');
    });

    //CRUD Products
    Route::get('/products', 'ProductController@index')->name('products.index');
    Route::get('/products/add', 'ProductController@add')->name('products.add');
    Route::post('/products/insert', 'ProductController@insert')->name('products.insert');
    Route::get('/products/edit/{id}', 'ProductController@edit')->name('products.edit');
    Route::post('/products/update/{id}', 'ProductController@update')->name('products.update');
    Route::get('/products/delete/{id}', 'ProductController@delete')->name('products.delete');

    //CRUD Users
    Route::get('/users', 'UserController@index')->name('user.index');
    Route::get('/users/add', 'UserController@add')->name('user.add');
    Route::post('/users/insert', 'UserController@insert')->name('user.insert');
    Route::get('/users/edit/{id}', 'UserController@edit')->name('user.edit');
    Route::post('/users/update/{id}', 'UserController@update')->name('user.update');
    Route::get('/users/delete/{id}', 'UserController@delete')->name('user.delete');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

