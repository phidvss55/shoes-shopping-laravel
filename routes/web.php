<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Frontend\Auth\LoginController;
use App\Http\Controllers\Frontend\Auth\RegisterController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\CategoryController;
use App\Http\Controllers\Frontend\MenuController;
use App\Http\Controllers\Frontend\ProductDetailController;
use App\Http\Controllers\Frontend\ArticleDetailController;
use App\Http\Controllers\Frontend\ArticleController;
use App\Http\Controllers\Frontend\TagController;
use App\Http\Controllers\Frontend\KeywordController;
use App\Http\Controllers\Frontend\ShoppingCartController;
use App\Http\Controllers\Frontend\Ajax\AjaxViewProductController;
use App\Http\Controllers\Frontend\Ajax\AjaxShoppingCartController;

Route::group(['namespace' => 'Frontend'], function () {
    // Auth
    Route::group(['namespace' => 'Auth'], function () {
        // Login
        Route::get('login', [LoginController::class, 'getLogin'])->name('get.login');
        Route::post('login', [LoginController::class, 'postLogin']);
        // Register
        Route::get('register', [RegisterController::class, 'getRegister'])->name('get.register');
        Route::post('register', [RegisterController::class, 'postRegister']);
        // Logout
        Route::get('logout', [LoginController::class, 'getLogout'])->name('get.logout');
    });

    // Home - dashboard
    Route::get('/', [HomeController::class, 'index'])->name('get.home');

    // Category
    Route::get('/danh-muc/{slug}', [CategoryController::class, 'index'])->name('get.category');

    // Keyword
    Route::get('/keyword/{slug}', [KeywordController::class, 'index'])->name('get.keyword');

    // Product detail
    Route::get('/san-pham/{slug}', [ProductDetailController::class, 'index'])->name('get.product_detail');
    Route::post('/san-pham/comment/{slug}', [ProductDetailController::class, 'comment'])->name('get.product_detail.comment');

    // Menu
    Route::get('/menu/{slug}', [MenuController::class, 'index'])->name('get.menu');

    // Tag
    Route::get('/tag/{slug}', [TagController::class, 'index'])->name('get.tag');

    // Article
    Route::get('/bai-viet', [ArticleController::class, 'index'])->name('get.blog');

    // Article_detail
    Route::get('/bai-viet/{slug}', [ArticleDetailController::class, 'index'])->name('get.article_detail');
    Route::get('cart', [ShoppingCartController::class, 'index'])->name('get.shopping');
    Route::get('/checkout', [ShoppingCartController::class, 'checkout'])->name('get.shopping.checkout');
    Route::post('/checkout', [ShoppingCartController::class, 'payment']);

    Route::group(['namespace' => 'Ajax'], function() {
        Route::post('/view-product/{id}', [AjaxViewProductController::class, 'getPreviewProudct'])->name('get_ajax.product_preview');
        Route::post('add/cart/{id}', [AjaxShoppingCartController::class, 'add'])->name('get_ajax.shopping.add');
        Route::post('delete/cart/{id}', [AjaxShoppingCartController::class, 'delete'])->name('get_ajax.shopping.delete');
        Route::post('update/cart/{id}', [AjaxShoppingCartController::class, 'update'])->name('get_ajax.shopping.update');
    });
});

include('route_admin.php');
include('route_user.php');

