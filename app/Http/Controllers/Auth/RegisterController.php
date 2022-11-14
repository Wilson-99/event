<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $input
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $input)
    {
        return Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:50', 'unique:users'],
            'password' => ['required', 'string', 'min:3', 'confirmed'],
            'phone' => ['required', 'string', 'max:15', 'min:9'],
            'city' => ['required', 'string', 'max:50'],
            'user_type' => ['required', 'string', 'max:15'],

        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    protected function create(array $input)
    {
        return User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            'city' => $input['city'],
            'phone' => $input['phone'],
            'user_type' => $input['user_type'],
            'photo' => $input['photo']
        ]);
    }
}
