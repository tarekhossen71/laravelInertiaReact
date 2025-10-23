<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Laravel\Cashier\Subscription;
use App\Models\Plan;

class SubscriptionController extends Controller
{
    public function index()
    {
        $subscriptions = auth()->user()->subscriptions()->with('user')->get();
        return Inertia::render('Subscriptions/Index', [
            'subscriptions' => $subscriptions,
            'pageTitle' => 'My Subscriptions'
        ]);
    }

    public function create()
    {
        $plans = Plan::all();
        return Inertia::render('Subscriptions/Create', [
            'plans' => $plans,
            'pageTitle' => 'Choose Subscription Plan'
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'plan_id' => 'required|exists:plans,id'
        ]);

        $plan = Plan::findOrFail($request->plan_id);

        $user = $request->user();

        $user->newSubscription('default', $plan->stripe_price_id)
            ->create($request->payment_method); // Stripe payment method ID from frontend

        return redirect()->route('app.subscription.index')->with('success', 'Subscribed successfully');
    }
}
