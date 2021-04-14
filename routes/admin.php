<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\SellerController;

Route::middleware(['auth:sanctum', 'verified'])->get('/admin/home', function () {
    return view('admin/home');
})->name('admin/home');

Route::get('/admin/home', [HomeController::class, 'index'])->name('admin.home.index');

Route::get('/admin/permissionrole',[PermissionRoleController::class, 'index'])->name('admin.permissionrole.index');

Route::get('/admin/user', [UserController::class, 'index'])->name('admin.user.index');
Route::get('/admin/user/create', [UserController::class, 'create'])->name('admin.user.create');
Route::get('/admin/user/store', [UserController::class, 'store'])->name('admin.user.store');
Route::get('/admin/user/edit/{id}', [UserController::class, 'edit'])->name('admin.user.edit');
Route::put('/admin/user/update/{id}', [UserController::class, 'update'])->name('admin.user.update');
Route::delete('/admin/user/delete/{id}', [UserController::class, 'delete'])->name('admin.user.delete');

Route::get('/admin/roles', [RoleController::class, 'index'])->name('admin.roles.index');
Route::get('/admin/roles/create', [RoleController::class, 'create'])->name('admin.roles.create');
Route::get('/admin/roles/store', [RoleController::class, 'store'])->name('admin.roles.store');
Route::get('/admin/roles/edit/{role}', [RoleController::class, 'edit'])->name('admin.roles.edit');
Route::put('/admin/roles/update/{role}', [RoleController::class, 'update'])->name('admin.roles.update');
Route::delete('/admin/roles/delete/{id}', [RoleController::class, 'delete'])->name('admin.roles.delete');

Route::get('/admin/seller', [SellerController::class, 'index'])->name('admin.seller.index');
//Route::resource('/admin/user', UsersController::class);


//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
