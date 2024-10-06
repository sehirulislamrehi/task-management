<?php

use App\Http\Controllers\Backend\TaskModule\Tasks\TaskController;
use Illuminate\Support\Facades\Route;

//user start 
Route::group(['prefix' => 'task-module'], function () {
    Route::get("", [TaskController::class, 'index'])->name('task.all');
    Route::get("data", [TaskController::class, 'data'])->name('task.data');
    Route::get("add-modal", [TaskController::class, 'add_modal'])->name('task.add.modal');
    Route::post("add", [TaskController::class, 'add'])->name('task.add');

    Route::get("edit-modal/{id}", [TaskController::class, 'edit_modal'])->name('task.edit.modal');
    Route::post("edit/{id}", [TaskController::class, 'edit'])->name('task.edit');

    Route::get("delete-modal/{id}", [TaskController::class, 'delete_modal'])->name('task.delete.modal');
    Route::post("delete/{id}", [TaskController::class, 'delete'])->name('task.delete');

    Route::get("details/{id}", [TaskController::class, 'details'])->name('task.details');

    Route::get("get-user-by-email/{email?}", [TaskController::class, 'get_user_by_email'])->name('task.get.user.by.email');
});
//user end
