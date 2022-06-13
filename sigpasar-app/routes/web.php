<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;

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

Route::get('/', [AuthController::class, 'index'])->name('home_page');

Route::post('/login', [AuthController::class, 'login']);

Route::get('/peta_by_pasar', [UserController::class, 'peta_by_pasar']);


Route::group(['middleware' => 'auth'], function () {

    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/dashboard', [UserController::class, 'tampil_dashboard']);
    
    //TAMPIL
    Route::get('/pasar', [UserController::class, 'tampil_pasar']);
    Route::get('/produk', [UserController::class, 'tampil_produk']);
    Route::post('/detil_pasar', [UserController::class, 'detil_pasar']);

    //TAMBAH
    Route::post('/tambah_pasar', [UserController::class, 'tambah_pasar']);
    Route::post('/tambah_produk', [UserController::class, 'tambah_produk']);

    //HAPUS
    Route::post('/hapus_pasar', [UserController::class, 'hapus_pasar']);
    Route::post('/hapus_produk', [UserController::class, 'hapus_produk']);


    //PETA
    


});