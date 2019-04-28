<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\RegisterRequest;
use App\Traits\Admin\AdminRegistersUsers;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller {

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

    use AdminRegistersUsers;
    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/admin/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //TODO WARNING CHANGE THIS TO AUTH BEFORE LIVE VERSION!!!!!!
        //$this->middleware('auth'); //TODO UNCOMMENT IN LIVE VERSION!!
        $this->middleware('guest'); //TODO COMMENT OUT IN LIVE VERSION!!
    }

    public function register(RegisterRequest $request)
    {
        User::create($request->all());
        return redirect('/admin');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return $this->validator($data, [
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed']
            ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array $data
     * @return \App\User
     */
    protected function create($data)
    {
        //dd($data);
        return User::create(['email' => $data['email'], 'password' => Hash::make($data['password']),]);
    }
}
