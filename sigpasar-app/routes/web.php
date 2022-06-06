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

Route::get('/', [superadmin::class, 'tampil_pabrik']);

Route::group(['middleware' => 'auth'], function () {

    Route::get('/pabrik', [superadmin::class, 'tampil_pabrik']);
    Route::get('/audit', [superadmin::class, 'tampil_audit']);
    Route::get('/inspek', [superadmin::class, 'tampil_inspek']);
    Route::post('/register_pabrik', [superadmin::class, 'register']);
    Route::post('/register_audit', [superadmin::class, 'register_audit']);
    Route::post('/register_inspek', [superadmin::class, 'register_inspek']);
    Route::post('/input_aturan', [superadmin::class, 'input_aturan']);
    Route::get('/update-protap', [superadmin::class, 'tampil_protap'])->name('updateprotap');

});