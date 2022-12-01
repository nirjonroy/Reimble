<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
class DashboardController extends Controller
{
    public function index()
    {
        return view('Backend.index');
    }
    public function users()
    {
        $users = User::all();
        return view('Backend.user_information', compact('users'));
    }
    public function users_view(Request $request, $id)
    {
        $user = User::where('id', $id)->first();
        // dd($user);
        return view('Backend.user_view', compact('user'));
    }

    public function Update_user_role(Request $request, $id)
    {
        $user = User::where('id', $id)->first();
        return view('Backend.user_update_role', compact('user'));
    }
    public function Update_user_role_updated(Request $request, $id)
    {
        $data = array();
        $data['role'] = $request->role;
        User::where('id', $id)->update($data);
        return back()->with("data-updated", "Data Updated Successfully");
    }
}
