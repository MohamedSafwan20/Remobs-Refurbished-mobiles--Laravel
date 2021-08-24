<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ProductController;
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

Route::get('/', [MainController::class, 'Home'])->name('home');

// Authentication routes
Route::get('/register', [AuthController::class, 'registerView'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::get('/login', [AuthController::class, 'loginView'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
// End of Authentication routes

Route::get('/admin', [AdminController::class, 'adminPanelView'])->name('adminPanel')->middleware('auth');
Route::post('/admin', [AdminController::class, 'adminPanel']);

// Social Auths
Route::get('auth/{provider}', [AuthController::class, 'socialAuthRedirect'])->name('socialAuth');
Route::get('auth/{provider}/callback', [AuthController::class, 'socialAuthCallback']);
// End of Social Auths

Route::get('/product-details', [ProductController::class, 'productDetailsView'])->name('productDetails')->middleware('auth');
Route::post('/product-details', [ProductController::class, 'productDetails']);
// Route::post('/product-details', [ProductController::class, 'productDetailsSearch']);
