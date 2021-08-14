<?php

namespace App\Http\Middleware;

use App\Client;
use Closure;

class CheckClients
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
        $count = Client::all()->count();
        if($count == 0){
            session()->flash('error','No clients at database. You have to add  some clients first');
            return redirect(route('clients.index'));
        }
        return $next($request);
    }
}
