<?php

namespace App\Http\Middleware;

use App\Models\Setting;
use Inertia\Middleware;
use Tighten\Ziggy\Ziggy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that is loaded on the first page visit.
     */
    protected $rootView = 'app';

    /**
     * Define the props that are shared by default.
     */
    public function share(Request $request): array
    {
        $user = $request->user();

        // ✅ Default avatar
        $avatar = $user && $user->avatar
            ? asset('uploads/users/' . $user->avatar)
            : '/assets/img/avatars/1.png';

        return array_merge(parent::share($request), [
            'auth' => [
                'user' => $user ? [
                    'id'          => $user->id,
                    'name'        => $user->name,
                    'email'       => $user->email,
                    'role'        => $user->role?->name,
                    'permissions' => $user->role?->permissions?->pluck('slug') ?? [],
                    'avatar'      => $user->avatar,
                    'image'       => $avatar,
                ] : null,
            ],
            'settings' => Setting::pluck('value', 'key'),

            'ziggy' => fn() => [
                ...(new Ziggy)->toArray(),
                'location' => $request->url(),
            ],
        ]);
    }
}
