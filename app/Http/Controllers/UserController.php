<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use Illuminate\Support\Facades\File;


class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        return view('profile', array('user' => Auth::user()));
    }

    public function update(UserUpdateRequest $request, User $user){

            $user = Auth::user();

            if($request->hasFile('photo')){
                $destination = 'user_photos/'.$user->photo;
                if(File::exists($destination === 'default.jpg')){
                    $user->photo = "default.jpg";
                }else{
                    File::delete($destination);
                }
                $file = $request->file('photo');
                $extension = $file->getClientOriginalExtension();
                $filename = time().'.'.$extension;
                $file->move('user_photos/', $filename);
                $user->photo = $filename;
            }else{
                $user->photo = "default.jpg";
            }

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'city' => $request->city,
        ]);
        $user->save();
        return redirect('profile')->with('msg' ,'Updated successfuly!');
    }

    public function destroy(){
        $user = Auth::user();
        if($user->photo === 'default.jpg'){
            $user->delete();
        }else{
            File::delete('user_photos/'.$user->photo);
            $user->delete();
        }
        return redirect('home')->with('msg', 'User Deleted Successfuly!');
    }
}
