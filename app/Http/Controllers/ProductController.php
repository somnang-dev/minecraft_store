<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Request;

class ProductController extends Controller
{

    // Render product details
     public function showProductDetail($id)
    {
        $product = Product::findOrFail($id);
        $images = ProductImage::where('product_id', $id);
        return view('detail', ['product' => $product, 'images' => $images->get()]);
    }

    public function sendRequest(Request $request)
    {
        
    }
}

