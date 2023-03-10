<?php

use App\Http\Controllers\InformationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Models\Product;

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
})->name('welcome');
Auth::routes();
Route::apiResource('information',InformationController::class);
Route::apiResource('product', ProductController::class);
Route::middleware(['IsAdmin'])->group(function () {
    Route::apiResource('user', UserController::class);
    Route::get('user/profile', [UserController::class, 'profile'])->name('user.profile');
    Route::get('/home', [HomeController::class, 'index'])->name('home');
});
