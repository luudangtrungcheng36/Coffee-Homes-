<?php

use App\Http\Controllers\Backend\AccountController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\AuthController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\NewController;
use App\Http\Controllers\Backend\Ordercontroller;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Frontend\UserController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\ListProductController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\CheckoutController;

Route::get('/', function () {
    return view('frontend.home');
});

// Route::get('dashboard/index', [DashboardController::class, 'index']) -> name('dashboard.index');

// Route::get('register', [UserController::class, 'index']) -> name('user.index');
// Route::post('register', [UserController::class, 'store']);

// Route::get('/', [HomeController::class, 'index']) -> name('home.index');
// Route::get('detail', [HomeController::class, 'productDetail']) -> name('home.productDetail');
// Route::get('news', [HomeController::class, 'allNews']) -> name('home.allNews');


// Route::get('list-product/{id}', [ListProductController::class, 'show']) -> name('listProduct.show');


// Route::get('/login', [UserController::class, 'login']) -> name('user.login');
// Route::post('/login', [UserController::class, 'check_login']);
// Route::get('/user/{id}', [UserController::class, 'user_detail']) -> name('user.user_detail');
// Route::post('/logout', [UserController::class, 'logout']) -> name('user.logout');

// Route::get('/cart', [CartController::class, 'index']) -> name('cart.index');
// Route::get('/cart/add/{id}', [CartController::class, 'create']) -> name('cart.create');
// Route::get('/cart/delete/{id}', [CartController::class, 'delete']) -> name('cart.delete');
// Route::get('/cart/update/{id}', [CartController::class, 'update']) -> name('cart.update');



// Route::get('admin', [AuthController::class, 'index']) -> name('auth.index');
// Route::post('loginAdmin', [AuthController::class, 'login']) -> name('auth.login');


// Route::post('account/filter', [AccountController::class, 'filter']) -> name('account.filter');

// Route::resource('category', CategoryController::class);
// Route::resource('product', ProductController::class);
// Route::resource('account', AccountController::class);


// Route cho Dashboard
// Route::get('dashboard/index', [DashboardController::class, 'index'])->name('dashboard.index');

// Route cho người dùng
Route::prefix('user')->group(function() {
    Route::get('register', [UserController::class, 'index'])->name('user.index');
    Route::post('register', [UserController::class, 'store']);
    Route::get('/login', [UserController::class, 'login'])->name('user.login');
    Route::post('/login', [UserController::class, 'check_login']);
    Route::get('/verify/{email}', [UserController::class, 'verify'])->name('user.verify');

    // Viết như dưới sai vì truyền 2 tham số thì không truyền mảng như 1 cái được mà chỉ truyền id thôi. 
    // Route::post('/comment/{user}/{product}', [UserController::class, 'comment'])->name('user.comment');

    Route::post('/comment/{account_id}/{product_id}', [UserController::class, 'comment'])->name('user.comment');
    Route::middleware(['auth'])->group(function () {
        Route::get('/{id}', [UserController::class, 'user_detail'])->name('user.user_detail');
        Route::post('/update/{account}', [UserController::class, 'update'])->name('user.update');
        Route::post('/logout', [UserController::class, 'logout'])->name('user.logout');
    });
});

// Route cho trang chủ và các trang liên quan
Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('detail/{oneProduct}', [HomeController::class, 'productDetail'])->name('home.productDetail');
Route::get('news', [HomeController::class, 'allNews'])->name('home.allNews');

// Route cho sản phẩm
Route::get('list-product/{id}', [ListProductController::class, 'show'])->name('listProduct.show');

// Route cho giỏ hàng
Route::prefix('cart')->group(function() {
    Route::get('/', [CartController::class, 'index'])->name('cart.index');
    Route::middleware(['auth'])->group(function () {
        Route::get('add/{id}', [CartController::class, 'create'])->name('cart.create');
        Route::get('delete/{id}', [CartController::class, 'delete'])->name('cart.delete');
        Route::get('update/{id}', [CartController::class, 'update'])->name('cart.update');
    });
});

// Route cho đặt đơn hàng
Route::prefix('order')->middleware(['auth'])->group(function() {
    Route::get('/', [CheckoutController::class, 'index'])->name('checkout.index');
    Route::get('/postorder', [CheckoutController::class, 'post_order'])->name('checkout.post_order');
    Route::get('/verify/{token}', [CheckoutController::class, 'verify'])->name('checkout.verify');
    Route::get('/history', [CheckoutController::class, 'history'])->name('checkout.history');
    Route::get('/historyDetail/{order}', [CheckoutController::class, 'historyDetail'])->name('checkout.historyDetail');
    // Route::get('delete/{id}', [CheckoutController::class, 'delete'])->name('cart.delete');
    // Route::get('update/{id}', [CheckoutController::class, 'update'])->name('cart.update');
});

// Route cho quản trị viên
Route::prefix('admin')->group(function() {
    Route::get('/', [AuthController::class, 'index'])->name('auth.index');
    Route::post('login', [AuthController::class, 'login'])->name('auth.login');

    Route::middleware(['auth'])->group(function () {
        Route::get('dashboard/index', [DashboardController::class, 'index'])->name('dashboard.index');
        Route::get('/order', [Ordercontroller::class, 'index'])->name('order.index');
        Route::get('/order/update-status/{id}/{status}', [OrderController::class, 'updateStatus'])->name('order.updateStatus');
        Route::get('/order/order_detail/{id}', [OrderController::class, 'order_detail'])->name('order.order_detail');
    });
});

// Route cho bộ lọc tài khoản
Route::post('account/filter', [AccountController::class, 'filter'])->name('account.filter');

// Resource route cho các module quản lý
Route::middleware(['auth'])->group(function () {
    Route::resources([
        'category' => CategoryController::class,
        'product' => ProductController::class,
        'account' => AccountController::class,
        'new' => NewController::class,
    ]);
});



