<?php
namespace App\Http\Middleware;

use Closure;
use Exception;
use JWTAuth;

class jwtMiddleware
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
        try {
            $user = JWTAuth::toUser($request->input('api-token'));
            return $next($request);

        } catch (Exception $e) {
            if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenInvalidException) {
                return $next($request);
                return response()->json(['error' => 'Token is Invalid']);
            } else if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenExpiredException) {
                return $next($request);
                return response()->json(['error' => 'Token is Expired']);
            } else {
                return $next($request);
                return response()->json(['error' => 'Something is wrong']);
            }
        }

    }
}
