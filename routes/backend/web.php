<?php

use App\Http\Controllers\Auth\AuthenticationController;
use App\Http\Controllers\Backend\DashboardModule\DashboardController;
use App\Http\Controllers\Backend\UtilityController;
use Illuminate\Support\Facades\Route;


Route::get('/', [AuthenticationController::class, 'show_login'])->name('admin.show-login');
Route::post('/do-login', [AuthenticationController::class, 'do_login'])->name('admin.do-login');
Route::get('/dev-mode', [AuthenticationController::class, 'show_dev_mode_login'])->name('admin.show-dev-mode');

Route::middleware('auth')->group(function () {

    Route::prefix('admin')->name('admin.')->group(function () {

        //Dashboard
        Route::get("dashboard", [DashboardController::class, 'index'])->name("dashboard.index");

        //User module
        Route::prefix("user-module")->name('user-module.')->group(function () {
            //user
            require_once 'user_module/user.php';
            //Role
            require_once 'user_module/role.php';
        });
    });

});



