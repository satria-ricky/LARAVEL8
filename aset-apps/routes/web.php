<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AkunController;
use App\Http\Controllers\AsetController;
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
    Route::get('/daftar-aset', [AdminController::class,'getAset']);
    Route::get('/tambah-aset', [AdminController::class,'tambahAset']);
    Route::post('/tambah-aset', [AdminController::class,'createAset']); 

    // Route::resource('/aset', AsetController::class);
    // Route::resource('/profile', AkunController::class);
    
    Route::resources([
        '/aset' => AsetController::class,
        '/profile' => AkunController::class,
    ]);
    
});
    //backend CRUD
    // Route::resource('/aset', AsetController::class)->middleware('admin');



Route::group(['middleware' => ['guest']], function(){
    Route::get('/', [LoginController::class,'login'])->name('login');
});



Route::post('/login', [LoginController::class,'cekLogin']);
Route::post('/logout', [LoginController::class,'logout']);
