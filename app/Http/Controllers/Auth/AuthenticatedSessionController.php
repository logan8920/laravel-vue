<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Http\{Response,JsonResponse};
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends Controller
{
    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): JsonResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        $token = $request->user()->createToken($request->email)->plainTextToken;

        return response()->json([
            "success" => true,
            "token" => $token
        ],200);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): JsonResponse
    {
        //Auth::guard('web')->logout();
        $request->user()->tokens()->delete();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return response()->json([
            "success"=>true,
            "message"=>"Logged out successfully!"
        ],200);
    }
}
