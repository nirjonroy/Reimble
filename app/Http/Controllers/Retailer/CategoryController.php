<?php

namespace App\Http\Controllers\Retailer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use Auth;
class CategoryController extends Controller
{
    public function index(Request $request, $id, $companyName)
    {
        return view('Retailer.Category');
    }
    public function show(Request $request)
    {
        $data = Category::orderBy('id', 'DESC')->where('userId', Auth::user()->id)->get();
        return response()->json($data);
    }
    public function store(Request $request)
    {
        $request->validate([
            'categoryName' => 'required',
        ]);
  
        
        $data = Category::insert([
            'userId' => $request->userId,
            'categoryName' => $request->categoryName,
            'CategoryDescription' => $request->CategoryDescription,
            
        ]);
        return response()->json($data);
    }
}
