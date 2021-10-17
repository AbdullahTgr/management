<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use App\Models\UserAttending;
use App\Models\UserDiscount;
use App\Models\UserSalary;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Models\UserTask;
use App\Models\Setting;
use Notification;
use App\Models\UserAction;
use App\Models\Reservation;
use App\Notifications\MessageNotification;

class AdminController extends Controller
{

     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function users()
    {
        $users = User::get();
        $user_attendings = UserAttending::whereDate('come',Carbon::today())->get();

        return view('users.index', compact('users','user_attendings'));
    }
    public function sales()
    {
        $sales = Reservation::get();
 
        return view('sales.index', compact('sales'));
    }

    public function settings()
    {
        $setting = Setting::first();

        return view('settings.index', compact('setting'));
    }

    public function update_setting(Request $request) {

        $setting = Setting::findOrFail($request->id);
        $setting->complete_rate = $request->complete_rate;
        $setting->late_rate = $request->late_rate;
        $setting->reject_rate = $request->reject_rate;
        $setting->save();

        return redirect()->back();
    }

    public function send_notification(Request $request) {
        $user = User::where('id', $request->user_id)->first();

        $data = [
            'title' => Auth::user()->name . ' has send you a notification',
            'message' => $request->message,
            'type' => 1,
            'user_id' => $user->id
        ];

        Notification::send($user, new MessageNotification($data));


        $httpClient = new \GuzzleHttp\Client(); // guzzle 6.3
        $httpClient->request('POST', 'https://us-central1-newchat-9d522.cloudfunctions.net/sendNotificationForUser', [
            'headers' => [
                 'X-Authorization' => 'LIZefNAEYFEsrr6w7fmVF34qJnP841qqLz5YE9qWMwbhutlEr2nq0CrsdC75ao7Q',
                 'Content-Type' => 'application/json'
             ],

                 "json" =>
                 [
                    'user_id' => strval($user->id),
                    'title' =>  Auth::user()->name . ' has send you a notification',
                    'type' =>  "1",
                    'message' => strval($request->message)
                 ]

         ]);

        return redirect()->back();
    }

    public function send_all_notification(Request $request) {

        $users = User::get();

        $data = [
            'title' => Auth::user()->name . ' has send you a notification',
            'message' => $request->message,
            'user_id' => 0,
            'type' => 1,
        ];

        foreach ($users as $user)
        {
            $userData = User::where('id', $user->id)->first();
            Notification::send($userData, new MessageNotification($data));
        }


        $httpClient = new \GuzzleHttp\Client(); // guzzle 6.3
        $httpClient->request('POST', 'https://us-central1-newchat-9d522.cloudfunctions.net/sendNotifications', [
            'headers' => [
                 'X-Authorization' => 'LIZefNAEYFEsrr6w7fmVF34qJnP841qqLz5YE9qWMwbhutlEr2nq0CrsdC75ao7Q',
                 'Content-Type' => 'application/json'
             ],

                 "json" =>
                 [
                    'title' =>  Auth::user()->name . ' has send you a notification',
                    'type' =>  "1",
                    'message' => strval($request->message)
                 ]

         ]);

        return redirect()->back();
    }

    

    public function send($user_id, $message,$title) {
        $user = User::where('id', $user_id)->first();
  
        $data = [
            'title' => $title,
            'message' => $message,
            'type' => 2,
            'user_id' => $user->id
        ];
  
        Notification::send($user, new MessageNotification($data));
   

        $httpClient = new \GuzzleHttp\Client(); // guzzle 6.3  
        $httpClient->request('POST', 'https://us-central1-newchat-9d522.cloudfunctions.net/sendNotificationForUser', [
            'headers' => [
                 'X-Authorization' => 'LIZefNAEYFEsrr6w7fmVF34qJnP841qqLz5YE9qWMwbhutlEr2nq0CrsdC75ao7Q',
                 'Content-Type' => 'application/json'
             ],
         
                 "json" =>
                 [
                    'user_id' => strval($user->id),
                    'title' => $title,
                    'type' =>  "2",
                    'message' => strval($message)
                 ]
             
         ]);

         
    }


    

    public function add_task(Request $request)
    {

        $task = new UserTask();
        $ldate = date('Y-m-d H:i:s');
        $task->name = $request->taskname;
        $task->description = $request->taskdesc;
        $task->start_at = $ldate;
        $task->end_at = $request->endtime;
        $task->finished_at = null;
        $task->status = 0;
        $task->progress = 0;
        $task->points =$request->taskpoints;
        $task->user_id = $request->userid;
        $task->admin_comment = "";
        $task->save();
        $this->send($request->userid, " New ","New Task For You");

        return redirect('add')->with('status',"Insert successfully");

    }

    public function add()
    {
        $users = User::get();
        return view('tasks.add', compact('users'));
    }

    public function tasks()
    {
        //$users = User::get();

        $users =DB::table('users')
        ->join('user_tasks', 'users.id', '=', 'user_tasks.user_id')
        ->select('users.*','user_tasks.*', 'user_tasks.name as task_name','users.name as username','users.id as userid','user_tasks.id as task_id')
        ->orderBy('user_tasks.id', 'asc')
        ->get();

        return view('tasks.index', compact('users'));

    }





    public function useractions()
    {
        $actions =DB::table('users')
        ->join('user_actions', 'users.id', '=', 'user_actions.user_id')
        ->select('users.*','user_actions.*','user_actions.id as actionid')
        ->orderBy('user_actions.id', 'asc')
        ->get();
        return view('useractions.index', compact('actions'));

    }








    public function profile($id)
    {
        $user = User::where('id', $id)->first();
        $check_salary = UserSalary::where('user_id',$user->id)->whereNull('status')->first();

        if (!$check_salary)
        {

            $salary = new UserSalary();
            $salary->salary = $user->salary;
            $salary->user_id = $user->id;
            $salary->save();

        }


        return view('users.profile', compact('user'));
    }




    public function accept_task(Request $request)
    {
        $task = UserTask::findOrFail($request->task_id);

        $task->status= $request->action;
        $task->admin_comment= $request->admin_comment;
        $task->save();
        return redirect()->back();
    }






    public function update_user(Request $request)
    {
        $user = User::findOrFail($request->user_id);

        $user->name = $request->first_name . ' ' . $request->last_name;
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->salary = $request->salary;
        $user->role = $request->role;
     //   $user->id_card = $request->last_name;
        $user->job_title = $request->job_title;
        $user->job_description = $request->job_description;
        $user->status = $request->status;
       // $user->address = $request->last_name;
        $user->photo = $request->photo ? $request->photo->store('users') : $user->photo;

        $user->save();

        $check_salary = UserSalary::where('user_id',$request->user_id)->whereNull('status')->first();

        if ($check_salary)
        {
           $update_salary = UserSalary::findOrFail($check_salary->id);
           $update_salary->salary = $request->salary;
           $update_salary->save();
        }

    if ($user)
    {
        return response()->json(['success'=>'User Updatesd!']);
    }else
    {
        return response()->json(['error'=>'User Not Updated!']);
    }

      //  return redirect()->back();
    }

    public function delete_user(Request $request)
    {
          User::where('id',$request->user_id)->delete();

          return redirect()->back();
    }


    public function deleteuserlog($uid)
    {
          UserAction::where('id',$uid)->delete();

          return redirect()->back();
    }




    public function update_user_time(Request $request)
    {
        $user = UserAttending::findOrFail($request->time_id);
        $user->come = $request->come;
        $user->leave = $request->leave;
        $user->save();

        return redirect()->back();
    }

    public function withdraw_salary(Request $request)
    {
        $check_salary = UserSalary::where('user_id',$request->user_id)->whereNull('status')->first();
        $user = User::where('id',$request->user_id)->first();

        if ($check_salary)
        {
            $salary = UserSalary::findOrFail($check_salary->id);
            $salary->status = 1;
            $salary->date = Carbon::now()->today();
            $salary->save();
        }else
        {
            $salary = new UserSalary();
            $salary->salary = $user->salary;
            $salary->user_id = $request->user_id;
            $salary->status = 1;
            $salary->date = Carbon::now()->today();
            $salary->save();
        }
        return redirect()->back();
    }

    public function update_user_discount(Request $request)
    {
        $check_salary = UserSalary::where('user_id',$request->user_id)->whereNull('status')->first();
        $user = User::where('id',$request->user_id)->first();

        if ($check_salary)
        {
            $salary = UserSalary::findOrFail($check_salary->id);
            $salary->salary = $check_salary->salary - $request->discount;
            $salary->save();

            $user_dsicount = new UserDiscount();
            $user_dsicount->amount = $request->discount;
            $user_dsicount->comment = $request->comment;
            $user_dsicount->user_id = $request->user_id;
            $user_dsicount->salary_id = $check_salary->id;
            $user_dsicount->save();
        }else
        {
            $salary = new UserSalary();
            $salary->salary = $user->salary - $request->discount;
            $salary->user_id = $request->user_id;
            $salary->save();

            $user_dsicount = new UserDiscount();
            $user_dsicount->amount = $request->discount;
            $user_dsicount->comment = $request->comment;
            $user_dsicount->user_id = $request->user_id;
            $user_dsicount->salary_id = $salary->id;
            $user_dsicount->save();
        }



        return redirect()->back();
    }

    public function attend_user(Request $request)
    {
        $check = UserAttending::whereDate('come',Carbon::today())->where('user_id', $request->user_id)->count();
        $date =  Carbon::now();
        $date->setTimezone('EET');

        if ($check == 0)
        {
           $user = new UserAttending();
           $user->user_id = $request->user_id;
           $user->come = $date;
           $user->save();

        }


        return redirect()->back();
    }

}
