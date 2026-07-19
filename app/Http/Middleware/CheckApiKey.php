<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\ApiKey;
use Symfony\Component\HttpFoundation\Response;

class CheckApiKey
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        $key = $request->header('X-API-KEY');

        if (!$key) {
            return response()->json([
                'status' => 'error',
                'message' => 'API Key is missing. Please provide the X-API-KEY header.'
            ], 401);
        }

        $apiKey = ApiKey::where('key', $key)->where('active', true)->first();

        if (!$apiKey) {
            return response()->json([
                'status' => 'error',
                'message' => 'Invalid or inactive API Key.'
            ], 401);
        }

        $request->attributes->set('api_key_model', $apiKey);

        return $next($request);
    }
}
