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

 
Route::get('/employees', [App\Http\Controllers\AdminController::class, 'users'])->name('users');
Route::get('/settings', [App\Http\Controllers\AdminController::class, 'settings'])->name('settings')->middleware('roles:1');
Route::get('/sales', [App\Http\Controllers\AdminController::class, 'sales'])->name('sales')->middleware('roles:1');
Route::get('/reservations', [App\Http\Controllers\AdminController::class, 'reservations'])->name('reservations')->middleware('roles:1');

Route::get('/employee/{id}', [App\Http\Controllers\AdminController::class, 'profile'])->name('profile')->middleware('roles:1,2');
Route::post('/send_notification', [App\Http\Controllers\AdminController::class, 'send_notification'])->name('send_notification');
Route::post('/send_all_notification', [App\Http\Controllers\AdminController::class, 'send_all_notification'])->name('send_all_notification');
Route::post('/update_setting', [App\Http\Controllers\AdminController::class, 'update_setting'])->name('update_setting')->middleware('roles:1');

Route::post('/update_user', [App\Http\Controllers\AdminController::class, 'update_user'])->name('update_user')->middleware('roles:1,2');
Route::post('/delete_user', [App\Http\Controllers\AdminController::class, 'delete_user'])->name('delete_user')->middleware('roles:1');
Route::post('/update_user_time', [App\Http\Controllers\AdminController::class, 'update_user_time'])->name('update_user_time');
Route::post('/update_user_discount', [App\Http\Controllers\AdminController::class, 'update_user_discount'])->name('update_user_discount');
Route::post('/withdraw_salary', [App\Http\Controllers\AdminController::class, 'withdraw_salary'])->name('withdraw_salary');
Route::post('/attend_user', [App\Http\Controllers\AdminController::class, 'attend_user'])->name('attend_user');
Route::post('/approve_reservation', [App\Http\Controllers\AdminController::class, 'approve_reservation'])->name('approve_reservation');
Route::post('/update_reservation', [App\Http\Controllers\AdminController::class, 'update_reservation'])->name('update_reservation');
Route::post('/delete_sale', [App\Http\Controllers\AdminController::class, 'delete_sale'])->name('delete_sale');


Route::get('/add', [App\Http\Controllers\AdminController::class, 'add'])->name('add');
Route::get('/tasks', [App\Http\Controllers\AdminController::class, 'tasks'])->name('tasks');
Route::post('/add_task', [App\Http\Controllers\AdminController::class, 'add_task'])->name('add_task');
Route::post('/accept_task', [App\Http\Controllers\AdminController::class, 'accept_task'])->name('accept_task');
Route::get('/useractions', [App\Http\Controllers\AdminController::class, 'useractions'])->name('useractions');

Route::get('/msg', function(){
    return event(new \App\Events\NewRequest('hello world'));
 });
 
 Route::get('/msg2', function(){
    return view('msg');
 });
Auth::routes(); 
Auth::routes(['register' => false]);


Route::get('/register', function(){
    Auth::logout();
    return Redirect::to('/');
 });
 

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/foo', function () {
    Artisan::call('storage:link');
});

Route::get('/deleteuserlog{id}', [App\Http\Controllers\AdminController::class, 'deleteuserlog'])->name('deleteuserlog');