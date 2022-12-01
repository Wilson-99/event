<?php

namespace App\Http\Controllers;

use App\Http\Requests\EventStoreRequest;
use App\Http\Requests\EventUpdateRequest;
use App\Models\Event;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class EventsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $event = Event::all();
        return view('events.index', ['title' => 'events' ,'event' => 'events', 'events' => $event]);
    }

    public function create(){
        return view('events.create', ['title' => 'create']);
    }

    public function store(EventStoreRequest $request){

        $event = Auth::user();

        // Image upload
        $photo = $request->file('photo');
        $file = $photo->store('event_photos', 'public');

       $event = new Event;
       $event -> title=$request->title;
       $event -> photo=$file;
       $event -> description=$request->description;
       $event -> items=$request->items;
       $event -> date=$request->date;
       $event -> time=$request->time;
       $event -> city=$request->city;
       $event -> private=$request->private;

       $event -> save();
       return redirect('home')->with('msg', 'Event created successfuly!');
   }

   public function destroy($id){
    $event = Event::findOrFail($id);
    Storage::disk('public')->delete($event->photo);
    $event->delete();
    return redirect('home')->with('msg', 'Evento excluido com sucesso!');
}

public function edit($id){
    $user = auth()->user();
    $event = Event::findOrFail($id);
    return view('events.edit', ['tilte' => 'edit', 'event' => $event]);
}

public function update(EventUpdateRequest $request, $id){
    $user = auth()->user();
    $event = Event::findOrFail($id);

     //erase the oldest file when a new one has sent
   if($request->file('photo')){
    Storage::disk('public')->delete($event->photo);
   }

   if($request->file('photo')){
        Storage::disk('public')->delete($event->photo);

        $photo = $request->file('photo');
        $file = $photo->store('event_photos', 'public');
        $event -> photo = $file;
   }

    //fill event object with all datas UpdateEvent
    $event->update([
        'title' => $request->title,
        'description' => $request->description,
        'date' => $request->date,
        'time' => $request->time,
        'city' => $request->city,
        'private' => (empty($request->private) ? $event->private : $event->private)
    ]);

    $event->save();
    return redirect('home')->with('msg', 'Event updated successfuly!');
    }

    public function event($id){

        $event = Event::findOrfail($id);

        $user = auth()->user();
        $hasUserJoined = false;

        if($user){
            $userEvents = $user->eventAsParticipant->toArray();
            foreach($userEvents as $userEvent){
                if($userEvent['id']== $id){
                    $hasUserJoined = true;
                }
            }
        }

        return view('event', ['event' => $event,'hasUserJoined' => $hasUserJoined]);
    }

    public function joinEvent($id){
        $user = auth()->user();

        $user->eventAsParticipant()->attach($id);

        $event = Event::FindOrFail($id);

        return redirect('home')->with('msg', 'Confirmed presence in ' .$event->title.' event!');
    }

    public function leaveEvent($id){
        $user = auth()->user();

        $user->eventAsParticipant()->detach($id);

        $event = Event::findOrFail($id);

        return redirect('home')->with('msg', 'You removed your presence in ' .$event->title.' event!');
    }

    public function view($id){
        $user = User::findOrFail($id);
        $event = Event::findOrFail($id);
        $eventAsParticipant = $user->eventAsParticipant;
        return view('events.view', ['events' => $event, 'eventAsParticipants' => $eventAsParticipant]);
    }

}
