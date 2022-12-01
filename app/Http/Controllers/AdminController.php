<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Task;
use App\Models\User;
use App\Http\Requests\TaskStoreRequest;
use App\Http\Requests\TaskUpdateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $user = User::all();
        $event = Event::all();
        $task = Task::latest()->get();
        $task = Task::paginate(3);
        return view('admin.dashboard', ['title' => 'dashboard', 'users' => $user, 'events' => $event, 'tasks' => $task]);
    }

    public function create(){
        return view('admin.create', ['title' => 'create']);
    }

    public function store(TaskStoreRequest $request){
        $task = Auth::user();

        $task = New Task;
        $task -> title=$request->title;
        $task -> subject=$request->subject;
        $task ->save();
        return view('home')->with('msg', 'Task created successfuly!');
    }

    public function edit($id){
        $task = Task::findOrFail($id);
        return view('admin.edit', ['title' => 'edit', 'task' => $task]);
    }

    public function update(TaskUpdateRequest $request, Task $task){
        $task->update([
            'title' => $request->title,
            'subject' => $request->subject
        ]);
        $task->save();
        return view('home')->with('msg', 'Updated Successfuly');
    }

    public function destroy($id){
        $task = Task::findOrFail($id);
        $task->delete();
        return view('home')->with('msg', 'Deleted!');
    }
}
