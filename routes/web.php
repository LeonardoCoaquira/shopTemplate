<?php

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
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/products', [App\Http\Controllers\ProductController::class, 'index'])->name('products');
Route::post('/uploadProduct', [App\Http\Controllers\ProductController::class, 'create'])->name('uploadProduct');
Route::get('/products/photos/{route}',[App\Http\Controllers\ProductController::class, 'showPhoto']);
Route::post('/deleteProduct', [App\Http\Controllers\ProductController::class, 'destroy'])->name('deleteProduct');
Route::get('/icons/{route}',[App\Http\Controllers\HomeController::class, 'showIcon']);
Route::post('/like', 'LikeController@store');
Route::get('/admin',[App\Http\Controllers\AdminController::class, 'index'])->name('admin')->middleware(['auth','admin']);
Route::get('no-admin',function()
{
    return "No admin";
});