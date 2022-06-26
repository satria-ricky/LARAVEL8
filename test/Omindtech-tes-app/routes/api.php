<?php

use App\Http\Controllers\API\MyController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::get('user', [MyController::class, 'getUser']);

Route::post('register', [MyController::class, 'register']);

Route::post('login', [MyController::class, 'login']);

Route::group(['middleware' => ['auth:sanctum']], function () {

    Route::get('dashboard', [MyController::class, 'dashboard']);

    Route::get('profile', [MyController::class, 'profile']);
    
    Route::get('/logout', [MyController::class, 'logout']);
    
});



// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
