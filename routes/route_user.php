<?php

use App\Http\Controllers\User\UserController;

Route::group([
    'namespace' => 'User',
    'prefix' => 'user',
    'middleware' => 'checkLoginUser'
], function() {
    // Trang chu
    Route::get('/', [UserController::class, 'index'])->name('get_user.home');

    // Category
    Route::prefix('category')->group(function () {
//        Route::get('', [BackendCategoryController::class, 'index'])->name('get_backend.category.index');

    });
});
