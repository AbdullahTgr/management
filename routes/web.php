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
 
Route::get('/employees', [App\Http\Controllers\AdminController::class, 'users'])->name('users')->middleware('roles:1,2');
Route::get('/settings', [App\Http\Controllers\AdminController::class, 'settings'])->name('settings')->middleware('roles:1');
Route::get('/sales', [App\Http\Controllers\AdminController::class, 'sales'])->name('sales')->middleware('roles:1,2,3');
Route::get('/reservations', [App\Http\Controllers\AdminController::class, 'reservations'])->name('reservations')->middleware('roles:1,2,3');
Route::get('/finance', [App\Http\Controllers\AdminController::class, 'finance'])->name('finance')->middleware('roles:1');
Route::get('/transfer', [App\Http\Controllers\AdminController::class, 'transfer'])->name('transfer')->middleware('roles:1');
Route::get('/management', [App\Http\Controllers\AdminController::class, 'management'])->name('management')->middleware('roles:1');


Route::get('/sales/{user}', [App\Http\Controllers\WebViewController::class, 'sales']);
Route::get('/reservations/{user}', [App\Http\Controllers\WebViewController::class, 'reservations'])->name('reservations_api');
Route::get('/finance/{user}', [App\Http\Controllers\WebViewController::class, 'finance'])->name('finance_api');
Route::get('/transfer/{user}', [App\Http\Controllers\WebViewController::class, 'transfer'])->name('transfer_api');

Route::post('/approve_reservation_api/{user}', [App\Http\Controllers\WebViewController::class, 'approve_reservation'])->name('approve_reservation_api');
Route::post('/update_reservation_api', [App\Http\Controllers\WebViewController::class, 'update_reservation'])->name('update_reservation_api');
Route::post('/update_rooms_api', [App\Http\Controllers\WebViewController::class, 'update_rooms'])->name('update_rooms_api');
Route::post('/update_include_api', [App\Http\Controllers\WebViewController::class, 'update_include'])->name('update_include_api');
Route::post('/update_payment_api', [App\Http\Controllers\WebViewController::class, 'update_payment'])->name('update_payment_api');
Route::post('/update_cashin_api', [App\Http\Controllers\WebViewController::class, 'update_cashin'])->name('update_cashin_api');
Route::post('/update_cashout_api', [App\Http\Controllers\WebViewController::class, 'update_cashout'])->name('update_cashout_api');
Route::post('/update_bank_api', [App\Http\Controllers\WebViewController::class, 'update_bank'])->name('update_bank_api');
Route::post('/update_comment_api', [App\Http\Controllers\WebViewController::class, 'update_comment'])->name('update_comment_api');
Route::post('/add_to_finance_api', [App\Http\Controllers\WebViewController::class, 'add_to_finance'])->name('add_to_finance_api');
Route::post('/add_to_transfer_api', [App\Http\Controllers\WebViewController::class, 'add_to_transfer'])->name('add_to_transfer_api');



Route::get('/employee/{id}', [App\Http\Controllers\AdminController::class, 'profile'])->name('profile')->middleware('roles:1,2');
Route::post('/send_notification', [App\Http\Controllers\AdminController::class, 'send_notification'])->name('send_notification');
Route::post('/send_all_notification', [App\Http\Controllers\AdminController::class, 'send_all_notification'])->name('send_all_notification');
Route::post('/update_setting', [App\Http\Controllers\AdminController::class, 'update_setting'])->name('update_setting')->middleware('roles:1');

Route::post('/update_user', [App\Http\Controllers\AdminController::class, 'update_user'])->name('update_user')->middleware('roles:1,2');
Route::post('/delete_user', [App\Http\Controllers\AdminController::class, 'delete_user'])->name('delete_user')->middleware('roles:1');
Route::post('/update_user_time', [App\Http\Controllers\AdminController::class, 'update_user_time'])->name('update_user_time');
Route::post('/update_user_discount', [App\Http\Controllers\AdminController::class, 'update_user_discount'])->name('update_user_discount');
Route::post('/update_user_bouns', [App\Http\Controllers\AdminController::class, 'update_user_bouns'])->name('update_user_bouns');
Route::post('/withdraw_salary', [App\Http\Controllers\AdminController::class, 'withdraw_salary'])->name('withdraw_salary');
Route::post('/attend_user', [App\Http\Controllers\AdminController::class, 'attend_user'])->name('attend_user');
Route::post('/approve_reservation', [App\Http\Controllers\AdminController::class, 'approve_reservation'])->name('approve_reservation');
Route::post('/update_reservation', [App\Http\Controllers\AdminController::class, 'update_reservation'])->name('update_reservation');
Route::post('/update_rooms', [App\Http\Controllers\AdminController::class, 'update_rooms'])->name('update_rooms');
Route::post('/update_include', [App\Http\Controllers\AdminController::class, 'update_include'])->name('update_include');
Route::post('/update_payment', [App\Http\Controllers\AdminController::class, 'update_payment'])->name('update_payment');
Route::post('/update_cashin', [App\Http\Controllers\AdminController::class, 'update_cashin'])->name('update_cashin');
Route::post('/update_cashout', [App\Http\Controllers\AdminController::class, 'update_cashout'])->name('update_cashout');
Route::post('/update_bank', [App\Http\Controllers\AdminController::class, 'update_bank'])->name('update_bank');
Route::post('/update_comment', [App\Http\Controllers\AdminController::class, 'update_comment'])->name('update_comment');
Route::post('/add_to_finance', [App\Http\Controllers\AdminController::class, 'add_to_finance'])->name('add_to_finance');
Route::post('/add_to_transfer', [App\Http\Controllers\AdminController::class, 'add_to_transfer'])->name('add_to_transfer');
Route::post('/delete_sale', [App\Http\Controllers\AdminController::class, 'delete_sale'])->name('delete_sale'); 
Route::post('/delete_task', [App\Http\Controllers\AdminController::class, 'delete_task'])->name('delete_task'); 


Route::get('/add', [App\Http\Controllers\AdminController::class, 'add'])->name('add');
Route::get('/tasks', [App\Http\Controllers\AdminController::class, 'tasks'])->name('tasks');
Route::post('/add_task', [App\Http\Controllers\AdminController::class, 'add_task'])->name('add_task');
Route::post('/accept_task', [App\Http\Controllers\AdminController::class, 'accept_task'])->name('accept_task');
Route::get('/useractions', [App\Http\Controllers\AdminController::class, 'useractions'])->name('useractions');
Route::post('/send_email', [App\Http\Controllers\AdminController::class, 'send_email'])->name('send_email');



Route::get('/msg/{user_id}', function($user_id){
    $user = \App\Models\User::where('id', $user_id)->first();
  
    $data = [
        'title' => 'New Request',
        'message' => 'New Request from salas Agent',
        'type' => 2,
        'user_id' => $user->id
    ];
    Notification::send($user, new \App\Notifications\RequestNotification($data));
    event(new \App\Events\NewRequest('hello world',$data));

    return 'New Request sent';
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





////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
Route::get('/hotels', [App\Http\Controllers\AdminController::class, 'hotels'])->name('hotels')->middleware('roles:1');
Route::get('/addhotel', [App\Http\Controllers\AdminController::class, 'addhotel'])->name('addhotel')->middleware('roles:1');
Route::post('/deletehotel', [App\Http\Controllers\AdminController::class, 'deletehotel'])->name('deletehotel')->middleware('roles:1');
Route::post('/inserthotel', [App\Http\Controllers\AdminController::class, 'inserthotel'])->name('inserthotel')->middleware('roles:1');
Route::post('/edithotel', [App\Http\Controllers\AdminController::class, 'edithotel'])->name('edithotel')->middleware('roles:1');

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
Route::get('/triptype', [App\Http\Controllers\AdminController::class, 'triptype'])->name('triptype')->middleware('roles:1');
Route::get('/addtriptype', [App\Http\Controllers\AdminController::class, 'addtriptype'])->name('addtriptype')->middleware('roles:1');
Route::post('/deletetriptype', [App\Http\Controllers\AdminController::class, 'deletetriptype'])->name('deletetriptype')->middleware('roles:1');
Route::post('/inserttriptype', [App\Http\Controllers\AdminController::class, 'inserttriptype'])->name('inserttriptype')->middleware('roles:1');
Route::post('/edittriptype', [App\Http\Controllers\AdminController::class, 'edittriptype'])->name('edittriptype')->middleware('roles:1');

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
Route::get('/views', [App\Http\Controllers\AdminController::class, 'views'])->name('views')->middleware('roles:1');
Route::get('/addview', [App\Http\Controllers\AdminController::class, 'addview'])->name('addview')->middleware('roles:1');
Route::post('/deleteview', [App\Http\Controllers\AdminController::class, 'deleteview'])->name('deleteview')->middleware('roles:1');
Route::post('/insertview', [App\Http\Controllers\AdminController::class, 'insertview'])->name('insertview')->middleware('roles:1');
Route::post('/editview', [App\Http\Controllers\AdminController::class, 'editview'])->name('editview')->middleware('roles:1');

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
Route::get('/transportation', [App\Http\Controllers\AdminController::class, 'transportation'])->name('transportation')->middleware('roles:1');
Route::get('/addtransportation', [App\Http\Controllers\AdminController::class, 'addtransportation'])->name('addtransportation')->middleware('roles:1');
Route::post('/deletetransportation', [App\Http\Controllers\AdminController::class, 'deletetransportation'])->name('deletetransportation')->middleware('roles:1');
Route::post('/inserttransportation', [App\Http\Controllers\AdminController::class, 'inserttransportation'])->name('inserttransportation')->middleware('roles:1');
Route::post('/edittransportation', [App\Http\Controllers\AdminController::class, 'edittransportation'])->name('edittransportation')->middleware('roles:1');

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
Route::get('/gateways', [App\Http\Controllers\AdminController::class, 'gateways'])->name('gateways')->middleware('roles:1');
Route::get('/addgateway', [App\Http\Controllers\AdminController::class, 'addgateway'])->name('addgateway')->middleware('roles:1');
Route::post('/deletegateway', [App\Http\Controllers\AdminController::class, 'deletegateway'])->name('deletegateway')->middleware('roles:1');
Route::post('/insertgateway', [App\Http\Controllers\AdminController::class, 'insertgateway'])->name('insertgateway')->middleware('roles:1');
Route::post('/editgateway', [App\Http\Controllers\AdminController::class, 'editgateway'])->name('editgateway')->middleware('roles:1');

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
Route::get('/destinations', [App\Http\Controllers\AdminController::class, 'destinations'])->name('destinations')->middleware('roles:1');
Route::get('/adddestination', [App\Http\Controllers\AdminController::class, 'adddestination'])->name('adddestination')->middleware('roles:1');
Route::post('/deletedestination', [App\Http\Controllers\AdminController::class, 'deletedestination'])->name('deletedestination')->middleware('roles:1');
Route::post('/insertdestination', [App\Http\Controllers\AdminController::class, 'insertdestination'])->name('insertdestination')->middleware('roles:1');
Route::post('/editdestination', [App\Http\Controllers\AdminController::class, 'editdestination'])->name('editdestination')->middleware('roles:1');

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 
Route::get('/excursions', [App\Http\Controllers\AdminController::class, 'excursions'])->name('excursions')->middleware('roles:1');
Route::get('/addexcursion', [App\Http\Controllers\AdminController::class, 'addexcursion'])->name('addexcursion')->middleware('roles:1');
Route::post('/deleteexcursion', [App\Http\Controllers\AdminController::class, 'deleteexcursion'])->name('deleteexcursion')->middleware('roles:1');
Route::post('/insertexcursion', [App\Http\Controllers\AdminController::class, 'insertexcursion'])->name('insertexcursion')->middleware('roles:1');
Route::post('/editexcursion', [App\Http\Controllers\AdminController::class, 'editexcursion'])->name('editexcursion')->middleware('roles:1');
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
Route::get('/getexcurr', [App\Http\Controllers\AdminController::class, 'getexcurr'])->name('getexcurr');


Route::post('/request_hotel', [App\Http\Controllers\AdminController::class, 'request_hotel']);