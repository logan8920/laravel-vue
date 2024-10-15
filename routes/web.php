<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmailValidator;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

// Route::get('/', function () {
//     return ['Laravel' => app()->version()];
// });

Route::get('/', function () {
    return view('vue');
});

Route::get('auth/redirect/{provider}', function ($provider) {
    return Socialite::driver($provider)->redirect();
});

Route::get('auth/callback/{provider}', function ($provider) {
    $socialUser = Socialite::driver($provider)->stateless()->user();

    // Find or create a user in your database
    $user = User::updateOrCreate(
        ['email' => $socialUser->getEmail()],
        [
            'name' => $socialUser->getName(),
            'provider' => $provider,
            'provider_id' => $socialUser->getId(),
            'avatar' => $socialUser->getAvatar(),
        ]
    );

    // Log in the user
    Auth::login($user);

    return redirect('/home');  // Redirect to a home or dashboard page
});

Route::post("verify-single-email",[EmailValidator::class,"index"])->middleware("guest")->name("verify.single.email");


