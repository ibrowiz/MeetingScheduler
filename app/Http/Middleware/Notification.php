<?php

namespace App\Http\Middleware;

use Closure;

class Notification
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
        $start_date = new \Carbon\Carbon;
        $start_date->modify('-24 hours');
        $end_date = new \Carbon\Carbon;

        $notifications = \App\Models\Notification::whereBetween('created_at', [$start_date, $end_date])->latest()->get();

        \View::share('notifications', $notifications);
        return $next($request);
    }
}
