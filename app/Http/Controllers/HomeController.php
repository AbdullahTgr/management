<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserTask;

class HomeController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = User::where('status',1)->count();
        $completed_tasks = UserTask::where('status',4)->count();
        $incomplete_tasks = UserTask::where('status',0)->count();
        $tasks = UserTask::count();

        return view('home',compact('users','completed_tasks','incomplete_tasks','tasks'));
    }
}










