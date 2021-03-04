@<?php

use App\Http\Controllers\Backend\BackendHomeController;
use App\Http\Controllers\Backend\BackendProductController;
use App\Http\Controllers\Backend\BackendCategoryController;
use App\Http\Controllers\Backend\BackendKeywordController;
use App\Http\Controllers\Backend\BackendArticleController;
use App\Http\Controllers\Backend\BackendMenuController;
use App\Http\Controllers\Backend\BackendUserController;
use App\Http\Controllers\Backend\BackendSettingController;
use App\Http\Controllers\Backend\BackendTagController;
use App\Http\Controllers\Backend\BackendProfileController;


Route::group(['namespace' => 'Backend', 'prefix' => 'admin'], function() {
    // Trang chu
    Route::get('/', [BackendHomeController::class, 'index'])->name('get_backend.home');

    // Category
    Route::prefix('category')->group(function() {
        Route::get('', [BackendCategoryController::class, 'index'])->name('get_backend.category.index');

        Route::get('/create', [BackendCategoryController::class, 'create'])->name('get_backend.category.create');
        Route::post('/create', [BackendCategoryController::class, 'store']);

        Route::get('/update/{id}', [BackendCategoryController::class, 'edit'])->name('get_backend.category.update');
        Route::post('/update/{id}', [BackendCategoryController::class, 'update']);

        Route::get('/delete/{id}', [BackendCategoryController::class, 'edit'])->name('get_backend.category.delete');
    });

    // Product
    Route::prefix('product')->group(function() {
        Route::get('', [BackendProductController::class, 'index'])->name('get_backend.product.index');

        Route::get('/create', [BackendProductController::class, 'create'])->name('get_backend.product.create');
        Route::post('/create', [BackendProductController::class, 'store']);

        Route::get('/update/{id}', [BackendProductController::class, 'edit'])->name('get_backend.product.update');
        Route::post('/update/{id}', [BackendProductController::class, 'update']);

        Route::get('/delete/{id}', [BackendProductController::class, 'edit'])->name('get_backend.product.delete');
    });

    // Article
    Route::prefix('article')->group(function() {
        Route::get('', [BackendArticleController::class, 'index'])->name('get_backend.article.index');

        Route::get('/create', [BackendArticleController::class, 'create'])->name('get_backend.article.create');
        Route::post('/create', [BackendArticleController::class, 'store']);

        Route::get('/update/{id}', [BackendArticleController::class, 'edit'])->name('get_backend.article.update');
        Route::post('/update/{id}', [BackendArticleController::class, 'update']);

        Route::get('/delete/{id}', [BackendArticleController::class, 'edit'])->name('get_backend.article.delete');
    });

    // Keyword
    Route::prefix('keyword')->group(function() {
        Route::get('', [BackendKeywordController::class, 'index'])->name('get_backend.keyword.index');

        Route::get('/create', [BackendKeywordController::class, 'create'])->name('get_backend.keyword.create');
        Route::post('/create', [BackendKeywordController::class, 'store']);

        Route::get('/update/{id}', [BackendKeywordController::class, 'edit'])->name('get_backend.keyword.update');
        Route::post('/update/{id}', [BackendKeywordController::class, 'update']);

        Route::get('/delete/{id}', [BackendKeywordController::class, 'edit'])->name('get_backend.keyword.delete');
    });

    // Menu
    Route::prefix('menu')->group(function() {
        Route::get('', [BackendMenuController::class, 'index'])->name('get_backend.menu.index');

        Route::get('/create', [BackendMenuController::class, 'create'])->name('get_backend.menu.create');
        Route::post('/create', [BackendMenuController::class, 'store']);

        Route::get('/update/{id}', [BackendMenuController::class, 'edit'])->name('get_backend.menu.update');
        Route::post('/update/{id}', [BackendMenuController::class, 'update']);

        Route::get('/delete/{id}', [BackendMenuController::class, 'edit'])->name('get_backend.menu.delete');
    });

    // Tag
    Route::prefix('tag')->group(function() {
        Route::get('', [BackendTagController::class, 'index'])->name('get_backend.tag.index');

        Route::get('/create', [BackendTagController::class, 'create'])->name('get_backend.tag.create');
        Route::post('/create', [BackendTagController::class, 'store']);

        Route::get('/update/{id}', [BackendTagController::class, 'edit'])->name('get_backend.tag.update');
        Route::post('/update/{id}', [BackendTagController::class, 'update']);

        Route::get('/delete/{id}', [BackendTagController::class, 'edit'])->name('get_backend.tag.delete');
    });;

    // User
    Route::prefix('user')->group(function() {
        Route::get('', [BackendUserController::class, 'index'])->name('get_backend.user.index');

        Route::get('/create', [BackendUserController::class, 'create'])->name('get_backend.user.create');
        Route::post('/create', [BackendUserController::class, 'store']);

        Route::get('/update/{id}', [BackendUserController::class, 'edit'])->name('get_backend.user.update');
        Route::post('/update/{id}', [BackendUserController::class, 'update']);

        Route::get('/delete/{id}', [BackendUserController::class, 'edit'])->name('get_backend.user.delete');
    });

    // Setting
    Route::get('setting', [BackendSettingController::class, 'index'])->name('get_backend.setting');
    Route::post('setting', [BackendSettingController::class, 'createOrUpdate'])->name('get_backend.setting.store');

    // Profile
    Route::get('profile', [BackendProfileController::class, 'index'])->name('get_backend.profile');
    Route::post('profile', [BackendProfileController::class, 'createOrUpdate'])->name('get_backend.profile.store');
});
