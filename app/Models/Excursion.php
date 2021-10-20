<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Excursion extends Model
{
    public $timestamps = false;
    use HasFactory;

    public function excur()
    {
        return $this->belongsTo(Destination::class, 'dest_id');
    }
} 


