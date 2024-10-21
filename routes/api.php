<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{ItemController,EmailValidator};

// Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::apiResource("item",ItemController::class)->middleware('auth:sanctum');
Route::post("verify-single-email", [EmailValidator::class, "index"])->name("verify.single.email");


require __DIR__.'/auth.php';
