<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Order;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Gate;

class PaymentController extends Controller
{
    public function index()
    {
        Gate::authorize('app.payment.index');

        $payments = Payment::with('order')->orderBy('id', 'desc')->paginate(10);

        return Inertia::render('Payments/Index', [
            'payments' => $payments,
            'pageTitle' => 'Payments',
        ]);
    }

    public function show($id)
    {
        Gate::authorize('app.payment.view');

        $payment = Payment::with('order')->findOrFail($id);

        return Inertia::render('Payments/Show', [
            'payment' => $payment,
            'pageTitle' => 'Payment Details',
        ]);
    }

    public function store(Request $request)
    {
        Gate::authorize('app.payment.create');

        $validated = $request->validate([
            'order_id' => 'required|exists:orders,id',
            'amount' => 'required|numeric',
            'status' => 'required|in:Paid,Unpaid,Failed',
            'transaction_id' => 'nullable|string',
            'response_log' => 'nullable|array',
        ]);

        Payment::create($validated);

        return back()->with('success', 'Payment record created successfully.');
    }

    public function updateStatus(Request $request, $id)
    {
        Gate::authorize('app.payment.edit');

        $request->validate(['status' => 'required|in:Paid,Unpaid,Failed']);

        $payment = Payment::findOrFail($id);
        $payment->update([
            'status' => $request->status,
            'payment_date' => now(),
        ]);

        return back()->with('success', 'Payment status updated successfully.');
    }
}
