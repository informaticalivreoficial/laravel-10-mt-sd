<?php

declare(strict_types=1);

namespace App\Http\Middleware;

use App\Models\Tenant;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckTenant
{
    public function __construct(
        private readonly Tenant $tenant,
    )
    {
        
    }
        
    public function handle(Request $request, Closure $next): Response
    {
        return $next($request);
    }

    protected function validTenancyExists(Request $request): mixed
    {
        list($subdomain) = explode('.', $request->getHost(), 2);

        $tenant = $this->tenant->where('prefix_domain', $subdomain)->first();

        if ($tenant === null) {
            //abort(404);
            session()->put('is_master', true);
        }

        return $tenant;
    }
}
