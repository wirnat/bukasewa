<?php
namespace App\Http\Controllers\Auth;
use App\User;
use App\Pelanggan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;
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
        return Redirect::back()->with('message','Terimakasih, kamu sudah menjadi bagian dari kami.')->with("message-tiny","silahkan lihat dan hubungi penyedia hunian yang kamu inginkan");
    }

    public function loginGoogle(Request $r)
    {
        $authUser = User::where("email",$r->email)->first();
        if ($authUser) {
            Auth::login($authUser,true);
        }
        else{
            $data=User::create([
                "name"=>$r->name,
                "provider"=>"google",
                "email"=>$r->email,
                "id_provider"=>$r->id,
                "tipeakun"=>"customer",
                "img"=>$r->img,
                ]);
            Auth::login($data,true);
        }
        return response()->json("Login sukses, Halo ".$r->name);
    }

    public function findOrCreateUser($user, $provider)
    {
        $authUser = User::where("email",$user->email)->first();
        if ($authUser) {
            return $authUser;
        }
        else{
            $fileContents = file_get_contents($user->getAvatar());
            $link='/img/avatar/' . $user->getId().'.jpg';
            File::put(public_path().'/'.$link, $fileContents);

            $data=User::create([
                "id"=>$user->id,
                "name"=>$user->name,
                "provider"=>$provider,
                "email"=>$user->email,
                "id_provider"=>$user->id,
                "tipeakun"=>"customer",
                "img"=>$link,
                ]);
            return $data;
        }
    }
}