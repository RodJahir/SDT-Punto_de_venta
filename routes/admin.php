<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;

Route::middleware(['auth:sanctum', 'verified'])->get('/admin/user', function () {
    return view('admin/user');
})->name('admin/user');

Route::get('/admin/user', [HomeController::class, 'index'])->name('admin.user.index');
Route::get('/admin/user/create', [HomeController::class, 'create'])->name('admin.user.create');
Route::post('/admin/user/store', [HomeController::class, 'store'])->name('admin.user.store');
Route::get('/admin/user/edit/{id}', [HomeController::class, 'edit'])->name('admin.user.edit');
Route::post('/admin/user/update/{id}', [HomeController::class, 'update'])->name('admin.user.update');
Route::delete('/admin/user/delete/{id}', [HomeController::class, 'delete'])->name('admin.user.delete');
//Route::resource('/admin/user', UsersController::class);


//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
