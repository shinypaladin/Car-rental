<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\PageVisit;

class TrackVisits
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->isMethod('GET') && !$request->expectsJson() && !$request->is('*/admin*') && !$request->is('admin*')) {
            try {
                // Log the page visit
                PageVisit::create([
                    'ip_address' => $request->ip(),
                    'session_id' => $request->session() ? $request->session()->getId() : null,
                    'visited_at' => now(),
                ]);
            } catch (\Exception $e) {
                // Fail silently during install-db or boot
            }
        }

        return $next($request);
    }
}
