<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class GroupByController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $orders = Order::query()
            ->select('user_id')
            ->with('user:name,id')
            ->groupBy('user_id')
            ->get();

        return view('examples.groupBy', [
            'orders' => $orders,
        ]);
    }
}
