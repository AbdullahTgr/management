<?php

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
 

Route::group(['middleware' => ['cors', 'json.response']], function () {

    Route::get('/users_list_api', [App\Http\Controllers\ApiController::class, 'users'])->name('users.api')->middleware('auth.apikey');

    Route::get('/get_user_api/{user}', [App\Http\Controllers\ApiController::class, 'get_user'])->name('get_user.api')->middleware('auth.apikey');
    Route::get('/get_discount_api/{user}', [App\Http\Controllers\ApiController::class, 'get_discount'])->name('get_discount_api.api')->middleware('auth.apikey');
    Route::get('/notifications_api/{user}', [App\Http\Controllers\ApiController::class, 'notifications'])->name('notifications.api')->middleware('auth.apikey');
    
 
    Route::post('/login_api', [App\Http\Controllers\ApiController::class, 'login'])->name('login.api')->middleware('auth.apikey'); 


    Route::post('/register_api', [App\Http\Controllers\ApiController::class, 'register'])->name('register.api')->middleware('auth.apikey');
    Route::post('/tass', [App\Http\Controllers\ApiController::class, 'taskss'])->middleware('auth.apikey');
    Route::post('/send_mail_api', [App\Http\Controllers\ApiController::class, 'send_mail'])->middleware('auth.apikey');

    
    Route::post('/userlog', [App\Http\Controllers\ApiController::class, 'userlog'])->middleware('auth.apikey');
    Route::get('/get_reservation_data', [App\Http\Controllers\ApiController::class, 'get_reservation_data'])->middleware('auth.apikey');
    Route::post('/request_hotel', [App\Http\Controllers\ApiController::class, 'request_hotel'])->middleware('auth.apikey');
    
}); 