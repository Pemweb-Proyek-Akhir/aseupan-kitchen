<?php

namespace App\Http\Middleware;

use App\Helpers\ResponseHelper;
use App\Models\User;
use Closure;
use Exception;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class JwtMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        $token = $request->bearerToken();

        if (!$token) {
            return ResponseHelper::err("You unaothirized to this resource");
        }

        try {
            $decodedToken = JWT::decode($token, new Key(env('JWT_SECRET'), 'HS256'));

            $user = User::find($decodedToken->uid);

            if (!$user) {
                return ResponseHelper::baseResponse("Invalid token", 409);
            }
            return $next($request);
        } catch (Exception $e) {
            return ResponseHelper::err($e->getMessage());
        }
    }
}
