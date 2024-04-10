<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductUnitController;
use App\Http\Controllers\WareHouseController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\FloorController;
use App\Http\Controllers\DiscountController;
use App\Http\Controllers\TableController;
use App\Http\Controllers\BillController;
use App\Http\Controllers\BillDetailController;
use App\Http\Controllers\Client\HomeController;
use App\Http\Controllers\Client\OderController;
use App\Http\Controllers\OrderDetailController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OrderController;

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

//Route::get('/', function () {
//    return view('welcome');
//});

//Route::get('/home', function () {
//    return view('layouts.home');
//})->middleware(['auth', 'verified'])->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Trang quản lý
    Route::group(['middleware' => 'checkRole:admin'], function () {

        Route::get('/home-admin', function () {
            return view('layouts.home');
        })->middleware(['auth', 'verified'])->name('home-admin');

        Route::get('dashboard',[DashboardController::class,'index'])->name('dashboard');

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

        // Quản lý đơn vị sản phẩm
        Route::resource('product-units', ProductUnitController::class);
        Route::get('product-units-deleted', [ProductUnitController::class, 'deleted'])->name('product-units-deleted');
        Route::delete('product-units-permanently/{id}', [ProductUnitController::class, 'permanentlyDelete'])->name('product-units-permanently-delete');
        Route::get('product-units-restore/{id}', [ProductUnitController::class, 'restore'])->name('product-units-restore');

        // Quản lý kho
        Route::resource('warehouses', WareHouseController::class);
        Route::get('warehouses-deleted', [WareHouseController::class, 'deleted'])->name('warehouses-deleted');
        Route::delete('warehouses-permanently/{id}', [WareHouseController::class, 'permanentlyDelete'])->name('warehouses-permanently-delete');
        Route::get('warehouses-restore/{id}', [WareHouseController::class, 'restore'])->name('warehouses-restore');

        // Quản lý sản phẩm
        Route::resource('products', ProductController::class);
        Route::get('products-deleted', [ProductController::class, 'deleted'])->name('products-deleted');
        Route::delete('products-permanently/{id}', [ProductController::class, 'permanentlyDelete'])->name('products-permanently-delete');
        Route::get('products-restore/{id}', [ProductController::class, 'restore'])->name('products-restore');

        // Quản lý tầng
        Route::resource('floors', FloorController::class);
        Route::get('floors-deleted', [FloorController::class, 'deleted'])->name('floors-deleted');
        Route::delete('floors-permanently/{id}', [FloorController::class, 'permanentlyDelete'])->name('floors-permanently-delete');
        Route::get('floors-restore/{id}', [FloorController::class, 'restore'])->name('floors-restore');

        // Quản lý bàn
        Route::resource('tables', TableController::class);
        Route::get('tables-deleted', [TableController::class, 'deleted'])->name('tables-deleted');
        Route::delete('tables-permanently/{id}', [TableController::class, 'permanentlyDelete'])->name('tables-permanently-delete');
        Route::get('tables-restore/{id}', [TableController::class, 'restore'])->name('tables-restore');

        // Quản lý mã giảm giá
        Route::resource('discounts', DiscountController::class);
        Route::get('discounts-deleted', [DiscountController::class, 'deleted'])->name('discounts-deleted');
        Route::delete('discounts-permanently/{id}', [DiscountController::class, 'permanentlyDelete'])->name('discounts-permanently-delete');
        Route::get('discounts-restore/{id}', [DiscountController::class, 'restore'])->name('discounts-restore');

        // Quản lý bill
        Route::resource('bills', \App\Http\Controllers\BillController::class);
        Route::resource('bill-details', BillDetailController::class);

    });

    //Trang POS
    Route::group(['middleware' => 'checkRole:admin,employee'], function () {

        Route::get('/', [HomeController::class, 'index'])->name('/');
        Route::get('show-table/{id}', [HomeController::class, 'show'])->name('show-table');

        // Chọn đồ ăn
        Route::get('order', [OderController::class, 'index'])->name('order');
        Route::get('show-food/{id}', [OderController::class, 'show'])->name('show-food');

        Route::post('post-bill-details', [BillDetailController::class,'store'])->name('post-bill-details');
//        Route::get('cart', [BillDetailController::class,'cart'])->name('cart');


//        Route::get('cart', [BillDetailController::class, 'showCart'])->name('cart');
        Route::delete('delete_cart/{id}', [BillDetailController::class, 'destroy'])->name('delete_cart');

        Route::resource('carts',OrderDetailController::class);

        Route::delete('deleteOrder/{id}',[OrderController::class,'deleteOrder'])->name('deleteOrder');

        Route::resource('bills',BillController::class);
        Route::get('show-cart',[OrderDetailController::class,'showCart'])->name('show-cart');

//        Route::post('/cart/add', [BillDetailController::class, 'addToCart'])->name('cart.add');
//        Route::get('/cart', [BillDetailController::class, 'showCart'])->name('cart.show');
//        Route::delete('/cart/remove/{productId}', [BillDetailController::class, 'removeFromCart'])->name('cart.remove');

//        Làm lại
        Route::post('orders-add',[\App\Http\Controllers\OrderController::class,'store'])->name('order-add');


    });

});

require __DIR__.'/auth.php';
