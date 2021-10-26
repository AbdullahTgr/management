<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transfer extends Model
{
    use HasFactory;

    public function res() 
    {
        return $this->belongsTo(Reservation::class, 'res_id');
    }
}
