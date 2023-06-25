<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Exception;
use Firebase\JWT\JWT;
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
        return response()->json(['token' => $token]);

        if (!$token) {
            return response()->json(['message' => 'Unauthorized.'], 401);
        }

        try {
            $decodedToken = JWT::decode($token, env('JWT_SECRET'));

            $user = User::find($decodedToken->uid);

            if (!$user) {
                return response()->json(['message' => 'Invalid token.'], 401);
            }

            // Authenticate the user
            Auth::login($user);
        } catch (Exception $e) {
            return response()->json(['message' => 'Invalid token.'], 401);
        }

        return $next($request);
    }
}
