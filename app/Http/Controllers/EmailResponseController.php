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
        sleep(1);
        $current_date = date("Y-m-d");
        $user_id = $request->user()->id;
        $credits = EmailResponse::whereUserId($user_id)
            ->where("email_check_date", date("Y-m-d"))
            ->count() ?? 0;

        $total_email_verify = EmailResponse::whereUserId($user_id)->count();
        $user_plan = UserPlan::whereUserId($user_id)
            ->where("valid_form", "<=", $current_date)
            ->where("valid_to", ">=", $current_date)
            ->first();
        $days_left = "No Active Plan";
        if ($user_plan) {
            $startDate = Carbon::parse($current_date);
            $endDate = Carbon::parse($user_plan->valid_to);

            $days_left = $startDate->diffInDays($endDate);
        }

        $last_batch_id = EmailResponse::whereUserId($user_id)
            ->whereNotNull("batch_id")
            ->orderBy("id", "desc")
            ->first()
            ->batch_id ?? 0;

        $bulk_email_data = [
            [
                "s_no" => 'No Data',
                "email" => "No Data",
                "status" => "No Data",
                "mx_record" => "No Data",
            ]
        ];
        if ($last_batch_id) {
            $bulk_email_data = EmailResponse::select("email", "status", "mx_record", "free_email")
                ->whereBatchId($last_batch_id)
                ->get()
                ->map(function ($item, $index) {
                    $item->s_no = $index + 1;
                    return $item;
                });
            ;
        }

        $single_data = EmailResponse::select("email", "status", "mx_record", "free_email")
            ->whereNull('batch_id')
            ->whereUserId($user_id)
            ->where("email_check_date",$current_date)
            ->orderBy('id', 'desc')
            ->first();

        $plan_price = $user_plan?->plan?->price ?? 'No Active Plan';
        $todays_credits = $user_plan?->plan?->per_day_credits ? $credits . '/' . $user_plan?->plan?->per_day_credits : 'No Active Plan';
        return compact('todays_credits', 'total_email_verify', 'days_left', 'plan_price', 'bulk_email_data','single_data');

    }
}
