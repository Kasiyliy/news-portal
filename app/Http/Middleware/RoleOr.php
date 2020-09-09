<?php

namespace App\Http\Middleware;

use App\Core\Errors\ErrorCode;
use App\Core\Traits\ErrorTrait;
use Closure;

class RoleOr
{
    use ErrorTrait;

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next, ...$roleIds)
    {
        if (in_array(auth()->user()->role_id, $roleIds)) {
            return $next($request);
        } else {
            $this->adaptedFail(
                trans('error.access.denied'),
                403,
                ErrorCode::ACCESS_DENIED);
        }
    }
}
