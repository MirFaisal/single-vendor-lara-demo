<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'product_id',
        'quantity',
    ];

    function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
    function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    function getproductImage($id)
    {
        $product = Product::where('id', $id)->first();
        return $product->thumbnail;
    }
    function getproductTitle($id)
    {
        $product = Product::where('id', $id)->first();
        return substr($product->title, 0, 20);
    }
    function getproductPrice($id)
    {
        $product = Product::where('id', $id)->first();
        return $product->retail_price;
    }

    function getAllProductPrice()
    {
        $cartItems = Cart::all();
        $totalPrice = 0;
        // dd($totalPrice);
        foreach ($cartItems as $item) {
            $totalPrice = $totalPrice + $item->getproductPrice($item->product_id);
        }

        return $totalPrice;
    }
    function getDiscountPrice()
    {
        $cartItems = Cart::all();
        $totalPrice = 0;
        // dd($totalPrice);
        foreach ($cartItems as $item) {
            $totalPrice = $totalPrice + $item->getproductPrice($item->product_id) * 0.020;
        }

        return $totalPrice;
    }
    function getVAT()
    {
        $cartItems = Cart::all();
        $totalPrice = 0;
        // dd($totalPrice);
        foreach ($cartItems as $item) {
            $totalPrice = $totalPrice + $item->getproductPrice($item->product_id) * 0.010;
        }

        return $totalPrice;
    }

    function getTotalPrice()
    {
        $allProductPrice = $this->getAllProductPrice();
        $giscount = $this->getDiscountPrice();
        $vat = $this->getVAT();
        $totalPrice = $allProductPrice - ($giscount + $vat);
        return $totalPrice;
    }
    
}