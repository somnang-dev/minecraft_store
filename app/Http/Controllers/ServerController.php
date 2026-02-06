<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ServerList;
use Illuminate\Http\Request;

class ServerController extends Controller
{
    public function show($id)
    {
        $server = ServerList::findOrFail($id);
        $products = Product::whereRaw('server_id = ? and category_id = ?', [$id, 1]);
        $pets = Product::whereRaw('server_id = ? and category_id = ?', [$id, 2]);
        $ranks = Product::whereRaw('server_id = ? and category_id = ?', [$id, 3]);
        $categoeis = Category::all();
        return view('server', ['server' => $server, 'crate_keys' => $products->get(), 'pets' => $pets->get(), 'ranks' => $ranks->get( )]);
    }

}

