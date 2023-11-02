<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Carbon\Carbon; // Import Carbon

class LastActivityUser
{
    public function handle(Request $request, Closure $next): Response
    {
        if (! $request->user()) {
            return $next($request);
        }

        $lastActivity = $request->user()->last_activity;

        // Pastikan last_activity adalah timestamp
        if (is_string($lastActivity)) {
            $lastActivity = Carbon::parse($lastActivity);
        }

        if (! $lastActivity || $lastActivity->isPast()) {
            $request->user()->update([
                'last_activity' => now(),
            ]);
        }

        return $next($request);
    }
}
