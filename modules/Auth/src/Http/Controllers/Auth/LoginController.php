<?php

// namespace App\Http\Controllers\Auth;
namespace modules\Auth\src\Http\Controllers\Auth;

use Hash;
//use App\Models\User;
use Modules\Auth\src\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
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
    protected $redirectTo = RouteServiceProvider::HOME;
    //protected $redirectTo = RouteServiceProvider::ADMIN;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {        
        return view('Auth::auth.login');
    }
    
    public function googleCallback()
    {
        $userGoogle = Socialite::driver('google')->user();        
        $user  = User::where('email', $userGoogle->getEmail())->first();
        if(!$user){                     
            $user = new User();
            $user->name = $userGoogle->getName();
            $user->email = $userGoogle->getEmail();
            $user->provider_id = $userGoogle->getId();
            $user->provider = 'google';
            $user->password = Hash::make(rand());
            $user->group_id = 1;
            $user->save();            
        }

        $userId = $user->id;
        //dd($userGoogle);
        Auth::loginUsingId($userId);
        return redirect($this->redirectTo);
    }

    public function facebookCallback()
    {
        $userFacebook = Socialite::driver('facebook')->user();
        $user  = User::where('email', $userFacebook->getEmail())->first();
        //dd($user);            
        if (!$user) {            
            $user = new User();
            $user->name = $userFacebook->getName();
            $user->email = $userFacebook->getEmail();
            $user->provider_id = $userFacebook->getId();
            $user->provider = 'facebook';
            $user->password = Hash::make(rand());
            $user->group_id = 1;
            $user->save();
        }
        $userId = $user->id;
        Auth::loginUsingId($userId);
        return redirect($this->redirectTo);
    }
}
