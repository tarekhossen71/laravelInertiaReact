<?php

namespace App\Http\Controllers;

use App\Models\AnalyticsEvent;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Gate;

class AnalyticsController extends Controller
{
    public function index()
    {
        Gate::authorize('app.analytics.index');

        $events = AnalyticsEvent::orderBy('id','desc')->paginate(20);

        return Inertia::render('Analytics/Index', [
            'events' => $events,
            'pageTitle' => 'Analytics Events',
        ]);
    }

    public function store(Request $request)
    {
        // This can be triggered from frontend JS events
        AnalyticsEvent::create([
            'event_name' => $request->event_name,
            'user_ip' => $request->ip(),
            'page_url' => $request->page_url,
            'session_id' => $request->session()->getId(),
            'extra_data' => $request->extra_data,
        ]);

        return response()->json(['status' => 'ok']);
    }
}
