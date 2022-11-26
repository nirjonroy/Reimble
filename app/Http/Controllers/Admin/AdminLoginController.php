<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admininfo;
use Auth;
use Session;
use Hash;
class AdminLoginController extends Controller
{
    public function index()
    {
        return view('AdminBackend.login');
    }
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        // if(Auth::attempt($request->only('email', 'password'))){
        //     return redirect('admin-dashboard');
        // }
        // return redirect('admin-login')->withError('Login Details Are Not Valid');

        $admin = Admininfo::where('email', '=', $request->email)->first();
        if($admin){
                if(Hash::check($request->password, $admin->password)){
                        $request->session()->put('id', $admin->id);
                        return redirect()->to('admin-dashboard');
                }
                else{
                    return redirect('forbidden');
                }
        }

        else{
            return redirect('forbidden');
        }

    }
    public function register_view()
    {
        return view('AdminBackend.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'email' => 'required|email|unique:admininfos',
            'username' => 'required|unique:admininfos',
            'mobile' => 'required|unique:admininfos',
            'password' => 'required',
            
        ]);
        // dd($request->all());
        Admininfo::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'username'=>$request->username,
            'mobile'=>$request->mobile,
            'password'=> Hash::make($request->password),
        ]);
        
        return redirect('admin-register');
    }
    public function home()
    {
        return "wel done";
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect('/');

    }
}
