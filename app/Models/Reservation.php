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
        return $this->belongsTo(Destnation::class, 'destination_id');
    }
    public function view()
    {
        return $this->belongsTo(View::class, 'view_id');
    }

}


