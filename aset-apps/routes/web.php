<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AkunController;
use App\Http\Controllers\AsetController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use Illuminate\Http\Request;
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
    Route::get('/filterAset/{jenis_id}', [AdminController::class,'filterAset'])->name('filterAset');

    Route::get('/export', [AdminController::class, 'exportAset']);



    Route::get('/tambah-aset', [AdminController::class,'tambahAset']);
    
    Route::get('/qr-code/{aset}', function($aset){
        return view('qr-code/qrcode',[
            'data' => url('detail-aset/'.$aset)
        ]);
    });

    Route::post('/tambah-aset', [AdminController::class,'createAset']);
    Route::post('/import-aset', function(Request $request){
        return $request;
    });     

    Route::resources([
        '/aset' => AsetController::class,
        '/profile' => AkunController::class,
    ]);
    
});

Route::group(['middleware' => ['guest']], function(){
    Route::get('/', [LoginController::class,'login'])->name('login');
});


Route::get('/detail-aset/{aset}', [AdminController::class,'detailAset'])->name('detail-aset');


Route::post('/login', [LoginController::class,'cekLogin']);
Route::post('/logout', [LoginController::class,'logout']);
