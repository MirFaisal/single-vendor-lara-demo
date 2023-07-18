<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;



class BrandController extends Controller
{
    //
    function index()
    {
        return view('add-brand');
    }

    function store(Request $request)
    {
        $request->validate([
            'brand_name' => 'required'
        ]);

        $brand = new Brand();
        $brand->brand_name = $request->brand_name;
        $brand->save();

        return redirect()->back();
    }

}