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
// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/','HomeController@index')->name('trangchu');


//Danh mục
// Route::get('/danhmuctfood/{id}','CategoryFood@show_category_list');

//BackEnd
// Route::get('/admin_login','AdminController@index')->name('index');

// Route::get('/admin_layout','AdminController@show_admin');
// Route::get('/homes','AdminController@show_admin');


Route::get('/homes','CategoryFood@getFood');
Route::get('/homes1','CategoryFood@getContentFood');
Route::get('/homes2','CategoryFood@getFoodct')->name('dsfood');

Route::post('/addfood','CategoryFood@create_f')->name('createf');
// Route::get('/logout','AdminController@logout');
// Route::post('/admin-homes','AdminController@Show_Home');

// Category_ food
// Route::get('/add-category-food','CategoryFood@add_category_food');
// Route::get('/all-category-food','CategoryFood@getCategoryt');


// // Route::post('/save-category','CategoryFood@sevecategory');
// Route::post('/addmimage','CategoryFood@store')->name('addmimage');
// // Route::get('/categorypage','CategoryFood@display');
Route::get('/edit_food/{id}','CategoryFood@editfood')->name('edit');
Route::put('/update_food/{id}','CategoryFood@updatefood')->name('update');
Route::get('/deleteimage/{id}','CategoryFood@deletefood')->name('delete');


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

//Sản phẩm bán chạy

// Đặt bàn
Route::post('/a','HomeController@Booktable')->name('dat_book');

//Bàn ăn uống
Route::get('/list_room','TableController@getRoom')->name('show_table');


Route::post('/table','HomeController@gettable_book')->name('gettb');