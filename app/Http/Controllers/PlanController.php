<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use Inertia\Inertia;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    public function index()
    {
        $plans = Plan::orderBy('id','desc')->get();
        return Inertia::render('Plans/Index', [
            'plans' => $plans,
            'pageTitle' => 'Subscription Plans'
        ]);
    }

    public function create()
    {
        return Inertia::render('Plans/Create', [
            'pageTitle' => 'Create Plan'
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'stripe_price_id' => 'required',
            'price' => 'required|numeric',
            'interval' => 'required',
        ]);

        Plan::create($request->all());

        return redirect()->route('app.plan.index')->with('success', 'Plan created successfully');
    }

    public function edit(Plan $plan)
    {
        return Inertia::render('Plans/Edit', [
            'plan' => $plan,
            'pageTitle' => 'Edit Plan'
        ]);
    }

    public function update(Request $request, Plan $plan)
    {
        $request->validate([
            'name' => 'required',
            'stripe_price_id' => 'required',
            'price' => 'required|numeric',
            'interval' => 'required',
        ]);

        $plan->update($request->all());

        return redirect()->route('app.plan.index')->with('success', 'Plan updated successfully');
    }

    public function destroy(Plan $plan)
    {
        $plan->delete();
        return redirect()->route('app.plan.index')->with('success','Plan deleted successfully');
    }
}
