<?php

namespace App\Http\Controllers;

use App\Models\Product;

class ProductController extends Controller
{
    
    public function index()
    {
        return Product::withSum('stockItems as total_stock', 'quantity')
            ->orderBy('name')
            ->get();
    }

    public function show(Product $product)
    {
        return $product->load('stockItems.location');
    }
}
