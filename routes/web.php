<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\NewProductController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CartOrderController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::group(['prefix' =>''],function(){
    Route::get('/', [HomeController::class, 'home'])->name('home');
    Route::get('/login', [HomeController::class, 'login'])->name('login');

    Route::get('/logout', [HomeController::class, 'logout'])->name('logout');
    Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
    Route::post('/contact', [HomeController::class, 'post_contact']);
    
    Route::get('/register', [HomeController::class, 'register'])->name('register');
    Route::get('/profile', [HomeController::class, 'profile'])->name('profile')->middleware('cus');
    Route::post('/login', [HomeController::class, 'check_login']);
    Route::post('/register', [HomeController::class, 'post_register']);
});


Route::group(['prefix' =>'cart'], function(){
    Route::get('/',[CartController::class,'view'])->name('cart.view');
    Route::get('/add/{product}/{quantity?}',[CartController::class,'add'])->name('cart.add');
    Route::get('/remove/{product}',[CartController::class, 'remove'])->name('cart.remove');
    Route::get('/update/{product}/{quantity?}',[CartController::class,'update'])->name('cart.update');
    Route::get('/clear',[CartController::class,'clear'])->name('cart.clear');


});

Route::group(['prefix' =>'order'], function(){
    Route::get('/checkout',[CartOrderController::class,'checkout'])->name('order.checkout');
    Route::post('/checkout',[CartOrderController::class,'post_checkout']);
    Route::get('/my-order',[CartOrderController::class, 'myOrder'])->name('order.myOrder');
    Route::get('/detail/{order}',[CartOrderController::class, 'detail'])->name('order.detail');
    Route::get('/verify/{token}',[CartOrderController::class, 'verify'])->name('order.verify');
});


Route::get('/admin/login', [DashboardController::class, 'login'])->name('admin.login');
Route::post('/admin/login', [DashboardController::class, 'check_login']);
Route::get('/admin/register', [DashboardController::class, 'register'])->name('admin.register');
Route::post('/admin/register', [DashboardController::class, 'post_register']);

Route::group(['prefix' => 'admin','middleware'=>'auth'], function () {
    Route::get('/', [HomeController::class,'admin'])->name('admin');
    Route::get('/logout', [DashboardController::class, 'logout'])->name('admin.logout');

    Route::group(['prefix' => 'category'], function () {

        Route::get('/category/index', [CategoryController::class, 'category_index'])->name('category.index');
        Route::get('/category/create', [CategoryController::class, 'category_create'])->name('category.create');
        Route::post('/category/create', [CategoryController::class, 'category_store'])->name('category.store');
        Route::get('/category/edit/{categories}', [categoryController::class, 'category_edit'])->name('category.edit');
        Route::put('/category/edit/{categories}', [CategoryController::class, 'category_update'])->name('category.update');
        Route::delete('/category/delete/{categories}', [CategoryController::class, 'category_delete'])->name('category.delete');
    });
    Route::group(['prefix' => 'product'], function () {
        Route::get('/product/index', [ProductController::class, 'product_index'])->name('product.index');
        Route::get('/product/create', [ProductController::class, 'product_create'])->name('product.create');
        Route::post('/product/create', [ProductController::class, 'product_store'])->name('product.store');
        Route::get('/product/edit/{product}', [ProductController::class, 'product_edit'])->name('product.edit');
        Route::put('/product/edit/{product}', [ProductController::class, 'product_update'])->name('product.update');
        Route::delete('/product/delete/{product}', [ProductController::class, 'product_delete'])->name('product.delete');
    });
    Route::group(['prefix' => 'newproduct'], function () {
        Route::get('/newproduct/index', [NewProductController::class, 'newproduct_index'])->name('newproduct.index');
        Route::get('/newproduct/create', [NewProductController::class, 'newproduct_create'])->name('newproduct.create');
        Route::post('/newproduct/create', [NewProductController::class, 'newproduct_store'])->name('newproduct.store');
        Route::get('/newproduct/edit/{newproduct}', [NewProductController::class, 'newproduct_edit'])->name('newproduct.edit');
        Route::put('/newproduct/edit/{newproduct}', [NewProductController::class, 'newproduct_update'])->name('newproduct.update');
        Route::delete('/newproduct/delete/{newproduct}', [NewProductController::class, 'newproduct_delete'])->name('newproduct.delete');
    });
});

Route::group(['prefix' => 'list'], function () {
    Route::get('/list/chuyen', [HomeController::class, 'list_chuyen'])->name('list.chuyen');
    Route::get('/list/codai', [HomeController::class, 'list_codai'])->name('list.codai');
    Route::get('/list/drama', [HomeController::class, 'list_drama'])->name('list.drama');
    Route::get('/list/kinhdi', [HomeController::class, 'list_kinhdi'])->name('list.kinhdi');
    Route::get('/list/ngon', [HomeController::class, 'list_ngon'])->name('list.ngon');
    Route::get('/list/tamly', [HomeController::class, 'list_tamly'])->name('list.tamly');
    Route::get('/list/xuyen', [HomeController::class, 'list_xuyen'])->name('list.xuyen');
});
