<?php

namespace App\Http\Controllers;

use App\Models\EmailResponse;
use Illuminate\Http\Request;
use App\Models\UserPlan;
use Carbon\Carbon;


class EmailResponseController extends Controller
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
    public function show(EmailResponse $emailResponse)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, EmailResponse $emailResponse)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EmailResponse $emailResponse)
    {
        //
    }

    /**
     * Get User per day credits
     */
    public function user_dashboard_info(Request $request)
    {
        $current_date = date("Y-m-d");
        $user_id = $request->user()->id;
        $credits = EmailResponse::whereUserId($user_id)
            ->where("email_check_date", date("Y-m-d"))
            ->count() ?? 0;

        $total_email_verify = EmailResponse::whereUserId($user_id)->count();
        $user_plan = UserPlan::whereUserId($user_id)->whereBetween($current_date, ['valid_from', 'valid_to'])->first();
        $days_left = "No Active Plan";
        if ($user_plan) {
            $startDate = Carbon::parse($current_date);
            $endDate = Carbon::parse($user_plan->valid_to);

            $days_left = $startDate->diffInDays($endDate);
        }


        $plan_price = $user_plan?->plan?->price ?? 'No Active Plan';
        $todays_credits = $user_plan?->plan?->per_day_credits ? $credits . '/' . $user_plan?->plan?->per_day_credits : 'No Active Plan';
        return compact('todays_credits', 'total_email_verify', 'days_left', 'plan_price');

    }
}
