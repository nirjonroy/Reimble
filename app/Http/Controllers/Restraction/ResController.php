<?php

namespace App\Http\Controllers\Restraction;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ResController extends Controller
{
    public function forbi()
    {
        return view('no-access.403');
    }
    public function notfnd()
    {
        return view('no-access.404');
    }
}
