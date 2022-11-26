<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Role;

class AccessCard
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
        $getRole = Role::where('name', 'access_card')->select('name')->first();
        $users = auth()->user();
        // foreach($users->roles as $role) {
        //     if($role->name === $getRole){
        //
        //     }
        // }
        return $next($request);
    }
}
