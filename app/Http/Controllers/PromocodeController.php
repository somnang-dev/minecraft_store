<?php

namespace App\Http\Controllers;

use App\Models\Promocode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;

class PromocodeController extends Controller
{

    // Check promocode is valid
    public function compare(Request $request)
    {
        $promo = Promocode::select('id', 'code', 'max_use')
            ->where('code', $request->code)
            ->first();

        if ($promo) {
            if (new Date($promo->expired_date) >= new Date()) return response()->json(['message' => 'code expired'], 404);
            if($promo->max_use < 1) return response()->json(['message' => 'code already used']);
            return response()->json([
                'message' => 'code founded',
                'data' => $promo
            ]);

        } else {
            return response()->json([
                'message' => 'promo not found'
            ],404);
        }
    }

    // use promocode when checkout
    public function apply(Request $request)
    {
        $promo = Promocode::select('id', 'code', 'max_use')
            ->where('code', $request->code)
            ->first();
        if ($promo) {
            if($promo->max_use < 1) return response()->json(['message' => 'code already used']);
            $promo->decrement('max_use');
            return response()->json([
                'message' => 'code founded',
                'data' => $promo
            ]);

        } else {
            return response()->json([
                'message' => 'promo not found'
            ],404);
        }
    }
}

