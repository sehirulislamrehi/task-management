<?php

use App\Http\Controllers\Backend\TaskModule\Tasks\TaskController;
use Illuminate\Support\Facades\Route;

//user start 
Route::group(['prefix' => 'task-module'], function () {
    Route::get("", [TaskController::class, 'index'])->name('task.all');
    Route::get("data", [TaskController::class, 'data'])->name('task.data');
    Route::get("add-modal", [TaskController::class, 'add_modal'])->name('task.add.modal');
    Route::post("add", [TaskController::class, 'add'])->name('task.add');
    Route::get("get-user-by-email/{email?}", [TaskController::class, 'get_user_by_email'])->name('task.get.user.by.email');
});
//user end
