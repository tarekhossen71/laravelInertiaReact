<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Inertia\Inertia;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Inertia::share([
            'flash' => function () {
                return [
                    'success' => session('success'),
                    'error' => session('error'),
                ];
            },
            'auth' => function () {
                $user = auth()->user();
                if (!$user) return null;

                return [
                    'id' => $user->id,
                    'name' => $user->name,
                    'email' => $user->email,
                    'role' => $user->role?->name,
                    'permissions' => $user->role?->permissions->pluck('slug') ?? [],
                    'avatar' => $user->avatar,
                ];
            },
        ]);
        Blade::if('permission', function ($permission){
            return Auth::user()->role->permissions->where('slug',$permission)->first() ? true : false;
        });
    }
}
