<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request){

        $output = "";

        $events = Event::where('title', 'Like', '%'.$request->search.'%')->orWhere('date', 'Like', '%'.$request->search.'%')->get();

        /*foreach($events as $event)
        {
            $output.=
            '<tr>
            <td></td>
            <td>'.'<img src="/storage/'.$event->photo.'" style="width:50px; height:35px; border-radius:20%;">'.'</td>
            <td>'.$event->title.'</td>
            <td>'.$event->city.'</td>
            <td>'.$event->date->format('d-m-Y').' '.$event->time.'</td>
            <td>'.'<a href="edit/'.$event->id.'" class="btn btn-info"><i class="fa-solid fa-user-pen"></i></a>
            <form action="delete/'.$event->id.'" method="POST">
            '.@csrf.'
            '.@method('DELETE').'
            <button type="submit" class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></button>
            </form>'.'</td>
            </tr>';
        }*/
        return response($events);
    }
}
