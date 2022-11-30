<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;
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

    public function redirectTo(){

       

        switch(Auth::user()->role){
            case 1:
                $this->redirectTo = '/admin-dashboard';
                return $this->redirectTo;
                break; 
            
            case 2:
                    $this->redirectTo = 'manufacturer-dashboard';
                    return $this->redirectTo;
                    break;     
            default:
                $this->redirectTo ='/';
                return $this->redirectTo;
                break;        
        }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function credentials(Request $request)
    {
        return array_merge($request->only($this->username(), 'password'), ['is_verify' => 1]);
    }
}
