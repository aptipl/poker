<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Auth;

class isCustomer
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
        if(Auth::check()) {

            if(Auth::user()->is_block) {
                Auth::logout();
                return redirect('/login')->with('warning', 'Your account has been temporarily suspended. We are looking into this. You can contact us at <a href="mailto:team@kinderway.com">team@kinderway.com</a> regarding your account suspension.');
            }

            if(Auth::user()->type == 'customer') {

                return $next($request);

            }else if(Auth::user()->type == 'admin') {

                return redirect('/admin/');

            }else {

                return redirect('/');

            }
        }else {
            Auth::logout();
            Session::flash('alert-warning', 'Not logged-in');
            return redirect('/login');
        }
    }
}
