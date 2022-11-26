<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\MailController;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

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
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            // 'fullName' => ['required', 'string', 'max:255'],
            'firstName' => ['required', 'string', 'max:255'],
            'userName' => ['required', 'string', 'max:255', 'unique:users'],
            'companyName' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required', 'string', 'max:255', 'unique:users'],
            'address' => ['required', 'string', 'max:255' ],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    // protected function create(array $data)
    // {
    //     return User::create([
    //         // 'fullName' => $data['fullName'],
    //         'firstName' => $data['firstName'],
    //         'userName' => $data['userName'],
    //         'middleName' => $data['middleName'],
    //         'surName' => $data['surName'],
    //         'companyName' => $data['companyName'],
    //         'companyTradeLicenceNo' => $data['companyTradeLicenceNo'],
    //         // 'companyLogo' => $data['companyLogo'],
    //         'country' => $data['country'],
    //         'divition' => $data['divition'],
    //         'distric' => $data['distric'],
    //         'subDistric' => $data['subDistric'],
    //         'address' => $data['address'],
    //         'email' => $data['email'],
    //         'phone' => $data['phone'],
    //         'type' => $data['type'],
    //         // 'status' => $data['status'],
    //         'password' => Hash::make($data['password']),
    //     ]);
    // }


    public function register(Request $request)
    {
        $user = new User();
        $user->fullName = $request->fullName;
        $user->firstName = $request->firstName;
        $user->userName = $request->userName;
        $user->middleName = $request->middleName;
        $user->surName = $request->surName;
        $user->companyName = $request->companyName;
        $user->companyTradeLicenceNo = $request->companyTradeLicenceNo;
        $user->companyLogo = $request->companyLogo;
        $user->country = $request->country;
        $user->divition = $request->divition;
        $user->distric = $request->distric;
        $user->subDistric = $request->subDistric;
        $user->address = $request->address;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->type = $request->type;
        $user->type = $request->type;
        $user->password = Hash::make($request->password);
        $user->verification_code = sha1(time());
        $user->save();

        if($user !== null){
            // Send Mail
            MailController::sendSignupEmail($user->firstName, $user->email, $user->verification_code);
            return redirect()->back()->with(session()->flash('alert-success', 'Your account has been created. Please check email for verification link.'));
            // show message
        }
        return redirect()->back()->with(session()->flash('alert-danger', 'Something went wrong!'));
        // show errorphp
    }

    public function verifyUser(Request $request){
        $verification_code = \Illuminate\Support\Facades\Request::get('code');
        $user = User::where(['verification_code' => $verification_code])->first();
        if($user != null){
            $user->is_verify = 1;
            $user->save();
            return redirect()->route('login')->with(session()->flash('alert-success', 'Your account is verified. Please login!'));
        }

        return redirect()->route('login')->with(session()->flash('alert-danger', 'Invalid verification code!'));
    }
}
