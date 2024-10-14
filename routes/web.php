<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmailValidator;

// Route::get('/', function () {
//     return ['Laravel' => app()->version()];
// });

Route::get('/', function () {
    return view('vue');
});

Route::post("verify-single-email",[EmailValidator::class,"index"])->middleware("guest")->name("verify.single.email");


