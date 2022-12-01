<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserStoreRequest;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        return view('profile', ['title' => 'profile']);
    }

    public function show(){
        $user = User::all();
        return view('users.index', ['title' => 'users' ,'user' => 'users', 'users' => $user]);
    }

    public function create(){
        $user = Auth::user();
        return view('users.create', ['title'=>'create','user' => 'users', 'users' => $user]);
    }

    public function edit($id){
        $user = auth()->user();
        $user = User::findOrFail($id);
        return view('users.edit', ['title'=>'edit', 'user' => $user]);
    }

    public function store(UserStoreRequest $request){
        $user = Auth::user();

        $user = new User;
        $user -> name = $request->name;
        $user -> email = $request->email;
        $user -> phone = $request->phone;
        $user -> city = $request->city;
        $user -> password = Hash::make($request->password);
        $user -> user_type = $request->user_type;
        $user -> photo = $request->photo;

        $user->save();
        return view('home')->with('msg', 'User created successfuly!');
    }

    public function update(UserUpdateRequest $request){

            $user = Auth::user();

            if($request->hasFile('photo')){
                $file = $request->file('photo');
                $extension = $file->getClientOriginalExtension();
                $filename = time().'.'.$extension;
                $file->move('user_photos/', $filename);
            }

        $user->update
            ([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'city' => $request->city,
                'password' => (empty($request->password)) ? $user->password : Hash::make($request->password),
                'photo' =>  isset($filename) ?  $filename : $user->photo
            ]);
        $user->save();
        return redirect('profile')->with('msg' ,'Updated successfuly!');
    }

    public function update1(User $user, UserUpdateRequest $request){

       $user->update
        ([
        'name' => $request->name,
        'email' => $request->email,
        'phone' => $request->phone,
        'city' => $request->city,
        'user_type' => (empty($request->user_type)) ? $user->user_type : $user->user_type
        ]);
        $user->save();
        return view('home')->with('msg', 'Updated Successfuly!');
    }

    public function destroy($id){
        $user = User::findOrFail($id);
        if($user->photo === 'default.jpg'){
            $user->delete();
        }else{
            File::delete('user_photos/'.$user->photo);
            $user->delete();
        }
        return redirect('home')->with('msg', 'User Deleted Successfuly!');
    }
}
