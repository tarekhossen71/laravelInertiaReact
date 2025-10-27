<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Gate;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        Gate::authorize('app.order.index');

        $orders = Order::with('items')->orderBy('id','desc')->paginate(10);

        return Inertia::render('Orders/Index', [
            'orders' => $orders,
            'pageTitle' => 'Orders'
        ]);
    }

    public function show($id)
    {
        Gate::authorize('app.order.view');
        $order = Order::with(['items.variant'])->findOrFail($id);

        return Inertia::render('Orders/Show', [
            'order' => $order,
            'pageTitle' => 'Order Details'
        ]);
    }

    public function updateStatus(Request $request, $id)
    {
        Gate::authorize('app.order.edit');
        $request->validate(['status' => 'required|in:Pending,Processing,Delivered,Cancelled']);

        $order = Order::findOrFail($id);
        $order->update(['status' => $request->status]);

        return back()->with('success', 'Order status updated.');
    }
}
