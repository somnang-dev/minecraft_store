<?php

namespace App\Http\Controllers;

use App\Models\RequestApproved;
use App\Models\Request as RE;
use App\Models\RequestHistory;
use Illuminate\Http\Request;
use PHPUnit\Framework\MockObject\Stub\ReturnReference;

class RequestController extends Controller
{

    // Approve & Reject purchase request
    public function processPurchaseRequest(Request $request)
    {
        $data = RE::find($request->id);
        RequestHistory::insert([
            'name' => $data['user_name'],
            'item' => $data['product_name'],
            'amount' => $data['price'],
            'is_approved' => $request->isApproved ,
            'staff' => $request->staff,
        ]);
        RE::destroy($request->id);
        return response()->json([
            'message' => "updated details"
        ]);
    }
}
