<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserProfileController extends Controller
{
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
                "password"=> "nullable|string|min:8",
                "avatar" => "nullable|file|mimes:jpg,jpeg,png,gif|max:6120",
                "phone" => "nullable|numeric|digits:10",
                "bio_role" => "nullable|string|max:255",
                "bio_desc" => "nullable|string",
                "twitter" => "nullable|url",
                "facebook"=> "nullable|url",
                "instagram"=> "nullable|url",
                
            ]);
            if(empty($validData["password"]))
            { 
                unset($validData["password"]);
            }

            if ($request->hasFile('avatar')) {
                $file = $request->file('avatar');
                $fileContents = file_get_contents($file->getPathname());
                $base64Image = base64_encode($fileContents);
                $mimeType = $file->getMimeType();
                $base64ImageWithPrefix = "data:$mimeType;base64," . $base64Image;
                $validData['avatar'] = $base64ImageWithPrefix;
            }
            
            $request->user()->update($validData);
            return $this->sendSuccess('Profile Details updated successfully!', 200,$request->user()->toArray());
        }catch(\Exception $e){
            return $this->sendError($e->getMessage(),$e->getCode());
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
