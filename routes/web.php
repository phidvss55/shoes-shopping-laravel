<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\CategoryController;
use App\Http\Controllers\Frontend\MenuController;
use App\Http\Controllers\Frontend\ProductDetailController;
use App\Http\Controllers\Frontend\ArticleDetailController;
use App\Http\Controllers\Frontend\ArticleController;
use App\Http\Controllers\Frontend\TagController;

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

Auth::routes();

Route::group(['namespace' => 'Frontend'], function() {
    // Home - dashboard
    Route::get('/', [HomeController::class, 'index'])->name('get.home');

    // Category
    Route::get('/danh-muc/{slug}', [CategoryController::class, 'index'])->name('get.category');

    // Product detail
    Route::get('/san-pham/{slug}', [ProductDetailController::class, 'index'])->name('get.product_detail');

    // Menu
    Route::get('/menu/{slug}', [MenuController::class, 'index'])->name('get.menu');

    // Tag
    Route::get('/tag/{slug}', [TagController::class, 'index'])->name('get.tag');

    // Article
    Route::get('/bai-viet', [ArticleController::class, 'index'])->name('get.blog');

    // Article_detail
    Route::get('/bai-viet/{slug}', [ArticleDetailController::class, 'index'])->name('get.article_detail');
});

include('route_admin.php');

