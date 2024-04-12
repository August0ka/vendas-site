<?php

use App\Http\Controllers\SiteLoginController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController; 
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Rotas Admin
Route::prefix('admin')->group(function () {
    Route::post('/login/auth', [LoginController::class, 'login'])->name('login.auth');
    Route::get('/login', [LoginController::class, 'index'])->name('login.index');
    Route::get('/logout', [LoginController::class, 'logout'])->name('admin.logout');
});

Route::prefix('admin')->middleware(['auth:admin'])->group(function () {

    Route::resource('products', ProductController::class)->names([
        'index'   => 'products.index',
        'create'  => 'products.create',
        'store'   => 'products.store',
        'edit'    => 'products.edit',
        'update'  => 'products.update',
        'destroy' => 'products.destroy',
    ]);

    Route::resource('categories', CategoryController::class)->names([
        'index'   => 'categories.index',
        'create'  => 'categories.create',
        'store'   => 'categories.store',
        'edit'    => 'categories.edit',
        'update'  => 'categories.update',
        'destroy' => 'categories.destroy',
    ]);

    Route::resource('users', UserController::class)->names([
        'index'   => 'users.index',
        'create'  => 'users.create',
        'store'   => 'users.store',
        'edit'    => 'users.edit',
        'update'  => 'users.update',
        'destroy' => 'users.destroy',
    ]);

    Route::resource('sales', SalesController::class)->names([
        'index'   => 'sales.index',
        'create'  => 'sales.create',
        'store'   => 'sales.store',
        'edit'    => 'sales.edit',
        'update'  => 'sales.update',
        'destroy' => 'sales.destroy',
    ]);
});
//Fim Rotas Admin

//Rotas Site
Route::get('/{categoryId?}', [HomeController::class, 'index'])->name('site.home');

Route::prefix('site')->group(function () {
    Route::get('/show/product/{product}', [HomeController::class, 'showProduct'])->name('site.show.product');
    Route::post('/register/store', [UserController::class, 'createRegister'])->name('site.register.store');
    Route::post('/login/auth', [SiteLoginController::class, 'login'])->name('site.login.auth');
    Route::get('/register', [UserController::class, 'showRegister'])->name('site.register');
    Route::get('/login', [SiteLoginController::class, 'index'])->name('site.login.index');
});

Route::prefix('site')->middleware(['auth:web'])->group(function () {
    Route::get('/logout', [SiteLoginController::class, 'logout'])->name('site.logout');
    Route::get('/product/{product}/purchase', [ProductController::class, 'purchase'])->name('site.product.purchase');
});
//Fim Rotas Site



