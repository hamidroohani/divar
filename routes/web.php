<?php
use App\Http\Middleware\AdminAuth;
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
Route::get('/',"ItemController@show");

Auth::routes();

Route::group(['middleware'=>'auth'],function (){
    Route::get('insert_form','InsertController@insert_form');
    Route::post('insert','InsertController@insert');
    Route::get('/my_items','ItemController@my_items');
});

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/information/{id}','ItemController@information');
Route::get('/search_items','ItemController@search_item');
Route::get('/categories','CategoryController@categories');
Route::get('/categories/{id}','CategoryController@show_categories');
Route::get('/aboutus','ContactController@about_us');

Route::group(['middleware' => AdminAuth::class , 'prefix' => "admin-panel"],function (){
    Route::get('/','AdminController@order_items');
    Route::get('/users','AdminController@users');
    Route::get('/users/delete','AdminController@delete_users');
    Route::get('/items','AdminController@items');
    Route::get('/order_items','AdminController@order_items');
    Route::get('/items/accept/{id}','AdminController@accept_items');
    Route::get('/items/information/{id}','AdminController@info_items');
    Route::get('/items/delete','AdminController@delete_items');
    Route::get('/items/delete/{id}','AdminController@delete_item');
    Route::get('/category','AdminController@categories');
    Route::get('/add_category','AdminController@add_category');
    Route::get('/category/update/{category}','AdminController@update_category');
    Route::get('/category/delete/{id}','AdminController@del_category');
    Route::get('/location','AdminController@location');
    Route::get('/add_location','AdminController@add_location');
    Route::get('/location/delete/{id}','AdminController@del_location');
    Route::get('/location/update/{position}','AdminController@update_location');
});




