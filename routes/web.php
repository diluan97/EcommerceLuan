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

// Route::get('/', function () {
//     return view('welcome');
// });
Auth::routes();



/*                                         GUEST                                 */
Route::resource('/', 'Guest\HomeController')->names('home');
Route::get('tim-kiem', 'Guest\HomeController@search')->name('search');
Route::get('ajax_search/name', 'Guest\HomeController@searchAjax')->name('search_ajax');
Route::get('/danh-muc','Guest\CategoryController@index')->name('category');
Route::get('/danh-muc/{slug}', 'Guest\CategoryController@getProductByCate')->name('category_slug');
Route::get('/tat-ca-san-pham', 'Guest\HomeController@getListProduct')->name('list_product');
Route::get('/san-pham/{slug}', 'Guest\HomeController@getDetailsProduct')->name('product');
Route::get('gio-hang','Guest\CartController@getListCart')->name('gio_hang');
Route::post('gio-hang', 'Guest\CartController@postSingleCart')->name('them_vao_gio_hang');
Route::get('delete', 'Guest\CartController@getDeleteCart')->name('xoa_gio_hang');
Route::delete('del-product-cart/{id}', 'Guest\CartController@getDeleteSingleProduct')->name('xoa_san_pham');
Route::post('save-product-cart/{id}', 'Guest\CartController@saveSingleProduct')->name('luu_san_pham');
Route::delete('del-product-save/{id}', 'Guest\CartController@getDeleteSingleProductSave')->name('xoa_luu_san_pham');
Route::post('get-product-save-in-cart/{id}', 'Guest\CartController@getProductSaveInCart')->name('lay_san_pham_luu_vao_cart');
Route::get('check-out','Guest\CheckOutController@getCheckOut')->name('check_out');
Route::post('check-out', 'Guest\CheckOutController@postCheckOut')->name('thanh_toan');
Route::post('up-date', 'Guest\CartController@postUpDate')->name('so_luong');
Route::get('contacts','Guest\ContactController@getContact')->name('lien-he');
Route::post('contacts','Guest\ContactController@postContact')->name('send-lien-he');
Route::get('thanks', 'Guest\HomeController@thankYou')->name('thank-you');

Route::post('add-to-cart-ajax', 'Guest\HomeController@addToCartAjax')->name('cartAjax');


/*                                      LOGIN AMIN                                 */
Route::get('admin','Admin\LoginController@getLogin')->name('login');
Route::post('admin', 'Admin\LoginController@postLogin')->name('post_login');
Route::get('logout', 'Admin\LoginController@getLogout')->name('logout');
/*                                      ADMIN                                        */
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'Admin']], function () {
    Route::resource('users', 'Admin\UserController')->names('admin_users');
    Route::resource('products', 'Admin\AdminController')->names('admin_products');
    Route::resource('categories', 'Admin\CategoryController')->names('admin_category');
    Route::resource('products/{product_slug}/variant', 'Admin\ProductVariantController')->names('admin_product_variant');
    Route::resource('slides', 'Admin\SlideController')->names('admin_slide');
    Route::resource('orders','Admin\OrderController')->names('admin_order');
    Route::post('update-order/{id}', 'Admin\OrderController@postUpdateOrder')->name('update_order');
    Route::get('/laravel-filemanager', '\UniSharp\LaravelFilemanager\Controllers\LfmController@show');
    Route::post('/laravel-filemanager/upload', '\UniSharp\LaravelFilemanager\Controllers\UploadController@upload');
    Route::get('search-admin-product', 'Admin\AdminSearchController@getProduct')->name('search_products');
    Route::get('search-admin-category', 'Admin\AdminSearchController@getCategory')->name('search_categories');
    Route::get('search-admin-slide', 'Admin\AdminSearchController@getSlide')->name('search_slides');
    Route::get('search-admin-order', 'Admin\AdminSearchController@getOrder')->name('search_orders');
});
