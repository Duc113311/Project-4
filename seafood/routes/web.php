<?php

use Illuminate\Support\Facades\Route;

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
//Font-end
Route::get('/', function () {
    return view('welcome');
});
Route::get('/','HomeController@index')->name('trangchu');
//Danh mục
// Route::get('/danhmuctfood/{id}','CategoryFood@show_category_list');

//BackEnd
Route::get('/admin_login','AdminController@index')->name('index');

// Route::get('/admin_layout','AdminController@show_admin');
Route::get('/homes','AdminController@show_admin');

Route::get('/logout','AdminController@logout');
Route::post('/admin-homes','AdminController@Show_Home');

// Category_ food
Route::get('/add-category-food','CategoryFood@add_category_food');
Route::get('/all-category-food','CategoryFood@getCategoryt');


// Route::post('/save-category','CategoryFood@sevecategory');
Route::post('/addmimage','CategoryFood@store')->name('addmimage');
// Route::get('/categorypage','CategoryFood@display');
Route::get('/editimage/{id}','CategoryFood@editfood');
Route::put('/updateimage/{id}','CategoryFood@updatefood');
Route::get('/deleteimage/{id}','CategoryFood@deletefood');


//Người dùng
Route::get('/chitietmuc/{id}','HomeController@Showcategory_food');

Route::get('/chitietfood/{id}','HomeController@Details_food');
// Giỏ hàng

Route::get('/Add-Cart/{id}','CartController@AddCartFood');

Route::get('/DeleteCart/{id}','CartController@Delete_food_cart');

Route::get('/list_cart_food','CartController@View_shopcart');

Route::get('/delete_list_cart/{id}','CartController@Delete_cart');


Route::get('/save-cart-item/{id}/{quanty}','CartController@Save_cart_food');

//Đăng nhập khasch hàng
Route::get('/login_use','UserController@getSignup');
Route::post('/login_customer','UserController@login_customer')->name('login_customer');
Route::post('/login_use','UserController@login')->name('login');

//logout
Route::get('/logout','UserController@logout')->name('logout');

//Đăng ký tài khoản

Route::post('/register','UserController@register')->name('register');


// Thanh toán
Route::group(['prefix'=>'gio-hang','middleware'=>'web'],function()
{
Route::get('/thanh_toan','CartController@getformpay');
Route::post('/thanh_toan2','CartController@savecontact')->name('dathang');
Route::get('/trang_thai_don','CartController@getTrangthai')->name('trangthai');
Route::get('/trang_thai_don/{id}','CartController@distroy_order_cus');
});

