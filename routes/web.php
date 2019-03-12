<?php
use Illuminate\Support\Facades\Request;
use App\Product;
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

Route::get('/', [
    'uses' => 'ProductController@getIndex',
    'as' => 'product.index'
]);

//search products
Route::post ( '/search', 'SearchController@search' );

//details product
Route::resource('shop', 'ProductController', ['only' => ['show']]);

Route::get('/filter', function()
{
    $products = Product::where(function($query){
        $min_price = Request::has('min_price') ?  Request::get('min_price') : null;
        $max_price = Request::has('max_price') ? Request::get('max_price') : $max_price = null;
        $categories = Request::has('categories') ? Request::get('categories') : null;
        if(isset($min_price) && isset($max_price)){
            if(isset($categories)){
                foreach ($categories as $category) {
                    $query-> orWhere('price','>=',$min_price);
                    $query-> where('price','<=',$max_price);
                    $query->where('category_id','=', $category);
                }
            }
            $query-> where('price','>=',$min_price);
            $query-> where('price','<=',$max_price);
        }
    })->orderBy('price')->paginate(9);
    return view('shop.index', ['products' => $products]);
});

Route::get('/shopping-cart', [
    'uses' => 'CartController@getCart',
    'as' => 'product.shoppingCart'
]);

Route::get('/checkout', [
    'uses' => 'CartController@getCheckout',
    'as' => 'checkout',
    'middleware' => 'auth'
]);

Route::post('/checkout', [
    'uses' => 'CartController@postCheckout',
    'as' => 'checkout',
    'middleware' => 'auth'
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

