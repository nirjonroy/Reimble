<?php

namespace App\Http\Controllers\Manufacturer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ManufacturerController extends Controller
{
    public function index()
    {
        
        return view('Manufacturer.index');
    }

    public function OpenAccount(Request $request, $id, $companyName)
        {
           return view('Manufacturer.Dashboard');
        }
}
