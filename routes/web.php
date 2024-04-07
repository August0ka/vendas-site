<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController; 
use App\Http\Controllers\LoginController;
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

Route::get('/', function () {
    return view('welcome');
});


Route::post('/login/auth', [LoginController::class, 'login'])->name('login.auth');
Route::get('/login', [LoginController::class, 'index'])->name('login.index');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

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