<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;

/*Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');*/

Route::get("/login",[AuthController::class,"index"])->name("login");

Route::get("/register",[AuthController::class,"store"])->name("register");

Route::apiResource("item",ItemController::class);
