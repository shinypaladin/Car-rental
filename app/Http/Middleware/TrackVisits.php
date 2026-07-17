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
                $ip = $request->ip();
                $country = 'Unknown';

                // Look up country if it's a real IP
                if ($ip && $ip !== '127.0.0.1' && $ip !== '::1') {
                    $ctx = stream_context_create(['http' => ['timeout' => 1.5]]);
                    $response = @file_get_contents("http://ip-api.com/json/{$ip}", false, $ctx);
                    if ($response) {
                        $data = json_decode($response, true);
                        if (isset($data['country'])) {
                            $country = $data['country'];
                        }
                    }
                } else {
                    $country = 'Morocco'; // Mock local testing as Morocco
                }

                // Log the page visit
                PageVisit::create([
                    'ip_address' => $ip,
                    'session_id' => $request->session() ? $request->session()->getId() : null,
                    'country' => $country,
                    'visited_at' => now(),
                ]);
            } catch (\Exception $e) {
                // Fail silently during install-db or boot
            }
        }

        return $next($request);
    }
}
