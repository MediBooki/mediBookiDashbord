<?php

namespace App\Http\Middleware;

use Closure;
use App\Facade\Tenants;
use App\Models\Tenant;
use Illuminate\Http\Request;

class TenantsMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $host = $request->getHost();
        $tenant = Tenant::where('domain',$host)->first();
        if($tenant){
            Tenants::switchToTenant($tenant);
        }
        
        return $next($request);
    }
}
