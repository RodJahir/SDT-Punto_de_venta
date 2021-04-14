<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\PermissionRoleController;
use App\Http\Controllers\Admin\UserController;

Route::middleware(['auth:sanctum', 'verified'])->get('/admin/home', function () {
    return view('admin/home');
})->name('admin/home');

Route::get('/admin/home', [HomeController::class, 'index'])->name('admin.home.index');

Route::get('/admin/permissionrole',[PermissionRoleController::class, 'index'])->name('admin.permissionrole.index');

Route::get('/admin/user', [UserController::class, 'index'])->name('admin.user.index');
Route::get('/admin/user/create', [UserController::class, 'create'])->name('admin.user.create');
Route::post('/admin/user/store', [UserController::class, 'store'])->name('admin.user.store');
Route::get('/admin/user/edit/{id}', [UserController::class, 'edit'])->name('admin.user.edit');
Route::post('/admin/user/update/{id}', [UserController::class, 'update'])->name('admin.user.update');
Route::delete('/admin/user/delete/{id}', [UserController::class, 'delete'])->name('admin.user.delete');
//Route::resource('/admin/user', UsersController::class);


//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
