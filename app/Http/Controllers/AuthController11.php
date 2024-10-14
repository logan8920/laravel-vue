<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController11 extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $request->validate([
            "email" => "required|email",
            "password"=>"required" 
        ]);

        try {
            $user = User::whereEmail($request->email)->first();

            if(!$user && Hash::check($request->password, $user->password))
                throw new \Exception("The provided credential does not match with our records.", 401);
            
            return response()->json([
                "success" => true,
                "token" => $user->createToken($request->email)->plainTextToken
            ],200);
            
        } catch (\Exception $e) {
           return response()->json([
                "success" => false,
                "message" => $e->getMessage()
           ],$e->getCode());
        } catch (\Throwable $th) {
            return response()->json([
                "success" => false,
                "message" => $th->getMessage()
           ],$th->getCode());
        }


        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
