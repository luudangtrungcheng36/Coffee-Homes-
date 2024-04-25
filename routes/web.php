<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\AuthController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\ProductController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make som
|ething great!
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('dashboard/index', [DashboardController::class, 'index']) -> name('dashboard.index');

Route::get('admin', [AuthController::class, 'index']) -> name('auth.index');
Route::post('login', [AuthController::class, 'login']) -> name('auth.login');

Route::resource('category', CategoryController::class);
Route::resource('product', ProductController::class);

Route::prefix('admin')->group(function () {

});

// Route::get('products/{id}/edit', [ProductController::class], 'edit') -> name('product.edit');



