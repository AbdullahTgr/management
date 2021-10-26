<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'first_name',
        'last_name',
        'phone',
        'job_title',
        'job_description',
        'salary',
        'role',
        'status',
        'last_seen',
        'id_photo',
        'photo',
        'email',
        'password',
    ]; 

    public function incomplete_tasks()
    {
        return UserTask::where('user_id',$this->id)->where('status',0)->get();
    }
 
    public function tasks()
    {
        return UserTask::where('user_id',$this->id)->where('status',4)->get();
    }

    public function attends()
    {
        return UserAttending::where('user_id',$this->id)->get();
    }

    public function hourly_rate()
    {
        $rate = ($this->salary / 30 ) / 24;

        return $rate ? round($rate,2) : 0;
    }

    public function task_rate()
    {
         $setting = Setting::first();
         if ($setting)
         {
            $total_rate = $setting->complete_rate;
         }else
         {
             $total_rate = 11;
         }
        $total_rate =  $total_rate ? $total_rate : 100;

         $task_rate = UserTask::where('user_id',$this->id)
                       ->where('status',4)->groupBy('user_id')
                       ->selectRaw('sum(points) as rate')
                       ->first();

       return $task_rate  ? round( $task_rate->rate  / $total_rate * 100,2) : 0;
    }


    public function salary()
    {
       $salary =  UserSalary::where('user_id',$this->id)->whereNull('status')->first();

       return $salary ? $salary->salary : $this->salary;
    }

    public function salaries()
    {
       $salary =  UserSalary::where('user_id',$this->id)->orderBy('id','DESC')->get();

       return $salary ? $salary : null;
    }

    public function discounts()
    {
       $discount =  UserDiscount::where('user_id',$this->id)->orderBy('id','DESC')->get();

       return $discount ? $discount : null;
    }

    public function bouns()
    {
       $bouns =  UserBouns::where('user_id',$this->id)->orderBy('id','DESC')->get();

       return $bouns ? $bouns : null;
    }

    public function finance()
    {
       $finance =  Finance::where('agent_id',$this->id)->where('withdraw',NULL)->orderBy('id','DESC')->get();
       return $finance ;
    }

    public function settings()
    {
        $setting = Setting::first();
        return $setting ;
    }

    public function month_discounts()
    {
       $discount =  UserDiscount::where('user_id',$this->id)->whereMonth('created_at', \Carbon\Carbon::now()->month)->whereYear('created_at', \Carbon\Carbon::now()->year)->orderBy('id','DESC')->get();

       return $discount ? $discount : null;
    }
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
