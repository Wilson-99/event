<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $search = request('search');

        if($search){
            $events = Event::where([
                ['title','like','%'.$search.'%']
            ])->get();
        }else{
            $events = Event::all();
        }

        return view('home', ['events'=>$events,'search'=>$search]);
    }

    public function painel(){
        $user = auth()->user();
        $eventAsParticipant = $user->eventAsParticipant;
        return view('users.painel', ['eventAsParticipant' => $eventAsParticipant]);
    }

}
