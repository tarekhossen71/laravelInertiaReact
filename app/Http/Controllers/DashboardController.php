<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\Payment;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;
use Illuminate\Support\Facades\Gate;

class DashboardController extends Controller
{
    public function index()
    {
        Gate::authorize('app.dashboard.index');

        $totalOrders = Order::count();
        $totalRevenue = Payment::where('status', 'Paid')->sum('amount');
        $totalProducts = Product::count();
        $recentOrders = Order::latest()->take(5)->get(['id','customer_name','status','total_amount']);

        return Inertia::render('Dashboard/Index', [
            'pageTitle' => 'Admin Dashboard',
            'stats' => [
                'total_orders' => $totalOrders,
                'total_revenue' => $totalRevenue,
                'total_products' => $totalProducts,
            ],
            'recent_orders' => $recentOrders
        ]);
    }
}
