<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EmployeeController;

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
    Route::get('users-deleted', [UserController::class, 'deleted'])->name('users-deleted');
    Route::delete('users-permanently/{id}', [UserController::class, 'permanentlyDelete'])->name('users-permanently-delete');
    Route::get('users-restore/{id}', [UserController::class, 'restore'])->name('users-restore');

    // Quản lý nhân viên
    Route::resource('employees', EmployeeController::class);
    Route::get('employees-deleted', [EmployeeController::class, 'deleted'])->name('employees-deleted');
    Route::delete('employees-permanently/{id}', [EmployeeController::class, 'permanentlyDelete'])->name('employees-permanently-delete');
    Route::get('employees-restore/{id}', [EmployeeController::class, 'restore'])->name('employees-restore');
});

require __DIR__.'/auth.php';
