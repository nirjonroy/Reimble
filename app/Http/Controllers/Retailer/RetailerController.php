<?php

namespace App\Http\Controllers\Retailer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RetailerController extends Controller
{
    //
    public function index()
    {
        return view('Retailer.index');
    }
    public function OpenAccount(Request $request, $id, $companyName)
    {
        return view('Retailer.Dashboard');
    }
}
