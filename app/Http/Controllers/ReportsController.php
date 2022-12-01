<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\User;
use Illuminate\Http\Request;

class ReportsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $event = Event::latest()->get();
        $user = User::latest()->get();
        return view('admin.reports', ['title' => 'reports', 'events' => $event, 'users' => $user]);
    }
}
