<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Lcobucci\JWT\Signer\Key;
use Symfony\Component\HttpFoundation\Response;

class Chackpassword
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        // if($request->api_password !==env(key:"API_PASSWORD",default:"H1QYDGTOa3uQk")){

        //     return response()->json(['messege'=>'unauthanticates']);
        // }

        return $next($request);
    }
}
