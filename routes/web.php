<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CommissionController;


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
    return view('auth.login');
});

Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('/order')->group(function () {
    Route::get('/create'            , [OrderController::class, 'create']);
    Route::post('/store'            , [OrderController::class, 'store']);
    Route::get('/index'             , [OrderController::class, 'index']);
});
Route::prefix('/commission')->group(function () {
    Route::get('/index'             , [CommissionController::class, 'index']);
});
