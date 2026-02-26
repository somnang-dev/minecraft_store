<?php

namespace App\Http\Controllers;

use App\Jobs\SendReceipt;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Render product details
    public function showProductDetail($id)
    {
        $product = Product::findOrFail($id);
        $images = ProductImage::where('product_id', $id);

        return view('detail', ['product' => $product, 'images' => $images->get()]);
    }

    public function sendRequest(Request $request) {}

    public function checkout(Request $request)
    {
        $validated = $request->validate([
            'receipt' => 'required|image|max:2048',
        ]);
        $path = $request->file('receipt')->store('receipts', 'public');

        // dispath job send receipt to discord
        SendReceipt::dispatch($path, $request->in_game_name);
        return 'uploaded successfully';


    }
}
