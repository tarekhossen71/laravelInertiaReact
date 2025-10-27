<?php

namespace App\Http\Controllers;

use App\Models\Delivery;
use App\Models\Order;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Gate;

class DeliveryController extends Controller
{
    public function index()
    {
        Gate::authorize('app.delivery.index');

        $deliveries = Delivery::with('order')->orderBy('id','desc')->paginate(10);

        return Inertia::render('Deliveries/Index', [
            'deliveries' => $deliveries,
            'pageTitle' => 'Deliveries'
        ]);
    }

    public function show($id)
    {
        Gate::authorize('app.delivery.view');

        $delivery = Delivery::with('order')->findOrFail($id);

        return Inertia::render('Deliveries/Show', [
            'delivery' => $delivery,
            'pageTitle' => 'Delivery Details'
        ]);
    }

    public function updateStatus(Request $request, $id)
    {
        Gate::authorize('app.delivery.edit');

        $request->validate(['delivery_status' => 'required|in:Pending,Shipped,Delivered,Returned']);

        $delivery = Delivery::findOrFail($id);
        $delivery->update(['delivery_status' => $request->delivery_status]);

        return back()->with('success', 'Delivery status updated.');
    }
}
