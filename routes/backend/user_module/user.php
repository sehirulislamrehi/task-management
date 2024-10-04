<?php

use App\Http\Controllers\Backend\UserModule\User\UserController;
use App\Http\Controllers\Backend\UserModule\User\UserServiceCenterController;
use App\Http\Controllers\Backend\UserModule\User\UserThanaController;
use Illuminate\Support\Facades\Route;

Route::prefix('user')->name('user.')->group(function () {
   Route::get('/', [UserController::class, 'index'])->name('index');
   Route::get('data', [UserController::class, 'data'])->name('data');
   Route::get('edit/{id}', [UserController::class, 'edit'])->name('edit');
   Route::get('create/modal', [UserController::class, 'create_modal'])->name('modal.create');
   Route::post('create', [UserController::class, 'create'])->name('create');
   Route::put('update/{id}', [UserController::class, 'update'])->name('update');
   Route::get("/password-reset/modal/{user_id}", [UserController::class, 'passwordResetModal'])->name('password.reset.modal');
   Route::post("/reset-password", [UserController::class, 'resetPassword'])->name('reset.password');

   Route::prefix('api/api-internal')->group(function () {
      Route::post('get-service-center-by-bu', [UserController::class, 'getServiceCenterByBu'])->name("get-service-center-by-bu");
      Route::get('search/{service_center?}/{bu?}', [UserController::class, 'index'])->name("get-service-center");
      Route::get('get-agent-type',[UserController::class, 'getAgentType'])->name("get-agent-type");
   });

   // user service center
   Route::prefix('service-center')->group(function () {
      Route::get('{id}', [UserServiceCenterController::class, 'getUserServiceCenter'])->name("get.service.center.page");
      Route::get('data/{id}', [UserServiceCenterController::class, 'getUserServiceCenterData'])->name("get.service.center.data");
      Route::get('add-modal/{id}', [UserServiceCenterController::class, 'addUserServiceCenterModal'])->name("service.center.add.modal");
      Route::post('add/{id}', [UserServiceCenterController::class, 'addUserServiceCenter'])->name("service.center.add");
      Route::get('get-service-center-by-bu/{id}', [UserServiceCenterController::class, 'getServiceCenterByBu'])->name("service.center.by.bu");

      Route::get('delete-modal/{service_center_id}/{user_id}', [UserServiceCenterController::class, 'deleteUserServiceCenterModal'])->name("service.center.delete.modal");
      Route::post('delete/{service_center_id}/{user_id}', [UserServiceCenterController::class, 'deleteUserServiceCenter'])->name("service.center.delete");
   });

   //user thana
   Route::prefix('thana')->group(function () {
      Route::get('{id}', [UserThanaController::class, 'getUserThana'])->name("get.user.thana.page");
      Route::get('data/{id}', [UserThanaController::class, 'getUserThanaData'])->name("get.user.thana.data");

      Route::get('add-modal/{id}', [UserThanaController::class, 'addUserThanaModal'])->name("thana.add.modal");
      Route::post('add/{id}', [UserThanaController::class, 'addUserThana'])->name("thana.add");

      Route::get('delete-modal/{thana_id}/{user_id}', [UserThanaController::class, 'deleteUserThanaModal'])->name("thana.delete.modal");
      Route::post('delete/{thana_id}/{user_id}', [UserThanaController::class, 'deleteUserThana'])->name("thana.delete");

   });

});
