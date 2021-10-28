<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Finance extends Model
{
    use HasFactory;

    public function agent()
    {
        return $this->belongsTo(User::class, 'agent_id');
    }

    public function transport()
    {
        return $this->belongsTo(Transportation::class, 'transportation_id');
    }

    public function exc()
    {
        return $this->belongsTo(Excursion::class, 'excursion_id');
    }

    public function hotel() 
    {
        return $this->belongsTo(Hotel::class, 'hotel_id');
    }

    public function res() 
    {
         $res = Reservation::where('id', $this->res_id)->first();

          return $res->clint_name;
    }
    
    public function hotel_name() 
    {
        $res = Reservation::where('id', $this->res_id)->first();

        return $res->hotel_name;
    }
    public function banks()
    {
        return Bank::where('res_id', $this->res_id)->get();
    }

    public function cashouts()
    {
        return Cashout::where('res_id', $this->res_id)->get();
    }

    public function months()
    {
        $months = [];

        for ($m = 1; $m <=12;$m++)
        {
          $months [$m]  =   $this::whereMonth('created_at', $m)->whereYear('created_at', \Carbon\Carbon::now()->year)->orderBy('id','DESC')->get();
        }
        return $months;
    }
}
