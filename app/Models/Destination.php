<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Destination extends Model
{
    public $timestamps = false;
    use HasFactory;
    public function excur1()
    {
        return $this->belongsTo(Excursion::class, 'id'); 
    }
   
}
 