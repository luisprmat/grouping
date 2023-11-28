<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GroupByAggregateFunctionsController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $orders = Order::query();

        $value = $request->input('value');

        $orders = match ($value) {
            'avg' => $orders->select('user_id', DB::raw('avg(total) as value')),
            'min' => $orders->select('user_id', DB::raw('min(total) as value')),
            'max' => $orders->select('user_id', DB::raw('max(total) as value')),
            'count' => $orders->select('user_id', DB::raw('count(total) as value')),
            default => $orders->select('user_id', DB::raw('sum(total) as value')),
        };

        $orders = $orders->with('user:name,id')
            ->groupBy('user_id')
            ->get();

        return view('examples.groupByAggregateFunctions', [
            'orders' => $orders,
            'function' => str($value ?? 'sum')->upper(),
        ]);
    }
}
