<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;
use App\Models\Permission;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class PermissionMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::check()) {
            $permissions = Permission::all();
            foreach($permissions as $key => $permission){
                Gate::define($permission->slug,function(User $user) use ($permission) {
                    return $user->hasPermission($permission->slug);
                });
            }
        }

        return $next($request);
    }
}
