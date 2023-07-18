<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;



class ProductController extends Controller
{
    //
    function index()
    {
        $categories = Category::all();
        $brands = Brand::all();
        return view('add-product', compact(['categories', 'brands']));
    }

    function store(Request $request)
    {
        $all = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'category' => 'required',
            'brand' => 'required',
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'purchase_price' => 'required',
            'retail_price' => 'required',
            'stock' => 'required',
        ]);

        $imageName = '';
        if ($thumbnail = $request->file('thumbnail')) {
            $imageName = time() . '_' . uniqid() . '.' . $thumbnail->getClientOriginalExtension();
            $thumbnail->move('thumbnail/images', $imageName);
        }

        $product = new Product();
        $product->title = $request->title;
        $product->description = $request->description;
        $product->category = $request->category;
        $product->brand = $request->brand;
        $product->thumbnail = $imageName;
        $product->purchase_price = $request->purchase_price;
        $product->retail_price = $request->retail_price;
        $product->stock = $request->stock;
        $product->save();

        return redirect()->route('dashboard');
    }
}