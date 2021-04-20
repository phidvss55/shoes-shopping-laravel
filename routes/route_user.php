<?php

use App\Http\Controllers\User\UserController;
use App\Http\Controllers\User\UserProfileController;
use App\Http\Controllers\User\UserTransactionController;
use App\Http\Controllers\User\UserOrderController;
use App\Http\Controllers\User\UserVoteController;

Route::group([
    'namespace' => 'User',
    'prefix' => 'user',
    'middleware' => 'checkLoginUser'
], function() {
    // Trang chu
    Route::get('/', [UserController::class, 'index'])->name('get_user.home');

    Route::get('porfile/{id}', [UserProfileController::class, 'index'])->name('get_user.profile');
    Route::post('porfile/{id}', [UserProfileController::class, 'update']);

    Route::prefix('transaction')->group(function() {
        Route::get('', [UserTransactionController::class, 'index'])->name('get_user.transaction.index');
        Route::get('view/{id}', [UserTransactionController::class, 'view'])->name('get_user.transaction.view');

        Route::post('action/{id}', [UserTransactionController::class, 'action'])->name('get_user.transaction.action');

        Route::get('/delete/{id}', [UserTransactionController::class, 'delete'])->name('get_user.transaction.delete');
    });;

    Route::prefix('order')->group(function() {
        Route::get('/delete/{id}', [UserOrderController::class, 'delete'])->name('get_user.order.delete');
    });;

    Route::prefix('vote')->group(function() {
        Route::get('', [UserVoteController::class, 'index'])->name('get_user.vote.index');

        Route::get('create/{productId}', [UserVoteController::class, 'create'])->name('get_user.vote.create');
        Route::post('create/{productId}', [UserVoteController::class, 'store']);
    });;

});
