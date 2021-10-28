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
use App\Models\Hotel;
use App\Models\Triptype;
use App\Models\Destination;
use App\Models\Excursion;
use App\Models\Gateway;
use App\Models\View;
use App\Models\Included;
use App\Models\Reservation;
use App\Models\Transportation;
use Response;
use Notification;
use App\Models\UserAttending;
use Carbon\Carbon;
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
    


    

    public function get_reservation_data()
    {
        $hotel = Hotel::get();
        $triptype = Triptype::get();
        $view = View::get();
        $included = Included::get(); 
        $destination = Destination::get();
        $excursion = Excursion::get(); 
        $transportation = Transportation::get(); 
        $gateway = Gateway::get(); 


        return Response::json(array(
            "triptype" => $triptype,
            "destinations" => $destination,
            "views" => $view ,
            "included" => $included,
            "excursion" => $excursion , 
            "transportation" => $transportation,
            "gateway" => $gateway,
        ));

    }


    public function send_mail(Request $request)
    { 

        $details = [
            'title' => $request->subject,
            'email' => $request->email,
            'body' =>  $request->message
        ];
        
        \Mail::to($request->email)->send(new \App\Mail\ContactForm($details));
         return  redirect()->back();
    }























    public function userlog(Request $request)
    {

        $check = UserAction::where('date_time',$request->date_time)->first();

        if (!$check)
        {
            $useraction = new UserAction();
            $useraction->user_id = $request->user_id;
            $useraction->action =$request->action;
            $useraction->date_time =$request->date_time;
            $useraction->page =$request->page;
            $useraction->save();

            return Response::json(array(
                'actions' =>  $useraction,
            ));
        }


            return Response::json(array(
                'actions' =>  'action recorded',
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





// /////////////////////////////////////////////  Manage From Mobile App  //////////////////////////////////

//     public function approve_reservation(Request $request) {

//         $res = Reservation::findOrFail($request->sale_id);
//         $res->received_time  = \Carbon\Carbon::now();
//         $res->res_agent_id  = $request->user_d;
//         $res->save();

//         return Response::json(array(
//             'res' => $res,
//             "success" => 1,
//             "state" => 1,
//         ));
//     }
//     public function update_reservation(Request $request) {

//         $res = Reservation::findOrFail($request->sale_id);
//         $res->confirmation  = $request->confirmation;
//         $res->save();

//         return Response::json(array(
//             'res' => $res,
//             "success" => 1,
//             "state" => 1,
//         ));
//     }
//     //////////////
//     public function update_rooms(Request $request) {

//         $res = Reservation::findOrFail($request->sale_id);
//         $res->chalet  = $request->chalet;
//         $res->single  = $request->single;
//         $res->double  = $request->double;
//         $res->triple  = $request->triple;
//         $res->save();

//         return Response::json(array(
//             'res' => $res,
//             "success" => 1,
//             "state" => 1,
//         ));
//     }
// ////////
// public function update_include(Request $request) {
//     $res = Reservation::findOrFail($request->sale_id);
//     $res->included_id  = $request->included_id;
//     $res->save();

//     return Response::json(array(
//         'res' => $res,
//         "success" => 1,
//         "state" => 1,
//     ));
// }
// ///////////
// public function update_payment(Request $request) {
//     $res = Reservation::findOrFail($request->sale_id);
//     $res->payment_option_date  = $request->payment_option_date;
//     $res->save();
//     return Response::json(array(
//         'res' => $res,
//         "success" => 1,
//         "state" => 1,
//     ));
// }
// ///////////////
// public function update_cashin(Request $request) {
//     $res = Reservation::findOrFail($request->sale_id);
//     $res->cashin  = $request->cashin;
//     $res->cashin_photo = $request->cashin_photo ? $request->cashin_photo->store('cashin_photo') : $res->cashin_photo;
//     $res->save();

//     return Response::json(array(
//         'res' => $res,
//         "success" => 1,
//         "state" => 1,
//     ));
// }
// public function update_cashout(Request $request) {
//     $res = Reservation::findOrFail($request->sale_id);
//     $res->cashout  = $request->cashout;
//     $res->save();

//     for ($count = 1; $count <= $request->count;$count++)
//     {
//         $check = Cashout::where('id', $request['cash_id_'.$count])->first();

//         if ($check)
//         {
//             $cash = Cashout::findOrFail( $request['cash_id_'.$count]);
//             $cash->price = $request['cashout_'.$count];
//             $cash->name = $request['name_'.$count];
//             $cash->save();
//         }else
//         {
//             $cash = new Cashout();
//             $cash->price = $request['cashout_'.$count];
//             $cash->name = $request['name_'.$count];
//             $cash->res_id = $res->id;
//             $cash->save();
//         }

//     }
    
//     return Response::json(array(
//         'res' => $res,
//         "success" => 1,
//         "state" => 1,
//     ));
// }
// ///////////////////

// public function update_bank(Request $request) {
//     $res = Reservation::findOrFail($request->sale_id);
   

//     for ($count = 1; $count <= $request->count;$count++)
//     {
//         $check = Bank::where('id', $request['bank_id_'.$count])->first();

//         if ($check)
//         {
//             $bank = Bank::findOrFail( $request['bank_id_'.$count]);
//             $bank->photo = $request['photo_'.$count] ? $request['photo_'.$count]->store('bank_photo') : $bank->photo;
//             $bank->name = $request['name_'.$count];
//             $bank->account = $request['account_'.$count];
//             $bank->save();
//         }else
//         {
//             $bank = new Bank();
//             $bank->photo = $request['photo_'.$count] ? $request['photo_'.$count]->store('bank_photo') : null;
//             $bank->name = $request['name_'.$count];
//             $bank->account = $request['account_'.$count];
//             $bank->res_id  = $res->id;
//             $bank->save();
//         }

//     }
    
//     return Response::json(array(
//         'res' => $res,
//         "success" => 1,
//         "state" => 1,
//     ));
// }
// //////////////////

// public function update_comment(Request $request) {
//     $res = Reservation::findOrFail($request->sale_id);

//     for ($count = 1; $count <= $request->count;$count++)
//     {
//         $check = Comment::where('id', $request['comment_id_'.$count])->first();

//         if ($check)
//         {
//             $comment = Comment::findOrFail( $request['comment_id_'.$count]);
//             $comment->price = $request['price_'.$count];
//             $comment->comment = $request['comment_'.$count];
//             $comment->save();
//         }else
//         {
//             $comment = new Comment();
//             $comment->price = $request['price_'.$count];
//             $comment->comment = $request['comment_'.$count];
//             $comment->res_id = $res->id;
//             $comment->save();
//         }

//     }

//     $total = null;
//     $txt = null;
// foreach ($res->comments() as $key=> $comment)
//      {
//         $total = $total + $comment->price;
//         if ($key+1 < count($res->comments()))
//         {
//          $txt .=  $comment->comment . ' + ';
//         }
//       else
//       {
//          $txt .=   $comment->comment;
//       }
//      }


//     $all = $txt .  ' = ' . $total;
    

//     return Response::json(array(
//         'comment' => $all,
//         "success" => 1,
//         "state" => 1,
//     ));
// }

// public function add_to_finance(Request $request) {
//     $check = Finance::where('res_id', $request->res_id)->first();

//     if ($check)
//     {

//     }else
//     {
//         $finance = new Finance();

//         $finance->agent_id  = $request->agent_id;
//         $finance->hotel_id  = $request->hotel_id;
//         $finance->client_name  = $request->client_name;
//         $finance->days_nights  = $request->days_nights;
//         $finance->checkin  = $request->checkin;
//         $finance->transportation_id  = $request->transportation_id;
//         $finance->excursion_id  = $request->excursion_id;
//         $finance->cashin  = $request->cashin;
//         $finance->cashout  = $request->cashout; 
//         $finance->bank_id  = $request->bank_id;
//         $finance->notes  = $request->notes;
//         $finance->commission  = $request->cashin -  $request->cashout;
//         $finance->res_id  = $request->res_id;
//         $finance->save();

//         $res = Reservation::findOrFail($request->res_id);
//         $res->finance  = 1;
//         $res->save();
//     }
 
//     return Response::json(array(
//         'res' => $res,
//         "success" => 1,
//         "state" => 1,
//     ));
// }












    public function request_hotel (Request $request) {

        $reservation = new Reservation();

        $reservation->hotel_name = $request->hotel_name;
        $reservation->triptype_id = $request->triptype_id;
        $reservation->destination_id = $request->destination_id;
        $reservation->view_id = $request->view_id;
        $reservation->included_id = $request->included_id;
        $reservation->sales_agent_id = $request->sales_agent_id;
        $reservation->res_agent_id = $request->res_agent_id;
        $reservation->clint_name = $request->clint_name;
        $reservation->phone_number = $request->phone_number;
        $reservation->adults = $request->adults; 
        $reservation->kids = $request->kids; 
        $reservation->kids_age = $request->kids_age;
        $reservation->days_night = $request->days_night;
        $reservation->month = $request->month;
        $reservation->checkin = $request->checkin;
        $reservation->checkout = $request->checkout;
        $reservation->transportations = $request->transportations;
        
        $reservation->excursion = $request->excursion;
        $reservation->gateway = $request->gateway;
        $reservation->salescomments = $request->salescomments;
        $reservation->received_time = $request->received_time;
        $reservation->response_time = \Carbon\Carbon::now();
        $reservation->avaliability = $request->avaliability;
        $reservation->confirmation = $request->confirmation;
        $reservation->res_comment = $request->res_comment;
        $reservation->chalet = $request->chalet;
        $reservation->single = $request->single;
        $reservation->double = $request->double;
        $reservation->triple = $request->triple;
        $reservation->kidscharge = $request->kidscharge;
        $reservation->save();

   

        if ($reservation)
        {
            $users = User::where('role', 1)->orWhere('role',2)->get();
  
            foreach ($users as $user)
            {
                $data = [
                    'title' => 'New Request',
                    'message' => 'New Request from salas Agent',
                    'type' => 2,
                    'user_id' => $user->id
                ];
                Notification::send($user, new \App\Notifications\RequestNotification($data));
            }

            event(new \App\Events\NewRequest('hello world',$data));
        }
        
        return Response::json(array(
            'request' => $request,
            "success" => 1,
            "state" => 1,
        ));

    }






    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    











}
