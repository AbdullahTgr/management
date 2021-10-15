<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserAction;
use App\Models\UserTask;
use Response;
use App\Models\UserAttending;
use DB; 


class ApiController extends Controller
{
 
    // X-Authorization
    // KEY = LIZefNAEYFEsrr6w7fmVF34qJnP841qqLz5YE9qWMwbhutlEr2nq0CrsdC75ao7Q
    


     public function __construct()
     {
         $this->middleware('auth.apikey');
     }

    public function users()
    {
        $users = User::where('status',1)->get();

        return Response::json(array(
            "users" => $users,
            "success" => 1,
            "state" => 1,
        )); 
    }

    public function get_user($id)
    {
        $user = User::where('status',1)->where('id',$id)->first();

        if ($user)
        {
            
            return Response::json(array(
                "user" => $user,
                "salary" => $user->salary(),
                "task_rate" => $user->task_rate(),
                "completed_tasks" => $user->tasks(),
                "incomplete_tasks" => $user->incomplete_tasks(),
                "success" => 1,
                "state" => 1,
            ));
 
        }

        return Response::json(array(
            "user" => "User Not Found",
         
            "success" => 0,
            "state" => 1,
        ));
     
    }


    public function get_discount($id)
    {
        $user = User::where('status',1)->where('id',$id)->first();

        if ($user)
        {
            return Response::json(array(
                "discounts" => $user->month_discounts(),
                "success" => 1,
                "state" => 1,
            ));
        }

        return Response::json(array(
            "user" => "User Not Found",
         
            "success" => 0,
            "state" => 1,
        ));
     
    }

    public function notifications($user)
    {
             
            $user = User::find($user);
            $notifications = $user->notifications;
            $notifications->markAsRead();
      
            return Response::json(array(
                'notifications' => $notifications,
                "success" => 1,
                "state" => 1,
            ));
    }
    

    // public function taskss(Request $request)
    // {
             
    //         $user = UserTask::find($request->id);
      
    //         return Response::json(array(
    //             'name' =>  $user->name,
    //         ));
    // }


    public function userlog(Request $request)
    {

        $useraction = new UserAction();
        $useraction->user_id = $request->user_id;
        $useraction->action =$request->action;
        $useraction->page =$request->page;
        $useraction->save();
            return Response::json(array(
                'actions' =>  $useraction,
            ));
    } 

 

    


    // Regestration APIs

    public function login (Request $request) {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:6',
        ]);
        if ($validator->fails())
        {
            return response(['errors'=>$validator->errors()->all()], 422);
        }
        $user = User::where('email', $request->email)->first();
        if ($user) {
            if (Hash::check($request->password, $user->password)) {

                return Response::json(array(
                    'user' => $user,
                    "success" => 1,
                    "state" => 1,
                ));
            } else {
                return Response::json(array(
                    "success" => 0,
                    "state" => 5 , // Password miss match
                ));
            }
        } else {

            return Response::json(array(
                "success" => 0,
                "state" => 6 , // User does not exist
            ));
        }
    }




    public function register (Request $request) {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
        if ($validator->fails())
        {
          //  return response(['errors'=>$validator->errors()->all()], 422);

            return Response::json(array(
                "success" => 0,
                "state" => 7 , // Check the inputs
            ));
        }
        $user = User::create([
            'name' => $request['first_name'] . ' ' . $request['last_name'],
            'first_name' => $request['first_name'],
            'last_name' => $request['last_name'],
            'email' => $request['email'],
            'phone' => $request['phone'],
            'job_title' => $request['job_title'],
            'id_photo' =>$request->id_photo ? $request->id_photo->store('users_id') : null,
            'photo' =>  $request->photo ? $request->photo->store('users') : null,
            'password' => Hash::make($request['password']),
        ]);
        

        return Response::json(array(
            'user' => $user,
            "success" => 1,
            "state" => 1,
        ));
    }





}
