<?php

namespace App\Http\Middleware;

use Closure;
use Exception;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Tymon\JWTAuth\Http\Middleware\BaseMiddleware;
use JWTAuth;

class JwtMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
//    public function handle(Request $request, Closure $next)
//    {
////        try {
////            $user = JWTAuth::parseToken()->authenticate();
////        } catch (Exception $e) {
////            if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenInvalidException) {
////                return response()->json(['status' => 'Token is Invalid']);
////            } else if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenExpiredException) {
////                return response()->json(['status' => 'Token is Expired']);
////            } else {
////                return response()->json(['status' => 'Authorization Token not found']);
////            }
////        }
//        $user = JWTAuth::parseToken()->authenticate();
//        return $next($request);
//    }

    public function handle(Request $request, Closure $next)
    {

        $user = JWTAuth::parseToken()->authenticate();
        return $next($request);
    }

}






