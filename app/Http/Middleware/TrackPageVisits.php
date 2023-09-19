<?php

namespace App\Http\Middleware;

use App\VisitCounter;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TrackPageVisits
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $pageIdentifier)
    {
        // Increment the visit count for the specific page
        VisitCounter::incrementPageVisit($pageIdentifier);
        dump(session("visit_count_seller-detail")); 
        return $next($request);
    }
    // public function handle(Request $request, Closure $next)
    // {
    //     VisitCounter::increment();
    // //     $sessionId = Session::getId();
    // //    
    // //     // dd($sessionId);
    // // $visitedPages = Session::get('visited_pages', []);

    // // if (!in_array($sessionId, $visitedPages)) {
    // //     array_push($visitedPages, $sessionId);
    // //     Session::put('visited_pages', $visitedPages);
    // // }
    //     return $next($request);
    // }
}
