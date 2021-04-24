<?php
//frontend
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\User\IndexController;
use App\Http\Controllers\Frontend\User\ShopdetailsController;
use App\Http\Controllers\Frontend\User\CartController;
use App\Http\Controllers\Frontend\User\CarthelperController;

// use Frontend\User\BlogsController;
use App\Http\Controllers\Frontend\User\CheckoutController;
use App\Http\Controllers\Frontend\User\ContactController;
use App\Http\Controllers\Frontend\User\ShopgridController;
use App\Http\Controllers\Frontend\User\ShopcartController;
use App\Http\Controllers\Frontend\User\BlogdetailsController;
//backend
use App\Http\Controllers\Backend\AccountController;
use App\Http\Controllers\Backend\BannerController;
use App\Http\Controllers\Backend\OrderController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\UserAuth;
// use App\Http\Controllers\Backend\BlogController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\ColorController;
use App\Http\Controllers\Backend\SizeController;


//Front
Route::get('/', [IndexController::class, 'index'])->name('index');
Route::get('/shopgrid', [ShopgridController::class, 'index'])->name('shopgrid');
Route::get('/blog', [BlogController::class, 'index'])->name('blog');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::get('/shopcart', [CartController::class, 'index'])->name('shopcart');
Route::get('/shopdetails', [ShopdetailsController::class, 'index'])->name('shopdetails');
Route::get('/blogdetails', [BlogdetailsController::class, 'index'])->name('blogdetails');
Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');

Route::get('/addcart/{id}', [CartController::class, 'add'])->name('cart'); 
//Back

/**
 * GET => product.index => danh sách
 * GET => product.create => form thêm mới
 * POST => product.store => submit form thêm mới
 * GET => product.show => xem chi tiết
 * GET => product.edit => form edit
 * PUT => product.update => submit form edit
 * DELETE => product.destroy => xóa
 */



Route::group(['prefix'=>'admin','middleware'=>'auth'], function(){
    Route::get('admin','AdminController@dasboard')->name('backend.dasboard');

    Route::Resources([
        'product' => 'ProductController',
        'category' => 'CategoryController',
        'account' => 'AccountController',
        'order' => 'OrderController',
        'blog' => 'BlogController',
        'size' => 'SizeController',
        'color' => 'ColorController',
        'banner' => 'BannerController'
    ]);
    Route::get('/modal','ProductController@modal')->name('modal');
});

Route::get('/login','AdminController@login')->name('login');
Route::post('/login','LoginController@authenticate')->name('login');
Route::get('/logout','LoginController@logout')->name('logout');

Route::get('/register','AdminController@register')->name('register');
Route::post('/register','AdminController@reg')->name('register');
route::get('Order','OrderController@order')->name('order');

