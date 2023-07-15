<?php

namespace App\Http\Middleware;

use App\Exceptions\AppError;
use Illuminate\Http\Request;
use Closure;
use Tymon\JWTAuth\Exceptions\{JWTException, TokenInvalidException, TokenExpiredException};
use Tymon\JWTAuth\Facades\JWTAuth;

class JWTMiddleware {
    public function handle(Request $request, Closure $next) {
        try {
            JWTAuth::parseToken()->authenticate();

            return $next($request);
        } catch(JWTException $error) {
            if($error instanceof TokenInvalidException) {
                throw new AppError('invalid token', 498);
            }

            if($error instanceof TokenExpiredException) {
                throw new AppError('expired token', 401);
            }

            throw new AppError($error->getMessage(), 500);
        }
    } 
}