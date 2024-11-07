<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    ItemController,
    EmailValidator,
    PlanController,
    UserPlanController,
    EmailResponseController
};

// Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
//     return $request->user();
// });

//Route::apiResource("item",ItemController::class)->middleware('auth:sanctum');
Route::post("verify-single-email", [EmailValidator::class, "index"])->name("verify.single.email");

Route::middleware(["auth:sanctum"])->group(function () {
    Route::get("plans", [PlanController::class, "index"])->name("plans");
    Route::get("user-plan", [UserPlanController::class, "index"])->name("user.plan");
    Route::get("user-dashboard-info",[EmailResponseController::class,"user_dashboard_info"])->name("user.dashboard.info");
    //Route::post("user-transaction", [UserTransactionController::class, "index"])->name("user.transaction");
});

Route::get("public-plans", [PlanController::class, "index"])->name("public.plans");

require __DIR__.'/auth.php';
