<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PasarController;
use App\Http\Controllers\ProdukController;

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

Route::post('/detil_pasar', [UserController::class, 'detil_pasar']);
Route::post('/lokasi_pasar', [UserController::class, 'lihat_produk_pasar']);
Route::post('/peta_by_produk', [UserController::class, 'peta_by_produk'])->name('peta_by_produk');



Route::group(['middleware' => 'auth'], function () {

    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/dashboard', [UserController::class, 'tampil_dashboard']);

    //TAMPIL
    Route::get('/profile', [UserController::class, 'tampil_profile']);
    Route::get('/resetPassword', [UserController::class, 'tampil_reset_password']);
    Route::get('/pasar', [PasarController::class, 'tampil_pasar']);
    Route::get('/tambah_pasar', [PasarController::class, 'tampil_tambah_pasar']);
    Route::get('/produk', [ProdukController::class, 'tampil_produk']);



    //TAMBAH
    Route::post('/tambah_pasar', [PasarController::class, 'tambah_pasar']);
    Route::post('/tambah_produk', [ProdukController::class, 'tambah_produk']);
    Route::post('/tambah_produk_pasar', [PasarController::class, 'tambah_produk_pasar']);

    //HAPUS
    Route::post('/hapus_pasar', [PasarController::class, 'hapus_pasar']);
    Route::post('/hapus_produk', [ProdukController::class, 'hapus_produk']);
    Route::post('/hapus_produk_pasar', [ProdukController::class, 'hapus_produk_pasar']);


    //EDIT
    Route::post('/edit_profile', [UserController::class, 'edit_profile']);
    Route::post('/edit_produk', [ProdukController::class, 'edit_produk']);
    Route::get('/EditPasar/{id_pasar}', [PasarController::class, 'tampil_edit_pasar'])->name('EditPasar');
    Route::post('/editPasar', [PasarController::class, 'edit_pasar']);
    Route::post('/reset_password', [UserController::class, 'reset_password']);

    //PETA


});
