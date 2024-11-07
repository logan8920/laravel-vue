<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Http\Controllers\EmailValidator;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

Route::get('/', function(){
    return view("vue");
});

Route::get('/laravel-vue1/public', function(){
    return view("vue");
});

Route::get('/auth/redirect/{provider}', function ($provider) {
    // echo $provider; die;
    return Socialite::driver($provider)->redirect();
});

Route::get('/auth/callback/{provider}', function ($provider) {
    $socialUser = Socialite::driver($provider)->stateless()->user();
    $imageData = file_get_contents($socialUser->getAvatar());

    
    if ($imageData !== false) {
        $base64Image = base64_encode($imageData);
        $base64ImageWithPrefix = 'data:image/jpeg;base64,' . $base64Image;
    }
    // Find or create a user in your database
    $user = User::updateOrCreate(
        ['email' => $socialUser->getEmail()],
        [
            'name' => $socialUser->getName(),
            'provider' => $provider,
            'provider_id' => $socialUser->getId(),
            'avatar' => $base64ImageWithPrefix ?? $socialUser->getAvatar(),
        ]
    );

    // Log in the user
    Auth::login($user);
    $token = $user->createToken('API Token')->plainTextToken;
    return redirect("/#/loading?token={$token}")->with("user",$user);
});

