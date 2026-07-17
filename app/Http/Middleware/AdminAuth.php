<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminAuth
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        $locale = $request->route('locale') ?: 'en';
        
        if (!$request->session()->get('admin_logged_in')) {
            return redirect('/' . $locale . '/admin/login');
        }

        return $next($request);
    }
}
