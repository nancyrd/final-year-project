<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckStageAccess
{
    /**
     * Handle an incoming request.
     *
     * 
     * 
     * 
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    
 public function handle(Request $request, Closure $next, $stageName): Response
{
    $user = auth()->user();
    $unlocked = $user->{$stageName.'_unlocked_levels'} ?? [];

    // If trying to access a locked level
    $level = $request->route('level');
    if ($level && !in_array($level, $unlocked)) {
        return redirect()->back()->with('error', 'You are not allowed to access this level.');
    }

    return $next($request);
}
}
