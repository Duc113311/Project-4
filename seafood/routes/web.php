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
// Route::get('/tk','CategoryFood@tk');
Route::get('/','HomeController@index')->name('trangchu');
//Thoosng ke
Route::get('/thongke','CategoryFood@thong_ke')->name('thongk');

Route::get('/homes','CategoryFood@getFood');
Route::get('/homes1','CategoryFood@getContentFood');
Route::get('/homes2','CategoryFood@getFoodct')->name('dsfood');


//Loại sản phẩm
Route::get('/view_add_type_f','CategoryFood@view_create_tf')->name('view_create');
Route::post('/addtype_food','CategoryFood@create_type_f')->name('create_tf');
//Sản phẩm
Route::post('/addfood','CategoryFood@create_f')->name('createf');
Route::get('/edit_food/{id}','CategoryFood@editfood')->name('edit');
Route::put('/update_food/{id}','CategoryFood@updatefood')->name('update');
Route::get('/deleteimage/{id}','CategoryFood@deletefood')->name('delete');
//Loại nguyên liệu
Route::get('/view_res_type','ResourcesController@view_res_type')->name('view_create_t');
Route::post('/addres_t','ResourcesController@create_type_res')->name('creat_t');
//Nguyên Liệu
Route::get('/resources','ResourcesController@getRes')->name('get_res');
Route::post('/addres','ResourcesController@creat_res')->name('creat_reso');
Route::get('/edit_res/{id}','ResourcesController@eidt_res')->name('edit_res');
Route::put('/update_res/{id}','ResourcesController@updateres')->name('update');
Route::get('/delete_res/{id}','ResourcesController@deleteres')->name('delete');
//Tin Tưc
Route::get('/View_list_news','NewFoodController@getlistnew')->name('list_news');

Route::post('/add_news','NewFoodController@create_news')->name('create_n');
Route::get('/edit_news/{id}','NewFoodController@edit_news')->name('edit_n');
Route::put('/update_news/{id}','NewFoodController@update_news')->name('update_n');
Route::get('/delete_news/{id}','NewFoodController@delete_news')->name('delete');
//Đơn hàng.
Route::get('/chuaxacnhan','CartController@getDonHang')->name('getxacnhan');
Route::get('/huydonhang/{id}','CartController@getconfim');

Route::get('/huydonhang','CartController@gethuydon')->name('get_huy');
Route::get('/view_ct_donhang','CartController@viewctdonhang')->name('view_order');

Route::get('/xacnhandon/{id}','CartController@get_xacnhan');
Route::get('/xacnhandon','CartController@view_xacnhan')->name('get_xacnhandon');

Route::get('/chebienxong/{id}','CartController@get_chebien');
Route::get('/chebienxong','CartController@view_chebien')->name('get_chebienxong');

Route::get('/chebienxong/{id}','CartController@get_chebien');
Route::get('/chebienxong','CartController@view_chebien')->name('get_chebienxong');
//View Chi tiết đơn hàng online
Route::get('/view_ct_don_onl/{id}','CartController@view_ctdonhang')->name('view_ct_dh_on');

// Đặt Bàn
Route::post('/view_thucdon_dat/{id}','TableController@postOrderFood');
Route::get('/view_ban_chua_xh','TableController@get_table_xh')->name('view_table_dat');
Route::get('/view_ban_xh','TableController@view_table_xh')->name('view_tb_xn');
Route::get('/xacnhanban/{id}','TableController@table_xacnhan');
//Người dùng
Route::get('/chitietmuc/{id}','HomeController@Showcategory_food');
Route::get('/chitietmuc/{id}','HomeController@Showcategory_food');
Route::get('/chitietfood/{id}','HomeController@Details_food');
//Comment sản phẩm
Route::post('/chitietfood/{id}','HomeController@postComment');
//Tìm kiếm 
Route::get('/search','HomeController@getSearch');
// Giỏ hàng

Route::get('/Add-Cart/{id}','CartController@AddCartFood');
Route::get('/DeleteCart/{id}','CartController@Delete_food_cart');
Route::get('/list_cart_food','CartController@View_shopcart');
Route::get('/delete_list_cart/{id}','CartController@Delete_cart');
Route::get('/save-cart-item/{id}/{quanty}','CartController@Save_cart_food');

//Đăng nhập khach hàng
Route::get('/login_use','UserController@getSignup');
Route::post('/login_customer','UserController@login_customer')->name('login_customer');
Route::post('/login_use','UserController@login')->name('login');

//Login_admin
Route::group(['prefix'=>'login_a'],function(){
    Route::get('/Login_admin','UserController@getLoginAdmin');
    Route::post('/Login_admin','UserController@postLogin')->name('name_login');
});
Route::group(['prefix'=>'logout_a'],function(){
Route::get('/Logout_admin','UserController@getLogout');
});
//Gửi Mail

//logout
Route::get('/logout','UserController@logout')->name('logout');
//Đăng ký tài khoản
Route::post('/_register','UserController@register_dk')->name('dangky');
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
Route::post('/datban','HomeController@Booktable')->name('dat_book');

//Bàn ăn uống
Route::get('/list_room','TableController@getRoom')->name('show_table');

Route::post('/table','HomeController@gettable_book')->name('gettb');

//Tin tức đồ ăn

Route::get('/list_news','NewFoodController@getallnew')->name('show_new');

