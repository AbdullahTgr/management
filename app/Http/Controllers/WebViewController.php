<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use App\Models\UserAttending;
use App\Models\UserDiscount;
use App\Models\Transfer;
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
use App\Models\Included;
use App\Models\Finance;
use App\Notifications\MessageNotification;


class WebViewController extends Controller
{
    
    public function sales($user)
    {
        if (!isset($_GET['key']))
        {
            return 'Unauthorized Access!';
        }
        if (isset($_GET['key']) && $_GET['key'] != 'LIZefNAEYFEsrr6w7fmVF34qJnP841qqLz5YE9qWMwbhutlEr2nq0CrsdC75ao7Q')
        {
            return 'Unauthorized Access!';
        }
        $sales = Reservation::get();
        $user = User::where('id',$user)->first();

        $hotel = Hotel::get();
        $triptype = Triptype::get();
        $view = View::get();
        $included = Included::get(); 
        $destination = Destination::get();
        $excursion = Excursion::get(); 
        $transportation = Transportation::get(); 
        $gateway = Gateway::get(); 
        $api = true;

        $user->unreadNotifications->markAsRead();
        return view('sales.index', compact('sales','hotel','triptype','view','included','destination','excursion','transportation','gateway','api','user'));
    }

    public function approve_reservation(Request $request, $user) {

        $res = Reservation::findOrFail($request->sale_id);
        $res->received_time  = \Carbon\Carbon::now();
        $res->res_agent_id  = $user;
        $res->save();

        return redirect()->route('reservations_api',$user . '?key=LIZefNAEYFEsrr6w7fmVF34qJnP841qqLz5YE9qWMwbhutlEr2nq0CrsdC75ao7Q');
    }

    public function reservations()
    {
        if (!isset($_GET['key']))
        {
            return 'Unauthorized Access!';
        }
        if (isset($_GET['key']) && $_GET['key'] != 'LIZefNAEYFEsrr6w7fmVF34qJnP841qqLz5YE9qWMwbhutlEr2nq0CrsdC75ao7Q')
        {
            return 'Unauthorized Access!';
        }
        $reservations = Reservation::whereNotNull('res_agent_id')->get();
        $api = true;
        return view('reservations.index', compact('reservations','api'));
    }

    public function transfer()
    {
        if (!isset($_GET['key']))
        {
            return 'Unauthorized Access!';
        }
        if (isset($_GET['key']) && $_GET['key'] != 'LIZefNAEYFEsrr6w7fmVF34qJnP841qqLz5YE9qWMwbhutlEr2nq0CrsdC75ao7Q')
        {
            return 'Unauthorized Access!';
        }

        $transfers = Transfer::get();
        $api = true;

        return view('transfers.index', compact('transfers','api'));
    }

    public function finance()
    {
        if (!isset($_GET['key']))
        {
            return 'Unauthorized Access!';
        }
        
        if (isset($_GET['key']) && $_GET['key'] != 'LIZefNAEYFEsrr6w7fmVF34qJnP841qqLz5YE9qWMwbhutlEr2nq0CrsdC75ao7Q')
        {
            return 'Unauthorized Access!';
        }
        
        $finance = Finance::get();
        $api = true;
        return view('finance.index', compact('finance','api'));
    }

    public function add_to_transfer(Request $request) {
 
            $transfer = new Transfer();
            $transfer->photo = $request->photo ? $request->photo->store('transfer_photo') : null;
            $transfer->res_id = $request->res_id;
            $transfer->save();
 
  

        return redirect()->back();
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

        }
        else
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

}
