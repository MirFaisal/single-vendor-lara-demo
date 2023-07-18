<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'category',
        'brand',
        'thumbnail',
        'purchase_price',
        'retail_price',
        'stock',
        'status',
    ];

    function category()
    {
        return $this->belongsTo(Category::class, 'category');
    }
    function brand()
    {
        return $this->belongsTo(Brand::class, 'category');
    }
    


    function getCategoryName($id)
    {
        $category = Category::where('id', $id)->first();
        return $category->category_name;
    }
    function getBrandName($id)
    {
        $brand = Brand::where('id', $id)->first();
        return $brand->brand_name;
    }
}