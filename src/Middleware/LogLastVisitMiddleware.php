<?php

namespace Fomvasss\LastVisit\Middleware;

use Closure;
use Illuminate\Http\Request;

class LogLastVisitMiddleware
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
        if (\Auth::check()) {
            $expiresAt = \Carbon\Carbon::now()->addMinutes(config('last-visit.expires_at', 5));
            $cacheDriver = config('last-visit.cache_driver', 'file');
            \Cache::store($cacheDriver)->put('user-is-online-' . \Auth::user()->id, true, $expiresAt);
        }

        return $next($request);
    }
}
