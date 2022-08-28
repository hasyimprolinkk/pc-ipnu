<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Dusun;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Telegram;

use function App\Helpers\newRegister;

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

    public function showRegistrationForm()
    {
        $dusun =  Dusun::all();
        return view("auth.register", compact("dusun"));
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {

        return Validator::make($data, [
            'nik' => ['required', 'numeric', 'digits:16', 'unique:users'],
            'nama' => ['required', 'string', 'max:255'],
            'jk' => ['required'],
            'dusun' => ['required', 'numeric'],
            'no_hp' => ['required', 'numeric', 'digits_between:10,13', 'unique:users'],
            'username' => ['required', 'string', 'max:255', 'unique:users', 'alpha_dash'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        
        $user = User::create([
            'nik' => $data['nik'],
            'nama' => $data['nama'],
            'jk' => $data['jk'],
            'dusun_id' => $data['dusun'],
            'no_hp' => $data['no_hp'],
            'username' => $data['username'],
            'password' => Hash::make($data['password']),
        ]);

        // newRegister($user);

        return $user;
    }
}
