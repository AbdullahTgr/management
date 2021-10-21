<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
        return $this::whereMonth('created_at', DB::row('between(1,12)'))->whereYear('created_at', \Carbon\Carbon::now()->year)->orderBy('id','DESC')->get();
    }
}
