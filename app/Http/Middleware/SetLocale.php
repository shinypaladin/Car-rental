<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        $locale = $request->segment(1);

        if (in_array($locale, ['en', 'fr'])) {
            App::setLocale($locale);
        } else {
            // Default to browser detection or fallback
            $detected = self::detectBrowserLocale($request);
            
            // Redirect /about to /en/about or /fr/about
            $path = $request->path() === '/' ? '' : '/' . $request->path();
            return response('', 302)->header('Location', '/' . $detected . $path);
        }

        return $next($request);
    }

    /**
     * Detect customer browser language from HTTP headers.
     */
    public static function detectBrowserLocale(Request $request): string
    {
        $languages = $request->getLanguages();
        
        foreach ($languages as $lang) {
            if (str_starts_with($lang, 'fr')) {
                return 'fr';
            }
            if (str_starts_with($lang, 'en')) {
                return 'en';
            }
        }

        return 'en'; // default fallback
    }
}
