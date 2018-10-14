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
Route::get('/categories','CategoryController@categories');
Route::get('/categories/{id}','CategoryController@show_categories');
Route::get('/aboutus','ContactController@about_us');

Route::group(['middleware' => AdminAuth::class],function (){
    Route::get('/admin-panel','AdminController@index');
    Route::get('/admin-panel/users','AdminController@users');
    Route::get('/admin-panel/users/delete','AdminController@delete_users');
    Route::get('/admin-panel/items','AdminController@items');
    Route::get('/admin-panel/items/accept/{id}','AdminController@accept_items');
    Route::get('/admin-panel/items/delete','AdminController@delete_items');
    Route::get('/admin-panel/category','AdminController@categories');
    Route::get('/admin-panel/add_category','AdminController@add_category');
    Route::get('/admin-panel/category/delete/{id}','AdminController@del_category');
    Route::get('/admin-panel/location','AdminController@location');
    Route::get('/admin-panel/add_location','AdminController@add_location');
    Route::get('/admin-panel/location/delete/{id}','AdminController@del_location');
});


