<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\ResponseTrait;

class UserProfileController extends Controller
{
    use ResponseTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function update(Request $request)
    {
        try{
            $id = $request->user()?->id;
            if(!$id) {
                throw new \Exception("User Not Found",422);
            }
            $validData = $request->validate([
                "name" => "required|string",
                "email"=> "required|email|unique:users,email,{$id},id",
                "password"=> "nullable|string|max:8",
                "avatar" => "nullable|file|memes:jpg,jpeg,png,gif|max:6120",
                "phone" => "nullable|numeric|digits:10",
                "bio_role" => "nullable|string",
                
            ]);
            if(empty($validData["password"]))
            { 
                unset($validData["password"]);
            }

            if($request->hasFile("avatar")){
                
            }
            $request->user()->update($validData);

        }catch(\Exception $e){
            return $this->errorResponse($e->getMessage(),$e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
