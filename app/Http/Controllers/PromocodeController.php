<?php

namespace App\Http\Controllers;

use App\Models\Promocode;
use Illuminate\Http\Request;

class PromocodeController extends Controller
{
    public function compare(Request $request) 
    {
        $promo = Promocode::where('code', $request->code);
        if (count($promo->get())) {
            return response()->json([
                'message' => 'code founded',
                'data' => $promo->get()->first()
            ]); 
        } else {
            return response()->json([
                'message' => 'promo not found'
            ],404);
        }
    }
}
