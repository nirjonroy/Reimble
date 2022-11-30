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
}
