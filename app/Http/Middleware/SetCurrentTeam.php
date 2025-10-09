<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SetCurrentTeam
{
    public function handle(Request $request, Closure $next)
    {
        $team = $request->route('team');
        if ($team && $request->user()) {
            $user = $request->user();
            if (property_exists($user, 'current_team_id') && $user->current_team_id !== $team->id) {
                $user->current_team_id = $team->id;
                $user->save();
            }
        }

        return $next($request);
    }
}
