<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Negotiation\LanguageNegotiator;
use Symfony\Component\HttpFoundation\Response;

class LanguageMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response) $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $negotiator = new LanguageNegotiator();
        $lang = $negotiator->getBest($request->header('Accept-Language'), ['en', 'tr']);
        app()->setLocale($lang ? $lang->getType() : 'en');

        return $next($request);

    }
}
