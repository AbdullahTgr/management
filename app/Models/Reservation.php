<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    public function agent_sales()
    {
        return $this->belongsTo(User::class, 'sales_agent_id');
    }

    public function agent_res()
    {
        return $this->belongsTo(User::class, 'res_agent_id');
    }

    public function included()
    {
        return $this->belongsTo(Included::class, 'included_id');
    }

    public function transport()
    {
        return $this->belongsTo(Transportation::class, 'transportations');
    }

    public function exc()
    {
        return $this->belongsTo(Excursion::class, 'excursion');
    }

    public function gate()
    {
        return $this->belongsTo(Gateway::class, 'gateway');
    }

    public function cashouts()
    {
        return Cashout::where('res_id', $this->id)->get();
    }

    public function banks()
    {
        return Bank::where('res_id', $this->id)->get();
    }
    public function comments()
    {
        return Comment::where('res_id', $this->id)->get();
    }

    public function includes()
    {
        return Included::get();
    }

    public function hotel() 
    {
        return $this->belongsTo(Hotel::class, 'hotel_id');
    }

    public function trip()
    {
        return $this->belongsTo(Triptype::class, 'triptype_id');
    }
    public function destination()
    {
        return $this->belongsTo(Destination::class, 'destination_id');
    }
    public function view()
    {
        return $this->belongsTo(View::class, 'view_id');
    }

}


