<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use App\Models\UserAttending;
use App\Models\UserDiscount;
use App\Models\UserBouns;
use App\Models\UserSalary;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Models\UserTask;
use App\Models\Setting;
use Notification;
use App\Models\UserAction;
use App\Models\Reservation;
use App\Models\Hotel;
use App\Models\Triptype;
use App\Models\Destination;
use App\Models\Excursion;
use App\Models\View;
use App\Models\Transportation;
use App\Models\Gateway;
use App\Models\Cashout;
use App\Models\Bank;
use App\Models\Comment;
use App\Models\Transfer;
use App\Models\Included;
use App\Models\Finance;
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
        $user = Auth::user();

        $hotel = Hotel::get();
        $triptype = Triptype::get();
        $view = View::get();
        $included = Included::get(); 
        $destinations = Destination::get();
        $excursion = Excursion::get(); 
        $transportation = Transportation::get(); 
        $gateway = Gateway::get(); 


        $user->unreadNotifications->markAsRead();
        return view('sales.index', compact('sales','hotel','triptype','view','included','destinations','excursion','transportation','gateway'));
    }


    public function reservations()
    {
        $reservations = Reservation::whereNotNull('res_agent_id')->get();
        return view('reservations.index', compact('reservations'));
    }

















    public function finance()
    {
        $finance = Finance::get();
        
        return view('finance.index', compact('finance'));
    }

    public function transfer()
    {
        $transfers = Transfer::get();
        
        return view('transfers.index', compact('transfers'));
    }

 
    public function management()
    {
        return view('management.index');
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
        
        $setting->commission1 = $request->com1;
        $setting->commission2 = $request->com2;
        $setting->commission3 = $request->com3;
        
        $setting->target1 = $request->tr1;
        $setting->target2 = $request->tr2;
        $setting->target3 = $request->tr3;
        
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

    public function approve_reservation(Request $request) {

        $res = Reservation::findOrFail($request->sale_id);
        $res->received_time  = \Carbon\Carbon::now();
        $res->res_agent_id  = Auth::user()->id;
        $res->save();

        return redirect()->route('reservations');
    }

    public function update_reservation(Request $request) {

        $res = Reservation::findOrFail($request->sale_id);
        $res->confirmation  = $request->confirmation;
      //  $res->res_comment  = $request->res_comment;
        $res->save();

        return redirect()->back();
    }
    public function update_rooms(Request $request) {

        $res = Reservation::findOrFail($request->sale_id);
        $res->chalet  = $request->chalet;
        $res->single  = $request->single;
        $res->double  = $request->double;
        $res->triple  = $request->triple;
        $res->save();

        return redirect()->back();
    }

    public function update_include(Request $request) {
        $res = Reservation::findOrFail($request->sale_id);
        $res->included_id  = $request->included_id;
        $res->save();

        return redirect()->back();
    }

    public function update_payment(Request $request) {
        $res = Reservation::findOrFail($request->sale_id);
        $res->payment_option_date  = $request->payment_option_date;
        $res->save();

        return redirect()->back();
    }

    public function add_to_finance(Request $request) {
        $check = Finance::where('res_id', $request->res_id)->first();

        if ($check)
        {

        }else
        {
            $finance = new Finance();

            $finance->agent_id  = $request->agent_id;
            $finance->hotel_id  = $request->hotel_id;
            $finance->client_name  = $request->client_name;
            $finance->days_nights  = $request->days_nights;
            $finance->checkin  = $request->checkin;
            $finance->transportation_id  = $request->transportation_id;
            $finance->excursion_id  = $request->excursion_id;
            $finance->cashin  = $request->cashin;
            $finance->cashout  = $request->cashout; 
            $finance->bank_id  = $request->bank_id;
            $finance->notes  = $request->notes;
            $finance->commission  = $request->cashin -  $request->cashout;
            $finance->res_id  = $request->res_id;
            $finance->save();

            $res = Reservation::findOrFail($request->res_id);
            $res->finance  = 1;
            $res->save();
        }
     

        return redirect()->back();
    }

    public function update_cashin(Request $request) {
        $res = Reservation::findOrFail($request->sale_id);
        $res->cashin  = $request->cashin;
        $res->cashin_photo = $request->cashin_photo ? $request->cashin_photo->store('cashin_photo') : $res->cashin_photo;
        $res->save();

        return redirect()->back();
    }
    public function update_cashout(Request $request) {
        $res = Reservation::findOrFail($request->sale_id);
        $res->cashout  = $request->cashout;
        $res->save();

        for ($count = 1; $count <= $request->count;$count++)
        {
            $check = Cashout::where('id', $request['cash_id_'.$count])->first();

            if ($check)
            {
                $cash = Cashout::findOrFail( $request['cash_id_'.$count]);
                $cash->price = $request['cashout_'.$count];
                $cash->name = $request['name_'.$count];
                $cash->photo = $request['photo_'.$count] ? $request['photo_'.$count]->store('cahsout_photo') : $cash->photo;
                $cash->save();
            }else
            {
                $cash = new Cashout();
                $cash->price = $request['cashout_'.$count];
                $cash->name = $request['name_'.$count];
                $cash->photo = $request['photo_'.$count] ? $request['photo_'.$count]->store('cahsout_photo') : null;
                $cash->res_id = $res->id;
                $cash->save();
            }

        }
        

        return redirect()->back();
    }

    public function update_bank(Request $request) {
        $res = Reservation::findOrFail($request->sale_id);
       

        for ($count = 1; $count <= $request->count;$count++)
        {
            $check = Bank::where('id', $request['bank_id_'.$count])->first();

            if ($check)
            {
                $bank = Bank::findOrFail( $request['bank_id_'.$count]);
                $bank->photo = $request['photo_'.$count] ? $request['photo_'.$count]->store('bank_photo') : $bank->photo;
                $bank->name = $request['name_'.$count];
                $bank->account = $request['account_'.$count];
                $bank->save();
            }else
            {
                $bank = new Bank();
                $bank->photo = $request['photo_'.$count] ? $request['photo_'.$count]->store('bank_photo') : null;
                $bank->name = $request['name_'.$count];
                $bank->account = $request['account_'.$count];
                $bank->res_id  = $res->id;
                $bank->save();
            }

        }
        

        return redirect()->back();
    }

    public function update_comment(Request $request) {
        $res = Reservation::findOrFail($request->sale_id);
 
        for ($count = 1; $count <= $request->count;$count++)
        {
            $check = Comment::where('id', $request['comment_id_'.$count])->first();

            if ($check)
            {
                $comment = Comment::findOrFail( $request['comment_id_'.$count]);
                $comment->price = $request['price_'.$count];
                $comment->comment = $request['comment_'.$count];
                $comment->save();
            }else
            {
                $comment = new Comment();
                $comment->price = $request['price_'.$count];
                $comment->comment = $request['comment_'.$count];
                $comment->res_id = $res->id;
                $comment->save();
            }

        }

        $total = null;
        $txt = null;
    foreach ($res->comments() as $key=> $comment)
         {
            $total = $total + $comment->price;
            if ($key+1 < count($res->comments()))
            {
             $txt .=  $comment->comment . ' + ';
            }
          else
          {
             $txt .=   $comment->comment;
          }
         }

    
        $all = $txt .  ' = ' . $total;
        

        return response()->json(['success'=>$all]);
    }

    public function add_to_transfer(Request $request) {
        // $check = Transfer::where('res_id', $request->res_id)->first();

        // if ($check)
        // {
        //     $transfer = Transfer::findOrFail($check->id);
        //     $transfer->photo = $request->photo ? $request->photo->store('transfer_photo') : $transfer->photo ;
        //     $transfer->save();
        // }else
        // {
            $transfer = new Transfer();
            $transfer->photo = $request->photo ? $request->photo->store('transfer_photo') : null;
            $transfer->res_id = $request->res_id;
            $transfer->save();
      //  }

        return redirect()->back();
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
    public function delete_task(Request $request)
    {
        UserTask::where('id',$request->modaledel_id)->delete();
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
            $salary->salary = $salary->salary+$request->commission;

            $salary->date = Carbon::now()->today();
            $salary->save();
        }else
        {
            $salary = new UserSalary();
            $salary->user_id = $request->user_id;
            $salary->status = 1;
            $salary->salary = $user->salary+$request->commission;
            $salary->date = Carbon::now()->today();
            $salary->save();
        }
        
        $arr_ids=explode(",",$request->commission_ids);
        //return $arr_ids;
        
        foreach($arr_ids as $arr_id){
            if($arr_id!=""){
                $finance = Finance::findOrFail($arr_id);
                $finance->withdraw=1;
                $finance->save();
                
            }
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

    public function update_user_bouns(Request $request)
    {
        $check_salary = UserSalary::where('user_id',$request->user_id)->whereNull('status')->first();
        $user = User::where('id',$request->user_id)->first();

        if ($check_salary)
        {
            $salary = UserSalary::findOrFail($check_salary->id);
            $salary->salary = $check_salary->salary + $request->bouns;
            $salary->save();

            $user_bouns = new UserBouns();
            $user_bouns->amount = $request->bouns;
            $user_bouns->comment = $request->comment;
            $user_bouns->user_id = $request->user_id;
            $user_bouns->salary_id = $check_salary->id;
            $user_bouns->save();
        }else
        {
            $salary = new UserSalary();
            $salary->salary = $user->salary + $request->bouns;
            $salary->user_id = $request->user_id;
            $salary->save();

            $user_bouns = new UserBouns();
            $user_bouns->amount = $request->bouns;
            $user_bouns->comment = $request->comment;
            $user_bouns->user_id = $request->user_id;
            $user_bouns->salary_id = $salary->id;
            $user_bouns->save();
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


//////////////////////////////////////////  MANAGEMENT  ////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


public function hotels()
{
    $hotels = Hotel::get();
    return view('hotels.index', compact('hotels'));
}
public function triptype()
{
    $triptypes = Triptype::get();
    return view('triptypes.index', compact('triptypes'));
}
public function views()
{
    $views = View::get();
    return view('views.index', compact('views'));
}
public function transportation()
{
    $transportations = Transportation::get();
    return view('transportations.index', compact('transportations'));
}
public function gateways()
{
    $gateways = Gateway::get();
    return view('gateways.index', compact('gateways'));
}
public function destinations()
{
    $destinations = Destination::get();
    return view('destinations.index', compact('destinations'));
}
public function excursions()
{
    $destinations = Destination::get();
    $excursions   = Excursion::get();
    return view('excursions.index', compact('excursions','destinations'));
}


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

public function inserthotel(Request $request)
{
    $hotel = new Hotel();
    $hotel->type = $request->hotel_name;
    $hotel->save();
    return redirect()->back();
}
public function edithotel(Request $request)
{
    $hotel = Hotel::findOrFail($request->hotel_id);
    $hotel->type = $request->hotel_name;
    $hotel->save();
    return redirect()->back();
}
public function deletehotel(Request $request)
{
    Hotel::where('id',$request->modaledel_id)->delete();
    return redirect()->back();
}

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function inserttriptype(Request $request)
    {
        $triptype = new Triptype();
        $triptype->type = $request->triptype_name;
        $triptype->save();
        return redirect()->back();
    }
    public function edittriptype(Request $request)
    {
        $triptype = Triptype::findOrFail($request->triptype_id);
        $triptype->type = $request->triptype_name;
        $triptype->save();
        return redirect()->back();
    }
    public function deletetriptype(Request $request)
    {
        Triptype::where('id',$request->modaledel_id)->delete();
        return redirect()->back();
    }

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function insertview(Request $request)
    {
        $view = new view();
        $view->view = $request->view_name;
        $view->save();
        return redirect()->back();
    }
    public function editview(Request $request)
    {
        $view = View::findOrFail($request->view_id);
        $view->view = $request->view_name;
        $view->save();
        return redirect()->back();
    }
    public function deleteview(Request $request)
    {
        View::where('id',$request->modaledel_id)->delete();
        return redirect()->back();
    }

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function inserttransportation(Request $request)
    {
        $transportation = new Transportation();
        $transportation->transportation = $request->transportation_name;
        $transportation->save();
        return redirect()->back();
    }
    public function edittransportation(Request $request)
    {
        $transportation = Transportation::findOrFail($request->transportation_id);
        $transportation->transportation = $request->transportation_name;
        $transportation->save();
        return redirect()->back();
    }
    public function deletetransportation(Request $request)
    {
        Transportation::where('id',$request->modaledel_id)->delete();
        return redirect()->back();
    }
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function insertgateway(Request $request)
    {
        $gateway = new Gateway();
        $gateway->gateway = $request->gateway_name;
        $gateway->save();
        return redirect()->back();
    }
    public function editgateway(Request $request)
    {
        $gateway = Gateway::findOrFail($request->gateway_id);
        $gateway->gateway = $request->gateway_name;
        $gateway->save();
        return redirect()->back();
    }
    public function deletegateway(Request $request)
    {
        Gateway::where('id',$request->modaledel_id)->delete();
        return redirect()->back();
    }
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

public function insertdestination(Request $request)
{
    $destination = new Destination();
    $destination->destination = $request->destination_name;
    $destination->save();
    return redirect()->back(); 
}
public function editdestination(Request $request)
{
    $destination = Destination::findOrFail($request->destination_id);
    $destination->destination = $request->destination_name;
    $destination->save();
    return redirect()->back();
}
public function deletedestination(Request $request) 
{
    Destination::where('id',$request->modaledel_id)->delete();
    return redirect()->back();
}

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

public function insertexcursion(Request $request)
{
    $excursion = new Excursion();
    $excursion->excursion = $request->excursion_name;
    $excursion->dest_id = $request->dest_id;
    $excursion->save();
    return redirect()->back(); 
}
public function editexcursion(Request $request)
{
    $excursion = Excursion::findOrFail($request->excursion_id);
    $excursion->excursion = $request->excursion_name;
    $excursion->dest_id = $request->dest_id;
    $excursion->save();
    return redirect()->back();
}
public function deleteexcursion(Request $request) 
{
    Excursion::where('id',$request->modaledel_id)->delete();
    return redirect()->back();
}
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////




public function getexcurr(Request $request)
{
    $excurr=Excursion::where('id',$request->id)->get();
    $opt='<option  value="">NO EXCURSIONS</option>';
    foreach ($excurr as $excur){
        $opt.='<option  value="'.$excur->id.'">'.$excur->excursion.'</option>';
    }
    return $opt;
}



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
    
    return redirect()->back();

}




public function send_email(Request $request) {


        $details = [
            'title' => $request->subject,
            'email' => $request->email,
            'body' =>  $request->message
        ];
        \Mail::to($request->email)->cc($request->cc)->send(new \App\Mail\ContactForm($details));

    return redirect()->back();

}




}
