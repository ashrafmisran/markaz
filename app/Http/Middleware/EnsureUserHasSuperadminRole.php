<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class EnsureUserHasSuperadminRole
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {
        $user = $request->user();

        if (! $user) {
            return response()->view('errors.403', [], 403);
        }

        // Fast path: allow by email
        if ($user->email === 'superadmin@example.com') {
            return $next($request);
        }

        // Prefer Spatie role check (team-aware)
        if ($user->hasRole('superadmin')) {
            return $next($request);
        }

        // Fallback: check model_has_roles pivot for any team
        $role = Role::where('name', 'superadmin')->first();
        if ($role) {
            $exists = DB::table(config('permission.table_names.model_has_roles'))
                ->where('model_type', get_class($user))
                ->where('model_id', $user->getKey())
                ->where('role_id', $role->getKey())
                ->exists();

            if ($exists) {
                return $next($request);
            }
        }

        return response()->view('errors.403', [], 403);
    }
}
