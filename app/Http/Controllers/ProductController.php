<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;

use function Termwind\renderUsing;

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

        public function checkout(Request $request)
        {
            $validated = $request->validate([
                'receipt' => 'required|image|max:2048',
            ]);
            $path = $request->file('receipt')->store('receipts', 'public');

            return 'uploaded successfully';
        }
}

