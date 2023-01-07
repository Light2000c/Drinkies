<?php

use App\Http\Controllers\admin\AddproductController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\LoginController as AdminLoginController;
use App\Http\Controllers\admin\ProductController as AdminProductController;
use App\Http\Controllers\admin\ViewProductController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\product\CartController;
use App\Http\Controllers\product\ProductController;
use App\Http\Controllers\product\SearchProductController;
use App\Http\Controllers\product\SingleProductController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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
    return view('home');
});

Auth::routes(['verify'=>true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/login', [LoginController::class, 'index'])->name("login");
Route::post('/login', [LoginController::class, 'login']);

Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::get('/product', [ProductController::class, 'index']);
Route::post('/product/{product}', [ProductController::class, 'addToCart'])->name('add_to_cart');
Route::delete('/product/{product}', [ProductController::class, 'removeFromCart'])->name('remove_from_cart');

Route::get('/single-product/{product}', [SingleProductController::class, 'index'])->name('single_product');

Route::get('/cart', [CartController::class, 'index']);

Route::get('/search', [SearchProductController::class, 'index']);

Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');



// admin routes

Route::get('/admin/login', [AdminLoginController::class, 'index'])->name('admin_login');
Route::post('/admin/login', [AdminLoginController::class, 'login']);

Route::group(['prefix'=>'/admin', 'middleware'=>'auth'], function(){
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin_dashboard')->middleware('is_admin');

    Route::get('/add-product', [AddproductController::class, 'index'])->name('add-product')->middleware('is_admin');
    Route::post('/add-product', [AddproductController::class, 'addProduct'])->middleware('is_admin');

    Route::get('/product', [AdminProductController::class, 'index'])->name('admin_product')->middleware('is_admin');
    Route::delete('/product/{product}', [AdminProductController::class, 'deleteProduct'])->name('admin_deleteProduct')->middleware('is_admin');

    Route::get('/product/{product}', [ViewProductController::class, 'index'])->name('admin_viewproduct')->middleware('is_admin');
    Route::put('/product/{product}', [ViewProductController::class, 'editProduct'])->middleware('is_admin');
});