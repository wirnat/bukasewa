<?php

namespace App\Http\Controllers\Auth;

use App\Pelanggan;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/vendor';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    /**
     * Obtain the user information from facebook.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback($provider)
    {
        $user = Socialite::driver($provider)->stateless()->user();
        $me=$this->findOrCreateUser($user, $provider);
        Auth::login($me,true);
        return redirect('/');
    }
    public function findOrCreateUser($user, $provider)
    {
        $authUser = Pelanggan::where("id",$user->id)->first();
        if ($authUser) {
            return $authUser;
        }
        else{
            Pelanggan::create(["id"=>$user->id,"nama"=>$user->name,"provider"=>$provider,"email"=>$user->email]);
            return $data;
        }
    }
}
