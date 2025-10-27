<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Variant;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class ReportController extends Controller
{
    public function index()
    {
        Gate::authorize('app.report.index');
        return Inertia::render('Reports/Index', ['pageTitle' => 'Reports']);
    }

    public function salesSummary(Request $request)
    {
        Gate::authorize('app.report.index');

        $range = $request->get('range', 'daily');

        $query = Order::select(
            DB::raw('DATE(created_at) as date'),
            DB::raw('SUM(total_amount) as total_sales'),
            DB::raw('COUNT(id) as total_orders')
        )->groupBy('date')->orderBy('date', 'desc');

        if ($range === 'weekly') {
            $query->whereBetween('created_at', [now()->subWeek(), now()]);
        } elseif ($range === 'monthly') {
            $query->whereBetween('created_at', [now()->subMonth(), now()]);
        }

        $report = $query->get();

        return response()->json($report);
    }

    public function topVariants()
    {
        Gate::authorize('app.report.index');

        $report = Variant::withCount('product')->orderByDesc('stock_qty')->take(10)->get();

        return response()->json($report);
    }
}
