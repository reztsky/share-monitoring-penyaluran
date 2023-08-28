<?php

namespace App\Http\Middleware;

use App\Models\UsulanDbhcht;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CekInsertedByOnUsulan
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
        $user=Auth::user();
        if($user->roles->first()->name=='Super Admin') return $next($request);

        $usulan=UsulanDbhcht::findOrFail($request->id);
        if($usulan->inserted_by!=$user->id) return abort(403,"You Doesn't Have Permission");

        return $next($request);
    }
}
