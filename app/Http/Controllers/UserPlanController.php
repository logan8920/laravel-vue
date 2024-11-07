<?php

namespace App\Http\Controllers;

use App\Models\UserPlan;
use Illuminate\Http\Request;

class UserPlanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        sleep(5);
        $user_id = $request->user()->id;
        $plan = UserPlan::whereUserId($user_id)
            ->where("valid_to", ">=", date("Y-m-d"))
            ->first();

        return $plan ? $plan->plan->toArray() : [];
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
    public function show(UserPlan $userPlan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, UserPlan $userPlan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UserPlan $userPlan)
    {
        //
    }
}
