<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Session;

class Admin {

    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure(Request): (Response|RedirectResponse) $next
     * @return Response|RedirectResponse
     */
    public function handle(Request $request, Closure $next) {
        $user = auth()->user();

        if (!$user->is_admin) {
            session()->now('error', __('backend.access_denied'));

            return to_route('backend.dashboard.index');
        }

        return $next($request);
    }
}
