<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\produkController;
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
// OTOMATIS ADA SETELAH PERINTAH "php artisan bootstrap --auth"
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// ============================================================

// RUTE UNTUK TEMPLATE DASHBOARD PRODUK
Route::get('tabel', [ProductController::class, 'homepage']); // tidak menggunakan autentikasi untuk dapat mengakses ini


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->middleware('auth')->name('home');

// Route::resource('produk', produkController::class)->middleware('auth');
Route::get('/produk/index', [App\Http\Controllers\produkController::class,'index'])->middleware('auth')->name('produk.index');
Route::post('/produk/store', [App\Http\Controllers\produkController::class,'store'])->middleware('auth')->name('produk.store');
Route::get('/produk/create', [App\Http\Controllers\produkController::class,'create'])->middleware('auth')->name('produk.create');
Route::get('produk/edit/{id}', [App\Http\Controllers\produkController::class,'edit'])->middleware('auth')->name('produk.edit');
Route::get('produk/show/{id}', [App\Http\Controllers\produkController::class,'show'])->middleware('auth')->name('produk.show');

Route::put('/produk/update/{id}', [App\Http\Controllers\produkController::class,'update'])->middleware('auth')->name('produk.update');
// Route::delete('/produk/delete/{id}', [App\Http\Controllers\produkController::class,'destroy'])->middleware('auth')->name('produk.destroy');
Route::get('/produk/delete/{id}', [App\Http\Controllers\produkController::class,'destroy'])->middleware('auth')->name('produk.destroy');

