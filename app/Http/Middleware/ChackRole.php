<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChackRole
{
  /**
   * Handle an incoming request.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
   * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
   */
  public function handle(Request $request, Closure $next, ...$roles)
  {

    if (!Auth::check()) {
      return redirect()->route('login');
    }
    // dd($roles);

    if (Auth::check()) {
      $user = Auth::user();

      if (in_array($user->role_id, $roles)) {
        return $next($request);
      }
    }
    // abort(403);
    return redirect('/404');
  }
}
