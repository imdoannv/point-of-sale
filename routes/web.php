<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CategoryController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('layouts.home');
})->middleware(['auth', 'verified'])->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    // Quản lý tài khoản
    Route::resource('users', UserController::class);
    Route::get('users-deleted', [UserController::class, 'deleted'])->name('users-deleted'); // Thùng rác
    Route::delete('users-permanently/{id}', [UserController::class, 'permanentlyDelete'])->name('users-permanently-delete'); //Xóa vĩnh viên
    Route::get('users-restore/{id}', [UserController::class, 'restore'])->name('users-restore');

    // Quản lý nhân viên
    Route::resource('employees', EmployeeController::class);
    Route::get('employees-deleted', [EmployeeController::class, 'deleted'])->name('employees-deleted');
    Route::delete('employees-permanently/{id}', [EmployeeController::class, 'permanentlyDelete'])->name('employees-permanently-delete');
    Route::get('employees-restore/{id}', [EmployeeController::class, 'restore'])->name('employees-restore');

    // Quản lý khách hàng
    Route::resource('customers', CustomerController::class);
    Route::get('customers-deleted', [CustomerController::class, 'deleted'])->name('customers-deleted');
    Route::delete('customers-permanently/{id}', [CustomerController::class, 'permanentlyDelete'])->name('customers-permanently-delete');
    Route::get('customers-restore/{id}', [CustomerController::class, 'restore'])->name('customers-restore');

    // Quản lý danh mục
    Route::resource('categories', CategoryController::class);
    Route::get('categories-deleted', [CategoryController::class, 'deleted'])->name('categories-deleted');
    Route::delete('categories-permanently/{id}', [CategoryController::class, 'permanentlyDelete'])->name('categories-permanently-delete');
    Route::get('categories-restore/{id}', [CategoryController::class, 'restore'])->name('categories-restore');
});

require __DIR__.'/auth.php';
