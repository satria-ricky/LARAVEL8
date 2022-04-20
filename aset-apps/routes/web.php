<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;

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

Route::group(['middleware' => ['auth']], function(){
    Route::get('/beranda', [AdminController::class,'beranda'])->name('beranda');
    Route::get('/daftar-aset', [AdminController::class,'get_aset']);
    Route::get('/tambah-aset', [AdminController::class,'tambah_aset']);
    Route::post('/tambah-aset', [AdminController::class,'create_aset']);

	// Route::get('/admin', [AdminController::class, 'index']);
});

Route::group(['middleware' => ['guest']], function(){
    Route::get('/login', [LoginController::class,'login'])->name('login');
});


Route::get('/itu', [AdminController::class,'beranda'])->name('itu');

Route::post('/login', [LoginController::class,'cekLogin']);
Route::post('/logout', [LoginController::class,'logout']);
