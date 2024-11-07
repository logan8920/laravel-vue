<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Http\{Response,JsonResponse};
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
            "token" => $token,
            "user"=> $request->user()->toArray()
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

    public function update_profile(Request $request): JsonResponse{
        $id = $request->user()->id;
        $validData = $request->validate([
            "name" => "required|string",
            "email" => "required|email|unique:users,email,{$id},id",
            "password" => "nullable|string|min:8",
            "avatar" => "nullable|file|mimes:jpg,jpeg,png,gif|max:5024",
            "phone" => "nullable|numeric|digits:10",
            "bio_role" => "nullable|string|max:96",
            "bio_desc" => "nullable|string",
            "twitter" => "nullable|url",
            "facebook" => "nullable|url",
            "instagram" => "nullable|url"
        ]);

        try {
            if ($request->hasFile('avatar')) {
                $file = $request->file('avatar');
                
                $fileContents = file_get_contents($file->getRealPath());
                $base64Image = base64_encode($fileContents);
                $mimeType = $file->getMimeType();
                $base64ImageWithPrefix = 'data:' . $mimeType . ';base64,' . $base64Image;
                $validData["avatar"] = $base64ImageWithPrefix;
            }
    
            // if ($request->has("password")) {
            //     $validData["password"] = Hash::make($request->input("password"));
            // }
            $request->user()->update($validData);
            return response()->json([
                "success"=>true,
                "data"=>$request->user()->toArray()
            ],200);
        } catch (\Exception $e) {
            return response()->json([
                "success"=>false,
                "message"=>$e->getMessage()
            ],401);
        }

    }
}
