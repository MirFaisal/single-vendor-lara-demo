<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;





class CartController extends Controller
{
    //
    function index()
    {
        $carts = Cart::all();

        if (count($carts) > 0) {
            return view('cart', compact('carts'));
        }
        return redirect()->intended('/');

    }

    function store(Request $request)
    {
        $product_id = $request->input('product_id');
        $user_id = $request->input('user_id');

        $product = Product::find($product_id);
        if (!$product) {
            return response()->json(['error' => 'Product not found.'], 404);
        }

        // Get the authenticated user


        // Add the product to the user's cart
        $cartItem = new Cart();
        $cartItem->user_id = $user_id;
        $cartItem->product_id = $product->id;
        $cartItem->quantity = $request->quantity ?? 1;
        $cartItem->save();


        return response()->json(['success' => 'Product added to cart successfully.']);
    }
}