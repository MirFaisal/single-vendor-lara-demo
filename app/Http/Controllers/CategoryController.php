<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    function index()
    {
        return view('add-category');
    }

    function store(Request $request)
    {
        $request->validate([
            'category_name' => 'required'
        ]);

        // dd($request->category_name);

        $category = new Category();
        $category->category_name = $request->category_name;
        $category->save();

        return redirect()->back();
    }

}