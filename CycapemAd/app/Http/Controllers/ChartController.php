<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Customer;
use App\Models\Order;
use Carbon\Carbon;

class ChartController extends Controller
{
    public function getUsersData()
    {
        $data = User::selectRaw('DAY(created_at) as day, COUNT(*) as count')
            ->whereMonth('created_at', Carbon::now()->month)
            ->whereYear('created_at', Carbon::now()->year)
            ->groupBy('day')
            ->get();

        $days = [];
        $counts = [];

        foreach ($data as $record) {
            $days[] = $record->day;
            $counts[] = $record->count;
        }

        return response()->json([
            'labels' => $days,
            'data' => $counts
        ]);
    }

    public function getCustomersData()
    {
        $data = Customer::selectRaw('DAY(created_at) as day, COUNT(*) as count')
            ->whereMonth('created_at', Carbon::now()->month)
            ->whereYear('created_at', Carbon::now()->year)
            ->groupBy('day')
            ->get();

        $days = [];
        $counts = [];

        foreach ($data as $record) {
            $days[] = $record->day;
            $counts[] = $record->count;
        }

        return response()->json([
            'labels' => $days,
            'data' => $counts
        ]);
    }

    public function getOrdersData()
    {
        $data = Order::selectRaw('DAY(created_at) as day, COUNT(*) as count')
            ->whereMonth('created_at', Carbon::now()->month)
            ->whereYear('created_at', Carbon::now()->year)
            ->groupBy('day')
            ->get();

        $days = [];
        $counts = [];

        foreach ($data as $record) {
            $days[] = $record->day;
            $counts[] = $record->count;
        }

        return response()->json([
            'labels' => $days,
            'data' => $counts
        ]);
    }
}
