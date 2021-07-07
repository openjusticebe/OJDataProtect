<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class BelongToOrganisation
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
        if (Auth::user()->organisations()->whereSlug($request->route('org_slug'))->first()->exists()) {
            return $next($request);
        } else {
            abort(500, 'You do not belong to this organisation');
        }
    }
}
